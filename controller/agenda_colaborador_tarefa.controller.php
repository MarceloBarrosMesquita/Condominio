<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/agenda_colaborador_tarefa.dao.php";
require_once "../model/agenda_colaborador_tarefa.class.php";
require_once "../model/agenda_colaborador_padrao.dao.php";
require_once "../model/agenda_colaborador_padrao.class.php";
require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";



$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_tarefa = $arrRequest['ds_tarefa'];
$obs_tarefa = $arrRequest['obs_tarefa'];
$hr_inicio = $arrRequest['hr_inicio'];
$usuario_termino_pk = $arrRequest['usuario_termino_pk'];
$dt_termino = $arrRequest['dt_termino'];
$obs_termino_tarefa = $arrRequest['obs_termino_tarefa'];
$dt_alteracao_tarefa = $arrRequest['dt_alteracao_tarefa'];
$ic_dia = $arrRequest['ic_dia'];
$agendas_pk = $arrRequest['agendas_pk'];
$ic_tarefa_recorrente = $arrRequest['ic_tarefa_recorrente'];
$dt_execucao = $arrRequest['dt_execucao'];


$agenda_colaborador_tarefadao = new agenda_colaborador_tarefadao();
$agenda_colaborador_tarefadao->setToken($token); 
$agenda_colaborador_padraodao = new agenda_colaborador_padraodao();
$agenda_colaborador_padraodao->setToken($token); 
$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){

    case 'excluir':{
        
        $resultdo = "";
        
        $agenda_colaborador_tarefa = $agenda_colaborador_tarefadao->carregarPorPk($pk);
        if($agenda_colaborador_tarefa->getpk()>0){
            
            $log_exclusaodao->salvar("agenda_colaborador_tarefa",$agenda_colaborador_tarefa->getpk());
            
            $agenda_colaborador_tarefadao->excluir($agenda_colaborador_tarefa);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';
        }
        break;
    }
    case 'salvar':{
        
        function somar_data($data, $dias, $meses, $ano){
            $data = explode("/", $data);
            $resData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
            return $resData;
        }
        if($ic_tarefa_recorrente==1){
            $query = $agenda_colaborador_padraodao->listarPorPk($agendas_pk);
            
            // Calcula a diferença em segundos entre as datas
            $diferenca = strtotime($query[0]['dt_fim_agenda']) - strtotime(dataYMD($dt_execucao));

            //Calcula a diferença em dias
            $dias = ($diferenca / (60 * 60 * 24));
         
            $dataPadrao = DataYMD($dt_execucao);
            for($i=0;$i<($dias);$i++){
                
                $dataSomada = somar_data(DataDMY($dataPadrao), $i, 0, 0);
                
                $date = date($dataSomada);
                
                $diasemana_numero = date('w', strtotime(DataYMD($date)));
                if(($diasemana_numero+1)==$ic_dia){
                    //echo $dataSomada."------".$diasemana_numero."<br>";
                    $agenda_colaborador_tarefa = $agenda_colaborador_tarefadao->carregarPorPk("");
                    $agenda_colaborador_tarefa->setds_tarefa($ds_tarefa);
                    $agenda_colaborador_tarefa->setobs_tarefa($obs_tarefa);
                    $agenda_colaborador_tarefa->sethr_inicio($hr_inicio);
                    $agenda_colaborador_tarefa->setusuario_termino_pk($usuario_termino_pk);
                    $agenda_colaborador_tarefa->setdt_termino($dt_termino);
                    $agenda_colaborador_tarefa->setobs_termino_tarefa($obs_termino_tarefa);
                    $agenda_colaborador_tarefa->setdt_alteracao_tarefa($dt_alteracao_tarefa);
                    $agenda_colaborador_tarefa->setic_dia(($diasemana_numero+1));
                    $agenda_colaborador_tarefa->setagendas_pk($agendas_pk);
                    $agenda_colaborador_tarefa->setic_tarefa_recorrente($ic_tarefa_recorrente);
                    $agenda_colaborador_tarefa->setdt_execucao($dataSomada);
                    
                    $pk = $agenda_colaborador_tarefadao->salvar($agenda_colaborador_tarefa);
                }
                
            }
        }
        else{
            $agenda_colaborador_tarefa = $agenda_colaborador_tarefadao->carregarPorPk($pk);
            $agenda_colaborador_tarefa->setds_tarefa($ds_tarefa);
            $agenda_colaborador_tarefa->setobs_tarefa($obs_tarefa);
            $agenda_colaborador_tarefa->sethr_inicio($hr_inicio);
            $agenda_colaborador_tarefa->setusuario_termino_pk($usuario_termino_pk);
            $agenda_colaborador_tarefa->setdt_termino($dt_termino);
            $agenda_colaborador_tarefa->setobs_termino_tarefa($obs_termino_tarefa);
            $agenda_colaborador_tarefa->setdt_alteracao_tarefa($dt_alteracao_tarefa);
            $agenda_colaborador_tarefa->setic_dia($ic_dia);
            $agenda_colaborador_tarefa->setagendas_pk($agendas_pk);
            //$agenda_colaborador_tarefa->setic_tarefa_recorrente($ic_tarefa_recorrente);
            $agenda_colaborador_tarefa->setdt_execucao($dt_execucao);
            $pk = $agenda_colaborador_tarefadao->salvar($agenda_colaborador_tarefa);
        }
            
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        
        $resultado = "";
        $query = $agenda_colaborador_tarefadao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_tarefa"=>$query[$i]['ds_tarefa'],
                    "obs_tarefa"=>$query[$i]['obs_tarefa'],
                    "hr_inicio"=>$query[$i]['hr_inicio'],
                    "usuario_termino_pk"=>$query[$i]['usuario_termino_pk'],
                    "dt_termino"=>$query[$i]['dt_termino'],
                    "obs_termino_tarefa"=>$query[$i]['obs_termino_tarefa'],
                    "dt_alteracao_tarefa"=>$query[$i]['dt_alteracao_tarefa'],
                    "ic_dia"=>$query[$i]['ic_dia'],
                    "ic_tarefa_recorrente"=>$query[$i]['ic_tarefa_recorrente'],
                    "dt_execucao"=>$query[$i]['dt_execucao'],
                    "agendas_pk"=>$query[$i]['agendas_pk']
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
        
        $resultado = "";
        $query = $agenda_colaborador_tarefadao->listar_por_ds_tarefa($ds_tarefa);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_tarefa"=>$query[$i]['ds_tarefa'],
                    "obs_tarefa"=>$query[$i]['obs_tarefa'],
                    "hr_inicio"=>$query[$i]['hr_inicio'],
                    "usuario_termino_pk"=>$query[$i]['usuario_termino_pk'],
                    "dt_termino"=>$query[$i]['dt_termino'],
                    "obs_termino_tarefa"=>$query[$i]['obs_termino_tarefa'],
                    "dt_alteracao_tarefa"=>$query[$i]['dt_alteracao_tarefa'],
                    "ic_dia"=>$query[$i]['ic_dia'],
                    "dt_execucao"=>$query[$i]['dt_execucao'],
                    "ic_tarefa_recorrente"=>$query[$i]['ic_tarefa_recorrente'],
                    "agendas_pk"=>$query[$i]['agendas_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTarefaPorIcDiaAgenda':{
        
        $agendas_pk = $_REQUEST['agendas_pk'];
        $ic_dia = $_REQUEST['ic_dia'];
        $dt_execucao = $_REQUEST['dt_execucao'];
        
        $result  = 'success';
        $message = 'query success';
        if($agendas_pk==""){
            $mysql_data = [];
        }
        else{
            $resultado = "";
            $query = $agenda_colaborador_tarefadao->listarTarefaPorIcDiaAgenda($agendas_pk,$ic_dia,$dt_execucao);



            if(count($query) > 0){
                for($i = 0; $i < count($query); $i++){
                    $mysql_data[] = array(
                        "pk" => $query[$i]["pk"],
                        "ds_tarefa"=>$query[$i]['ds_tarefa'],
                        "obs_tarefa"=>$query[$i]['obs_tarefa'],
                        "hr_inicio"=>$query[$i]['hr_inicio'],
                        "usuario_termino_pk"=>$query[$i]['usuario_termino_pk'],
                        "dt_termino"=>$query[$i]['dt_termino'],
                        "obs_termino_tarefa"=>$query[$i]['obs_termino_tarefa'],
                        "dt_alteracao_tarefa"=>$query[$i]['dt_alteracao_tarefa'],
                        "ic_dia"=>$query[$i]['ic_dia'],
                        "dt_execucao"=>$query[$i]['dt_execucao'],
                        "ic_tarefa_recorrente"=>$query[$i]['ic_tarefa_recorrente'],
                        "agendas_pk"=>$query[$i]['agendas_pk']
                    );
                }
            }
            else{
                $mysql_data = [];
            }
        }
        
			
        
        break;
    }
    case 'listarTarefasColaboradoresPorData':{
        
        $dt_execucao = $_REQUEST['dt_execucao'];
        
        $result  = 'success';
        $message = 'query success';
        $resultado = "";
        
        $query = $agenda_colaborador_tarefadao->listarTarefasColaboradoresPorData($dt_execucao);
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_tarefa"=>$query[$i]['ds_tarefa'],
                    "obs_tarefa"=>$query[$i]['obs_tarefa'],
                    "hr_inicio"=>$query[$i]['hr_inicio'],
                    "usuario_termino_pk"=>$query[$i]['usuario_termino_pk'],
                    "dt_termino"=>$query[$i]['dt_termino'],
                    "obs_termino_tarefa"=>$query[$i]['obs_termino_tarefa'],
                    "dt_alteracao_tarefa"=>$query[$i]['dt_alteracao_tarefa'],
                    "ic_dia"=>$query[$i]['ic_dia'],
                    "ic_tarefa_recorrente"=>$query[$i]['ic_tarefa_recorrente'],
                    "dt_execucao"=>$query[$i]['dt_execucao'],
                    "agendas_pk"=>$query[$i]['agendas_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
        
			
        
        break;
    }
    case 'listarDataTable':{
        
        
        $resultado = "";
        $query = $agenda_colaborador_tarefadao->listar_por_ds_tarefa($ds_tarefa);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_tarefa"=>$query[$i]['ds_tarefa'],
                    "t_obs_tarefa"=>$query[$i]['obs_tarefa'],
                    "t_hr_inicio"=>$query[$i]['hr_inicio'],
                    "t_usuario_termino_pk"=>$query[$i]['usuario_termino_pk'],
                    "t_dt_termino"=>$query[$i]['dt_termino'],
                    "t_obs_termino_tarefa"=>$query[$i]['obs_termino_tarefa'],
                    "t_dt_alteracao_tarefa"=>$query[$i]['dt_alteracao_tarefa'],
                    "t_ic_dia"=>$query[$i]['ic_dia'],
                    "t_ic_tarefa_recorrente"=>$query[$i]['ic_tarefa_recorrente'],
                    "t_dt_execucao"=>$query[$i]['dt_execucao'],
                    "t_agendas_pk"=>$query[$i]['agendas_pk'],

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    //App Listar tarefas por posto de trabalho
    case 'listarTarefas':{   
        
        $ds_pin = $_REQUEST['ds_pin'];
        $lead_posto_pk = $_REQUEST['lead_posto_pk'];
        $dt_tarefa_dia = $_REQUEST['dt_tarefa_dia'];
        
        $resultado = "";
        $query = $agenda_colaborador_tarefadao->listarTarefasDia($ds_pin,$lead_posto_pk,$dt_tarefa_dia);
        
        $result  = 'success';
        $message = 'query success';

        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_tarefa"=>$query[$i]['ds_tarefa'],
                    "t_obs_tarefa"=>$query[$i]['obs_tarefa'],
                    "t_hr_inicio"=>$query[$i]['hr_inicio'],      
                    "t_dt_termino"=>$query[$i]['dt_termino'],
                    "t_obs_termino_tarefa"=>$query[$i]['obs_termino_tarefa']
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

$agenda_colaborador_tarefadao = null;

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
