<?php
include "../inc/php/header.php";
$token = $_REQUEST['token'];
?>
<div class="container">  
    <div class="row">
        <div class="col-sm">
            <h3>Cpainel</h3> 
        </div>
    </div>  
    <div class="row">
        <div class="container" >
            <div class="modal-content" style="box-shadow: 2px 2px 5px grey;">
                <div class="modal-body">
                    <div class="row">
                       <div class="col-sm"> 
                           <h5>Permissões de acesso / Módulos/ Conta</h5>       
                           <div class="text-left">
                                <div class=' col-sm text-left'>
                                    <a href="javascript: abrirMenu('modulo_res_form.php');"> 
                                        <p><i class="fa fa-cogs" style="font-size: 20px;"></i> Módulos do Sistema</p> 
                                    </a> 
                                </div>
                           </div>   
                           <p>
                           <div class="text-left">
                                <div class=' col-sm text-left'>
                                    <a href="javascript: abrirMenu('grupo_res_form.php');">
                                        <img src=../img/grupo.png width="40">&nbsp;Grupos de Acesso
                                    </a>
                                </div>
                            </div> 
                           <p>
                           <div class="text-left">
                                <div class=' col-sm text-left'>
                                    <a href="javascript: abrirMenu('conta_res_form.php');">
                                         <img src=../img/modulos.png width="40">&nbsp;Conta
                                     </a>
                                </div>
                            </div>          
                       </div>                      
                       <div class="col-sm"> 
                            <h5>Generos</h5> 
                            <div class="text-left">
                                <div class=' col-sm text-left'>
                                    <a href="javascript: abrirMenu('genero_res_form.php');">
                                        <img src=../img/genero.png width="40">&nbsp;Gêneros
                                    </a>
                                </div>
                            </div>
                        </div> 
                       <div class="col-sm"> 
                        <h5>Processos / Pausas</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('processo_default_res_form.php');">
                                    <img src=../img/processo.png width="40">&nbsp;Processos Default
                                </a>
                            </div>
                        </div>  
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('motivo_pausa_res_form.php');">
                                    <img src=../img/ausencia.png width="40">&nbsp;Motivos Pausa
                                </a>
                            </div>
                        </div>
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
