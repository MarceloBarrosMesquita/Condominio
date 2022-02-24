<?
include_once "../inc/php/header.php";
?>
<script src="agenda_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<style>
    .titulo_calendario_anterior{
        background-color: #e0e0e0;
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
        background-color: #e0e0e0;
        border-bottom-style: solid;
        border-bottom-width: thin;
        font-weight: bold;
        text-align: center;
    }
    .titulo_calendario_seguinte{
        background-color: #e0e0e0;
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
</style>
<div id="loader"></div>
<div class="container col" id="exibir" style="display:none">
    <form id="form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <h3><div class="" >Agenda <labe id="ds_usuario_logado"></label> </div>  </h3> 
                </div>
            </div>
            <form method="post">

               <div class="modal-content" >
                    <div class="modal-body">

                        <div class="row" align="center">
                            <div class="col-md"  >
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
                        <div class="row col-md-12" align="center">
                            <div class="col-md-3">
                                &nbsp;
                                <input type="hidden" id="usuario_logado_pk" name="usuario_logado_pk">
                                <input type="hidden" value="1" name="tipo_evento_agenda_pk" id="calendar_tipo_evento_agenda_pk_0">  
                            </div>                                
    
                            <div class='col-md-1' align="left">
                                <label for='grupos_pk'>Perfil: </label>
                            </div>
                            <div class='col-md-2' align="left">
                                <select class='form-control form-control-sm'  id='calendar_grupos_pk' name='grupos_pk'>
                                    <option></option>
                                </select>                                                    
                            </div>


                        </div>
                        <br>
                        <div class="row col-md-12" align="center">
                            <div class="col-md-3">
                                &nbsp;
                            </div> 
                            <div class='col-md-1' align="left">
                                <label for='tipos_agendas_pk'>Agendamento:</label>
                            </div>
                            <div class='col-md-1' align="left">
                              <select class='form-control form-control-sm'  id='calendar_tipos_agendas_pk' name='tipos_agendas_pk'>
                                    <option value=""></option>
                                    <option value="1">Prospecção</option>
                                    <option value="2">Reunião</option>
                                    <option value="3">Fechamento</option>
                                </select>                             
                            </div>
                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            <div class='col-md-1' align="left">
                                <label for='usuarios_pk'>Responsável: </label>
                            </div>
                            <div class='col-md-2' align="left">
                                <select class='form-control form-control-sm'  id='calendar_usuarios_pk' name='usuarios_pk'>
                                    <option></option>
                                </select>                                                  
                            </div>

                        </div>
                        <br>
                        <div class="row col-md-12" align="center">
                            <div class="col-md-3">
                                &nbsp;
                            </div> 
                            <div class='col-md-1' align="left">
                                <label for='classificacao_agenda_pk'>Classificação: </label>
                            </div>
                            <div class='col-md-1' align="left">
                              <select class='form-control form-control-sm'  id='calendar_classificacao_agenda_pk' name='classificacao_agenda_pk'>
                                    <option value=""></option>
                                    <option value="1">Produtivo</option>
                                    <option value="2">Improdutivo</option>
                                    <option value="3">Reagedado</option>
                                    <option value="4">Cancelado</option>
                                </select>                             
                            </div>
                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            <div class='col-md-1' align="left">
                                <label for='usuarios_pk'>Agendado por:</label>
                            </div>
                            <div class='col-md-2' align="left">
                                <select class='form-control form-control-sm'  id='calendar_agendado_por' name='calendar_agendado_por'>
                                    <option></option>
                                </select>                                                  
                            </div> 
                        </div>
                        <br>
                        <div class="row col-md-12" align="center">
                            <div class="col-md-3">
                                &nbsp;
                            </div> 
                            <div class='col-md-1' align="left">
                                <label for='usuarios_pk'>Equipe:</label>
                            </div>
                            <div class='col-md-2' align="left">
                                <select class='form-control form-control-sm'  id='calendar_equipes_pk' name='calendar_equipes_pk'>
                                    <option></option>
                                </select>                                                  
                            </div> 
                        </div>
                            <div class="w-100"></div>
                    </div>
                    <br>
                    <div class="row" align="center">
                         <div class="col-md"  >
                             <button type="button" class="btn btn-secondary" id="cmdFiltrar">Filtrar</button> 
                         </div>
                    </div> 
                    <br>
                </div>
           </div>             
           <br>
            <div class="row col-md-12" align="center">
                <div class="col-md-4">
                    &nbsp;
                </div> 
                <div class="col-md-1 " style="background-color:#f4f4f6;">
                    <div class="text-center" >
                    Sem Classificação
                    </div>
                </div> 
                <div class="col-md-1 "  style="background-color:#DFF0D8;">
                    <div class="text-center">
                    Produtivo
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#f68686">
                    <div class="text-center">
                    Improdutivo
                    </div>
                </div>                              
                <div class="col-md-1"  style="background-color:#fae98a">
                    <div class="text-center">
                    Reagendado
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#e62121">
                    <div class="text-center">
                    Cancelado
                    </div> 
                </div> 
                <div class="col-md-3">
                    &nbsp;
                </div> 
            </div>
            <div class="row col-md-12" align="center">
                <div class="col-md-4">
                    &nbsp;
                </div> 
                <div class="col-md-1" style="background-color:#f4f4f6;">
                    <div class="text-center">
                        <b><div class="ds_qtde_sem_classificacao"></div></b>  
                    </div>
                </div> 
                <div class="col-md-1"  style="background-color:#DFF0D8;">
                    <div class="text-center">
                        <b><div class="ds_qtde_produtivo"></div></b>  
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#f68686">
                    <div class="text-center">
                        <b><div class="ds_qtde_improdutivo"></div></b>  
                    </div>
                </div>                              
                <div class="col-md-1"  style="background-color:#fae98a">
                    <div class="text-center">
                        <b><div class="ds_qtde_reagendado"></div></b>
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#e62121">
                    <div class="text-center">
                        <b><div class="ds_qtde_atrasado"></div></b>
                    </div> 
                </div> 
                <div class="col-md-3">
                    &nbsp;
                </div> 
            </div>
           <br>

                <!-- 1º SEMANA--> 
                <div class="row">
                    <div class="col-lg corpo">
                        <div class='row titulo_calendario_anterior'>
                            <div class='col-xl-12'>
                                <div class='col-xl-12 dom'>Dom</div>                            
                            </div>                        
                        </div>
                        <div class='row'>
                            <div class='col-xl-12 subtitulo_calendario'>
                                <div id="dt_agenda_dom1"></div>                              
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_dom1_val" value="">
                                <div class="ds_visita_dom1"></div><br>
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
                                <div id="dt_agenda_seg1"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_seg1_val" value="">
                                <div class="ds_visita_seg1"></div><br>
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
                               <div id="dt_agenda_ter1"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_ter1_val" value="">
                                <div class="ds_visita_ter1"></div><br>

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

                                <div id="dt_agenda_qua1"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qua1_val" value="">
                                <div class="ds_visita_qua1"></div><br>
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
                                <div id="dt_agenda_qui1"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qui1_val" value="">
                               <div class="ds_visita_qui1"></div><br>
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
                                <div id="dt_agenda_sex1"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sex1_val" value="">
                                <div class="ds_visita_sex1"></div><br>
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
                                <div id="dt_agenda_sab1"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sab1_val" value="">
                                <div class="ds_visita_sab1"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                &nbsp;
                            </div>
                        </div>

                    </div>
                </div>



                <!--2º Semana-->
                <div class="row">
                    <div class="col-lg corpo">
                        <div class='row titulo_calendario_atual'>
                            <div class='col-xl-12'>
                                <div class='col-xl-12 dom'>Dom</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12 subtitulo_calendario'>
                                <div id="dt_agenda_dom2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_dom2_val" value="">
                                <div class="ds_visita_dom2"></div><br>
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
                                <div id="dt_agenda_seg2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                                <input type="hidden" id="dt_agenda_seg2_val" value="">
                                <div class="ds_visita_seg2"></div><br>
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
                               <div id="dt_agenda_ter2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>                  
                                <input type="hidden" id="dt_agenda_ter2_val" value="">
                                <div class="ds_visita_ter2"></div><br>
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
                                <div id="dt_agenda_qua2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qua2_val" value="">
                               <div class="ds_visita_qua2"></div><br>
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
                                <div id="dt_agenda_qui2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qui2_val" value="">
                                <div class="ds_visita_qui2"></div><br>
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
                                <div id="dt_agenda_sex2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sex2_val" value="">
                                <div class="ds_visita_sex2"></div><br>
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
                                <div id="dt_agenda_sab2"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sab2_val" value="">
                                <div class="ds_visita_sab2"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>  


                <!--3º Semana-->
                <div class="row">
                    <div class="col-lg corpo">
                        <div class='row titulo_calendario_atual'>
                            <div class='col-xl-12'>
                                <div class='col-xl-12 dom'>Dom</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12 subtitulo_calendario'>
                                <div id="dt_agenda_dom3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_dom3_val" value="">
                                <div class="ds_visita_dom3"></div><br>
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
                                <div id="dt_agenda_seg3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_seg3_val" value="">    
                                <div class="ds_visita_seg3"></div><br>
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
                               <div id="dt_agenda_ter3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_ter3_val" value="">
                                <div class="ds_visita_ter3"></div><br>

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
                                <div id="dt_agenda_qua3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qua3_val" value="">
                               <div class="ds_visita_qua3"></div><br>
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
                                <div id="dt_agenda_qui3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qui3_val" value="">
                                <div class="ds_visita_qui3"></div><br>
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
                                <div id="dt_agenda_sex3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sex3_val" value="">
                                <div class="ds_visita_sex3"></div><br>
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
                                <div id="dt_agenda_sab3"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sab3_val" value="">
                                <div class="ds_visita_sab3"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>  

                <!--4º Semana-->
                <div class="row">
                    <div class="col-lg corpo">
                        <div class='row titulo_calendario_atual'>
                            <div class='col-xl-12'>
                                <div class='col-xl-12 dom'>Dom</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12 subtitulo_calendario'>
                                <div id="dt_agenda_dom4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_dom4_val" value="">
                                <div class="ds_visita_dom4"></div><br>

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
                                <div id="dt_agenda_seg4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_seg4_val" value="">
                                <div class="ds_visita_seg4"></div><br>
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
                               <div id="dt_agenda_ter4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                              <br>
                              <input type="hidden" id="dt_agenda_ter4_val" value="">
                                <div class="ds_visita_ter4"></div><br>

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
                                <div id="dt_agenda_qua4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qua4_val" value="">
                               <div class="ds_visita_qua4"></div><br>
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
                                <div id="dt_agenda_qui4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qui4_val" value="">
                                <div class="ds_visita_qui4"></div><br>
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
                                <div id="dt_agenda_sex4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sex4_val" value="">
                                <div class="ds_visita_sex4"></div><br>
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
                                <div id="dt_agenda_sab4"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sab4_val" value="">
                                <div class="ds_visita_sab4"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>  

                <!--5º Semana-->
                <div class="row">
                    <div class="col-lg corpo">
                        <div class='row titulo_calendario_atual'>
                            <div class='col-xl-12'>
                                <div class='col-xl-12 dom'>Dom</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12 subtitulo_calendario'>
                                <div id="dt_agenda_dom5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_dom5_val" value="">
                                <div class="ds_visita_dom5"></div><br>

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
                                <div id="dt_agenda_seg5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_seg5_val" value="">
                                <div class="ds_visita_seg5"></div><br>
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
                               <div id="dt_agenda_ter5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_ter5_val" value="">
                                <div class="ds_visita_ter5"></div><br>

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
                                <div id="dt_agenda_qua5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qua5_val" value="">
                               <div class="ds_visita_qua5"></div><br>
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
                                <div id="dt_agenda_qui5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_qui5_val" value="">
                                <div class="ds_visita_qui5"></div><br>
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
                                <div id="dt_agenda_sex5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sex5_val" value="">
                                <div class="ds_visita_sex5"></div><br>
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
                                <div id="dt_agenda_sab5"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sab5_val" value="">
                                <div class="ds_visita_sab5"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>  

                <!--6º Semana-->
                <div class="row">
                    <div class="col-lg corpo">
                        <div class='row titulo_calendario_atual'>
                            <div class='col-xl-12'>
                                <div class='col-xl-12 dom'>Dom</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12 subtitulo_calendario'>
                                <div id="dt_agenda_dom6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_dom6_val" value="">
                                <div class="ds_visita_dom6"></div><br>

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
                                <div id="dt_agenda_seg6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_seg6_val" value="">
                                <div class="ds_visita_seg6"></div><br>
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
                               <div id="dt_agenda_ter6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_ter6_val" value="">
                                <div class="ds_visita_ter6"></div><br>

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
                                <div id="dt_agenda_qua6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                               <br>
                               <input type="hidden" id="dt_agenda_qua6_val" value="">
                               <div class="ds_visita_qua6"></div><br>
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
                                <div id="dt_agenda_qui6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_qui6_val" value="">
                                <div class="ds_visita_qui6"></div><br>
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
                                <div id="dt_agenda_sex6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sex6_val" value="">
                                <div class="ds_visita_sex6"></div><br>
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
                                <div id="dt_agenda_sab6"></div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <br>
                                <input type="hidden" id="dt_agenda_sab6_val" value="">
                                <div class="ds_visita_sab6"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12" style=" background-color: #e0e0e0;">
                        &nbsp;
                    </div>
                </div>
                <br>
                <div class="row col-md-12" align="center">
                <div class="col-md-4">
                    &nbsp;
                </div> 
                <div class="col-md-1 " style="background-color:#f4f4f6;">
                    <div class="text-center" >
                        Sem Classificação
                    </div>
                </div> 
                <div class="col-md-1 "  style="background-color:#DFF0D8;">
                    <div class="text-center">
                        Produtivo
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#f68686">
                    <div class="text-center">
                        Improdutivo
                    </div>
                </div>                              
                <div class="col-md-1"  style="background-color:#fae98a">
                    <div class="text-center">
                        Reagendado
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#e62121">
                    <div class="text-center">
                        Cancelado
                    </div> 
                </div> 
                <div class="col-md-3">
                    &nbsp;
                </div> 
            </div>
            <div class="row col-md-12" align="center">
                <div class="col-md-4">
                    &nbsp;
                </div> 
                <div class="col-md-1" style="background-color:#f4f4f6;">
                    <div class="text-center">
                        <b><div class="ds_qtde_sem_classificacao"></div></b>  
                    </div>
                </div> 
                <div class="col-md-1"  style="background-color:#DFF0D8;">
                    <div class="text-center">
                        <b><div class="ds_qtde_produtivo"></div></b>  
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#f68686">
                    <div class="text-center">
                        <b><div class="ds_qtde_improdutivo"></div></b>  
                    </div>
                </div>                              
                <div class="col-md-1"  style="background-color:#fae98a">
                    <div class="text-center">
                        <b><div class="ds_qtde_reagendado"></div></b>
                    </div>
                </div> 
                <div class="col-md-1" style="background-color:#e62121">
                    <div class="text-center">
                        <b><div class="ds_qtde_atrasado"></div></b>
                    </div> 
                </div> 
                <div class="col-md-3">
                    &nbsp;
                </div> 
            </div> 
                <br>
        </div>
    </form>

    <!----MODAL LEAD---->
    <div class="modal fade bd-example-modal-lg"  id="janela_agenda_visita_lead">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content " >
                <div class="modal-body" style="box-shadow: 2px 2px 5px grey;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" >Dados Cadastrais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contatos-tab" data-toggle="tab" href="#contatos" role="tab" aria-controls="contatos" >Contatos</a>
                        </li>  
                    </ul> 
                    <br>
                    <div class="tab-content" id="myTabContent">
                        <!--div class='row'>
                            <div class='col-md-3' align="center " style="color: #007bff">
                                &nbsp;<i class="fas fa-info-circle status_lead" ></i>
                            </div>
                        </div-->
                        <br>
                        <div class="tab-pane fade show active" align="left" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-8'>
                                    <label for='ds_lead'>Lead:&nbsp;</label>
                                    <div id="ds_lead" class='form-control form-control-sm'></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-3'>
                                    <label for='ds_razao_social'>Razão Social:&nbsp;</label>
                                    <div id="ds_razao_social" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-3'>
                                    <label for='ds_cpf_cnpj'>Cpf/Cnpj:&nbsp;</label>
                                    <div id="ds_cpf_cnpj" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-2'>
                                    <label for='ds_ie'>IE:&nbsp;</label>
                                    <div id="ds_ie" class='form-control form-control-sm'></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>

                                <div class='col-md-8'>
                                    <label for='ds_endereco'>Endereço:&nbsp;</label>
                                    <div id="ds_endereco" class='form-control form-control-sm'></div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-1'>
                                    <label for='ds_numero'>Nr:&nbsp;</label>
                                    <div id="ds_numero" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-4'>
                                    <label for='ds_complemento'>Complemento:&nbsp;</label>
                                    <div id="ds_complemento" class='form-control form-control-sm'></div>
                                </div>

                                <div class='col-md-3'>
                                    <label for='ds_cep'>CEP:&nbsp;</label>
                                    <div id="ds_cep" class='form-control form-control-sm'></div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-3'>
                                    <label for='ds_bairro'>Bairro:&nbsp;</label>
                                    <div id="ds_bairro" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-3'>
                                    <label for='ds_cidade'>Cidade:&nbsp;</label>
                                    <div id="ds_cidade" class='form-control form-control-sm'></div>
                                </div>

                                <div class='col-md-2'>
                                    <label for='ds_uf'>UF:&nbsp;</label>
                                    <div id="ds_uf" class='form-control form-control-sm'></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-2'>
                                    <label for='ds_tel_lead'>Telefone:&nbsp;</label>
                                    <div id="ds_tel_lead" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-2'>
                                    <label for='ds_fax'>Fax:&nbsp;</label>
                                    <div id="ds_fax" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-4'>
                                    <label for='ds_email_lead'>Email:&nbsp;</label>
                                    <div id="ds_email_lead" class='form-control form-control-sm'></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-4'>
                                    <label for='ds_site'>Site:&nbsp;</label>
                                    <div id="ds_site" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-2'>
                                    <label for='n_qtde_torres'>Qtde Torres:&nbsp;</label>
                                    <div id="n_qtde_torres" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-2'>
                                    <label for='ic_cliente'>Cliente:&nbsp;</label>
                                    <div id="ic_cliente" class='form-control form-control-sm'></div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-8'>
                                    <label for='ds_obs'>Observação:&nbsp;</label>
                                    <div id="ds_obs" class='form-control form-control-sm'></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-2'>
                                    &nbsp;
                                </div>
                                <div class='col-md-4'>
                                    <label for='ds_supervisor'>Supervisor:&nbsp;</label>
                                    <div id="ds_supervisor" class='form-control form-control-sm'></div>
                                </div>
                                <div class='col-md-4'>
                                    <label for='ds_responsavel'>Responsavel Comercial:&nbsp;</label>
                                    <div id="ds_responsavel" class='form-control form-control-sm'></div>
                                </div>
                            </div>
                           
                            <br>
                        </div>                 
                         
                              
                           <!--Contatos-->
                           <div class="tab-pane fade" id="contatos" role="tabpanel" aria-labelledby="contatos-tab">
                               <div class="row">
                                    <div class="col-md-12">
                                        <h5>Contatos</h5>
                                    </div>
                                </div>
                                <br>
                                <div class='row'>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label"><b>ID Lead: </b></label>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class=' leads_pk_cad'></div>
                                    </div>
                                </div>
                                
                                <div class='row'>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label"><b>Lead: </b></label>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class=' ds_lead_cad'></div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <div class="row" id="ic_grid">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered nowrap " style="width:100%" id="tblLeadContatos">
                                                <thead >
                                                    <tr>
                                                    <th>Código</th>
                                                    <th>Contato</th>
                                                    <th>Email</th>
                                                    <th>Cel</th>
                                                    <th>Whatsapp</th>
                                                    <th>ic_whatsapp</th>
                                                    <th>Tel</th>
                                                    <th>Função</th>
                                                    <th>cargos_pk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>              
                           </div>           
                            
                           <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="cmdRedirecionar">Acessar Lead</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include("cal_inc_agenda_visita_cad_form.php"); ?> 
<?php  include("inc_cal_ocorrencia_res.php"); ?> 
<?
include_once "../inc/php/footer.php";
?>
