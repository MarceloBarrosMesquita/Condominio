<?
require_once "../inc/php/header.php";
?>

<script src="lead_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Leads</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <form id="form" class="form">
        <div class='row'>
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" >Dados Cadastrais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contatos-tab" data-toggle="tab" href="#contatos" role="tab" aria-controls="contatos" >Contatos</a>
            </li>
            <!--li class="nav-item">
                <a class="nav-link" id="contatos-tab" data-toggle="tab" href="#desconto" role="tab" aria-controls="desconto" >Descontos</a>
            </li-->
            <li class="nav-item">
                <a class="nav-link" id="contatos-tab" data-toggle="tab" href="#imposto" role="tab" aria-controls="imposto" >Impostos</a>
            </li>
            <li class="nav-item" id="exibir_material" >
                <a class="nav-link" id="contatos-tab" data-toggle="tab" href="#materiais" role="tab" aria-controls="materiais" >Materiais</a>
            </li>
        </ul>
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <div class="label-float">
                            <label>Tipo Lead:</label>
                            <select id="ic_tipo_lead" class='form-control form-control-sm ' name="ic_tipo_lead">
                                <option value="1">Cliente</option>
                                <option value="2">Posto de Trabalho</option>
                            </select>
                            
                        </div>
                    </div>                    
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ds_lead" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <strong style="color: red">Por favor, informe Tipo Lead</strong>
                    </div>
                </div>
                <div class='row' id="lead_pai">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <div class="label-float">
                            <label>Cliente pai:</label>
                            <select id="leads_pai_pk" class='form-control form-control-sm chzn-select' name="leads_pai_pk">
                                <option ></option>
                            </select>
                            
                        </div>
                    </div>                    
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <div class="label-float">
                            <label>Lead - Nome do Cliente</label>
                            <input type="text" id="ds_lead" class='form-control form-control-sm' name="ds_lead" maxlength="100" placeholder=" " />
                            
                        </div>
                    </div>                    
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ds_lead" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <strong style="color: red">Por favor, informe Lead</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <div class="label-float">
                            <label>Razão Social</label>
                            <input type="text" id="ds_razao_social" class='form-control form-control-sm' name="ds_razao_social" maxlength="100" placeholder=" "/>                            
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>Cpf/Cnpj</label>
                            <input type="text" id="ds_cpf_cnpj" class='form-control form-control-sm' name="ds_cpf_cnpj" maxlength="18" placeholder=" "/>                            
                        </div>
                    </div>

                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>IE</label>
                            <input type="text" id="ds_ie" class='form-control form-control-sm' name="ds_ie" maxlength="20" placeholder=" "/>                            
                        </div>
                    </div>
                </div>
                <div class='row' id="alert_cnpj" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <strong style="color: red">Informe o CPF/CNPJ.</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <div class="label-float">
                            <label>CEP</label>
                            <input type="text" id="ds_cep" class='form-control form-control-sm' name="ds_cep" maxlength="9" placeholder=" " requered/>                            
                        </div>
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ds_cep" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <strong style="color: red">Por favor, informe CEP</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <div class="label-float">
                            <label>Endereço</label>
                            <input type="text" id="ds_endereco" class='form-control form-control-sm' name="ds_endereco" maxlength="100" placeholder=" " requered/>                            
                        </div>
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ds_endereco" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <strong style="color: red">Por favor, informe Endereço</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>Nr</label>
                            <input type="text" id="ds_numero" class='form-control form-control-sm' name="ds_numero" maxlength="10" placeholder=" " requered="true"/>                            
                        </div>
                    </div>

                    <div class='col-md-3'>
                        <div class="label-float">
                            <label>Complemento</label>
                            <input type="text" id="ds_complemento" class='form-control form-control-sm' name="ds_complemento" maxlength="10" placeholder=" "/>                            
                        </div>
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ds_numero" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <strong style="color: red">Por favor, informe Numero</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <div class="label-float">
                            <label>Bairro</label>
                            <input type="text" id="ds_bairro" class='form-control form-control-sm' name="ds_bairro" maxlength="45" placeholder=" " requered/>                            
                        </div>
                    </div>

                    <div class='col-md-3'>
                        <div class="label-float">
                            <label>Cidade</label>
                            <input type="text" id="ds_cidade" class='form-control form-control-sm' name="ds_cidade" maxlength="45" placeholder=" " requered/>                            
                        </div>
                    </div>
                    
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_cidade_bairro" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3' id="alert_ds_bairro" style="display:none">
                        <strong style="color: red">Por favor, informe Bairro</strong>
                    </div>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class='col-md-3' id="alert_ds_cidade" style="display:none">
                        <strong style="color: red">Por favor, informe Cidade</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                   <div class='col-md-2'>
                        <label for='ds_uf'>UF:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='ds_uf' name='ds_uf' requered/>
                            <option></option>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>DF</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>
                            <option>SP</option>
                            <option>SE</option>
                            <option>TO</option>
                        </select>
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ds_uf" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-3' >
                        <strong style="color: red">Por favor, selecione UF</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>Telefone</label>
                            <input type="text" id="ds_tel_lead" class='form-control form-control-sm' name="ds_tel_lead"  placeholder=" " />                            
                        </div>
                    </div>

                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>Fax</label>
                            <input type="text" id="ds_fax" class='form-control form-control-sm' name="ds_fax"  placeholder=" " />                            
                        </div>
                    </div>
                    
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <div class="label-float">
                            <label>Email</label>
                            <input type="text" id="ds_email_lead" class='form-control form-control-sm' name="ds_email_lead" maxlength="80"  placeholder=" " />                            
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>Site</label>
                            <input type="text" id="ds_site" class='form-control form-control-sm' name="ds_site" maxlength="80"  placeholder=" " />                            
                        </div>
                    </div>

                    <div class='col-md-2'>
                        <div class="label-float">
                            <label>Qtde Torres</label>
                            <input type="text" id="n_qtde_torres" class='form-control form-control-sm' name="n_qtde_torres"  placeholder=" " />                            
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='supervisores_pk'>Supervisor:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='supervisores_pk' name='supervisores_pk' />
                            <option></option>
                        </select>
                    </div>
                    <div class='col-md-4'>
                        <label for='responsavel_pk'>Responsavel Comercial:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='responsavel_pk' name='responsavel_pk' />
                            <option></option>
                        </select>
                    </div>                    
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                   <div class='col-md-2'>
                        <label for='ds_uf'>Segmento:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='segmentos_pk' name='segmentos_pk' requered/>
                            <option></option>
                            <option value="1">Condomínios</option>
                            <option value="2">Escolas</option>
                            <option value="3">Escritórios</option>
                            <option value="4">Industrias</option>
                            <option value="5">Residencial</option>
                            <option value="6">Pós obra</option>
                        </select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <label for='ic_cliente'>Cliente:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='ic_cliente' name='ic_cliente' requered/>
                            <option></option>
                            <option value='1'>Sim</option>
                            <option value='2'>Não</option>
                        </select>
                    </div>
                    <div class='col-md-2'>
                        <label for='ic_cliente'>Data Vencimento:&nbsp;</label>
                        <input type='text' class='form-control form-control-sm'  id='dt_vencimento' name='dt_vencimento' maxlength='10'/>
                    </div>
                </div>
                <!----------------------ALERT------------------>
                <div class='row' id="alert_ic_cliente" style="display:none">
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-2' >
                        <strong style="color: red">Por favor, Selecione Cliente</strong>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-2'>
                        &nbsp;
                    </div>
                    <div class='col-md-8'>
                        <label for='ds_obs'>Observação:&nbsp;</label>
                        <textarea class='form-control form-control-sm' id='ds_obs' name='ds_obs'></textarea>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="contatos" role="tabpanel" aria-labelledby="contatos-tab">
                <br>
                <div class='row'>
                    <div class='col-md-12'>
                        <button type="button" id="btn_modal" class="btn btn-primary" >Incluir Contato</button>
                    </div>
                </div>
                <br>
                <div class="row" id="ic_grid">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered nowrap " style="width:100%" id="tblContatos">
                            <thead >
                                <tr>
                                <th>Código</th>
                                <th>Contato</th>
                                <th>Email</th>
                                <th>Cel</th>
                                <th>Whatsapp</th>
                                <th>ic_whatsapp</th>
                                <th>Tel</th>
                                <th>Função</th>
                                <th>cargos_pk</th>
                                <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="materiais" role="tabpanel" aria-labelledby="materiais-tab">
                <br>
                <?php  include("inc_movimentar_material_prod_res_form.php"); ?>
            </div>
            <div class="tab-pane fade" id="desconto" role="tabpanel" aria-labelledby="desconto-tab">
                <br>
                <?php  include("inc_lead_desconto_res_form.php"); ?>
            </div>
            <div class="tab-pane fade" id="imposto" role="tabpanel" aria-labelledby="materiais-tab">
                <br>
                <?php  include("inc_lead_imposto_res_form.php"); ?>
            </div>
        <p>    
        <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'> 
        <p>
        <div class="row">
            <div class="col-md-12" align="center">                
                <button type="button" class="btn btn-secondary" id="cmdCancelar">Cancelar</button>
                &nbsp;                
                <button type="button" class="btn btn-primary" id="cmdEnviarTudo">Salvar</button>
            </div>
        </div>
    </form>
    <form id="form_contato" class="form">
                <!-- Inicio janeja modal para edicao do registro -->
                <div class="modal fade bd-example-modal-lg" id="janela_contatos" >
                    <div class="modal-dialog modal-lg" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="janela_contatosLabel">Novo Contato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    
                                    <input type='hidden' class='form-control form-control-sm'  id='contatos_pk' name='contatos_pk'>
                                    <input type='hidden' class='form-control form-control-sm'  id='acao' name='acao'>
                                    
                                    <div class="row">
                                        <div class='col-md-4'>
                                            <label for='ds_contato'>Contato: </label>
                                            
                                            <input type='text' class='form-control form-control-sm'  id='ds_contato' name='ds_contato' required>
                                        </div>
                                        <div class='col-md-4'>
                                            <label for='ds_cel'>Celular: </label>
                                            <input type='text' class='form-control form-control-sm'  id='ds_cel' name='ds_cel' required>
                                        </div>                                
                                        <div class='col-md-2'>
                                            <label for='ic_whatsapp'>Whatsapp: </label>
                                            <select class='form-control form-control-sm'  id='ic_whatsapp' name='ic_whatsapp' required>
                                                <option value=""></option>
                                                <option value="1">Sim</option>
                                                <option value="2">Não</option>
                                            </select>
                                        </div>
                                        <div id='alert_contato'></div>
                                        <div class='col-md-4' >
                                            <label for='ds_tel'>Telefone: </label>
                                            <input type='text' class='form-control form-control-sm' size='20' attrname='ds_tel_contato' id='ds_tel_contato' name='ds_tel_contato'>
                                        </div>                                
                                        <div class='col-md-4'>
                                            <label for='ds_email'>E-mail: </label>
                                            <input type='text' class='form-control form-control-sm'  id='ds_email' name='ds_email'  >
                                           
                                        </div>     
                                        <div class='col-md-3'>
                                            <label for='cargos_pk'>Função: </label>
                                            <select class='form-control form-control-sm'  id='cargos_pk' name='cargos_pk' /><option></option></select>
                                        </div>
                                    </div>                                                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary" id="cmdEnviarContato"  name="cmdEnviarContato">Salvar</button>
                                </div>
                            
                            </div>
                        

                    </div>
                </div>   
                
                
            </div>            
        </form>
</div>
        
<?include("inc_lead_imposto_cad_form.php");?>       
        
<?include("inc_lead_desconto_cad_form.php");?>    
        
        
<?require_once "../inc/php/footer.php";?>
