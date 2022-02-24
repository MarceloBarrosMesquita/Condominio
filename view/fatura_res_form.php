<?
require_once "../inc/php/header.php";
?>
<script src="fatura_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<style>
    @import "bourbon";
      .label-float{
  position: relative;
  padding-top: 13px;
}

.label-float input[type=text]{
  border: 0;
  border-bottom: 2px solid lightgrey;
  outline: none;
  min-width: 300px;
  font-size: 16px;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  
  border-radius:0;
}

.label-float input[type=text]:focus{
  border-bottom: 2px solid #3951b2;
}

.label-float input[type=text]:placeholder{
  color:transparent;
}

.label-float label{
  pointer-events: none;
  position: absolute;
  top: 0;
  left: 0;
  margin-top: 13px;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
}

.label-float input[type=text]:required:invalid + label{
  color: red;
}
.label-float input[type=text]:focus:required:invalid{
  border-bottom: 2px solid red;
}
.label-float input:required:invalid + label:before{
  content: '*';
}
.label-float input[type=text]:focus + label,
.label-float input[type=text]:not(:placeholder-shown) + label{
  font-size: 13px;
  margin-top: 0;
  color: #3951b2;
}


</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Fatura</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <form method="post">
        <div class="row" > 
            <div class="col-md-2">
                &nbsp;
            </div>
         </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <label for="produtos_servicos_pk">Empresa:&nbsp;</label>
                <select id="empresa_pk_pesq" class="form-control form-control-sm chzn-select" name="empresa_pk_pesq">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-2">
                <label for="produtos_servicos_pk">Data Início:&nbsp;</label>
                <input type="text" id="dt_inicio_fatura_pesq" class="form-control form-control-sm" name="dt_inicio_fatura_pesq">
            </div>
            <div class="col-md-2">
                <label for="produtos_servicos_pk">Data Fim:&nbsp;</label>
                <input type="text" id="dt_fim_fatura_pesq" class="form-control form-control-sm" name="dt_fim_fatura_pesq">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <label for="produtos_servicos_pk">Posto de Trabalho:&nbsp;</label>
                <select id="leads_pk" class="form-control form-control-sm chzn-select" name="leads_pk">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4" align="center">
                <button type="button" class="btn btn-link" id="cmdPesquisarFaturamento"><img src="../img/pesquisar.png" width=40 height=40>Pesquisar</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-link" id="cmdIncluirFaturamento"><img src="../img/incluir.png" width=40 height=40>Gerar </button>
                <!--button type="button" class="btn btn-link" id="fcCarregarUPD"><img src="../img/incluir.png" width=40 height=40>UPD </button-->
            </div>
        </div>
    </form>
     <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <p>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tblResultadoFaturamento">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Lead</th>
                    <th>Tipo Contrato</th>
                    <th>Data Gerada</th>
                    <th>Período</th>
                    <th>Dt. Cancelamento</th>
                    <th>Obs. Cancelamento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="janela_folha" >
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="janela_contatosLabel">Faturamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4">
                    <label for="produtos_servicos_pk">Empresa:&nbsp;</label>
                    <select id="empresa_pk_cad" class="form-control form-control-sm chzn-select" name="empresa_pk_cad">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4">
                    <label for="produtos_servicos_pk">Tipo Contrato:&nbsp;</label>
                    <select id="tipo_contrato_pk" class="form-control form-control-sm chzn-select" name="tipo_contrato_pk">
                        <option></option>
                        <option value="1">Contrato / Extra</option>
                        <option value="2">Aditivo</option>
                        <option value="3">Serviço Extra</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    &nbsp;
                </div>
                <div class="col-md-4">
                    <label for="produtos_servicos_pk">Data Início:&nbsp;</label>
                    <input type="text" id="dt_inicio_fatura" class="form-control form-control-sm" name="dt_inicio_fatura">
                </div>
                <div class="col-md-4">
                    <label for="produtos_servicos_pk">Data Fim:&nbsp;</label>
                    <input type="text" id="dt_fim_fatura" class="form-control form-control-sm" name="dt_fim_fatura">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div id="grid_leads"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4" align="center">
                   <button type="button" class="btn btn-primary" id="cmdGerarFaturamento"  name="cmdGerarFaturamento">Gerar Faturamento</button>
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
<div class="modal fade bd-example-modal-lg" id="modal_cancelamento" >
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="janela_contatosLabel">Cancelamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
            <div class="row">
                <div class="col-md-2">
                    &nbsp;
                </div>
                <div class="col-md-8">
                    <label for="produtos_servicos_pk">Motivo de Cancelamento:&nbsp;</label>
                    <input type="hidden" id="pk_cancelamento">
                    <input type="hidden" id="dt_cancelamento">
                    <textarea id="ds_descricao_cancelamento" class="form-control form-control-sm" name="ds_descricao_cancelamento"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div id="grid_leads"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4" align="center">
                   
                </div>
            </div>

        </div>  
        <br>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            &nbsp;
            <button type="button" class="btn btn-primary" id="cmdSalvarCancelamento"  name="cmdSalvarCancelamento">Salvar</button>
            

        </div>
        </div>
    </div>
</div>
<?
require_once "../inc/php/footer.php";
?>
