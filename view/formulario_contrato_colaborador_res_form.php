<?
require_once "../inc/php/header.php";
?>
<script src="formulario_contrato_colaborador_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Formulário</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="ds_genero">Formulário:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="ds_genero" required="true">
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
                    <th>Formulário</th>

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
require_once "../inc/php/footer.php";
?>
