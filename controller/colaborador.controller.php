<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/colaborador.dao.php";
require_once "../model/colaborador.class.php";
require_once "../model/produto_servico.dao.php";
require_once "../model/produto_servico.class.php";
require_once "../model/documento.dao.php";
require_once "../model/documento.class.php";
require_once "../model/movimentacao_estoque.dao.php";
require_once "../model/movimentacao_estoque.class.php";

require_once "../model/usuario_ponto.dao.php";
require_once "../model/usuario_ponto.class.php";

require_once "../model/conta.dao.php";
require_once "../model/conta.class.php";

require_once "../model/colaborador_beneficio.dao.php";
require_once "../model/colaborador_beneficio.class.php";

require_once "../model/colaborador_curso.dao.php";
require_once "../model/colaborador_curso.class.php";


require_once "../model/colaborador_nome_filho.dao.php";
require_once "../model/colaborador_nome_filho.class.php";

require_once "../model/afastamento_ferias_colaborador.dao.php";
require_once "../model/afastamento_ferias_colaborador.class.php";

require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";




$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_colaborador = $arrRequest['ds_colaborador'];
$ds_cel = $arrRequest['ds_cel'];
$ic_whatsapp = $arrRequest['ic_whatsapp'];
$ds_cel2 = $arrRequest['ds_cel2'];
$ic_whatsapp2 = $arrRequest['ic_whatsapp2'];
$ds_cel3 = $arrRequest['ds_cel3'];
$ic_whatsapp3 = $arrRequest['ic_whatsapp3'];
$ds_email = $arrRequest['ds_email'];
$ds_rg = $arrRequest['ds_rg'];
$ds_cpf = $arrRequest['ds_cpf'];
$dt_nascimento = $arrRequest['dt_nascimento'];
$ds_endereco = $arrRequest['ds_endereco'];
$ds_numero = $arrRequest['ds_numero'];
$ds_complemento = $arrRequest['ds_complemento'];
$ds_bairro = $arrRequest['ds_bairro'];
$ds_cep = $arrRequest['ds_cep'];
$ds_cidade = $arrRequest['ds_cidade'];
$ds_uf = $arrRequest['ds_uf'];
$ic_status = $arrRequest['ic_status'];
$ic_origem = $arrRequest['ic_origem'];
$ic_funcionario = $arrRequest['ic_funcionario'];
$generos_pk = $arrRequest['generos_pk'];
$ds_re = $arrRequest['ds_re'];
$ds_raca = $arrRequest['ds_raca'];
$ds_deficiencia_fisica = $arrRequest['ds_deficiencia_fisica'];
$estado_civil= $arrRequest['estado_civil'];
$ds_nome_pai = $arrRequest['ds_nome_pai'];
$ds_nome_mae = $arrRequest['ds_nome_mae'];
$ds_nome_conjuge = $arrRequest['ds_nome_conjuge'];
$dt_nascimento_conjuge = $arrRequest['dt_nascimento_conjuge'];
$ds_cpf_conjuge = $arrRequest['ds_cpf_conjuge'];
$ds_tel_conjuge = $arrRequest['ds_tel_conjuge'];
$regime_casamento = $arrRequest['regime_casamento'];
$ds_ctps = $arrRequest['ds_ctps'];
$ds_serie = $arrRequest['ds_serie'];
$dt_expedicao = $arrRequest['dt_expedicao'];
$ds_uf_rg = $arrRequest['ds_uf_rg'];
$ds_org_exp = $arrRequest['ds_org_exp'];
$ds_pis = $arrRequest['ds_pis'];
$ds_titulo_eleitoral = $arrRequest['ds_titulo_eleitoral'];
$ds_zona_eleitoral = $arrRequest['ds_zona_eleitoral'];
$ds_secao = $arrRequest['ds_secao'];
$ds_certificado_reservista = $arrRequest['ds_certificado_reservista'];
$ic_filho_menor_14 = $arrRequest['ic_filho_menor_14'];
$ic_reserva = $arrRequest['ic_reserva'];
$dt_demissao = $arrRequest['dt_demissao'];
$dt_admissao = $arrRequest['dt_admissao'];
$qtde_filho = $arrRequest['qtde_filho'];
$empresas_pk = $arrRequest['empresas_pk'];
$regime_contratacao_pk = $arrRequest['regime_contratacao_pk'];
$ds_carga_horaria_semanal = $arrRequest['ds_carga_horaria_semanal'];

$ds_entrada_dom = $arrRequest['ds_entrada_dom'];
$ds_ida_intervalo_dom = $arrRequest['ds_ida_intervalo_dom'];
$ds_volta_intervalo_dom = $arrRequest['ds_volta_intervalo_dom'];
$ds_saida_dom = $arrRequest['ds_saida_dom'];

$ds_entrada_seg = $arrRequest['ds_entrada_seg'];
$ds_ida_intervalo_seg = $arrRequest['ds_ida_intervalo_seg'];
$ds_volta_intervalo_seg = $arrRequest['ds_volta_intervalo_seg'];
$ds_saida_seg = $arrRequest['ds_saida_seg'];

$ds_entrada_ter = $arrRequest['ds_entrada_ter'];
$ds_ida_intervalo_ter = $arrRequest['ds_ida_intervalo_ter'];
$ds_volta_intervalo_ter = $arrRequest['ds_volta_intervalo_ter'];
$ds_saida_ter = $arrRequest['ds_saida_ter'];

$ds_entrada_qua = $arrRequest['ds_entrada_qua'];
$ds_ida_intervalo_qua = $arrRequest['ds_ida_intervalo_qua'];
$ds_volta_intervalo_qua = $arrRequest['ds_volta_intervalo_qua'];
$ds_saida_qua = $arrRequest['ds_saida_qua'];

$ds_entrada_qui = $arrRequest['ds_entrada_qui'];
$ds_ida_intervalo_qui = $arrRequest['ds_ida_intervalo_qui'];
$ds_volta_intervalo_qui = $arrRequest['ds_volta_intervalo_qui'];
$ds_saida_qui = $arrRequest['ds_saida_qui'];

$ds_entrada_sex = $arrRequest['ds_entrada_sex'];
$ds_ida_intervalo_sex = $arrRequest['ds_ida_intervalo_sex'];
$ds_volta_intervalo_sex = $arrRequest['ds_volta_intervalo_sex'];
$ds_saida_sex = $arrRequest['ds_saida_sex'];

$ds_entrada_sab = $arrRequest['ds_entrada_sab'];
$ds_ida_intervalo_sab = $arrRequest['ds_ida_intervalo_sab'];
$ds_volta_intervalo_sab = $arrRequest['ds_volta_intervalo_sab'];
$ds_saida_sab = $arrRequest['ds_saida_sab'];
$tipo_conta_bancaria = $arrRequest['tipo_conta_bancaria'];
$ds_conta = $arrRequest['ds_conta'];
$ds_agencia = $arrRequest['ds_agencia'];
$ds_digito = $arrRequest['ds_digito'];
$bancos_pk = $arrRequest['bancos_pk'];

$colaborador_beneficios = $arrRequest['colaborador_beneficios'];
$colaboradores_curso = $arrRequest['colaboradores_curso'];
$colaborador_nome_filho = $arrRequest['colaborador_nome_filho'];
$colaborador_afastamento = $arrRequest['colaborador_afastamento'];


