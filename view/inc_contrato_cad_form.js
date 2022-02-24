var tblContratos;
var tblContratoItens;
var tblItensContratados;


//--------------------CONTRATOS----------------------------
function carregarComboContratoPai(vlr){
    var contrato_pai_pk = "";
    if(vlr > 0){
        contrato_pai_pk = vlr;
    }
    else{
        contrato_pai_pk = "";
    }
    
    var objParametros = {
        "leads_pk": leads_pk,
        "contratos_pai_pk":contrato_pai_pk,
        "contratos_pk":$("#contratos_pk").val()
    };      
    
    var arrCarregar = carregarController("contrato", "listarContratoPai", objParametros);
    carregarComboAjax($("#contrato_pai_pk"), arrCarregar, " ", "pk", "ds_contrato");
}

function fcCarregarGridContrato(){
    
    var objParametros = {
        "leads_pk": leads_pk,
        "processos_default_pk": processos_default_pk,
        "processos_pk":pk
    };     
    
    var v_url = montarUrlController("contrato", "listarContratoLeadProcesso", objParametros);

    //Trata a tabela
    tblContratos = $('#tblContratos').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "searching": true,
        "paging": true,
        "bFilter": false,
        "bInfo": false,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 src='../img/copiar.png'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            },
           {"targets": -2, "data": "t_dt_cancelamento"},
           {"targets": -3, "data": "t_vl_total"},
           {"targets": -4, "data": "t_ds_tipo_contrato"},
           {"targets": -5, "data": "t_dt_fim_contrato"},
           {"targets": -6, "data": "t_dt_inicio_contrato"},
           {"targets": -7, "data": "t_ds_empresa"},
           {"targets": -8, "data": "t_pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    
    
    //Atribui os eventos na coluna ação.
    $('#tblContratos tbody').on('click', '.function_edit', function () {
        var data;
        
        rLinhaSelecionada = null;
        
        if(tblContratos.row( $(this).parents('li')).data()){
            data = tblContratos.row( $(this).parents('li')).data();
            rLinhaSelecionada = $(this).parents('li');
        }
        else if(tblContratos.row( $(this).parents('tr')).data()){
            data = tblContratos.row( $(this).parents('tr')).data();
            rLinhaSelecionada = $(this).parents('tr');
        }
        fcEditarContrato(data);
        
    } );   
    
    $('#tblContratos tbody').on('click', '.function_delete', function () {
        var data;
        
        if(tblContratos.row( $(this).parents('li') ).data()){
            data = tblContratos.row( $(this).parents('li') ).data();
        }
        else if(tblContratos.row( $(this).parents('tr') ).data()){
            data = tblContratos.row( $(this).parents('tr') ).data();
        }
        
        if(data['t_pk'] != ""){
            fcExcluirContrato(data['t_pk']);
        }
    } ); 
    
    return false;
}
function fcEditarContrato(objRegistro){
    

        $("#contratos_pk").val("");
        $('#contrato_pai_pk').val("");
        $("#dt_inicio_contrato").val("");
        $("#dt_fim_contrato").val("");
        $('#dt_cancelamento_contrato').prop('checked', false);
        $("input[id=dt_cancelamento_contrato]").prop("disabled", false);
        $("#ds_obs_motivo_cancelamento_contrato").val("");
        $("input[id=ds_obs_motivo_cancelamento_contrato]").prop("disabled", false);

        carregarComboContratoPai(objRegistro['t_contratos_pk']);

        tblContratoItens.clear().destroy();
        carregarListaComboProdutoContrato();

        //Carrega as informações da linha selecionada.
        $("#contratos_pk").val(objRegistro['t_pk']);
        $("#dt_inicio_contrato").val(objRegistro['t_dt_inicio_contrato']);
        $("#dt_fim_contrato").val(objRegistro['t_dt_fim_contrato']);
        $("#empresas_pk").val(objRegistro['t_empresas_pk']);

        if(objRegistro['t_ic_tipo_contrato'] == 1){
            $('#ic_contrato').prop('checked', true);
            $('#ic_aditivo').prop('checked', false);
            $('#ic_servico_extra').prop('checked', false);
            $('#contrato_pai_pk').val("");
            $('#exib_contrato_pai').hide();
        }
        else if(objRegistro['t_ic_tipo_contrato'] == 2){
            $('#ic_contrato').prop('checked', false);
            $('#ic_servico_extra').prop('checked', false);
            $('#ic_aditivo').prop('checked', true);
            $("#contrato_pai_pk").val(objRegistro['t_contratos_pk']);
            $('#exib_contrato_pai').show();

       }   
        else if(objRegistro['t_ic_tipo_contrato'] == 3){
            $('#ic_contrato').prop('checked', false);
            $('#ic_servico_extra').prop('checked', true);
            $('#ic_aditivo').prop('checked', false);
            $("#contrato_pai_pk").val("");
            $('#exib_contrato_pai').hide();

       }   
       $('#exibir_motivo_cancelamento_contrato').hide();
            $('#dt_cancelamento_contrato').prop('checked', false);
            $("input[id=dt_cancelamento_contrato]").prop("disabled", false);
            if(objRegistro['t_dt_cancelamento']!=null){
                $('#dt_cancelamento_contrato').prop('checked', true);
                $('#exibir_motivo_cancelamento_contrato').show();
                $("#ds_obs_motivo_cancelamento_contrato").val(objRegistro['t_ds_obs_motivo_cancelamento']);
                if(objRegistro['t_ds_obs_motivo_cancelamento']!=null){
                    $("input[id=ds_obs_motivo_cancelamento_contrato]").prop("disabled", true);
                }
                $("input[id=dt_cancelamento_contrato]").prop("disabled", true);
        }
               
        $("#janela_contratos").modal(); 
        setTimeout(function(){
           fcAtualizarDadosGridContratoItens();
        }, 1000);
        
        var validator = $( "#form_contrato" ).validate();
        validator.resetForm();
    
}

