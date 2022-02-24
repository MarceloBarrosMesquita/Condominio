<?
require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/agenda_colaborador_padrao.dao.php";
require_once "../model/agenda_colaborador_padrao.class.php";
require_once "../model/agenda_colaborador_tarefa.dao.php";
require_once "../model/agenda_colaborador_tarefa.class.php";
require_once "../model/colaborador.dao.php";
require_once "../model/colaborador.class.php";

require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";



$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_agenda = $arrRequest['ds_agenda'];
if($arrRequest['dt_inicio_agenda']!=""){
    $dt_inicio_agenda = DataYMD($arrRequest['dt_inicio_agenda']);
}
if($arrRequest['dt_fim_agenda']!=""){
   $dt_fim_agenda = DataYMD($arrRequest['dt_fim_agenda']);
}


$colaboradores_pk = $arrRequest['colaboradores_pk'];
$processos_etapas_pk = $arrRequest['processos_etapas_pk'];
$contratos_itens_pk = $arrRequest['contratos_itens_pk'];
$nao_repetir_proxima_semana_pk = $arrRequest['nao_repetir_proxima_semana_pk'];
$ic_nao_repetir = $arrRequest['ic_nao_repetir'];

$ic_dom = $arrRequest['ic_dom'];
$ic_seg = $arrRequest['ic_seg'];
$ic_ter = $arrRequest['ic_ter'];
$ic_qua = $arrRequest['ic_qua'];
$ic_qui = $arrRequest['ic_qui'];
$ic_sex = $arrRequest['ic_sex'];
$ic_sab = $arrRequest['ic_sab'];

$ic_dom_folga = $arrRequest['ic_dom_folga'];
$ic_seg_folga = $arrRequest['ic_seg_folga'];
$ic_ter_folga = $arrRequest['ic_ter_folga'];
$ic_qua_folga = $arrRequest['ic_qua_folga'];
$ic_qui_folga = $arrRequest['ic_qui_folga'];
$ic_sex_folga = $arrRequest['ic_sex_folga'];
$ic_sab_folga = $arrRequest['ic_sab_folga'];
$ic_folga_inverter = $arrRequest['ic_folga_inverter'];
$dt_cancelamento = $arrRequest['dt_cancelamento'];
$ds_motivo_cancelamento = $arrRequest['ds_motivo_cancelamento'];
$tipo_escala = $arrRequest['tipo_escala'];


if($ic_dom==""){
    $ic_dom= 2;
}

if($ic_seg==""){
    $ic_seg= 2;
}

if($ic_ter==""){
    $ic_ter= 2;
}

if($ic_qua==""){
    $ic_qua= 2;
}

if($ic_qui==""){
    $ic_qui= 2;
}

if($ic_sex==""){
    $ic_sex= 2;
}

if($ic_sab==""){
    $ic_sab= 2;
}

$dom_turnos_pk = $arrRequest['dom_turnos_pk'];
$seg_turnos_pk = $arrRequest['seg_turnos_pk'];
$ter_turnos_pk = $arrRequest['ter_turnos_pk'];
$qua_turnos_pk = $arrRequest['qua_turnos_pk'];
$qui_turnos_pk = $arrRequest['qui_turnos_pk'];
$sex_turnos_pk = $arrRequest['sex_turnos_pk'];
$sab_turnos_pk = $arrRequest['sab_turnos_pk'];

$hr_turno_dom = $arrRequest['hr_turno_dom'];
$hr_turno_seg = $arrRequest['hr_turno_seg'];
$hr_turno_ter = $arrRequest['hr_turno_ter'];
$hr_turno_qua = $arrRequest['hr_turno_qua'];
$hr_turno_qui = $arrRequest['hr_turno_qui'];
$hr_turno_sex = $arrRequest['hr_turno_sex'];
$hr_turno_sab = $arrRequest['hr_turno_sab'];
$hr_turno_dom_saida = $arrRequest['hr_turno_dom_saida'];
$hr_turno_seg_saida = $arrRequest['hr_turno_seg_saida'];
$hr_turno_ter_saida = $arrRequest['hr_turno_ter_saida'];
$hr_turno_qua_saida = $arrRequest['hr_turno_qua_saida'];
$hr_turno_qui_saida = $arrRequest['hr_turno_qui_saida'];
$hr_turno_sex_saida = $arrRequest['hr_turno_sex_saida'];
$hr_turno_sab_saida = $arrRequest['hr_turno_sab_saida'];

$hr_intervalo_dom = $arrRequest['hr_intervalo_dom'];
$hr_intervalo_seg = $arrRequest['hr_intervalo_seg'];
$hr_intervalo_ter = $arrRequest['hr_intervalo_ter'];
$hr_intervalo_qua = $arrRequest['hr_intervalo_qua'];
$hr_intervalo_qui = $arrRequest['hr_intervalo_qui'];
$hr_intervalo_sex = $arrRequest['hr_intervalo_sex'];
$hr_intervalo_sab = $arrRequest['hr_intervalo_sab'];
$hr_intervalo_saida_dom = $arrRequest['hr_intervalo_saida_dom'];
$hr_intervalo_saida_seg = $arrRequest['hr_intervalo_saida_seg'];
$hr_intervalo_saida_ter = $arrRequest['hr_intervalo_saida_ter'];
$hr_intervalo_saida_qua = $arrRequest['hr_intervalo_saida_qua'];
$hr_intervalo_saida_qui = $arrRequest['hr_intervalo_saida_qui'];
$hr_intervalo_saida_sex = $arrRequest['hr_intervalo_saida_sex'];
$hr_intervalo_saida_sab = $arrRequest['hr_intervalo_saida_sab'];

$tarefas_agenda = $arrRequest['tarefas_agenda'];



$produtos_servicos_pk = $arrRequest['produtos_servicos_pk'];
$n_qtde_dias_semana = $arrRequest['n_qtde_dias_semana'];
$turnos_pk = $arrRequest['turnos_pk'];
$hr_inicio_expediente = $arrRequest['hr_inicio_expediente'];
$hr_termino_expediente = $arrRequest['hr_termino_expediente'];
$hr_saida_intervalo = $arrRequest['hr_saida_intervalo'];
$hr_retorno_intervalo = $arrRequest['hr_retorno_intervalo'];
$ic_preenchimento_automatico = $arrRequest['ic_preenchimento_automatico'];






$agenda_colaborador_padraodao = new agenda_colaborador_padraodao();
$agenda_colaborador_padraodao->setToken($token); 

$agenda_colaborador_tarefadao = new agenda_colaborador_tarefadao();
$agenda_colaborador_tarefadao->setToken($token);

$colaboradordao = new colaboradordao();
$colaboradordao->setToken($token);