$hr_entrada_dom = $arrRequest['hr_entrada_dom'];
$hr_saida_dom = $arrRequest['hr_saida_dom'];
$hr_entrada_seg = $arrRequest['hr_entrada_seg'];
$hr_saida_seg = $arrRequest['hr_saida_seg'];
$hr_entrada_ter = $arrRequest['hr_entrada_ter'];
$hr_saida_ter = $arrRequest['hr_saida_ter'];
$hr_entrada_qua = $arrRequest['hr_entrada_qua'];
$hr_saida_qua = $arrRequest['hr_saida_qua'];
$hr_entrada_qui = $arrRequest['hr_entrada_qui'];
$hr_saida_qui = $arrRequest['hr_saida_qui'];
$hr_entrada_sex = $arrRequest['hr_entrada_sex'];
$hr_saida_sex = $arrRequest['hr_saida_sex'];
$hr_entrada_sab = $arrRequest['hr_entrada_sab'];
$hr_saida_sab = $arrRequest['hr_saida_sab'];
$ic_dom = $arrRequest['ic_dom'];
$ic_seg = $arrRequest['ic_seg'];
$ic_ter = $arrRequest['ic_ter'];
$ic_qua = $arrRequest['ic_qua'];
$ic_qui = $arrRequest['ic_qui'];
$ic_sex = $arrRequest['ic_sex'];
$ic_sab = $arrRequest['ic_sab'];
$turnos_pk_dom = $arrRequest['turnos_pk_dom'];
$turnos_pk_seg = $arrRequest['turnos_pk_seg'];
$turnos_pk_ter = $arrRequest['turnos_pk_ter'];
$turnos_pk_qua = $arrRequest['turnos_pk_qua'];
$turnos_pk_qui = $arrRequest['turnos_pk_qui'];
$turnos_pk_sex = $arrRequest['turnos_pk_sex'];
$turnos_pk_sab = $arrRequest['turnos_pk_sab'];
$colaborador_ponto_pk = $arrRequest['colaborador_ponto_pk'];
$ic_registrar_ponto = $arrRequest['ic_registrar_ponto'];

$ds_nacionalidade = $arrRequest['ds_nacionalidade'];
$ds_matricula = $arrRequest['ds_matricula'];
$grau_escolaridade_pk = $arrRequest['grau_escolaridade_pk'];

$vl_salario = $arrRequest['vl_salario'];




$colaboradordao = new colaboradordao();
$colaboradordao->setToken($token);

$produto_servicodao = new produto_servicodao();
$produto_servicodao->setToken($token);

$documentodao = new documentodao();
$documentodao->setToken($token); 

$movimentacao_estoquedao = new movimentacao_estoquedao();
$movimentacao_estoquedao->setToken($token);

$usuario_pontodao = new usuario_pontodao();
$usuario_pontodao->setToken($token);

$contadao = new contadao();
$contadao->setToken($token);

$colaborador_beneficiodao = new colaborador_beneficiodao();
$colaborador_beneficiodao->setToken($token); 

$colaborador_cursodao = new colaborador_cursodao();
$colaborador_cursodao->setToken($token); 

$colaborador_nome_filhodao = new colaborador_nome_filhodao();
$colaborador_nome_filhodao->setToken($token); 

$afastamento_ferias_colaboradordao = new afastamento_ferias_colaboradordao();
$afastamento_ferias_colaboradordao->setToken($token); 

