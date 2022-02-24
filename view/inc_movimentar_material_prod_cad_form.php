

<script src="inc_movimentar_material_prod_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
    <div class="modal fade bd-example-modal-lg" id="janela_materiais" >
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="janela_contatosLabel">Movimentar Material</h5>
                <button type="button" class="close fechar_modal_movimentacao"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                
                <div class="row">
                    <div class="col-md-2">
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for="fornecedor_pk">Grupo Para Movimentação:&nbsp;</label>
                        <select class="form-control form-control-sm chzn-select" id="grupo_para_movimentacao_ins_pk">
                            <option></option>
                            <option value="1">Colaborador(es)</option>
                            <option value="2">Posto(s) de Trabalho</option>
                        </select>
                    </div>
                </div>
                <div class='row' id="alert_grupo_para_movimentacao" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, selecione Grupo Para Movimentação</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for="fornecedor_pk"><span id='str_opc_ins'></span>&nbsp;</label>
                        <select class="form-control form-control-sm chzn-select" id="movimentar_para_pk">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class='row' id="alert_movimentar_colaborador" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, selecione Colaborador(es)</strong>
                    </div>
                </div>
                <div class='row' id="alert_movimentar_lead" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, selecione Posto(s) de Trabalho</strong>
                    </div>
                </div>
                
                    <input type='hidden' class='form-control form-control-sm'  id='count_material' name='count_material'>
                    <input type='hidden' class='form-control form-control-sm'  id='movimentacao_estoque_pk' name='movimentacao_estoque_pk'>
                    <input type='hidden' class='form-control form-control-sm'  id='conjunto_material_pk' name='conjunto_material_pk'>
                    <input type='hidden' class='form-control form-control-sm'  id='acao' name='acao'>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for='processos_pk'>Descrição Conjunto Material:&nbsp;</label>
                        <input class="form-control form-control-sm" id="ds_conjunto_material" name="ds_conjunto_material">    
                    </div>
                </div> 
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for='processos_pk'>Categoria:&nbsp;</label>
                        <select class='form-control form-control-sm chzn-select'  id='categorias_produto_pk' name='categorias_produto_pk' />
                            <option></option>
                        </select>    
                    </div>
                </div> 
                <div class='row' id="alert_categoria" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, selecione Categoria</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for='processos_pk'>Produtos:&nbsp;</label>
                        <select class='form-control form-control-sm chzn-select'  id='produtos_pk' name='produto_pk' requered/>
                            <option></option>
                        </select>    
                    </div>
                </div>
                <div class='row' id="alert_produto" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, selecione Produto</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <label for='processos_pk'>Quantidade:&nbsp;</label>
                        <input type="text" class='form-control form-control-sm'  id='qtde_materias' name='qtde_materias'/>  
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <label for='processos_pk'>Materiais:&nbsp;</label>
                        <select class='form-control form-control-sm chzn-select'  id='produtos_itens_pk' name='produtos_itens_pk' requered/>
                            <option></option>
                        </select>    
                    </div>
                </div>
                <div class='row' id="alert_produtos_itens_pk" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-6'>
                        <strong style="color: red">Por favor, selecione Materiais</strong>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Data Entrega:&nbsp;</label>
                        <input type='text' class=" form-control form-control-file" id="dt_entrega" name="dt_entrega"/>
                    </div>
                </div>
                <div class='row' id="alert_dt_entrega" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <strong style="color: red">Por favor, selecione Materiais</strong>
                    </div>
                </div>
                <div class='row' id="div_dt_devolucao" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Data Devolução:&nbsp;</label>
                        <input type='text' class=" form-control form-control-file" id="dt_devolucao" name="dt_devolucao"/>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Material Carga:&nbsp;</label>
                        <input type='checkbox'  id="ic_mateiral_carga" name="ic_mateiral_carga"/>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <label for='processos_pk'>Observação:&nbsp;</label>
                        <textarea class=" form-control form-control-file" id="observacao_material" name="observacao_material"></textarea>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-12" >
                        <button type='button' class="btn btn-primary" id='cmdIncluirMaterial'>Incluir Material</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                         <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblMaterial">
                            <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Categoria</th>
                                    <th>Categoria Pk</th>
                                    <th>Produto</th>
                                    <th>Produto Pk</th>
                                    <th>Material</th>
                                    <th>Material Pk</th>
                                    <th>DT Entrega</th>
                                    <th>DT Devolução</th>
                                    <th>Obs</th>
                                    <th>M.CargaPK</th>
                                    <th>M.Carga</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
            <br>  
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fechar_modal_movimentacao" id='fechar_modal_movimentacao'>Fechar</button>
                <button type="button" class="btn btn-primary" id="cmdEnviarMateriais"  name="cmdEnviarMateriais">Enviar</button>
            </div>
            </div>
        </div>
    </div>  