<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/tipo_ocorrencia.class.php';


class tipo_ocorrenciadao{

    private $db;
    private $arrToken;

    public function __construct(){
        
        $this->db = new DataBase();
        $this->db->conectar();
        
    }
    
    public function __destruct() {
        $this->db->desconectar();
    }
    
    
    public function setToken($v_token){
        $this->arrToken = tratarToken($v_token);
    }       
    
    public function salvar($tipo_ocorrencia){

        $fields = array();
        $fields['ds_tipo_ocorrencia'] = $tipo_ocorrencia->getds_tipo_ocorrencia();
        $fields['ic_fechar_ocorrencia_auto'] = $tipo_ocorrencia->getic_fechar_ocorrencia_auto();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($tipo_ocorrencia->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("tipos_ocorrencias", $fields);
            return $pk;
        }
        else{
            return $this->db->execUpdate("tipos_ocorrencias", $fields, " pk = ".$tipo_ocorrencia->getpk());
        }

    }

    public function excluir($tipo_ocorrencia){
        $this->db->execDelete("tipos_ocorrencias"," pk = ".$tipo_ocorrencia->getpk());
    }

    public function carregarPorPk($pk){

        $tipo_ocorrencia = new tipo_ocorrencia();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ds_tipo_ocorrencia ";
        $sql.="       ,ic_fechar_ocorrencia_auto ";


        $sql.="  from tipos_ocorrencias ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $tipo_ocorrencia->setpk($query[$i]["pk"]);
                $tipo_ocorrencia->setdt_cadastro($query[$i]["dt_cadastro"]);
                $tipo_ocorrencia->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $tipo_ocorrencia->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $tipo_ocorrencia->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $tipo_ocorrencia->setds_tipo_ocorrencia($query[$i]['ds_tipo_ocorrencia']);
                $tipo_ocorrencia->setic_fechar_ocorrencia_auto($query[$i]['ic_fechar_ocorrencia_auto']);

            }
        }
        return $tipo_ocorrencia;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_tipo_ocorrencia ";
        $sql.="       ,ic_fechar_ocorrencia_auto ";

        $sql.="  from tipos_ocorrencias ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_ds_tipo_ocorrencia($ds_tipo_ocorrencia,$ic_fechar_ocorrencia_auto){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_tipo_ocorrencia ";
        $sql.="       ,case ic_fechar_ocorrencia_auto when 1 then 'Sim' when 2 then 'Não' end  ic_fechar_ocorrencia_auto";

        $sql.="  from tipos_ocorrencias ";
        $sql.=" where 1=1 ";
        if($ds_tipo_ocorrencia != ""){
            $sql.=" and ds_tipo_ocorrencia like '%".$ds_tipo_ocorrencia."%' ";
        }
        if($ic_fechar_ocorrencia_auto != ""){
            $sql.=" and ic_fechar_ocorrencia_auto =  ".$ic_fechar_ocorrencia_auto;
        }
        $sql.=" order by ds_tipo_ocorrencia asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_tipo_ocorrencia ";
        $sql.="       ,ic_fechar_ocorrencia_auto ";

        $sql.="  from tipos_ocorrencias ";
        $sql.=" where 1=1 ";
        $sql.=" order by ds_tipo_ocorrencia asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

}

?>