function fcExcluirContrato(v_pk){
    if(v_pk != ""){
        var objParametros = {
            "pk": v_pk
        };              
       
        var arrExcluir = carregarController("contrato", "excluir", objParametros);  
        if (arrExcluir.result == 'success'){

            //Exibe a mensagem
            alert(arrExcluir.message);
            fcRecarregarGridContratos();
        }
        else{
        }
    }
    else{
        alert("Código não encontrado");
    }
}

//FORMATA OS DADOS DA GRID CONTRATO ITENS
function fcFormatarDadosContratoProcesso(){

    var cboProdutosPk = $("select[id='produtos_servicos_pk_contrato']");
    var periodo = $("select[id='periodo']");
    var n_qtde_contratos_itens = $("input[id='n_qtde_contrato']");
    var contratos_itens_pk_2 = $("input[id='contratos_itens_pk_2']");
    var vl_total = $("input[id='vl_total_contrato']");
    var vl_unit = $("input[id='vl_unit_contrato']");
    var n_qtde_dias_semana = $("select[id='n_qtde_dias_semana_contrato']");
    
    var arrKeys = [];
    arrKeys[0] = "contratos_itens_pk";
    arrKeys[1] = "produtos_servicos_pk";
    arrKeys[2] = "n_qtde";
    arrKeys[3] = "vl_unit";
    arrKeys[4] = "vl_total";
    arrKeys[5] = "n_qtde_dias_semana";
    arrKeys[6] = "periodo";
    var arrDados = [];
    for(i = 0; i < (cboProdutosPk.length); i++){ 
        
        try{
            
            if(cboProdutosPk.get(i).value == ""){
                cboProdutosPk.get(i).focus();
                return "";
            }
            
            arrDados[i] = [
                contratos_itens_pk_2.get(i).value,
                cboProdutosPk.get(i).value, 
                n_qtde_contratos_itens.get(i).value, 
                moeda2float(vl_unit.get(i).value), 
                moeda2float(vl_total.get(i).value),
                n_qtde_dias_semana.get(i).value,
                periodo.get(i).value
            ];
        }
        catch(err){
            alert(err.message);
        }
    }    
    
    return arrayToJson(arrKeys, arrDados);
    
}

