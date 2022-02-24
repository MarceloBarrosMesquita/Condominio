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
            <h4>Escala(s)</h4>
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
                       <h4>Escala(s)</h4>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('rel_escala_servico_dia_res_form.php');">
                                    <img src="../img/relatorio.png" width="40">&nbsp;Escala de Serviço por Dia
                                </a>
                            </div>
                        </div> 
                        <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_posto_trabalho_x_colaborador_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Posto Trabalho x Colaborador
                            </a>
                        </div>
                        <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_colaborador_sem_escala_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Colaboradores Sem Escala
                            </a>
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
