<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departaments')->insert([
            ['id' => 0, 'title' => 'Raiz', 'parent_id' => 0],
            ['id' => 31, 'title' => 'ENCARGOS GERAIS DO MUNICIPIO', 'parent_id' => 0],
            ['id' => 301, 'title' => 'GP - GABINETE DO PREFEITO MUNICIPAL', 'parent_id' => 0],
            ['id' => 302, 'title' => 'GVP - GABINETE DA VICE-PREFEITA', 'parent_id' => 301],
            ['id' => 303, 'title' => 'PGM - PROCURADORIA GERAL DO MUNICIPIO', 'parent_id' => 0],
            ['id' => 305, 'title' => 'IAPS', 'parent_id' => 928],
            ['id' => 306, 'title' => 'SECULT - DIRETORIA DE TURISMO', 'parent_id' => 959],
            ['id' => 307, 'title' => 'SEMAD - SECRETARIA MUNICIPAL DE ADMINISTRAÇAO', 'parent_id' => 0],
            ['id' => 310, 'title' => 'ARQUIVO GERAL - PROTOCOLO', 'parent_id' => 0],
            ['id' => 311, 'title' => 'SEMAD - PROTOCOLO', 'parent_id' => 307],
            ['id' => 312, 'title' => 'SECOL - SECRETARIA MUNICIPAL DE COMPRAS E LICITAÇÕES', 'parent_id' => 0],
            ['id' => 313, 'title' => 'SEMAD - CENTRAL DE VEÍCULOS', 'parent_id' => 307],
            ['id' => 316, 'title' => 'SEMFA - TESOURARIA', 'parent_id' => 900],
            ['id' => 319, 'title' => 'SEMFA - IPTU', 'parent_id' => 900],
            ['id' => 320, 'title' => 'SEMFA - DESPESA E LIQUIDAÇÃO', 'parent_id' => 900],
            ['id' => 321, 'title' => 'SEMFA - DIRETORIA DE DÍVIDA ATIVA', 'parent_id' => 900],
            ['id' => 322, 'title' => 'SEDETTEC - ALVARÁS', 'parent_id' => 343],
            ['id' => 323, 'title' => 'SGG - DIRETORIA DE URBANISMO', 'parent_id' => 943],
            ['id' => 325, 'title' => '2" GRUPAMENTO DE INCENDIO', 'parent_id' => 928],
            ['id' => 326, 'title' => 'ASSOCIACAO DOS FUNCIONARIOS MUNICIPAIS', 'parent_id' => 928],
            ['id' => 327, 'title' => 'ASSOCIACAO DOS APOSENTADOS DE SL', 'parent_id' => 928],
            ['id' => 328, 'title' => 'SEMOV - SECRETARIA MUNICIPAL DE OBRAS E VIAÇÃO', 'parent_id' => 0],
            ['id' => 329, 'title' => 'SEMUSP - DEPARTAMENTO TÉCNICO DE TRANSITO', 'parent_id' => 916],
            ['id' => 331, 'title' => 'SGG - DIRETORIA DE GESTÃO ESTRATÉGICA', 'parent_id' => 943],
            ['id' => 332, 'title' => 'SGG - DIRETORIA DE EDIFICAÇÕES E PROJETO (DEPRO)', 'parent_id' => 943],
            ['id' => 333, 'title' => 'COMPLAD - APROVACAO', 'parent_id' => 928],
            ['id' => 334, 'title' => 'SEMAD - ARQUIVO GERAL', 'parent_id' => 307],
            ['id' => 335, 'title' => 'SGG - CADASTRO TECNICO', 'parent_id' => 943],
            ['id' => 336, 'title' => 'SMED - SECRETARIA MUNICIPAL DE EDUCAÇÃO', 'parent_id' => 0],
            ['id' => 337, 'title' => 'SECULT - BIBLIOTECA PUBLICA', 'parent_id' => 959],
            ['id' => 338, 'title' => 'SDS - SECRETARIA MUNICIPAL DE DESENVOLVIMENTO SOCIAL', 'parent_id' => 0],
            ['id' => 339, 'title' => 'FUNDAÇÃO HOSPITAL CENTENARIO', 'parent_id' => 928],
            ['id' => 340, 'title' => 'SEMHAB - SECRETARIA MUNICIPAL DE HABITACAO', 'parent_id' => 0],
            ['id' => 341, 'title' => 'CDC - CONSELHO DE DESEN. DA COMUNIDADE', 'parent_id' => 928],
            ['id' => 343, 'title' => 'SEDETTEC - SEC. MUN. DE DES.ECONOMICO TURIS. E TECNOLOGICO', 'parent_id' => 0],
            ['id' => 345, 'title' => 'SEMAE - SERVICO MUNICIPAL AGUA E ESGOTOS', 'parent_id' => 928],
            ['id' => 346, 'title' => 'SEMMAM - SECRETARIA MUNICIPAL DO MEIO AMBIENTE', 'parent_id' => 0],
            ['id' => 347, 'title' => 'PROCON - ORGAO DEFESA DO CONSUMIDOR', 'parent_id' => 943],
            ['id' => 348, 'title' => 'SGG - FISCALIZACAO', 'parent_id' => 943],
            ['id' => 349, 'title' => 'SGG - CONTROLE URBANISTICO', 'parent_id' => 943],
            ['id' => 350, 'title' => 'SEMSAD - SECRETARIA MUNICIPAL DE SAUDE', 'parent_id' => 0],
            ['id' => 352, 'title' => 'SEMAD - DIRETORIA DE RECURSOS HUMANOS', 'parent_id' => 307],
            ['id' => 353, 'title' => 'SEMURB - ADMINISTRACAO DOS CEMITERIOS', 'parent_id' => 949],
            ['id' => 354, 'title' => 'PROTOCOLO - DIVERSOS', 'parent_id' => 0],
            ['id' => 355, 'title' => 'ASSESSORIA COMUNITARIA', 'parent_id' => 0],
            ['id' => 356, 'title' => 'CAMARA DE VEREADORES', 'parent_id' => 928],
            ['id' => 357, 'title' => 'SEMOV - CONSERV. DRENAGEM URBANA E OBRAS COMPLEM.', 'parent_id' => 328],
            ['id' => 358, 'title' => 'SEMFA - DIRETORIA DE CONTABILIDADE', 'parent_id' => 900],
            ['id' => 360, 'title' => 'PGM - DEPART. DISCIPLINA ADMINISTRATIVA', 'parent_id' => 303],
            ['id' => 361, 'title' => 'COMDEDICA', 'parent_id' => 928],
            ['id' => 363, 'title' => 'SEMUSP - DIRETORIA DA GUARDA CIVIL MUNICIPAL', 'parent_id' => 916],
            ['id' => 364, 'title' => 'SEMSAD - UBAM FEITORIA', 'parent_id' => 350],
            ['id' => 367, 'title' => 'COMISSÃO DE AVALIAÇÃO', 'parent_id' => 0],
            ['id' => 368, 'title' => 'USINA DE RECICLAGEM LIXO', 'parent_id' => 928],
            ['id' => 369, 'title' => 'UCI - UNIDADE CENTRAL DE CONTROLE INTERNO DO MUNICIPIO', 'parent_id' => 0],
            ['id' => 371, 'title' => 'PLANTAO URGENCIA - SCHARLAU', 'parent_id' => 0],
            ['id' => 372, 'title' => 'CONSEPRO', 'parent_id' => 928],
            ['id' => 373, 'title' => 'SEMSAD - COORDENADORIA DE SAÚDE MENTAL', 'parent_id' => 350],
            ['id' => 374, 'title' => 'CRT - COMPANHIA RIOGRANDENSE TELEC.', 'parent_id' => 928],
            ['id' => 375, 'title' => 'SEMFA - ISS', 'parent_id' => 900],
            ['id' => 376, 'title' => 'C.E.E.E.', 'parent_id' => 928],
            ['id' => 377, 'title' => 'COMISSAO AVALIACAO/BOLSA ESTUDO', 'parent_id' => 0],
            ['id' => 402, 'title' => 'SCOM - SUPERINTENDENCIA DE COMUNICAÇÃO', 'parent_id' => 301],
            ['id' => 403, 'title' => 'GP - JUNTA DE SERVIÇOS MILITAR', 'parent_id' => 301],
            ['id' => 404, 'title' => 'SEMSAD - PAME', 'parent_id' => 350],
            ['id' => 405, 'title' => 'CONSELHO MUNICIPAL TRAFEGO - CMT', 'parent_id' => 928],
            ['id' => 406, 'title' => 'CDL - CONSELHO DESENVOLVIMENTO LOJISTAS', 'parent_id' => 928],
            ['id' => 407, 'title' => 'SDS - CONSELHO TUTELAR CENTRO', 'parent_id' => 338],
            ['id' => 549, 'title' => 'ESCRITORIO DOS DIQUES', 'parent_id' => 928],
            ['id' => 550, 'title' => 'SEMFA - ITBI', 'parent_id' => 900],
            ['id' => 552, 'title' => 'LIMFA', 'parent_id' => 928],
            ['id' => 557, 'title' => 'COMPAC', 'parent_id' => 928],
            ['id' => 558, 'title' => 'TELE - PARTICIPACAO', 'parent_id' => 928],
            ['id' => 559, 'title' => 'COMISSAO DE AVALIACAO DE CONVENIOS', 'parent_id' => 0],
            ['id' => 560, 'title' => 'SINDICATO DOS SERVIDORES MUNICIPAIS SL', 'parent_id' => 928],
            ['id' => 561, 'title' => 'BRIGADA MILITAR', 'parent_id' => 928],
            ['id' => 563, 'title' => 'JSM - JUNTA DE SERVIÇOS MILITAR', 'parent_id' => 928],
            ['id' => 900, 'title' => 'SEMFA - SECRETARIA MUNICIPAL DA FAZENDA', 'parent_id' => 0],
            ['id' => 910, 'title' => 'SECULT - DIRETORIA DE CULTURA', 'parent_id' => 959],
            ['id' => 916, 'title' => 'SEMUSP - SEC. MUN.DE SEG. PUBLICA E DEFESA COMUNITARIA', 'parent_id' => 0],
            ['id' => 917, 'title' => 'DIRETORIA MUN. de POL da JUVENTUDE', 'parent_id' => 928],
            ['id' => 918, 'title' => 'SEPOM - SECRETARIA MUNICIPAL DE POLITICAS PARA MULHERES', 'parent_id' => 0],
            ['id' => 920, 'title' => 'SEMUSP - VISTORIAS', 'parent_id' => 916],
            ['id' => 928, 'title' => 'EXTERNOS', 'parent_id' => 0],
            ['id' => 930, 'title' => 'GABINETE DA PRIMEIRA DAMA', 'parent_id' => 301],
            ['id' => 935, 'title' => 'SEMOP - SECRETARIA MUNICIPAL DE ORÇAMENTO PARTICIPATIVO', 'parent_id' => 0],
            ['id' => 936, 'title' => 'DIRETORIA. MUN. POL. PRO. IGUAL. RACIAL', 'parent_id' => 928],
            ['id' => 938, 'title' => 'SEMSAD - FARMÁCIA MUNICIPAL', 'parent_id' => 350],
            ['id' => 941, 'title' => 'SEMURB - DIRETORIA DE MOBILIDADE E SOLUÇÕES URBANAS', 'parent_id' => 949],
            ['id' => 943, 'title' => 'SGG - SECRETARIA GERAL DE GOVERNO', 'parent_id' => 0],
            ['id' => 945, 'title' => 'OV - OUVIDORIA MUNICIPAL', 'parent_id' => 943],
            ['id' => 947, 'title' => 'SEMSAD - VIGILÂNCIA SANITÁRIA', 'parent_id' => 350],
            ['id' => 949, 'title' => 'SEMURB - SEC. MUN. DE MOBILIDADE E SERVIÇOS URBANOS', 'parent_id' => 0],
            ['id' => 950, 'title' => 'SGG - DIRETORIA DE PROJETOS E OBRAS ESTRATÉGICAS', 'parent_id' => 943],
            ['id' => 951, 'title' => 'SEDHU - SECRETARIA MUNICIPAL DE DIREITOS HUMANOS', 'parent_id' => 951],
            ['id' => 954, 'title' => 'SGG - HABITE-SE', 'parent_id' => 943],
            ['id' => 956, 'title' => 'SEMPA - SECRETARIA MUNICIPAL DE PROTEÇÃO ANIMAL', 'parent_id' => 0],
            ['id' => 957, 'title' => 'SEMEL - SECRETARIA MUNICIPAL DE ESPORTE E LAZER', 'parent_id' => 0],
            ['id' => 959, 'title' => 'SECULT - SEC. MUN. DE CULTURA E REALÇOES INTERNACIONAIS', 'parent_id' => 0],
            ['id' => 960, 'title' => 'PMGIRS - PLANO MUN. DE RESIDUOS SOLIDOS', 'parent_id' => 928],
            ['id' => 961, 'title' => 'SEMMAM - PARQUE IMPERATRIZ LEOPOLDINA', 'parent_id' => 346],
            ['id' => 962, 'title' => 'SEMFA - NÚCLEO DE ATENDIMENTO FAZENDÁRIO', 'parent_id' => 900],
            ['id' => 963, 'title' => 'GERA DARM ACESSO DIRETO', 'parent_id' => 0],
            ['id' => 965, 'title' => 'SEMHAB - DE REGULARIZAÇÃO FUNDIÁRIA', 'parent_id' => 340],
            ['id' => 966, 'title' => 'SGG - GABINETE SECRETARIO', 'parent_id' => 943],
            ['id' => 967, 'title' => 'SGG - SECRETÁRIO ADJUNTO', 'parent_id' => 943],
            ['id' => 968, 'title' => 'SEMURB - ILUMINAÇÃO PUBLICA', 'parent_id' => 949],
            ['id' => 969, 'title' => 'SGG - NÚCLEO DE GEOPROCESSAMENTO', 'parent_id' => 943],
            ['id' => 970, 'title' => 'SEMFA - RECEPÇÃO', 'parent_id' => 900],
            ['id' => 971, 'title' => 'SGG - CADASTRO TECNICO ATENDIMENTO', 'parent_id' => 943],
            ['id' => 972, 'title' => 'SEMMAM - DIRETORIA FISCALIZAÇÃO AMBIENTAL - URBANO', 'parent_id' => 346],
            ['id' => 973, 'title' => 'SEMMAM - DIRETORIA LICENCIAMENTO AMBIENTAL - URBANO', 'parent_id' => 346],
            ['id' => 974, 'title' => 'SEMMAM - NÚCLEO ADMINISTRATIVO', 'parent_id' => 346],
            ['id' => 975, 'title' => 'SEMMAM - ASSESSORIA JURÍDICA', 'parent_id' => 346],
            ['id' => 976, 'title' => 'SEMMAM - CDA', 'parent_id' => 346],
            ['id' => 977, 'title' => 'SEMMAM - AC', 'parent_id' => 346],
            ['id' => 978, 'title' => 'SEMMAM - CONDEMA', 'parent_id' => 346],
            ['id' => 979, 'title' => 'SEMMAM - DIRETORIA DE PLANEJAMENTO E GESTÃO AMBIENTAL', 'parent_id' => 346],
            ['id' => 980, 'title' => 'SEMSAD - TESOURARIA', 'parent_id' => 350],
            ['id' => 981, 'title' => 'SMED - PROTOCOLO', 'parent_id' => 336],
            ['id' => 982, 'title' => 'SMED - NUTRIÇÃO', 'parent_id' => 336],
            ['id' => 983, 'title' => 'SMED - FINANCEIRO', 'parent_id' => 336],
            ['id' => 984, 'title' => 'SMED - GABINETE DO SECRETÁRIO', 'parent_id' => 336],
            ['id' => 985, 'title' => 'SEMFA - ARQUIVO', 'parent_id' => 900],
            ['id' => 986, 'title' => 'ARQUIVO - OUVIDORIA', 'parent_id' => 945],
            ['id' => 987, 'title' => 'SGG - AREAS PÚBLICAS', 'parent_id' => 943],
            ['id' => 988, 'title' => 'SEDETTEC - FISCALIZAÇÃO', 'parent_id' => 343],
            ['id' => 989, 'title' => 'SGG - COORDENADORIA GERAL DE PLAN URBANO', 'parent_id' => 943],
            ['id' => 990, 'title' => 'SEMFA - DIRETORIA DE ORÇAMENTO', 'parent_id' => 900],
            ['id' => 991, 'title' => 'SEDETTEC - JUNTA COMERCIAL', 'parent_id' => 343],
            ['id' => 992, 'title' => 'SGG - COMISSÃO DE AVALIAÇÃO E DESAPROPRIAÇÃO', 'parent_id' => 943],
            ['id' => 993, 'title' => 'SGG - NUCLEO DE BENS IMÓVEIS MUNICIPAIS', 'parent_id' => 943],
            ['id' => 995, 'title' => 'SEMURB - COORDENADORIA DE LIMPEZA PÚBLICA', 'parent_id' => 949],
            ['id' => 996, 'title' => 'SEMURB - DIRETORIA DE REVITALIZAÇÃO URBANA', 'parent_id' => 949],
            ['id' => 997, 'title' => 'SEMURB - FISCALIZAÇÃO', 'parent_id' => 949],
            ['id' => 998, 'title' => 'SEMURB - LIMPEZA PÚBLICA', 'parent_id' => 949],
            ['id' => 999, 'title' => 'SEMURB - COLETA SELETIVA', 'parent_id' => 949],
            ['id' => 1000, 'title' => 'SEMURB - PODAS URBANAS', 'parent_id' => 949],
            ['id' => 1001, 'title' => 'SEMURB - APOIO TÉCNICO', 'parent_id' => 949],
            ['id' => 1002, 'title' => 'SEMURB - ADMINISTRATIVO', 'parent_id' => 949],
            ['id' => 1003, 'title' => 'SEMPA - GABINETE', 'parent_id' => 956],
            ['id' => 1004, 'title' => 'SEMPA - CANIL MUNICIPAL', 'parent_id' => 956],
            ['id' => 1005, 'title' => 'SEMPA - COORDENADORIA DE PROTEÇÃO ANIMAL', 'parent_id' => 956],
            ['id' => 1006, 'title' => 'SEMPA - PLANEJAMENTO E CONVÊNIOS', 'parent_id' => 956],
            ['id' => 1007, 'title' => 'SEMPA - VETERINÁRIA', 'parent_id' => 956],
            ['id' => 1008, 'title' => 'SEMPA - ATENDIMENTO DA PROTEÇÃO ANIMAL', 'parent_id' => 956],
            ['id' => 1009, 'title' => 'SEMPA - PROTEÇÃO A ANIMAIS SILVESTRES', 'parent_id' => 956],
            ['id' => 1010, 'title' => 'SMED - ALMOXARIFADO E PATRIMÔNIO', 'parent_id' => 336],
            ['id' => 1011, 'title' => 'SMED - PLAN. DE POLÍTICAS EDUCACIONAIS', 'parent_id' => 336],
            ['id' => 1013, 'title' => 'SEMHAB - GABINETE', 'parent_id' => 340],
            ['id' => 1014, 'title' => 'SEMHAB - DIR. DE PROGRAMAS HABITACIONAIS', 'parent_id' => 340],
            ['id' => 1015, 'title' => 'SEMHAB - DIR. DE RELAÇÕES COMUNITÁRIAS', 'parent_id' => 340],
            ['id' => 1016, 'title' => 'SEMHAB - CONVÊNIOS E PROJETOS', 'parent_id' => 340],
            ['id' => 1017, 'title' => 'SEMHAB - SERVIÇO SOCIAL', 'parent_id' => 340],
            ['id' => 1018, 'title' => 'SEMOV - COORDENADORIA ADMINISTRATIVA', 'parent_id' => 328],
            ['id' => 1019, 'title' => 'SEMOV - MANUTENÇÃO E LOGÍSTICA', 'parent_id' => 328],
            ['id' => 1020, 'title' => 'SEMOV - NÚCLEO DE SERRALHERIA', 'parent_id' => 328],
            ['id' => 1021, 'title' => 'SEMOV - NÚCLEO DE CARPINTARIA', 'parent_id' => 328],
            ['id' => 1022, 'title' => 'SEMOV - NÚCLEO DE ALMOXARIFADO', 'parent_id' => 328],
            ['id' => 1023, 'title' => 'SEMOV - NÚCLEO LIMPEZA PRAÇAS PÚBLICAS', 'parent_id' => 328],
            ['id' => 1024, 'title' => 'SGG - PLANEJAMENTO DE PROJETOS', 'parent_id' => 943],
            ['id' => 1025, 'title' => 'SDS - GABINETE', 'parent_id' => 338],
            ['id' => 1026, 'title' => 'SDS - DIRETORIA PROTEÇÃO SOCIAL BÁSICA', 'parent_id' => 338],
            ['id' => 1027, 'title' => 'SDS - DIRET. PROTEÇÃO SOCIAL ESPECIAL', 'parent_id' => 338],
            ['id' => 1028, 'title' => 'SDS - COORDENADORIA ADMINISTRATIVA', 'parent_id' => 338],
            ['id' => 1029, 'title' => 'SDS - FUNDO DA CRIANÇA E ADOLESCENTE', 'parent_id' => 338],
            ['id' => 1030, 'title' => 'SDS - CAD. ÚNICO PROGRAMAS SOCIAIS GOV', 'parent_id' => 338],
            ['id' => 1031, 'title' => 'SDS - CRAS CENTRO', 'parent_id' => 338],
            ['id' => 1032, 'title' => 'SDS - CRAS LESTE', 'parent_id' => 338],
            ['id' => 1033, 'title' => 'SDS - CRAS NORDESTE', 'parent_id' => 338],
            ['id' => 1034, 'title' => 'SDS - CRAS NORTE', 'parent_id' => 338],
            ['id' => 1035, 'title' => 'SDS - CRAS OESTE', 'parent_id' => 338],
            ['id' => 1036, 'title' => 'SDS - NÚCLEO DO BANCO DO AGASALHO', 'parent_id' => 338],
            ['id' => 1037, 'title' => 'SDS - CAPTAÇÃO DE RECURSOS FEDERAIS', 'parent_id' => 338],
            ['id' => 1038, 'title' => 'SDS - FINANCEIRO', 'parent_id' => 338],
            ['id' => 1039, 'title' => 'SDS - NÚCLEO DOS CONSELHOS', 'parent_id' => 338],
            ['id' => 1040, 'title' => 'SDS - PLANEJAMENTO E GESTÃO', 'parent_id' => 338],
            ['id' => 1041, 'title' => 'SDS - MÉDIA COMPLEXIDADE DO CREAS', 'parent_id' => 338],
            ['id' => 1042, 'title' => 'SDS - CENTRO POP', 'parent_id' => 338],
            ['id' => 1043, 'title' => 'SDS - CONVÊNIOS', 'parent_id' => 338],
            ['id' => 1044, 'title' => 'SDS - PROG. PROJETOS ALTA COMPLEXIDADE', 'parent_id' => 338],
            ['id' => 1045, 'title' => 'SDS - CASA DE ACOLHIMENTO', 'parent_id' => 338],
            ['id' => 1046, 'title' => 'SDS - CREPAR', 'parent_id' => 338],
            ['id' => 1047, 'title' => 'SDS - LAR SÃO FRANCISCO', 'parent_id' => 338],
            ['id' => 1048, 'title' => 'SDS - POLÍTICAS PARA A FAMÍLIA', 'parent_id' => 338],
            ['id' => 1049, 'title' => 'SDS - PROG. PROJ. PROT. SOCIAL BÁSICA', 'parent_id' => 338],
            ['id' => 1050, 'title' => 'SDS - APOIO TÉCNICO SOCIAL', 'parent_id' => 338],
            ['id' => 1051, 'title' => 'SDS - RECURSOS HUMANOS', 'parent_id' => 338],
            ['id' => 1052, 'title' => 'SDS - CONSELHO TUTELAR NORTE', 'parent_id' => 338],
            ['id' => 1053, 'title' => 'SEMMAM - JARDIM BOTÂNICO/HERBÁRIO', 'parent_id' => 346],
            ['id' => 1054, 'title' => 'SEMMAM - PROCESSOS ADMINISTRATIVOS', 'parent_id' => 346],
            ['id' => 1055, 'title' => 'SEMMAM - PROJETOS E CONVÊNIOS', 'parent_id' => 346],
            ['id' => 1056, 'title' => 'SEMMAM - EDUCAÇÃO AMBIENTAL', 'parent_id' => 346],
            ['id' => 1057, 'title' => 'SEMMAM - ARBORIZAÇÃO URBANA', 'parent_id' => 346],
            ['id' => 1058, 'title' => 'SEMMAM - DIRETORIA FISCALIZAÇÃO AMBIENTAL - INDUSTRIAL', 'parent_id' => 346],
            ['id' => 1059, 'title' => 'SEMMAM - DIRETORIA LICENCIAMENTO AMBIENTAL - INDUSTRIA', 'parent_id' => 346],
            ['id' => 1060, 'title' => 'SEMEL - ADMINISTRAÇÃO CENTRAL DE GABINETE', 'parent_id' => 957],
            ['id' => 1061, 'title' => 'SEMEL - NÚCLEO DE ESPAÇOS ESPORTIVOS', 'parent_id' => 957],
            ['id' => 1062, 'title' => 'SEMEL - NÚCLEO DE EVENTOS ESPORTIVOS', 'parent_id' => 957],
            ['id' => 1063, 'title' => 'SEMUSP - GABINETE', 'parent_id' => 916],
            ['id' => 1064, 'title' => 'SEMUSP - COORDENADORIA MUNICIPAL DA DEFESA CIVIL', 'parent_id' => 916],
            ['id' => 1065, 'title' => 'SEMUSP - CARTÓRIO DE TRÂNSITO DA GCM', 'parent_id' => 916],
            ['id' => 1066, 'title' => 'SEMUSP - ADMINISTRATIVO', 'parent_id' => 916],
            ['id' => 1067, 'title' => 'SEMUSP - DIR. PLANEJ. POLÍTICAS  PÚBLICAS SEGURANÇA', 'parent_id' => 916],
            ['id' => 1068, 'title' => 'SEMUSP - DIRETORIA DE SERVIÇOS INSTITUCIONAIS', 'parent_id' => 916],
            ['id' => 1069, 'title' => 'SEMUSP - RELAÇÕES COMUNITÁRIAS DA DEFESA CIVIL', 'parent_id' => 916],
            ['id' => 1070, 'title' => 'SEMUSP - FINANCEIRO', 'parent_id' => 916],
            ['id' => 1071, 'title' => 'SEMUSP - AÇÃO COMUNITÁRIA INSTITUCIONAL DEFESA CIVIL', 'parent_id' => 916],
            ['id' => 1072, 'title' => 'SEMUSP - PESSOAL DA GCM', 'parent_id' => 916],
            ['id' => 1073, 'title' => 'SEMUSP - SERVIÇOS INTERNOS DA GCM', 'parent_id' => 916],
            ['id' => 1074, 'title' => 'SEMUSP - ALMOXARIFADO E DA MANUTENÇÃO DA GCM', 'parent_id' => 916],
            ['id' => 1075, 'title' => 'SEMUSP - PROJETOS E CONVÊNIOS', 'parent_id' => 916],
            ['id' => 1076, 'title' => 'SEMUSP - DISCIPLINA ADMINISTRATIVA DA GCM', 'parent_id' => 916],
            ['id' => 1077, 'title' => 'SEMUSP - SERVIÇOS PATRIMONIAIS', 'parent_id' => 916],
            ['id' => 1078, 'title' => 'SEMUSP - ATIVIDADES TÉCNICAS DA DEFESA CIVIL', 'parent_id' => 916],
            ['id' => 1079, 'title' => 'SEMUSP - OPERAÇÕES E FISCALIZAÇÃO DE TRÂNSITO', 'parent_id' => 916],
            ['id' => 1080, 'title' => 'SEMUSP - FISCALIZAÇÃO DE TRANSPORTE', 'parent_id' => 916],
            ['id' => 1081, 'title' => 'SEMUSP - PREVENÇÃO A VIOLÊNCIA', 'parent_id' => 916],
            ['id' => 1082, 'title' => 'SEMUSP - NÚCLEO DE INFRAÇÕES', 'parent_id' => 916],
            ['id' => 1083, 'title' => 'SEMUSP - NÚCLEO JADA E JARI', 'parent_id' => 916],
            ['id' => 1084, 'title' => 'SEMUSP - OPERACIONAL DA ÁREA I DA GCM', 'parent_id' => 916],
            ['id' => 1085, 'title' => 'SEMUSP - OPERACIONAL DA ÁREA II DA GCM', 'parent_id' => 916],
            ['id' => 1086, 'title' => 'SEMUSP - OPERACIONAL DA ÁREA III DA GCM', 'parent_id' => 916],
            ['id' => 1087, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL DA ÁREA CENTRAL', 'parent_id' => 916],
            ['id' => 1088, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO CENTRO DA GCM', 'parent_id' => 916],
            ['id' => 1089, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO CENTRO II DA GCM', 'parent_id' => 916],
            ['id' => 1090, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO NORDESTE DA GCM', 'parent_id' => 916],
            ['id' => 1091, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO NORTE I DA GCM', 'parent_id' => 916],
            ['id' => 1092, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO NORTE II DA GCM', 'parent_id' => 916],
            ['id' => 1093, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO OESTE DA GCM', 'parent_id' => 916],
            ['id' => 1094, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO LESTE DA GCM', 'parent_id' => 916],
            ['id' => 1095, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO SUDESTE DA GCM', 'parent_id' => 916],
            ['id' => 1096, 'title' => 'SEMUSP - NÚCLEO OPERACIONAL REGIÃO SUL DA GCM', 'parent_id' => 916],
            ['id' => 1097, 'title' => 'SEPOM - DIRETORIA DE POLÍTICA DE PREVENÇÃO', 'parent_id' => 918],
            ['id' => 1098, 'title' => 'SEPOM - CENTRO JACOBINA', 'parent_id' => 918],
            ['id' => 1099, 'title' => 'SEPOM - ADMINISTRATIVO', 'parent_id' => 918],
            ['id' => 1100, 'title' => 'SEPOM - PROJETOS E CONVÊNIOS', 'parent_id' => 918],
            ['id' => 1101, 'title' => 'SEPOM - GABINETE', 'parent_id' => 918],
            ['id' => 1102, 'title' => 'SECOL - ASSESSORIA JURÍDICA', 'parent_id' => 312],
            ['id' => 1103, 'title' => 'SECOL - COORDENADORIA DE COMPRAS E LICITAÇÕES', 'parent_id' => 312],
            ['id' => 1104, 'title' => 'SECOL - COORDENADORIA DE GESTÃO DE CONTRATOS', 'parent_id' => 312],
            ['id' => 1105, 'title' => 'SECOL - DIRETORIA DE CONTRATAÇÕES', 'parent_id' => 312],
            ['id' => 1106, 'title' => 'SECOL - LICITAÇÕES', 'parent_id' => 312],
            ['id' => 1107, 'title' => 'SECOL - DISPENSAS E INEXIGIBILIDADES', 'parent_id' => 312],
            ['id' => 1108, 'title' => 'SEMFA - GABINETE DO SECRETÁRIO', 'parent_id' => 900],
            ['id' => 1109, 'title' => 'SEMFA - DIRETORIA DA RECEITA E ARRECADAÇÃO PÚBLICA', 'parent_id' => 900],
            ['id' => 1110, 'title' => 'SEMFA - NÚCLEO DO CENSO DO ICMS', 'parent_id' => 900],
            ['id' => 1111, 'title' => 'SEMFA - ARRECADAÇÃO', 'parent_id' => 900],
            ['id' => 1112, 'title' => 'SEMFA - NÚCLEO DE CADASTRO FAZENDÁRIO', 'parent_id' => 900],
            ['id' => 1113, 'title' => 'SEMFA - NÚCLEO DO SIMPLES NACIONAL', 'parent_id' => 900],
            ['id' => 1114, 'title' => 'SEMFA - NÚCLEO DE ITBI', 'parent_id' => 900],
            ['id' => 1115, 'title' => 'SEMFA - CONTABILIDADE GERAL', 'parent_id' => 900],
            ['id' => 1116, 'title' => 'SEMFA - CONTABILIDADE DE CUSTOS', 'parent_id' => 900],
            ['id' => 1117, 'title' => 'SEMFA - CONTABILIDADE CONSOLIDADA', 'parent_id' => 900],
            ['id' => 1118, 'title' => 'SEMFA - NÚCLEO DE CONCILIAÇÃO CONTÁBIL', 'parent_id' => 900],
            ['id' => 1119, 'title' => 'SEMFA - NÚCLEO DE CONCILIAÇÃO BANCÁRIA', 'parent_id' => 900],
            ['id' => 1120, 'title' => 'SEMFA - NÚCLEO DE ANÁLISE E CONTABILIZAÇÃO DA RECEITA', 'parent_id' => 900],
            ['id' => 1121, 'title' => 'SEMFA - NÚCLEO DE EXECUÇÃO ORÇAMENTÁRIA', 'parent_id' => 900],
            ['id' => 1122, 'title' => 'SEMFA - APLICAÇÃO FINANCEIRA', 'parent_id' => 900],
            ['id' => 1123, 'title' => 'SEMFA - NÚCLEO DE VINCULAÇÃO DE RECURSOS', 'parent_id' => 900],
            ['id' => 1124, 'title' => 'SEMFA - DIRETORIA FINANCEIRA', 'parent_id' => 900],
            ['id' => 1125, 'title' => 'SEMFA - NÚCLEO DE PAGAMENTOS E RELAÇÕES BANCÁRIAS', 'parent_id' => 900],
            ['id' => 1126, 'title' => 'SEMFA - NÚCLEO DE CONTENCIOSO JUDICIAL', 'parent_id' => 900],
            ['id' => 1127, 'title' => 'SEMFA - NÚCLEO DE CONTENCIOSO ADMINISTRATIVO', 'parent_id' => 900],
            ['id' => 1128, 'title' => 'SEMFA - NÚCLEO PROC. REC. FISCAIS ISS E SIMPLES NACIONAL', 'parent_id' => 900],
            ['id' => 1129, 'title' => 'SEMFA - NÚCLEO PROC. REC. FISCAIS IPTU E ITBI', 'parent_id' => 900],
            ['id' => 1130, 'title' => 'SEMSAD - DIRETORIA DE ENFERMAGEM', 'parent_id' => 350],
            ['id' => 1131, 'title' => 'SEMSAD - DIRETORIA DE REGULAÇÃO', 'parent_id' => 350],
            ['id' => 1132, 'title' => 'SEMSAD - DIRETORIA DE VIGILÂNCIA EM SAÚDE', 'parent_id' => 350],
            ['id' => 1133, 'title' => 'SEMSAD - DIRETORIA DE ASSISTÊNCIA MÉDIA COMPLEXIDADE', 'parent_id' => 350],
            ['id' => 1134, 'title' => 'SEMSAD - TECNOLOGIA DA INFORMAÇÃO - TI', 'parent_id' => 350],
            ['id' => 1135, 'title' => 'SEMSAD - AUDITORIA', 'parent_id' => 350],
            ['id' => 1136, 'title' => 'SEMSAD - FATURAMENTO', 'parent_id' => 350],
            ['id' => 1137, 'title' => 'SEMSAD - ADMINISTRATIVO', 'parent_id' => 350],
            ['id' => 1138, 'title' => 'SEMSAD - CONTRATOS E CONVÊNIOS', 'parent_id' => 350],
            ['id' => 1139, 'title' => 'SEMSAD - ENFERMAGEM', 'parent_id' => 350],
            ['id' => 1140, 'title' => 'SEMSAD - CONTROLE DE VEÍCULOS', 'parent_id' => 350],
            ['id' => 1141, 'title' => 'SEMSAD - REGULAÇÃO', 'parent_id' => 350],
            ['id' => 1142, 'title' => 'SEMSAD - MANUTENÇÃO', 'parent_id' => 350],
            ['id' => 1143, 'title' => 'SEMSAD - PROGRAMA DA FARMÁCIA POPULAR DO BRASIL', 'parent_id' => 350],
            ['id' => 1144, 'title' => 'SEMSAD - COORDENADORIA DE ATENÇÃO BÁSICA', 'parent_id' => 350],
            ['id' => 1145, 'title' => 'SEMSAD - PROGRAMA DE SAÚDE DA FAMÍLIA', 'parent_id' => 350],
            ['id' => 1146, 'title' => 'SEMSAD - PROGRAMA DE NUTRIÇÃO', 'parent_id' => 350],
            ['id' => 1147, 'title' => 'SEMSAD - COORDENADORIA DE ASSISTÊNCIA FARMACÊUTICA', 'parent_id' => 350],
            ['id' => 1148, 'title' => 'SEMSAD - PROGRAMA DE SAÚDE CRIANÇA E ADOLESCENTE', 'parent_id' => 350],
            ['id' => 1149, 'title' => 'SEMSAD - VIGILÂNCIA EPIDEMIOLÓGICA E IMUNIZAÇÃO', 'parent_id' => 350],
            ['id' => 1150, 'title' => 'SEMSAD - VIGILÂNCIA AMBIENTAL E ZOONOSES', 'parent_id' => 350],
            ['id' => 1151, 'title' => 'SEMSAD - COORDENADORIA DA SAÚDE DO TRABALHADOR', 'parent_id' => 350],
            ['id' => 1152, 'title' => 'SEMSAD - SERVIÇO DE ATENDIMENTO ESPECIALIZADO - SAE', 'parent_id' => 350],
            ['id' => 1153, 'title' => 'SEMSAD - CENTRO MEDICO CAPILÉ', 'parent_id' => 350],
            ['id' => 1154, 'title' => 'SEMSAD - URGÊNCIA E EMERGÊNCIAS - SAMU', 'parent_id' => 350],
            ['id' => 1155, 'title' => 'SEMSAD - COORDENADORIA ADMINISTRATIVA', 'parent_id' => 350],
            ['id' => 1156, 'title' => 'SEMSAD - COORDENADORIA DE MANUTENÇÃO', 'parent_id' => 350],
            ['id' => 1157, 'title' => 'SEMSAD - SAÚDE PREVENTIVA E OCUPACIONAL', 'parent_id' => 350],
            ['id' => 1158, 'title' => 'SEMAD - COORDENADORIA DE TECNOLOGIA DA INFORMAÇÃO', 'parent_id' => 307],
            ['id' => 1159, 'title' => 'SECOL - GABINETE', 'parent_id' => 312],
            ['id' => 1160, 'title' => 'SEMAD - GABINETE', 'parent_id' => 307],
            ['id' => 1161, 'title' => 'SEMAD - COORDENADORIA DE EXPEDIENTE ADMINISTRATIVO', 'parent_id' => 307],
            ['id' => 1162, 'title' => 'SEMAD - DIRETORIA DE EXPEDIENTE ADMINISTRATIVO', 'parent_id' => 307],
            ['id' => 1163, 'title' => 'SEMAD - EXPEDIENTE ADMINISTRATIVO', 'parent_id' => 307],
            ['id' => 1164, 'title' => 'SEMAD - PATRIMÔNIO', 'parent_id' => 307],
            ['id' => 1165, 'title' => 'SEMAD - SUPORTE TÉCNICO', 'parent_id' => 307],
            ['id' => 1166, 'title' => 'SEMAD - DESENVOLVIMENTO E SUPORTE DE SISTEMAS', 'parent_id' => 307],
            ['id' => 1167, 'title' => 'SEMAD - SERVICE DESK', 'parent_id' => 307],
            ['id' => 1168, 'title' => 'SEMAD - ALMOXARIFADO', 'parent_id' => 307],
            ['id' => 1169, 'title' => 'SEMAD - RECRUTAMENTO E SELEÇÃO', 'parent_id' => 307],
            ['id' => 1170, 'title' => 'SEMAD - DESENVOLVIMENTO FUNCIONAL', 'parent_id' => 307],
            ['id' => 1171, 'title' => 'SEMAD - FOLHA DE PAGAMENTO', 'parent_id' => 307],
            ['id' => 1172, 'title' => 'SEMAD - FOLHA DE PAGAMENTO DA EDUCAÇÃO', 'parent_id' => 307],
            ['id' => 1173, 'title' => 'SECULT - TEATRO', 'parent_id' => 959],
            ['id' => 1174, 'title' => 'SECULT - MUSEU DO TREM', 'parent_id' => 959],
            ['id' => 1175, 'title' => 'SECULT - SISTEMA MUNICIPAL DE CULTURA', 'parent_id' => 959],
            ['id' => 1176, 'title' => 'SECULT - AÇÕES CULTURAIS', 'parent_id' => 959],
            ['id' => 1177, 'title' => 'SECULT - INFORMAÇÕES TURÍSTICAS', 'parent_id' => 959],
            ['id' => 1178, 'title' => 'SECULT - EVENTOS TURÍSTICOS', 'parent_id' => 959],
            ['id' => 1179, 'title' => 'SECULT - ADMINISTRATIVO', 'parent_id' => 959],
            ['id' => 1180, 'title' => 'SGG - CTPM (DIRETORIA DE URBANISMO)', 'parent_id' => 943],
            ['id' => 1181, 'title' => 'SEMSAD - CONTABILIDADE', 'parent_id' => 350],
            ['id' => 1182, 'title' => 'SDS - ALMOXARIFADO', 'parent_id' => 338],
            ['id' => 1183, 'title' => 'SEMSAD - ALMOXARIFADO CENTRAL - SAÚDE', 'parent_id' => 350],
            ['id' => 1184, 'title' => 'CEVEN - FUNDAÇÃO CENTRO DE EVENTOS', 'parent_id' => 301],
            ['id' => 1186, 'title' => 'SGG - FINANCEIRO', 'parent_id' => 943],
            ['id' => 1187, 'title' => 'SDS - FUNDO DO IDOSO', 'parent_id' => 338],
            ['id' => 1188, 'title' => 'SDS - PROTEÇÃO SOCIAL ESPECIAL - PSE', 'parent_id' => 338],
            ['id' => 1189, 'title' => 'SDS - JURÍDICO', 'parent_id' => 338],
            ['id' => 1190, 'title' => 'ADGP - ASSESSORIA DIRETA AO PREFEITO MUNICIPAL ', 'parent_id' => 301],
            ['id' => 1191, 'title' => 'SGG - SUPERINTENDENCIA DE URBANISMO', 'parent_id' => 943],
            ['id' => 1192, 'title' => 'SGG - EQUIPE PATRIMÔNIO HIST. E CULTURAL', 'parent_id' => 943],
            ['id' => 1193, 'title' => 'SMED - ADMINISTRATIVO', 'parent_id' => 336],
            ['id' => 1194, 'title' => 'SMED - NAPPI', 'parent_id' => 336],
            ['id' => 1195, 'title' => 'SMED - NPM', 'parent_id' => 336],
            ['id' => 1196, 'title' => 'SMED - DTE', 'parent_id' => 336],
            ['id' => 1197, 'title' => 'SMED - CANOAGEM', 'parent_id' => 336],
            ['id' => 1198, 'title' => 'SMED - RH', 'parent_id' => 336],
            ['id' => 1200, 'title' => 'SEDETTEC - MEI', 'parent_id' => 343],
            ['id' => 1201, 'title' => 'SMED - NOTAS FISCAIS', 'parent_id' => 336],
            ['id' => 1202, 'title' => 'SEMOV - TOPOGRAFIA', 'parent_id' => 328],
            ['id' => 1203, 'title' => 'SEMSAD - VISA - SALA DO EMPREENDEDOR', 'parent_id' => 350],
            ['id' => 1204, 'title' => 'SUBPREFEITURA ZONA NORTE', 'parent_id' => 0],
            ['id' => 1205, 'title' => 'SUBPREFEITURA ZONA LESTE', 'parent_id' => 0],
            ['id' => 1206, 'title' => 'SEMMAM - AGO', 'parent_id' => 346],
            ['id' => 1207, 'title' => 'SEMMAM - AGA', 'parent_id' => 346],
            ['id' => 1208, 'title' => 'SEMMAM - DEAPPA', 'parent_id' => 346],
        ]);
    }
}
