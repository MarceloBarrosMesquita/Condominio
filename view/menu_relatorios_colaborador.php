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
            <h4>Colaboradores</h4>
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
                       <h4>Colaboradores</h4>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_dados_colaborador_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Dados Colaboradores
                            </a>
                        </div> 
                        <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_pin_colaborador_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Pin por Colaboradores
                            </a>
                        </div>  
                        <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_apontamento_colaborador_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Apontamento(s) Colaborador
                            </a>
                        </div>  
                        <br>
                    </div> 
                    <div class="col-sm"> 
                        
                         <h4>&nbsp;</h4>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_folga_colaborador_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Apontamento de Folga 
                            </a>
                        </div>
                         <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_colaborador_curso_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Vencimento Exames / Cursos
                            </a>
                        </div>
                         <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_colaborador_ferias_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp;Colaboradores em Férias
                            </a>
                        </div>
                         <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('rel_posto_trabalho_x_colaborador_reserva_res_form.php');">
                                <img src="../img/relatorio.png" width="40">&nbsp; Posto Trabalho x Colaborador Reserva
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
