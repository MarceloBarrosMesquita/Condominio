<?
ini_set('max_execution_time', '36000');
require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/ponto_folha.class.php';


class ponto_folhadao{

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
    
    public function salvar($ponto_folha){

        $fields = array();
        //$fields['colaborador_pk'] = $ponto_folha->getcolaborador_pk();
        $fields['dt_periodo_ini'] = DataYMD($ponto_folha->getdt_periodo_ini());
        $fields['dt_periodo_fim'] = DataYMD($ponto_folha->getdt_periodo_fim());
        $fields['obs'] = $ponto_folha->getobs();
       
        $fields['leads_pk'] = $ponto_folha->getleads_pk();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($ponto_folha->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("ponto_folha", $fields);
            return $pk;
        }
        else{
            return $this->db->execUpdate("ponto_folha", $fields, " pk = ".$ponto_folha->getpk());
        }

    }
    public function salvarColaborador($ponto_folha_pk,$colaborador_pk){

        $fields = array();
        $fields['ponto_folha_pk'] = $ponto_folha_pk;
        $fields['colaborador_pk'] = $colaborador_pk;
        $fields["dt_cadastro"] = "sysdate()";
        $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        $fields["dt_cadastro"] = "sysdate()";
        $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

        $pk = $this->db->execInsert("ponto_folha_colaborador", $fields);
        return $pk;

    }

    public function excluir($ponto_folha){
        $this->db->execDelete("ponto_folha"," pk = ".$ponto_folha->getpk());
    }
    public function excluirPontoEPontoFolhaRegistro($ponto_pk){
        $this->db->execDelete("ponto"," pk = ".$ponto_pk);
        $this->db->execDelete("ponto_folha_registros"," ponto_pk = ".$ponto_pk);
    }

