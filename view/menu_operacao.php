<?php
include "../inc/php/header.php";
include "apontamento_colaborador_res_form.php";
$token = $_REQUEST['token'];
?>
<script src="apontamento_colaborador_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<script>


function fcAbrirPopUpAtraso(){
    
    
    var width = 1432;
    var height = 600;

    var left = 250;
    var top = 150;
    var URL = "painel_atraso_cad_form.php?token="+ token;
    window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
           
}


</script>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h4>Operacional</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;">
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-sm"> 
                        <h5>Controle de Posto(s) de Trabalho</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('lead_res_form.php');">
                                    <img src="../img/predio1.png" width="40">&nbsp;Posto(s) de Trabalho
                                </a>
                            </div>
                        </div>  
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenuMovimentar('contrato_operacional_res_form.php');">
                                    <img src="../img/contrato.png" width="40">&nbsp;Contrato(s)/Serviços Extras
                                </a>
                            </div>
                        </div>  
                        <p>
                        <!--<div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('grid_condominio_res_form.php');">
                                    <img src="../img/grid_escala.jpeg" width="40">&nbsp;Grid Escala Leads
                                </a>
                            </div>
                        </div>-->
                        <!--<p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('agenda_condominio_res_form.php');">
                                    <img src="../img/calendario.png" width="40">&nbsp;Agenda Escala Leads
                                </a>
                            </div>
                        </div>-->
      
                        
                        <!--<p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('apontamento_res_form.php');">
                                    <img src="../img/lista-de-controle.png" width="40">&nbsp;Apontamento Ponto
                                </a>
                            </div>
                        </div>-->
                    </div>  
                    <div class="col-sm"> 
                        <h5>Controle de Colaboradores</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('colaborador_res_form.php');">
                                    <img src="../img/colaboradores.png" width="40">&nbsp;Colaboradores
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenuMovimentar('inc_agenda_escala_res_form.php');">
                                    <img src="../img/escala_cadastro.fw.png" width="40">&nbsp;Escala Colaborador
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: fcAbrirModalPainelApontamento('','','','');">
                                    <img src="../img/apontamento.png" width="40">&nbsp;Apontamento por Colaborador
                                </a>
                            </div>
                        </div>
                        
                    </div> 
                    <div class="col-sm"> 
                        <h5>Controle de Escalas</h5>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: fcAbrirPopUpAtraso();">
                                    <img src="../img/cronometro.png" width="40">&nbsp;Painel Expediente Atraso
                                </a>
                            </div>
                        </div>
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenuMovimentar('grid_geral_cad_form.php');">
                                    <img src="../img/grid_escala.jpeg" width="40">&nbsp;Escalas Postos de Trabalho
                                </a>
                            </div>
                        </div>
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenuMovimentar('agenda_colaborador_cad_form.php');">
                                    <img src="../img/calendario.png" width="40">&nbsp;Escala por Colaborador
                                </a>
                            </div>
                        </div>
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenuMovimentar('calendario_escala_cad_form.php');">
                                    <img src="../img/grid_escala.jpeg" width="40">&nbsp;Calendario Escala
                                </a>
                            </div>
                        </div>
                        
                       
                    </div>  

                </div>
                <br>
                <hr>
                <div class="row">
                   <div class="col-sm"> 
                        <h5>Controle de Ocorrências</h5>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('ocorrencia_res_form.php');">
                                    <img src="../img/lista-de-controle.png" width="40">&nbsp;Ocorrências
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm"> 
                        <h5>Agenda de Retorno</h5>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('agenda_retorno_cad_form.php');">                    
                                    <img src="../img/calendario.png" width="40">&nbsp;Agenda de Retorno
                                </a>
                            </div>
                        </div>
                    </div>
                   <div class="col-sm"> 
                       &nbsp;
                   </div>    
                </div>
            </div>    
        </div>
        
        </div>
    </div>
</div>
<?php
include "../inc/php/footer.php";
?>
