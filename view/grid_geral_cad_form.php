<?
require_once "../inc/php/header.php";

?>
<script src="apontamento_colaborador_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="grid_geral_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>

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
        border:solid 1px;
        
      }
      


    .scroll { 
      overflow-x: scroll;
      overflow-y: hidden;
      white-space:nowrap;
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
                        <label for='clientes_pk'>Leads</label>
                        <select class='form-control form-control-sm chzn-select'  id='leads_pk' name='leads_pk'>
                            <option></option>
                        </select>
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
</div> 





<!--VARIAVEL DE PROCESSO ETAPA PARA SALVAR O UPD DA AGENDA-->                                
<input type="hidden" id="processos_etapas_pk_2">
<?
include_once'inc_agenda_escala_cad_form.php';

include_once'apontamento_colaborador_res_form.php';
require_once "../inc/php/footer.php";
?>