//SALVA O CONTRATO
function fcSalvarContrato(){
    
    var strJSONDadosTabela = fcFormatarDadosContratoProcesso();  
    if(strJSONDadosTabela =="")
        return false;
        
    
    var ic_tipo_contrato = 1; 
    var v_dt_cancelamento = 0; 
    
    if($("#ic_contrato").is(":checked") == true ){
        ic_tipo_contrato = 1;
        $('#contrato_pai_pk').val("null");
    }
    
    else if($("#ic_aditivo").is(":checked") == true){
        ic_tipo_contrato = 2;
        if($('#contrato_pai_pk').val()==""){
            $("#alert_contrato_pai").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert_contrato_pai").slideUp(500);
            });
            $('#contrato_pai_pk').focus();
            return false;
        }
    }
    else if($("#ic_servico_extra").is(":checked") == true ){
        ic_tipo_contrato = 3;
        $('#contrato_pai_pk').val("null");
    }
    
    
    if($('#dt_cancelamento_contrato').is(":checked")){
            v_dt_cancelamento = 1;
        }
        else{
            v_dt_cancelamento = 2;
    }
    //atualiza o registro no DB, pois já existe uma PK para contatos no banco.
    var objParametros = {
        "pk": $("#contratos_pk").val(),
        "dt_inicio_contrato": $("#dt_inicio_contrato").val(),
        "dt_fim_contrato": $("#dt_fim_contrato").val(),
        "processos_etapas_pk":$('#processos_etapas_pk_1').val(),
        "ic_tipo_contrato":ic_tipo_contrato,
        "contratos_pk":$('#contrato_pai_pk').val(),
        "empresas_pk":$('#empresas_pk').val(),
        "contratos_itens": strJSONDadosTabela,
        "dt_cancelamento":v_dt_cancelamento,
        "ds_obs_motivo_cancelamento":$("#ds_obs_motivo_cancelamento_contrato").val()
    }; 
    
    var arrEnviar = carregarController("contrato", "salvar", objParametros);
    if (arrEnviar.result == 'success'){
        alert(arrEnviar.message);
        $("#janela_contratos").modal("hide");
        //essa função esta na agenda escala para recarregar o combo de contratos 
        carregarComboContrato();
        fcRecarregarGridContratos();
    }    
    else{
        alert(arrEnviar.result);
    }
    return true;
    
}

function fcValidarFormContratos(){
    
    $("#form_contrato").validate({
        rules :{
            dt_inicio_contrato:{
                required:true,
                minlength:10
            },
            dt_fim_contrato:{
                required:true,
                minlength:10
            }

        },
        messages:{
            dt_inicio_contrato:{
                required:"Por favor, informe Data Inicio",
                minlength:"Por favor, informe Data válida"
            },
            dt_fim_contrato:{
                required:"Por favor, informe Data Fim",
                minlength:"Por favor, informe Data válida"
            }

        },
        submitHandler: function(form){
            fcSalvarContrato(); //Se a validação deu certo, faz o envio do formulario.
            
            return false;
        }
    });

}

//---------------------------------- CONTRATOS ITENS -------------------------------------------

//CARREGA O COMBO DE PRODUTOS DO CONTRATO
function carregarListaComboProdutoContrato(){

    var url = '../controller/produto_servico.controller.php?job=listarTodos&token='+token;
   
    var request = $.ajax({
        url:          url,
        cache:        false,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'post'
    });
    request.done(function(output){
        if (output.result == 'success'){
            strComboProdutoContrato = "<select class='form-control form-control-sm' id='produtos_servicos_pk_contrato' name='produtos_servicos_pk_contrato'><option></option>";
            for(i = 0; i < output.data.length; i++){
                strComboProdutoContrato = strComboProdutoContrato + "<option value='"+output.data[i]['pk']+"'>"+output.data[i]['ds_produto_servico']+"</option>";
            }
            strComboProdutoContrato+= "</select>";
            
            //Carrega os dados no combo.
            fcFormatarGridContratoItens();
            
        }
        else{
            alert('Falhar ao carregar o registro');
        }
    });
    request.fail(function(jqXHR, textStatus){
        alert('Falha ao carregar o registro: ' + textStatus);
    });
}
function fcRecarregarGridContratosProcessos(){
    tblContratos.ajax.reload();   
    //fcCarregarGridContrato();
}
function fcRecarregarGridItensContatosProcessos(){
    tblContratoItens.clear().destroy();    
    fcAtualizarDadosGridContratoItens();
    fcFormatarGridContratoItens();
}

