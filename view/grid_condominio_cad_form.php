<?
require_once "../inc/php/header.php";
?>
<script src="grid_condominio_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<style>
    /* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
.label-float{
  position: relative;
  padding-top: 13px;
}

.label-float input{
  border: 0;
  border-bottom: 2px solid lightgrey;
  outline: none;
  min-width: 350px;
  font-size: 16px;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -webkit-appearance:none;
  border-radius:0;
}

.label-float input:focus{
  border-bottom: 2px solid #3951b2;
}

.label-float input::placeholder{
  color:transparent;
}

.label-float label{
  pointer-events: none;
  position: absolute;
  top: 0;
  left: 0;
  margin-top: 13px;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
}

.label-float input:required:invalid + label{
  color: red;
}
.label-float input:focus:required:invalid{
  border-bottom: 2px solid red;
}
.label-float input:required:invalid + label:before{
  content: '*';
}
.label-float input:focus + label,
.label-float input:not(:placeholder-shown) + label{
  font-size: 13px;
  margin-top: 0;
  color: #3951b2;
}
    .titulo_calendario_anterior{
        background-color: #DFF0D8;
        border-bottom-style: solid;
        border-bottom-width: thin;
        font-weight: bold;
        text-align: center;
    }
    .titulo_grid_produto_servico{
        background-color: #c3c3c3;
        border-bottom-style: solid;
        border-bottom-width: thin;
        font-weight: bold;
        text-align: center;
    }
    .titulo_calendario_atual{
        background-color: #9fd3f6;
        border-bottom-style: solid;
        border-bottom-width: thin;
        font-weight: bold;
        text-align: center;
    }
    .titulo_calendario_seguinte{
        background-color: #FCF8E3;
        border-bottom-style: solid;
        border-bottom-width: thin;
        font-weight: bold;
        text-align: center;
    }
    .subtitulo_calendario{
        text-align: center;
    }
    .corpo{
        border-right-style: dashed;
        border-right-width: thin;        
    }
    .modal-content1{
        width: 1200px;
    }

</style>
<div id="loader"></div>
<div class="container-fluid" id="exibir" style="display:none">
    <p> 
   <div class="row">
        <div class="col-md-12">
            <h5><div class="ds_condominio" ></div></h5>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    
    <form method="post">
        <div class="modal-content" >
            <div class="modal-body">

                <div class="row" align="center">
                    <div class="col-md" >
                        <button type="button" class="btn" id="cmdPreviMes"  name="cmdPreviMes"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                        &nbsp;<label id="ds_mes"></label>&nbsp;
                        <button type="button" class="btn" id="cmdNextMes"  name="cmdNextMes"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>                    
                        <input type="hidden" id="ic_mes" value="ic_mes" >&nbsp;&nbsp; - &nbsp;&nbsp;
                        <button type="button" class="btn" id="cmdPreviAno"  name="cmdPreviAno"><i class="fa fa-chevron-left" aria-hidden="true"></i><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                        &nbsp;<label id="ano_pk"></label>&nbsp;
                        <input type="hidden" id="ds_ano" value="ds_ano" >
                        <button type="button" class="btn" id="cmdNextAno"  name="cmdNextAno"><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></button>                       
                    </div> 
                </div>
                <br>
                <div class="row col-md-12" align='center' >
                     <div class="col-md-4">
                        &nbsp;
                    </div> 
                    <div class="col-md-4 ">
                        <input type='hidden' id='intSemana'>
                        <input type='hidden' id='intMes'>
                        <input type='button' class="btn btn-primary" id='ic_exibir_por_mes' value='Mês'>&nbsp;&nbsp;&nbsp;
                        <input type='button' class="btn btn-primary" id='ic_exibir_por_semana' value='Semana'>
                        
                    </div> 

                    <div class="col-md-3">
                        &nbsp;
                    </div> 
                </div>
                <br>
                <div class="row col-md-12" align="center">
                    <div class="col-md-4">
                        &nbsp;
                    </div> 
                    <div class="col-md-1 " style="background-color:green;">
                        <div class="text-center" >
                            <font color="white"> Ponto</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:orange;">
                        <div class="text-center">
                             <font color="white">Falta</font> 
                        </div>
                    </div> 
                    <div class="col-md-1" style="background-color:yellow">
                        <div class="text-center">
                             Troca Escala
                        </div>
                    </div>                              
                    <div class="col-md-1"  style="background-color:salmon">
                        <div class="text-center">
                             <font color="white">Excluido</font> 
                        </div>
                    </div> 
                    <div class="col-md-3">
                        &nbsp;
                    </div> 
                </div>
                
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
                <div id="form_grid">
                    <input type="hidden" id="grid" style="display:none">
                    <div id="grid_dia_mes_semana"></div>
                </div>
            </div>
        </div>
        <div id="html_modal_painel"></div>
        <!-- Inicio janeja modal para edicao do registro -->
        <div class="modal fade bd-example-modal-lg" id="janela_escala" tabindex="-1" role="dialog" aria-labelledby="janela_contatosLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_contatosLabel">Alterar Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_contato">
                        <div class="modal-body">
                            
                            <input type='hidden' id='dias_semana_inclusao'  />
                            <input type='hidden' id='dia_semana_troca'  />
                            <input type='hidden' id='dt_base_inclusao_modal'  />
                            <input type='hidden' id='produtos_servicos_pk'  />
                            <input type='hidden' id='turnos_pk'  />
                            <input type='hidden' id='agenda_contratos_pk'  />
                            
                            
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="ds_colaborador_troca"></div>
                                </div>                                                                          
                            </div>
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="ds_re_troca"></div>
                                </div>                                                                          
                            </div>
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="hr_troca"></div>
                                </div>                                                                          
                            </div>
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="ds_funcao_troca"></div>
                                </div>                                                                          
                            </div>
                            <div class="row">
                                <div class='col-md'>
                                    <input type='hidden' id='colaborador_atual_pk'  />
                                    <input type='hidden' id='pausa_pk'  />
                                </div>
                            </div>
                            <br>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <br>
                            <div class="row">
                                <div class='col-md-4'>
                                    <label for='cargos_pk'>Motivo de Alteração: </label>
                                    <select class='form-control form-control-sm-8'  id='motivo_alteracao_pk' name='motivo_alteracao_pk' /><option></option></select>
                                </div>  
                            </div>
                            <div class='row' id="alert_motivo" style="display:none">
                                <div class='col-md-4'>
                                    <strong style="color: red">Por favor, informe Motivo de Alteração</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class='col-md-12'>
                                    <b>Data Execução</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md'>
                                    <label for='agenda_contratos_pk'>Dia Atual: </label>
                                    <div id='dt_base_modal' ></div>
                                </div>                 
                            </div>     
                            <!--div class="row">
                                <div class='col-md-4'>
                                    <label for='cargos_pk'>De: </label>
                                    <input type="text" class='form-control form-control-sm-6'  id='dt_novo_periodo_ini' name='dt_novo_periodo_ini' />
                                </div>
                                <div class='col-md-4'>
                                    <label for='cargos_pk'>Até: </label>
                                    <input type="text" class='form-control form-control-sm-6'  id='dt_novo_periodo_fim' name='dt_novo_periodo_fim' />
                                </div>
                            </div-->
                            <div class="row">
                                <div class='col-md-4'>
                                    <label for='cargos_pk'>Colaborador Substituto : </label>
                                    <select class='form-control form-control-sm-8'  id='colaboradores_pk' name='colaboradores_pk' /><option></option></select>
                                </div>
                                
                            </div>
                            <div class='row' id="alert_colaborador" style="display:none">
                                <div class='col-md-4'>
                                    <strong style="color: red">Por favor, informe Colaborador Substituto</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md'>
                                    <label for='cargos_pk'>Observação : </label>
                                    <textarea class='form-control form-control-sm'  id='ds_obs' name='ds_obs' ></textarea>
                                </div>
                                
                            </div>                                
                            
                            <div class="row">
                                <div class='col-md-12'>
                                    &nbsp;
                                </div>
                            </div>                                
                                
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="close" data-dismiss="modal" aria-label="Close">Fechar</button>
                            <button type="button" class="btn btn-primary" id="cmdIncluir" name="cmdIncluir">Salvar</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="janela_incluir_escala" tabindex="-1" role="dialog" aria-labelledby="janela_contatosLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_contatosLabel">Incluir Escala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_contato">
                        <div class="modal-body">
                            <div class="row">
                                <div class='col-md'>
                                    <input type='hidden' id='dt_inicio_ins'  />
                                    <input type='hidden' id='dia_semana_ins'  />
                                    <input type='hidden' id='colaborador_pk_ins'  />
                                    <input type='hidden' id='agenda_pk_ins'  />
                                    <input type='hidden' id='processos_etapas_pk_ins'  />
                                    <input type='hidden' id='contratos_itens_pk_ins'  />
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="ds_colaborador_ins"></div>
                                </div>                                                                          
                            </div>
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="ds_re_ins"></div>
                                </div>                                                                          
                            </div>
                            <div class="row">
                                <div class='col-md-12'>                                    
                                    <div id="ds_funcao_ins"></div>
                                </div>                                                                          
                            </div> 
                            <div class="row">
                                <div class='col-md'>
                                    <div id='dt_base_modal_ins' ></div>
                                </div>                 
                            </div>
                            <br>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <br> 
                            <div class='row'>
                                <div class='col-md-12 text-center' align="center">
                                    <table class="table table-striped table-bordered nowrap text-center" align="center" style="width:60%;align-content:center" id=''>
                                        <thead>
                                            <tr>
                                                <th colspan='2'><div id='ds_dia_semana_ins'></div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              
                                            <tr style=" background: #FFFFFF ">
                                                <td>Turno</td>
                                                <td>
                                                    <select class='form-control form-control-sm'  id='turnos_pk_ins' name='turnos_pk_ins'>
                                                        <option></option>
                                                    </select>
                                                </td> 
                                            </tr>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>HR Entrada</td>
                                                <td>
                                                    <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_turno_ins' id='hr_turno_ins' />
                                                </td>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>                            
                            
                            <div class="row">
                                <div class='col-md-12'>
                                    &nbsp;
                                </div>
                            </div>                                
                                
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="close" data-dismiss="modal" aria-label="Close">Fechar</button>
                            <button type="button" class="btn btn-primary" id="cmdIncluirEscala" name="cmdIncluirEscala">Salvar</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="janela_retornar_escala" tabindex="-1" role="dialog" aria-labelledby="janela_contatosLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_contatosLabel">Retornar Escala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_contato">
                        <div class="modal-body">
                            <div class="row">
                                <div class='col-md'>
                                    <input type='hidden' id='dt_inicio_inc'  />
                                    <input type='hidden' id='dia_semana_inc'  />
                                    <input type='hidden' id='colaborador_pk_inc'  />
                                </div>
                            </div>
                            <br>
                            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                            <br>
                            <div class="row">
                                <div class='col-md'>
                                    <label for='agenda_contratos_pk'><b>Dia Semana:</b> </label>
                                    <div id='ds_dia_semana' ></div>
                                </div>                 
                            </div>     
                            <div class="row">
                                <div class='col-md'>
                                    <label for='agenda_contratos_pk'><b>Dia Atual Escala:</b> </label>
                                    <div id='dt_base_modal_inc' ></div>
                                </div>                 
                            </div>     
                            <div class="row">
                                <div class='col-md'>
                                    <label for='agenda_contratos_pk'><b>Turno :</b> </label>
                                    <div id='ds_turno_inc' ></div>
                                </div>                 
                            </div>     
                            <div class="row">
                                <div class='col-md'>
                                    <label for='agenda_contratos_pk'><b>Hr Entrada :</b> </label>
                                    <div id='ds_hr_entrada_inc' ></div>
                                </div>                 
                            </div>     
                            <div class="row">
                                <div class='col-md'>
                                    <label for='agenda_contratos_pk'><b>Hr Saida :</b> </label>
                                    <div id='ds_hr_saida_inc' ></div>
                                </div>                 
                            </div>     
                            <div class="row">
                                <div class='col-md-12'>
                                    &nbsp;
                                </div>
                            </div>                                
                                
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="close" data-dismiss="modal" aria-label="Close">Fechar</button>
                            <button type="button" class="btn btn-primary" id="cmdRetornarEscala" name="cmdRetornarEscala">Salvar</button>
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
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_colaborador_tarefa"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_re_tarefa"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="hr_tarefa"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_funcao_tarefa"></div>
                            </div>                                                                          
                        </div>
                        <br>
                        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                        <br>
                        <input type="hidden" id="ic_dia">
                        <input type="hidden" id="agendas_pk">
                        <input type="hidden"  class='form-control form-control-sm' id='dt_execucao' maxlength="10" name='dt_execucao'>
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
                        <br>
                        <div class="row">                                                                        
                            <div class='col-md-4'>
                                <label for='dt_fim_agenda'>Tarefa Recorrente: </label>
                                
                            </div>                                           
                            <div class='col-md-2'>
                                <input type="checkbox"   id='ic_tarefa_recorrente'name='ic_tarefa_recorrente'>
                            </div>                                           
                        </div>
                        
                    </div>
                    <div class="row">                                                                        
                        <div class='col-md-5'>
                            &nbsp;
                        </div>                                           
                        <div class='col-md-2'>
                            <button type="button"  class="btn btn-primary" id='btntarefa' >Incluir</button>
                        </div>                                           
                    </div>
                    <div class="container">    
                        <div class="row" id="ic_grid">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered nowrap " style="width:100%;" id="tblTarefa">
                                    <thead >
                                        <tr>
                                        <th>Código</th>
                                        <th>Tarefa</th>
                                        <th>Obs Tarefa</th>
                                        <th>Data Exec.</th>
                                        <th>hora inicio</th>
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
        <div class="modal fade bd-example-modal-lg" id="modal_ponto">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_agendaLabel">Ponto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container ">
                        <input type="hidden"  id='dia_semana_ponto' name='dia_semana_ponto'>
                        <input type="hidden"  id='colaborador_ponto_pk' name='colaborador_ponto_pk'>
                        <input type="hidden"  id='dt_escala_ponto' name='dt_escala_ponto'>
                        
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_colaborador_ponto"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_re_ponto"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="hr_ponto"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_funcao_ponto"></div>
                            </div>                                                                          
                        </div>
                        
                        <br>
                        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    
                        <br>
                        <div class="row">                                                                        
                            <div class='col-md-12'>
                                <label for='dt_fim_agenda'>Hora Automática Sistema: </label>
                                <input type="checkbox"  id='ic_hr_sistema' name='ic_hr_sistema'>
                            </div>                                           
                        </div>
                        <div class="row">                                                                        
                            <div class='col-md-5'>
                                <label for='dt_fim_agenda'>Hora Entrada Manual: </label>
                                <input type="text"  class='form-control form-control-sm' id='hr_entrada_manual' maxlength="5" name='hr_entrada_manual'>
                            </div>                                           
                        </div>
                        <div class="row">                                                                        
                            <div class='col-md-12'>
                                <label for='dt_fim_agenda'>Falta: </label>
                                <input type="checkbox"  id='ic_falta' name='ic_falta'>
                            </div>                                           
                        </div>
                        <div class="row">                               
                            <div class='col-md-5'>
                                <label for='dt_fim_agenda'>Motivo Falta: </label>
                                <select  class='form-control form-control-sm' id='motivo_falta_pk' name='motivo_falta_pk'>
                                    <option></option>
                                    <option value="1">Falta sem justificativa</option>
                                    <option value="2">Atestado</option>
                                </select>
                            </div>                                                                                    
                        </div>
                        <div class="row">                               
                            <div class='col-md-12'>
                                <label for='dt_fim_agenda'>Obs: </label>
                                <textarea  class='form-control form-control-sm' id='obs_ponto' name='obs_ponto'></textarea>
                            </div>                                                                                    
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                         <a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>
                          <button type="button"  class="btn btn-primary" id='btnPonto' >Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modal_exclusao">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_agendaLabel">Excluir Escala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container ">
                        <input type="hidden"  id='turnos_exclusao_pk' name='turnos_exclusao_pk'>
                        <input type="hidden"  id='colaborador_exclusao_pk' name='colaborador_exclusao_pk'>
                        <input type="hidden"  id='dt_base_exclusao' name='dt_base_exclusao'>
                        <input type="hidden"  id='dia_semana_exclusao' name='dia_semana_exclusao'>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_colaborador_excluir"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_re_excluir"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="hr_excluir"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_funcao_excluir"></div>
                            </div>                                                                          
                        </div>
                        <br>
                        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                        <br>
                        <div class="row">                               
                            <div class='col-md-5'>
                                <label for='dt_fim_agenda'>Motivo Exclusão: </label>
                                <select  class='form-control form-control-sm' id='motivo_exclusao_pk' name='motivo_exclusao_pk'>
                                    <option></option>
                                    <option value="1">Posto de trabalho cancelado</option>
                                    <option value="2">Duplicidade</option>
                                    <option value="3">Escala data Errada</option>
                                </select>
                            </div>                                                                                    
                        </div>
                        <div class="row">                               
                            <div class='col-md-12'>
                                <label for='dt_fim_agenda'>Obs: </label>
                                <textarea  class='form-control form-control-sm' id='ds_obs_exclusao' name='ds_obs_exclusao'></textarea>
                            </div>                                                                                    
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                         <a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>
                          <button type="button"  class="btn btn-primary" id='btnExclusao' >Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modal_folga">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="janela_agendaLabel">Folga Escala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container ">
                        <input type="hidden"  id='turnos_folga_pk' name='turnos_folga_pk'>
                        <input type="hidden"  id='colaborador_folga_pk' name='colaborador_folga_pk'>
                        <input type="hidden"  id='dt_base_folga' name='dt_base_folga'>
                        <input type="hidden"  id='dia_semana_folga' name='dia_semana_folga'>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_colaborador_folga"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_re_folga"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="hr_folga"></div>
                            </div>                                                                          
                        </div>
                        <div class="row">
                            <div class='col-md-12'>                                    
                                <div id="ds_funcao_folga"></div>
                            </div>                                                                          
                        </div>
                        <br>
                        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                        <br>
                        <div class="row">                               
                            <div class='col-md-5'>
                                <label for='dt_fim_agenda'>Motivo Folga: </label>
                                <select  class='form-control form-control-sm' id='motivo_folga_pk' name='motivo_folga_pk'>
                                    <option></option>
                                    <option value="1">Consulta Médica</option>
                                    <option value="2">Outro motivo folga</option>
                                    <option value="3">Escala data Errada</option>
                                </select>
                            </div>                                                                                    
                        </div>
                        <div class="row">                               
                            <div class='col-md-12'>
                                <label for='dt_fim_agenda'>Obs: </label>
                                <textarea  class='form-control form-control-sm' id='ds_obs_folga' name='ds_obs_folga'></textarea>
                            </div>                                                                                    
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                         <a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>
                          <button type="button"  class="btn btn-primary" id='btnAtribuirFolga' >Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog" aria-labelledby="janela_contatosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content bd-example-modal-lg-12" style="width:1200px; height: 650px;">
                <div class="modal-body">
                    <div class="modal-body-agenda" ></div>  
                </div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="close" data-dismiss="modal" aria-label="Close">Fechar</button>
                </div>  
                
            </div>
        </div>
    </div>     
                    
          
    <!--MODAL AGENDA COLABORADOR-->               
</div>
<?
require_once "../inc/php/footer.php";
?>
