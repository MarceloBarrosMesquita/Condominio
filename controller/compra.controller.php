<?
ini_set('max_execution_time', '36000');
require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/compra.dao.php";
require_once "../model/compra.class.php";

require_once "../model/produto_iten.dao.php";
require_once "../model/produto_iten.class.php";

require_once "../model/lancamento.dao.php";
require_once "../model/lancamento.class.php";

require_once "../model/documento.dao.php";
require_once "../model/documento.class.php";

require_once "../model/entrada_estoque.dao.php";
require_once "../model/entrada_estoque.class.php";

$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$fornecedor_pk = $arrRequest['fornecedor_pk'];
$categoria_pk = $arrRequest['categoria_pk'];
$conta_pk = $arrRequest['conta_pk'];
$dt_pagamento = $arrRequest['dt_pagamento'];
$vl_pagamento = $arrRequest['vl_notafiscal'] + $arrRequest['vl_frete'];
$metodos_pagamento_pk = $arrRequest['metodos_pagamento_pk'];
$qtde_parcelas = $arrRequest['qtde_parcelas'];
$ds_numero_nota = $arrRequest['ds_numero_nota'];
$ds_link_notafiscal = $arrRequest['ds_link_notafiscal'];
$dt_notafiscal = $arrRequest['dt_notafiscal'];
$vl_notafiscal = $arrRequest['vl_notafiscal'];
$vl_frete = $arrRequest['vl_frete'];
$dt_entrega = $arrRequest['dt_entrega'];
$ic_entregue = $arrRequest['ic_entregue'];
$obs = $arrRequest['obs'];
$grupo_lancamento_centro_custo_pk = $arrRequest['grupo_lancamento_centro_custo_pk'];
$centro_custo_pk = $arrRequest['centro_custo_pk'];
$documentos_pk = $arrRequest['documentos_pk'];
$produtos_itens_pk = $arrRequest['produtos_itens_pk'];


$compradao = new compradao();
$compradao->setToken($token);

$produto_itendao = new produto_itendao();
$produto_itendao->setToken($token); 

$lancamentodao = new lancamentodao();
$lancamentodao->setToken($token); 

$documentodao = new documentodao();
$documentodao->setToken($token); 

$entrada_estoquedao = new entrada_estoquedao();
$entrada_estoquedao->setToken($token); 

