<?
include "../inc/php/header.php";
$token = $_REQUEST['token'];
?>
<script>
    
    
function fcCancelar(){
    sendPost("menu_relatorios.php", {token: token});
}
</script>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h4>Registro Ponto e Faltas</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    
    <div class="row">
        <div class="col-sm-5">
            &nbsp;
        </div>
        <div class="col-sm-4">
           <button type="button" class="btn btn-secondary" onclick='fcCancelar()' id="cmdCancelar">Voltar</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row"> 
                    <div class="col-sm"> 
                        <h5>Acompanhamento de Ponto</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_ponto_colaborador_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Acomp Registro Ponto App
                                </a>
                            </div>
                            <br>
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_ponto_colaborador_sintetico_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Acomp Registro Ponto App Sintético
                                </a>
                            </div>
                            <br>
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_ponto_sistema_colaborador_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Registro Ponto Sistema
                                </a>
                            </div>
                        </div>  
                    </div>  
                    <div class="col-sm">
                        <h5>Acompanhamento de Faltas</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_falta_colaborador_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Acomp de Faltas App
                                </a>
                            </div>
                            <br>
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_falta_sistema_colaborador_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Registro Falta Sistema
                                </a>
                            </div>
                        </div>  
                    </div>   
                </div>
                <div class="row"> 
                    <div class="col-sm"> 
                       
                        &nbsp; 
                    </div> 
                    <div class="col-sm"> 
                        &nbsp; 
                    </div>  
                </div>
                
        </div>
    </div>
    
      
        
</div>
<?
include "../inc/php/footer.php";
?>
