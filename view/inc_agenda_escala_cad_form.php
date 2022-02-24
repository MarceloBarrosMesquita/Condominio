<script src="inc_agenda_escala_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<div class="container">    
    <form id="form_agenda" class="agenda">
        <div class="modal fade bd-example-modal-lg " id="janela_agendas">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_agendaLabel">Nova Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                    <form id="form_contato">
                        <div class="modal-body" >
                            <h5>Selecione o Posto de Trabalho</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class="row">
                                <div class='col-md-4'>
                                    <label for='agenda_contratos_pk'>Posto de Trabalho: </label>
                                    <select class='form-control form-control-sm'  id='leads_pk_agenda' name='leads_pk_agenda' >
                                        <option><option>
                                    </select>
                                </div>    
                            </div> 
                            <br>
                            <h5>Selecione o contrato</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class="row">
                                <div class='col-md-4'>
                                    <label for='agenda_contratos_pk'>Contrato: </label>
                                    <select class='form-control form-control-sm'  id='agenda_contratos_pk' name='agenda_contratos_pk' >
                                        <option><option>
                                    </select>
                                </div>    
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                           <div id="grid_itens_contrato"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <br>
                            <h5>Data Inicio e Fim da Escala</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class="row">
                                <!--div class='col-md-4'>
                                    <label for='ds_agenda'>Agenda: </label-->
                                    <input type='hidden' class='form-control form-control-sm'  id='agenda_colaborador_padrao_pk' name='agenda_colaborador_padrao_pk'>
                                    <input type='hidden' class='form-control form-control-sm'  id='agenda_verifcar_qtde_dias_contrato' name='agenda_verifcar_qtde_dias_contrato'>
                                    <input type='hidden' class='form-control form-control-sm'  id='agenda_contratos_itens_pk' name='agenda_contratos_itens_pk'>
                                    <input type='hidden' class='form-control form-control-sm'  id='qtde_dias_item' name='qtde_dias_item'>
                                    <div id="exibir_variavel_processo" style="display:none">
                                        <input type='hidden' class='form-control form-control-sm'  id='processos_etapas_pk_2' name='processos_etapas_pk_2' >
                                    </div>
                                
                                <!--/div-->
                                <div class='col-md-4'>                                    
                                    <label for='dt_inicio_agenda'>Data Início: </label>
                                    <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_inicio_agenda' name='dt_inicio_agenda'>
                                </div>                                
                                <div class='col-md-4'>
                                    <label for='dt_fim_agenda'>Data Fim: </label>
                                    <input type='text' class='form-control form-control-sm' maxlength="10"  id='dt_fim_agenda' name='dt_fim_agenda'>
                                </div>                                           
                            </div> 
                            <p> 
                            <div id="exibir_cancelamento" style="display:none">
                                <h5>Cancelamento Escala</h5>
                                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <label for='cargos_pk'>Data Cancelamento: </label>
                                        <input class='form-control form-control-sm'  id='dt_cancelamento_agenda_escala' name='dt_cancelamento_agenda_escala' />
                                    </div>

                                </div> 
                                <div class="row">
                                    <div class='col-md-6'>
                                        <label for='cargos_pk'>Motivo Cancelamento: </label>
                                        <textarea class='form-control form-control-sm'  id='ds_motivo_cancelamento' name='ds_motivo_cancelamento' /></textarea>
                                    </div>

                                </div>
                                <p>
                            </div>
                            <br>
                            <h5>Selecione um serviço</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class="row">
                                <div class='col-md-4'>
                                    <label for='cargos_pk'>Produtos/Serviços: </label>
                                    <select class='form-control form-control-sm'  id='agenda_produtos_servicos_pk' name='agenda_produtos_servicos_pk' /><option></option></select>
                                </div>
                                <div class='col-md-8' >
                                    <div id="dias_por_servico"></div>
                                </div>  
                            </div>   
                             <br>                                            
                            <h5>Selecione o colaborador para serviço</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class="row">
                                <div class='col-md-5' >
                                    <label for='colaboradores_pk_agenda'>Colaboradores: </label>
                                    <select class='form-control form-control-sm'  id='agenda_colaboradores_pk' name='agenda_colaboradores_pk' />
                                        <option></option>
                                    </select>
                                </div>   
                                  
                            </div> 
                            <br>
                            <h5>Informe os dias e turno da escala</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                             <div class="row">
                                <div class='col-md-5' >
                                    <label for='colaboradores_pk_agenda'>Inverter Folga semana seguinte ?</label>
                                    <input type="checkbox" id="ic_folga_inverter" name="ic_folga_inverter">
                                </div> 
                            </div> 
                            <div class="row">
                                <div class='col-md-5' >
                                    <label for='colaboradores_pk_agenda'>Tipo Escala:</label>
                                    <select class='form-control form-control-sm-3' id="tipo_escala" name="tipo_escala">
                                        <option ></option>
                                        <option value="1">Impar</option>
                                        <option value="2">Par</option>
                                    </select>
                                </div> 
                            </div> 
                            <br>
                            <h5>Horários/Turnos</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class="row">
                                <div class='col-md-3' >
                                    <label for='colaboradores_pk_agenda'>Turno: </label>
                                    <select class='form-control form-control-sm'  id='turno_base_agenda_pk' name='turno_base_agenda_pk' />
                                        <option></option>
                                    </select>
                                </div>   
                            </div> 
                            <div class="row">
                                <div class='col-md-4' >
                                    <label for='colaboradores_pk_agenda'>HR Entrada: </label>
                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_inicio_expediente' id='hr_inicio_expediente' />
                                </div>   
                                <div class='col-md-4' >
                                    <label for='colaboradores_pk_agenda'>HR Saída: </label>
                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_termino_expediente' id='hr_termino_expediente' />
                                </div>   
                            </div> 
                            <div class="row">
                                <div class='col-md-4' >
                                    <label for='colaboradores_pk_agenda'>HR Saída Intervalo (Almoço): </label>
                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_intervalo' id='hr_saida_intervalo' />
                                </div>   
                                <div class='col-md-4' >
                                    <label for='colaboradores_pk_agenda'>HR Retorno Intervalo: </label>
                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_retorno_intervalo' id='hr_retorno_intervalo' />
                                </div>   
                            </div> 
                            <div class="row">
                                <div class='col-md-8' >
                                    <label for='colaboradores_pk_agenda'>Preencher Automático o grid de Escala ?</label>
                                    <input type="checkbox" id="ic_preenchimento_automatico" name="ic_preenchimento_automatico">
                                </div> 
                            </div> 
           
                            
                            <br>
                            <h5>Quadro de escala</h5>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <table class="table table-striped table-bordered nowrap" style="width:100%" id='tblAgendaTurno'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Domingo</th>
                                                <th>Segunda</th>
                                                <th>Terça</th>
                                                <th>Quarta</th>
                                                <th>Quinta</th>
                                                <th>Sexta</th>
                                                <th>Sabado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style=" background: #BFEFFF ">
                                                <td><b>Folga</b></td>
                                                <td>
                                                    <input type='checkbox' name='ic_dom_folga' id='ic_dom_folga' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_seg_folga' id='ic_seg_folga' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_ter_folga' id='ic_ter_folga' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_qua_folga' id='ic_qua_folga' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_qui_folga' id='ic_qui_folga' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_sex_folga' id='ic_sex_folga' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_sab_folga' id='ic_sab_folga' />
                                                </td>
                                            </tr>
                                            <tr style=" background: #EEEEEE ">
                                                <td><b>Escala</b></td>
                                                <td>
                                                    <input type='checkbox' name='ic_dom' id='ic_dom' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_seg' id='ic_seg' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_ter' id='ic_ter' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_qua' id='ic_qua' />
                                                </td>
                                                <td  >
                                                    <input type='checkbox' name='ic_qui' id='ic_qui' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_sex' id='ic_sex' />
                                                </td>
                                                <td>
                                                    <input type='checkbox' name='ic_sab' id='ic_sab' />
                                                </td>
                                            </tr>   
                                            <tr style=" background: #FFFFFF ">
                                                <td>Turno</td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='dom_turnos_pk' name='dom_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='seg_turnos_pk' name='seg_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='ter_turnos_pk' name='ter_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='qua_turnos_pk' name='qua_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='qui_turnos_pk' name='qui_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='sex_turnos_pk' name='sex_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='sab_turnos_pk' name='sab_turnos_pk'>
                                                        <option></option>
                                                    </select>
                                                </td>
                                            </tr>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>HR Entrada Expediente</td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_dom' id='hr_turno_dom' />
                                                </td>
                                                <td>
                                                    <input   class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_seg' id='hr_turno_seg' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_ter' id='hr_turno_ter' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_qua' id='hr_turno_qua' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_qui' id='hr_turno_qui' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_sex' id='hr_turno_sex' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_sab' id='hr_turno_sab' />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HR Saida Intervalo</td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_dom' id='hr_intervalo_dom' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_seg' id='hr_intervalo_seg' />
                                                </td>
                                                <td>
                                                    <input   class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_ter' id='hr_intervalo_ter' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_qua' id='hr_intervalo_qua' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_qui' id='hr_intervalo_qui' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_sex' id='hr_intervalo_sex' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_sab' id='hr_intervalo_sab' />
                                                </td>                                               
                                            </tr>
                                            <tr>
                                                <td>HR Retorno Intervalo</td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_dom' id='hr_intervalo_saida_dom' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_seg' id='hr_intervalo_saida_seg' />
                                                </td>
                                                <td>
                                                    <input   class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_ter' id='hr_intervalo_saida_ter' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_qua' id='hr_intervalo_saida_qua' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_qui' id='hr_intervalo_saida_qui' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_sex' id='hr_intervalo_saida_sex' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_intervalo_saida_sab' id='hr_intervalo_saida_sab' />
                                                </td>                                               
                                            </tr>
                                            <tr>
                                                <td>HR Saida Expediente</td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_dom_saida' id='hr_turno_dom_saida' />
                                                </td>
                                                <td>
                                                    <input   class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_seg_saida' id='hr_turno_seg_saida' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_ter_saida' id='hr_turno_ter_saida' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_qua_saida' id='hr_turno_qua_saida' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_qui_saida' id='hr_turno_qui_saida' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_sex_saida' id='hr_turno_sex_saida' />
                                                </td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_sab_saida' id='hr_turno_sab_saida' />
                                                </td>                                                
                                            </tr>
                                            
                                            <!--tr>
                                                <td>Tarefa</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_dom' name='btn_modal_tarefa_dom' >Incluir</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_seg' name='btn_modal_tarefa_seg'>Incluir</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_ter' name='btn_modal_tarefa_ter' >Incluir</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_qua' name='btn_modal_tarefa_qua'>Incluir</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_qui' name='btn_modal_tarefa_qui' >Incluir</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_sex' name='btn_modal_tarefa_sex' >Incluir</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id='btn_modal_tarefa_sab' name='btn_modal_tarefa_sab' >Incluir</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a class="btn" id="btn_historico_dom" name="btn_historico_dom">Ver</a>
                                                </td>
                                                <td>
                                                    <a class="btn" id="btn_historico_seg" name="btn_historico_seg">Ver</a>
                                                </td>
                                                <td>
                                                    <a class="btn" id="btn_historico_ter" name="btn_historico_ter">Ver</a>
                                                </td>
                                                <td>
                                                    <a class="btn" id="btn_historico_qua" name="btn_historico_qua">Ver</a>
                                                </td>
                                                <td>
                                                    <a class="btn" id="btn_historico_qui" name="btn_historico_qui">Ver</a>
                                                </td>
                                                <td>
                                                    <a class="btn" id="btn_historico_sex" name="btn_historico_sex">Ver</a>
                                                </td>
                                                <td>
                                                    <a class="btn" id="btn_historico_sab" name="btn_historico_sab">Ver</a>
                                                </td>
                                            </tr-->
                                           
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div id="alert" style="display:none" >
                                <strong style="color: red">Selecione o Turno / HR Entrada</strong>
                            </div>
                            <div id="exibir_checkbox" style="display:none">
                                <h5>Próxima Semana</h5>
                                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                                <br>
                                <div class="row" >
                                    <div class='col-md-8'>
                                        <label for='cargos_pk'>Não Repetir Prox. Semana: </label>
                                        <input type="checkbox"  id='ic_nao_repetir' name='ic_nao_repetir' />
                                    </div> 
                                </div>  
                            </div>  
                            <div id="combo_nao_repetir"></div>
                             
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cmdEnviarAgenda"  name="cmdEnviarAgenda" >Salvar</button>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="modal fade bd-example-modal-lg" id="modal_tarefa">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_agendaLabel">Atribuir Tarefa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container ">
                        <input type="hidden" id="ic_dia">
                        <div class="row">
                            <div class='col-md-7'>                                    
                                <label for='dt_inicio_agenda'>Tarefa: </label>
                                <input type='text' class='form-control form-control-sm' id='ds_tarefa' name='ds_tarefa'>
                            </div>                                                                          
                        </div>
                        <div class="row">                                                                        
                            <div class='col-md-4'>
                                <label for='dt_fim_agenda'>Hora Início: </label>
                                <input type="text"  class='form-control form-control-sm' id='hr_inicio' maxlength="5" name='hr_inicio'>
                            </div>                                           
                        </div>
                        <div class="row">                               
                            <div class='col-md-7'>
                                <label for='dt_fim_agenda'>Obs Tarefa: </label>
                                <textarea  class='form-control form-control-sm' id='obs_tarefa' name='obs_tarefa'></textarea>
                            </div>                                                                                    
                        </div>
                        
                    </div>
                    <div class="container">    
                        <div class="row" id="ic_grid">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered nowrap " style="width:100%;display:none" id="tblTarefa">
                                    <thead >
                                        <tr>
                                        <th>Código</th>
                                        <th>Tarefa</th>
                                        <th>Obs Tarefa</th>
                                        <th>hora inicio</th>
                                        <th>ic_dia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                      
                    </div>
                    <div class="modal-footer">
                         <a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>
                          <button type="button"  class="btn btn-primary" id='btntarefa' >Incluir</button>
                    </div>
                </div>
            </div>
        </div>   
        <div class="modal fade" id="modal_historico_tarefa">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_agendaLabel">Histórico Tarefa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">   
                        <input type="hidden" id="ic_dia_historico">
                        <div class="row" id="ic_grid">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered nowrap " style="width:100%" id="tblHistoricoTarefa">
                                    <thead >
                                        <tr>
                                        <th>Cód</th>
                                        <th>Tarefa</th>
                                        <th>Obs Tarefa</th>
                                        <th>Hr. Inicio</th>
                                        <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                      
                    </div>
                    <div class="modal-footer">
                         <a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>
                    </div>
                </div>
            </div>
        </div>   
    </form>
</div>                    