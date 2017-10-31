<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use App\Models\Clientes;
use App\Models\Festas;
use App\Http\Requests\StoreBirthdayStep1;
use App\Http\Requests\StoreBirthdayStep2;
use App\Http\Requests\StoreBirthdayStep3;
use App\Http\Requests\StoreBirthdayStep4;

class BirthdayController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/') {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$client 	= $this->cliente;
		$method 	= $request->method();
		$view 		= 'site.inc.usuarios.meus_aniversarios';

		$festas = $this->populateParties($client->festas);

		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.usuarios', compact('view', 'titulo', 'client', 'festas'));
	}

	private function populateParties($festas)
	{
		$festas_ativas = [];
		$festas_antigas = [];

		if (isset($festas) && count($festas) > 0) {
			foreach ($festas as $festa) {
				$data = $festa->festa_ano . '-' . $festa->festa_mes . '-' . $festa->festa_dia;

				if ($data >= date('Y-m-d')) {
					$festas_ativas[] = $festa;
				} else {
					$festas_antigas[] = $festa;
				}
			}
		}

		return [
			'festas_ativas' => $festas_ativas,
			'festas_antigas' => $festas_antigas
		];
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request, $festa_id = NULL, $passo = NULL) {
		$client = $this->cliente;
		$method = $request->method();
		$gifts = [
			'toys' => 0,
			'clothes' => 0,
			'quotas' => 0,
			'total' => 0
		];

		if (isset($festa_id) && !empty($festa_id)) {
			$festa = Festas::find($festa_id);
		} else {
			$festa = new Festas;
		}

		if (isset($request->passo) && !empty($request->passo)) {
			$view = 'site.criar-aniversario.' . $request->passo;

			if ($request->passo == '5') {
				foreach ($festa->produto()->get() as $produto) {
					switch ($produto->categoria) {
						case 'roupa':
							$gifts['clothes'] = $gifts['clothes'] + 1;
							break;
						case 'brinquedo':
							$gifts['toys'] = $gifts['toys'] + 1;
							break;
						case 'cotas':
							$gifts['quotas'] = $gifts['quotas'] + 1;
							break;
					}
				}

				$gifts['total'] = $gifts['clothes'] + $gifts['toys'] + $gifts['quotas'];
			}
		} else {
			$view = 'site.criar-aniversario.1';
		}

		if ($request->ajax()) {
			return view($view, compact('client', 'festa'));
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client', 'festa', 'gifts'));
		}
	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
 	public function store(Request $request) {
 		$input = $request->all();
 		$input['clientes_id'] = $this->cliente->id;

 		switch ($request->step) {
			case '1':
				$rules = StoreBirthdayStep1::rules();
				break;
			case '2':
				$rules = StoreBirthdayStep2::rules();

				if (empty($input['endereco_latitude'])) {
					unset($input['endereco_latitude']);
				}

				if (empty($input['endereco_longitude'])) {
					unset($input['endereco_longitude']);
				}

				if (empty($input['referencia'])) {
					unset($input['referencia_latitude']);
					unset($input['referencia_longitude']);
				} else {
					if (empty($input['referencia_latitude'])) {
						unset($input['referencia_latitude']);
					}

					if (empty($input['referencia_longitude'])) {
						unset($input['referencia_longitude']);
					}
				}

				break;
			case '3':
				$rules = StoreBirthdayStep3::rules();
				break;
			case '4':
				$rules = StoreBirthdayStep4::rules();
				break;
			case '5':
				$rules = StoreBirthdayStep5::rules();
				break;
 		}

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

 		$next = (int)$request->step + 1;

		$party = Festas::firstOrNew(['id' => $request->id]);
		$party->fill($input);
		$party->save();

		return redirect()->route('usuario.meus-aniversarios.novo.festa', [
					'passo' => $next, 'festa_id' => $party->id
				]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		$client = $this->cliente;
		$method = $request->method();
		$festa = Festas::find($id);

		if ($festa->clientes_id !== $this->cliente->id) {
			return redirect()->route('usuario.meus-aniversarios');
		}

		if (isset($request->number)) {
			$view = 'site.criar-aniversario.' . $request->number;
		} else {
			$view = 'site.criar-aniversario.1';
		}

		if ($request->ajax()) {
			return view($view, compact('client', 'festa'));
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client', 'festa'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(Request $request, $id)
    {

	}

	public function upload(Request $request)
	{
		$path = basename($request->file->store('public/birthdays'));

		if (!\File::exists(storage_path('app/public/birthdays/mask'))) {
			$folder = \File::makeDirectory(storage_path('app/public/birthdays/mask'), 0775, true);
		}

		if (!\File::exists(storage_path('app/public/birthdays/mask/guest'))) {
			$folder = \File::makeDirectory(storage_path('app/public/birthdays/mask/guest'), 0775, true);
		}

		$img = Image::make(storage_path('app/public/birthdays/' . $path));
		$this->createMaskFeature($path, $img);

		$img = Image::make(storage_path('app/public/birthdays/' . $path));
		$this->createMaskGuest($path, $img);

		$img = Image::make(storage_path('app/public/birthdays/' . $path));
		$img->resize(780, null, function ($constraint) {
				$constraint->aspectRatio();
			})
			->save(storage_path('app/public/birthdays/' . $path));

		return response()
			->json(['path' => $path]);
	}

	private function createMaskFeature($path, $img) {
		$width = 166;
		$height = 110;
		$img->fit($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})
			->mask(public_path('assets/site/images/layout-mask.png'), true)
			->save(storage_path('app/public/birthdays/mask/' . pathinfo($path, PATHINFO_FILENAME) . '.png'));
	}

	private function createMaskGuest($path, $img) {
		$width = 240;
		$height = 233;
		$img->fit($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})
			->mask(public_path('assets/site/images/layout-2-mask.png'), true)
			->save(storage_path('app/public/birthdays/mask/guest/' . pathinfo($path, PATHINFO_FILENAME) . '.png'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id = NULL)
	{
		$festa = Festas::find($id);

		if ($festa->clientes_id === $this->cliente->id) {
			$festa->delete();
		}

		return redirect()->route('usuario.meus-aniversarios');
	}

	public function aviso(Request $request, $id = NULL)
	{
		$client = $this->cliente;
		$method = $request->method();
		$festa = Festas::find($id);

		if ($festa->clientes_id !== $client->id) {
			return redirect()->route('usuario.meus-aniversarios');
		}

		$view 	= 'site.inc.usuarios.meus_aniversarios_excluir';
		if ($request->ajax()) {
			return view($view, compact('client', 'festa'));
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client', 'festa'));
		}
	}

	public function meus_aniversarios_presentes()
	{
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.roupas', compact('titulo', 'client'));
	}
}