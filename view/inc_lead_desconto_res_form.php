<?
include_once "../inc/php/pre_header.php";

?>

<div class="container">
    <!--So aparecer quando o lead estiver cadastrado ou lead_main-->
    <br>
    <div class='row'>
        <div class="col-md-12" >
            <button type='button' class="btn btn-primary" id='cmdIncluirDesconto'>Incluir Desconto</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
             <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblDesconto">
                <thead>
                    <tr>
                        <th>Desconto</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>