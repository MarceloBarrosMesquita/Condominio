<?
require_once "../inc/php/header.php";
?>
<script src="compra_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<style>
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2></h2>
        </div>
    </div>
    <form method="post">
        
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="fornecedor_pk">Categoria:&nbsp;</label>
                <select class="form-control form-control-sm chzn-select" id="categorias_pk">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="fornecedor_pk">Fornecedor:&nbsp;</label>
                <select class="form-control form-control-sm chzn-select" id="fornecedor_pk">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="fornecedor_pk">Número da NF:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="ds_numero_nota">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="fornecedor_pk">Empresas:&nbsp;</label>
                <select class="form-control form-control-sm chzn-select" id="empresas_pk">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-2">
                <label for="ic_status">DT Compra Ini:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="dt_cadastro_ini" maxlength="10">
            </div>
            <div class="col-md-2">
                <label for="ic_status">DT Compra Fim:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="dt_cadastro_fim" maxlength="10">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4" align="center">
                <button type="button" class="btn btn-link" id="cmdPesquisar"><img src="../img/pesquisar.png" width=40 height=40>Pesquisar</button>
                &nbsp;
                <button type="button" class="btn btn-link" id="cmdIncluir"><img src="../img/incluir.png" width=40 height=40>Incluir</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblResultado">
            <thead>
                <tr>
                    <th>Cód</th>
                    
                    <th>Fornecedor</th>
                    <th>Categoria</th>
                    <th>Num NF</th>
                    <th>Empresa</th>
                    <th>DT Compra</th>
                    <th>VL Compra</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>

<form id="form" class="form">
    <div class="modal" tabindex="-1" role="dialog" id="modal_compra">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Nova Compra</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Compras</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                        </div>
                    </div>  
                    <br>
                    <div class='row'>   
                        <input type="hidden" id="compras_pk">
                        <div class='col-md-4'>
                            <label for='tipos_operacao_pk'>Fornecedor:&nbsp;</label>
                            <select class='form-control form-control-sm chzn-select'  id='fornecedor_pk_ins' name='fornecedor_pk_ins' >
                                <option value=""></option>
                            </select>  
                        </div>
                        <div class='col-md-4'>
                            <label for='tipos_operacao_pk'>Categoria:&nbsp;</label>
                            <select class='form-control form-control-sm chzn-select'  id='categoria_pk_ins' name='categoria_pk_ins'/>
                                <option value=""></option>
                            </select>  
                        </div>
                    </div>  
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_fornecedor" style="display:none">
                        <div class='col-md-4'>
                            <strong style="color: red">Por favor, informe Fornecedor</strong>
                        </div>
                    </div>
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_categoria" style="display:none">
                        <div class='col-md-4'>
                            &nbsp;
                        </div>
                        <div class='col-md-4'>
                            <strong style="color: red">Por favor, informe Categoria</strong>
                        </div>
                    </div>
                    <div class='row'>   
                        <div class='col-md-4'>
                            <label for='tipos_operacao_pk'>Empresa:&nbsp;</label>
                            <select class='form-control form-control-sm chzn-select'  id='empresa_pk_ins' name='empresa_pk_ins' />
                                <option value=""></option>
                            </select>  
                        </div>                                     
                    </div> 
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_empresa" style="display:none">
                        <div class='col-md-4'>
                            <strong style="color: red">Por favor, informe Empresa</strong>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <label for='tipo_grupo_pk'>Grupos Centro de Custo:&nbsp;</label>
                            <select class='form-control form-control-sm chzn-select'  id='tipo_grupo_centro_custo_pk' name='tipo_grupo_centro_custo_pk' />
                                <option value=""></option>
                                <option value="1">Leads (Clientes)</option>
                                <option value="2">Colaboradores</option>
                                <option value="3">Fornecedores</option>
                                <option value="4">Centro de Custo</option>
                            </select>  
                        </div>
                        <div class='col-md-4'>
                            <label for='vl_lancamento'>Centro de Custo:&nbsp;</label>
                            <select class='form-control form-control-sm chzn-select'  id='grupo_lancamento_centro_custo_pk' name='grupo_lancamento_centro_custo_pk' />
                                <option value=""></option>
                            </select>  
                        </div>
                    </div>
                    <br>
                    <!--Identificação de valores do lançamento-->    
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Dados NF / Pagamento</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                        </div>
                    </div> 
                    <br>
                    <div class='row'>
                        <div class='col-md-3'>
                            <label for='vl_lancamento'>N Doc (NF/Pedido):&nbsp;</label>
                            <input type="text" class='form-control form-control-sm' id="ds_numero_nota_ins" name="ds_numero_nota_ins"/> 
                        </div>
                        <div class='col-md-3'>
                            <label for='vl_lancamento'>DT. Pag.</label>
                            <input type="text" class='form-control form-control-sm' id="dt_pagamento" name="dt_pagamento" maxlength="10"/> 
                        </div>
                        <div class='col-md-3'>
                            <label for='vl_lancamento' >DT. Prevista Entrega</label>
                            <input type="text" class='form-control form-control-sm' id="dt_entrega" name="dt_entrega" maxlength="10"/> 
                        </div>
                    </div>
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_n_doc" style="display:none">
                        <div class='col-md-3'>
                            <strong style="color: red">Por favor, informe N Doc (NF/Pedido)</strong>
                        </div>
                    </div>
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_dt_pag" style="display:none">
                        <div class='col-md-3'>
                            &nbsp;
                        </div>
                        <div class='col-md-3'>
                            <strong style="color: red">Por favor, informe DT. Pag.</strong>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <label for='vl_lancamento' >Forma de Pagamento:&nbsp;</label>
                            <select class='form-control form-control-sm chzn-select'  id='metodos_pagamento_pk' name='metodos_pagamento_pk' />
                                <option ></option>
                            </select>
                        </div>
                        <div class='col-md-5'>
                            <label for='dt_competencia'>Qtde. Parcelas:&nbsp;</label>
                            <div id="qtde_parcela_combo"></div>
                        </div>
                    </div>
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_forma_apg" style="display:none">
                        <div class='col-md-4'>
                            <strong style="color: red">Por favor, informe Forma de Pagamento</strong>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <label for='vl_lancamento' >VL N Doc (NF/Pedido):&nbsp;</label>
                            <input type="text" class='form-control form-control-sm'  id='vl_notafiscal' name='vl_notafiscal' />
                        </div>
                        <div class='col-md-4'>
                            <label for='vl_lancamento' >VL Frete:&nbsp;</label>
                            <input type="text" class='form-control form-control-sm'  id='vl_frete' name='vl_frete' />
                        </div>
                        
                    </div>
                    <!----------------------ALERT------------------>
                    <div class='row' id="alert_vl_n_doc" style="display:none">
                        <div class='col-md-4'>
                            <strong style="color: red">Por favor, informe VL N Doc (NF/Pedido)</strong>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Cadastros de Produto</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                        </div>
                    </div> 
                    <br>
                    <div class='row'>
                        <div class="col-md-12" >
                            <button type='button' class="btn btn-primary" id='cmdIncluirProduto'>Incluir Produto</button>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-md-12">
                             <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblCompraProduto">
                                <thead>
                                    <tr>
                                        <th>Cód</th>
                                        <th>Categoria_pk</th>
                                        <th>Categoria</th>
                                        <th>Produto_pk</th>
                                        <th>Produto</th>
                                        <th>ic_entrega</th>
                                        <th>Qtde</th>
                                        <th>Lanc. Entoque</th>
                                        <th>Vl. Unitário</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div>
                        <div class="row">
                            <div class="col-md-12" >
                                <button type="button" class="btn btn-primary" id="cmdIncluirDocumento">Incluir Documento</button>
                            </div>
                        </div>
                        <p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblDocumentos">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Documento</th>
                                            <th>Observação</th>
                                            <th>Nome Original</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   
                    
                     
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary" id="cmdSalvarCompra">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>



