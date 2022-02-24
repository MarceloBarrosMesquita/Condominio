<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/ponto_folha_registro.dao.php";
require_once "../model/ponto_folha_registro.class.php";
require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";



$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ponto_pk = $arrRequest['ponto_pk'];
$tipo_ponto_pk = $arrRequest['tipo_ponto_pk'];
$dt_hora_ponto = $arrRequest['dt_hora_ponto'];
$tipo_registr_folha = $arrRequest['tipo_registr_folha'];
$ponto_folha_pk = $arrRequest['ponto_folha_pk'];


$ponto_folha_registrodao = new ponto_folha_registrodao();
$ponto_folha_registrodao->setToken($token); 

$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){

    case 'excluir':{
        
        $resultdo = "";
        
        $ponto_folha_registro = $ponto_folha_registrodao->carregarPorPk($pk);
        if($ponto_folha_registro->getpk()>0){
            
            $log_exclusaodao->salvar("ponto_folha_registros",$ponto_folha_registro->getpk());
            
            $ponto_folha_registrodao->excluir($ponto_folha_registro);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'ponto_folha_registro nao encontrado';
        }
        break;
    }
    case 'salvar':{
        
        $ponto_folha_registro = $ponto_folha_registrodao->carregarPorPk($pk);
        $ponto_folha_registro->setponto_pk($ponto_pk);
        $ponto_folha_registro->settipo_ponto_pk($tipo_ponto_pk);
        $ponto_folha_registro->setdt_hora_ponto($dt_hora_ponto);
        $ponto_folha_registro->settipo_registr_folha($tipo_registr_folha);
        $ponto_folha_registro->setponto_folha_pk($ponto_folha_pk);

        
        $pk = $ponto_folha_registrodao->salvar($ponto_folha_registro);
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        
        $resultado = "";
        $query = $ponto_folha_registrodao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ponto_pk"=>$query[$i]['ponto_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "tipo_registr_folha"=>$query[$i]['tipo_registr_folha'],
                    "ponto_folha_pk"=>$query[$i]['ponto_folha_pk']
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
        $query = $ponto_folha_registrodao->listar_por_ponto_pk($ponto_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ponto_pk"=>$query[$i]['ponto_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "tipo_registr_folha"=>$query[$i]['tipo_registr_folha'],
                    "ponto_folha_pk"=>$query[$i]['ponto_folha_pk']
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
        $query = $ponto_folha_registrodao->listar_por_ponto_pk($ponto_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ponto_pk"=>$query[$i]['ponto_pk'],
                    "t_tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "t_dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "t_tipo_registr_folha"=>$query[$i]['tipo_registr_folha'],
                    "t_ponto_folha_pk"=>$query[$i]['ponto_folha_pk'],

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

$ponto_folha_registrodao = null;

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
