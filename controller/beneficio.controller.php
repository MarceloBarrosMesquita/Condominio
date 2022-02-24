<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/beneficio.dao.php";
require_once "../model/beneficio.class.php";
require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";



$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_beneficio = $arrRequest['ds_beneficio'];
$ic_status = $arrRequest['ic_status'];


$beneficiodao = new beneficiodao();
$beneficiodao->setToken($token); 
$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){

    case 'excluir':{
        
        $resultdo = "";
        
        $beneficio = $beneficiodao->carregarPorPk($pk);
        if($beneficio->getpk()>0){
            
            $log_exclusaodao->salvar("beneficios",$beneficio->getpk());
            
            $beneficiodao->excluir($beneficio);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'beneficio nao encontrado';
        }
        break;
    }
    case 'salvar':{
        
        $beneficio = $beneficiodao->carregarPorPk($pk);
        $beneficio->setds_beneficio($ds_beneficio);
        $beneficio->setic_status($ic_status);

        
        $pk = $beneficiodao->salvar($beneficio);
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        
        $resultado = "";
        $query = $beneficiodao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_beneficio"=>$query[$i]['ds_beneficio'],
                    "ic_status"=>$query[$i]['ic_status']
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
        $query = $beneficiodao->listar_por_ds_beneficio($ds_beneficio,$ic_status);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_beneficio"=>$query[$i]['ds_beneficio'],
                    "ic_status"=>$query[$i]['ic_status']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarBeneficioColaboradores':{
        
        $colaboradores_pk = $_REQUEST['colaboradores_pk'];
        
        $result  = 'success';
        $message = 'query success';

        if($colaboradores_pk > 0){
            $query = $beneficiodao->listar_beneficio_colaboradores($colaboradores_pk);
        }
        else{
            $mysql_data = [];
        }
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "vl_beneficio" => $query[$i]['vl_beneficio'],
                    "obs"=>$query[$i]['obs'],
                    "ic_status"=>$query[$i]['ic_status'],
                    "beneficios_pk"=>$query[$i]['beneficios_pk']
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
        $query = $beneficiodao->listar_por_ds_beneficio($ds_beneficio);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_beneficio"=>$query[$i]['ds_beneficio'],
                    "t_ic_status"=>$query[$i]['ic_status'],

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

$beneficiodao = null;

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
