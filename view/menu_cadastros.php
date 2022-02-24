<?
include "../inc/php/header.php";
$token = $_REQUEST['token'];
?>
<div class="container">  
    <div class="row">
        <div class="col-sm">
            <h4>Compras</h4> 
        </div>
    </div> 
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row">  
                    <div class="col-sm"> 
                        <h5>Compras</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('compra_res_form.php');">
                                    <img src=../img/carrinho_compra.jpg width="65">&nbsp;Compras
                                </a>
                            </div>
                        </div>                          
                    </div>    
                    <div class="col-sm"> 
                        <h5>Categoria/Fornecedor</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('categoria_produto_res_form.php');">
                                    <img src=../img/tipos_ocorrencia.png width="40">&nbsp;Categorias Produtos
                                </a>
                            </div>
                        </div>  
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('fornecedor_res_form.php');">
                                    <img src=../img/fornecedor.png width="40">&nbsp;Fornecedor
                                </a>
                            </div>
                        </div>                        
                    </div>    
                    
                             
                </div>
               
                
            </div>    
        </div>    
     </div>
    <br>    
    <p>
    <div class="row">
        <div class="col-sm">
            <h4>Estoque</h4> 
        </div>
    </div> 
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row">  
                    <div class="col-sm"> 
                        <h5>Produtos Materiais / Estoque</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('produto_res_form.php');">
                                    <img src=../img/codigo-de-barras.png width="40">&nbsp;Produtos - Materiais 
                                </a>
                            </div>
                        </div>
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('entrada_estoque_res_form.php');">
                                    <img src=../img/fabrica.png width="40">&nbsp;Estoque
                                </a>
                            </div>
                        </div>                        
                        <p>
                                                
                                                
                    </div>            
                </div>
            </div>    
        </div>    
     </div>
    <br>
     <p>
    <div class="row">
        <div class="col-sm">
            <h4>Movimentação de Estoque / Baixa Estoque</h4> 
        </div>
    </div> 
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row">  
                    <div class="col-sm"> 
                        <h5>Movimentação Estoque </h5> 
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenuMovimentar('inc_movimentar_material_prod_res_form.php');">
                                    <img src=../img/change.png width="65">&nbsp;Movimentação Estoque
                                </a>
                            </div>
                        </div>                       
                    </div>         
                    <div class="col-sm"> 
                        <h5>Baixa Estoque </h5> 
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('estoque_baixa_res_form.php');">
                                    <img src=../img/leitorQrcode.png width="60">&nbsp;Baixa Estoque 
                                </a>
                            </div>
                        </div>                       
                    </div>         
                </div>
                <p>
            </div>    
        </div>    
     </div>    
</div>    
    
<?
include "../inc/php/footer.php";
?>
