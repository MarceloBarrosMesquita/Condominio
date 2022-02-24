<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<div class="container">
    <form id="form_contrato" class="form">
        <!-- Inicio janeja modal para CONTRATOS -->
        <div class="modal fade bd-example-modal-lg"  id="janela_contratos">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_contratosLabel">Novo Contrato / Aditivos / Serviços Extras</h5>
                        <button type="button" class="close" onclick='fcFecharModalContrato()' aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_contato">
                        <div class="modal-content bd-example-modal-lg-12">
                            <div class="modal-body" >                                    
                                <div class="row">
                                    <div class='col-md-4'>
                                        <label for='ic_contrato'>Empresa:&nbsp;</label>
                                        <select id="empresas_pk" name="empresas_pk" class="form-control form-control-sm chzn-select">
                                        </select>
                                    </div>                                                             
                                </div>
                                <div class='row' id="alert_empresa" style="display:none">
                                    
                                    <div class='col-md-4'>
                                        <strong style="color: red">Por favor, selecione Empresa</strong>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <label for='ic_contrato'>Posto de Trabalho:&nbsp;</label>
                                        <select id="leads_pk_cad_form" name="leads_pk_cad_form" class="form-control form-control-sm chzn-select">
                                        </select>
                                        <input type='hidden'  id="processos_pk_cad_form" name="processos_pk_cad_form"/>
                                        <input type='hidden'  id="processos_etapas_pk_1" name="processos_etapas_pk_1"/>
                                    </div>                                                             
                                </div>
                                <div class='row' id="alert_posto" style="display:none">
                                    
                                    <div class='col-md-4'>
                                        <strong style="color: red">Por favor, selecione Posto de Trabalho</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class='col-md-8'>
                                        <label for='ic_contrato'><b>Tipo de Contrato(s) / Serviços Extras</b>&nbsp;</label>
                                    </div>                                                             
                                </div>
                                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                <br>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <label for='ic_contrato'>Contrato Novo:&nbsp;</label>
                                        <input type='radio'  id="ic_contrato" name="ic_contrato"/>
                                    </div>                                                             
                                    
                                </div>
                                <div class="row">                                                           
                                    <div class='col-md-5'>
                                        <label for='ic_aditivo'>Contrato Aditivo:&nbsp;</label>
                                        <input type='radio'  id="ic_aditivo" name="ic_aditivo"/>
                                    </div>
                                    <div class='col-md-5' id="exib_contrato_pai">
                                        <label for='contrato_pai_pk'>Contrato Original: </label>

                                        <select class='form-control form-control-sm'  id='contrato_pai_pk' name='contrato_pai_pk'>
                                            <option></option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="row" id="exib_contrato_pai">                                                           
                                    <div class='col-md-5'>
                                        <label for='ic_aditivo'>Serviço Extra:&nbsp;</label>
                                        <input type='radio'  id="ic_servico_extra" name="ic_servico_extra"/>
                                    </div>
                                    
                                </div>
                                <div class="row">                                                         
                                    <div class='col-md-2'>
                                       &nbsp;
                                       <div id="input"></div>
                                    </div>
                                    <div class='col-md-4' id="alert_contrato_pai" style="display:none" >
                                        <strong style="color: red">Selecione o Contrato Original</strong>
                                    </div>
                                </div>
                                <br>
                                
                                
                                <div id='exibir_servico_extra'>
                                    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                    <br>
                                    <div class="row">
                                        <div class='col-md-4'>
                                            <label for='ic_contrato'>Lançar no Financeiro:&nbsp;</label>
                                            <select class='form-control form-control-sm chzn-select'  id='ic_lancar_financeiro' name='ic_lancar_financeiro'>
                                                <option></option>
                                                <option value="1">Sim</option>
                                                <option value="2">Não</option>
                                            </select>
                                        </div> 
                                        <div class='col-md-4'>
                                            <label for='vl_lancamento' class='metodo_recebimento_pagamento'>Método Pagamento</label>
                                            <select class='form-control form-control-sm chzn-select'  id='metodos_pagamento_pk' name='metodos_pagamento_pk'/>
                                                <option ></option>
                                            </select> 
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class='col-md-8'>
                                            <label for='ic_contrato'><b>Dados de Faturamento</b>&nbsp;</label>
                                        </div>                                                             
                                    </div>
                                    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                    <br>
                                    <div class="row">
                                        <div class='col-md-4'>
                                            <label for='ic_contrato'>Qtde Parcelas:&nbsp;</label>
                                            <div id="combo_qtde_parcelas_pk"></div>
                                        </div>                                                             
                                    </div>
                                    <br>
                                    <span id='contrato_dados_fatura'></span>
                                </div>
                                
                                
                                
                                <div id='exibir_cancelamento' style='display:none'>
                                    <br>
                                    <div class="row">
                                        <div class='col-md-8'>
                                            <label for='ic_contrato'><b>Cancelamento Contrato</b>&nbsp;</label>
                                        </div>                                                             
                                    </div>
                                    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                    <br>
                                    <div class='row'>
                                        <div class="col-md-2">
                                            <label for='dt_inicio_contrato'>Cancelar :</label>
                                            <input type='checkbox'  maxlength="10"  id='dt_cancelamento_contrato' name='dt_cancelamento_contrato'>
                                        </div>
                                        <div class='col-md-4' id="exibir_motivo_cancelamento_contrato">
                                            <label for='dt_previsao_fechamento'>Motivo Cancelamento: </label>
                                            <input type='text' class='form-control form-control-sm' maxlength="10"  id='ds_obs_motivo_cancelamento_contrato' name='ds_obs_motivo_cancelamento_contrato'>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class='col-md-8'>
                                        <label for='ic_contrato'><b>Período Contrato</b>&nbsp;</label>
                                    </div>                                                             
                                </div>
                                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                <br>
                                <div class="row">

                                    <input type='hidden' class='form-control form-control-sm'  id='contratos_pk' name='contratos_pk'>

                                    <div class='col-md-4'>
                                        <label for='dt_inicio_contrato'>Data Início: </label>

                                        <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_inicio_contrato' name='dt_inicio_contrato'>
                                    </div>
                                    <div class='col-md-4'>
                                        <label for='dt_fim_contrato'>Data Fim: </label>
                                        <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_fim_contrato' name='dt_fim_contrato'>
                                    </div>                                                   
                                </div>
                                <div class='row' id="alert_data" style="display:none">
                                    
                                    <div class='col-md-8'>
                                        <strong style="color: red">Por favor, Informe Data Início de Fim</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class='col-md-8'>
                                        <label for='ic_contrato'><b>Serviços a serem prestados</b>&nbsp;</label>
                                    </div>                                                             
                                </div>
                                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                <br>
                                <div class='row'>
                                    <div class='col-md-12' align="left"> 
                                        <button type="button" class="btn btn-primary" id="cmdIncluirContratosItens" name="cmdIncluirContratosItens">Incluir Serviço</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblContratoItens">
                                            <thead>
                                                <tr>
                                                    <th>Cód</th>
                                                    <th>Prod/Serv</th>
                                                    <th>Qtde</th>
                                                    <th>Período</th>
                                                    <th>Escala</th>
                                                    <th>Vl. Unit</th>
                                                    <th>Vl. Total</th>
                                                    <th>Vl. Mão Obra</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="7">&nbsp;</th>                                                                                              
                                                <th><div id='vl_total_mao_obra'></div></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot> 
                                        </table>
                                    </div>
                                </div>
                                
                                <div class='row'>
                                    <div class='col-md-4'> 
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-8'>
                                        <label for='ic_contrato'><b>Produtos e Materiais</b>&nbsp;</label>
                                    </div>                                                             
                                </div>
                                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                <?php  include("inc_movimentar_material_prod_res_form.php"); ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick='fcFecharModalContrato()'>Fechar</button>
                                    <button type="button" class="btn btn-primary" id="cmdEnviarContrato"  name="cmdEnviarContrato">Salvar</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </form>
</div> 