$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){

    case 'excluir':{
        /*if(!permissao("colaborador", "del", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }*/
        $resultdo = "";
        
        $colaborador = $colaboradordao->carregarPorPk($pk);
        if($colaborador->getpk()>0){
            
            
            
            
            $pk_produto_servico = $colaboradordao->listarPkProdutoServico($colaborador->getpk());
            
            if(count($pk_produto_servico)>0){
                for($i=0;$i<count($pk_produto_servico);$i++){
                    $log_exclusaodao->salvar("colaboradores_produtos_servicos", $pk_produto_servico[$i]['produtos_servicos_pk']);
                }
            }
            
            $pk_documentos = $colaboradordao->listarPkDocumentos($colaborador->getpk());
            
            if(count($pk_documentos)>0){
                for($i=0;$i<count($pk_documentos);$i++){
                    $log_exclusaodao->salvar("documentos", $pk_documentos[$i]['pk']);
                }
            }
            
            
            $pk_movimentacao_estoque = $colaboradordao->listarPkMovimentacaoEstoque($colaborador->getpk());
            
            if(count($pk_movimentacao_estoque)>0){
                for($i=0;$i<count($pk_movimentacao_estoque);$i++){
                    $log_exclusaodao->salvar("movimentacao_estoque", $pk_movimentacao_estoque[$i]['pk']);
                }
            }
            
            
            $pk_beneficio = $colaboradordao->listarPkColaboradorBeneficio($colaborador->getpk());
            
            if(count($pk_beneficio)>0){
                for($i=0;$i<count($pk_beneficio);$i++){
                    $log_exclusaodao->salvar("colaboradores_beneficios", $pk_beneficio[$i]['pk']);
                }
            }
            $pk_agenda_colaborador_padrao = $colaboradordao->listarPkAgendaColaboradorPadrao($colaborador->getpk());
            
            if(count($pk_agenda_colaborador_padrao)>0){
                for($i=0;$i<count($pk_agenda_colaborador_padrao);$i++){
                    $log_exclusaodao->salvar("agenda_colaborador_padrao", $pk_agenda_colaborador_padrao[$i]['pk']);
                }
            }
            $pk_agenda_colaborador_pausa= $colaboradordao->listarPkAgendaColaboradorPausa($colaborador->getpk());
            
            if(count($pk_agenda_colaborador_pausa)>0){
                for($i=0;$i<count($pk_agenda_colaborador_pausa);$i++){
                    $log_exclusaodao->salvar("agenda_colaborador_pausa", $pk_agenda_colaborador_pausa[$i]['pk']);
                }
            }
            
            
            $log_exclusaodao->salvar("colaboradores", $colaborador->getpk());
            
            
            
            $produto_servicodao->excluirProdutosServicosColaboradoresPk($colaborador->getpk());
            
            //remove os documentos
            $query = $documentodao->listar_por_colaboradores_pk($colaborador->getpk());
            $result  = 'success';
            $message = 'query success';

            if(count($query) > 0){
                for($i = 0; $i < count($query); $i++){
                    $nome_arquivo = $query[$i]['ds_documento'];
                    unlink("../docs/".$nome_arquivo);
                }
            }
            
            //exclui os documentos do BD
            $documentodao->excluirDocumentoColaboradoresPk($colaborador->getpk());
            
            $movimentacao_estoquedao->excluirMovimentacaoColaboradoresPk($colaborador->getpk());
            $colaborador_beneficiodao->excluirColaborador($colaborador->getpk());
            
            
            $colaboradordao->excluirAgenda($colaborador->getpk());
            $colaboradordao->excluirAgendaPausa($colaborador->getpk());
            $colaboradordao->excluir($colaborador);
            
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'colaborador nao encontrado';
        }
        break;
    }
    case 'salvar':{

        if($pk!=""){
            $ic_acao = "upd";
        }
        else{
            $ic_acao = "ins";
        }
        if(!permissao("colaborador", $ic_acao, $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        
        $produtos_servicos_colaboradores = $_REQUEST['produtos_servicos_colaboradores'];
        
        if($produtos_servicos_colaboradores != "")
            $arrProdutosServicosColaboradores = json_decode ($produtos_servicos_colaboradores, true);
        
    
        //Materiais Lead
        $materiais_lead = $_REQUEST['materiais_lead'];        
        if($materiais_lead != "")
            $arrMateriaisLead = json_decode ($materiais_lead, true);
        
        if($colaborador_beneficios != "")
            $arrColaboradorBeneficio = json_decode ($colaborador_beneficios, true);
        
        if($colaboradores_curso != "")
            $arrColaboradorCurso = json_decode ($colaboradores_curso, true);
        
        if($colaborador_nome_filho != "")
            $arrColaboradorNomeFilho = json_decode ($colaborador_nome_filho, true);
        
        if($colaborador_afastamento != "")
            $arrColaboradorAfastamento = json_decode ($colaborador_afastamento, true);
        
        
        $colaborador = $colaboradordao->carregarPorPk($pk);
        $colaborador->setds_colaborador($ds_colaborador);
        $colaborador->setds_cel($ds_cel);
        $colaborador->setic_whatsapp($ic_whatsapp);
        $colaborador->setds_cel2($ds_cel2);
        $colaborador->setic_whatsapp2($ic_whatsapp2);
        $colaborador->setds_cel3($ds_cel3);
        $colaborador->setic_whatsapp3($ic_whatsapp3);
        $colaborador->setds_email($ds_email);
        $colaborador->setds_rg($ds_rg);
        $colaborador->setds_cpf($ds_cpf);
        $colaborador->setdt_nascimento(DataYMD($dt_nascimento));
        $colaborador->setds_endereco($ds_endereco);
        $colaborador->setds_numero($ds_numero);
        $colaborador->setds_complemento($ds_complemento);
        $colaborador->setds_bairro($ds_bairro);
        $colaborador->setds_cep($ds_cep);
        $colaborador->setds_cidade($ds_cidade);
        $colaborador->setds_uf($ds_uf);
        $colaborador->setic_status($ic_status);
        $colaborador->setic_origem($ic_origem);
        $colaborador->setic_funcionario($ic_funcionario);
        $colaborador->setgeneros_pk($generos_pk);
        $colaborador->setds_re($ds_re);
        $colaborador->setds_raca($ds_raca);
        $colaborador->setds_deficiencia_fisica($ds_deficiencia_fisica);
        $colaborador->setestado_civil($estado_civil);
        $colaborador->setds_nome_pai($ds_nome_pai);
        $colaborador->setds_nome_mae($ds_nome_mae);
        $colaborador->setds_nome_conjuge($ds_nome_conjuge);
        $colaborador->setdt_nascimento_conjuge($dt_nascimento_conjuge);
        $colaborador->setds_cpf_conjuge($ds_cpf_conjuge);
        $colaborador->setds_tel_conjuge($ds_tel_conjuge);
        $colaborador->setregime_casamento($regime_casamento);
        $colaborador->setds_ctps($ds_ctps);
        $colaborador->setds_serie($ds_serie);
        $colaborador->setdt_expedicao($dt_expedicao);
        $colaborador->setds_uf_rg($ds_uf_rg);
        $colaborador->setds_org_exp($ds_org_exp);
        $colaborador->setds_pis($ds_pis);
        $colaborador->setds_titulo_eleitoral($ds_titulo_eleitoral);
        $colaborador->setds_zona_eleitoral($ds_zona_eleitoral);
        $colaborador->setds_secao($ds_secao);
        $colaborador->setds_certificado_reservista($ds_certificado_reservista);
        $colaborador->setic_filho_menor_14($ic_filho_menor_14);
        $colaborador->setds_nacionalidade($ds_nacionalidade);
        $colaborador->setds_matricula($ds_matricula);
        $colaborador->setgrau_escolaridade_pk($grau_escolaridade_pk);
        $colaborador->setic_reserva($ic_reserva);
        $colaborador->setdt_demissao($dt_demissao);
        $colaborador->setdt_admissao($dt_admissao);
        $colaborador->setqtde_filho($qtde_filho);
        
        $colaborador->setempresas_pk($empresas_pk);
        $colaborador->setregime_contratacao_pk($regime_contratacao_pk);
        $colaborador->setds_carga_horaria_semanal($ds_carga_horaria_semanal);
        
        $colaborador->setds_entrada_dom($ds_entrada_dom);
        $colaborador->setds_ida_intervalo_dom($ds_ida_intervalo_dom);
        $colaborador->setds_volta_intervalo_dom($ds_volta_intervalo_dom);
        $colaborador->setds_saida_dom($ds_saida_dom);
        
        $colaborador->setds_entrada_seg($ds_entrada_seg);
        $colaborador->setds_ida_intervalo_seg($ds_ida_intervalo_seg);
        $colaborador->setds_volta_intervalo_seg($ds_volta_intervalo_seg);
        $colaborador->setds_saida_seg($ds_saida_seg);
        
        $colaborador->setds_entrada_ter($ds_entrada_ter);
        $colaborador->setds_ida_intervalo_ter($ds_ida_intervalo_ter);
        $colaborador->setds_volta_intervalo_ter($ds_volta_intervalo_ter);
        $colaborador->setds_saida_ter($ds_saida_ter);
        
        $colaborador->setds_entrada_qua($ds_entrada_qua);
        $colaborador->setds_ida_intervalo_qua($ds_ida_intervalo_qua);
        $colaborador->setds_volta_intervalo_qua($ds_volta_intervalo_qua);
        $colaborador->setds_saida_qua($ds_saida_qua);
        
        $colaborador->setds_entrada_qui($ds_entrada_qui);
        $colaborador->setds_ida_intervalo_qui($ds_ida_intervalo_qui);
        $colaborador->setds_volta_intervalo_qui($ds_volta_intervalo_qui);
        $colaborador->setds_saida_qui($ds_saida_qui);
        
        $colaborador->setds_entrada_sex($ds_entrada_sex);
        $colaborador->setds_ida_intervalo_sex($ds_ida_intervalo_sex);
        $colaborador->setds_volta_intervalo_sex($ds_volta_intervalo_sex);
        $colaborador->setds_saida_sex($ds_saida_sex);
        
        $colaborador->setds_entrada_sab($ds_entrada_sab);
        $colaborador->setds_ida_intervalo_sab($ds_ida_intervalo_sab);
        $colaborador->setds_volta_intervalo_sab($ds_volta_intervalo_sab);
        $colaborador->setds_saida_sab($ds_saida_sab);
        $colaborador->settipo_conta_bancaria($tipo_conta_bancaria);
        $colaborador->setds_agencia($ds_agencia);
        $colaborador->setds_conta($ds_conta);
        $colaborador->setds_digito($ds_digito);
        $colaborador->setbancos_pk($bancos_pk);
        $colaborador->setvl_salario($vl_salario);

       
        $pk = $colaboradordao->salvar($colaborador);
        
        if($pk!=""){
            $colaborador_pk = $pk;
        }
        else{
            $colaborador_pk = $colaborador->getpk();
        }
        
        //SALVAR PIM
        $id_cliente_conta = $contadao->listarTodos();
        $colaboradordao->salvarDSPin($id_cliente_conta[0]['id_cliente']."-".$colaborador_pk,$colaborador_pk);
        
        if($pk!=""){
            $produto_servicodao->excluirProdutosServicosColaboradoresPk($pk);
        
            if(count($arrProdutosServicosColaboradores) > 0){
                for($i = 0; $i < count($arrProdutosServicosColaboradores); $i++){
                    $produto_servicodao->adicionarProdutosServicosColaboradores($pk, $arrProdutosServicosColaboradores[$i]['produtos_servicos_pk'], $arrProdutosServicosColaboradores[$i]["ic_possui_treinamento"],$arrProdutosServicosColaboradores[$i]["ic_possui_certificado"]);
                }
            }
        }
        else{
            $produto_servicodao->excluirProdutosServicosColaboradoresPk($colaborador->getpk());
        
            if(count($arrProdutosServicosColaboradores) > 0){
                for($i = 0; $i < count($arrProdutosServicosColaboradores); $i++){
                    $produto_servicodao->adicionarProdutosServicosColaboradores($colaborador->getpk(), $arrProdutosServicosColaboradores[$i]['produtos_servicos_pk'], $arrProdutosServicosColaboradores[$i]["ic_possui_treinamento"],$arrProdutosServicosColaboradores[$i]["ic_possui_certificado"]);
                }
            }
        }

        //Nome Filho
        if(count($arrColaboradorNomeFilho) > 0){  
            $colaborador_nome_filhodao->excluirColaboradorPk($colaborador_pk);
            for($i = 0; $i < count($arrColaboradorNomeFilho); $i++){ 

                $colaborador_nome_filho = $colaborador_nome_filhodao->carregarPorPk(0);
                $colaborador_nome_filho->setcolaborador_pk($colaborador_pk);
                $colaborador_nome_filho->setds_nome_filho($arrColaboradorNomeFilho[$i]['ds_nome_filho']);
                $colaborador_nome_filho->setds_cpf_filho($arrColaboradorNomeFilho[$i]['ds_cpf_filho']);
                $colaborador_nome_filho->setdt_nascimento_filho(DataYMD($arrColaboradorNomeFilho[$i]['dt_nascimento_filho']));


                $nome_filho_pk = $colaborador_nome_filhodao->salvar($colaborador_nome_filho);

            }
        }
        //Materiais
        if(count($arrMateriaisLead) > 0){  

            for($i = 0; $i < count($arrMateriaisLead); $i++){ 

                $movimentacao_estoque = $movimentacao_estoquedao->carregarPorPk($arrMateriaisLead[$i]['movimentacao_estoque_pk']);                  

                $movimentacao_estoque->setcolaborador_pk($pk);

                $movimentacao_estoque->setprodutos_itens_pk($arrMateriaisLead[$i]['produtos_itens_pk']);
                $movimentacao_estoque->setqtde("1");
                $movimentacao_estoque->setdt_entrega(DataYMD($arrMateriaisLead[$i]['dt_entrega']));
   
                if($arrMateriaisLead[$i]['dt_devolucao']!=""){
                    $movimentacao_estoque->setdt_devolucao(DataYMD($arrMateriaisLead[$i]['dt_devolucao']));
                }                
                $movimentacao_estoque->setobs_movimentacao($arrMateriaisLead[$i]['obs_movimentacao']);

                $pk = $movimentacao_estoquedao->salvar($movimentacao_estoque);
            }
        }
        //BENEFICIOS
        if(count($arrColaboradorBeneficio) > 0){  
            $colaborador_beneficiodao->excluirColaborador($colaborador_pk);
            for($i = 0; $i < count($arrColaboradorBeneficio); $i++){ 
                
                
                
                $colaborador_beneficio = $colaborador_beneficiodao->carregarPorPk("");
                $colaborador_beneficio->setvl_beneficio($arrColaboradorBeneficio[$i]['vl_beneficio']);
                $colaborador_beneficio->setobs($arrColaboradorBeneficio[$i]['obs']);
                $colaborador_beneficio->setic_status("");
                $colaborador_beneficio->setbeneficios_pk($arrColaboradorBeneficio[$i]['beneficios_pk']);
                $colaborador_beneficio->setcolaborador_pk($colaborador_pk);


                $pk = $colaborador_beneficiodao->salvar($colaborador_beneficio);
            }
        }
        
        //AFASTAMENTO
        if(count($arrColaboradorAfastamento) > 0){  
            $afastamento_ferias_colaboradordao->excluirColaborador($colaborador_pk);
            for($i = 0; $i < count($arrColaboradorAfastamento); $i++){ 
                
                $afastamento_ferias_colaborador = $afastamento_ferias_colaboradordao->carregarPorPk(0);
                $afastamento_ferias_colaborador->settipo_apontamento($arrColaboradorAfastamento[$i]['tipo_apontamento']);
                $afastamento_ferias_colaborador->setdt_inicio(DataYMD($arrColaboradorAfastamento[$i]['dt_inicio']));
                if($arrColaboradorAfastamento[$i]['dt_fim']!=""){
                    $afastamento_ferias_colaborador->setdt_fim(DataYMD($arrColaboradorAfastamento[$i]['dt_fim']));
                }
                
                $afastamento_ferias_colaborador->setds_obs($arrColaboradorAfastamento[$i]['obs']);
                $afastamento_ferias_colaborador->setcolaborador_pk($colaborador_pk);


                $afastamento_pk = $afastamento_ferias_colaboradordao->salvar($afastamento_ferias_colaborador);
            }
        }
        if(count($arrColaboradorCurso) > 0){  
            $colaborador_cursodao->excluirColaborador($colaborador_pk);
            for($i = 0; $i < count($arrColaboradorCurso); $i++){ 
                $colaborador_curso = $colaborador_cursodao->carregarPorPk($pk);
                $colaborador_curso->setcolaboradores_pk($colaborador_pk);
                $colaborador_curso->setcursos_pk($arrColaboradorCurso[$i]['cursos_pk']);
                $colaborador_curso->setdt_execucao($arrColaboradorCurso[$i]['dt_execucao']);
                $colaborador_curso->setdt_validacao($arrColaboradorCurso[$i]['dt_validacao']);


                $pk = $colaborador_cursodao->salvar($colaborador_curso);
            }
        }
        
        
        $usuario_ponto = $usuario_pontodao->carregarPorPk($colaborador_ponto_pk);
        $usuario_ponto->sethr_entrada_dom($hr_entrada_dom);
        $usuario_ponto->sethr_saida_dom($hr_saida_dom);
        $usuario_ponto->sethr_entrada_seg($hr_entrada_seg);
        $usuario_ponto->sethr_saida_seg($hr_saida_seg);
        $usuario_ponto->sethr_entrada_ter($hr_entrada_ter);
        $usuario_ponto->sethr_saida_ter($hr_saida_ter);
        $usuario_ponto->sethr_entrada_qua($hr_entrada_qua);
        $usuario_ponto->sethr_saida_qua($hr_saida_qua);
        $usuario_ponto->sethr_entrada_qui($hr_entrada_qui);
        $usuario_ponto->sethr_saida_qui($hr_saida_qui);
        $usuario_ponto->sethr_entrada_sex($hr_entrada_sex);
        $usuario_ponto->sethr_saida_sex($hr_saida_sex);
        $usuario_ponto->sethr_entrada_sab($hr_entrada_sab);
        $usuario_ponto->sethr_saida_sab($hr_saida_sab);
        $usuario_ponto->setic_dom($ic_dom);
        $usuario_ponto->setic_seg($ic_seg);
        $usuario_ponto->setic_ter($ic_ter);
        $usuario_ponto->setic_qua($ic_qua);
        $usuario_ponto->setic_qui($ic_qui);
        $usuario_ponto->setic_sex($ic_sex);
        $usuario_ponto->setic_sab($ic_sab);
        $usuario_ponto->setturnos_pk_dom($turnos_pk_dom);
        $usuario_ponto->setturnos_pk_seg($turnos_pk_seg);
        $usuario_ponto->setturnos_pk_ter($turnos_pk_ter);
        $usuario_ponto->setturnos_pk_qua($turnos_pk_qua);
        $usuario_ponto->setturnos_pk_qui($turnos_pk_qui);
        $usuario_ponto->setturnos_pk_sex($turnos_pk_sex);
        $usuario_ponto->setturnos_pk_sab($turnos_pk_sab);
        $usuario_ponto->setcolaborador_pk($colaborador_pk);
        $usuario_ponto->setic_registrar_ponto($ic_registrar_ponto);
        
        $usuario_pontos = $usuario_pontodao->salvar($usuario_ponto);
        
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    
    case 'salvarSite':{
        if($pk!=""){
            $ic_acao = "upd";
        }else{
            $ic_acao = "ins";
        }
       

        $colaborador = $colaboradordao->carregarPorPk($pk);
        $colaborador->setds_colaborador($ds_colaborador);
        $colaborador->setds_cel($ds_cel);
        $colaborador->setic_whatsapp($ic_whatsapp);
        $colaborador->setds_cel2($ds_cel2);
        $colaborador->setic_whatsapp2($ic_whatsapp2);
        $colaborador->setds_cel3($ds_cel3);
        $colaborador->setic_whatsapp3($ic_whatsapp3);
        $colaborador->setds_email($ds_email);
        $colaborador->setds_rg($ds_rg);
        $colaborador->setds_cpf($ds_cpf);
        $colaborador->setdt_nascimento(DataYMD($dt_nascimento));
        $colaborador->setds_endereco($ds_endereco);
        $colaborador->setds_numero($ds_numero);
        $colaborador->setds_complemento($ds_complemento);
        $colaborador->setds_bairro($ds_bairro);
        $colaborador->setds_cep($ds_cep);
        $colaborador->setds_cidade($ds_cidade);
        $colaborador->setds_uf($ds_uf);
        $colaborador->setic_status($ic_status);
        $colaborador->setic_origem($ic_origem);
        $colaborador->setic_funcionario($ic_funcionario);
        $colaborador->setgeneros_pk($generos_pk);
        $colaborador->setds_re($ds_re);
        $colaborador->setds_raca($ds_raca);
        $colaborador->setds_deficiencia_fisica($ds_deficiencia_fisica);
        $colaborador->setestado_civil($estado_civil);
        $colaborador->setds_nome_pai($ds_nome_pai);
        $colaborador->setds_nome_mae($ds_nome_mae);
        $colaborador->setds_nome_conjuge($ds_nome_conjuge);
        $colaborador->setdt_nascimento_conjuge($dt_nascimento_conjuge);
        $colaborador->setds_cpf_conjuge($ds_cpf_conjuge);
        $colaborador->setds_tel_conjuge($ds_tel_conjuge);
        $colaborador->setregime_casamento($regime_casamento);
        $colaborador->setds_ctps($ds_ctps);
        $colaborador->setds_serie($ds_serie);
        $colaborador->setdt_expedicao($dt_expedicao);
        $colaborador->setds_uf_rg($ds_uf_rg);
        $colaborador->setds_org_exp($ds_org_exp);
        $colaborador->setds_pis($ds_pis);
        $colaborador->setds_titulo_eleitoral($ds_titulo_eleitoral);
        $colaborador->setds_zona_eleitoral($ds_zona_eleitoral);
        $colaborador->setds_secao($ds_secao);
        $colaborador->setds_certificado_reservista($ds_certificado_reservista);
        $colaborador->setic_filho_menor_14($ic_filho_menor_14);
        $colaborador->setds_nacionalidade($ds_nacionalidade);
        $colaborador->setds_matricula($ds_matricula);
        $colaborador->setgrau_escolaridade_pk($grau_escolaridade_pk);
        $colaborador->setic_reserva($ic_reserva);
        $colaborador->setdt_demissao($dt_demissao);
        $colaborador->setdt_admissao($dt_admissao);
        $colaborador->setqtde_filho($qtde_filho);
        
        $colaborador->setempresas_pk($empresas_pk);
        $colaborador->setregime_contratacao_pk($regime_contratacao_pk);
        $colaborador->setds_carga_horaria_semanal($ds_carga_horaria_semanal);
        
        $colaborador->setds_entrada_dom($ds_entrada_dom);
        $colaborador->setds_ida_intervalo_dom($ds_ida_intervalo_dom);
        $colaborador->setds_volta_intervalo_dom($ds_volta_intervalo_dom);
        $colaborador->setds_saida_dom($ds_saida_dom);
        
        $colaborador->setds_entrada_seg($ds_entrada_seg);
        $colaborador->setds_ida_intervalo_seg($ds_ida_intervalo_seg);
        $colaborador->setds_volta_intervalo_seg($ds_volta_intervalo_seg);
        $colaborador->setds_saida_seg($ds_saida_seg);
        
        $colaborador->setds_entrada_ter($ds_entrada_ter);
        $colaborador->setds_ida_intervalo_ter($ds_ida_intervalo_ter);
        $colaborador->setds_volta_intervalo_ter($ds_volta_intervalo_ter);
        $colaborador->setds_saida_ter($ds_saida_ter);
        
        $colaborador->setds_entrada_qua($ds_entrada_qua);
        $colaborador->setds_ida_intervalo_qua($ds_ida_intervalo_qua);
        $colaborador->setds_volta_intervalo_qua($ds_volta_intervalo_qua);
        $colaborador->setds_saida_qua($ds_saida_qua);
        
        $colaborador->setds_entrada_qui($ds_entrada_qui);
        $colaborador->setds_ida_intervalo_qui($ds_ida_intervalo_qui);
        $colaborador->setds_volta_intervalo_qui($ds_volta_intervalo_qui);
        $colaborador->setds_saida_qui($ds_saida_qui);
        
        $colaborador->setds_entrada_sex($ds_entrada_sex);
        $colaborador->setds_ida_intervalo_sex($ds_ida_intervalo_sex);
        $colaborador->setds_volta_intervalo_sex($ds_volta_intervalo_sex);
        $colaborador->setds_saida_sex($ds_saida_sex);
        
        $colaborador->setds_entrada_sab($ds_entrada_sab);
        $colaborador->setds_ida_intervalo_sab($ds_ida_intervalo_sab);
        $colaborador->setds_volta_intervalo_sab($ds_volta_intervalo_sab);
        $colaborador->setds_saida_sab($ds_saida_sab);
        
        $colaborador->settipo_conta_bancaria($tipo_conta_bancaria);
        $colaborador->setds_agencia($ds_agencia);
        $colaborador->setds_conta($ds_conta);
        $colaborador->setds_digito($ds_digito);
        $colaborador->setbancos_pk($bancos_pk);

        $pk = $colaboradordao->salvar($colaborador);
        
         if($pk!=""){
            $colaborador_pk = $pk;
        }
        else{
            $colaborador_pk = $colaborador->getpk();
        }
        
        //SALVAR PIM
        $id_cliente_conta = $contadao->listarTodos();
        $colaboradordao->salvarDSPin($id_cliente_conta[0]['id_cliente']."-".$colaborador_pk,$colaborador_pk);
               
        // Qualificação
        $produto_servicodao->adicionarProdutosServicosColaboradores($pk, $_REQUEST['produtos_servicos_pk'],0,0);

        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    
    
    case 'listarPk':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $colaboradordao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_cel"=>$query[$i]['ds_cel'],
                    "ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "ds_cel2"=>$query[$i]['ds_cel2'],
                    "ic_whatsapp2"=>$query[$i]['ic_whatsapp2'],
                    "ds_cel3"=>$query[$i]['ds_cel3'],
                    "ic_whatsapp3"=>$query[$i]['ic_whatsapp3'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_rg"=>$query[$i]['ds_rg'],
                    "ds_cpf"=>$query[$i]['ds_cpf'],
                    "dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "ic_status"=>$query[$i]['ic_status'],
                    "ic_funcionario"=>$query[$i]['ic_funcionario'],
                    "generos_pk"=>$query[$i]['generos_pk'],
                    "hr_entrada_dom"=>$query[$i]['hr_entrada_dom'],
                    "hr_saida_dom"=>$query[$i]['hr_saida_dom'],
                    "hr_entrada_seg"=>$query[$i]['hr_entrada_seg'],
                    "hr_saida_seg"=>$query[$i]['hr_saida_seg'],
                    "hr_entrada_ter"=>$query[$i]['hr_entrada_ter'],
                    "hr_saida_ter"=>$query[$i]['hr_saida_ter'],
                    "hr_entrada_qua"=>$query[$i]['hr_entrada_qua'],
                    "hr_saida_qua"=>$query[$i]['hr_saida_qua'],
                    "hr_entrada_qui"=>$query[$i]['hr_entrada_qui'],
                    "hr_saida_qui"=>$query[$i]['hr_saida_qui'],
                    "hr_entrada_sex"=>$query[$i]['hr_entrada_sex'],
                    "hr_saida_sex"=>$query[$i]['hr_saida_sex'],
                    "hr_entrada_sab"=>$query[$i]['hr_entrada_sab'],
                    "hr_saida_sab"=>$query[$i]['hr_saida_sab'],
                    "ic_dom"=>$query[$i]['ic_dom'],
                    "ic_seg"=>$query[$i]['ic_seg'],
                    "ic_ter"=>$query[$i]['ic_ter'],
                    "ic_qua"=>$query[$i]['ic_qua'],
                    "ic_qui"=>$query[$i]['ic_qui'],
                    "ic_sex"=>$query[$i]['ic_sex'],
                    "ic_sab"=>$query[$i]['ic_sab'],
                    "turnos_pk_dom"=>$query[$i]['turnos_pk_dom'],
                    "turnos_pk_seg"=>$query[$i]['turnos_pk_seg'],
                    "turnos_pk_ter"=>$query[$i]['turnos_pk_ter'],
                    "turnos_pk_qua"=>$query[$i]['turnos_pk_qua'],
                    "turnos_pk_qui"=>$query[$i]['turnos_pk_qui'],
                    "turnos_pk_sex"=>$query[$i]['turnos_pk_sex'],
                    "turnos_pk_sab"=>$query[$i]['turnos_pk_sab'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "estado_civil"=>$query[$i]['estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "ic_filho_menor_14"=>$query[$i]['ic_filho_menor_14'],
                    "colaborador_ponto_pk"=>$query[$i]['colaborador_ponto_pk'],
                    "ic_registrar_ponto"=>$query[$i]['ic_registrar_ponto'],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "ds_nacionalidade"=>$query[$i]['ds_nacionalidade'],
                    "ds_matricula"=>$query[$i]['ds_matricula'],
                    "grau_escolaridade_pk"=>$query[$i]['grau_escolaridade_pk'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "dt_liberacao"=>$query[$i]['dt_liberacao'],
                    "ds_status_app"=>$query[$i]['ds_status_app'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "empresas_pk"=>$query[$i]['empresas_pk'],
                    "regime_contratacao_pk"=>$query[$i]['regime_contratacao_pk'],
                    "ds_carga_horaria_semanal"=>$query[$i]['ds_carga_horaria_semanal'],
                    
                    "ds_entrada_dom"=>$query[$i]['ds_entrada_dom'],
                    "ds_ida_intervalo_dom"=>$query[$i]['ds_ida_intervalo_dom'],
                    "ds_volta_intervalo_dom"=>$query[$i]['ds_volta_intervalo_dom'],
                    "ds_saida_dom"=>$query[$i]['ds_saida_dom'],
                    
                    "ds_entrada_seg"=>$query[$i]['ds_entrada_seg'],
                    "ds_ida_intervalo_seg"=>$query[$i]['ds_ida_intervalo_seg'],
                    "ds_volta_intervalo_seg"=>$query[$i]['ds_volta_intervalo_seg'],
                    "ds_saida_seg"=>$query[$i]['ds_saida_seg'],
                    
                    "ds_entrada_ter"=>$query[$i]['ds_entrada_ter'],
                    "ds_ida_intervalo_ter"=>$query[$i]['ds_ida_intervalo_ter'],
                    "ds_volta_intervalo_ter"=>$query[$i]['ds_volta_intervalo_ter'],
                    "ds_saida_ter"=>$query[$i]['ds_saida_ter'],
                    
                    "ds_entrada_qua"=>$query[$i]['ds_entrada_qua'],
                    "ds_ida_intervalo_qua"=>$query[$i]['ds_ida_intervalo_qua'],
                    "ds_volta_intervalo_qua"=>$query[$i]['ds_volta_intervalo_qua'],
                    "ds_saida_qua"=>$query[$i]['ds_saida_qua'],
                    
                    "ds_entrada_qui"=>$query[$i]['ds_entrada_qui'],
                    "ds_ida_intervalo_qui"=>$query[$i]['ds_ida_intervalo_qui'],
                    "ds_volta_intervalo_qui"=>$query[$i]['ds_volta_intervalo_qui'],
                    "ds_saida_qui"=>$query[$i]['ds_saida_qui'],
                    
                    "ds_entrada_sex"=>$query[$i]['ds_entrada_sex'],
                    "ds_ida_intervalo_sex"=>$query[$i]['ds_ida_intervalo_sex'],
                    "ds_volta_intervalo_sex"=>$query[$i]['ds_volta_intervalo_sex'],
                    "ds_saida_sex"=>$query[$i]['ds_saida_sex'],
                    
                    "ds_entrada_sab"=>$query[$i]['ds_entrada_sab'],
                    "ds_ida_intervalo_sab"=>$query[$i]['ds_ida_intervalo_sab'],
                    "ds_volta_intervalo_sab"=>$query[$i]['ds_volta_intervalo_sab'],
                    "ds_saida_sab"=>$query[$i]['ds_saida_sab'],
                    "tipo_conta_bancaria"=>$query[$i]['tipo_conta_bancaria'],
                    "ds_conta"=>$query[$i]['ds_conta'],
                    "ds_agencia"=>$query[$i]['ds_agencia'],
                    "ds_digito"=>$query[$i]['ds_digito'],
                    "bancos_pk"=>$query[$i]['bancos_pk'],
                    "vl_salario"=>$query[$i]['vl_salario'],                    
                    "ds_genero"=>$query[$i]['ds_genero'],                    
                    "ds_banco"=>$query[$i]['ds_banco'],                    
                    "ds_estado_civil"=>$query[$i]['ds_estado_civil'],                    
                    "ds_escolaridade"=>$query[$i]['ds_escolaridade'],                    
                    "ds_produto_servico"=>$query[$i]['ds_produto_servico'],      
                    "ds_razao_social_empresa"=>$query[$i]['ds_razao_social_empresa'],      
                    "ds_cpf_cnpj_empresa"=>$query[$i]['ds_cpf_cnpj_empresa'],      
                    "ds_tel_empresa"=>$query[$i]['ds_tel_empresa'],      
                    "ds_email_empresa"=>$query[$i]['ds_email_empresa'],      
                    "ds_cel_empresa"=>$query[$i]['ds_cel_empresa'],      
                    "ds_cep_empresa"=>$query[$i]['ds_cep_empresa'],      
                    "ds_endereco_empresa"=>$query[$i]['ds_endereco_empresa'],      
                    "ds_numero_empresa"=>$query[$i]['ds_numero_empresa'],      
                    "ds_complemento_empresa"=>$query[$i]['ds_complemento_empresa'],      
                    "ds_bairro_empresa"=>$query[$i]['ds_bairro_empresa'],      
                    "ds_cidade_empresa"=>$query[$i]['ds_cidade_empresa'],      
                    "ds_uf_empresa"=>$query[$i]['ds_uf_empresa'],      
                    
                    
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarFormulario':{
        $resultado = "";
        $query = $colaboradordao->listarFormulario();
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_formulario"=>$query[$i]['ds_formulario'],
                    "ds_link"=>$query[$i]['ds_link'],
                                  
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarPorPkEFuncao':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $colaboradordao->listarPorPkEFuncao($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                    
                    
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarColaboradorPorDsFuncao':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $ds_funcao = $_REQUEST['ds_funcao'];
        $resultado = "";
        $query = $colaboradordao->listarColaboradorPorDsFuncao($ds_funcao);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    
                    
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarColaboradorAgenda':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $colaboradordao->listarColaboradorAgenda();
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_cel"=>$query[$i]['ds_cel'],
                    "ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "ds_cel2"=>$query[$i]['ds_cel2'],
                    "ic_whatsapp2"=>$query[$i]['ic_whatsapp2'],
                    "ds_cel3"=>$query[$i]['ds_cel3'],
                    "ic_whatsapp3"=>$query[$i]['ic_whatsapp3'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_rg"=>$query[$i]['ds_rg'],
                    "ds_cpf"=>$query[$i]['ds_cpf'],
                    "dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "ic_status"=>$query[$i]['ic_status'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "estado_civil"=>$query[$i]['estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "ic_filho_menor_14"=>$query[$i]['ic_filho_menor_14'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                    "generos_pk"=>$query[$i]['generos_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTodos':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $colaboradordao->listar_por_ds_colaborador($ds_colaborador,$ic_status,$produtos_servicos_pk,$ds_pin,$generos_pk,$ds_re,$ic_status_app,$ic_reserva,"","","");
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_cel"=>$query[$i]['ds_cel'],
                    "ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "ds_cel2"=>$query[$i]['ds_cel2'],
                    "ic_whatsapp2"=>$query[$i]['ic_whatsapp2'],
                    "ds_cel3"=>$query[$i]['ds_cel3'],
                    "ic_whatsapp3"=>$query[$i]['ic_whatsapp3'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_rg"=>$query[$i]['ds_rg'],
                    "ds_cpf"=>$query[$i]['ds_cpf'],
                    "dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "ic_status"=>$query[$i]['ic_status'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "estado_civil"=>$query[$i]['estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "ic_filho_menor_14"=>$query[$i]['ic_filho_menor_14'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                    "generos_pk"=>$query[$i]['generos_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarColaboradorLead':{
        $leads_pk = $_REQUEST['leads_pk'];
        $resultado = "";
        $query = $colaboradordao->listarColaboradorLead($leads_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador']
                    
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTodosComboRelSemEscala':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $colaboradordao->listarTodosComboRelSemEscala();
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_cel"=>$query[$i]['ds_cel'],
                    "ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "ds_cel2"=>$query[$i]['ds_cel2'],
                    "ic_whatsapp2"=>$query[$i]['ic_whatsapp2'],
                    "ds_cel3"=>$query[$i]['ds_cel3'],
                    "ic_whatsapp3"=>$query[$i]['ic_whatsapp3'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_rg"=>$query[$i]['ds_rg'],
                    "ds_cpf"=>$query[$i]['ds_cpf'],
                    "dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "ic_status"=>$query[$i]['ic_status'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "estado_civil"=>$query[$i]['estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "ic_filho_menor_14"=>$query[$i]['ic_filho_menor_14'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                    "generos_pk"=>$query[$i]['generos_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'verificarCPF':{
   
        $resultado = "";
        $query = $colaboradordao->verificarCPF($ds_cpf);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                   
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'RelatorioPinColaborador':{
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        $ic_status = $_REQUEST['ic_status'];
        $resultado = "";
        $query = $colaboradordao->RelatorioPinColaborador($colaborador_pk,$ic_status);
        
        $result  = 'success';
        $message = 'query success';

          
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                
                if($query[$i]["status_ponto"]==""){
                    $ds_status = "Liberação Não Solicitada";
                }
                else{
                    $ds_status = $query[$i]["ds_status"];
                }
                
                $mysql_data[] = array(
                    "ds_colaborador" => $query[$i]["ds_colaborador"],
                    "ds_pin" => $query[$i]["ds_pin"],
                    "ds_status" => $ds_status,
                   
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    
    case 'listarDadosColaborador':{
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        $resultado = "";
        $query = $colaboradordao->listarDadosColaborador($colaborador_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin']
                );
            }
        }
        else{
            $mysql_data = [];
        }
	
        break;
    }
    
    
    case 'listarTodosRel':{
        $resultado = "";
        $query = $colaboradordao->listarTodosColaboradoresEServicos($ds_colaborador);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador']." (".$query[$i]['ds_produto_servico'].")"
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTodosReservas':{
        $resultado = "";
        $query = $colaboradordao->listarTodosReservas();
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarDadosBancarios':{
        $resultado = "";
        $query = $colaboradordao->listarDadosBancarios($pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "ds_agencia" => $query[$i]["ds_agencia"],
                    "ds_banco" => $query[$i]["ds_banco"],
                    "ds_conta"=>$query[$i]['ds_conta']." - ".$query[$i]['ds_digito']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'RelatorioColaboradorSemEscala':{
        $resultado = "";
        $query = $colaboradordao->RelatorioColaboradorSemEscala($pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "ds_re" => $query[$i]["ds_re"],
                    "dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "ds_status"=>$query[$i]['ds_status'],
                    "ds_funcionario"=>$query[$i]['ds_funcionario'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "ds_matricula"=>$query[$i]['ds_matricula'],
                    "ds_cel"=>$query[$i]['ds_cel'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_rg"=>$query[$i]['ds_rg'],
                    "ds_cpf"=>$query[$i]['ds_cpf'],
                    "dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "ds_cel1"=>$query[$i]['ds_cel1'],
                    "ds_cel2"=>$query[$i]['ds_cel2'],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "ds_estado_civil"=>$query[$i]['ds_estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                    "ds_nacionalidade"=>$query[$i]['ds_nacionalidade']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'RelatorioDadosColaborador':{
        
        $pk = $_REQUEST['pk'];
        
        $resultado = "";
        $query = $colaboradordao->RelatorioDadosColaborador($pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                
                
                //QUERY QUALIFICACAO///
                $queryq = $colaboradordao->listarQualificacaoColaborador($query[$i]['pk']);
                
                if(count($queryq) > 0){
                    $ds_qualificacao = "";
                    for($j = 0; $j < count($queryq); $j++){
                        $ds_qualificacao = $queryq[$j]['ds_produto_servico'].",";
                    }
                }
                if($query[$i]['ds_endereco']==""){
                        $ds_endereco = "";
                }
                else{
                    $ds_endereco = $query[$i]['ds_endereco']." - ".$query[$i]['ds_numero'].", ".$query[$i]['ds_complemento']." / ".$query[$i]['ds_bairro']." / ".$query[$i]['ds_cidade']." - ".$query[$i]['ds_uf'];
                }
                

                
                $mysql_data[] = array(
                    "ds_colaborador" => $query[$i]["ds_colaborador"],
                    "dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "ds_qualificacao"=>$ds_qualificacao,
                    "ds_escolaridade"=>$query[$i]['ds_escolaridade'],
                    "ds_rg"=>$query[$i]['ds_rg'],
                    "ds_cpf"=>$query[$i]['ds_cpf'],
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "ds_regime_contratacao"=>$query[$i]['ds_regime_contratacao'],
                    "ds_carga_horaria_semanal"=>$query[$i]['ds_carga_horaria_semanal'],
                    "vl_salario"=>$query[$i]['vl_salario'],
                    "ds_cel"=>$query[$i]['ds_cel'],
                    
                    "ds_endereco"=>$ds_endereco
                    
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    
    case 'listarTodosColaboradoresEServico':{
        
        
        $dt_inicio_agenda = $_REQUEST['dt_inicio_agenda'];
        $dt_fim_agenda = $_REQUEST['dt_fim_agenda'];
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        $agenda_colaborador_padrao_pk = $_REQUEST['agenda_colaborador_padrao_pk'];
        $ic_dom = $_REQUEST['ic_dom'];
        $ic_seg = $_REQUEST['ic_seg'];
        $ic_ter = $_REQUEST['ic_ter'];
        $ic_qua = $_REQUEST['ic_qua'];
        $ic_qui = $_REQUEST['ic_qui'];
        $ic_sex = $_REQUEST['ic_sex'];
        $ic_sab = $_REQUEST['ic_sab'];
        $dom_turnos_pk = $_REQUEST['dom_turnos_pk'];
        $seg_turnos_pk = $_REQUEST['seg_turnos_pk'];
        $ter_turnos_pk = $_REQUEST['ter_turnos_pk'];
        $qua_turnos_pk = $_REQUEST['qua_turnos_pk'];
        $qui_turnos_pk = $_REQUEST['qui_turnos_pk'];
        $sex_turnos_pk = $_REQUEST['sex_turnos_pk'];
        $sab_turnos_pk = $_REQUEST['sab_turnos_pk'];
        $resultado = "";
        $query = $colaboradordao->listar_por_ds_colaborador_e_servico($ic_dom,$ic_seg,$ic_ter,$ic_qua,$ic_qui,$ic_sex,$ic_sab,$dom_turnos_pk,$seg_turnos_pk,$ter_turnos_pk,$qua_turnos_pk,$qui_turnos_pk,$sex_turnos_pk,$sab_turnos_pk,$dt_inicio_agenda,$dt_fim_agenda,$produtos_servicos_pk,$agenda_colaborador_padrao_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador']." - ".$query[$i]['ds_re']
                );
            }
        }
        else{
            $mysql_data = [];
        }
        
        break;
    }
    
    case 'listarTodosColaboradoresEServicoAgenda':{  
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $dias_semanas_pk = $_REQUEST['dia_semana_pk'];
        if($dias_semanas_pk==1){
            $ic_dom = 1;
            $dom_turnos_pk = $_REQUEST['turnos_pk'];
        }
        if($dias_semanas_pk==2){
            $ic_seg = 1;
            $seg_turnos_pk = $_REQUEST['turnos_pk'];
        }
        if($dias_semanas_pk==3){
            $ic_ter = 1;
            $ter_turnos_pk = $_REQUEST['turnos_pk'];
        }
        if($dias_semanas_pk==4){
            $ic_qua = 1;
            $qua_turnos_pk = $_REQUEST['turnos_pk'];
        }
        if($dias_semanas_pk==5){
            $ic_qui = 1;
            $qui_turnos_pk = $_REQUEST['turnos_pk'];
        }
        if($dias_semanas_pk==6){
            $ic_sex = 1;
            $sex_turnos_pk = $_REQUEST['turnos_pk'];
        }
        if($dias_semanas_pk==7){
            $ic_sab = 1;
            $sab_turnos_pk = $_REQUEST['turnos_pk'];
        }
        
        $dt_inicio_agenda = $_REQUEST['dt_inicio_agenda'];
        $dt_fim_agenda = $_REQUEST['dt_inicio_agenda'];
        $contratos_itens_pk = $_REQUEST['contratos_itens_pk'];
        $agenda_colaborador_padrao_pk = $_REQUEST['agenda_colaborador_padrao_pk'];

        $resultado = "";
        $query = $colaboradordao->listar_por_ds_colaborador_e_servico($ic_dom,$ic_seg,$ic_ter,$ic_qua,$ic_qui,$ic_sex,$ic_sab,$dom_turnos_pk,$seg_turnos_pk,$ter_turnos_pk,$qua_turnos_pk,$qui_turnos_pk,$sex_turnos_pk,$sab_turnos_pk,$dt_inicio_agenda,$dt_fim_agenda,$contratos_itens_pk,$agenda_colaborador_padrao_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_produto_colaborador"=>$query[$i]['ds_produto_colaborador'],
                );
            }
        }
        else{
            $mysql_data = [];
        }
        break;
    }
    case 'verificarEscala':{  
        
        $dt_base = $_REQUEST['dt_base'];
        $pk = $_REQUEST['pk'];

        $resultado = "";
        $query = $colaboradordao->verificarEscala($pk,$dt_base);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
                $mysql_data[] = array(
                    "qtde" => $query[0]["qtde_escala"],
                );
            
        }
        else{
            $mysql_data[] = array(
                    "qtde" => 0,
            );
        }
        break;
    }
    case 'listarDataTable':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        $ic_status_app = $_REQUEST['ic_status_app'];
        $ic_origem = $_REQUEST['ic_origem'];
        $leads_pk = $_REQUEST['leads_pk'];
        $resultado = "";
        
        $ds_pin = $_REQUEST['ds_pin'];
        $query = $colaboradordao->listar_por_ds_colaborador($ds_colaborador,$ic_status,$produtos_servicos_pk,$ds_pin,$generos_pk,$ds_re,$ic_status_app,$ic_reserva,$ic_origem,$leads_pk,$pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "t_ds_cel"=>$query[$i]['ds_cel'],
                    "t_ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "t_ds_cel2"=>$query[$i]['ds_cel2'],
                    "t_ic_whatsapp2"=>$query[$i]['ic_whatsapp2'],
                    "t_ds_cel3"=>$query[$i]['ds_cel3'],
                    "t_ic_whatsapp3"=>$query[$i]['ic_whatsapp3'],
                    "t_ds_email"=>$query[$i]['ds_email'],
                    "t_ds_rg"=>$query[$i]['ds_rg'],
                    "t_ds_cpf"=>$query[$i]['ds_cpf'],
                    "t_dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "t_ds_endereco"=>$query[$i]['ds_endereco'],
                    "t_ds_numero"=>$query[$i]['ds_numero'],
                    "t_ds_complemento"=>$query[$i]['ds_complemento'],
                    "t_ds_bairro"=>$query[$i]['ds_bairro'],
                    "t_ds_cep"=>$query[$i]['ds_cep'],
                    "t_ds_cidade"=>$query[$i]['ds_cidade'],
                    "t_ds_uf"=>$query[$i]['ds_uf'],
                    "t_ic_status"=>$query[$i]['ic_status'],
                    "t_ic_origem"=>$query[$i]['ic_origem'],
                    "t_generos_pk"=>$query[$i]['generos_pk'],
                    "t_ds_pin"=>$query[$i]['ds_pin'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_funcao"=>$query[$i]['ds_produto_servico'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "estado_civil"=>$query[$i]['estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "ic_filho_menor_14"=>$query[$i]['ic_filho_menor_14'],
                    "ds_status_app"=>$query[$i]['ds_status_app'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                                        
                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarDataTablePonto':{
        if(!permissao("colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        $ic_status_app = $_REQUEST['ic_status_app'];
        $resultado = "";
        
        $ds_pin = $_REQUEST['ds_pin'];
        $query = $colaboradordao->listar_por_ds_colaborador_escala($ds_colaborador,$ic_status,$produtos_servicos_pk,$ds_pin,$generos_pk,$ds_re,$ic_status_app);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "t_ds_cel"=>$query[$i]['ds_cel'],
                    "t_ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "t_ds_cel2"=>$query[$i]['ds_cel2'],
                    "t_ic_whatsapp2"=>$query[$i]['ic_whatsapp2'],
                    "t_ds_cel3"=>$query[$i]['ds_cel3'],
                    "t_ic_whatsapp3"=>$query[$i]['ic_whatsapp3'],
                    "t_ds_email"=>$query[$i]['ds_email'],
                    "t_ds_rg"=>$query[$i]['ds_rg'],
                    "t_ds_cpf"=>$query[$i]['ds_cpf'],
                    "t_dt_nascimento"=>$query[$i]['dt_nascimento'],
                    "t_ds_endereco"=>$query[$i]['ds_endereco'],
                    "t_ds_numero"=>$query[$i]['ds_numero'],
                    "t_ds_complemento"=>$query[$i]['ds_complemento'],
                    "t_ds_bairro"=>$query[$i]['ds_bairro'],
                    "t_ds_cep"=>$query[$i]['ds_cep'],
                    "t_ds_cidade"=>$query[$i]['ds_cidade'],
                    "t_ds_uf"=>$query[$i]['ds_uf'],
                    "t_ic_status"=>$query[$i]['ic_status'],
                    "t_generos_pk"=>$query[$i]['generos_pk'],
                    "t_ds_pin"=>$query[$i]['ds_pin'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "ds_raca"=>$query[$i]['ds_raca'],
                    "ds_deficiencia_fisica"=>$query[$i]['ds_deficiencia_fisica'],
                    "estado_civil"=>$query[$i]['estado_civil'],
                    "ds_nome_pai"=>$query[$i]['ds_nome_pai'],
                    "ds_nome_mae"=>$query[$i]['ds_nome_mae'],
                    "ds_nome_conjuge"=>$query[$i]['ds_nome_conjuge'],
                    "dt_nascimento_conjuge"=>$query[$i]['dt_nascimento_conjuge'],
                    "ds_cpf_conjuge"=>$query[$i]['ds_cpf_conjuge'],
                    "ds_tel_conjuge"=>$query[$i]['ds_tel_conjuge'],
                    "regime_casamento"=>$query[$i]['regime_casamento'],
                    "ds_ctps"=>$query[$i]['ds_ctps'],
                    "ds_serie"=>$query[$i]['ds_serie'],
                    "dt_expedicao"=>$query[$i]['dt_expedicao'],
                    "ds_uf_rg"=>$query[$i]['ds_uf_rg'],
                    "ds_org_exp"=>$query[$i]['ds_org_exp'],
                    "ds_pis"=>$query[$i]['ds_pis'],
                    "ds_titulo_eleitoral"=>$query[$i]['ds_titulo_eleitoral'],
                    "ds_zona_eleitoral"=>$query[$i]['ds_zona_eleitoral'],
                    "ds_secao"=>$query[$i]['ds_secao'],
                    "ds_certificado_reservista"=>$query[$i]['ds_certificado_reservista'],
                    "ic_filho_menor_14"=>$query[$i]['ic_filho_menor_14'],
                    "ds_status_app"=>$query[$i]['ds_status_app'],
                    "ic_reserva"=>$query[$i]['ic_reserva'],
                    "dt_demissao"=>$query[$i]['dt_demissao'],
                    "dt_admissao"=>$query[$i]['dt_admissao'],
                    "qtde_filho"=>$query[$i]['qtde_filho'],
                                        
                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    default:{
        break;
    }
}

$colaboradordao = null;

// Prepare data
$data = array(
    "result"  => $result,
    "message" => $message,
    "data"    => $mysql_data
);

// Convert PHP array to JSON array
$json_data = json_encode($data);
echo $json_data;


?>
