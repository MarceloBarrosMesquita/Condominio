<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/lancamento.class.php';


class lancamentodao{

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
    
    public function salvar($lancamento){

        $fields = array();
        if($lancamento->getdt_vencimento()!=""){
            $fields['dt_vencimento'] = DataYMD($lancamento->getdt_vencimento());
        }
        
        $fields['ds_lancamento'] = $lancamento->getds_lancamento();
        $fields['vl_lancamento'] = $lancamento->getvl_lancamento();
        $fields['operacao_pk'] = $lancamento->getoperacao_pk();
        $fields['tipo_grupo_pk'] = $lancamento->gettipo_grupo_pk();
        $fields['grupo_leancamento_pk'] = $lancamento->getgrupo_leancamento_pk();
        $fields['ic_status_pagamento'] = $lancamento->getic_status_pagamento();
        $fields['contratos_pk'] = $lancamento->getcontratos_pk();
        if($lancamento->getdt_pagamento()!=""){
            $fields["dt_pagamento"] = DataYMD($lancamento->getdt_pagamento());
        }
        if($lancamento->getdt_faturamento()!=""){
            $fields["dt_faturamento"] = DataYMD($lancamento->getdt_faturamento());
        }
        $fields['obs_lancamento'] = $lancamento->getobs_lancamento();
        $fields['empresas_pk'] = $lancamento->getempresas_pk();
        if($lancamento->getdt_competencia()!=""){
            $fields['dt_competencia'] = DataYMD($lancamento->getdt_competencia());
        }
        
        $fields['n_documento'] = $lancamento->getn_documento();
        $fields['contas_bancarias_pk'] = $lancamento->getcontas_bancarias_pk();
        $fields['tipos_operacao_pk'] = $lancamento->gettipos_operacao_pk();
        $fields['metodos_pagamento_pk'] = $lancamento->getmetodos_pagamento_pk();
        $fields['tipo_grupo_centro_custo_pk'] = $lancamento->gettipo_grupo_centro_custo_pk();
        $fields['grupo_lancamento_centro_custo_pk'] = $lancamento->getgrupo_lancamento_centro_custo_pk();
        $fields['ds_ocorrencia'] = $lancamento->getds_ocorrencia();
        $fields['compras_pk'] = $lancamento->getcompras_pk();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($lancamento->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("lancamentos", $fields);
            return $pk;
        }
        else{
            return $this->db->execUpdate("lancamentos", $fields, " pk = ".$lancamento->getpk());
        }

    }

    public function excluirDocsLancamento($lancamentos_pk){
        $this->db->execDelete("documentos"," lancamentos_pk = ".$lancamentos_pk);
    }
    public function excluir($lancamento){
        $this->db->execDelete("lancamentos"," pk = ".$lancamento->getpk());
    }

