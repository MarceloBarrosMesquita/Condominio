<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/processo_default.class.php';


class processo_defaultdao{

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
    
    public function salvar($processo_default){

        $fields = array();
        $fields['ds_processo_default'] = $processo_default->getds_processo_default();
        $fields['ic_status'] = $processo_default->getic_status();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($processo_default->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("processos_default", $fields);
            return $pk;
        }
        else{
           
            return $this->db->execUpdate("processos_default", $fields, " pk = ".$processo_default->getpk());
        }

    }

    public function excluir($processo_default){
        $this->db->execDelete("processos_default"," pk = ".$processo_default->getpk());
    }

    public function carregarPorPk($pk){

        $processo_default = new processo_default();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ds_processo_default ";
        $sql.="       ,ic_status ";


        $sql.="  from processos_default ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $processo_default->setpk($query[$i]["pk"]);
                $processo_default->setdt_cadastro($query[$i]["dt_cadastro"]);
                $processo_default->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $processo_default->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $processo_default->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $processo_default->setds_processo_default($query[$i]['ds_processo_default']);
                $processo_default->setic_status($query[$i]['ic_status']);

            }
        }
        return $processo_default;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_processo_default ";
        $sql.="       ,ic_status ";

        $sql.="  from processos_default ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_ds_processo_default($ds_processo_default){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_processo_default ";
        $sql.="       ,case ic_status when 1 then 'Ativo' when 2 then 'Inativo' end ic_status ";

        $sql.="  from processos_default ";
        $sql.=" where 1=1 ";
        if($ds_processo_default != ""){
            $sql.=" and ds_processo_default like '%".$ds_processo_default."%' ";
        }
        $sql.=" order by ds_processo_default asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_processo_default ";
        $sql.="       ,case ic_status when 1 then 'Ativo' when 2 then 'Inativo' end ic_status ";

        $sql.="  from processos_default ";
        $sql.=" where 1=1 ";
        $sql.=" order by ds_processo_default asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function adicionarProcessosDefaultEtapas($processo_default_pk, $ds_processo_default_etapa, $n_ordem_etapa){
        
        $fields = array();
        $fields["dt_cadastro"] = "sysdate()";
        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_cadastro_pk"] = $this->arrToken['usuarios_pk'];
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];
        $fields['ds_processo_default_etapa'] = $ds_processo_default_etapa;
        $fields['n_ordem_etapa'] = $n_ordem_etapa;
        $fields['processos_default_pk'] = $processo_default_pk;
        $fields['equipes_pk'] = " ";
        
        $this->db->execInsert("processos_default_etapas", $fields);
        
    }
    
    function excluirProcessosDefaultEtapasPk($processo_default_pk){
        $this->db->execDelete("processos_default_etapas", " processos_default_pk = " . $processo_default_pk);
    }

}

?>
