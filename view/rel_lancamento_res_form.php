<?
require_once "../inc/php/header.php";
?>
<script src="rel_lancamento_res_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
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
            <h4>Relatório Lançamento</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <form id="form" class="form">
        <div class='row'>
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-3'>
                <label for='vl_lancamento'>Data Vencimento  Inicío:&nbsp;</label>
                <input type="text" class='form-control form-control-sm' id="dt_vencimento_ini" name="dt_vencimento_ini"/> 
            </div>
            <div class='col-md-3'>
                <label for='vl_lancamento' >Data Vencimento Fim</label>
                <input type="text" class='form-control form-control-sm' id="dt_vencimento_fim" name="dt_vencimento_fim"/> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-3'>
                <label for='tipos_operacao_pk'>Tipo Lançamento:&nbsp;</label>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-2'>
                <input type="checkbox" id="tipo_lancamento_receita">&nbsp;Receita
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-2'>
                <input type="checkbox" id="tipo_lancamento_despesa">&nbsp;Despesa
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-6'>
                <label for='tipos_operacao_pk'>Empresa para o lançamento:&nbsp;</label>
                <select class='form-control form-control-sm chzn-select'  id='empresas_pk' name='empresa_pk'/>
                    <option value=""></option>
                </select>  
            </div> 
        </div>
        <div class='row'>
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-3'>
                <label for='tipo_grupo_pk'>Grupo Origem do Lançamento:&nbsp;</label>
                <select class='form-control form-control-sm chzn-select'  id='tipo_grupo_pk' name='tipo_grupo_pk'/>
                    <option value=""></option>
                    <option value="1">Leads (Clientes)</option>
                    <option value="2">Colaboradores</option>
                    <option value="3">Fornecedores</option>
                </select>  
            </div>
            <div class='col-md-3'>
                <label for='vl_lancamento' class='recebido_de_pago_para'>Recebido de ? / Pago de ?:</label>
                <select class='form-control form-control-sm chzn-select'  id='grupo_leancamento_pk' name='grupo_leancamento_pk'/>
                    <option value=""></option>
                </select>  
            </div>
        </div>
        
        <div class='row'>
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class='col-md-3'>
                <label for='tipos_operacao_pk'>Status:&nbsp;</label>
                <select class='form-control form-control-sm chzn-select'  id='ic_status' name='ic_status' />
                    <option value=""></option>
                    <option value="2">Pendente</option>
                    <option value="3">Aprovado</option>
                    <option value="4">Atrasado</option>
                    <option value="5">Cancelado</option>
                </select>  
            </div>
            <div class='col-md-3'>
                <label for='tipos_operacao_pk'>Usuário Cadastro:&nbsp;</label>
                <select class='form-control form-control-sm chzn-select'  id='usuario_cadastro_pk' name='usuario_cadastro_pk' />
                    <option value=""></option>
                </select>  
            </div>
        </div>    
        
        <br>
        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
        <p>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4" align="center">
                <button type="button" class="btn btn-secondary" id="cmdCancelar">Voltar</button>
                <button type="submit" class="btn btn-primary" id="cmdEnviar">Gerar Relatório</button>                
            </div>
        </div>
        <br>
    </form>
</div>
<?
require_once "../inc/php/footer.php";
?>
