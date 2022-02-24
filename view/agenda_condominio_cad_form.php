<?
require_once "../inc/php/header.php";
?>
<script src="agenda_condominio_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
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
            <h5>AGENDA DE ESCALAS</h5>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    
    <p>
    <div class="row">
        <div class="col-md-12">
            <h5><div class="ds_condominio" ></div></h5>
        </div>
    </div>
    <form method="post">
        <div class="row">
            <div class="col-md-2" align="center">
                <div class='row'>
                    <table class='table' style='width:100%' id='tblResultado'>
                        <tbody>
                            <tr>
                                <td width='30%'><label for='dt_agenda'>Data Base:&nbsp;</label></td>
                                <td >
                                    <input type='text' class='form-control form-control-sm-10' maxlength="10"  id='dt_agenda' name='dt_agenda' value="">                
                                    <input type='hidden' id='dia_semana_dom_passada'  />
                                    <input type='hidden' id='dia_semana_seg_passada'  />
                                    <input type='hidden' id='dia_semana_ter_passada'  />
                                    <input type='hidden' id='dia_semana_qua_passada'  />
                                    <input type='hidden' id='dia_semana_qui_passada'  />
                                    <input type='hidden' id='dia_semana_sex_passada'  />
                                    <input type='hidden' id='dia_semana_sab_passada'  />

                                    <input type='hidden' id='dia_semana_dom'  />
                                    <input type='hidden' id='dia_semana_seg'  />
                                    <input type='hidden' id='dia_semana_ter'  />
                                    <input type='hidden' id='dia_semana_qua'  />
                                    <input type='hidden' id='dia_semana_qui'  />
                                    <input type='hidden' id='dia_semana_sex'  />
                                    <input type='hidden' id='dia_semana_sab'  />

                                    <input type='hidden' id='dia_semana_seguinte'  />
                                    <input type='hidden' id='dia_semana_seguinte'  />
                                    <input type='hidden' id='dia_semana_seguinte'  />
                                    <input type='hidden' id='dia_semana_seguinte'  />
                                    <input type='hidden' id='dia_semana_seguinte'  />
                                    <input type='hidden' id='dia_semana_seguinte'  />
                                    <input type='hidden' id='dia_semana_seguinte'  />

                                    <input type='hidden' id='processos_etapas_pk'  />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="cmdEnviar">Carregar</button>
                                </td>
                            </tr>                           
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
        <br>
        <div class="grid">
            <div class='container col'>
                <div class='row' id='ic_grid'>
                    <table class="table table-striped table-bordered nowrap" style="width:30%" id="tblGridDados">
                        <thead>
                            <tr>
                                <th>Contrato</th>
                                <th>Período</th>
                                <th>Serviço</th>
                                <th>Qtde Colaborador</th>
                                <th>Qtde Serviço</th>
                             </tr>
                        </thead>
                    </table>  
                </div>   
            </div>    
        </div>
        <div class='row'>
            <div class='col-xl-12'>
                <b>Semana Anterior</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg corpo">
                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12'>
                        <div class='col-xl-12 dom'>Dom</div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_dom_passada"></div>
                        <input type='hidden' id='agenda_dom_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_dom_passada"></div></b>
                        
                        <div class="ds_colaborador_dom_passada"></div><br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12 seg'>Seg</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_seg_passada"></div>
                        <input type='hidden' id='agenda_seg_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_seg_passada"></div></b>
                        <div class="ds_colaborador_seg_passada"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>             
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12 ter'>Ter</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                       <div id="dt_agenda_ter_passada"></div>
                       <input type='hidden' id='agenda_ter_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_ter_passada"></div></b>
                        <div class="ds_colaborador_ter_passada"></div><br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12 qua'>Qua</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_qua_passada"></div>
                        <input type='hidden' id='agenda_qua_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_qua_passada"></div></b>
                        <div class="ds_colaborador_qua_passada"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>               
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12 qui'>Qui</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_qui_passada"></div>
                        <input type='hidden' id='agenda_qui_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_qui_passada"></div></b>
                        <div class="ds_colaborador_qui_passada"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>                
            </div>
            <div class="col-lg corpo">

                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12 sex'>Sex</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_sex_passada"></div>
                        <input type='hidden' id='agenda_sex_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_sex_passada"></div></b>
                        <div class="ds_colaborador_sex_passada"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>            
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_anterior'>
                    <div class='col-xl-12 sab'>Sab</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_sab_passada"></div>
                        <input type='hidden' id='agenda_sab_passada_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_sab_passada"></div></b>
                        <div class="ds_colaborador_sab_passada"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>            
            </div>         
        </div>        
        <div class='row'>
            <div class='col-xl-12'>
                <b>Semana Atual</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg corpo">
                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12'>
                        <div class='col-xl-12 dom'>Dom</div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_dom"></div>
                        <input type='hidden' id='agenda_dom_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_dom"></div></b>
                        <div class="ds_colaborador_dom"></div><br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12 seg'>Seg</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_seg"></div>
                        <input type='hidden' id='agenda_seg_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                       <b><div class="text_escala_alocacao_seg"></div></b>
                        <div class="ds_colaborador_seg"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12 ter'>Ter</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                       <div id="dt_agenda_ter"></div>
                       <input type='hidden' id='agenda_ter_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                       <b><div class="text_escala_alocacao_ter"></div></b>
                        <div class="ds_colaborador_ter"></div><br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12 qua'>Qua</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_qua"></div>
                        <input type='hidden' id='agenda_qua_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_qua"></div></b>
                        <div class="ds_colaborador_qua"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12 qui'>Qui</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_qui"></div>
                        <input type='hidden' id='agenda_qui_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_qui"></div></b>
                        <div class="ds_colaborador_qui"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">

                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12 sex'>Sex</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_sex"></div>
                        <input type='hidden' id='agenda_sex_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_sex"></div></b>
                        <div class="ds_colaborador_sex"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_atual'>
                    <div class='col-xl-12 sab'>Sab</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_sab"></div>
                        <input type='hidden' id='agenda_sab_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_sab"></div></b>
                        <div class="ds_colaborador_sab"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
        </div>  
        <div class='row'>
            <div class='col-xl-12'>
                <b>Proxima Semana</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12'>
                        <div class='col-xl-12 dom'>Dom</div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_dom_seguinte"></div>
                        <input type='hidden' id='agenda_dom_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_dom_seguinte"></div></b>
                        <div class="ds_colaborador_dom_seguinte"></div><br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12 seg'>Seg</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_seg_seguinte"></div>
                        <input type='hidden' id='agenda_seg_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_seg_seguinte"></div></b>
                        <div class="ds_colaborador_seg_seguinte"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12 ter'>Ter</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                       <div id="dt_agenda_ter_seguinte"></div>
                       <input type='hidden' id='agenda_ter_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_ter_seguinte"></div></b>
                        <div class="ds_colaborador_ter_seguinte"></div><br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12 qua'>Qua</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_qua_seguinte"></div>
                        <input type='hidden' id='agenda_qua_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_qua_seguinte"></div></b>
                        <div class="ds_colaborador_qua_seguinte"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12 qui'>Qui</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_qui_seguinte"></div>
                        <input type='hidden' id='agenda_qui_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                       <br>
                        <b><div class="text_escala_alocacao_qui_seguinte"></div></b>
                        <div class="ds_colaborador_qui_seguinte"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>

                
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12 sex'>Sex</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_sex_seguinte"></div>
                        <input type='hidden' id='agenda_sex_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                        <b><div class="text_escala_alocacao_sex_seguinte"></div></b>
                        <div class="ds_colaborador_sex_seguinte"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="col-lg corpo">
                <div class='row titulo_calendario_seguinte'>
                    <div class='col-xl-12 sab'>Sab</div>
                </div>
                <div class='row'>
                    <div class='col-xl-12 subtitulo_calendario'>
                        <div id="dt_agenda_sab_seguinte"></div>
                        <input type='hidden' id='agenda_sab_seguinte_pk'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <br>
                         <b><div class="text_escala_alocacao_sab_seguinte"></div></b>
                        <div class="ds_colaborador_sab_seguinte"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>  
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
                            <input type='hidden' id='dt_base_inclusao_modal'  />
                            <input type='hidden' id='produtos_servicos_pk'  />
                            <input type='hidden' id='turnos_pk'  />
                            <input type='hidden' id='agenda_contratos_pk'  />
                            
                            
                            <div class="row">                
                                <div class='col-md'>
                                    <div id="ds_turno_agenda"></div>
                                </div>                 
                            </div>  
                            <div class="row">
                                <div class='col-md'>
                                    <div id="ds_servico_agenda"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md'>
                                    <div id="ds_colaborador_atual_agenda"></div>
                                    <input type='hidden' id='colaborador_atual_pk'  />
                                    <input type='hidden' id='pausa_pk'  />
                                </div>
                            </div>
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
                            <hr>
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
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="cmdIncluir" name="cmdIncluir">Salvar</button>
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
                        <input type="hidden" id="agendas_pk">
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
                                <table class="table table-striped table-bordered nowrap " style="width:100%;" id="tblTarefa">
                                    <thead >
                                        <tr>
                                        <th>Código</th>
                                        <th>Tarefa</th>
                                        <th>Obs Tarefa</th>
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
                         <a href="#" data-dismiss="modal" class="btn btn-secondary">Cancelar</a>
                          <button type="button"  class="btn btn-primary" id='btntarefa' >Salvar</button>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                </div>  
                
            </div>
        </div>
    </div>     
                    
          
    <!--MODAL AGENDA COLABORADOR-->               
</div>
<?
require_once "../inc/php/footer.php";
?>
