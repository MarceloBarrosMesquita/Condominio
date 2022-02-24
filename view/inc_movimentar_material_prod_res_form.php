<?
require_once "../inc/php/header.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<style>
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}
</style>
<div class="container">
    <div class="row" id="exibir_titulo">
        <div class="col-md-12">
            <h2>Movimentação de Estoque</h2>
        </div>
    </div>
    <div id="exibir_em_menu_estoque">

            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="fornecedor_pk">Grupo Para Movimentação:&nbsp;</label>
                    <select class="form-control form-control-sm chzn-select" id="grupo_para_movimentacao_pk">
                        <option></option>
                        <option value="1">Colaborador(es)</option>
                        <option value="2">Posto(s) de Trabalho</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="fornecedor_pk"><span id='str_opc'></span>&nbsp;</label>
                    <select class="form-control form-control-sm chzn-select" id="movimentar_para_pesq_pk">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="fornecedor_pk">Categorias:&nbsp;</label>
                    <select class="form-control form-control-sm chzn-select" id="categoria_res_pk">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class='col-md-4'>
                    <label for="fornecedor_pk">Produtos:&nbsp;</label>
                    <select class="form-control form-control-sm chzn-select" id="produtos_res_pk">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-2">
                    <label for="ic_status">DT Mov. Ini:&nbsp;</label>
                    <input type="text" class="form-control form-control-sm" id="dt_movimentacao_ini" maxlength="10">
                </div>
                <div class="col-md-2">
                    <label for="ic_status">DT Mov. Fim:&nbsp;</label>
                    <input type="text" class="form-control form-control-sm" id="dt_movimentacao_fim" maxlength="10">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4" align="center">
                    <button type="button" class="btn btn-link" id="cmdPesquisar"><img src="../img/pesquisar.png" width=40 height=40>Pesquisar</button>
                    &nbsp;
                    <button type="button" class="btn btn-link" id="cmdIncluirConjuntoMaterial"><img src="../img/incluir.png" width=40 height=40>Incluir</button>
                </div>
            </div>
    </div>
    <br>
    <div id="exibir_lead_colaborador">
        <input type="hidden" id="grupo_para_movimentacao_pk">
        <input type="hidden" id="movimentar_para_pesq_pk">
        <div class='row'>
            <div class='col-md-12'>
                <button type="button" class="btn btn-primary" id="cmdIncluirConjuntoMaterial">Incluir Movimentação</button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblResultado">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Grupo Movimentação</th>
                    <th>Colaborador/Posto</th>
                    <th>Categoria</th>
                    <!--th>Produto</th-->
                    <th>Qtde</th>
                    <th>DT Movimentação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>


<?
include_once "inc_movimentar_material_prod_cad_form.php";
require_once "../inc/php/footer.php";
?>
