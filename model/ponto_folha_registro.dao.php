<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/ponto_folha_registro.class.php';


class ponto_folha_registrodao{

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
    
    public function salvar($ponto_folha_registro){

        $fields = array();
        $fields['ponto_pk'] = $ponto_folha_registro->getponto_pk();
        $fields['tipo_ponto_pk'] = $ponto_folha_registro->gettipo_ponto_pk();
        if($ponto_folha_registro->getdt_hora_ponto()!=""){
            $fields['dt_hora_ponto'] = ($ponto_folha_registro->getdt_hora_ponto());
        }
        
        $fields['tipo_registr_folha'] = $ponto_folha_registro->gettipo_registr_folha();
        $fields['ponto_folha_pk'] = $ponto_folha_registro->getponto_folha_pk();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($ponto_folha_registro->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("ponto_folha_registros", $fields);
            return $pk;
        }
        else{
            return $this->db->execUpdate("ponto_folha_registros", $fields, " pk = ".$ponto_folha_registro->getpk());
        }

    }

    public function excluir($ponto_folha_registro){
        $this->db->execDelete("ponto_folha_registros"," pk = ".$ponto_folha_registro->getpk());
    }

    public function carregarPorPk($pk){

        $ponto_folha_registro = new ponto_folha_registro();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ponto_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,tipo_registr_folha ";
        $sql.="       ,ponto_folha_pk ";


        $sql.="  from ponto_folha_registros ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $ponto_folha_registro->setpk($query[$i]["pk"]);
                $ponto_folha_registro->setdt_cadastro($query[$i]["dt_cadastro"]);
                $ponto_folha_registro->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $ponto_folha_registro->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $ponto_folha_registro->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $ponto_folha_registro->setponto_pk($query[$i]['ponto_pk']);
                $ponto_folha_registro->settipo_ponto_pk($query[$i]['tipo_ponto_pk']);
                $ponto_folha_registro->setdt_hora_ponto($query[$i]['dt_hora_ponto']);
                $ponto_folha_registro->settipo_registr_folha($query[$i]['tipo_registr_folha']);
                $ponto_folha_registro->setponto_folha_pk($query[$i]['ponto_folha_pk']);

            }
        }
        return $ponto_folha_registro;
    }
    public function carregarPorPontoPk($pk){

        $ponto_folha_registro = new ponto_folha_registro();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ponto_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,tipo_registr_folha ";
        $sql.="       ,ponto_folha_pk ";


        $sql.="  from ponto_folha_registros ";
        $sql.=" where ponto_pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $ponto_folha_registro->setpk($query[$i]["pk"]);
                $ponto_folha_registro->setdt_cadastro($query[$i]["dt_cadastro"]);
                $ponto_folha_registro->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $ponto_folha_registro->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $ponto_folha_registro->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $ponto_folha_registro->setponto_pk($query[$i]['ponto_pk']);
                $ponto_folha_registro->settipo_ponto_pk($query[$i]['tipo_ponto_pk']);
                $ponto_folha_registro->setdt_hora_ponto($query[$i]['dt_hora_ponto']);
                $ponto_folha_registro->settipo_registr_folha($query[$i]['tipo_registr_folha']);
                $ponto_folha_registro->setponto_folha_pk($query[$i]['ponto_folha_pk']);

            }
        }
        return $ponto_folha_registro;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ponto_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,tipo_registr_folha ";
        $sql.="       ,ponto_folha_pk ";

        $sql.="  from ponto_folha_registros ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_ponto_pk($ponto_pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ponto_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,tipo_registr_folha ";
        $sql.="       ,ponto_folha_pk ";

        $sql.="  from ponto_folha_registros ";
        $sql.=" where 1=1 ";
        if($ponto_pk != ""){
            $sql.=" and ds_ponto_folha_registro like '%".$ponto_pk."%' ";
        }
        $sql.=" order by ponto_pk asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ponto_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,tipo_registr_folha ";
        $sql.="       ,ponto_folha_pk ";

        $sql.="  from ponto_folha_registros ";
        $sql.=" where 1=1 ";
        $sql.=" order by ponto_pk asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

}

?>
