<?
include "../inc/php/header.php";
$token = $_REQUEST['token'];
?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h4>Relatórios</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row"> 
                    <div class="col-sm"> 
                        <h4>Operacional</h4>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('menu_relatorios_lead.php');">
                                    <img src="../img/predio1.png" width="40">&nbsp;Posto(s) de Trabalho / Contrato(s)
                                </a>
                            </div>
                        </div>  
                        <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('menu_relatorios_colaborador.php');">
                                <img src="../img/colaboradores.png" width="40">&nbsp;Colaborador(es)
                            </a>
                        </div>
                        <br>
                        <div class=' col-sm text-left'>
                            <a href="javascript: abrirMenu('menu_relatorios_escala.php');">
                                <img src="../img/calendario.png" width="40">&nbsp;Escala(s)
                            </a>
                        </div>
                    </div> 
                    <div class="col-sm"> 
                         <h4>Serviços</h4>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('menu_relatorios_ponto_falta.php');">
                                    <img src="../img/registro_ponto.png" width="40">&nbsp;Registro Ponto e Faltas
                                </a>
                            </div>
                        </div>  
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('menu_relatorios_estoque.php');">
                                    <img src="../img/fabrica.png" width="40">&nbsp;Estoque(s)
                                </a>
                            </div>
                        </div>  
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('menu_relatorios_financeiro.php');">
                                    <img src="../img/visao_grafico.png" width="40">&nbsp;Financeiro(s)
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('menu_relatorios_ocorrencia.php');">
                                    <img src="../img/lista-de-controle.png" width="40">&nbsp;Ocorrência(s)
                                </a>
                            </div>
                        </div>  
                    </div>  
                    
                </div>
            </div>
        </div>
    </div>
      
        
    </div>
<?
include "../inc/php/footer.php";
?>