//FORMATA O GRID DE CONTRATO ITENS
function fcFormatarGridContratoItens(){    
    tblContratoItens = $("#tblContratoItens").DataTable({
        "scrollX": false,
        "responsive": false,
        "searching": false,
        "paging": false,
        "bFilter": false,
        "bInfo": false,
        "ordering": false,
        "columnDefs" : [
            {   
                "targets": 0,
                "data": "t1",
                "visible":false
            },
            
            {   
                "targets": 1,
                "data": "t2"
            },            
            {   
                "targets": 2,
                "data": "t3"
            },            
            {   
                "targets": 3,
                "data": "t4"
            },            
            {   
                "targets": 4,
                "data": "t5"
            },
            {   
                "targets": 5,
                "data": "t6"
            },
            {   
                "targets": 6,
                "data": "t7"
            },
            {   
                "targets": 7,
                "data": "t8",
                "defaultContent": "<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            }        
        ],        
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }            
    });

    return false;
    
}

//RETORNA OS DADOS CADASTRAIS DO CONTRATO ITENS
function fcAtualizarDadosGridContratoItens(){
    
    var objParametros = {
        "contratos_pk":$("#contratos_pk").val()
    };              

    var arrCarregar = carregarController("contrato_item", "listarContratoItem", objParametros);  
   
    if (arrCarregar.result == 'success'){

        for(i = 0; i < arrCarregar.data.length; i++){

            if($("#contratos_pk").val()!=""){
                //Adiciona a linha.
                fcIncluirContratoItens(arrCarregar.data[i]['t_pk']);
            }

            //Pega as variaveis 
            var cboProdutosServicosPk = $("select[id='produtos_servicos_pk_contrato']");
            var contratos_itens_pk_2 = $("input[id='contratos_itens_pk_2']");
            var n_qtde_contratos_itens = $("input[id='n_qtde_contrato']");
            var n_qtde_dias_semana = $("select[id='n_qtde_dias_semana_contrato']");
            var vl_total = $("input[id='vl_total_contrato']");
            var vl_unit = $("input[id='vl_unit_contrato']");
            var periodo = $("select[id='periodo']");

            
            cboProdutosServicosPk.get(i).value = arrCarregar.data[i]['t_produtos_servicos_pk'];
            contratos_itens_pk_2.get(i).value = arrCarregar.data[i]['t_pk'];
            n_qtde_contratos_itens.get(i).value = arrCarregar.data[i]['t_n_qtde'];
            n_qtde_dias_semana.get(i).value = arrCarregar.data[i]['t_n_qtde_dias_semana'];
            vl_total.get(i).value = arrCarregar.data[i]['t_vl_total'];
            vl_unit.get(i).value = arrCarregar.data[i]['t_vl_unit'];
            periodo.get(i).value = arrCarregar.data[i]['t_periodo'];

        }
    }
    else{
        alert('Falhou a requisição de exclusão.');
    }
}

