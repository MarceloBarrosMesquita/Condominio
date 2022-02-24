<script src="inc_proposta_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>

<div class="container">    
    <form id="form_proposta" class="form">
        <div class="modal fade bd-example-modal-lg" id="janela_proposta" data-backdrop='static'>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_contatosLabel">Novo Orçamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <input type='hidden' id='propostas_pk' name='propostas_pk'/>
                        <input type='hidden' id='agenda_visita_proposta_pk' name='agenda_visita_proposta_pk'/>
                        <input type='hidden' id='propostas_pai_pk' name='propostas_pai_pk'/>
                    </div>
                    <br>                    
                    <div class="modal-content bd-example-modal-lg-12">
                        <div class="modal-body" >   
                            <div class="row">                                
                                <div class='col-md-4'>
                                    <label for='dt_inicio'>Versão: </label>
                                    <label id="n_versao"></label>
                                </div>                                                                                
                            </div>                             
                            <br>
                            <!--div class='row'>
                                <div class='col-md-4'>
                                    &nbsp;
                                </div>
                                <div class='col-md-4'>
                                    <label for='ds_equipe'>Operadora:&nbsp;</label>
                                    <select class='form-control form-control-sm' id='operador_pk' name='operador_pk'>
                                        <option></option>
                                    </select>
                                </div>
                            </div-->
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblPropostaItens">
                                        <thead>
                                            <tr>
                                                <th>Cód</th>
                                                <th>Prod/Serv</th>
                                                <th>Qtde.Colab</th>
                                                <th>Qtde.Dias Semana</th>
                                                <th>Vl. Unitario</th>
                                                <th>Vl. Total</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">&nbsp;</th>                                                
                                                <th><div id='qtde_itens_proposta'></div></th>
                                                <th colspan="2"></th>                                                
                                                <th><div id='vl_total_proposta'></div></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>   
                                    </table>
                                </div>
                            </div>  
                            <div class='row'>
                                <div class='col-md-12' align="center"> 
                                    <button type="button" class="btn btn-primary" id="cmdIncluirPropostaItens" name="cmdIncluirPropostaItens">Incluir Itens</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">                               
                                <div class='col-md-4'>
                                    <label for='dt_envio'>Dt de Envio Cliente: </label>
                                    <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_envio' name='dt_envio'>
                                </div>
                                <div class='col-md-4'>
                                    <label for='dt_previsao_fechamento'>Dt Previsão Fechamento: </label>
                                    <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_previsao_fechamento' name='dt_previsao_fechamento'>
                                </div>  
                                <div class='col-md-4'>
                                    <label for='dt_inicio_contrato'>Fechar Orçamento:</label>
                                    <div class="text-left">
                                        <input type='checkbox'  maxlength="10"  id='dt_fechamento' name='dt_fechamento'>
                                    </div>
                                </div>  
                            </div>                 
                            <div class="row">                               
                                  
                                <div class='col-md-4'>
                                    <label for='dt_inicio_contrato'>Cancelar Orçamento:</label>
                                    <div class="text-left">
                                        <input type='checkbox'  maxlength="10"  id='dt_cancelamento' name='dt_cancelamento'>
                                    </div>
                                </div>  
                                <div class='col-md-4' id="exibir_motivo_cancelamento">
                                    <label for='dt_previsao_fechamento'>Motivo Cancelamento: </label>
                                    <input type='text' class='form-control form-control-sm' maxlength="10"  id='ds_obs_motivo_cancelamento' name='ds_obs_motivo_cancelamento'>
                                </div>
                            </div>                 
                            <div class="row">  
                                <div class='col-md-4'>
                                    <label for='dt_validade'>Dt Validade Orçamento: </label>
                                    <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_validade' name='dt_validade'>
                                </div>                                                                             
                            </div>
                            <div class="row">                               
                                <div class='col-md-12'>
                                    <label for='ds_obs_proposta'>Observação: </label>        
                                    <textarea  class=" form-control form-control-file" id="ds_obs_proposta" name="ds_obs_proposta"></textarea>
                                </div>                                                                 
                            </div>  
                            <div class='row'>
                                <div class='col-md-4'> 
                                    &nbsp;
                                </div>
                            </div>                          
                        </div>
                    </div>                   
                    <br>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cmdEnviarProposta"  name="cmdEnviarProposta">Salvar</button>
                        </div>
                    </div>  
                </div> 
            </div>
        </div>    
    </form>
</div>

