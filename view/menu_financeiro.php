<?
include "../inc/php/header.php";
$token = $_REQUEST['token'];
?>
<div class="container">  
    <div class="row">
        <div class="col-sm">
            <h4>Financeiro</h4> 
        </div>
    </div> 
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row">  
                     <div class="col-sm"> 
                        <h5>Contas / Plano de Contas</h5> 
                        
                        <?if(permissao("contas_bancarias", "cons", $token)){?>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('conta_bancaria_res_form.php');">
                                    <img src=../img/contas_bancarias.png width="40">&nbsp;Contas Bancarias
                                </a>
                            </div>
                        </div>  
                        <?}?>
                        <p>
                        <?if(permissao("plano_contas", "cons", $token)){?>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('plano_contas_res_form.php');">
                                    <img src=../img/plano_contas.png width="40">&nbsp;Tipo Operação / Planos Conta
                                </a>
                            </div>
                        </div>
                        <?}?>
                                                
                    </div>  
                    <div class="col-sm"> 
                        <h5>Controle Despesas e Receitas</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('lancamento_res_form.php');">
                                    <img src=../img/visao_grafico.png width="40">&nbsp;Contas a Pagar e Receber
                                </a>
                            </div>
                        </div> 
                        <br>
                        <!--div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('fatura_res_form.php');">
                                    <img src=../img/fatura.png width="40">&nbsp;Fatura
                                </a>
                            </div>
                        </div-->                                  
                    </div>  
                </div>
            </div>
        </div>
    </div>   
</div>    
<?
include "../inc/php/footer.php";
?>
