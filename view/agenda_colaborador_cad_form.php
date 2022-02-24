<?
require_once "../inc/php/header.php";
?>
<script src="agenda_colaborador_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="apontamento_colaborador_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<style>
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
    .borda{
        width:100px;
        height:100px;
        border:solid 10px;
        
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
                     
                    <div class="col-md-4">
                        <b>Legenda</b>
                    </div> 
                     
                </div>
                <br>
                <div class="row col-md-12" align="center">
                    <div class="col-md-3">
                        &nbsp;
                    </div> 
                    <div class="col-md-1 " style="background-color:green;">
                        <div class="text-center" >
                            <font color="white"> Ponto</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:CFFFBF;">
                        <div class="text-center">
                             <font color="black">Afastamento</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:3511aa;">
                        <div class="text-center">
                             <font color="white">Férias</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:10eec2;">
                        <div class="text-center">
                             <font color="white">Hora Extra</font> 
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
                <div class="row">
                    <div class="col-md-2">
                        <label for='clientes_pk'>Colaborador</label>
                        <select class='form-control form-control-sm chzn-select'  id='colaborador_combo_pk' name='colaborador_combo_pk'>
                            <option></option>
                        </select>
                        <input type="hidden" id="leads_pk" name="leads_pk">
                    </div>
                    <div class="col-md-2">
                        <label for='clientes_pk'>Status Colaborador:</label>
                        <select class='form-control form-control-sm '  id='ic_status_colaborador' name='ic_status_colaborador'>
                            <option></option>
                            <option value="1">Ativo</option>
                            <option value="2">Desativado</option>
                        </select>
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
       
<!------------------------OCORRENCIA------------------------------>
<div class="container">    
    <form id="form_ocorrencia" class="form">
        <div class="modal fade bd-example-modal-lg" id="janela_ocorrencia" >
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janela_contatosLabel">Nova Ocorrência</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblOcorrencia">
                                <thead>
                                    <tr>
  
                                        <th>Cód</th>               
                                        <th>Dt Cad OC</th>
                                        <th>Tipo OC</th>
                                        <th>Tipo Ocorrência_pk</th>
                                        <th>Descr OC</th> 
                                        <th>Usuário Cad</th>
                                        <th>Dt Fech OC</th>                    
                                        <th>Agendado Para</th>
                                        <th>Dt Retorno</th>
                                        <th>Descr Retorno</th>
                                        <th>Dt Fech Retorno</th>                
                                        <th>Ação</th>                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        &nbsp;
                    </div>
                    <div class="row">
                        &nbsp;
                    </div>
                    <div class="row">
                        <input type="hidden" name="ds_tipo_ocorrencia" id="ds_tipo_ocorrencia"/>
                        <input type='hidden' id='ocorrencias_pk' name='ocorrencias_pk'/>
                        <input type='hidden' id='ic_fechar_ocorrencia_auto' name='ic_fechar_ocorrencia_auto'/>
                        <input type='hidden' id='leads_pk_oc' name='leads_pk_oc'/>
                        
                        <div class='col-md-2'>
                            &nbsp;                                             
                        </div>
                        <div class='col-md-6'>
                            <label for='tipo_ocorrencia_pk'>Tipo Ocorrência&nbsp;</label>
                            <select class='form-control form-control-sm'  id='tipo_ocorrencia_pk' name='tipo_ocorrencia_pk' />
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-2'>
                            &nbsp;
                        </div>                                                             
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label for="ds_ocorrencia">Descrição Ocorrência:</label>
                                <textarea class=" form-control form-control-file" id="ds_ocorrencia" name="ds_ocorrencia"></textarea>
                            </div>
                        </div>                                                             
                    </div>
                    <div id="doc" style="display:none">
                        <div class="row" >
                            <input type="hidden" name="ds_nome_original_oc" id="ds_nome_original_oc"/>
                            
                            <input type="hidden" name="ds_documento_oc" id="ds_documento_oc"/>
                            <div class='col-md-2'>
                                &nbsp;
                            </div>
                            <div class='col-md-8'>
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Escolha o Arquivo</span>
                                    <input id="fileuploadOc"  type="file" name="FilesPic" multiple data-url="../controller/salvar_arquivo.php">

                                </span>
                                <br>
                                <div id="alert_documento" style="display:none" >
                                    <strong style="color: red">Selecione um arquivo</strong>
                                </div>
                                <br>
                                <div id="progressOc" class="progress">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                <div id="files" class="files"></div>
                                <!---->
                                <div class="row" id="rowFotos"></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblDocumentosOc">
                                    <thead>
                                        <tr>
                                            <th>Cód</th>
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
                    </div>
                    
                    <div class="row">
                        <div class='col-md-2'>
                             
                        </div>
                        <div class='col-md-3'>
                            Fechar Ocorrência:
                        </div>                                                              
                        <div class='col-md-1'>
                            <input type='checkbox' class='form-control form-control-sm' maxlength="10"  id='dt_fechamento' name='dt_fechamento'>
                        </div>                                                              
                    </div>
                    
                    <div class="row">
                        <div class='col-md-2'>
                             
                        </div>
                        <div class='col-md-3'>
                            Agendar Retorno:
                        </div>                                                              
                        <div class='col-md-1'>
                            <input type='hidden' id='agenda_retorno_pk' name='agenda_retorno_pk'/>
                            <input type='checkbox' class='form-control form-control-sm' maxlength="10"  id='agenda_retorno' name='agenda_retorno'>
                        </div>                                                              
                    </div>
                    <!--Agenda Retornos-->
                    <div id='agenda_visible'>
                        <hr>
                        <div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="dt_retornoa">Tipo Lembrete:</label>
                                    <select class="form-control form-control-file" id="tipo_lembrete_pk" name="tipo_lembrete_pk">
                                        <option> </option>
                                        <option value="1">Lembrete</option>
                                        <option value="2">WhatsApp</option>
                                    </select>
                                </div>
                            </div>  
                        </div>                 
                        <div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="dt_retornoa">Data Retorno:</label>
                                    <input type='text' class=" form-control form-control-file" id="agenda_dt_retorno" name="agenda_dt_retorno"/>
                                </div>
                            </div>  
                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="hr_retorno">Hora Retorno:</label>
                                    <input type='text' class=" form-control form-control-file" id="agenda_hr_retorno" name="agenda_hr_retorno"/>
                                </div>    
                            </div>  
                        </div>                 
                        <div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                      
                            <div class='col-md-2'>
                                <label for='ic_usuario'>Usuário:&nbsp;</label>
                                <input type='radio' class=" form-control form-control-file" id="ic_usuario" name="ic_usuario"/>
                            </div>
                                           <div class='col-md-2'>
                                <label for='ic_equipe'>Equipe:&nbsp;</label>
                                <input type='radio' class=" form-control form-control-file" id="ic_equipe" name="ic_equipe"/>
                            </div>   
                            <div class='col-md-4'>
                                <div id='agenda_responsavel_visible'>                                   
                                    <label for='agenda_responsavel_pk'>Lista Usuários&nbsp;</label>
                                    <select class='form-control form-control-sm'  id='agenda_responsavel_pk' name='agenda_responsavel_pk' />
                                        <option></option>
                                    </select>                                   
                                </div>    
                                <div id='agenda_equipe_visible'> 
                                    <label for='agenda_equipes_pk'>Lista Equipes&nbsp;</label>
                                    <select class='form-control form-control-sm'  id='agenda_equipes_pk' name='agenda_equipes_pk' />
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>        
                        <!--<div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="agenda_ds_retorno">Descrição Retorno:</label>
                                    <textarea class=" form-control form-control-file" id="agenda_ds_retorno" name="agenda_ds_retorno"></textarea>
                                </div>
                            </div>                                                             
                        </div>-->
                    </div>                    
                    <!--EDIÇÃO RETORNO-->
                    <div id='edit_agenda_visible'>
                        <hr>
                        <div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="ds_ocorrencia">Data Retorno:</label>
                                    <div class=" form-control form-control-file" disabled id="edit_agenda_dt_retorno" name="edit_agenda_dt_retorno"></div>
                                </div>
                            </div> 
                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="ds_ocorrencia">Hora Retorno:</label>
                                    <div class=" form-control form-control-file" disabled id="edit_agenda_hr_retorno" name="edit_agenda_hr_retorno"></div>
                                </div>
                            </div>
                            
                        </div> 
                        <div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="dt_retornoa">Tipo Lembrete:</label>
                                    <select class="form-control form-control-file" id="edit_tipo_lembrete_pk" name="tipo_lembrete_pk">
                                        <option> </option>
                                        <option value="1">Lembrete</option>
                                        <option value="2">WhatsApp</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div> 
                        <div id='edit_agenda_responsavel_visible'>
                            <div class="row">
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>                                                             
                                <div class='col-md-4'>
                                    <label for='agenda_responsavel_pk'>Usuário Responsável&nbsp;</label>
                                    <select class='form-control form-control-sm'  id='edit_agenda_responsavel_pk' name='edit_agenda_responsavel_pk' />
                                        <option></option>
                                    </select>
                                </div>                                                             
                            </div>
                        </div>
                        <div id='edit_agenda_equipe_visible'>
                            <div class="row">
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>                                                             
                                <div class='col-md-4'>
                                    <label for='agenda_equipes_pk'>Equipe Responsável&nbsp;</label>
                                    <select class='form-control form-control-sm'  id='edit_agenda_equipes_pk' name='edit_agenda_equipes_pk' />
                                        <option></option>
                                    </select>
                                </div>                                                             
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="agenda_ds_retorno">Descrição Retorno:</label>
                                    <textarea disabled class=" form-control form-control-file" id="agenda_ds_retorno" name="agenda_ds_retorno"></textarea>
                                </div>
                            </div>                             
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class='col-md-2'>

                            </div>
                            <div class='col-md-3'>
                                Fechar Retorno:
                            </div>                                                              
                            <div class='col-md-1'>
                                <input type='checkbox' class='form-control form-control-sm' maxlength="10"  id='dt_termino_retorno' name='dt_termino_retorno'>
                            </div>                                                              
                        </div>
                        <!--<div class="row">
                            <div class='col-md-2'>
                                &nbsp;
                            </div>                                                             
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label for="ds_ocorrencia">Data Termino Retorno:</label>
                                    <input type='text' class=" form-control form-control-file" id="edit_agenda_dt_retorno_termino" name="edit_agenda_dt_retorno_termino"/>
                                </div>
                            </div> 
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="ds_ocorrencia">Hora Termino Retorno:</label>
                                    <input type='text' class=" form-control form-control-file" id="edit_agenda_hr_retorno_termino" name="edit_agenda_hr_retorno_termino"/>
                                </div>
                            </div>  
                        </div>-->
                    </div>  
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-secondary" id="cmdEnviarOcorrencia"  name="cmdEnviarOcorrencia">Salvar</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    </form>
</div>
<!--VARIAVEL DE PROCESSO ETAPA PARA SALVAR O UPD DA AGENDA-->                                
<input type="hidden" id="processos_etapas_pk_2">
<?
include_once'inc_agenda_escala_cad_form.php';
include_once'apontamento_colaborador_res_form.php';
require_once "../inc/php/footer.php";
?>
