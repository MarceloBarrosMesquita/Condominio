<?php

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/retorno.dao.php";
require_once "../model/retorno.class.php";

$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$dt_retorno = $arrRequest['dt_retorno'];
$equipes_pk = $arrRequest['equipes_pk'];
$responsavel_pk = $arrRequest['responsavel_pk'];
$dt_termino_retorno = $arrRequest['dt_termino_retorno'];
$ds_retorno = $arrRequest['ds_retorno'];
$ocorrencias_pk = $arrRequest['ocorrencias_pk'];
$tipo_lembrete_pk = $arrRequest['tipo_lembrete_pk'];


$retornodao = new retornodao();
$retornodao->setToken($token); 

switch($job){

    case 'excluir':{
        
        $resultdo = "";
        
        $retorno = $retornodao->carregarPorPk($pk);
        
        if($retorno->getpk()>0){            
            $retornodao->excluir($retorno);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';
        }
        else{
            $result  = 'error';
            $message = 'retorno nao encontrado';
        }
        break;
    }
    case 'salvar':{
        
        $retorno = $retornodao->carregarPorPk($pk);
        $retorno->setdt_retorno($dt_retorno);
        $retorno->setequipes_pk($equipes_pk);
        $retorno->setresponsavel_pk($responsavel_pk);
        $retorno->setdt_termino_retorno($dt_termino_retorno);
        $retorno->setds_retorno($ds_retorno);
        $retorno->setocorrencias_pk($ocorrencias_pk);
        $retorno->settipo_lembrete_pk($tipo_lembrete_pk);

        
        $pk = $retornodao->salvar($retorno);
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        
        $resultado = "";
        $query = $retornodao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "dt_retorno"=>$query[$i]['dt_retorno'],
                    "equipes_pk"=>$query[$i]['equipes_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "dt_termino_retorno"=>$query[$i]['dt_termino_retorno'],
                    "ds_retorno"=>$query[$i]['ds_retorno'],
                    "tipo_lembrete_pk"=>$query[$i]['tipo_lembrete_pk'],
                    "ocorrencias_pk"=>$query[$i]['ocorrencias_pk']
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
    
    case 'listarOcorrenciasPk':{
        
        $ocorrencias_pk = $_REQUEST['ocorrencias_pk'];
        $resultado = "";
        
        $query = $retornodao->listarPorOcorrenciasPk($ocorrencias_pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "dt_retorno"=>$query[$i]['dt_retorno'],
                    "hr_retorno"=>$query[$i]['hr_retorno'],
                    "dt_termino_retorno"=>$query[$i]['dt_termino_retorno'],
                    "hr_termino_retorno"=>$query[$i]['hr_termino_retorno'],
                    "equipes_pk"=>$query[$i]['equipes_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "dt_termino_retorno"=>$query[$i]['dt_termino_retorno'],
                    "ds_retorno"=>$query[$i]['ds_retorno'],
                    "tipo_lembrete_pk"=>$query[$i]['tipo_lembrete_pk'],
                    "ocorrencias_pk"=>$query[$i]['ocorrencias_pk']
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
        $query = $retornodao->listar_por_dt_retorno($dt_retorno);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "dt_retorno"=>$query[$i]['dt_retorno'],
                    "equipes_pk"=>$query[$i]['equipes_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "dt_termino_retorno"=>$query[$i]['dt_termino_retorno'],
                    "ds_retorno"=>$query[$i]['ds_retorno'],
                    "tipo_lembrete_pk"=>$query[$i]['tipo_lembrete_pk'],
                    "ocorrencias_pk"=>$query[$i]['ocorrencias_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }    
    case 'listarDataTablePopup':{        
                
        $resultado = "";
        $query = $retornodao->listar_retorno_aberto_Popup();
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(  
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_dt_retorno"=>$query[$i]['dt_retorno'],
                    "t_ds_agendado_para"=>$query[$i]['ds_agendado_para'],
                    "t_ds_tipo_ocorrencia"=>$query[$i]['ds_tipo_ocorrencia'],
                    "t_ds_retorno"=>$query[$i]['ds_retorno'],
                    "t_tipo_lembrete_pk"=>$query[$i]['tipo_lembrete_pk'],
                    "t_qtde_retorno"=>count($query),

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }   
    case 'listarDataTablePopupWhats':{        
                
        $resultado = "";
        $query = $retornodao->listar_retorno_aberto_Whats($dt_retorno);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(  
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_dt_retorno"=>$query[$i]['dt_retorno'],
                    "t_ds_agendado_para"=>$query[$i]['ds_agendado_para'],
                    "t_ds_tipo_ocorrencia"=>$query[$i]['ds_tipo_ocorrencia'],
                    "t_ds_retorno"=>$query[$i]['ds_retorno'],
                    "t_tipo_lembrete_pk"=>$query[$i]['tipo_lembrete_pk'],
                    "t_ds_cel"=>$query[$i]['ds_cel'],
                    "t_qtde_retorno"=>count($query),

                    "t_functions" => ""
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
        $query = $retornodao->listar_por_dt_retorno($dt_retorno);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_retorno"=>$query[$i]['dt_retorno'],
                    "t_equipes_pk"=>$query[$i]['equipes_pk'],
                    "t_responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "t_dt_termino_retorno"=>$query[$i]['dt_termino_retorno'],
                    "t_ds_retorno"=>$query[$i]['ds_retorno'],
                    "t_ocorrencias_pk"=>$query[$i]['ocorrencias_pk'],
                    "t_tipo_lembrete_pk"=>$query[$i]['tipo_lembrete_pk'],

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    } 
    case 'listarRerornoPopUp':{
                        
        $resultado = "";
        $query = $retornodao->listar_qtde_retorno_aberto();
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_qtde_retorno" => $query[$i]["qtde_retorno"],
      
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

$retornodao = null;

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