switch($job){

    case 'excluir':{
        
        $resultdo = "";
        
        $compra = $compradao->carregarPorPk($pk);
        if($compra->getpk()>0){
            
            $compradao->excluir($compra);
            $compradao->excluirProdutoItem($compra->getpk());
            $compradao->excluirDocs($compra->getpk());
            $compradao->excluirLancamentos($compra->getpk());
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'compra nao encontrado';
        }
        break;
    }
    case 'salvar':{
        
        
        
        
        
        
        
        
        
        
        
        $compra = $compradao->carregarPorPk($pk);
        $compra->setfornecedor_pk($fornecedor_pk);
        $compra->setcategoria_pk($categoria_pk);
        $compra->setconta_pk($conta_pk);
        $compra->setdt_pagamento($dt_pagamento);
        $compra->setvl_pagamento($vl_notafiscal + $vl_frete);
        $compra->setmetodos_pagamento_pk($metodos_pagamento_pk);
        $compra->setqtde_parcelas($qtde_parcelas);
        $compra->setds_numero_nota($ds_numero_nota);
        $compra->setds_link_notafiscal($ds_link_notafiscal);
        $compra->setdt_notafiscal($dt_notafiscal);
        $compra->setvl_notafiscal($vl_notafiscal);
       
        $compra->setvl_frete($vl_frete);
        $compra->setdt_entrega($dt_entrega);
        $compra->setic_entregue($ic_entregue);
        $compra->setobs($obs);
        $compra->setgrupo_lancamento_centro_custo_pk($grupo_lancamento_centro_custo_pk);
        $compra->setcentro_custo_pk($centro_custo_pk);

        
        $c_pk = $compradao->salvar($compra);
        
        if($pk==""){
            $compras_pk = $c_pk;
        }
        else{
            $compras_pk = $pk;
        }
        
        
        
        
        
        //SALVAR LANÇAMENTOS 
        
        if($pk==""){
            
            
            
            
            if($qtde_parcelas>1){

                for($i=0;$i<$qtde_parcelas;$i++){
                    
                    $dt_parcelas = $compradao->listarDataDiff($dt_pagamento,$i);
                    

                    $conta_bancaria_pk = $lancamentodao->listaContaEmpresa($conta_pk);

                    $lancamento = $lancamentodao->carregarPorPk("");

                    $lancamento->setoperacao_pk(3);
                    $lancamento->settipos_operacao_pk(1020);
                    $lancamento->setempresas_pk($conta_pk);
                    $lancamento->setcontas_bancarias_pk($conta_bancaria_pk[0]['pk']);
                    $lancamento->setds_lancamento("Compras");
                    $lancamento->settipo_grupo_pk(3);
                    $lancamento->setgrupo_leancamento_pk($fornecedor_pk);
                    $lancamento->settipo_grupo_centro_custo_pk($centro_custo_pk);
                    $lancamento->setgrupo_lancamento_centro_custo_pk($grupo_lancamento_centro_custo_pk);
                    
                    $lancamento->setvl_lancamento($vl_notafiscal/$qtde_parcelas);
                    $lancamento->setmetodos_pagamento_pk($metodos_pagamento_pk);
                    $lancamento->setdt_vencimento(DataDMY($dt_parcelas[0]['dt_pagamento']));



                    $lancamento->setic_status_pagamento(2);
                    $lancamento->setcompras_pk($compras_pk);
                    
                    $lancamentos_pk = $lancamentodao->salvar($lancamento);


                }
            }
            else{
                
                
                $conta_bancaria_pk = $lancamentodao->listaContaEmpresa($conta_pk);

                $lancamento = $lancamentodao->carregarPorPk("");

                $lancamento->setoperacao_pk(3);
                $lancamento->settipos_operacao_pk(1020);
                $lancamento->setempresas_pk($conta_pk);
                $lancamento->setcontas_bancarias_pk($conta_bancaria_pk[0]['pk']);
                $lancamento->setds_lancamento("Compras");
                $lancamento->settipo_grupo_pk(3);
                $lancamento->setgrupo_leancamento_pk($fornecedor_pk);
                $lancamento->settipo_grupo_centro_custo_pk($centro_custo_pk);
                $lancamento->setgrupo_lancamento_centro_custo_pk($grupo_lancamento_centro_custo_pk);
                $lancamento->setvl_lancamento($vl_notafiscal);
                $lancamento->setmetodos_pagamento_pk($metodos_pagamento_pk);
                $lancamento->setdt_vencimento($dt_pagamento);
                $lancamento->setic_status_pagamento(2);
                $lancamento->setcompras_pk($compras_pk);
                
                $lancamentos_pk = $lancamentodao->salvar($lancamento);
                    
            }
            
        }
        
        
        
        
        
        
        
        //PRODUTOS ITENS 
        if($produtos_itens_pk != "")
            $arrProdutosItens = json_decode ($produtos_itens_pk, true);
        
        
        if(count($arrProdutosItens) > 0){
            for($i = 0; $i < count($arrProdutosItens); $i++){

                $produto_iten = $produto_itendao->carregarPorPk($arrProdutosItens[$i]['pk']);;
                $produto_iten->setvl_item($arrProdutosItens[$i]['vl_item']);
                $produto_iten->setprodutos_pk($arrProdutosItens[$i]['produtos_pk']);
                $produto_iten->setqtde($arrProdutosItens[$i]['qtde']);
                $produto_iten->setic_entrega($arrProdutosItens[$i]['ic_entrega']);
                $produto_iten->setcompras_pk($compras_pk);
                
                $produto_item_pk = $produto_itendao->salvar($produto_iten);
                
                
                
                
                
                //VERIFICAR SE FAZ CADASTRO EM ENTRADA ESTOQUE
                if($arrProdutosItens[$i]['ic_entrega']==2){
                    $entrada_estoque = $entrada_estoquedao->carregarPorPk("");
                    $entrada_estoque->setds_n_ordem("");
                    $entrada_estoque->setobs_entrada_estoque("");
                    $entrada_estoque->setfornecedor_pk("");
                    $entrada_estoque->setprodutos_pk($arrProdutosItens[$i]['produtos_pk']);
                    $entrada_estoque->setqtde($arrProdutosItens[$i]['qtde']);
                    $entrada_estoque->setvl_unitario($arrProdutosItens[$i]['vl_item']);


                    $entrada_estoque_pk = $entrada_estoquedao->salvar($entrada_estoque);

                    if($arrProdutosItens[$i]['qtde']!=""){
                        for($j = 0; $j < $arrProdutosItens[$i]['qtde']; $j++){

                            $produto_iten = $produto_itendao->carregarPorPk("");
                            $produto_iten->setds_n_serie("");
                            $produto_iten->setvl_item($arrProdutosItens[$i]['vl_item']);
                            $produto_iten->setprodutos_pk($arrProdutosItens[$i]['produtos_pk']);
                            $produto_iten->setentrada_estoque_pk($entrada_estoque_pk);

                            $p_pk_entrada_estoque = $produto_itendao->salvar($produto_iten);

                        }
                    }
                }
            }
        }
        
        
        
        if($documentos_pk != "")
            $arrDocs = json_decode ($documentos_pk, true);
        
      
        
        if(count($arrDocs) > 0){
            for($i = 0; $i < count($arrDocs); $i++){
                if($arrDocs[$i]['ds_documento']!="" && $arrDocs[$i]['pk']==""){
                    $documento = $documentodao->carregarPorPk("");
                    $documento->setds_documento($arrDocs[$i]['ds_documento']);
                    $documento->setds_nome_original($arrDocs[$i]['ds_nome_original']);
                    $documento->setcompras_pk($compras_pk);

                    $docs_pk = $documentodao->salvar($documento);
                }
                
            }
        }
        
        
        
        
        $mysql_data[] = array(
            "pk" => $compras_pk
        );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'salvarProduto':{
        
        
        $pk = $_REQUEST['pk'];
        $compras_pk = $_REQUEST['compras_pk'];
        $produtos_pk = $_REQUEST['produtos_pk'];
        $qtde = $_REQUEST['qtde'];
        $vl_item = $_REQUEST['vl_item'];
        $ic_entrega = $_REQUEST['ic_entrega'];
        
        if($pk!=""){
            $queryAnt = $produto_itendao->listarPorPk($pk);
            
            $ic_entrega_anterior = $queryAnt[0]['ic_entrega'];
        }
        
        
        

        $produto_iten = $produto_itendao->carregarPorPk($pk);
        $produto_iten->setvl_item($vl_item);
        $produto_iten->setprodutos_pk($produtos_pk);
        $produto_iten->setqtde($qtde);
        $produto_iten->setic_entrega($ic_entrega);
        $produto_iten->setcompras_pk($compras_pk);

        $produto_item_pk = $produto_itendao->salvar($produto_iten);

        



        //VERIFICAR SE FAZ CADASTRO EM ENTRADA ESTOQUE
        if($ic_entrega==2){
            if($pk==""){
                $entrada_estoque = $entrada_estoquedao->carregarPorPk("");
                $entrada_estoque->setds_n_ordem("");
                $entrada_estoque->setobs_entrada_estoque("");
                $entrada_estoque->setfornecedor_pk("");
                $entrada_estoque->setprodutos_pk($produtos_pk);
                $entrada_estoque->setqtde($qtde);
                $entrada_estoque->setvl_unitario($vl_item);


                $entrada_estoque_pk = $entrada_estoquedao->salvar($entrada_estoque);

                if($qtde!=""){
                    for($i = 0; $i < $qtde; $i++){

                        $produto_iten = $produto_itendao->carregarPorPk("");
                        $produto_iten->setds_n_serie("");
                        $produto_iten->setvl_item($vl_item);
                        $produto_iten->setprodutos_pk($produtos_pk);
                        $produto_iten->setentrada_estoque_pk($entrada_estoque_pk);

                        $p_pk_entrada_estoque = $produto_itendao->salvar($produto_iten);

                    }
                }
            }
            else if($ic_entrega_anterior==1){
                $entrada_estoque = $entrada_estoquedao->carregarPorPk("");
                $entrada_estoque->setds_n_ordem("");
                $entrada_estoque->setobs_entrada_estoque("");
                $entrada_estoque->setfornecedor_pk("");
                $entrada_estoque->setprodutos_pk($produtos_pk);
                $entrada_estoque->setqtde($qtde);
                $entrada_estoque->setvl_unitario($vl_item);


                $entrada_estoque_pk = $entrada_estoquedao->salvar($entrada_estoque);

                if($qtde!=""){
                    for($i = 0; $i < $qtde; $i++){

                        $produto_iten = $produto_itendao->carregarPorPk("");
                        $produto_iten->setds_n_serie("");
                        $produto_iten->setvl_item($vl_item);
                        $produto_iten->setprodutos_pk($produtos_pk);
                        $produto_iten->setentrada_estoque_pk($entrada_estoque_pk);

                        $p_pk_entrada_estoque = $produto_itendao->salvar($produto_iten);

                    }
                }
            }
            
        }
            
        
       
        
        
        $mysql_data[] = array(
            "pk" => $produto_item_pk
        );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        
        $resultado = "";
        $query = $compradao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "fornecedor_pk"=>$query[$i]['fornecedor_pk'],
                    "categoria_pk"=>$query[$i]['categoria_pk'],
                    "conta_pk"=>$query[$i]['conta_pk'],
                    "dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "vl_pagamento"=>$query[$i]['vl_pagamento'],
                    "metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "qtde_parcelas"=>$query[$i]['qtde_parcelas'],
                    "ds_numero_notads_link_notafiscal"=>$query[$i]['ds_numero_notads_link_notafiscal'],
                    "dt_notafiscal"=>$query[$i]['dt_notafiscal'],
                    "vl_notafiscal"=>$query[$i]['vl_notafiscal'],
                    "vl_frete"=>$query[$i]['vl_frete'],
                    "dt_entrega"=>$query[$i]['dt_entrega'],
                    "ic_entregue"=>$query[$i]['ic_entregue'],
                    "obs"=>$query[$i]['obs'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "centro_custo_pk"=>$query[$i]['centro_custo_pk']
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
        $query = $compradao->listar_por_fornecedor_pk("","","","","","");
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "fornecedor_pk"=>$query[$i]['fornecedor_pk'],
                    "categoria_pk"=>$query[$i]['categoria_pk'],
                    "conta_pk"=>$query[$i]['conta_pk'],
                    "dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "vl_pagamento"=>$query[$i]['vl_pagamento'],
                    "metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "qtde_parcelas"=>$query[$i]['qtde_parcelas'],
                    "ds_numero_notads_link_notafiscal"=>$query[$i]['ds_numero_notads_link_notafiscal'],
                    "dt_notafiscal"=>$query[$i]['dt_notafiscal'],
                    "vl_notafiscal"=>$query[$i]['vl_notafiscal'],
                    "vl_frete"=>$query[$i]['vl_frete'],
                    "dt_entrega"=>$query[$i]['dt_entrega'],
                    "ic_entregue"=>$query[$i]['ic_entregue'],
                    "obs"=>$query[$i]['obs'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "centro_custo_pk"=>$query[$i]['centro_custo_pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarDataTable':{
        
        
        $fornecedor_pk = $_REQUEST['fornecedor_pk'];
        $categorias_pk = $_REQUEST['categorias_pk'];
        $ds_numero_nota = $_REQUEST['ds_numero_nota'];
        $empresas_pk = $_REQUEST['contas_pk'];
        $dt_cadastro_ini = $_REQUEST['dt_cadastro_ini'];
        $dt_cadastro_fim = $_REQUEST['dt_cadastro_fim'];
        
        
        $resultado = "";
        $query = $compradao->listar_por_fornecedor_pk($fornecedor_pk,$categorias_pk,$ds_numero_nota,$empresas_pk,$dt_cadastro_ini,$dt_cadastro_fim);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                
                
            $ds_fornecedor = remover_acentos($query[$i]['ds_fornecedor']);
            $ds_conta = remover_acentos($query[$i]['ds_conta']);
                
                
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_fornecedor"=>substr($ds_fornecedor,0,25),
                    "ds_categoria"=>$query[$i]['ds_categoria'],
                    "ds_numero_nota"=>$query[$i]['ds_numero_nota'],
                    "ds_conta"=>substr($ds_conta,0,25),
                    "dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "vl_pagamento"=>$query[$i]['vl_pagamento'],
                    "fornecedor_pk"=>$query[$i]['fornecedor_pk'],
                    "categoria_pk"=>$query[$i]['categoria_pk'],
                    "conta_pk"=>$query[$i]['conta_pk'],
                    "dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "vl_pagamento"=>$query[$i]['vl_pagamento'],
                    "metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "qtde_parcelas"=>$query[$i]['qtde_parcelas'],
                    "ds_link_notafiscal"=>$query[$i]['ds_link_notafiscal'],
                    "ds_numero_nota"=>$query[$i]['ds_numero_nota'],
                    "dt_notafiscal"=>$query[$i]['dt_notafiscal'],
                    "vl_notafiscal"=>$query[$i]['vl_notafiscal'],
                    "vl_frete"=>$query[$i]['vl_frete'],
                    "dt_entrega"=>$query[$i]['dt_entrega'],
                    "ic_entregue"=>$query[$i]['ic_entregue'],
                    "obs"=>$query[$i]['obs'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['centro_custo_pk'],
                    "centro_custo_pk"=>$query[$i]['centro_custo_pk'],

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

$compradao = null;

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
