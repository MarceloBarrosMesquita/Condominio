<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/processo_default.dao.php";
require_once "../model/processo_default.class.php";

$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_processo_default = $arrRequest['ds_processo_default'];
$ic_status = $arrRequest['ic_status'];


$processo_defaultdao = new processo_defaultdao();
$processo_defaultdao->setToken($token); 

switch($job){

    case 'excluir':{
        if(!permissao("processo_default", "del", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultdo = "";
        
        $processo_default = $processo_defaultdao->carregarPorPk($pk);
        if($processo_default->getpk()>0){
            $processo_defaultdao->excluirProcessosDefaultEtapasPk($processo_default->getpk());
            $processo_defaultdao->excluir($processo_default);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'processo_default nao encontrado';
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
        if(!permissao("processo_default", $ic_acao, $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        
        $arrProcessoEtapa = $_REQUEST['arrProcessoEtapa'];
        
        if($arrProcessoEtapa != "")
            $arrProcessosEtapasDefaultPk = json_decode ($arrProcessoEtapa, true);
        
        
        
        
        $processo_default = $processo_defaultdao->carregarPorPk($pk);
        $processo_default->setds_processo_default($ds_processo_default);
        $processo_default->setic_status($ic_status);
        $pk = $processo_defaultdao->salvar($processo_default);
        if($pk!=""){
            $processo_defaultdao->excluirProcessosDefaultEtapasPk($pk);
        
            if(count($arrProcessosEtapasDefaultPk) > 0){
                for($i = 0; $i < count($arrProcessosEtapasDefaultPk); $i++){
                    $processo_defaultdao->adicionarProcessosDefaultEtapas($pk, $arrProcessosEtapasDefaultPk[$i]['ds_processo_default_etapa'], $arrProcessosEtapasDefaultPk[$i]["n_ordem_etapa"]);
                }
            }
        }
        else{
            $processo_defaultdao->excluirProcessosDefaultEtapasPk($processo_default->getpk());
        
            if(count($arrProcessosEtapasDefaultPk) > 0){
                for($i = 0; $i < count($arrProcessosEtapasDefaultPk); $i++){
                    $processo_defaultdao->adicionarProcessosDefaultEtapas($processo_default->getpk(), $arrProcessosEtapasDefaultPk[$i]['ds_processo_default_etapa'], $arrProcessosEtapasDefaultPk[$i]["n_ordem_etapa"]);
                }
            }
        }
        
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        if(!permissao("processo_default", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $processo_defaultdao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_processo_default"=>$query[$i]['ds_processo_default'],
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
        if(!permissao("processo_default", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $processo_defaultdao->listar_por_ds_processo_default($ds_processo_default);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_processo_default"=>$query[$i]['ds_processo_default'],
                    "ic_status"=>$query[$i]['ic_status']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarDataTable':{
        if(!permissao("processo_default", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        
        $resultado = "";
        $query = $processo_defaultdao->listar_por_ds_processo_default($ds_processo_default);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_processo_default"=>$query[$i]['ds_processo_default'],
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

$processo_defaultdao = null;

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
