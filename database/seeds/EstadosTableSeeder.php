<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        $estados = array(
          array('id' => '1','name' => 'Acre','sigla' => 'AC'),
          array('id' => '2','name' => 'Alagoas','sigla' => 'AL'),
          array('id' => '3','name' => 'Amazonas','sigla' => 'AM'),
          array('id' => '4','name' => 'Amapá','sigla' => 'AP'),
          array('id' => '5','name' => 'Bahia','sigla' => 'BA'),
          array('id' => '6','name' => 'Ceará','sigla' => 'CE'),
          array('id' => '7','name' => 'Distrito Federal','sigla' => 'DF'),
          array('id' => '8','name' => 'Espírito Santo','sigla' => 'ES'),
          array('id' => '9','name' => 'Goiás','sigla' => 'GO'),
          array('id' => '10','name' => 'Maranhão','sigla' => 'MA'),
          array('id' => '11','name' => 'Minas Gerais','sigla' => 'MG'),
          array('id' => '12','name' => 'Mato Grosso do Sul','sigla' => 'MS'),
          array('id' => '13','name' => 'Mato Grosso','sigla' => 'MT'),
          array('id' => '14','name' => 'Pará','sigla' => 'PA'),
          array('id' => '15','name' => 'Paraíba','sigla' => 'PB'),
          array('id' => '16','name' => 'Pernambuco','sigla' => 'PE'),
          array('id' => '17','name' => 'Piauí','sigla' => 'PI'),
          array('id' => '18','name' => 'Paraná','sigla' => 'PR'),
          array('id' => '19','name' => 'Rio de Janeiro','sigla' => 'RJ'),
          array('id' => '20','name' => 'Rio Grande do Norte','sigla' => 'RN'),
          array('id' => '21','name' => 'Rondônia','sigla' => 'RO'),
          array('id' => '22','name' => 'Roraima','sigla' => 'RR'),
          array('id' => '23','name' => 'Rio Grande do Sul','sigla' => 'RS'),
          array('id' => '24','name' => 'Santa Catarina','sigla' => 'SC'),
          array('id' => '25','name' => 'Sergipe','sigla' => 'SE'),
          array('id' => '26','name' => 'São Paulo','sigla' => 'SP'),
          array('id' => '27','name' => 'Tocantins','sigla' => 'TO')
        );
        \DB::table('estados')->delete();
            
        \DB::table('estados')->insert($estados);
 
        
        
    }
}
