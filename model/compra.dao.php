<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/compra.class.php';


class compradao{

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
    
    public function salvar($compra){

        $fields = array();
        $fields['fornecedor_pk'] = $compra->getfornecedor_pk();
        $fields['categoria_pk'] = $compra->getcategoria_pk();
        $fields['conta_pk'] = $compra->getconta_pk();
        if($compra->getdt_pagamento()!=""){
            $fields['dt_pagamento'] = DataYMD($compra->getdt_pagamento());
        }
        
        $fields['vl_pagamento'] = $compra->getvl_pagamento();
        $fields['metodos_pagamento_pk'] = $compra->getmetodos_pagamento_pk();
        $fields['qtde_parcelas'] = $compra->getqtde_parcelas();
        $fields['ds_numero_nota'] = $compra->getds_numero_nota();
        $fields['ds_link_notafiscal'] = $compra->getds_link_notafiscal();
        if($compra->getdt_notafiscal()!=""){
            $fields['dt_notafiscal'] = DataYMD($compra->getdt_notafiscal());
        }
        $fields['vl_notafiscal'] = $compra->getvl_notafiscal();
        $fields['vl_frete'] = $compra->getvl_frete();
        
        if($compra->getdt_entrega()!=""){
            $fields['dt_entrega'] = DataYMD($compra->getdt_entrega());
        }
        $fields['ic_entregue'] = $compra->getic_entregue();
        $fields['obs'] = $compra->getobs();
        $fields['grupo_lancamento_centro_custo_pk'] = $compra->getgrupo_lancamento_centro_custo_pk();
        $fields['centro_custo_pk'] = $compra->getcentro_custo_pk();


        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($compra->getpk()  == ""){

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("compras", $fields);
            return $pk;
        }
        else{
            return $this->db->execUpdate("compras", $fields, " pk = ".$compra->getpk());
        }

    }

    public function excluir($compra){
        $this->db->execDelete("compras"," pk = ".$compra->getpk());
    }
    public function excluirProdutoItem($compras_pk){
        $this->db->execDelete("produtos_itens"," compras_pk = ".$compras_pk);
    }
    public function excluirDocs($compras_pk){
        $this->db->execDelete("documentos"," compras_pk = ".$compras_pk);
    }
    public function excluirLancamentos($compras_pk){
        $this->db->execDelete("lancamentos"," compras_pk = ".$compras_pk);
    }