//INCLUI CONTRATO ITENS
function fcIncluirContratoItens(contratos_itens_pk){

    tblContratoItens.row.add(
    {   
        "t1":contratos_itens_pk,
        "t2":strComboProdutoContrato + "<input type='hidden' class='form-control form-control-sm' id='contratos_itens_pk_2' size='4'/>",
        "t3":"<input type='text' class='form-control form-control-sm' onchange='fcCalcularValorVlUnitContrato()' onkeypress='mascara(this,soNumeros)' id='n_qtde_contrato' size='3'/>",
        "t4":"<select id='periodo' class='form-control form-control-sm'><option value=''></option><option value='1'>1 Hrs</option><option value='2'>2 Hrs</option><option value='3'>3 Hrs</option><option value='4'>4 Hrs</option><option value='5'>5 Hrs</option><option value='6'>6 Hrs</option><option value='7'>7 Hrs</option><option value='8'>8 Hrs</option><option value='9'>9 Hrs</option><option value='10'>10 Hrs</option><option value='12'>12 Hrs</option><option value='24'>24 Hrs</option></select>",
        "t5":"<select id='n_qtde_dias_semana_contrato' class='form-control form-control-sm'><option value=''></option><option value='1D'>1D</option><option value='2D'>2D</option><option value='3D'>3D</option><option value='4D'>4D</option><option value='5D'>5D</option><option value='6X1'>6X1</option><option value='12x36'>12x36</option></select>",
        "t6":"<input type='text' class='form-control form-control-sm' onchange='fcCalcularValorVlUnitContrato()' onkeypress='mascara(this,moeda)' id='vl_unit_contrato'  />",
        "t7":"<input type='text' class='form-control form-control-sm' onkeypress='mascara(this,moeda)' id='vl_total_contrato' readonly/>",
        "t8":"<a class='function_delete' ><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
    }            
    ).draw( false );
    
    tblContratoItens.on('click', '.function_delete', function () {
        var data;
        if(tblContratoItens.row( $(this).parents('li') ).data()){
            data = tblContratoItens.row( $(this).parents('li') ).data();
        }
        else if(tblContratoItens.row( $(this).parents('tr') ).data()){
            data = tblContratoItens.row( $(this).parents('tr') ).data();
        }
        
            if(data['t1'] != ""){
                fcExcluirLinhaContratosItensContrato(data['t1']);
            }
            tblContratoItens.row($(this).parents('tr')).remove().draw();
      
    } );
    
    
   
    return false;
}

function fcCalcularValorVlUnitContrato(){
    try{
        
        var n_qtde_contratos_itens = $("input[id='n_qtde_contrato']");
        var vl_unit = $("input[id='vl_unit_contrato']");
        var vl_total = $("input[id='vl_total_contrato']");
        
        for(i = 0; i < n_qtde_contratos_itens.length; i++){
            
            vl_total.get(i).value = float2moeda(n_qtde_contratos_itens.get(i).value * moeda2float(vl_unit.get(i).value));
        }

    }
    catch(err){
        alert(err.message)
    }
    
}
function fcExcluirLinhaContratosItensContrato(vlr){
    var contratos_itens_pk = vlr;
    if(contratos_itens_pk!=""){
        if (confirm("O serviço tem escaldas cadastradas, excluindo a escalas serão excluidas ! Deseja continuar ?")){
            var objParametros = {
                "pk": contratos_itens_pk
            };              

            var arrExcluir = carregarController("contrato_item", "excluir", objParametros);   

            if (arrExcluir.result == 'success'){
                //Exibe a mensagem
                alert(arrExcluir.message);
                tblContratos.ajax.reload();
            }
            else{
               //Exibe a mensagem
                alert(arrExcluir.message);
            }
        }
             
    }
        
    
    return false;
}

function fcLimparFormContrato(){
    $("#contratos_pk").val("");
    $('#contrato_pai_pk').val("");
    $("#dt_inicio_contrato").val("");
    $("#dt_fim_contrato").val("");
    $('#dt_cancelamento_contrato').prop('checked', false);
    $("input[id=dt_cancelamento_contrato]").prop("disabled", false);
    $("#ds_obs_motivo_cancelamento_contrato").val("");
    $("input[id=ds_obs_motivo_cancelamento_contrato]").prop("disabled", false);
    tblContratoItens.clear().destroy();
    fcFormatarGridContratoItens(); 
}

//abre o formulario para a inclusao de um novo contrato.
function fcAbrirFormNovoContrato(){
    fcLimparFormContrato();
    $('#exib_contrato_pai').hide();
    $("#contratos_pk").val("");
    $('#contrato_pai_pk').val("");
    $('#ic_contrato').prop('checked', false);
    $('#ic_aditivo').prop('checked', false);
    $('#ic_servico_extra').prop('checked', false);
    $("#dt_inicio_contrato").val("");
    $("#dt_fim_contrato").val("");
    
    $('#dt_cancelamento_contrato').prop('checked', false);
    $("input[id=dt_cancelamento_contrato]").prop("disabled", false);
    $("#ds_obs_motivo_cancelamento_contrato").val("");
    $("input[id=ds_obs_motivo_cancelamento_contrato]").prop("disabled", false);
    
    $("#janela_contratos").modal();
    carregarComboContratoPai(0);
    fcAtualizarDadosGridContratoItens();
    
    
}

