<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/contrato.class.php';


class contratodao{

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
    
    public function salvar($contrato){

        $fields = array();
        $fields['dt_inicio_contrato'] = $contrato->getdt_inicio_contrato();
        $fields['dt_fim_contrato'] = $contrato->getdt_fim_contrato();
        $fields['processos_etapas_pk'] = $contrato->getprocessos_etapas_pk();
        $fields['ic_tipo_contrato'] = $contrato->getic_tipo_contrato();
        $fields['contratos_pk'] = $contrato->getcontratos_pk();
        $fields['empresas_pk'] = $contrato->getempresas_pk();
        $fields['ic_lancar_financeiro'] = $contrato->getic_lancar_financeiro();
        $fields['qtde_parcelas_pk'] = $contrato->getqtde_parcelas_pk();
        $fields['vl_total_mao_obra'] = $contrato->getvl_total_mao_obra();
        
        if($contrato->getdt_cancelamento()== 1){
            $fields['dt_cancelamento'] = "sysdate()";
        }
        if($contrato->getdt_cancelamento()== 2){
            $fields['dt_cancelamento'] = " ";
        }
        $fields['ds_obs_motivo_cancelamento'] = $contrato->getds_obs_motivo_cancelamento();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($contrato->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("contratos", $fields);
            return $pk;
        }
        else{
             $this->db->execUpdate("contratos", $fields, " pk = ".$contrato->getpk());
             return $contrato->getpk();
            
        }

    }
    public function UPDMaterial($contratos_pk){

        $fields = array();
        $fields['contratos_pk'] = $contratos_pk;
        
        $this->db->execUpdate("movimentacao_estoque", $fields, " contratos_pk = 0");
        
            
        

    }
    public function UPDConjuntoMaterial($contratos_pk){

        $fields = array();
        $fields['contratos_pk'] = $contratos_pk;
        
        $this->db->execUpdate("conjunto_material", $fields, " contratos_pk = 0");
        
            
        

    }

    public function excluir($contrato){
        $this->db->execDelete("contratos"," pk = ".$contrato->getpk());
    }
    public function excluirContratoDadosFaturamento($contratos_pk){
        $this->db->execDelete("contrato_dados_faturamento"," contratos_pk = ".$contratos_pk);
    }
    public function excluirMaterial($contratos_pk){
        $this->db->execDelete("movimentacao_estoque"," contratos_pk = ".$contratos_pk);
    }
    public function excluirConjuntoMaterial($contratos_pk){
        $this->db->execDelete("conjunto_material"," contratos_pk = ".$contratos_pk);
    }
    public function excluirContratosPai($contratos_pk){
        $this->db->execDelete("contratos"," contratos_pk = ".$contratos_pk);
    }
    public function excluirLancamento($contratos_pk){
        $this->db->execDelete("lancamentos"," contratos_pk = ".$contratos_pk);
    }

