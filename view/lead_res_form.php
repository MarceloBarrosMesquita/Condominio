<?
require_once "../inc/php/header.php";
?>
<script src="lead_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<style>
@import "bourbon";
      .label-float{
  position: relative;
  padding-top: 13px;
}

.label-float input[type=text]{
  border: 0;
  border-bottom: 2px solid lightgrey;
  outline: none;
  min-width: 300px;
  font-size: 16px;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  
  border-radius:0;
}

.label-float input[type=text]:focus{
  border-bottom: 2px solid #3951b2;
}

.label-float input[type=text]:placeholder{
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

.label-float input[type=text]:required:invalid + label{
  color: red;
}
.label-float input[type=text]:focus:required:invalid{
  border-bottom: 2px solid red;
}
.label-float input:required:invalid + label:before{
  content: '*';
}
.label-float input[type=text]:focus + label,
.label-float input[type=text]:not(:placeholder-shown) + label{
  font-size: 13px;
  margin-top: 0;
  color: #3951b2;
}
.oc_modal{
    cursor:pointer;
}
.doc_modal{
    cursor:pointer;
}
.processo_modal{
    cursor:pointer;
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Leads</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <form method="post">
        <div id="x"></div>
        <div class='row'>
             <div class='col-md-4'>
                 &nbsp;
             </div>
            <div class='col-md-4'>
                 <label for='ds_uf'>Tipo Lead:</label>
                <select id="ic_tipo_lead" class='form-control form-control-sm ' name="ic_tipo_lead">
                    <option ></option>
                    <option value="1">Cliente</option>
                    <option value="2">Posto de Trabalho</option>
                </select>
             </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
  
                    <label for='clientes_pk'>Lead</label>
                    <select class='form-control form-control-sm chzn-select'  id='ds_lead' name='ds_lead'>
                        <option></option>
                    </select>
                
            </div>
        </div>
        <div class='row'>
             <div class='col-md-4'>
                 &nbsp;
             </div>
            <div class='col-md-4'>
                 <label for='ds_uf'>Segmento:&nbsp;</label>
                 <select class='form-control form-control-sm'  id='segmentos_pk' name='segmentos_pk' requered/>
                     <option></option>
                     <option value="1">Condomínios</option>
                     <option value="2">Escolas</option>
                     <option value="3">Escritórios</option>
                     <option value="4">Industrias</option>
                     <option value="5">Residencial</option>
                    <option value="6">Pós obra</option>
                 </select>
             </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for='supervisores_pk'>Supervisor:&nbsp;</label>
                <select class='form-control form-control-sm'  id='supervisores_pk' name='supervisores_pk' />
                    <option></option>
                </select>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for='responsavel_pk'>Responsavel Comercial:&nbsp;</label>
                <select class='form-control form-control-sm'  id='responsavel_pk' name='responsavel_pk' />
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <label for="ic_status">Cliente:&nbsp;</label>
                <select id="ic_status" class="form-control form-control-sm" name="ic_status">
                    <option value=""></option>
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4" align="center">
                <button type="button" class="btn btn-link" id="cmdPesquisar"><img src="../img/pesquisar.png" width=40 height=40>Pesquisar</button>
                &nbsp;
                <button type="button" class="btn btn-link" id="cmdIncluir"><img src="../img/incluir.png" width=40 height=40>Novo</button>
                &nbsp;
                <!--button type="button" class="btn btn-link" id="cmdMovimentar"><img src="../img/incluir.png" width=40 height=40>Migrar Movimentação</button-->
            </div>
        </div>
    </form>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row" >
        <div class="col-md-12">
        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblResultado">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Tipo Lead</th>
                    <th>Lead</th>
                    <!--th>Bairro</th-->
                    <th>Cidade</th>
                    <!--<th>Cliente</th>-->
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!--MODAL-->
<div class="container">    
    <div class="modal fade bd-example-modal-lg" id="modal_opcoes" data-backdrop='static'>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janela_contatosLabel"><div id='ds_lead_modal' ></div> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type='hidden' id='leads_pk_opcoes' name='leads_pk_opcoes'/>
                </div>                  
                <div class="modal-content bd-example-modal-lg-12">
                    <div class="modal-body" >   
                        
                        <div class="row">                                
                            <div class='col-md-4'>
                                <a id='abrirModalOc' class='oc_modal' ><span><img width=60 height=60 src='../img/ocorrencias.jpg' title='Ocorrência'>Ocorrências</span></a>
                            </div>                                                                                
                            <div class='col-md-4'>
                                <a id='abrirModalProcesso'  class='processo_modal'><span><img width=60 height=60 src='../img/processo.png' title='Processo'></span>Processos</a>
                            </div>                                                                                
                            <div class='col-md-4'>
                                <a id='abrirModalDocs'  class='doc_modal'><span><img width=60 height=60 src='../img/relatorio.png' title='Documentos'></span>Documentos</a>
                            </div>                                                                                
                        </div>                             
                        <br>                       
                    </div>
                </div>                   
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>  
        </div> 
    </div>
</div> 
<!--OCORRENCIAS-->
<div class="container">     
    <div class="modal fade bd-example-modal-lg" id="modal_ocorrencia" data-backdrop='static'>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janela_contatosLabel">Ocorrência</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>                    
                <div class="modal-content bd-example-modal-lg-12">
                    <div class="modal-body" >   
                            <div class="row">
                                <div class="col-md-12" >
                                    <button type="button" class="btn btn-primary" id="cmdIncluirOcorrencia">Incluir Ocorrência</button>
                                </div>
                            </div>
                            <br>    
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblOcorrenciaLead">
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
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                            </div>

                            <hr><br>                                 
                        <br>                       
                    </div>
                </div>                   
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>  
        </div> 
    </div>
</div>
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
                        <input type="hidden" name="ds_tipo_ocorrencia" id="ds_tipo_ocorrencia"/>
                        <input type='hidden' id='ocorrencias_pk' name='ocorrencias_pk'/>
                        <input type='hidden' id='ic_fechar_ocorrencia_auto' name='ic_fechar_ocorrencia_auto'/>
                        
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
                    <div class="row">                        
                        <div class='col-md-2'>
                            &nbsp;                                             
                        </div>
                        <div class='col-md-6'>
                            <label for='tipo_ocorrencia_pk'>Status Fechamento&nbsp;</label>
                            <select class='form-control form-control-sm'  id='ic_status_fechamento' name='ic_status_fechamento' />
                                <option value='1'>Aberto</option>
                                <option value='2'>Fechado</option>
                                <option value='3'>Recusado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class='col-md-2'>
                            &nbsp;                                             
                        </div>
                        <div class='col-md-6'>
                            <label for='tipo_ocorrencia_pk'>Obs Status&nbsp;</label>
                            <textarea type='text' class=" form-control form-control-file" id="obs_status" name="obs_status"></textarea>
                        </div>
                    </div>
                    <br>   
                    <div class="row">                        
                        <div class='col-md-2'>
                            &nbsp;                                             
                        </div>
                        <div class='col-md-3'>
                            <label for='tipo_ocorrencia_pk'>Dt Prazo Execução&nbsp;</label>
                            <input type='text' class=" form-control form-control-file" id="dt_prazo_execucao" name="dt_prazo_execucao"/>
                        </div>
                    </div>
                    <br>                    
                    <div class="row">                        
                        <div class='col-md-2'>
                            &nbsp;                                             
                        </div>
                        <div class='col-md-6'>
                            <label for='tipo_ocorrencia_pk'>Obs Execução&nbsp;</label>
                            <textarea type='text' class=" form-control form-control-file" id="obs_execucao" name="obs_execucao"></textarea>
                        </div>
                    </div>
                    <br>                    
                    <div class="row">
                        <div class='col-md-2'>
                             
                        </div>
                        <div class='col-md-3'>
                            Fechar Ocorrência:
                        </div>                                                              
                        <div class='col-md-1'>
                            <input type='checkbox' class='form-check-label'   id='dt_fechamento' name='dt_fechamento'>
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
                            <input type='checkbox' class='form-check-label'  id='agenda_retorno' name='agenda_retorno'>
                        </div>                                                              
                    </div>
                    <div class="row">
                        <div class='col-md-2'>
                             
                        </div>
                        <div class='col-md-3'>
                            Incluir Documento:
                        </div>                                                              
                        <div class='col-md-1'>
                            <input type='checkbox' class='form-check-label'  id='ic_docs' name='ic_docs'>
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
                    <!--Agenda Retornos-->
                    <div id='agenda_visible'>
                        <hr>
                        <input type="hidden" class="form-control form-control-file" id="tipo_lembrete_pk" name="tipo_lembrete_pk"/>               
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
                                <input type='radio' class="btn btn-secondary" id="ic_usuario" name="ic_usuario"/>
                            </div>
                                           <div class='col-md-2'>
                                <label for='ic_equipe'>Equipe:&nbsp;</label>
                                <input type='radio' class="btn btn-secondary" id="ic_equipe" name="ic_equipe"/>
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
                                <input type="hidden" class="form-control form-control-file" id="tipo_lembrete_pk" name="tipo_lembrete_pk"/>
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
                                <input type='checkbox' class='form-check-label' maxlength="10"  id='dt_termino_retorno' name='dt_termino_retorno'>
                            </div>                                                              
                        </div>
                    </div>  
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" id="cmdEnviarOcorrencia"  name="cmdEnviarOcorrencia">Salvar</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    </form>
</div>
<!--PROCESSOS-->
<div class="container">    
    <div class="modal fade bd-example-modal-lg" id="janela_processo" >
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janela_contatosLabel">Processo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                                    
                    <div >  
                        <p>    
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblProcessos">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Processo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        <hr>
                    </div>  
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<!--DOCUMENTOS-->
<div class="container">    
    <div class="modal fade bd-example-modal-lg" id="janela_docs" >
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janela_contatosLabel">Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                                    
                    <div>  
                        <p>   
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
                        <hr>
                    </div>  
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
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
                            <input id="fileuploadDoc"  type="file" name="FilesPic" multiple data-url="../controller/salvar_arquivo.php">

                        </span>
                        <br>
                        <div id="alert_documento" style="display:none" >
                            <strong style="color: red">Selecione um arquivo</strong>
                        </div>
                        <br>
                        <div id="progressDoc" class="progress">
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
