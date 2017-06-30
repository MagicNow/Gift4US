<?php

use Illuminate\Database\Seeder;

class BancosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bancos')->delete();
        
        \DB::table('bancos')->insert(array (
            0 => 
            array (
                'id' => '081-7',
                'nome' => 'Concórdia Banco S.A.',
            ),
            1 => 
            array (
                'id' => '1',
                'nome' => 'Banco do Brasil S.A.',
            ),
            2 => 
            array (
                'id' => '104',
                'nome' => 'Caixa Econômica Federal',
            ),
            3 => 
            array (
                'id' => '107',
                'nome' => 'Banco BBM S.A.',
            ),
            4 => 
            array (
                'id' => '116',
                'nome' => 'Banco Único S.A.',
            ),
            5 => 
            array (
                'id' => '151',
                'nome' => 'Banco Nossa Caixa S.A.',
            ),
            6 => 
            array (
                'id' => '175',
                'nome' => 'Banco Finasa S.A.',
            ),
            7 => 
            array (
                'id' => '184',
                'nome' => 'Banco Itaú BBA S.A.',
            ),
            8 => 
            array (
                'id' => '204',
                'nome' => 'Banco Bradesco Cartões S.A.',
            ),
            9 => 
            array (
                'id' => '208',
                'nome' => 'Banco UBS Pactual S.A.',
            ),
            10 => 
            array (
                'id' => '21',
                'nome' => 'BANESTES S.A. Banco do Estado do Espírito Santo',
            ),
            11 => 
            array (
                'id' => '214',
                'nome' => 'Banco Dibens S.A.',
            ),
            12 => 
            array (
                'id' => '215',
                'nome' => 'Banco Comercial e de Investimento Sudameris S.A.',
            ),
            13 => 
            array (
                'id' => '217',
                'nome' => 'Banco John Deere S.A.',
            ),
            14 => 
            array (
                'id' => '222',
                'nome' => 'Banco Calyon Brasil S.A.',
            ),
            15 => 
            array (
                'id' => '224',
                'nome' => 'Banco Fibra S.A.',
            ),
            16 => 
            array (
                'id' => '225',
                'nome' => 'Banco Brascan S.A.',
            ),
            17 => 
            array (
                'id' => '229',
                'nome' => 'Banco Cruzeiro do Sul S.A.',
            ),
            18 => 
            array (
                'id' => '230',
                'nome' => 'Unicard Banco Múltiplo S.A.',
            ),
            19 => 
            array (
                'id' => '233',
                'nome' => 'Banco GE Capital S.A.',
            ),
            20 => 
            array (
                'id' => '237',
                'nome' => 'Banco Bradesco S.A.',
            ),
            21 => 
            array (
                'id' => '24',
                'nome' => 'Banco de Pernambuco S.A. – BANDEPE',
            ),
            22 => 
            array (
                'id' => '246',
                'nome' => 'Banco ABC Brasil S.A.',
            ),
            23 => 
            array (
                'id' => '248',
                'nome' => 'Banco Boavista Interatlântico S.A.',
            ),
            24 => 
            array (
                'id' => '249',
                'nome' => 'Banco Investcred Unibanco S.A.',
            ),
            25 => 
            array (
                'id' => '25',
                'nome' => 'Banco Alfa S.A.',
            ),
            26 => 
            array (
                'id' => '250',
                'nome' => 'Banco Schahin S.A.',
            ),
            27 => 
            array (
                'id' => '252',
                'nome' => 'Banco Fininvest S.A.',
            ),
            28 => 
            array (
                'id' => '263',
                'nome' => 'Banco Cacique S.A.',
            ),
            29 => 
            array (
                'id' => '265',
                'nome' => 'Banco Fator S.A.',
            ),
            30 => 
            array (
                'id' => '27',
                'nome' => 'Banco do Estado de Santa Catarina S.A.',
            ),
            31 => 
            array (
                'id' => '29',
                'nome' => 'Banco Banerj S.A.',
            ),
            32 => 
            array (
                'id' => '3',
                'nome' => 'Banco da Amazônia S.A.',
            ),
            33 => 
            array (
                'id' => '31',
                'nome' => 'Banco Beg S.A.',
            ),
            34 => 
            array (
                'id' => '318',
                'nome' => 'Banco BMG S.A.',
            ),
            35 => 
            array (
                'id' => '320',
                'nome' => 'Banco Industrial e Comercial S.A.',
            ),
            36 => 
            array (
                'id' => '33',
                'nome' => 'Banco Santander S.A.',
            ),
            37 => 
            array (
                'id' => '341',
                'nome' => 'Banco Itaú S.A.',
            ),
            38 => 
            array (
                'id' => '356',
                'nome' => 'Banco Real S.A.',
            ),
            39 => 
            array (
                'id' => '36',
                'nome' => 'Banco Bradesco BBI S.A.',
            ),
            40 => 
            array (
                'id' => '366',
                'nome' => 'Banco Société Générale Brasil S.A.',
            ),
            41 => 
            array (
                'id' => '37',
                'nome' => 'Banco do Estado do Pará S.A.',
            ),
            42 => 
            array (
                'id' => '370',
                'nome' => 'Banco WestLB do Brasil S.A.',
            ),
            43 => 
            array (
                'id' => '376',
                'nome' => 'Banco J. P. Morgan S.A.',
            ),
            44 => 
            array (
                'id' => '38',
                'nome' => 'Banco Banestado S.A.',
            ),
            45 => 
            array (
                'id' => '389',
                'nome' => 'Banco Mercantil do Brasil S.A.',
            ),
            46 => 
            array (
                'id' => '394',
                'nome' => 'Banco Finasa BMC S.A.',
            ),
            47 => 
            array (
                'id' => '399',
                'nome' => 'HSBC Bank Brasil S.A. – Banco Múltiplo',
            ),
            48 => 
            array (
                'id' => '4',
                'nome' => 'Banco do Nordeste do Brasil S.A.',
            ),
            49 => 
            array (
                'id' => '40',
                'nome' => 'Banco Cargill S.A.',
            ),
            50 => 
            array (
                'id' => '409',
                'nome' => 'UNIBANCO – União de Bancos Brasileiros S.A.',
            ),
            51 => 
            array (
                'id' => '41',
                'nome' => 'Banco do Estado do Rio Grande do Sul S.A.',
            ),
            52 => 
            array (
                'id' => '422',
                'nome' => 'Banco Safra S.A.',
            ),
            53 => 
            array (
                'id' => '44',
                'nome' => 'Banco BVA S.A.',
            ),
            54 => 
            array (
                'id' => '45',
                'nome' => 'Banco Opportunity S.A.',
            ),
            55 => 
            array (
                'id' => '453',
                'nome' => 'Banco Rural S.A.',
            ),
            56 => 
            array (
                'id' => '456',
                'nome' => 'Banco de Tokyo-Mitsubishi UFJ Brasil S.A.',
            ),
            57 => 
            array (
                'id' => '464',
                'nome' => 'Banco Sumitomo Mitsui Brasileiro S.A.',
            ),
            58 => 
            array (
                'id' => '47',
                'nome' => 'Banco do Estado de Sergipe S.A.',
            ),
            59 => 
            array (
                'id' => '477',
                'nome' => 'Citibank N.A.',
            ),
            60 => 
            array (
                'id' => '479',
                'nome' => 'Banco ItaúBank S.A',
            ),
            61 => 
            array (
                'id' => '487',
                'nome' => 'Deutsche Bank S.A. – Banco Alemão',
            ),
            62 => 
            array (
                'id' => '488',
                'nome' => 'JPMorgan Chase Bank',
            ),
            63 => 
            array (
                'id' => '492',
                'nome' => 'ING Bank N.V.',
            ),
            64 => 
            array (
                'id' => '505',
            'nome' => 'Banco Credit Suisse (Brasil) S.A.',
            ),
            65 => 
            array (
                'id' => '600',
                'nome' => 'Banco Luso Brasileiro S.A.',
            ),
            66 => 
            array (
                'id' => '604',
                'nome' => 'Banco Industrial do Brasil S.A.',
            ),
            67 => 
            array (
                'id' => '610',
                'nome' => 'Banco VR S.A.',
            ),
            68 => 
            array (
                'id' => '611',
                'nome' => 'Banco Paulista S.A.',
            ),
            69 => 
            array (
                'id' => '612',
                'nome' => 'Banco Guanabara S.A.',
            ),
            70 => 
            array (
                'id' => '62',
                'nome' => 'Hipercard Banco Múltiplo S.A.',
            ),
            71 => 
            array (
                'id' => '623',
                'nome' => 'Banco Panamericano S.A.',
            ),
            72 => 
            array (
                'id' => '626',
                'nome' => 'Banco Ficsa S.A.',
            ),
            73 => 
            array (
                'id' => '63',
                'nome' => 'Banco Ibi S.A. - Banco Múltiplo',
            ),
            74 => 
            array (
                'id' => '630',
                'nome' => 'Banco Intercap S.A.',
            ),
            75 => 
            array (
                'id' => '633',
                'nome' => 'Banco Rendimento S.A.',
            ),
            76 => 
            array (
                'id' => '634',
                'nome' => 'Banco Triângulo S.A.',
            ),
            77 => 
            array (
                'id' => '637',
                'nome' => 'Banco Sofisa S.A.',
            ),
            78 => 
            array (
                'id' => '638',
                'nome' => 'Banco Prosper S.A.',
            ),
            79 => 
            array (
                'id' => '641',
                'nome' => 'Banco Alvorada S.A.',
            ),
            80 => 
            array (
                'id' => '643',
                'nome' => 'Banco Pine S.A.',
            ),
            81 => 
            array (
                'id' => '65',
                'nome' => 'Banco Lemon S.A.',
            ),
            82 => 
            array (
                'id' => '652',
                'nome' => 'Itaú Unibanco Banco Múltiplo S.A.',
            ),
            83 => 
            array (
                'id' => '653',
                'nome' => 'Banco Indusval S.A.',
            ),
            84 => 
            array (
                'id' => '655',
                'nome' => 'Banco Votorantim S.A.',
            ),
            85 => 
            array (
                'id' => '69',
                'nome' => 'BPN Brasil Banco Múltiplo S.A.',
            ),
            86 => 
            array (
                'id' => '70',
                'nome' => 'BRB – Banco de Brasília S.A.',
            ),
            87 => 
            array (
                'id' => '707',
                'nome' => 'Banco Daycoval S.A.',
            ),
            88 => 
            array (
                'id' => '719',
            'nome' => 'Banif-Banco Internacional do Funchal (Brasil)S.A.',
            ),
            89 => 
            array (
                'id' => '72',
                'nome' => 'Banco Rural Mais S.A.',
            ),
            90 => 
            array (
                'id' => '73',
                'nome' => 'BB Banco Popular do Brasil S.A.',
            ),
            91 => 
            array (
                'id' => '734',
                'nome' => 'Banco Gerdau S.A.',
            ),
            92 => 
            array (
                'id' => '74',
                'nome' => 'Banco J. Safra S.A.',
            ),
            93 => 
            array (
                'id' => '740',
                'nome' => 'Banco Barclays S.A.',
            ),
            94 => 
            array (
                'id' => '745',
                'nome' => 'Banco Citibank S.A.',
            ),
            95 => 
            array (
                'id' => '746',
                'nome' => 'Banco Modal S.A.',
            ),
            96 => 
            array (
                'id' => '747',
                'nome' => 'Banco Rabobank International Brasil S.A.',
            ),
            97 => 
            array (
                'id' => '748',
                'nome' => 'Banco Cooperativo Sicredi S.A.',
            ),
            98 => 
            array (
                'id' => '749',
                'nome' => 'Banco Simples S.A.',
            ),
            99 => 
            array (
                'id' => '751',
                'nome' => 'Dresdner Bank Brasil S.A. – Banco Múltiplo',
            ),
            100 => 
            array (
                'id' => '752',
                'nome' => 'Banco BNP Paribas Brasil S.A.',
            ),
            101 => 
            array (
                'id' => '755',
                'nome' => 'Banco Merrill Lynch de Investimentos S.A.',
            ),
            102 => 
            array (
                'id' => '756',
                'nome' => 'Banco Cooperativo do Brasil S.A. – BANCOOB',
            ),
            103 => 
            array (
                'id' => '78',
                'nome' => 'BES Investimento do Brasil S.A.-Banco de Investimento',
            ),
            104 => 
            array (
                'id' => '96',
                'nome' => 'Banco BM&F de Serviços de Liquidação e Custódia S.A',
            ),
            105 => 
            array (
                'id' => 'M03',
                'nome' => 'Banco Fiat S.A.',
            ),
            106 => 
            array (
                'id' => 'M06',
                'nome' => 'Banco de Lage Landen Brasil S.A.',
            ),
            107 => 
            array (
                'id' => 'M07',
                'nome' => 'Banco GMAC S.A.',
            ),
            108 => 
            array (
                'id' => 'M08',
                'nome' => 'Banco Citicard S.A.',
            ),
            109 => 
            array (
                'id' => 'M09',
                'nome' => 'Banco Itaucred Financiamentos S.A.',
            ),
            110 => 
            array (
                'id' => 'M11',
                'nome' => 'Banco IBM S.A.',
            ),
            111 => 
            array (
                'id' => 'M14',
                'nome' => 'Banco Volkswagen S.A.',
            ),
            112 => 
            array (
                'id' => 'M16',
                'nome' => 'Banco Rodobens S.A.',
            ),
            113 => 
            array (
                'id' => 'M18',
                'nome' => 'Banco Ford S.A.',
            ),
            114 => 
            array (
                'id' => 'M19',
                'nome' => 'Banco CNH Capital S.A.',
            ),
            115 => 
            array (
                'id' => 'M20',
                'nome' => 'Banco Toyota do Brasil S.A.',
            ),
            116 => 
            array (
                'id' => 'M22',
                'nome' => 'Banco Honda S.A.',
            ),
        ));
        
        
    }
}