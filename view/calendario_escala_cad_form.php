<?
require_once "../inc/php/header.php";

?>
<script src="calendario_escala_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>

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

<div class="container-fluid">
    <p> 
   <div class="row">
        <div class="col-md-12">
           Calendário de Escala
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    
        <div>
            <div>

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
                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'> 
                <div class="row">
                    <div class="col-md-12">
                       Legenda de Apontamentos
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-1 " style="background-color:68c39f; ">
                        <div class="text-center" >
                            <font color="white"> Ponto Registrado</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:abb7b7;">
                        <div class="text-center">
                             <font color="white">Afastamento</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:4da6ff;">
                        <div class="text-center">
                             <font color="white">Férias</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:d9a300;">
                        <div class="text-center">
                             <font color="white">Falta</font> 
                        </div>
                    </div> 
                    <div class="col-md-1 "  style="background-color:ff5c26;">
                        <div class="text-center">
                             <font color="white">Folga</font> 
                        </div>
                    </div> 
                    <div class="col-md-1" style="background-color:ffff4d">
                        <div class="text-center">
                             Troca Escala
                        </div>
                    </div>                              
                    <div class="col-md-3">
                        &nbsp;
                    </div> 
                </div>
                <br>
                <div class="row" >
                    <div class="col-md-6">
                        <input type='hidden' id='intSemana'>
                        <input type='hidden' id='intMes'>
                        <input type='hidden' id='intDia'>
                      
                        <input type='button' class="btn btn-primary" id='ic_exibir_por_mes' value='Mês'>&nbsp;&nbsp;
                        <input type='button' class="btn btn-primary" id='ic_exibir_por_semana' value='Semana'>&nbsp;&nbsp;
                        <input type='button' class="btn btn-primary" id='ic_exibir_por_dia' value='Dia'>
                    </div> 
                    <div class="col-md-3">
                        &nbsp;
                    </div> 
                </div>
                <br>
                <div class="row ">
                    <div class="col-md-1">
                        <label for='clientes_pk'>Posto de Trabalho</label>
                        <select class='form-control form-control-sm chzn-select'  id='leads_pk' name='leads_pk'>
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for='clientes_pk'>Colaborador</label>
                        <select class='form-control form-control-sm chzn-select'  id='colaborador_pk' name='colaborador_pk'>
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for='clientes_pk'>Qualificação</label>
                        <select class='form-control form-control-sm chzn-select'  id='qualificacao_pk' name='qualificacao_pk'>
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for='clientes_pk'>Escala</label>
                        <select class='form-control form-control-sm chzn-select'  id='escala_pk' name='escala_pk'>
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for='clientes_pk'>Status</label>
                        <select class='form-control form-control-sm chzn-select'  id='ic_status' name='ic_status'>
                            <option></option>
                            <option value="1">Ativo</option>
                            <option value="2">Desativado</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for='clientes_pk'>Apontamento</label>
                        <select class='form-control form-control-sm chzn-select'  id='ic_status' name='ic_status'>
                            <option></option>
                            <option value="1">Ativo</option>
                            <option value="2">Desativado</option>
                        </select>
                    </div>
                </div>
                
            </div>
        </div>
        <br>
        <div class='row'><div class='col-md-12'>
            <table id='tabela' class='table table-striped table-bordered tblResultado' style='width:100%' id='tblResultado' >
                <thead>
                    <tr>

                        <td width='30%'><input type='text' class='form-control' style='min-width:130px;' id='txtPostoTrabalho' /></td>
                        <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtColaborador' /></td>
                        <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtQualificacao' /></td>
                        <td width='5%'><input type='text' class='form-control' style='min-width:130px;' id='txtEscala' /></td>
                        <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtStatus' /></td>
                        <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtApontamento' /></td>
                        <td colspan="7" >1º Semana</td>
                        <td colspan="7">2º Semana</td>
                        <td colspan="7">3º Semana</td>
                        <td colspan="10">4º Semana</td>
                    </tr>
                    <tr align="center">
                        <td colspan='6'>&nbsp;</td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Dom 1</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Seg 2</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Ter 3</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qua 4</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qui 5</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sex 6</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sab 7</span></td>

                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Dom 8</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Seg 9</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Ter 10</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qua 11</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qui 12</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sex 13</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sab 14</span></td>

                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Dom 15</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Seg 16</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Ter 17</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qua 18</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qui 19</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sex 20</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sab 21</span></td>

                        <td> <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Dom 22</span></td>
                        <td> <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Seg 23</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Ter 24</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qua 25</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Qui 26</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sex 27</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Sab 28</span></td>

                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Dom 29</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Seg 30</span></td>
                        <td > <span class="form-control form-control-sm"  style="border: 2px solid;width:150px">Ter 31</span></td>

                        
                    </tr>
                    <tr>

                        <th width='30%'>Cond 1</th>
                        <th width='15%'> Colaborador 1 </th>
                        <th width='15%'>Limpeza</th>
                        <th width='5%'>6X1</th>
                        <th width='15%'>Ativo</th>
                        <th width='15%'>Apontamento 2</th>
                        
                        <!--APONTAMENTO-->
                       <th class='dom ' style="width:100px">
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       
                       
                       <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       
                       
                       <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       
                       
                       <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       
                       
                       <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       
                       
                       
                        
                        
                        
                        
                        
                        

                        
                    </tr>
                    <tr>

                        <th width='30%'>Cond 1</th>
                        <th width='15%'> Colaborador 2 </th>
                        <th width='15%'>Porteiro</th>
                        <th width='5%'>12X36</th>
                        <th width='15%'>Ativo</th>
                        <th width='15%'>Apontamento 1</th>
                        
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                            <th class='seg'>
                                <div   style="background-color:9a9c9c;">
                                    <div class="text-center">
                                         <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                    </div>
                                </div>
                           </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                        <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                       <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       <th class='seg'>
                            <div   style="background-color:9a9c9c;">
                                <div class="text-center">
                                     <font color="white" size="2px">Escala 08:00 as 17:00</font> 
                                </div>
                            </div>
                       </th>
                        <th class='dom '>
                            <div   style="background-color:ff5c26;">
                                <div class="text-center">
                                     <font color="white" size="2px">Folga</font> 
                                </div>
                            </div>  
                       </th>
                       
                        
                        
                        
                        

                        
                    </tr>
                </thead>
                <tbody>
                    

                </tbody>
            </table>
    </div>
    </div>
    <hr><br>
        
        
        
        
        
        
        
        <!--div class="row">
            <div class="col-md-12">
                <div id="form_grid">
                    <input type="hidden" id="grid" style="display:none">
                    <div id="grid_dia_mes_semana"></div>
                </div>
            </div>
        </div--> 
        
</div> 





<!--VARIAVEL DE PROCESSO ETAPA PARA SALVAR O UPD DA AGENDA-->                                
<input type="hidden" id="processos_etapas_pk_2">
<?
include_once'inc_agenda_escala_cad_form.php';

include_once'apontamento_colaborador_res_form.php';
require_once "../inc/php/footer.php";
?>