    public function carregarPorPk($pk){

        $ponto_folha = new ponto_folha();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,colaborador_pk ";
        $sql.="       ,dt_periodo_ini ";
        $sql.="       ,dt_periodo_fim ";
        $sql.="       ,obs ";
        $sql.="       ,leads_pk";


        $sql.="  from ponto_folha ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $ponto_folha->setpk($query[$i]["pk"]);
                $ponto_folha->setdt_cadastro($query[$i]["dt_cadastro"]);
                $ponto_folha->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $ponto_folha->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $ponto_folha->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $ponto_folha->setcolaborador_pk($query[$i]['colaborador_pk']);
                $ponto_folha->setdt_periodo_ini($query[$i]['dt_periodo_ini']);
                $ponto_folha->setdt_periodo_fim($query[$i]['dt_periodo_fim']);
                $ponto_folha->setobs($query[$i]['obs']);

            }
        }
        return $ponto_folha;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,dt_periodo_ini ";
        $sql.="       ,dt_periodo_fim ";
        $sql.="       ,obs ";
        $sql.="       ,leads_pk";

        $sql.="  from ponto_folha ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkPontoFolhaRegistro($pk){

        $sql ="";
        $sql.="select pk";

        $sql.="  from ponto_folha_registros ";
        $sql.=" where ponto_pk = $pk ";
    
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkPonto($pk){

        $sql ="";
        $sql.="select pk";

        $sql.="  from ponto ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPontoFolhaAntigo(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,dt_periodo_ini ";
        $sql.="       ,dt_periodo_fim ";
        $sql.="       ,obs ";
        $sql.="       ,leads_pk";

        $sql.="  from ponto_folha ";
        $sql.=" where colaborador_pk is not null";
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function query1(){

        $sql.=" select pf.pk,  pf.usuario_cadastro_pk, pf.dt_ult_atualizacao, pf.usuario_ult_atualizacao_pk ";
        $sql.="                ,pf.colaborador_pk ";
        $sql.="                ,date_format(pf.dt_periodo_ini,'%d/%m/%Y')dt_periodo_ini";
        $sql.="                ,date_format(pf.dt_periodo_fim,'%d/%m/%Y')dt_periodo_fim";
        $sql.="                ,date_format(pf.dt_cadastro,'%d/%m/%Y')dt_cadastro";
        $sql.="                ,pf.obs ";
        $sql.="                ,pf.leads_pk";
        $sql.="                ,l.ds_lead";
        $sql.="                ,c.ds_colaborador";
        $sql.="                ,c.pk colaborador_pk";

        $sql.="           from ponto_folha pf";
        $sql.="                inner join leads l on pf.leads_pk = l.pk";
        $sql.="                left join colaboradores c on pf.colaborador_pk = c.pk";
        $sql.="                LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
        $sql.="                left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="         where 1=1 ";
        $sql.="         and pf.colaborador_pk is not null";

        //$sql.="           group by pf.dt_periodo_ini,l.pk";


        $sql.="         order by pf.colaborador_pk asc ";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function query2($leads_pk,$dt_ini,$dt_fim){

       $sql="";
        $sql.="select pf.pk,  pf.usuario_cadastro_pk, pf.dt_ult_atualizacao, pf.usuario_ult_atualizacao_pk ";
        $sql.="       ,pf.colaborador_pk ";
        $sql.="       ,date_format(pf.dt_periodo_ini,'%d/%m/%Y')dt_periodo_ini";
        $sql.="       ,date_format(pf.dt_periodo_fim,'%d/%m/%Y')dt_periodo_fim";
        $sql.="       ,date_format(pf.dt_cadastro,'%d/%m/%Y')dt_cadastro";
        $sql.="       ,pf.obs ";
        $sql.="       ,pf.leads_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.pk colaborador_pk";

        $sql.="  from ponto_folha pf";
        $sql.="       inner join leads l on pf.leads_pk = l.pk";
        $sql.="       inner join colaboradores c on pf.colaborador_pk = c.pk";
        $sql.="       LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
        $sql.="       left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.=" where 1=1 ";
        $sql.=" and l.pk=".$leads_pk;
        $sql.=" and pf.dt_periodo_ini ='".DataYMD($dt_ini)."'";
        $sql.=" and pf.dt_periodo_fim ='".DataYMD($dt_fim)."'";
        $sql.=" group by c.pk";
        $sql.=" order by pf.colaborador_pk asc ";
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_colaborador_pk($colaborador_pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,dt_periodo_ini ";
        $sql.="       ,dt_periodo_fim ";
        $sql.="       ,obs ";
        $sql.="       ,leads_pk";

        $sql.="  from ponto_folha ";
        $sql.=" where 1=1 ";
        if($colaborador_pk != ""){
            $sql.=" and ds_ponto_folha like '%".$colaborador_pk."%' ";
        }
        $sql.=" order by colaborador_pk asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarGridPontoFolhaPostoTrabalho($leads_pk,$dt_periodo_ini,$dt_periodo_fim,$colaborador_pk){

        $sql ="";
        $sql.="SELECT ";
        $sql.="            pf.pk,";
        $sql.="            pf.leads_pk,";
        $sql.="            l.ds_lead,";
        $sql.="            DATE_FORMAT(pf.dt_cadastro, '%d/%m/%Y') dt_cadastro,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_ini, '%d/%m/%Y') dt_periodo_ini,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_fim, '%d/%m/%Y') dt_periodo_fim";
        $sql.="        FROM";
        $sql.="            ponto_folha pf";
        $sql.="            inner join ponto_folha_colaborador pfc on pf.pk = pfc.ponto_folha_pk";
        $sql.="                INNER JOIN";
        $sql.="            leads l ON pf.leads_pk = l.pk";
        $sql.="         where 1=1 ";
                    
        if($dt_periodo_ini!=""){
            $sql.=" and pf.dt_periodo_ini ='".DataYMD($dt_periodo_ini)."'";
        }
        if($dt_periodo_fim!=""){
            $sql.=" and pf.dt_periodo_fim ='".DataYMD($dt_periodo_fim)."'";
        }
        if($colaborador_pk!=""){
            $sql.=" and pfc.colaborador_pk =".($colaborador_pk);
        }
        
        $sql.=" group by pf.pk";
        $sql.=" order by pf.pk desc";
      
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarImpressaoPontoFolhaPostoTrabalho($pk,$leads_pk,$dt_periodo_ini,$dt_periodo_fim,$colaborador_pk){

        $sql ="";
        $sql.="SELECT ";
        $sql.="            pf.pk,";
        $sql.="            l.ds_lead,";
        $sql.="            pfc.colaborador_pk,";
        $sql.="            DATE_FORMAT(pf.dt_cadastro, '%d/%m/%Y') dt_cadastro,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_ini, '%d/%m/%Y') dt_periodo_ini,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_fim, '%d/%m/%Y') dt_periodo_fim";
        $sql.="        FROM";
        $sql.="            ponto_folha pf";
        $sql.="            inner join ponto_folha_colaborador pfc on pf.pk = pfc.ponto_folha_pk";
        $sql.="                INNER JOIN";
        $sql.="            leads l ON pf.leads_pk = l.pk";
        $sql.="         where 1=1 ";
                    
        if($dt_periodo_ini!=""){
            $sql.=" and pf.dt_periodo_ini ='".DataYMD($dt_periodo_ini)."'";
        }
        if($dt_periodo_fim!=""){
            $sql.=" and pf.dt_periodo_fim ='".DataYMD($dt_periodo_fim)."'";
        }
        if($colaborador_pk!=""){
            $sql.=" and pfc.colaborador_pk =".($colaborador_pk);
        }
        if($pk!=""){
            $sql.=" and pf.pk =".($pk);
        }
        
        //$sql.=" group by pf.pk";
        $sql.=" order by pf.pk desc";
      
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarModalPontoFolhaPostoTrabalho($pk,$leads_pk,$dt_periodo_ini,$dt_periodo_fim,$colaborador_pk){

        $sql ="";
        $sql.="SELECT ";
        $sql.="            pf.pk,";
        $sql.="            l.ds_lead,";
        $sql.="            c.ds_colaborador,";
        $sql.="            c.pk colaborador_pk,";
        $sql.="            DATE_FORMAT(pf.dt_cadastro, '%d/%m/%Y') dt_cadastro,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_ini, '%d/%m/%Y') dt_periodo_ini,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_fim, '%d/%m/%Y') dt_periodo_fim";
        $sql.="        FROM";
        $sql.="            ponto_folha pf";
        $sql.="            inner join ponto_folha_colaborador pfc on pf.pk = pfc.ponto_folha_pk";
        $sql.="            inner join colaboradores c on pfc.colaborador_pk = c.pk";
        $sql.="                INNER JOIN";
        $sql.="            leads l ON pf.leads_pk = l.pk";
        $sql.="         where 1=1 ";
                    
        if($dt_periodo_ini!=""){
            $sql.=" and pf.dt_periodo_ini ='".DataYMD($dt_periodo_ini)."'";
        }
        if($dt_periodo_fim!=""){
            $sql.=" and pf.dt_periodo_fim ='".DataYMD($dt_periodo_fim)."'";
        }
        if($pk!=""){
            $sql.=" and pf.pk =".($pk);
        }
        if($colaborador_pk!=""){
            $sql.=" and c.colaborador_pk =".($colaborador_pk);
        }
        
        
        $sql.=" order by pf.pk desc";
      
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPontoColaborador($pk,$leads_pk,$dt_periodo_ini,$dt_periodo_fim,$colaborador_pk){

        $sql ="";
        $sql.="SELECT ";
        $sql.="            pt.pk ponto_pk,";
        $sql.="            pf.pk,";
        $sql.="            l.ds_lead,";
        $sql.="            c.ds_colaborador,";
        $sql.="            pfr.tipo_ponto_pk,";
        $sql.="            DATE_FORMAT(pf.dt_cadastro, '%d/%m/%Y') dt_cadastro,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_ini, '%d/%m/%Y') dt_periodo_ini,";
        $sql.="            DATE_FORMAT(pf.dt_periodo_fim, '%d/%m/%Y') dt_periodo_fim,";
        $sql.="            date_format(pfr.dt_hora_ponto,'%d/%m/%Y') dt_hora_ponto,";
        $sql.="            date_format(pfr.dt_hora_ponto,'%H:%i:%s') hr_entrada";
        
        $sql.="        FROM";
        $sql.="            ponto_folha pf";
        $sql.="            inner join ponto_folha_colaborador pfc on pf.pk = pfc.ponto_folha_pk";
        $sql.="            left join ponto_folha_registros pfr on pf.pk = pfr.ponto_folha_pk";
        $sql.="            inner join colaboradores c on pfc.colaborador_pk = c.pk";
        $sql.="            inner join ponto pt on pfr.ponto_pk = pt.pk";
        $sql.="                INNER JOIN";
        $sql.="            leads l ON pf.leads_pk = l.pk";
        $sql.="         where 1=1 ";
                    
        if($dt_periodo_ini!=""){
            $sql.=" and pfr.dt_hora_ponto >='".DataYMD($dt_periodo_ini)." 00:00:00'";
        }
        if($dt_periodo_fim!=""){
            $sql.=" and pfr.dt_hora_ponto<='".DataYMD($dt_periodo_fim)." 23:59:59'";
        }
        if($pk!=""){
            $sql.=" and pf.pk =".($pk);
        }
        if($leads_pk!=""){
            $sql.=" and l.pk =".($leads_pk);
        }
        if($colaborador_pk!=""){
            $sql.=" and pt.colaborador_pk =".($colaborador_pk);
        }
        
        
        $sql.=" order by pf.pk desc";
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPorColaborador($colaborador_pk){

        $sql ="";
        $sql.="select p.pk, p.dt_cadastro, p.usuario_cadastro_pk, p.dt_ult_atualizacao, p.usuario_ult_atualizacao_pk ";
        $sql.="       ,p.colaborador_pk ";
        $sql.="       ,date_format(p.dt_periodo_ini,'%d/%m/%Y')dt_periodo_ini ";
        $sql.="       ,date_format(p.dt_periodo_fim,'%d/%m/%Y')dt_periodo_fim ";
        $sql.="       ,p.obs ";
        $sql.="       ,p.leads_pk";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.pk colaborador_pk";

        $sql.="  from ponto_folha p";
        $sql.="       inner join colaboradores c on p.colaborador_pk = c.pk";
        $sql.=" where 1=1 ";
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk =".$colaborador_pk;
        }
        $sql.=" order by c.ds_colaborador asc ";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,dt_periodo_ini ";
        $sql.="       ,dt_periodo_fim ";
        $sql.="       ,obs ";
        $sql.="       ,leads_pk";

        $sql.="  from ponto_folha ";
        $sql.=" where 1=1 ";
        $sql.=" order by colaborador_pk asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

}

?>