$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){

    case 'excluir':{
        if(!permissao("agenda_condominio", "del", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
            
        $resultdo = "";
        
        $agenda_colaborador_padrao = $agenda_colaborador_padraodao->carregarPorPk($pk);
        if($agenda_colaborador_padrao->getpk()>0){
            
            $log_exclusaodao->salvar("agenda_colaborador_padrao",$agenda_colaborador_padrao->getpk());
            
            $agenda_colaborador_padraodao->excluir($agenda_colaborador_padrao);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'agenda_colaborador_padrao nao encontrado';
        }
        break;
    }
    case 'salvar':{

        if($pk!=""){
            $ic_acao = "upd";
        }else{
            $ic_acao = "ins";
        }
        
        if(!permissao("agenda_condominio", $ic_acao, $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];
            break;
        }
        
        $leads_pk = $_REQUEST['leads_pk'];
        $contratos_pk = $_REQUEST['contratos_pk'];
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        
        if($dt_inicio_agenda!=""){
            
           $querytotal = $agenda_colaborador_padraodao->carregarInformacaoPausa($dt_inicio_agenda,$dt_fim_agenda,$colaboradores_pk);
            if($querytotal[0]['pk']!=""){
                $agenda_colaborador_padraodao->excluirPausa($querytotal[0]['pk']);
            }
        }
        
        
            //verfica se a quantidade de produtos e servicos cadastrados
            /*$query = $agenda_colaborador_padraodao->listar_qtde_itens_profissionais_contratados_servicos($leads_pk,$contratos_pk,$produtos_servicos_pk);
            if($pk ==""){
                if(count($query) > 0){
                    for($i = 0; $i < count($query); $i++){

                        //RETORNA A QUANTIDADE DE FUNCIONARIOS DA AGENDA
                        $query1 = $agenda_colaborador_padraodao->listar_profissionais_qtde_dia_servico($leads_pk,$query[$i]["contratos_pk"],$query[$i]["n_qtde_dias_semana"],$produtos_servicos_pk,$colaboradores_pk);
                        
                        if(count($query1[0]["qtde_profissionais"])==0){                
                            $qtde_profissionais = 0;
                        }else{
                           
                            $qtde_profissionais += $query1[0]["qtde_profissionais"];
                        }
                         $qtde_contratado = ($query[$i]["qtde_contratado"] - $qtde_profissionais);
                        echo $query[$i]["qtde_contratado"];
                    }
                    exit;
                }           
                 if($qtde_contratado <= 0){                
                    $result  = 'success';
                    $message = 'Não existe mais vagas para esse serviço.';  
                    break;
                }                 
            }*/
        
            $agenda_colaborador_padrao = $agenda_colaborador_padraodao->carregarPorPk($pk);
            $agenda_colaborador_padrao->setds_agenda($ds_agenda);
            $agenda_colaborador_padrao->setdt_inicio_agenda($dt_inicio_agenda);
            $agenda_colaborador_padrao->setdt_fim_agenda($dt_fim_agenda);
            $agenda_colaborador_padrao->setcolaboradores_pk($colaboradores_pk);
            $agenda_colaborador_padrao->setprocessos_etapas_pk($processos_etapas_pk);
            $agenda_colaborador_padrao->setic_dom($ic_dom);
            $agenda_colaborador_padrao->setic_seg($ic_seg);
            $agenda_colaborador_padrao->setic_ter($ic_ter);
            $agenda_colaborador_padrao->setic_qua($ic_qua);
            $agenda_colaborador_padrao->setic_qui($ic_qui);
            $agenda_colaborador_padrao->setic_sex($ic_sex);
            $agenda_colaborador_padrao->setic_sab($ic_sab);
                        
            $agenda_colaborador_padrao->setic_dom_folga($ic_dom_folga);
            $agenda_colaborador_padrao->setic_seg_folga($ic_seg_folga);
            $agenda_colaborador_padrao->setic_ter_folga($ic_ter_folga);
            $agenda_colaborador_padrao->setic_qua_folga($ic_qua_folga);
            $agenda_colaborador_padrao->setic_qui_folga($ic_qui_folga);
            $agenda_colaborador_padrao->setic_sex_folga($ic_sex_folga);
            $agenda_colaborador_padrao->setic_sab_folga($ic_sab_folga);
            $agenda_colaborador_padrao->setic_folga_inverter($ic_folga_inverter);
                        
            $agenda_colaborador_padrao->setdom_turnos_pk($dom_turnos_pk);
            $agenda_colaborador_padrao->setseg_turnos_pk($seg_turnos_pk);
            $agenda_colaborador_padrao->setter_turnos_pk($ter_turnos_pk);
            $agenda_colaborador_padrao->setqua_turnos_pk($qua_turnos_pk);
            $agenda_colaborador_padrao->setqui_turnos_pk($qui_turnos_pk);
            $agenda_colaborador_padrao->setsex_turnos_pk($sex_turnos_pk);
            $agenda_colaborador_padrao->setsab_turnos_pk($sab_turnos_pk);
            $agenda_colaborador_padrao->sethr_turno_dom($hr_turno_dom);
            $agenda_colaborador_padrao->sethr_turno_seg($hr_turno_seg);
            $agenda_colaborador_padrao->sethr_turno_ter($hr_turno_ter);
            $agenda_colaborador_padrao->sethr_turno_qua($hr_turno_qua);
            $agenda_colaborador_padrao->sethr_turno_qui($hr_turno_qui);
            $agenda_colaborador_padrao->sethr_turno_sex($hr_turno_sex);
            $agenda_colaborador_padrao->sethr_turno_sab($hr_turno_sab);
            $agenda_colaborador_padrao->sethr_turno_dom_saida($hr_turno_dom_saida);
            $agenda_colaborador_padrao->sethr_turno_seg_saida($hr_turno_seg_saida);
            $agenda_colaborador_padrao->sethr_turno_ter_saida($hr_turno_ter_saida);
            $agenda_colaborador_padrao->sethr_turno_qua_saida($hr_turno_qua_saida);
            $agenda_colaborador_padrao->sethr_turno_qui_saida($hr_turno_qui_saida);
            $agenda_colaborador_padrao->sethr_turno_sex_saida($hr_turno_sex_saida);
            $agenda_colaborador_padrao->sethr_turno_sab_saida($hr_turno_sab_saida);
            $agenda_colaborador_padrao->setcontratos_itens_pk($contratos_itens_pk);
            $agenda_colaborador_padrao->setdt_cancelamento($dt_cancelamento);
            $agenda_colaborador_padrao->setds_motivo_cancelamento($ds_motivo_cancelamento);
            $agenda_colaborador_padrao->settipo_escala($tipo_escala);
            
            $agenda_colaborador_padrao->sethr_intervalo_dom($hr_intervalo_dom);
            $agenda_colaborador_padrao->sethr_intervalo_seg($hr_intervalo_seg);
            $agenda_colaborador_padrao->sethr_intervalo_ter($hr_intervalo_ter);
            $agenda_colaborador_padrao->sethr_intervalo_qua($hr_intervalo_qua);
            $agenda_colaborador_padrao->sethr_intervalo_qui($hr_intervalo_qui);
            $agenda_colaborador_padrao->sethr_intervalo_sex($hr_intervalo_sex);
            $agenda_colaborador_padrao->sethr_intervalo_sab($hr_intervalo_sab);
            $agenda_colaborador_padrao->sethr_intervalo_saida_dom($hr_intervalo_saida_dom);
            $agenda_colaborador_padrao->sethr_intervalo_saida_seg($hr_intervalo_saida_seg);
            $agenda_colaborador_padrao->sethr_intervalo_saida_ter($hr_intervalo_saida_ter);
            $agenda_colaborador_padrao->sethr_intervalo_saida_qua($hr_intervalo_saida_qua);
            $agenda_colaborador_padrao->sethr_intervalo_saida_qui($hr_intervalo_saida_qui);
            $agenda_colaborador_padrao->sethr_intervalo_saida_sex($hr_intervalo_saida_sex);
            $agenda_colaborador_padrao->sethr_intervalo_saida_sab($hr_intervalo_saida_sab);
            
            $agenda_colaborador_padrao->setnao_repetir_proxima_semana_pk($nao_repetir_proxima_semana_pk);
            
            $agenda_colaborador_padrao->setic_nao_repetir($ic_nao_repetir);
            $agenda_colaborador_padrao->settipo_escala($tipo_escala);
            
            $agenda_colaborador_padrao->setprodutos_servicos_pk($produtos_servicos_pk);
            $agenda_colaborador_padrao->setn_qtde_dias_semana($n_qtde_dias_semana);
            $agenda_colaborador_padrao->setturnos_pk($turnos_pk);
            $agenda_colaborador_padrao->sethr_inicio_expediente($hr_inicio_expediente);
            $agenda_colaborador_padrao->sethr_termino_expediente($hr_termino_expediente);
            $agenda_colaborador_padrao->sethr_saida_intervalo($hr_saida_intervalo);
            $agenda_colaborador_padrao->sethr_retorno_intervalo($hr_retorno_intervalo);
            $agenda_colaborador_padrao->setic_preenchimento_automatico($ic_preenchimento_automatico);
            
            
            
           
            

            $pk = $agenda_colaborador_padraodao->salvar($agenda_colaborador_padrao);

            $mysql_data[] = array(
                    "pk" => $pk
            );
   
            $tarefas_agenda = $_REQUEST['tarefas_agenda']; 
            
            if($tarefas_agenda != "")
                $arrTarefasAgenda = json_decode ($tarefas_agenda, true);


            if(count($arrTarefasAgenda) > 0){
                for($i = 0; $i < count($arrTarefasAgenda); $i++){    
                    $agenda_colaborador_tarefa = $agenda_colaborador_tarefadao->carregarPorPk($arrTarefasAgenda[$i]['tarefas_pk']);                    
                    $agenda_colaborador_tarefa->setds_tarefa($arrTarefasAgenda[$i]['ds_tarefa']);
                    $agenda_colaborador_tarefa->setobs_tarefa($arrTarefasAgenda[$i]['obs_tarefa']);
                    $agenda_colaborador_tarefa->sethr_inicio($arrTarefasAgenda[$i]['hr_inicio']);
                    $agenda_colaborador_tarefa->setic_dia($arrTarefasAgenda[$i]['ic_dia']);
                    $agenda_colaborador_tarefa->setagendas_pk($pk);
                    $tarefa_pk = $agenda_colaborador_tarefadao->salvar($agenda_colaborador_tarefa);

                }
            }
            
            $result  = 'success';
            $message = 'Registro salvo com sucesso.';      

            break;
            
        }
        /*else{
            $result  = 'success';
            $message = 'Data Inicio está abaixo da Data inicial do Contrato.';        

            break;
        }
        
        
    }*/
    case 'listarPk':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $agenda_colaborador_padraodao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_agenda"=>$query[$i]['ds_agenda'],
                    "dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "ic_dom"=>$query[$i]['ic_dom'],
                    "ic_seg"=>$query[$i]['ic_seg'],
                    "ic_ter"=>$query[$i]['ic_ter'],
                    "ic_qua"=>$query[$i]['ic_qua'],
                    "ic_qui"=>$query[$i]['ic_qui'],
                    "ic_sex"=>$query[$i]['ic_sex'],
                    "ic_sab"=>$query[$i]['ic_sab'],
                    "dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    "hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    "colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],
                        
                        

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
    case 'listarTodos':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $agenda_colaborador_padraodao->listar_por_ds_agenda($ds_agenda);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_agenda"=>$query[$i]['ds_agenda'],
                    "dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "ic_dom"=>$query[$i]['ic_dom'],
                    "ic_seg"=>$query[$i]['ic_seg'],
                    "ic_ter"=>$query[$i]['ic_ter'],
                    "ic_qua"=>$query[$i]['ic_qua'],
                    "ic_qui"=>$query[$i]['ic_qui'],
                    "ic_sex"=>$query[$i]['ic_sex'],
                    "ic_sab"=>$query[$i]['ic_sab'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    "hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    "dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    "colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarDataTable':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        
        $resultado = "";
        $query = $agenda_colaborador_padraodao->listar_por_ds_agenda($ds_agenda);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$query[$i]['turnos_pk'],
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarAgendaColaboradorLeadProcesso':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        
        
        
        $leads_pk_pesq = $_REQUEST['leads_pk_pesq'];
        $colaborador_pk_pesq_agenda = $_REQUEST['colaborador_pk_pesq_agenda'];
        $dt_periodo_ini_agenda_pesq = $_REQUEST['dt_periodo_ini_agenda_pesq'];
        $dt_periodo_fim_agenda_pesq = $_REQUEST['dt_periodo_fim_agenda_pesq'];
        $escala_pesq_agenda = $_REQUEST['escala_pesq_agenda'];
        $produtos_pesq_agenda = $_REQUEST['produtos_pesq_agenda'];
        $ic_status_pesq_agenda = $_REQUEST['ic_status_pesq_agenda'];
        $tipo_escala_pesq_agenda = $_REQUEST['tipo_escala_pesq_agenda'];
        
        $leads_pk = $_REQUEST['leads_pk'];
        $processos_pk = $_REQUEST['processos_pk'];
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        
        $resultado = "";
        //if($leads_pk!=""){
            $query = $agenda_colaborador_padraodao->listar_agenda_colaborador_lead_processo($leads_pk,$processos_pk,$colaborador_pk,$leads_pk_pesq,$colaborador_pk_pesq_agenda,$dt_periodo_ini_agenda_pesq,$dt_periodo_fim_agenda_pesq,$escala_pesq_agenda,$tipo_escala_pesq_agenda,$produtos_pesq_agenda,$ic_status_pesq_agenda);
        /*}
        else{
            $mysql_data = [];
        }*/
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $ds_dia_semana = "";
                $ds_cancelamento = "";
                if($query[$i]['ic_dom']==1){
                    $ds_dia_semana.= "Dom (".$query[$i]['ds_turno_dom'].")<br> ";
                }
                if($query[$i]['ic_seg']==1){
                    $ds_dia_semana.= "Seg (".$query[$i]['ds_turno_seg'].")<br> ";
                }
                if($query[$i]['ic_ter']==1){
                    $ds_dia_semana.= "Ter (".$query[$i]['ds_turno_ter'].")<br> ";
                }
                if($query[$i]['ic_qua']==1){
                    $ds_dia_semana.= "Qua (".$query[$i]['ds_turno_qua'].")<br>";
                }
                if($query[$i]['ic_qui']==1){
                    $ds_dia_semana.= "Qui (".$query[$i]['ds_turno_qui'].")<br> ";
                }
                if($query[$i]['ic_sex']==1){
                    $ds_dia_semana.= "Sex (".$query[$i]['ds_turno_sex'].")<br> ";
                }
                if($query[$i]['ic_sab']==1){
                    $ds_dia_semana.= "Sab (".$query[$i]['ds_turno_sab'].")<br>";
                }
                if($query[$i]['dt_cancelamento']!=""){
                    $ds_cancelamento = "Inativo";
                }
                else{
                    $ds_cancelamento = "Ativo";
                }
                
             
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_ds_turno"=>$query[$i]['ds_turno'],
                    "t_turnos_pk"=>$query[$i]['turnos_pk'],
                    "t_ds_dia_semana"=>$query[$i]['ds_dia_semana'],
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador']." - ".$query[$i]['ds_re'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_processos_pk"=>$query[$i]['processos_pk'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_cancelamento"=>$ds_cancelamento,
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "ds_tipo_escala"=>$query[$i]['ds_tipo_escala'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],                    
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_contratos_pk"=>$query[$i]['contratos_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ds_dia_semana"=>$ds_dia_semana,
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    //"produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "periodo"=>$query[$i]['dt_inicio_agenda']." - ".$query[$i]['dt_fim_agenda'],
                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }  
    
    case 'listarAgendaColaboradorLeadProdutosServicos':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $processos_pk = $_REQUEST['processos_pk'];
        $qtde_dias_contrato = $_REQUEST['qtde_dias_contrato'];
        $contratos_pk = $_REQUEST['contratos_pk'];
    
        
        $resultado = "";
        if($leads_pk!=""){
            $query = $agenda_colaborador_padraodao->listar_agenda_colaborador($leads_pk,$processos_pk,$qtde_dias_contrato,$contratos_pk);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $ds_dia_semana = "";
                if($query[$i]['ic_dom']==1){
                    $ds_dia_semana.= "Dom (".$query[$i]['ds_turno_dom'].")<br> ";
                }
                if($query[$i]['ic_seg']==1){
                    $ds_dia_semana.= "Seg (".$query[$i]['ds_turno_seg'].")<br> ";
                }
                if($query[$i]['ic_ter']==1){
                    $ds_dia_semana.= "Ter (".$query[$i]['ds_turno_ter'].")<br> ";
                }
                if($query[$i]['ic_qua']==1){
                    $ds_dia_semana.= "Qua (".$query[$i]['ds_turno_qua'].")<br> ";
                }
                if($query[$i]['ic_qui']==1){
                    $ds_dia_semana.= "Qui (".$query[$i]['ds_turno_qui'].")<br> ";
                }
                if($query[$i]['ic_sex']==1){
                    $ds_dia_semana.= "Sex (".$query[$i]['ds_turno_sex'].")<br> ";
                }
                if($query[$i]['ic_sab']==1){
                    $ds_dia_semana.= "Sab (".$query[$i]['ds_turno_sab'].")<br> ";
                }
                    
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$query[$i]['turnos_pk'],
                    "t_ds_dia_semana"=>$ds_dia_semana,
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_tipo_escala"=>$query[$i]['tipo_escala'],
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],
                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }     
    case 'verificarQtdeEscalaPorProduto':{
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        $contratos_pk = $_REQUEST['contratos_pk'];
    
        
        $resultado = "";
        
        $query = $agenda_colaborador_padraodao->verificarQtdeContratoPorProduto($produtos_servicos_pk,$contratos_pk);
        $query1 = $agenda_colaborador_padraodao->verificarQtdeEscalaPorProduto($produtos_servicos_pk,$contratos_pk);
        
       
        
        $result  = 'success';
        $message = 'query success';


                
                    
                $mysql_data[] = array(
                    "qtde" => $query[0]['n_qtde'] - $query1[0]['qtde_escala'],
                    
                );
		
        break;
    }     
    case 'RellistarAgendaColaboradorLeadProdutosServicos':{
        
        $leads_pk = $_REQUEST['leads_pk'];
        $processos_pk = $_REQUEST['processos_pk'];
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        $qtde_dias_contrato = $_REQUEST['qtde_dias_contrato'];
        $dt_base = $_REQUEST['dt_base'];
        $n_dia_semana = $_REQUEST['n_dia_semana'];
    
        
        $resultado = "";
        if($leads_pk!=""){
            $query = $agenda_colaborador_padraodao->rel_listar_agenda_colaborador_data($leads_pk,$dt_base,$produtos_servicos_pk,$qtde_dias_contrato,$n_dia_semana);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $ds_dia_semana = "";
                if($query[$i]['ic_dom']==1){
                    $ds_dia_semana.= "Dom (".$query[$i]['ds_turno_dom'].")<br> ";
                }
                if($query[$i]['ic_seg']==1){
                    $ds_dia_semana.= "Seg (".$query[$i]['ds_turno_seg'].")<br> ";
                }
                if($query[$i]['ic_ter']==1){
                    $ds_dia_semana.= "Ter (".$query[$i]['ds_turno_ter'].")<br> ";
                }
                if($query[$i]['ic_qua']==1){
                    $ds_dia_semana.= "Qua (".$query[$i]['ds_turno_qua'].")<br> ";
                }
                if($query[$i]['ic_qui']==1){
                    $ds_dia_semana.= "Qui (".$query[$i]['ds_turno_qui'].")<br> ";
                }
                if($query[$i]['ic_sex']==1){
                    $ds_dia_semana.= "Sex (".$query[$i]['ds_turno_sex'].")<br> ";
                }
                if($query[$i]['ic_sab']==1){
                    $ds_dia_semana.= "Sab (".$query[$i]['ds_turno_sab'].")<br> ";
                }
                    
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$query[$i]['turnos_pk'],
                    "t_ds_dia_semana"=>$ds_dia_semana,
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],
                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }     
    case 'listarData':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $dt_agenda = $_REQUEST['dt_agenda'];
        
        $resultado = "";
        $query = $agenda_colaborador_padraodao->listar_data($dt_agenda);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "dia_semana" => $query[$i]["dia_semana"],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarItensContratados':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $contratos_pk = $_REQUEST['contratos_pk'];
        $produtos_servicos_pk = $_REQUEST['produtos_servicos_pk'];
        
        $resultado = "";
        if($leads_pk!=""){
            $query = $agenda_colaborador_padraodao->listar_qtde_itens_profissionais_contratados_servicos($leads_pk,$contratos_pk,$produtos_servicos_pk);            
        }else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                //RETORNA A QUANTIDADE DE FUNCIONARIOS DA AGENDA
                    $query1 = $agenda_colaborador_padraodao->listar_profissionais_qtde_dia_servico($leads_pk,$query[$i]["contratos_pk"],$query[$i]["n_qtde_dias_semana"],$produtos_servicos_pk);
                    if(count($query1[0]["qtde_profissionais"])==0){
                        $qtde_profissionais = 0;
                    }
                    else{
                        $qtde_profissionais += $query1[0]["qtde_profissionais"];
                    }
                     $qtde_contratado = ($query[$i]["qtde_contratado"] - $qtde_profissionais);
                
                                
                $mysql_data[] = array(
                    "t_ds_produto_servico" => $query[$i]["ds_produto_servico"],
                    "t_qtde_contratado" => $query[$i]["qtde_contratado"],
                    "t_qtde_profissional" => $qtde_profissionais,
                    "t_diferenca" => ($query[$i]["qtde_contratado"] - $qtde_profissionais),
                    "t_qtde_dias_semana" => $query[$i]["n_qtde_dias_semana"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_contratos_itens_pk" => $query[$i]["contratos_itens_pk"],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarItensContratadosData':{
        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda_inicio = $_REQUEST['dt_agenda_inicio'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        $contratos_pk = $_REQUEST['contratos_pk'];
        
        $resultado = "";
        if($leads_pk!=""){
            $query = $agenda_colaborador_padraodao->listar_qtde_itens_profissionais_contratados_data($leads_pk,$dt_agenda_inicio,$dt_agenda_fim,$contratos_pk);
        }
        else{
            $mysql_data = [];
        }
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $ds_produto = $query[$i]["ds_produto_servico"]." , ".$ds_produto;
                $qtde_produto = $query[$i]["qtde_contratado"]." , ".$qtde_produto;
                $qtde_prof = $query[$i]["qtde_profissional"]." , ".$qtde_prof;
            }
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_ds_produto_servico" => $ds_produto,
                    "t_qtde_contratado" => $qtde_produto,
                    "t_qtde_profissional" => $qtde_prof,
                    "t_ds_contrato" => $query[$i]["ds_contrato"],
                    "t_dt_inicio_contrato" => $query[$i]["dt_inicio_contrato"],
                    "t_dt_fim_contrato" => $query[$i]["dt_fim_contrato"],
                    "t_diferenca" => $query[$i]["diferenca"],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    
    case 'relatorioAgendaLead':{
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_base = $_REQUEST['dt_base'];
        
        $resultado = "";
        if($leads_pk!=""){
            $query = $agenda_colaborador_padraodao->rel_agenda_lead($leads_pk,$dt_base);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                    $query1 = $agenda_colaborador_padraodao->rel_agenda_lead_qtde_profissiomais($leads_pk,$dt_base,$query[$i]["produtos_servicos_pk"],$query[$i]["n_qtde_dias_semana"]);
                    $qtde_profissionais = 0;
                    if(count($query1) > 0){
                        for($j = 0; $j < count($query1); $j++){
                            if($query1[$j]["qtde_profissionais"]=="" || $query1[$j]["qtde_profissionais"]=="null"){
                                $qtde_profissionais = 0;
                            }
                            else{
                                $qtde_profissionais += $query1[$j]["qtde_profissionais"];
                            }

                        }
                    }
                $mysql_data[] = array(
                    "t_n_itens_contratados" => $query[$i]["n_itens_contratados"],
                    "t_n_profissionais_contratados" => $qtde_profissionais,
                    "t_n_diferenca" => ($query[$i]["n_itens_contratados"] - $qtde_profissionais),
                    "t_ds_produto_servico" => $query[$i]["ds_produto_servico"],
                    "t_produtos_servicos_pk" => $query[$i]["produtos_servicos_pk"],
                    "t_n_qtde_dias_semana" => $query[$i]["n_qtde_dias_semana"],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    
    case 'relatorioAgendaColaborador':{
        $colaboradores_pk = $_REQUEST['colaboradores_pk'];
        $dt_base = $_REQUEST['dt_base'];
        $dia_semana = $_REQUEST['dia_semana'];
        
        $resultado = "";
        if($colaboradores_pk!=""){
            $query = $agenda_colaborador_padraodao->rel_agenda_colaborador($colaboradores_pk,$dt_base,$dia_semana);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($dia_semana==0){
                    $ds_turno = $query[$i]['ds_turno_dom'];
                    if($query[$i]['ic_dom']==1){
                        $ds_dia_semana ="Domingo";
                    }
                }
                else if($dia_semana==1){
                    $ds_turno = $query[$i]['ds_turno_seg'];
                    if($query[$i]['ic_seg']==1){
                        $ds_dia_semana ="Segunda";
                    }
                }
                else if($dia_semana==2){
                    $ds_turno = $query[$i]['ds_turno_ter'];
                    if($query[$i]['ic_ter']==1){
                        $ds_dia_semana ="Terça";
                    }
                }
                else if($dia_semana==3){
                    $ds_turno = $query[$i]['ds_turno_qua'];
                    if($query[$i]['ic_qua']==1){
                        $ds_dia_semana ="Quarta";
                    }
                }
                else if($dia_semana==4){
                    $ds_turno = $query[$i]['ds_turno_qui'];
                    if($query[$i]['ic_qui']==1){
                        $ds_dia_semana ="Quinta";
                    }
                }
                else if($dia_semana==5){
                    $ds_turno = $query[$i]['ds_turno_sex'];
                    if($query[$i]['ic_sex']==1){
                        $ds_dia_semana ="Sexta";
                    }
                }
                else if($dia_semana==6){
                    $ds_turno = $query[$i]['ds_turno_sab'];
                    if($query[$i]['ic_sab']==1){
                        $ds_dia_semana ="Sabado";
                    }
                }
                $mysql_data[] = array(
                    
                    "t_ds_lead" => $query[$i]["ds_lead"],
                    "t_ds_turno" => $ds_turno,
                    "t_ds_dia_semana" => $ds_dia_semana,

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    
    case 'listarAgendaLeadData':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        //$dia_semana = $_REQUEST['dia_semana'];
        

        
      
        $resultado = "";
        if($leads_pk!=""){
                
            $query = $agenda_colaborador_padraodao->listar_agenda_colaborador_lead_data($leads_pk,$dt_agenda,$dt_agenda_fim);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador_grid"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarAgendaLeadDataGrid':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        //$dia_semana = $_REQUEST['dia_semana'];

        $resultado = "";
        if($leads_pk!=""){                
            $query = $agenda_colaborador_padraodao->listarAgendaLeadDataGrid($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                
               
                    
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],
                    
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador_grid"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'relatorioEscalaServicoDia':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_ini'];
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        $turnos_pk = $_REQUEST['turnos_pk'];
        $dia_semana = $_REQUEST['dia_semana'];

        $resultado = "";        
        
        $query = $agenda_colaborador_padraodao->relatorioEscalaServicoDia($leads_pk,$dt_agenda,$dt_agenda,$colaboradores_pk,$turnos_pk,$dia_semana);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],
                    
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'relatorioEscalaServicoDiaGrid':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_ini'];
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        $turnos_pk = $_REQUEST['turnos_pk'];
        $dia_semana = $_REQUEST['dia_semana'];

        $resultado = "";        
        
        $query = $agenda_colaborador_padraodao->relatorioEscalaServicoDiaGrid($leads_pk,$dt_agenda,$dt_agenda,$colaboradores_pk,$turnos_pk,$dia_semana);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],
                    
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'relatorioFalta':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_ini'];
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        $turnos_pk = $_REQUEST['turnos_pk'];
        $dia_semana = $_REQUEST['dia_semana'];

        $resultado = "";        
        
        $query = $agenda_colaborador_padraodao->relatorioFalta($leads_pk,$dt_agenda,$dt_agenda,$colaboradores_pk,$turnos_pk,$dia_semana);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_dom"=>$query[$i]['hr_intervalo_dom'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_dom"=>$query[$i]['hr_intervalo_saida_dom'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'EscalaServicoDiaGridParaRelatorioFalta':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_ini'];
        $dt_agenda_fim = $_REQUEST['dt_fim'];
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        $turnos_pk = $_REQUEST['turnos_pk'];
        $dia_semana = $_REQUEST['dia_semana'];

        $resultado = "";        
        
        $query = $agenda_colaborador_padraodao->EscalaServicoDiaGridParaRelatorioFalta($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk,$turnos_pk,$dia_semana);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],
                    
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'relatorioEscalaServicoDiaGridParaTarefa':{

        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_ini'];
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        $turnos_pk = $_REQUEST['turnos_pk'];
        $dia_semana = $_REQUEST['dia_semana'];

        $resultado = "";        
        
        $query = $agenda_colaborador_padraodao->relatorioEscalaServicoDiaGridParaTarefa($leads_pk,$dt_agenda,$dt_agenda,$colaboradores_pk,$turnos_pk,$dia_semana);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_contratos_pk" => $query[$i]["contratos_pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_endereco"=>$query[$i]['ds_endereco'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_dom_turnos_pk"=>$query[$i]['dom_turnos_pk'],
                    "t_seg_turnos_pk"=>$query[$i]['seg_turnos_pk'],
                    "t_ter_turnos_pk"=>$query[$i]['ter_turnos_pk'],
                    "t_qua_turnos_pk"=>$query[$i]['qua_turnos_pk'],
                    "t_qui_turnos_pk"=>$query[$i]['qui_turnos_pk'],
                    "t_sex_turnos_pk"=>$query[$i]['sex_turnos_pk'],
                    "t_sab_turnos_pk"=>$query[$i]['sab_turnos_pk'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_ic_dom_folga"=>$query[$i]['ic_dom_folga'],
                    "t_ic_seg_folga"=>$query[$i]['ic_seg_folga'],
                    "t_ic_ter_folga"=>$query[$i]['ic_ter_folga'],
                    "t_ic_qua_folga"=>$query[$i]['ic_qua_folga'],
                    "t_ic_qui_folga"=>$query[$i]['ic_qui_folga'],
                    "t_ic_sex_folga"=>$query[$i]['ic_sex_folga'],
                    "t_ic_sab_folga"=>$query[$i]['ic_sab_folga'],
                    
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_produto_servico_pk"=>$query[$i]['produtos_servicos_pk'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_contratos_itens_pk"=>$query[$i]['contratos_itens_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "t_ic_folga_inverter"=>$query[$i]['ic_folga_inverter'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarColaboradorAgendaData':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        //$dia_semana = $_REQUEST['dia_semana'];
        
        $resultado = "";
        if($leads_pk!=""){
                
            $query = $agenda_colaborador_padraodao->listarColaboradorAgendaData($leads_pk,$dt_agenda,$dt_agenda_fim);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "t_ds_re"=>$query[$i]['ds_re'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarQRCode':{

        
        $leads_pk = $_REQUEST['leads_pk'];
        //$dia_semana = $_REQUEST['dia_semana'];
        
        $resultado = "";
        if($leads_pk!=""){
                
            $query = $agenda_colaborador_padraodao->listarQRCode($leads_pk);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_status']==""){
                    $ds_status = "Liberação Não Solicitada";
                }
                else{
                    $ds_status = $query[$i]['ds_status'];
                }
                $mysql_data[] = array(
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "dt_liberacao"=>$query[$i]['dt_liberacao'],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_tel"=>$query[$i]['ds_tel'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_status"=>$ds_status,
                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarColaboradorAgendaDataGeral':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        $ic_status = $_REQUEST['ic_status'];
        //$dia_semana = $_REQUEST['dia_semana'];
        
        $resultado = "";

                
        $query = $agenda_colaborador_padraodao->listarColaboradorAgendaDataGeral($dt_agenda,$dt_agenda_fim,$leads_pk,$ic_status);

        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                if($query[$i]['dt_demissao']!="" && $query[$i]['ic_status']==2){
                    $queryc = $agenda_colaborador_padraodao->verificarColaboradorAtivo($dt_agenda,$query[$i]['colaborador_pk']);
                    if($queryc[0]['total']==0){
                        $mysql_data[] = array(
                            "t_ds_re"=>$query[$i]['ds_re'],
                            "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                            "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                            "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                            "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                            "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                            "t_processos_pk"=>$query[$i]['processos_pk'],
                            "t_ds_leads"=>$query[$i]['ds_lead'],
                            "t_leads_pk"=>$query[$i]['leads_pk'],
                            "t_ic_status"=>$query[$i]['ic_status'],
                            "t_ic_funcionario"=>$query[$i]['ic_funcionario'],
                            "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                            "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                            "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                            "tipo_escala"=>$query[$i]['tipo_escala'],
                            "t_functions" => ""
                        );
                    }
                    else{
                        $mysql_data = [];
                    }
                }
                else if($query[$i]['dt_cancelamento']!=""){
                    $queryca = $agenda_colaborador_padraodao->verificarAgendaAtivo($dt_agenda,$query[$i]['pk']);
                    if($queryca[0]['total']==0){
                        $mysql_data[] = array(
                            "t_ds_re"=>$query[$i]['ds_re'],
                            "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                            "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                            "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                            "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                            "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                            "t_processos_pk"=>$query[$i]['processos_pk'],
                            "t_ds_leads"=>$query[$i]['ds_lead'],
                            "t_leads_pk"=>$query[$i]['leads_pk'],
                            "t_ic_status"=>$query[$i]['ic_status'],
                            "t_ic_funcionario"=>$query[$i]['ic_funcionario'],
                            "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                            "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                            "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                            "tipo_escala"=>$query[$i]['tipo_escala'],
                            "t_functions" => ""
                        );
                    }
                    else{
                        $mysql_data = [];
                    }
                }
                else{
                    $mysql_data[] = array(
                        "t_ds_re"=>$query[$i]['ds_re'],
                        "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                        "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                        "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                        "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                        "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                        "t_processos_pk"=>$query[$i]['processos_pk'],
                        "t_ds_leads"=>$query[$i]['ds_lead'],
                        "t_leads_pk"=>$query[$i]['leads_pk'],
                        "t_ic_status"=>$query[$i]['ic_status'],
                        "t_ic_funcionario"=>$query[$i]['ic_funcionario'],
                        "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                        "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                        "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                        "tipo_escala"=>$query[$i]['tipo_escala'],
                        "t_functions" => ""
                    );
                }
                
                
                
                
                
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarColaboradorAgendaDataGeralColaborador':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $colaboradores_pk = $_REQUEST['colaboradores_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        $ic_status = $_REQUEST['ic_status'];
        //$dia_semana = $_REQUEST['dia_semana'];
        
        $resultado = "";
        $result  = 'success';
        $message = 'query success';
                
        $queryl = $agenda_colaborador_padraodao->listarLeadsPorColaboradorAgenda($dt_agenda,$dt_agenda_fim,$colaboradores_pk,$ic_status);
        
        if(count($queryl) > 0){
            for($l = 0; $l < count($queryl); $l++){
                $query = $agenda_colaborador_padraodao->listarColaboradorAgendaDataGeralColaborador($dt_agenda,$dt_agenda_fim,$colaboradores_pk,$ic_status,$queryl[$l]['leads_pk']);

        
                

                if(count($query) > 0){
                    for($i = 0; $i < count($query); $i++){
                        if($query[$i]['dt_demissao']!="" && $query[$i]['ic_status']==2){
                            $queryc = $agenda_colaborador_padraodao->verificarColaboradorAtivo($dt_agenda,$query[$i]['colaborador_pk']);
                            if($queryc[0]['total']==0){
                                $mysql_data[] = array(
                                    "t_ds_re"=>$query[$i]['ds_re'],
                                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                                    "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                                    "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                                    "t_processos_pk"=>$query[$i]['processos_pk'],
                                    "t_ds_leads"=>$query[$i]['ds_lead'],
                                    "t_leads_pk"=>$query[$i]['leads_pk'],
                                    "t_ic_status"=>$query[$i]['ic_status'],
                                    "t_ic_funcionario"=>$query[$i]['ic_funcionario'],
                                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                                    "tipo_escala"=>$query[$i]['tipo_escala'],
                                    "t_functions" => ""
                                );
                            }
                            else{
                                $mysql_data = [];
                            }
                        }
                        else if($query[$i]['dt_cancelamento']!=""){
                            $queryca = $agenda_colaborador_padraodao->verificarAgendaAtivo($dt_agenda,$query[$i]['pk']);
                            if($queryca[0]['total']==0){
                                $mysql_data[] = array(
                                    "t_ds_re"=>$query[$i]['ds_re'],
                                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                                    "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                                    "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                                    "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                                    "t_processos_pk"=>$query[$i]['processos_pk'],
                                    "t_ds_leads"=>$query[$i]['ds_lead'],
                                    "t_leads_pk"=>$query[$i]['leads_pk'],
                                    "t_ic_status"=>$query[$i]['ic_status'],
                                    "t_ic_funcionario"=>$query[$i]['ic_funcionario'],
                                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                                    "tipo_escala"=>$query[$i]['tipo_escala'],
                                    "t_functions" => ""
                                );
                            }
                            else{
                                $mysql_data = [];
                            }
                        }
                        else{
                            $mysql_data[] = array(
                                "t_ds_re"=>$query[$i]['ds_re'],
                                "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                                "t_n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                                "t_ds_colaborador"=>$query[$i]['ds_colaborador'],
                                "t_colaborador_pk"=>$query[$i]['colaborador_pk'],
                                "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                                "t_processos_pk"=>$query[$i]['processos_pk'],
                                "t_ds_leads"=>$query[$i]['ds_lead'],
                                "t_leads_pk"=>$query[$i]['leads_pk'],
                                "t_ic_status"=>$query[$i]['ic_status'],
                                "t_ic_funcionario"=>$query[$i]['ic_funcionario'],
                                "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                                "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                                "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                                "tipo_escala"=>$query[$i]['tipo_escala'],
                                "t_functions" => ""
                            );
                        }
                    }
                }
                else{

                    $mysql_data = [];
                }
            }
        }
        else{

            $mysql_data = [];
        }
        
		
        break;
    }    
    case 'RelatorioPostoTrabalhoXColaborador':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $colaboradores_pk = $_REQUEST['colaborador_pk'];
        $leads_pk = $_REQUEST['leads_pk'];
        //$dia_semana = $_REQUEST['dia_semana'];
        
        $resultado = "";

                
        $query = $agenda_colaborador_padraodao->RelatorioPostoTrabalhoXColaborador($colaboradores_pk,$leads_pk);

        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_status"=>$query[$i]['ds_status'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_status_colaborador"=>$query[$i]['ds_status_colaborador'],
                    "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "periodo"=>$query[$i]['periodo'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    
                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarPostoTrabalhoColaboradorEscala':{

        $colaboradores_pk = $_REQUEST['colaboradores_pk'];
        
        $resultado = "";
        
        
        $queryl = $agenda_colaborador_padraodao->listarLeadsPorColaboradorAgenda("","",$colaboradores_pk,"");
        
        if(count($queryl) > 0){
            for($l = 0; $l < count($queryl); $l++){
                $query = $agenda_colaborador_padraodao->listarPostoTrabalhoColaboradorEscala($colaboradores_pk,$queryl[$l]['leads_pk']);

        
                $result  = 'success';
                $message = 'query success';

                if(count($query) > 0){
                    for($i = 0; $i < count($query); $i++){
                        $mysql_data[] = array(
                            "ds_lead"=>$query[$i]['ds_lead'],
                            "leads_pk"=>$query[$i]['leads_pk'],
                            "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                            "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana']
                        );
                    }
                }
                else{

                    $mysql_data = [];
                }
            }
        }
        else{

            $mysql_data = [];
        }
        
                
        
		
        break;
    }    
    case 'listarAgendaLeadDataColaborador':{

        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        $dia_semana = $_REQUEST['dia_semana'];
        

        
      
        $resultado = "";
        if($leads_pk!=""){
                
            $query = $agenda_colaborador_padraodao->listarAgendaLeadDataColaborador($leads_pk,$dt_agenda,$dt_agenda_fim,$dia_semana);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($query[$i]['ic_dom']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($query[$i]['ic_seg']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($query[$i]['ic_ter']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($query[$i]['ic_qua']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($query[$i]['ic_qui']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($query[$i]['ic_sex']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($query[$i]['ic_sab']==1){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_produto_servico_dom"=>$query[$i]['ds_produto_servico_dom'],
                    "hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_produto_servico_seg"=>$query[$i]['ds_produto_servico_seg'],
                    "hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_produto_servico_ter"=>$query[$i]['ds_produto_servico_ter'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_produto_servico_qua"=>$query[$i]['ds_produto_servico_qua'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_produto_servico_qui"=>$query[$i]['ds_produto_servico_qui'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_produto_servico_sex"=>$query[$i]['ds_produto_servico_sex'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    "t_ds_produto_servico_sab"=>$query[$i]['ds_produto_servico_sab'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_ds_colaborador_grid"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarAgendaColaboradorDataGrid':{
        if(!permissao("agenda_condominio", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        $dt_agenda = $_REQUEST['dt_agenda'];
        $dt_agenda_fim = $_REQUEST['dt_agenda_fim'];
        $dia_semana = $_REQUEST['dia_semana'];
        
        
        
      
        $resultado = "";
        if($colaborador_pk!=""){
            $query = $agenda_colaborador_padraodao->listar_agenda_colaborador_colaborador_data($colaborador_pk,$dt_agenda,$dt_agenda_fim,$dia_semana);
        }
        else{
            $mysql_data = [];
        }
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                if($dia_semana==0){
                    $ds_turno_escala = $query[$i]['ds_turno_dom'];
                    $turnos_pk_escala = $query[$i]['dom_turnos_pk'];
                }
                else if($dia_semana==1){
                    $ds_turno_escala = $query[$i]['ds_turno_seg'];
                    $turnos_pk_escala = $query[$i]['seg_turnos_pk'];
                }
                else if($dia_semana==2){
                    $ds_turno_escala = $query[$i]['ds_turno_ter'];
                    $turnos_pk_escala = $query[$i]['ter_turnos_pk'];
                }
                else if($dia_semana==3){
                    $ds_turno_escala = $query[$i]['ds_turno_qua'];
                    $turnos_pk_escala = $query[$i]['qua_turnos_pk'];
                }
                else if($dia_semana==4){
                    $ds_turno_escala = $query[$i]['ds_turno_qui'];
                    $turnos_pk_escala = $query[$i]['qui_turnos_pk'];
                }
                else if($dia_semana==5){
                    $ds_turno_escala = $query[$i]['ds_turno_sex'];
                    $turnos_pk_escala = $query[$i]['sex_turnos_pk'];
                }
                else if($dia_semana==6){
                    $ds_turno_escala = $query[$i]['ds_turno_sab'];
                    $turnos_pk_escala = $query[$i]['sab_turnos_pk'];
                }
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_agenda"=>$query[$i]['ds_agenda'],
                    "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    "t_turnos_pk"=>$turnos_pk_escala,
                    "t_ds_turnos"=>$ds_turno_escala,
                    "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                    
                    "t_dom_ds_turnos"=>$query[$i]['ds_turno_dom'],
                    "t_seg_ds_turnos"=>$query[$i]['ds_turno_seg'],
                    "t_ter_ds_turnos"=>$query[$i]['ds_turno_ter'],
                    "t_qua_ds_turnos"=>$query[$i]['ds_turno_qua'],
                    "t_qui_ds_turnos"=>$query[$i]['ds_turno_qui'],
                    "t_sex_ds_turnos"=>$query[$i]['ds_turno_sex'],
                    "t_sab_ds_turnos"=>$query[$i]['ds_turno_sab'],
                    
                    "t_ic_dom"=>$query[$i]['ic_dom'],
                    "t_ic_seg"=>$query[$i]['ic_seg'],
                    "t_ic_ter"=>$query[$i]['ic_ter'],
                    "t_ic_qua"=>$query[$i]['ic_qua'],
                    "t_ic_qui"=>$query[$i]['ic_qui'],
                    "t_ic_sex"=>$query[$i]['ic_sex'],
                    "t_ic_sab"=>$query[$i]['ic_sab'],
                    
                    "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                    "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                    "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                    "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                    "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                    "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                    "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                    
                    "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                    "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                    "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                    "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                    "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                    "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                    "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                    
                    
                    
                    "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                    "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                    "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    
                    "t_ds_colaboradores_dom"=>$query[$i]['ds_colaborador_dom'],
                    "t_ds_colaboradores_seg"=>$query[$i]['ds_colaborador_seg'],
                    "t_ds_colaboradores_ter"=>$query[$i]['ds_colaborador_ter'],
                    "t_ds_colaboradores_qua"=>$query[$i]['ds_colaborador_qua'],
                    "t_ds_colaboradores_qui"=>$query[$i]['ds_colaborador_qui'],
                    "t_ds_colaboradores_sex"=>$query[$i]['ds_colaborador_sex'],
                    "t_ds_colaboradores_sab"=>$query[$i]['ds_colaborador_sab'],
                    
                    "t_ds_colaborador_grid"=>$query[$i]['ds_colaborador_grid'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                    "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],
                    "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                    "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                    "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                    "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                    "tipo_escala"=>$query[$i]['tipo_escala'],
                    "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                    "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                    "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                    "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                    "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                    "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                    "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                    "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                    "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                    "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                    "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                    "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                    
                    "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "turnos_pk"=>$query[$i]['turnos_pk'],
                    "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                    "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                    "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                    "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                    "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],

                    "t_functions" => ""
                );
            }
        }
        else{
           
            $mysql_data = [];
        }
		
        break;
    }  
    case 'listarAgendaColaboradorData':{
        if(!permissao("agenda_colaborador", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        $dt_base = $_REQUEST['dt_base'];
        $dt_base_fim = $_REQUEST['dt_base_fim'];
        $dia = $_REQUEST['Dia'];
        $mes = $_REQUEST['Mes'];
        $ano = $_REQUEST['Ano'];
        $dia_semana = $_REQUEST['dia_semana'];
        
            $resultado = "";
            if($colaborador_pk!=""){
                $query = $agenda_colaborador_padraodao->listar_agenda_colaborador_data($colaborador_pk,$dt_base,$dt_base_fim,$dia_semana);
            }
            else{
                $mysql_data = [];
            }

            $result  = 'success';
            $message = 'query success';

            if(count($query) > 0){
                for($i = 0; $i < count($query); $i++){

                    $mysql_data[] = array(
                        "t_pk" => $query[$i]["pk"],
                        "t_ds_agenda"=>$query[$i]['ds_agenda'],
                        "t_dt_inicio_agenda"=>$query[$i]['dt_inicio_agenda'],
                        "t_dt_fim_agenda"=>$query[$i]['dt_fim_agenda'],
                        "t_turnos_pk"=>$query[$i]['turnos_pk'],
                        "t_ds_turno_dom"=>$query[$i]['ds_turno_dom'],
                        "t_ds_turno_seg"=>$query[$i]['ds_turno_seg'],
                        "t_ds_turno_ter"=>$query[$i]['ds_turno_ter'],
                        "t_ds_turno_qua"=>$query[$i]['ds_turno_qua'],
                        "t_ds_turno_qui"=>$query[$i]['ds_turno_qui'],
                        "t_ds_turno_sex"=>$query[$i]['ds_turno_sex'],
                        "t_ds_turno_sab"=>$query[$i]['ds_turno_sab'],
                        "t_dias_semana_pk"=>$query[$i]['dias_semana_pk'],
                        "t_ds_dias_semana_pk"=>$query[$i]['ds_dia_semana'],
                        "t_colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                        "t_ds_colaboradores_pk"=>$query[$i]['ds_colaborador'],
                        "t_leads_pk"=>$query[$i]['leads_pk'],
                        "t_ds_colaborador_grid"=>$query[$i]['ds_colaborador_grid'],
                        "t_ds_lead"=>$query[$i]['ds_lead'],
                        "t_condominio"=>$query[$i]['condominio'],
                        "t_ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                        "t_qtde_colaborador"=>$query[$i]['qtde_colaborador'],
                        "t_processos_etapas_pk"=>$query[$i]['processos_etapas_pk'],

                        "t_ic_dom"=>$query[$i]['ic_dom'],
                        "t_ic_seg"=>$query[$i]['ic_seg'],
                        "t_ic_ter"=>$query[$i]['ic_ter'],
                        "t_ic_qua"=>$query[$i]['ic_qua'],
                        "t_ic_qui"=>$query[$i]['ic_qui'],
                        "t_ic_sex"=>$query[$i]['ic_sex'],
                        "t_ic_sab"=>$query[$i]['ic_sab'],
                        
                        "t_hr_turno_dom"=>$query[$i]['hr_turno_dom'],
                        "t_hr_turno_seg"=>$query[$i]['hr_turno_seg'],
                        "t_hr_turno_ter"=>$query[$i]['hr_turno_ter'],
                        "t_hr_turno_qua"=>$query[$i]['hr_turno_qua'],
                        "t_hr_turno_qui"=>$query[$i]['hr_turno_qui'],
                        "t_hr_turno_sex"=>$query[$i]['hr_turno_sex'],
                        "t_hr_turno_sab"=>$query[$i]['hr_turno_sab'],
                        "t_hr_turno_dom_saida"=>$query[$i]['hr_turno_dom_saida'],
                        "t_hr_turno_seg_saida"=>$query[$i]['hr_turno_seg_saida'],
                        "t_hr_turno_ter_saida"=>$query[$i]['hr_turno_ter_saida'],
                        "t_hr_turno_qua_saida"=>$query[$i]['hr_turno_qua_saida'],
                        "t_hr_turno_qui_saida"=>$query[$i]['hr_turno_qui_saida'],
                        "t_hr_turno_sex_saida"=>$query[$i]['hr_turno_sex_saida'],
                        "t_hr_turno_sab_saida"=>$query[$i]['hr_turno_sab_saida'],
                        "t_nao_repetir_proxima_semana_pk"=>$query[$i]['nao_repetir_proxima_semana_pk'],
                        "t_ic_nao_repetir"=>$query[$i]['ic_nao_repetir'],
                        "dt_cancelamento"=>$query[$i]['dt_cancelamento'],
                        "ds_motivo_cancelamento"=>$query[$i]['ds_motivo_cancelamento'],
                        "tipo_escala"=>$query[$i]['tipo_escala'],
                        "hr_intervalo_seg"=>$query[$i]['hr_intervalo_seg'],
                        "hr_intervalo_ter"=>$query[$i]['hr_intervalo_ter'],
                        "hr_intervalo_qua"=>$query[$i]['hr_intervalo_qua'],
                        "hr_intervalo_qui"=>$query[$i]['hr_intervalo_qui'],
                        "hr_intervalo_sex"=>$query[$i]['hr_intervalo_sex'],
                        "hr_intervalo_sab"=>$query[$i]['hr_intervalo_sab'],
                        "hr_intervalo_saida_seg"=>$query[$i]['hr_intervalo_saida_seg'],
                        "hr_intervalo_saida_ter"=>$query[$i]['hr_intervalo_saida_ter'],
                        "hr_intervalo_saida_qua"=>$query[$i]['hr_intervalo_saida_qua'],
                        "hr_intervalo_saida_qui"=>$query[$i]['hr_intervalo_saida_qui'],
                        "hr_intervalo_saida_sex"=>$query[$i]['hr_intervalo_saida_sex'],
                        "hr_intervalo_saida_sab"=>$query[$i]['hr_intervalo_saida_sab'],
                        
                        "produtos_servicos_pk"=>$query[$i]['produtos_servicos_pk'],
                        "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                        "turnos_pk"=>$query[$i]['turnos_pk'],
                        "hr_inicio_expediente"=>$query[$i]['hr_inicio_expediente'],
                        "hr_termino_expediente"=>$query[$i]['hr_termino_expediente'],
                        "hr_saida_intervalo"=>$query[$i]['hr_saida_intervalo'],
                        "hr_retorno_intervalo"=>$query[$i]['hr_retorno_intervalo'],
                        "ic_preenchimento_automatico"=>$query[$i]['ic_preenchimento_automatico'],


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

$agenda_colaborador_padraodao = null;

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