    public function carregarPorPk($pk){

        $lancamento = new lancamento();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,dt_vencimento ";
        $sql.="       ,ds_lancamento ";
        $sql.="       ,vl_lancamento ";
        $sql.="       ,operacao_pk ";
        $sql.="       ,tipo_grupo_pk ";
        $sql.="       ,grupo_leancamento_pk ";
        $sql.="       ,ic_status_pagamento ";
        $sql.="       ,obs_lancamento ";
        $sql.="       ,dt_competencia ";
        $sql.="       ,n_documento ";
        $sql.="       ,contas_bancarias_pk ";
        $sql.="       ,tipos_operacao_pk ";
        $sql.="       ,metodos_pagamento_pk ";
        $sql.="       ,empresas_pk";
        $sql.="       ,tipo_grupo_centro_custo_pk";
        $sql.="       ,grupo_lancamento_centro_custo_pk";
        $sql.="       ,ds_ocorrencia";
        $sql.="       ,contratos_pk";
        $sql.="       ,dt_faturamento";


        $sql.="  from lancamentos ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $lancamento->setpk($query[$i]["pk"]);
                $lancamento->setdt_cadastro($query[$i]["dt_cadastro"]);
                $lancamento->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $lancamento->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $lancamento->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $lancamento->setdt_vencimento($query[$i]['dt_vencimento']);
                $lancamento->setds_lancamento($query[$i]['ds_lancamento']);
                $lancamento->setvl_lancamento($query[$i]['vl_lancamento']);
                $lancamento->setoperacao_pk($query[$i]['operacao_pk']);
                $lancamento->settipo_grupo_pk($query[$i]['tipo_grupo_pk']);
                $lancamento->setgrupo_leancamento_pk($query[$i]['grupo_leancamento_pk']);
                $lancamento->setic_status_pagamento($query[$i]['ic_status_pagamento']);
                $lancamento->setobs_lancamento($query[$i]['obs_lancamento']);
                $lancamento->setdt_competencia($query[$i]['dt_competencia']);
                $lancamento->setn_documento($query[$i]['n_documento']);
                $lancamento->setcontas_bancarias_pk($query[$i]['contas_bancarias_pk']);
                $lancamento->settipos_operacao_pk($query[$i]['tipos_operacao_pk']);
                $lancamento->setmetodos_pagamento_pk($query[$i]['metodos_pagamento_pk']);
                $lancamento->setempresas_pk($query[$i]['empresas_pk']);
                $lancamento->settipo_grupo_centro_custo_pk($query[$i]['tipo_grupo_centro_custo_pk']);
                $lancamento->setgrupo_lancamento_centro_custo_pk($query[$i]['grupo_lancamento_centro_custo_pk']);
                $lancamento->setds_ocorrencia($query[$i]['ds_ocorrencia']);
                $lancamento->setcontratos_pk($query[$i]['contratos_pk']);
                $lancamento->setdt_faturamento($query[$i]['dt_faturamento']);

            }
        }
        return $lancamento;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql ="";
        $sql.="select l.pk, l.dt_cadastro, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,date_format(l.dt_pagamento ,'%d/%m/%Y')dt_pagamento";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.contratos_pk";
        $sql.="       ,case l.tipo_grupo_centro_custo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Centro de Custo' end ds_tipo_grupo_centro_custo";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,u.ds_usuario";
        $sql.="       ,concat(cf.ds_categoria,' - ',top.ds_tipo_operacao )ds_tipo_operacao";
        $sql.="       ,concat (b.ds_banco,' - AG:',cb.ds_agencia,' - Cont:',cb.ds_conta) ds_dados_conta ";
        $sql.="  from lancamentos l";
        $sql.="  left join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  left join categorias_financeiras cf on cf.pk = top.categorias_financeiras_pk";
        $sql.="  left join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  left join bancos b on cb.bancos_pk = b.pk ";
        $sql.="  left join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  left join contas co on l.empresas_pk = co.pk";
        $sql.="  inner join usuarios u on l.usuario_cadastro_pk = u.pk";
        
        $sql.=" where 1=1 ";
        /*if($operacao_pk != ""){
            $sql.=" and l.operacao_pk = ".$operacao_pk;
        }*/
        /*if($contas_banarias_pk != ""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_banarias_pk;
        }*/
        if($pk!=""){
            $sql.=" and l.pk  = ".$pk;
        }
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_vencimento asc ";
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_dt_vencimento($dt_vencimento){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,dt_vencimento ";
        $sql.="       ,ds_lancamento ";
        $sql.="       ,vl_lancamento ";
        $sql.="       ,operacao_pk ";
        $sql.="       ,tipo_grupo_pk ";
        $sql.="       ,grupo_leancamento_pk ";
        $sql.="       ,date_format(dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,ic_status_pagamento ";
        $sql.="       ,obs_lancamento ";
        $sql.="       ,dt_competencia ";
        $sql.="       ,n_documento ";
        $sql.="       ,contas_bancarias_pk ";
        $sql.="       ,tipos_operacao_pk ";
        $sql.="       ,metodos_pagamento_pk ";
        $sql.="       ,empresas_pk";
        $sql.="       ,tipo_grupo_centro_custo_pk";
        $sql.="       ,grupo_lancamento_centro_custo_pk";
        $sql.="       ,ds_ocorrencia";
        $sql.="       ,contratos_pk";

        $sql.="  from lancamentos ";
        $sql.=" where 1=1 ";
        if($dt_vencimento != ""){
            $sql.=" and ds_lancamento like '%".$dt_vencimento."%' ";
        }
        $sql.=" order by dt_vencimento asc ";
       

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listaContaEmpresa($contas_pk){

        $sql ="";
        $sql.="select pk";

        $sql.="  from contas_bancarias ";
        $sql.=" where empresas_pk =  ".$contas_pk;
        $sql.=" order by pk asc";
       
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkDocumentos($pk){

        $sql ="";
        $sql.="select pk";

        $sql.="  from documentos ";
        $sql.=" where lancamentos_pk =  ".$pk;

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarReceita($operacao_pk,$dt_vencimento_ini,$dt_vencimento_fim,$contas_banarias_pk){

        $sql ="";
        $sql.="select l.pk, l.dt_cadastro, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,l.contratos_pk";

        $sql.="  from lancamentos l";
        $sql.="  inner join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  inner join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  inner join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  inner join contas co on l.empresas_pk = co.pk";
        $sql.=" where 1=1 ";
        if($operacao_pk != ""){
            $sql.=" and l.operacao_pk = ".$operacao_pk;
        }
        if($contas_banarias_pk != ""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_banarias_pk;
        }
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_vencimento asc ";
        
        
       
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function RelatorioLancamento($tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk){

        $sql ="";
        $sql.="select l.pk, l.dt_cadastro, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,l.contratos_pk";
        $sql.="       ,u.ds_usuario";
        $sql.="  from lancamentos l";
        $sql.="  left join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  left join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  left join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  left join contas co on l.empresas_pk = co.pk";
        $sql.="  inner join usuarios u on l.usuario_cadastro_pk = u.pk";
        $sql.=" where 1=1 ";
        if($tipo_lancamento_pk == 1){
            $sql.=" and l.operacao_pk = 1";
        }
        else if($tipo_lancamento_pk == 2){
            $sql.=" and l.operacao_pk <> 1";
        }
        if($empresas_pk != ""){
            $sql.=" and l.empresas_pk = ".$empresas_pk;
        }
        if($tipo_grupo_pk != ""){
            $sql.=" and l.tipo_grupo_pk = ".$tipo_grupo_pk;
        }
        if($grupo_leancamento_pk != ""){
            $sql.=" and l.grupo_leancamento_pk = ".$grupo_leancamento_pk;
        }
        if($usuario_cadastro_pk != ""){
            $sql.=" and l.usuario_cadastro_pk = ".$usuario_cadastro_pk;
        }
        if($ic_status_pagamento != ""){
            $sql.=" and l.ic_status_pagamento = ".$ic_status_pagamento;
        }
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }
      
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_vencimento asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function RelatorioLancamentoPago($dt_pagamento_ini,$dt_pagamento_fim,$pk_cliente,$cnpj_cliente,$cnpj_fornecedor,$grupo_leancamento,$dt_lancamento_ini,$dt_lancamento_fim,$lancamento_pk,$tipo_lancamento_pk){

        $sql ="";
        $sql.="select l.pk, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
        $sql.="       ,date_format(l.dt_pagamento ,'%d/%m/%Y')dt_pagamento";
        $sql.="       ,date_format(l.dt_cadastro ,'%d/%m/%Y %H:%i:%s')dt_cadastro";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,l.contratos_pk";
        $sql.="       ,u.ds_usuario";
        $sql.="  from lancamentos l";
        $sql.="  left join fornecedor f on l.grupo_leancamento_pk = f.pk";
        $sql.="  left join leads ld on l.grupo_leancamento_pk = ld.pk";
        $sql.="  left join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  left join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  left join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  left join contas co on l.empresas_pk = co.pk";
        $sql.="  inner join usuarios u on l.usuario_cadastro_pk = u.pk";
        $sql.=" where 1=1 ";
        if($tipo_lancamento_pk == 1){
            $sql.=" and l.operacao_pk = 1";
        }
        else if($tipo_lancamento_pk == 2){
            $sql.=" and l.operacao_pk <> 1";
        }
        if($pk_cliente != ""){
            $sql.=" and f.pk = ".$pk_cliente." or ld.pk=".$pk_cliente;
        }
        if($lancamento_pk != ""){
            $sql.=" and l.pk = ".$lancamento_pk;
        }
        /*if($cnpj_cliente != ""){
            $sql.=" and ld.ds_cpf_cnpj like'%".$cnpj_cliente."%'";
        }
        if($cnpj_fornecedor != ""){
            $sql.=" and f.ds_cpf_cnpj like'%".$cnpj_fornecedor."%'";
        }*/
        if($grupo_leancamento != ""){
            $sql.=" and l.grupo_leancamento_pk ".$grupo_leancamento;
        }
        
        if($dt_pagamento_ini!=""){
            $sql.=" and l.dt_pagamento between '".DataYMD($dt_pagamento_ini)." 00:00:00' and '".DataYMD($dt_pagamento_fim)." 23:59:59'";
        }
        if($dt_lancamento_ini!=""){
            $sql.=" and l.dt_cadastro between '".DataYMD($dt_lancamento_ini)." 00:00:00' and '".DataYMD($dt_lancamento_fim)." 23:59:59'";
        }
        $sql.=" and l.ic_status_pagamento=1";
        
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_pagamento asc ";
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarLancamentosMes($pk,$contas_bancarias_pk,$tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk,$dt_cadastro_ini,$dt_cadastro_fim,$dt_pagamento_ini,$dt_pagamento_fim,$dt_faturamento_ini,$dt_faturamento_fim){

        $sql ="";
        $sql.="select l.pk, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
        $sql.="       ,date_format(l.dt_pagamento ,'%d/%m/%Y')dt_pagamento";
        $sql.="       ,date_format(l.dt_cadastro ,'%d/%m/%Y %H:%i:%s')dt_cadastro";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,l.contratos_pk";
        $sql.="       ,u.ds_usuario";
        $sql.="  from lancamentos l";
        $sql.="  left join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  left join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  left join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  left join contas co on l.empresas_pk = co.pk";
        $sql.="  inner join usuarios u on l.usuario_cadastro_pk = u.pk";
        $sql.=" where 1=1 ";
        if($pk != ""){
            $sql.=" and l.pk = ".$pk;
        }
        if($contas_bancarias_pk != ""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_bancarias_pk;
        }
        if($tipo_lancamento_pk != ""){
            $sql.=" and l.operacao_pk = ".$tipo_lancamento_pk;
        }
        if($empresas_pk != ""){
            $sql.=" and l.empresas_pk = ".$empresas_pk;
        }
        if($tipo_grupo_pk != ""){
            $sql.=" and l.tipo_grupo_pk = ".$tipo_grupo_pk;
        }
        if($grupo_leancamento_pk != ""){
            $sql.=" and l.grupo_leancamento_pk = ".$grupo_leancamento_pk;
        }
        if($usuario_cadastro_pk != ""){
            $sql.=" and l.usuario_cadastro_pk = ".$usuario_cadastro_pk;
        }
        if($ic_status_pagamento != ""){
            $sql.=" and l.ic_status_pagamento = ".$ic_status_pagamento;
        }
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }
        if($dt_pagamento_ini!=""){
            $sql.=" and l.dt_pagamento between '".DataYMD($dt_pagamento_ini)." 00:00:00' and '".DataYMD($dt_pagamento_fim)." 23:59:59'";
        }
        if($dt_faturamento_ini!=""){
            $sql.=" and l.dt_faturamento between '".DataYMD($dt_faturamento_ini)."' and '".DataYMD($dt_faturamento_fim)."'";
        }
        if($dt_cadastro_ini!=""){
            $sql.=" and l.dt_cadastro between '".DataYMD($dt_cadastro_ini)." 00:00:00' and '".DataYMD($dt_cadastro_fim)." 23:59:59'";
        }
      
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_vencimento asc ";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarLancamentosVencidoDia($pk,$tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk,$dt_cadastro_ini,$dt_cadastro_fim,$dt_faturamento_ini,$dt_faturamento_fim){
        $sql="SELECT CURDATE() dt_atual";
        $query1 = $this->db->execQuery($sql);
        
        
        
        $sql ="";
        $sql.="select l.pk, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
         $sql.="       ,date_format(l.dt_pagamento ,'%d/%m/%Y')dt_pagamento";
        $sql.="       ,date_format(l.dt_cadastro ,'%d/%m/%Y %H:%i:%s')dt_cadastro";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,l.contratos_pk";
        $sql.="       ,u.ds_usuario";
        $sql.="  from lancamentos l";
        $sql.="  left join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  left join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  left join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  left join contas co on l.empresas_pk = co.pk";
        $sql.="  inner join usuarios u on l.usuario_cadastro_pk = u.pk";
        $sql.=" where 1=1 ";
        if($pk != ""){
            $sql.=" and l.pk = ".$pk;
        }
        if($tipo_lancamento_pk == 1){
            $sql.=" and l.operacao_pk = 1";
        }
        else{
            $sql.=" and l.operacao_pk <> 1";
        }
        if($empresas_pk != ""){
            $sql.=" and l.empresas_pk = ".$empresas_pk;
        }
        if($tipo_grupo_pk != ""){
            $sql.=" and l.tipo_grupo_pk = ".$tipo_grupo_pk;
        }
        if($grupo_leancamento_pk != ""){
            $sql.=" and l.grupo_leancamento_pk = ".$grupo_leancamento_pk;
        }
        if($usuario_cadastro_pk != ""){
            $sql.=" and l.usuario_cadastro_pk = ".$usuario_cadastro_pk;
        }
        /*if($contas_banarias_pk != ""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_banarias_pk;
        }*/
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }
        else{
            $sql.=" and l.dt_vencimento between '".$query1[0]['dt_atual']."' and '".$query1[0]['dt_atual']."'";
        }
        if($dt_cadastro_ini!=""){
            $sql.=" and l.dt_cadastro between '".DataYMD($dt_cadastro_ini)." 00:00:00' and '".DataYMD($dt_cadastro_fim)." 23:59:59'";
        }
        if($dt_faturamento_ini!=""){
            $sql.=" and l.dt_faturamento between '".DataYMD($dt_faturamento_ini)."' and '".DataYMD($dt_faturamento_fim)."'";
        }
        
        if($ic_status_pagamento!=""){
            $sql.=" and l.ic_status_pagamento = ".$ic_status_pagamento;
        }
        else{
            $sql.=" and l.ic_status_pagamento <> 1 ";
        }
        
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_vencimento desc ";
      

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarLancamentosAtrasado($pk,$tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk,$dt_cadastro_ini,$dt_cadastro_fim,$dt_faturamento_ini,$dt_faturamento_fim){
        $sql="SELECT CURDATE() dt_atual";
        $query1 = $this->db->execQuery($sql);
        
        
        
        $sql ="";
        $sql.="select l.pk, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(l.dt_vencimento ,'%d/%m/%Y')dt_vencimento";
         $sql.="      ,date_format(l.dt_pagamento ,'%d/%m/%Y')dt_pagamento";
        $sql.="       ,date_format(l.dt_cadastro ,'%d/%m/%Y %H:%i:%s')dt_cadastro";
        $sql.="       ,l.ds_lancamento ";
        $sql.="       ,l.vl_lancamento ";
        $sql.="       ,l.operacao_pk ";
        $sql.="       ,date_format(l.dt_faturamento,'%d/%m/%Y')dt_faturamento";
        $sql.="       ,case l.operacao_pk when 1 then 'Receita' when 2 then 'Despesa Fixa' when 3 then 'Despesa Variada' when 4 then 'Imposto' when 5 then 'Transferência' when 6 then 'Caixinha' end ds_operacao";
        $sql.="       ,l.tipo_grupo_pk ";
        $sql.="       ,case l.tipo_grupo_pk when 1 then 'Leads (Clientes)' when 2 then 'Colaboradores' when 3 then 'Fornecedores' when 4 then 'Outros' end ds_tipo_grupo";
        $sql.="       ,l.grupo_leancamento_pk ";
        $sql.="       ,l.ic_status_pagamento";
        $sql.="       ,case l.ic_status_pagamento when 1 then 'Pago' when 2 then 'Pendente' when 3 then 'Aprovado' when 4 then 'Atrasado' when 5 then 'Cancelado'  end ds_status_pagamento";
        $sql.="       ,l.obs_lancamento ";
        $sql.="       ,date_format(l.dt_competencia ,'%d/%m/%Y')dt_competencia";
        $sql.="       ,l.n_documento ";
        $sql.="       ,l.contas_bancarias_pk ";
        $sql.="       ,l.tipos_operacao_pk ";
        $sql.="       ,l.metodos_pagamento_pk ";
        $sql.="       ,l.empresas_pk";
        $sql.="       ,top.ds_tipo_operacao ";
        $sql.="       ,cb.ds_conta_bancaria ";
        $sql.="       ,mp.ds_metodo_pagamento";
        $sql.="       ,co.ds_razao_social";
        $sql.="       ,cb.vl_saldo_inicial";
        $sql.="       ,l.tipo_grupo_centro_custo_pk";
        $sql.="       ,l.grupo_lancamento_centro_custo_pk";
        $sql.="       ,l.ds_ocorrencia";
        $sql.="       ,l.contratos_pk";
        $sql.="       ,u.ds_usuario";
        $sql.="  from lancamentos l";
        $sql.="  left join tipos_operacao top on l.tipos_operacao_pk = top.pk";
        $sql.="  left join contas_bancarias cb on l.contas_bancarias_pk = cb.pk";
        $sql.="  left join metodos_pagamento mp on l.metodos_pagamento_pk = mp.pk";
        $sql.="  left join contas co on l.empresas_pk = co.pk";
        $sql.="  inner join usuarios u on l.usuario_cadastro_pk = u.pk";
        $sql.=" where 1=1 ";
        if($pk != ""){
            $sql.=" and l.pk = ".$pk;
        }
        if($tipo_lancamento_pk == 1){
            $sql.=" and l.operacao_pk = 1";
        }
        else{
            $sql.=" and l.operacao_pk <> 1";
        }
        if($empresas_pk != ""){
            $sql.=" and l.empresas_pk = ".$empresas_pk;
        }
        if($tipo_grupo_pk != ""){
            $sql.=" and l.tipo_grupo_pk = ".$tipo_grupo_pk;
        }
        if($grupo_leancamento_pk != ""){
            $sql.=" and l.grupo_leancamento_pk = ".$grupo_leancamento_pk;
        }
        if($usuario_cadastro_pk != ""){
            $sql.=" and l.usuario_cadastro_pk = ".$usuario_cadastro_pk;
        }
        /*if($contas_banarias_pk != ""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_banarias_pk;
        }*/
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }
        else{
            $sql.=" and l.dt_vencimento < '".$query1[0]['dt_atual']."'";
        }
        if($dt_cadastro_ini!=""){
            $sql.=" and l.dt_cadastro between '".DataYMD($dt_cadastro_ini)." 00:00:00' and '".DataYMD($dt_cadastro_fim)." 23:59:59'";
        }
        if($dt_faturamento_ini!=""){
            $sql.=" and l.dt_faturamento between '".DataYMD($dt_faturamento_ini)."' and '".DataYMD($dt_faturamento_fim)."'";
        }
        
        if($ic_status_pagamento!=""){
            $sql.=" and l.ic_status_pagamento = ".$ic_status_pagamento;
        }
        else{
            $sql.=" and l.ic_status_pagamento <> 1 ";
        }
        
        $sql.=" group by l.pk";
        $sql.=" order by l.dt_vencimento desc ";
        
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    
    public function listarValoresReceita($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk){

        $sql ="";
        $sql.="select ";
        $sql.="       sum(l.vl_lancamento)vl_lancamento ";

        $sql.="  from lancamentos l";
        $sql.=" where 1=1 ";
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }  
        if($contas_bancarias_pk!=""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_bancarias_pk;
        }
        $sql.=" and l.operacao_pk = 1";
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarValoresDespesas($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk){

        $sql ="";
        $sql.="select ";
        $sql.="       sum(l.vl_lancamento)vl_lancamento ";

        $sql.="  from lancamentos l";
        $sql.=" where 1=1 ";
        if($dt_vencimento_ini!=""){
            $sql.=" and l.dt_vencimento between '".DataYMD($dt_vencimento_ini)."' and '".DataYMD($dt_vencimento_fim)."'";
        }  
        if($contas_bancarias_pk!=""){
            $sql.=" and l.contas_bancarias_pk = ".$contas_bancarias_pk;
        }
        $sql.=" and l.operacao_pk in (2,3,4,5,6)";
       
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,dt_vencimento ";
        $sql.="       ,ds_lancamento ";
        $sql.="       ,vl_lancamento ";
        $sql.="       ,operacao_pk ";
        $sql.="       ,tipo_grupo_pk ";
        $sql.="       ,grupo_leancamento_pk ";
        $sql.="       ,ic_status_pagamento ";
        $sql.="       ,obs_lancamento ";
        $sql.="       ,dt_competencia ";
        $sql.="       ,n_documento ";
        $sql.="       ,contas_bancarias_pk ";
        $sql.="       ,tipos_operacao_pk ";
        $sql.="       ,metodos_pagamento_pk ";
        $sql.="       ,empresas_pk";
        $sql.="       ,tipo_grupo_centro_custo_pk";
        $sql.="       ,grupo_lancamento_centro_custo_pk";
        $sql.="       ,ds_ocorrencia";
        $sql.="       ,contratos_pk";
        $sql.="       ,date_format(dt_faturamento,'%d/%m/%Y')dt_faturamento";

        $sql.="  from lancamentos ";
        $sql.=" where 1=1 ";
        $sql.=" order by dt_vencimento asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    //Lista Leads
    public function listaItensGrupoLeads($tipo_grupo_pk){
        $sql ="";
        $sql.="select l.pk, l.dt_cadastro, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,l.ds_lead ";
        $sql.="  from leads l";
        $sql.=" where 1=1 ";
        if($tipo_grupo_pk!=""){
            $sql.=" and l.pk =".$tipo_grupo_pk;
        }
       
        $query = $this->db->execQuery($sql);
        return $query;
    }
    public function listaLeadCNPJ($cpf_cnpj,$cnpj_cliente_sem_mascara){
        $sql ="";
        $sql.="select l.pk, l.dt_cadastro, l.usuario_cadastro_pk, l.dt_ult_atualizacao, l.usuario_ult_atualizacao_pk ";
        $sql.="       ,l.ds_lead ";
        $sql.="  from leads l";
        $sql.=" where 1=1 ";
        if($cpf_cnpj!=""){
            $sql.=" and l.ds_cpf_cnpj like '%".$cpf_cnpj."%' or l.ds_cpf_cnpj like '%".$cnpj_cliente_sem_mascara."%'";
        }

        $query = $this->db->execQuery($sql);
        return $query;
    }
     //Lista Colaboradores
    public function listaItensGrupoColaboradores($tipo_grupo_pk){
        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,c.ds_agencia";
        $sql.="       ,c.ds_conta";
        $sql.="       ,c.ds_digito";
        $sql.="       ,b.ds_banco";
        $sql.="  from colaboradores c";
        $sql.="  left join bancos b on c.bancos_pk = b.pk";
        $sql.=" where 1=1 ";
        if($tipo_grupo_pk!=""){
            $sql.=" and c.pk =".$tipo_grupo_pk;
        }
        
        $query = $this->db->execQuery($sql);
        return $query;
    }
     //Lista Colaboradores
    public function listaItensGrupoFornecedores($tipo_grupo_pk){
        $sql ="";
        $sql.="select f.pk, f.dt_cadastro, f.usuario_cadastro_pk, f.dt_ult_atualizacao, f.usuario_ult_atualizacao_pk ";
        $sql.="       ,f.ds_fornecedor ";
        $sql.="       ,f.ds_cpf_cnpj";
        $sql.="       ,f.ds_agencia";
        $sql.="       ,f.ds_conta";
        $sql.="       ,f.ds_digito";
        $sql.="       ,b.ds_banco";
        $sql.="  from fornecedor f";
        $sql.="  left join bancos b on f.bancos_pk = b.pk";
        $sql.=" where 1=1 ";
        if($tipo_grupo_pk!=""){
            $sql.=" and f.pk =".$tipo_grupo_pk;
        }
        $sql.=" order by f.ds_fornecedor";
        $query = $this->db->execQuery($sql);
        return $query;
    }
    public function listaFornecedoresCNPJ($ds_cpf_cnpj,$cnpj_fornecedor_sem_mascara){
        $sql ="";
        $sql.="select f.pk, f.dt_cadastro, f.usuario_cadastro_pk, f.dt_ult_atualizacao, f.usuario_ult_atualizacao_pk ";
        $sql.="       ,f.ds_fornecedor ";
        $sql.="  from fornecedor f";
        $sql.=" where 1=1 ";
        if($ds_cpf_cnpj!=""){
            $sql.=" and f.ds_cpf_cnpj like '%".$ds_cpf_cnpj."%' or f.ds_cpf_cnpj like '%".$cnpj_fornecedor_sem_mascara."%'";
        }
        $sql.=" order by f.ds_fornecedor";
        $query = $this->db->execQuery($sql);
        return $query;
    }
     //Lista Colaboradores
    public function listaItensGrupoEquipes($tipo_grupo_pk){
        $sql ="";
        $sql.="select e.pk, e.dt_cadastro, e.usuario_cadastro_pk, e.dt_ult_atualizacao, e.usuario_ult_atualizacao_pk ";
        $sql.="       ,e.ds_equipe ";
        $sql.="  from equipes e";
        $sql.=" where 1=1 ";
        if($tipo_grupo_pk!=""){
            $sql.=" and e.pk =".$tipo_grupo_pk;
        }

        $query = $this->db->execQuery($sql);
        return $query;
    }
    
    
    
    
}

?>
