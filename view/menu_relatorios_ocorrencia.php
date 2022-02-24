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
            <h4>Ocorrência(s)</h4>
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
                        <h5>Ocorrência</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_ocorrencia_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Relatório de Ocorrências
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_ocorrencia_tempo_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Ocorrências Tempo
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_sla_ocorrencia_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;SLA Ocorrência(s)
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
