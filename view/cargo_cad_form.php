<?
require_once "../inc/php/header.php";
?>

<script src="cargo_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Cargos</h4>            
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <form id="form" class="form">

        <div class='row'>
            <div class='col-md-4'>
                &nbsp;
            </div>
            <div class='col-md-4'>
                <label for='ds_cargo'>Cargo:&nbsp;</label>
                <input type='text' class='form-control form-control-sm' id='ds_cargo' name='ds_cargo' required >
            </div>
        </div>      
        <p>  
        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
        <p>
        <div class="row">
            <div class="col-md-12" align="center">
                
                <button type="button" class="btn btn-secondary" id="cmdCancelar">Cancelar</button>    
                &nbsp;
                <button type="submit" class="btn btn-primary" id="cmdEnviar">Salvar</button>
                
            </div>
        </div>
    </form>
</div>
<?
require_once "../inc/php/footer.php";
?>
