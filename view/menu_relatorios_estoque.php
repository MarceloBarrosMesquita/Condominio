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
            <h4>Estoque(s)</h4>
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
                        <h5>Lançamento Estoque</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_estoque_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Estoque Atual Sintético
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_estoque_atual_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Estoque Atual Análitico por Data
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_estoque_minimo_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Estoque Mínimo
                                </a>
                            </div>
                        </div> 
                    </div> 
                    <div class="col-sm"> 
                        <h5>Movimentação de Estoque </h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_estoque_movimentado_troca_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Estoque Movimentação
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_estoque_carga_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Estoque Carga Inicio Posto Análitico
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_estoque_carga_sintetico_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Estoque Carga Inicio Posto Sintético
                                </a>
                            </div>
                        </div> 
                        <br>
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