<form id="form_janela_produto" class="form">
    <div class="modal fade bd-example-modal-lg" id="janela_produto" >
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="janela_contatosLabel">Cadastro de Produtos / Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <input type='hidden' class='form-control form-control-sm'  id='acao' name='acao'>
                <input type='hidden' class='form-control form-control-sm'  id='produto_compra_pk' name='produto_compra_pk'>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for='processos_pk'>Categoria:&nbsp;</label>
                        <select class='form-control form-control-sm chzn-select'  id='categorias_ins_prod_pk' name='categorias_ins_prod_pk'/>
                            <option></option>
                        </select>    
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_categoria_prod" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, informe Categoria</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for='processos_pk'>Produtos:&nbsp;</label>
                        <select class='form-control form-control-sm chzn-select'  id='produtos_pk' name='produtos_pk'/>
                            <option></option>
                        </select>    
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_produto_prod" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, informe Produto</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Valor Unitário:&nbsp;</label>
                        <input type="text" class='form-control form-control-sm'  id='vl_item_produto' name='vl_item_produto'/>  
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_vl_prod" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <strong style="color: red">Por favor, informe Valor Unitário</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <label for='processos_pk'>Quantidade:&nbsp;</label>
                        <input type="text" class='form-control form-control-sm'  id='qtde_produto' name='qtde_produto'/>  
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_qtde_prod" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <strong style="color: red">Por favor, informe Quantidade</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Lançar no Estoque:&nbsp;</label>
                        <input type='checkbox'  id="ic_entrega" name="ic_entrega"/>
                    </div>
                </div>
                
            </div>  
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="cmdEnviarProduto"  name="cmdEnviarProduto">Enviar</button>
            </div>
            </div>
        </div>
    </div>  
</form>

<div class="modal fade bd-example-modal-lg" id="janela_documentos" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="janela_contatosLabel">Novo Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Escolha o Arquivo</span>
                            <input id="fileupload"  type="file" name="FilesPic" multiple data-url="../controller/salvar_arquivo.php">

                        </span>
                        <br>
                        <div id="alert_documento" style="display:none" >
                            <strong style="color: red">Selecione um arquivo</strong>
                        </div>
                        <br>
                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <div id="files" class="files"></div>
                        <!---->
                        <div class="row" id="rowFotos"></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        &nbsp;
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblArquivos">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Nome Original</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        &nbsp;
                    </div>

                    <div class='col-md-6'>
                        <div class="label-float">
                            <!--<input type="text" id="ds_obs_doc" name="ds_obs_doc" placeholder=" "/>-->
                            <!--<label for="agenda_ds_retorno">Observação:</label>-->
                            <textarea  class=" form-control form-control-file" id="ds_obs_doc" name="ds_obs_doc"></textarea>
                        </div>

                        <input type="hidden" name="ds_nome_original" id="ds_nome_original"/>
                        <input type="hidden" name="ds_documento" id="ds_documento"/>

                    </div>
                </div>
                <br>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cmdCancelarDocumento" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="cmdEnviarDocumento"  name="cmdEnviarDocumento">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>




<?
require_once "../inc/php/footer.php";
?>
