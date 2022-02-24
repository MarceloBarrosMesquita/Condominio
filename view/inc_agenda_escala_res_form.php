<?php 
require_once "../inc/php/header.php";

include("inc_agenda_escala_cad_form.php"); ?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">

<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <h4>Agenda Escala Colaborador</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div id="exibir_pesquisa_agenda" style="display:none">    
        <form method="post">
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="ds_caonta">Posto de Trabalho:&nbsp;</label>
                    <select class='form-control form-control-sm chzn-select'  id='leads_pk_pesq_agenda' name='leads_pk_pesq_agenda' />
                        <option></option>
                    </select>  
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="ds_caonta">Colaborador:&nbsp;</label>
                    <select class='form-control form-control-sm chzn-select'  id='colaborador_pk_pesq_agenda' name='colaborador_pk_pesq_agenda' />
                        <option></option>
                    </select>  
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="ds_caonta">Periodo:&nbsp;</label>

                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-2'>
                   <input type="text" class='form-control form-control-sm' id="dt_periodo_ini_agenda_pesq" name="dt_periodo_ini_agenda_pesq" maxlength="10">

                </div>
                <div class='col-md-2'>

                    <input type="text" class='form-control form-control-sm ' id="dt_periodo_fim_agenda_pesq" name="dt_periodo_fim_agenda_pesq" maxlength="10">

                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="ds_caonta">Escala:&nbsp;</label>
                    <select class='form-control form-control-sm chzn-select'  id='escala_pesq_agenda' name='escala_pesq_agenda' >
                       <option value=''></option>
                       <option value='1D'>1D</option>
                       <option value='2D'>2D</option>
                       <option value='3D'>3D</option>
                       <option value='4D'>4D</option>
                       <option value='5D'>5D</option>
                       <option value='6X1'>6X1</option>
                       <option value='12x36'>12x36</option>
                    </select>  
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="ds_caonta">Função / Qualificação:&nbsp;</label>
                    <select class='form-control form-control-sm chzn-select'  id='produtos_pesq_agenda' name='produtos_pesq_agenda' />
                        <option></option>
                    </select>  
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="ds_caonta">Tipo Escala:&nbsp;</label>
                    <select class='form-control form-control-sm chzn-select'  id='tipo_escala_pesq_agenda' name='tipo_escala_pesq_agenda' />
                        <option></option>
                        <option value="1">Impar</option>
                        <option value="2">Par</option>
                    </select>  
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-3">
                    <label for="ic_status">Status:&nbsp;</label>
                    <select id="ic_status_pesq_agenda" class="form-control form-control-sm chzn-select" name="ic_status_pesq_agenda">
                        <option value=""></option>
                        <option value="1">Ativo</option>
                        <option value="2">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4" align="center">
                    <button type="button" class="btn btn-link" id="cmdPesquisarAgenda"><img src="../img/pesquisar.png" width=40 height=40>Pesquisar</button>
                    &nbsp;
                    <button type="button" class="btn btn-link" id="btn_modal_agenda"><img src="../img/incluir.png" width=40 height=40>Incluir</button>
                </div>
            </div>
        </form>
    </div>
    
</div>




<div class="container">    
    <div class="row" id="ic_grid">
        <div class="col-md-12">
            <table class="table table-striped table-bordered nowrap " style="width:100%" id="tblAgenda">
                <thead >
                    <tr>
                    <th>Cód</th>
                    <th>Posto de Trabalho</th>
                    <th>Colaborador</th>
                    <th>Período</th>
                    <th>Escala</th>
                    <th>Função</th>
                    <th>Tipo Escala</th>
                    <th>Status</th>
                    <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div id="exibir_campos_pesq_hidden" style="display:none">
        <div class='row'>
            <div class='col-md-12' align="center">
                <button type="button" id="btn_modal_agenda" class="btn btn-primary" >Incluir Agenda Escala</button>
            </div>
        </div>
        <input type="hidden" id="leads_pk_pesq_agenda">
        <input type="hidden" id="colaborador_pk_pesq_agenda">
        <input type="hidden" id="dt_periodo_ini_agenda_pesq">
        <input type="hidden" id="dt_periodo_fim_agenda_pesq">
        <input type="hidden" id="escala_pesq_agenda">
        <input type="hidden" id="produtos_pesq_agenda">
        <input type="hidden" id="tipo_escala_pesq_agenda">
        <input type="hidden" id="ic_status_pesq_agenda">
    </div>
    
</div>