    public function carregarPorPk($pk){

        $contrato = new contrato();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,dt_inicio_contrato ";
        $sql.="       ,dt_fim_contrato ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_tipo_contrato";
        $sql.="       ,contratos_pk";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_obs_motivo_cancelamento";
        $sql.="       ,empresas_pk";
        $sql.="       ,ic_lancar_financeiro";


        $sql.="  from contratos ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $contrato->setpk($query[$i]["pk"]);
                $contrato->setdt_cadastro($query[$i]["dt_cadastro"]);
                $contrato->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $contrato->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $contrato->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $contrato->setdt_inicio_contrato($query[$i]['dt_inicio_contrato']);
                $contrato->setdt_fim_contrato($query[$i]['dt_fim_contrato']);
                $contrato->setprocessos_etapas_pk($query[$i]['processos_etapas_pk']);
                $contrato->setic_tipo_contrato($query[$i]['ic_tipo_contrato']);
                $contrato->setcontratos_pk($query[$i]['contratos_pk']);
                $contrato->setic_lancar_financeiro($query[$i]['ic_lancar_financeiro']);

            }
        }
        return $contrato;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,date_format(dt_inicio_contrato, '%d/%m/%Y')dt_inicio_contrato";
        $sql.="       ,date_format(dt_fim_contrato, '%d/%m/%Y')dt_fim_contrato";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_tipo_contrato ";
        $sql.="       ,contratos_pk ";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_obs_motivo_cancelamento";
        $sql.="       ,empresas_pk";

        $sql.="  from contratos ";
   
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkContratosItens($pk){

        $sql ="";
        $sql.="select pk";

        $sql.="  from contratos_itens ";
   
        $sql.=" where contratos_pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listarPorLeadsPk($leads_pk,$processos_pk,$dt_inicio_contrato,$colaborador_pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.dt_inicio_contrato ";
        $sql.="       ,c.dt_fim_contrato ";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk ";
        $sql.="       ,concat('Contrato ',c.pk)ds_combo_contrato";
        $sql.="       ,c.dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,p.pk processos_pk";
        $sql.="       ,c.empresas_pk";
        $sql.="  from contratos c ";
        $sql.="       inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on ci.produtos_servicos_pk = cps.produtos_servicos_pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.=" where 1=1 ";
        if($colaborador_pk!=""){
            $sql.=" and cps.colaboradores_pk=".$colaborador_pk;
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($processos_pk!=""){
            $sql.=" and p.pk = ".$processos_pk;
        }
        if($dt_inicio_contrato!=""){
            $sql.=" and c.dt_fim_contrato > '".DataYMD($dt_inicio_contrato)."'";
            $sql.=" and c.dt_inicio_contrato <= '".DataYMD($dt_inicio_contrato)."'";
            $sql.=" and dt_cancelamento is null";
        }
        $sql.=" group by c.pk";
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPorLeadsPkPeriodo($leads_pk,$processos_pk,$dt_inicio_contrato,$dt_fim_contrato){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.dt_inicio_contrato ";
        $sql.="       ,c.dt_fim_contrato ";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk ";
        $sql.="       ,concat('Contrato ',c.pk)ds_combo_contrato";
        $sql.="       ,c.dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="       ,p.pk processos_pk";        
        $sql.="  from contratos c ";
        $sql.="       inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($processos_pk!=""){
            $sql.=" and p.pk = ".$processos_pk;
        }
        if($dt_inicio_contrato!=""){
            $sql.=" and '".DataYMD($dt_inicio_contrato)."' and '".DataYMD($dt_fim_contrato)."' between c.dt_inicio_contrato and c.dt_fim_contrato";
            $sql.=" and dt_cancelamento is null";
        }
        $sql.=" group by c.pk";
                     
        $query = $this->db->execQuery($sql);
        return $query;
    }
    public function listarGridLancamentoContrato($ic_tipo_contrato,$lancamento_pk,$contratos_pk,$leads_pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.dt_inicio_contrato ";
        $sql.="       ,c.dt_fim_contrato ";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk ";
        $sql.="       ,concat('Contrato - ',c.pk)ds_contrato";
        $sql.="       ,c.dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,p.pk processos_pk";    
        $sql.="       ,sum(ci.vl_total)vl_total";
        $sql.="  from contratos c ";
        $sql.="       left join contratos_itens ci on ci.contratos_pk= c.pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.="       left join lancamentos lc on c.pk = lc.contratos_pk";
        $sql.=" where 1=1 ";
        if($ic_tipo_contrato!=""){
            $sql.=" and c.ic_tipo_contrato=".$ic_tipo_contrato;
        }
        if($lancamento_pk==""){
            $sql.=" and lc.pk is null";
        }
        if($contratos_pk==""){
            $sql.=" and lc.pk is null";
        }
        if($leads_pk!=""){
            $sql.=" and l.pk =".$leads_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and c.pk = ".$contratos_pk;
        }
        
       
        $sql.=" group by c.pk";
        $sql.=" order by c.pk";
     
       
                     
        $query = $this->db->execQuery($sql);
        return $query;
    }
    
    public function listarDadosContratoLead($leads_pk,$processos_pk,$dt_inicio_contrato,$dt_fim_contrato){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.dt_inicio_contrato ";
        $sql.="       ,c.dt_fim_contrato ";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk ";
        $sql.="       ,concat('Contrato ',c.pk)ds_combo_contrato";
        $sql.="       ,c.dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="       ,p.pk processos_pk";    
        $sql.="       ,ps.ds_produto_servico";   
        $sql.="       ,ci.n_qtde";
        $sql.="       ,ci.n_qtde_dias_semana";
        $sql.="  from contratos c ";
        $sql.="       inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="       inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }        
        $sql.=" group by c.pk";     
 
        $query = $this->db->execQuery($sql);
        return $query;
    }

    public function listar_por_dt_inicio_contrato($dt_inicio_contrato){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,dt_inicio_contrato ";
        $sql.="       ,dt_fim_contrato ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_tipo_contrato ";
        $sql.="       ,contratos_pk ";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_obs_motivo_cancelamento";
        $sql.="       ,empresas_pk";

        $sql.="  from contratos ";
        $sql.=" where 1=1 ";
        if($dt_inicio_contrato != ""){
            $sql.=" and ds_contrato like '%".$dt_inicio_contrato."%' ";
        }
        $sql.=" order by dt_inicio_contrato asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function relatorioContratoValor($leads_pk,$dt_contrato_ini,$dt_contrato_fim){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(c.dt_inicio_contrato, '%d/%m/%Y')dt_inicio_contrato ";
        $sql.="       ,date_format(c.dt_fim_contrato, '%d/%m/%Y')dt_fim_contrato ";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk ";
        $sql.="       ,c.dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,sum(ci.vl_total)vl_total";

        $sql.="  from contratos c";
        $sql.="       inner join contratos_itens ci on c.pk = ci.contratos_pk";
        $sql.="       inner join processos_etapas pe on pe.pk = c.processos_etapas_pk";
        $sql.="       inner join processos p on p.pk = pe.processos_pk";
        $sql.="       inner join leads l on l.pk = p.leads_pk";
        $sql.=" where 1=1 ";
        if($leads_pk != ""){
            $sql.=" and l.pk = ".$leads_pk;
        }
        if($dt_contrato_ini!=""){
            $sql.=" and c.dt_inicio_contrato >= '".DataYMD($dt_contrato_ini)."'";
        }
        if($dt_contrato_fim!=""){
            $sql.=" and c.dt_fim_contrato <= '".DataYMD($dt_contrato_fim)."'";
        }
        
        $sql.=" order by l.ds_lead asc ";
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listar_qtde_dias_contratados_produtos_servicos($contratos_pk,$contratos_itens_pk,$produtos_servicos_pk,$processos_pk){
        $sql ="";
        $sql.=" select ci.n_qtde_dias_semana from contratos c";
        $sql.="       inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="  where c.pk = ".$contratos_pk;
        $sql.="        and ci.pk =".$contratos_itens_pk;
        $sql.="        and ci.produtos_servicos_pk =".$produtos_servicos_pk;
        $sql.="        and p.pk =".$processos_pk;
        $sql.="        and c.dt_cancelamento is null";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listar_contrato_pai($leads_pk,$contratos_pk,$contrato_pai_pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.dt_inicio_contrato ";
        $sql.="       ,c.dt_fim_contrato ";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk ";
        $sql.="       ,concat('Contrato ',c.pk)ds_combo_contrato";
        $sql.="       ,c.dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="  from contratos c";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($contrato_pai_pk!=""){
            $sql.="   and and c.contratos_pk IS NULL OR c.contratos_pk=".$contrato_pai_pk;
        }
        else{
            if($contratos_pk!=""){
                $sql.="   and c.pk not in(".$contratos_pk.")";
            }
            $sql.="   and c.contratos_pk IS NULL";
        }
        
        $sql.="   group by c.pk";
        $sql.=" order by c.pk asc ";
    
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listar_contrato_lead_processo($leads_pk,$processos_pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(c.dt_inicio_contrato,'%d/%m/%Y') dt_inicio_contrato";
        $sql.="       ,date_format(c.dt_fim_contrato,'%d/%m/%Y') dt_fim_contrato";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,case c.ic_tipo_contrato when 1 then 'Contrato' when 2 then 'Aditivo' when 3 then 'Serviço Extra' end ds_tipo_contrato";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk";
        $sql.="       ,date_format(c.dt_cancelamento,'%d/%m/%Y')dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="       ,co.ds_razao_social ds_empresa";
        $sql.="       ,sum(ci.vl_total)vl_total ";

        $sql.="  from contratos c ";
        $sql.="       left join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       left join contas co on c.empresas_pk = co.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($processos_pk!=""){
            $sql.=" and p.pk=".$processos_pk;
        }
        $sql.="  group by c.pk ";
        $sql.=" order by c.pk asc ";

       
    
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarContratoOperacional($leads_pk,$ic_tipo_contrato,$dt_inicio_contrato,$dt_fim_contrato,$dt_recisao_contrato_ini,$dt_recisao_contrato_fim,$dt_cancelamento_ini,$dt_cancelamento_fim){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(c.dt_inicio_contrato,'%d/%m/%Y') dt_inicio_contrato";
        $sql.="       ,date_format(c.dt_fim_contrato,'%d/%m/%Y') dt_fim_contrato";
        $sql.="       ,c.processos_etapas_pk ";
        $sql.="       ,case c.ic_tipo_contrato when 1 then 'Contrato' when 2 then 'Aditivo' when 3 then 'Serviço Extra' end ds_tipo_contrato";
        $sql.="       ,c.ic_tipo_contrato ";
        $sql.="       ,c.contratos_pk";
        $sql.="       ,date_format(c.dt_cancelamento,'%d/%m/%Y')dt_cancelamento";
        $sql.="       ,c.ds_obs_motivo_cancelamento";
        $sql.="       ,c.empresas_pk";
        $sql.="       ,c.ic_lancar_financeiro";
        $sql.="       ,c.vl_total_mao_obra";
        $sql.="       ,c.qtde_parcelas_pk";
        $sql.="       ,cdf.metodos_pagamento_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,p.pk processos_pk";
        $sql.="       ,l.pk leads_pk";
        $sql.="       ,co.ds_razao_social ds_empresa";
        $sql.="       ,sum(ci.vl_total)vl_total ";

        $sql.="  from contratos c ";
        $sql.="       left join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="       left join contrato_dados_faturamento cdf on cdf.contratos_pk = c.pk";
        $sql.="       inner join processos_etapas pe on c.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.="       left join contas co on c.empresas_pk = co.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($ic_tipo_contrato!=""){
            $sql.=" and c.ic_tipo_contrato=".$ic_tipo_contrato;
        }
        if($dt_inicio_contrato!=""){
            $sql.=" and c.dt_inicio_contrato between'".DataYMD($dt_inicio_contrato)."' and '".DataYMD($dt_fim_contrato)."'";
        }
        if($dt_recisao_contrato_ini!=""){
            $sql.=" and c.dt_recisao_contrato between'".DataYMD($dt_recisao_contrato_ini)."' and '".DataYMD($dt_recisao_contrato_fim)."'";
        }
        if($dt_cancelamento_ini!=""){
            $sql.=" and c.dt_cancelamento between'".DataYMD($dt_cancelamento_ini)."' and '".DataYMD($dt_cancelamento_fim)."'";
        }
        $sql.=" group by c.pk ";
        $sql.=" order by c.pk asc ";
       
       
    
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function pegarValorTotal($contratos_pk){

        $sql ="";
        $sql.="select sum(ci.vl_total)vl_total ";

        $sql.="  from contratos_itens ci ";
        $sql.=" where 1=1 ";
        if($contratos_pk!=""){
            $sql.=" and ci.contratos_pk =".$contratos_pk;
        }

       
    
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,dt_inicio_contrato ";
        $sql.="       ,dt_fim_contrato ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_tipo_contrato ";
        $sql.="       ,contratos_pk ";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_obs_motivo_cancelamento";
        $sql.="       ,empresas_pk";

        $sql.="  from contratos ";
        $sql.=" where 1=1 ";
        $sql.=" order by dt_inicio_contrato asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    function excluirContratoItens($contratos_pk){
        $this->db->execDelete("contratos_itens", " contratos_pk = " . $contratos_pk);
    }
    
    public function adicionarContratoItens($contratos_itens_pk,$contratos_pk,$n_qtde_dias_semana, $n_qtde, $vl_unit, $vl_total, $produtos_servicos_pk,$periodo,$vl_mao_obra){
        
        $fields = array();
        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];
        $fields["dt_cadastro"] = "sysdate()";
        $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

        $fields['contratos_pk'] = $contratos_pk;
        $fields['n_qtde'] = $n_qtde;
        $fields['n_qtde_dias_semana'] = $n_qtde_dias_semana;
        $fields['vl_unit'] = $vl_unit;
        $fields['vl_total'] = $vl_total;
        $fields['produtos_servicos_pk'] = $produtos_servicos_pk;
        $fields['periodo'] = $periodo;
        $fields['vl_mao_obra'] = $vl_mao_obra;
        if($contratos_itens_pk  == ""){
           
            $this->db->execInsert("contratos_itens", $fields);
        }
        else{
           
            $this->db->execUpdate("contratos_itens", $fields, " pk = ".$contratos_itens_pk);
             
             
            
        }
        
    }

}

?>
