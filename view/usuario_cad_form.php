<?
require_once "../inc/php/header.php";
?>

<script src="usuario_cad_form.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Usuário</h4>
        </div>
    </div>
    <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
    <form id="form" class="form">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" >Dados Cadastrais</a>
            </li>
            <!--li class="nav-item">
                <a class="nav-link" id="controle_ponto-tab" data-toggle="tab" href="#controle_ponto" role="tab" aria-controls="controle_ponto" >Ponto</a>
            </li-->
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Dados Cadastrais</h4>
                    </div>
                </div>
                
                <div class='row'>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <label for='grupos_pk'>Grupo:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='grupos_pk' name='grupos_pk' />
                            <option></option>
                        </select>
                    </div>
                </div>
                <div id='exibir_lead' style='display:none'>
                    <div class="row" >
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                        <div class='col-md-3'>
                            <label for='clientes_pk'>Lead</label>
                            <select class='form-control form-control-sm chzn-select'  id='leads_pk' name='leads_pk'>
                                <option></option>
                            </select>

                        </div>
                    </div>
                    <div class='row' id="alert_ds_lead" style="display:none">
                        <div class='col-md-4'>
                            &nbsp;
                        </div>
                        <div class='col-md-3'>
                            <strong style="color: red">Por favor, informe Lead</strong>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <label for='ds_usuario'>Usuário:&nbsp;</label>
                        <input type='text' class='form-control form-control-sm' id='ds_usuario' name='ds_usuario' required >
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class='col-md-4'>
                        <label for='ds_login'>Login/E-mail:&nbsp;</label>
                        <input type='text' class='form-control form-control-sm' id='ds_email' name='ds_email' required >
                    </div>
                </div>
                <br>
                <div class='row'>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class="form-group">
                        <label for='ds_senha'>&nbsp;&nbsp;&nbsp;&nbsp;Redefinir Senha:</label>
                    </div>
                    <div class='col-md-2'>
                        <input  type='checkbox' id='ic_senha' name='ic_senha' />
                        <input class='form-control form-control-sm' type='hidden' id='ds_senha' name='ds_senha' />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class='col-md-3'>
                        <label for='ds_cel'>Cel:&nbsp;</label>
                        <input type='text' class='form-control form-control-sm' id='ds_cel' name='ds_cel' >
                    </div>

                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        &nbsp;
                    </div>
                    <div class='col-md-2'>
                        <label for='ic_status'>Status:&nbsp;</label>
                        <select class='form-control form-control-sm'  id='ic_status' name='ic_status' />
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
                        </select>
                    </div>
                </div>
                <p>
                <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>
                <p>
            </div>
            <div class="tab-pane fade" id="controle_ponto" role="tabpanel" aria-labelledby="controle_ponto-tab">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Ponto</h4>
                    </div>
                </div>
                
                <br>
                <div class='row'>
                    <div class='col-md-12'>
                        <table class="table table-striped table-bordered nowrap" style="width:100%" id='tblAgendaTurno'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Domingo</th>
                                    <th>Segunda</th>
                                    <th>Terça</th>
                                    <th>Quarta</th>
                                    <th>Quinta</th>
                                    <th>Sexta</th>
                                    <th>Sabado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <input type="hidden" name="usuario_ponto_pk" id="usuario_ponto_pk">
                                    <td>Dia</td>
                                    <td>
                                        <input type='checkbox' name='ic_dom' id='ic_dom' />
                                    </td>
                                    <td>
                                        <input type='checkbox' name='ic_seg' id='ic_seg' />
                                    </td>
                                    <td>
                                        <input type='checkbox' name='ic_ter' id='ic_ter' />
                                    </td>
                                    <td>
                                        <input type='checkbox' name='ic_qua' id='ic_qua' />
                                    </td>
                                    <td>
                                        <input type='checkbox' name='ic_qui' id='ic_qui' />
                                    </td>
                                    <td>
                                        <input type='checkbox' name='ic_sex' id='ic_sex' />
                                    </td>
                                    <td>
                                        <input type='checkbox' name='ic_sab' id='ic_sab' />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Turno</td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='dom_turnos_pk' name='dom_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='seg_turnos_pk' name='seg_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='ter_turnos_pk' name='ter_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='qua_turnos_pk' name='qua_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='qui_turnos_pk' name='qui_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='sex_turnos_pk' name='sex_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class='form-control form-control-sm'  id='sab_turnos_pk' name='sab_turnos_pk'>
                                            <option></option>
                                        </select>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Hora</td>
                                    <td>
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_dom' id='hr_entrada_dom' />
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_dom' id='hr_saida_dom' />
                                    </td>
                                    <td>
                                        <input   class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_seg' id='hr_entrada_seg' />
                                        <input   class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_seg' id='hr_saida_seg' />
                                    </td>
                                    <td>
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_ter' id='hr_entrada_ter' />
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_ter' id='hr_saida_ter' />
                                    </td>
                                    <td>
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_qua' id='hr_entrada_qua' />
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_qua' id='hr_saida_qua' />
                                    </td>
                                    <td>
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_qui' id='hr_entrada_qui' />
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_qui' id='hr_saida_qui' />
                                    </td>
                                    <td>
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_sex' id='hr_entrada_sex' />
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_sex' id='hr_saida_sex' />
                                    </td>
                                    <td>
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_entrada_sab' id='hr_entrada_sab' />
                                        <input  class='form-control form-control-sm' maxlength="5" type='type' name='hr_saida_sab' id='hr_saida_sab' />
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div id="alert" style="display:none" >
                    <strong style="color: red">Selecione o Turno</strong>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12" align="center">                
                    <button type="button" class="btn btn-secondary" id="cmdCancelar">Cancelar</button>
                    &nbsp;
                    <button type="submit" class="btn btn-primary" id="cmdEnviar">Salvar</button> 
                </div>
            </div>
        </div>
    </form>
</div>
<?
require_once "../inc/php/footer.php";
?>