function fcRecarregarGridContratos(){
    tblContratos.ajax.reload();
    fcRecarregarGridItensContatos();
}

function fcRecarregarGridItensContatos(){
    tblContratoItens.clear().destroy(); 
    
    fcFormatarGridContratoItens();
    fcAtualizarDadosGridContratoItens();
    
}

function carregarComboContrato(){
    var objParametros = {
        "leads_pk": leads_pk,
        "processos_pk":pk
    };      
    
    var arrCarregar = carregarController("contrato", "listarLeadsPk", objParametros);   

    carregarComboAjax($("#agenda_contratos_pk"), arrCarregar, "", "pk", "ds_combo_contrato");
}
function carregarComboEmpresa(){
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("conta", "listarPk", objParametros);   
   
    carregarComboAjax($("#empresas_pk"), arrCarregar, " ", "pk", "ds_razao_social");
}

function fcCarregarDataContrato(){
    if($("#agenda_contratos_pk").val()!=""){
        var objParametros = {
            "pk": $("#agenda_contratos_pk").val()
        };      

        var arrCarregar = carregarController("contrato", "listarPk", objParametros);
        if (arrCarregar.result == 'success'){
            $("#dt_inicio_agenda").val(arrCarregar.data[0]['dt_inicio_contrato']);
            $("#dt_fim_agenda").val(arrCarregar.data[0]['dt_fim_contrato']);
        }
        
        fcFormatarGridItensContratados($("#agenda_contratos_pk").val());
        
    }
    else{
        $("#dt_inicio_agenda").val("");
        $("#dt_fim_agenda").val("");
    }
    
}

$(document).ready(function() {
        
    $(document).on('click', '#btn_modal', fcAbrirFormNovoContrato);
    //$(document).on('click', '#cmdIncluirContratosItens', fcIncluirContratoItens);
    $(document).on('click', '#cmdIncluirContratosItens', function () {
        fcIncluirContratoItens("");
    } );

    //CONTRATOS
    fcValidarFormContratos();
    
    carregarComboEmpresa();

    $('#dt_inicio_contrato').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker("setDate", new Date() );  

    $("#dt_inicio_contrato").keypress(function(){
       mascara(this,mdata);
    });

    $('#dt_fim_contrato').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker("setDate", new Date() );  
    $("#dt_fim_contrato").keypress(function(){
       mascara(this,mdata);
    });

    carregarListaComboProdutoContrato();
    fcAtualizarDadosGridContratoItens();

    fcCarregarGridContrato();

    //CONTRATOS
    $('#exibir_motivo_cancelamento_contrato').hide();

    $("#dt_cancelamento_contrato").change(function(){
       if( $("#dt_cancelamento_contrato").is(":checked") == true ){
            $('#exibir_motivo_cancelamento_contrato').show();
        }
        else{
            $('#exibir_motivo_cancelamento_contrato').hide();
        }
    });

    carregarComboContrato();
    
    $("#agenda_contratos_pk").change(function(){
        fcCarregarDataContrato();
        //Carrega o combo de produtos.
        fcCarregarProduto();
    }); 



    $('#ic_aditivo').click(function() {

        $('#ic_contrato').prop('checked', false);
        $('#ic_servico_extra').prop('checked', false);
        $('#ic_aditivo').prop('checked', true);
        $('#exib_contrato_pai').show();
    });
    $('#ic_contrato').click(function() {
        $('#ic_contrato').prop('checked', true);
        $('#ic_aditivo').prop('checked', false);
        $('#ic_servico_extra').prop('checked', false);
        $('#contrato_pai_pk').val("null");
        $('#agenda_responsavel_visible').show();
        $('#exib_contrato_pai').hide();
    });
    $('#ic_servico_extra').click(function() {
        $('#ic_contrato').prop('checked', false);
        $('#ic_aditivo').prop('checked', false);
        $('#ic_servico_extra').prop('checked', true);
        $('#contrato_pai_pk').val("null");
        $('#agenda_responsavel_visible').show();
        $('#exib_contrato_pai').hide();
    });

    $("#exib_contrato_pai").hide();

    
         
} );