    public function carregarPorPk($pk){

        $compra = new compra();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,fornecedor_pk ";
        $sql.="       ,categoria_pk ";
        $sql.="       ,conta_pk ";
        $sql.="       ,dt_pagamento ";
        $sql.="       ,vl_pagamento ";
        $sql.="       ,metodos_pagamento_pk ";
        $sql.="       ,qtde_parcelas ";
        $sql.="       ,ds_numero_nota";
        $sql.="       ,ds_link_notafiscal";
        $sql.="       ,dt_notafiscal ";
        $sql.="       ,vl_notafiscal ";
        $sql.="       ,vl_frete ";
        $sql.="       ,dt_entrega ";
        $sql.="       ,ic_entregue ";
        $sql.="       ,obs ";
        $sql.="       ,grupo_lancamento_centro_custo_pk ";
        $sql.="       ,centro_custo_pk ";


        $sql.="  from compras ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $compra->setpk($query[$i]["pk"]);
                $compra->setdt_cadastro($query[$i]["dt_cadastro"]);
                $compra->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $compra->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $compra->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $compra->setfornecedor_pk($query[$i]['fornecedor_pk']);
                $compra->setcategoria_pk($query[$i]['categoria_pk']);
                $compra->setconta_pk($query[$i]['conta_pk']);
                $compra->setdt_pagamento($query[$i]['dt_pagamento']);
                $compra->setvl_pagamento($query[$i]['vl_pagamento']);
                $compra->setmetodos_pagamento_pk($query[$i]['metodos_pagamento_pk']);
                $compra->setqtde_parcelas($query[$i]['qtde_parcelas']);
                $compra->setds_numero_nota($query[$i]['ds_numero_nota']);
                $compra->setds_link_notafiscal($query[$i]['ds_link_notafiscal']);
                $compra->setdt_notafiscal($query[$i]['dt_notafiscal']);
                $compra->setvl_notafiscal($query[$i]['vl_notafiscal']);
                $compra->setvl_frete($query[$i]['vl_frete']);
                $compra->setdt_entrega($query[$i]['dt_entrega']);
                $compra->setic_entregue($query[$i]['ic_entregue']);
                $compra->setobs($query[$i]['obs']);
                $compra->setgrupo_lancamento_centro_custo_pk($query[$i]['grupo_lancamento_centro_custo_pk']);
                $compra->setcentro_custo_pk($query[$i]['centro_custo_pk']);

            }
        }
        return $compra;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,fornecedor_pk ";
        $sql.="       ,categoria_pk ";
        $sql.="       ,conta_pk ";
        $sql.="       ,dt_pagamento ";
        $sql.="       ,vl_pagamento ";
        $sql.="       ,metodos_pagamento_pk ";
        $sql.="       ,qtde_parcelas ";
        $sql.="       ,ds_numero_nota";
        $sql.="       ,ds_link_notafiscal";
        $sql.="       ,dt_notafiscal ";
        $sql.="       ,vl_notafiscal ";
        $sql.="       ,vl_frete ";
        $sql.="       ,dt_entrega ";
        $sql.="       ,ic_entregue ";
        $sql.="       ,obs ";
        $sql.="       ,grupo_lancamento_centro_custo_pk ";
        $sql.="       ,centro_custo_pk ";

        $sql.="  from compras ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_fornecedor_pk($fornecedor_pk,$categorias_pk,$ds_numero_nota,$empresas_pk,$dt_cadastro_ini,$dt_cadastro_fim){

        $sql ="";
        $sql.="select cp.pk, date_format(cp.dt_cadastro,'%d/%m/%Y')dt_cadastro, cp.usuario_cadastro_pk, cp.dt_ult_atualizacao, cp.usuario_ult_atualizacao_pk ";
        $sql.="       ,cp.fornecedor_pk ";
        $sql.="       ,cp.categoria_pk ";
        $sql.="       ,cp.conta_pk ";
        $sql.="       ,date_format(cp.dt_pagamento,'%d/%m/%Y')dt_pagamento";
        $sql.="       ,cp.vl_pagamento ";
        $sql.="       ,cp.metodos_pagamento_pk ";
        $sql.="       ,cp.qtde_parcelas ";
        $sql.="       ,cp.ds_numero_nota,cp.ds_link_notafiscal ";
        $sql.="       ,cp.ds_link_notafiscal ";
         $sql.="       ,date_format(cp.dt_notafiscal,'%d/%m/%Y')dt_notafiscal";
        $sql.="       ,cp.vl_notafiscal ";
        $sql.="       ,cp.vl_frete ";
        $sql.="       ,date_format(cp.dt_entrega,'%d/%m/%Y')dt_entrega";
        $sql.="       ,cp.ic_entregue ";
        $sql.="       ,cp.obs ";
        $sql.="       ,cp.grupo_lancamento_centro_custo_pk ";
        $sql.="       ,cp.centro_custo_pk ";
        $sql.="       ,c.ds_categoria";
        $sql.="       ,f.ds_fornecedor";
        $sql.="       ,ct.ds_conta";

        $sql.="  from compras cp";
        $sql.="       inner join categorias_produto c on cp.categoria_pk = c.pk";
        $sql.="       inner join fornecedor f on cp.fornecedor_pk = f.pk";
        $sql.="       inner join contas ct on cp.conta_pk = ct.pk";
        $sql.=" where 1=1 ";
        if($fornecedor_pk!=""){
            $sql.=" and cp.fornecedor_pk = ".$fornecedor_pk;
        }
        if($categorias_pk!=""){
            $sql.=" and cp.categoria_pk= ".$categorias_pk;
        }
        if($ds_numero_nota!=""){
             $sql.=" and cp.ds_numero_nota like '%".$ds_numero_nota."%'";
        }
        if($empresas_pk!=""){
            $sql.=" and cp.conta_pk= ".$empresas_pk;
        }
        if($dt_cadastro_ini!=""){
            $sql.=" and cp.dt_pagamento between '".DataYMD($dt_cadastro_ini)."' and '".DataYMD($dt_cadastro_fim)."'";
        }
        
        $sql.=" order by cp.dt_pagamento asc ";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listarDataDiff($data_base,$i){
            
        $sql="SELECT DATE_ADD('".DataYMD($data_base)."', INTERVAL ".($i)." MONTH)dt_pagamento";
       
        $query = $this->db->execQuery($sql);
        return $query;
    }
            
    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,fornecedor_pk ";
        $sql.="       ,categoria_pk ";
        $sql.="       ,conta_pk ";
        $sql.="       ,dt_pagamento ";
        $sql.="       ,vl_pagamento ";
        $sql.="       ,metodos_pagamento_pk ";
        $sql.="       ,qtde_parcelas ";
        $sql.="       ,ds_numero_nota";
        $sql.="       ,ds_link_notafiscal ";
        $sql.="       ,dt_notafiscal ";
        $sql.="       ,vl_notafiscal ";
        $sql.="       ,vl_frete ";
        $sql.="       ,dt_entrega ";
        $sql.="       ,ic_entregue ";
        $sql.="       ,obs ";
        $sql.="       ,grupo_lancamento_centro_custo_pk ";
        $sql.="       ,centro_custo_pk ";

        $sql.="  from compras ";
        $sql.=" where 1=1 ";
        $sql.=" order by fornecedor_pk asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

}

?>
