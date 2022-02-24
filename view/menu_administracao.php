<?
include "../inc/php/header.php";
$token = $_REQUEST['token'];
?>
<div class="container">  
    <div class="row">
        <div class="col-sm">
            <h4>Administração</h4> 
        </div>
    </div> 
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="col-sm">
            <h5>Recursos Humanos / Controles App</h5>
        </div>
    </div>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row">  
                     <div class="col-sm">
                        <h5>Colaboradores / Ponto (App)</h5> 
                         <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('colaborador_res_form.php');">
                                    <img src="../img/colaboradores.png" width="40">&nbsp;Colaboradores
                                </a>
                            </div>
                        </div>
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('solicitacao_liberacao_app_res_form.php');">
                                    <img src=../img/ponto_eletronico.png  width="40">&nbsp;Controle Ponto App                                    
                                </a>
                            </div>
                        </div>                      
                    </div>
                    <div class="col-sm"> 
                        <h5>Folha Ponto </h5> 
                         <!--div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('folha_ponto_res_form.php');">
                                    <img src="../img/folha_ponto.jpeg" width="40">&nbsp;Folha Ponto
                                </a>
                            </div>
                        </div-->
                        <p>
                         <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('apontamento_folha_ponto_posto_trabalho_res_form.php');">
                                    <img src="../img/iconePontoFw.png" width="40">&nbsp;Folha Ponto Gerar / Apontamento
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm"> 
                        <h5>Benefícios</h5> 
                        <div class="text-left">
                            <div class=' col-sm'>
                                <a href="javascript: abrirMenu('beneficio_res_form.php');">
                                    <img src=../img/beneficios.png width="50">&nbsp;Benefícios
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <h5>Controle do Sistema</h5>
        </div>
    </div>
    <div class="row">
        <div class="modal-content" style="box-shadow: 2px 2px 5px grey;"> 
            <div class="modal-body"> 
                <div class="row">  
                     <div class="col-sm">
                        <h5>Usuários</h5> 
                         <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('usuario_res_form.php');">
                                    <img src=../img/usuarios.png width="40">&nbsp;Usuários
                                </a>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-sm"> 
                        <h5>Serviço / Ocorrências</h5> 
                         <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('produto_servico_res_form.php');">
                                    <img src=../img/produto_servico.png width="40">&nbsp;Serviços Prestados
                                </a>
                            </div>
                        </div>  
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('tipo_ocorrencia_res_form.php');">
                                    <img src=../img/tipos_ocorrencia.png width="40">&nbsp;Tipos Ocorrências
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm"> 
                        <h5>Cargos / Equipes / Cursos</h5> 
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('cargo_res_form.php');">
                                    <img src=../img/funcao.png width="40">&nbsp;Cargos
                                </a>
                            </div>
                        </div>  
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('equipe_res_form.php');">
                                    <img src=../img/equipe.png width="40">&nbsp;Equipes
                                </a>
                            </div>
                        </div>                       
                        <p>
                        <div class="text-left">
                            <div class=' col-sm text-left'>
                                <a href="javascript: abrirMenu('curso_res_form.php');">
                                    <img src=../img/formulario.jpg width="40">&nbsp;Exames/Cursos
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
