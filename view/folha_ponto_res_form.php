<?
require_once "../inc/php/header.php";
?>
<script src="http://leandrolisura.com.br/wp-content/uploads/2017/07/printThis.js"></script>
<script src="folha_ponto_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
    .starter-template {
        padding: 40px 15px;
        text-align: center;
    }
    .printable {
        display: none;
    }
    /* print styles*/
    @media print {
        .printable {
            display: block;
        }
        .screen {
            display: none;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Colaboradores</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="ds_colaborador">Colaborador:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="ds_colaborador" required="true">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <label for="produtos_servicos_pk">Qualificação:&nbsp;</label>
                <select id="produtos_servicos_pk" class="form-control form-control-sm" name="produtos_servicos_pk">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="ds_colaborador">Pin:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="ds_pin" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <label for="ic_status">Status acesso App Ponto:&nbsp;</label>
                <select id="ic_status_app" class="form-control form-control-sm" name="ic_status_app">
                    <option value=""></option>
                    <option value="1">Liberado</option>
                    <option value="2">Pendente</option>

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="ds_colaborador">RE:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="ds_re" >
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for='generos_pk'>Gênero:&nbsp;</label>
                <select class='form-control form-control-sm'  id='generos_pk' name='generos_pk' >
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <label for="ic_status">Status:&nbsp;</label>
                <select id="ic_status" class="form-control form-control-sm" name="ic_status">
                    <option value=""></option>
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4" align="center">
                <button type="button" class="btn btn-link" id="cmdPesquisar"><img src="../img/pesquisar.png" width=40 height=40>Pesquisar</button>
            </div>
        </div>
    </form>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblResultado">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Colaborador</th>
                    <th>Pin</th>
                    <th>Re</th>
                    <th>Cel</th>
                    <th>Status App</th>                      
                    <th>Status</th>
                    <th>Cel 2</th>
                    <th>Ação</th>
                    
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>
<form id="form" class="form">
    <div class="modal fade bd-example-modal-lg" id="janela_folha" >
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="janela_contatosLabel">Folha Ponto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <input type='hidden' class='form-control form-control-sm'  id='colaboradores_pk' name='colaboradores_pk'>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Data Início:&nbsp;</label>
                        <input type='text' class=" form-control form-control-file" id="dt_periodo_ini" name="dt_periodo_ini"/>
                    </div>
                    <div class='col-md-4'>
                        <label for='processos_pk'>Data Fim:&nbsp;</label>
                        <input type='text' class=" form-control form-control-file" id="dt_periodo_fim" name="dt_periodo_fim"/>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <label for='processos_pk'>Observação:&nbsp;</label>
                        <textarea class=" form-control form-control-file" id="obs" name="obs"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        &nbsp;
                    </div>
                    <div class="col-md-4" align="center">
                       <button type="submit" class="btn btn-primary" id="cmdGerarFolhaPonto"  name="cmdGerarFolhaPonto">Gerar Folha Ponto</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblFolha">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Colaborador</th>
                                <th>Data Ini</th>
                                <th>Data Fim</th>
                                
                                <th>Ação</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>  
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                
            </div>
            </div>
        </div>
    </div>  
</form>
<div class="container">    
    <div class="modal fade bd-example-modal-lg" id="janela_impressao" data-backdrop='static'>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janela_contatosLabel">Impressão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" id="dt_periodo_ini_edit">
                    <input type="hidden" id="dt_periodo_fim_edit">
                    <input type="hidden" id="colaboradores_pk_edit">
                </div>                
                <div class="modal-content bd-example-modal-lg-12">
                    <div class="modal-body" >    
                        <div class='container' id='exibir_informativo_agenda'>  
                            <div class='row'> 
                                <div class='container'> 
                                    <div class='modal-content'> 
                                        <div class='modal-content'>

                                            <div class='modal-body' style='box-shadow: 2px 2px 5px grey;'> 
                                                <div class='row'>       
                                                    <div class='col-md-1' >
                                                        &nbsp;
                                                    </div>
                                                    <div class='col-md-10' style='font-size: 25px; align-content:  center' > 
                                                        <b>FOLHA DE PONTO INDIVIDUAL DE TRABALHO</b>
                                                    </div>  
                                                    <div class='col-md-1' >
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <div class='row ' >
                                                    <div class='col-sm-6 border'>
                                                        <div class='col-md-8'>
                                                            <label >Empregador: Nome/Empresa</label>
                                                            <div id='ds_conta'></div>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-6 border'>                                                     
                                                        <div class='col-md-8' >
                                                             <label >CEI/CNPJ Nº</label>
                                                            <div id='ds_cpf_cnpj_conta' style=' font-size: smaller '></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-sm-6 border'>                                        
                                                        <div class='col-md-12'>
                                                            <label >Enderço:</label>
                                                            <div id='ds_endereco_conta'></div>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-6 border'>
                                                        <div class='col-md-12'>
                                                            <label >Empregado(a):</label>
                                                            <div id='ds_colaborador_imp'></div>
                                                        </div>
                                                    </div>
                                                </div>    
                                                <div class='row'>
                                                    <div class='col-sm-6 border'>                                               
                                                        <div class='col-md-8'>
                                                            <label >CTPS Nº e Série:</label>
                                                            <div id='ds_ctps_serie'></div>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-6 border'>                                
                                                        <div class='col-md-6'>
                                                            <label >Data Admissão:</label>
                                                            <div id='dt_admissao'></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-sm-6 border'>                                      
                                                        <div class='col-md-12'>
                                                            <label >Função:</label>
                                                            <div id='ds_funcao'></div>
                                                        </div>
                                                    </div>  
                                                    <div class='col-sm-6 border'>
                                                        <div class='col-md-8'>
                                                            <label >Mês/Ano:</label>
                                                            <div id='ds_mesAno'></div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div id="grid"></div>
                                                <hr> 
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" align="right" class="btn btn-primary" id="btnImprimirModal">Imprimir</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>      
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="printable"></div>
                <br>
            </div>  
        </div> 
    </div>
</div>
<?
require_once "../inc/php/footer.php";
?>
