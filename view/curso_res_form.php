<?
require_once "../inc/php/header.php";
?>
<script src="curso_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Exame/Curso</h2>
        </div>
    </div>
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for="ds_curso">Exame/Curso:&nbsp;</label>
                <input type="text" class="form-control form-control-sm" id="ds_curso" required="true">
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
                &nbsp;
                <button type="button" class="btn btn-link" id="cmdIncluir"><img src="../img/incluir.png" width=40 height=40>Incluir</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblResultado">
            <thead>
                <tr>
                    <th>Código</th>
                    
                    <th>Exame/Curso</th>
                    <th>Status</th>

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
