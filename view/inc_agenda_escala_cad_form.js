var tblAgenda;
var tblAgendaTurno;
var rLinhaSelecionada = null;
var tblItensContratados;
var tblTarefa;
var tblHistoricoTarefa;

//---------------------------AGENDA COLABORADORES----------------------
function fcPesquisarGridAgenda(){
    tblAgenda.clear().destroy();
    fcCarregarGridAgenda();
}
function fcCarregarGridAgenda(){
    
    var objParametros = {
        "leads_pk_pesq": $("#leads_pk_pesq_agenda").val(),
        "colaborador_pk_pesq_agenda": $("#colaborador_pk_pesq_agenda").val(),
        "dt_periodo_ini_agenda_pesq": $("#dt_periodo_ini_agenda_pesq").val(),
        "dt_periodo_fim_agenda_pesq": $("#dt_periodo_fim_agenda_pesq").val(),
        "tipo_escala_pesq_agenda": $("#tipo_escala_pesq_agenda").val(),
        "escala_pesq_agenda": $("#escala_pesq_agenda").val(),
        "produtos_pesq_agenda": $("#produtos_pesq_agenda").val(),
        "ic_status_pesq_agenda": $("#ic_status_pesq_agenda").val(),
        "leads_pk": $("#leads_pk_agenda").val(),
        "processos_pk": pk
    };     
    
    var v_url = montarUrlController("agenda_colaborador_padrao", "listarAgendaColaboradorLeadProcesso", objParametros);
   
    //Trata a tabela
    tblAgenda = $('#tblAgenda').DataTable({
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
           {"targets": -2, "data": "ds_cancelamento"},
           {"targets": -3, "data": "ds_tipo_escala"},
           {"targets": -4, "data": "t_ds_produto_servico"},
           //{"targets": -5, "data": "t_ds_dia_semana"},
           {"targets": -5, "data": "n_qtde_dias_semana"},
           {"targets": -6, "data": "periodo"},
           {"targets": -7, "data": "t_ds_colaborador"},
           {"targets": -8, "data": "ds_lead"},
           {"targets": -9, "data": "t_pk"} 

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    //Atribui os eventos na coluna ação.
    $('#tblAgenda tbody').on('click', '.function_edit', function () {
        var data;
        
        rLinhaSelecionada = null;
        
        if(tblAgenda.row( $(this).parents('li')).data()){
            data = tblAgenda.row( $(this).parents('li')).data();
            rLinhaSelecionada = $(this).parents('li');
        }
        else if(tblAgenda.row( $(this).parents('tr')).data()){
            data = tblAgenda.row( $(this).parents('tr')).data();
            rLinhaSelecionada = $(this).parents('tr');
        }
        
        fcEditarAgenda(data);
        
    } );   
    
    $('#tblAgenda tbody').on('click', '.function_delete', function () {
        var data;
        
        if(tblAgenda.row( $(this).parents('li') ).data()){
            data = tblAgenda.row( $(this).parents('li') ).data();
        }
        else if(tblAgenda.row( $(this).parents('tr') ).data()){
            data = tblAgenda.row( $(this).parents('tr') ).data();
        }
        
        if(data['t_pk'] != ""){
            fcExcluirAgenda(data['t_pk']);
        }
        tblAgenda.row($(this).parents('tr')).remove().draw();
    } ); 
    
    
    
    return false;
}


function fcEditarAgenda(objRegistro){
    
    fcAbrirFormNovoAgendaEdit();
    
     //Carrega as informações da linha selecionada.
    carregarComboContrato();
  
    fcListarLeadAgenda();
  
  

    
    
    
    $("#leads_pk_agenda").val(objRegistro['t_leads_pk']);
    
    $("#agenda_colaborador_padrao_pk").val(objRegistro['t_pk']);
    $("#exibir_cancelamento").show();
    $("#agenda_contratos_pk").val(objRegistro['t_contratos_pk']); 
    
    

    $("#dt_inicio_agenda").val(objRegistro['t_dt_inicio_agenda']);
    $("#dt_fim_agenda").val(objRegistro['t_dt_fim_agenda']);    
    $("#hr_turno_dom").val(objRegistro['t_hr_turno_dom']);    
    $("#hr_turno_seg").val(objRegistro['t_hr_turno_seg']);    
    $("#hr_turno_ter").val(objRegistro['t_hr_turno_ter']);    
    $("#hr_turno_qua").val(objRegistro['t_hr_turno_qua']);    
    $("#hr_turno_qui").val(objRegistro['t_hr_turno_qui']);    
    $("#hr_turno_sex").val(objRegistro['t_hr_turno_sex']);    
    $("#hr_turno_sab").val(objRegistro['t_hr_turno_sab']);    
    $("#tipo_escala").val(objRegistro['tipo_escala']);    
    
    
    
    $("#hr_turno_dom_saida").val(objRegistro['t_hr_turno_dom_saida']);    
    $("#hr_turno_seg_saida").val(objRegistro['t_hr_turno_seg_saida']);    
    $("#hr_turno_ter_saida").val(objRegistro['t_hr_turno_ter_saida']);    
    $("#hr_turno_qua_saida").val(objRegistro['t_hr_turno_qua_saida']);    
    $("#hr_turno_qui_saida").val(objRegistro['t_hr_turno_qui_saida']);    
    $("#hr_turno_sex_saida").val(objRegistro['t_hr_turno_sex_saida']);    
    $("#hr_turno_sab_saida").val(objRegistro['t_hr_turno_sab_saida']);    
    $("#hr_intervalo_dom").val(objRegistro['hr_intervalo_dom']);    
    $("#hr_intervalo_seg").val(objRegistro['hr_intervalo_seg']);    
    $("#hr_intervalo_ter").val(objRegistro['hr_intervalo_ter']);    
    $("#hr_intervalo_qua").val(objRegistro['hr_intervalo_qua']);    
    $("#hr_intervalo_qui").val(objRegistro['hr_intervalo_qui']);    
    $("#hr_intervalo_sex").val(objRegistro['hr_intervalo_sex']);    
    $("#hr_intervalo_sab").val(objRegistro['hr_intervalo_sab']);    
    $("#hr_intervalo_saida_dom").val(objRegistro['hr_intervalo_saida_dom']);    
    $("#hr_intervalo_saida_seg").val(objRegistro['hr_intervalo_saida_seg']);    
    $("#hr_intervalo_saida_ter").val(objRegistro['hr_intervalo_saida_ter']);    
    $("#hr_intervalo_saida_qua").val(objRegistro['hr_intervalo_saida_qua']);    
    $("#hr_intervalo_saida_qui").val(objRegistro['hr_intervalo_saida_qui']);    
    $("#hr_intervalo_saida_sex").val(objRegistro['hr_intervalo_saida_sex']);    
    $("#hr_intervalo_saida_sab").val(objRegistro['hr_intervalo_saida_sab']);    
    $("#dt_cancelamento_agenda_escala").val(objRegistro['dt_cancelamento']);    
    $("#ds_motivo_cancelamento").val(objRegistro['ds_motivo_cancelamento']);    
    //$("#nao_repetir_proxima_semana_pk").val(objRegistro['t_nao_repetir_proxima_semana_pk']);    
    
    $("#agenda_contratos_itens_pk").val(objRegistro['t_contratos_itens_pk']);
    
    
        
    //carrega itens contrato        
    fcItensContrato("");
    $("#agenda_produtos_servicos_pk").val(objRegistro['t_produtos_servicos_pk']);   
    //carrega combo itens   
    fcCarregarProduto(); 
    $("#agenda_produtos_servicos_pk").val(objRegistro['t_produtos_servicos_pk']);
    
    
    fcDiasContratados();
    
    //DOM
    if(objRegistro['t_ic_dom']==1){
         $("input[id=ic_dom]").prop("checked", "true");
         $("input[id=ic_dom_folga]").prop("disabled", "true");
        // $("input[id=ic_dom_folga]").prop("checked", "false");
    }
    //SEG
    if(objRegistro['t_ic_seg']==1){
         $("input[id=ic_seg]").prop("checked", "true");
         $("input[id=ic_seg_folga]").prop("disabled", "true");
         //$("input[id=ic_seg_folga]").prop("checked", "false");
    }
    //TER
    if(objRegistro['t_ic_ter']==1){
         $("input[id=ic_ter]").prop("checked", "true");
         $("input[id=ic_ter_folga]").prop("disabled", "true");
         //$("input[id=ic_ter_folga]").prop("checked", "false");
    }
    //QUA
    if(objRegistro['t_ic_qua']==1){
         $("input[id=ic_qua]").prop("checked", "true");
         $("input[id=ic_qua_folga]").prop("disabled", "true");
         //$("input[id=t_ic_qua_folga]").prop("checked", "false");
    }
    //QUI
    if(objRegistro['t_ic_qui']==1){
         $("input[id=ic_qui]").prop("checked", "true");
         $("input[id=ic_qui_folga]").prop("disabled", "true");
        // $("input[id=ic_qui_folga]").prop("checked", "false");
    }
    //SEX
    if(objRegistro['t_ic_sex']==1){
         $("input[id=ic_sex]").prop("checked", "true");
         $("input[id=ic_sex_folga]").prop("disabled", "true");
        // $("input[id=ic_sex_folga]").prop("checked", "false");
    }
    //SAB
    if(objRegistro['t_ic_sab']==1){
         $("input[id=ic_sab]").prop("checked", "true");
         $("input[id=ic_sab_folga]").prop("disabled", "true");
         //$("input[id=ic_sab_folga]").prop("checked", "false");
    }
     if(objRegistro['t_ic_folga_inverter']==1){
       $("input[id=ic_folga_inverter]").prop("checked", "true"); 
    } 
    
    
    //DOM
    if(objRegistro['t_ic_dom_folga']==1){
         $("input[id=ic_dom_folga]").prop("checked", "true");
         $("input[id=ic_dom]").prop("disabled", "true");
         //$("input[id=ic_dom]").prop("checked", "false");
    }
    //SEG
    if(objRegistro['t_ic_seg_folga']==1){
         $("input[id=ic_seg_folga]").prop("checked", "true");
         $("input[id=ic_seg]").prop("disabled", "true");
         //$("input[id=ic_seg]").prop("checked", "false");
    }
    //TER
    if(objRegistro['t_ic_ter_folga']==1){
         $("input[id=ic_ter_folga]").prop("checked", "true");
         $("input[id=ic_ter]").prop("disabled", "true");
         //$("input[id=ic_ter]").prop("checked", "false");
    }
    //QUA
    if(objRegistro['t_ic_qua_folga']==1){
         $("input[id=ic_qua_folga]").prop("checked", "true");
         $("input[id=ic_qua]").prop("disabled", "true");
         //$("input[id=ic_qua]").prop("checked", "false");
    }
    //QUI
    if(objRegistro['t_ic_qui_folga']==1){
         $("input[id=ic_qui_folga]").prop("checked", "true");
         $("input[id=ic_qui]").prop("disabled", "true");
         //$("input[id=ic_qui]").prop("checked", "false");
    }
    //SEX
    if(objRegistro['t_ic_sex_folga']==1){
         $("input[id=ic_sex_folga]").prop("checked", "true");
         $("input[id=ic_sex]").prop("disabled", "true");
         //$("input[id=ic_sex]").prop("checked", "false");
    }
    //SAB
    if(objRegistro['t_ic_sab_folga']==1){
         $("input[id=ic_sab_folga]").prop("checked", "true");
         $("input[id=ic_sab]").prop("disabled", "true");
         //$("input[id=ic_sab]").prop("checked", "false");
    }
    
    
    /*if(objRegistro['t_ic_nao_repetir']==1){
        $("#exibir_checkbox").show();
         $("input[id=ic_nao_repetir]").prop("checked", "true");
         $("#exibir_nao_repetir").show();
        // $("#nao_repetir_proxima_semana_pk").val(objRegistro['t_nao_repetir_proxima_semana_pk']); 
    }*/
   
    
 
    $("#dom_turnos_pk").val(objRegistro['t_dom_turnos_pk']); 
    $("#seg_turnos_pk").val(objRegistro['t_seg_turnos_pk']); 
    $("#ter_turnos_pk").val(objRegistro['t_ter_turnos_pk']); 
    $("#qua_turnos_pk").val(objRegistro['t_qua_turnos_pk']); 
    $("#qui_turnos_pk").val(objRegistro['t_qui_turnos_pk']); 
    $("#sex_turnos_pk").val(objRegistro['t_sex_turnos_pk']); 
    $("#sab_turnos_pk").val(objRegistro['t_sab_turnos_pk']); 
    
    
    
    $('#turno_base_agenda_pk').val(objRegistro['turnos_pk'])
    $('#hr_inicio_expediente').val(objRegistro['hr_inicio_expediente'])
    $('#hr_termino_expediente').val(objRegistro['hr_termino_expediente'])
    $('#hr_saida_intervalo').val(objRegistro['hr_saida_intervalo'])
    $('#hr_retorno_intervalo').val(objRegistro['hr_retorno_intervalo'])
    
    
    
    $("#leads_pk_agenda").prop("disabled",true);
    
    
    
    
    $("#ic_preenchimento_automatico").prop("checked",false);
    if(objRegistro['ic_preenchimento_automatico']==1){
        $("#ic_preenchimento_automatico").prop("checked",true);
    }
    
    colaborador_pk = "";
    
    $("#agenda_colaboradores_pk").prop("disabled",true);
    
    $("#agenda_produtos_servicos_pk").prop("disabled",true);
    
    fcCarregarColaboradores();
    
    $("#agenda_colaboradores_pk").val(objRegistro['t_colaboradores_pk']); 
    
    $("#form_agenda").data('validator').resetForm();
    
    //carrega grid de produtos/servicos contratados
    //fcFormatarGridItensContratados();
}

function fcExcluirAgenda(v_pk){
    if(v_pk != ""){
        var objParametros = {
            "pk": v_pk
        };              

        var arrExcluir = carregarController("agenda_colaborador_padrao", "excluir", objParametros);   

        if (arrExcluir.result == 'success'){

            //Exibe a mensagem
            alert(arrExcluir.message);
            fcRecarregarGridAgenda();
        }
        else{
            alert('Falhou a requisição de exclusão.');
        }
    }
    else{
        alert("Código não encontrado");
    }
}

function fcRecarregarGridAgenda(){
    
    tblAgenda.ajax.reload();
    /*tblAgenda.clear().destroy();    
    fcCarregarGridAgenda();*/
}

function fcValidarFormAgendas(){
    
    $("#form_agenda").validate({
        rules :{
            dt_inicio_agenda:{
                required:true,
                minlength:10
            },
            agenda_produtos_servicos_pk:{
                required:true
            },
            agenda_colaboradores_pk:{
                required:true
            },
            agenda_contratos_pk:{
                required:true
            }

        },
        messages:{
            dt_inicio_agenda:{
                required:"Por favor, informe Data Inicio",
                minlength:"Por favor, informe Data válida"
            },
            agenda_produtos_servicos_pk:{
                required:"Por favor, selecione Produtos/Serviços"
            },
            agenda_colaboradores_pk:{
                required:"Por favor, selecione Colaborador"
            },
            agenda_contratos_pk:{
                required:"Por favor, selecione Contrato"
            }

        },
        submitHandler: function(form){
            validarGridData(); //Se a validação deu certo, faz o envio do formulario.
            
            return false;
        }
    });

}

function validarGridData(){
    if($('#ic_dom').is(":checked") && $('#dom_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#dom_turnos_pk').focus();
        return false;
    }
    else if($('#ic_seg').is(":checked") && $('#seg_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#seg_turnos_pk').focus();
        return false;
    }
    else if($('#ic_ter').is(":checked") && $('#ter_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#ter_turnos_pk').focus();
        return false;
    }
    else if($('#ic_qua').is(":checked") && $('#qua_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#qua_turnos_pk').focus();
        return false;
    }
    else if($('#ic_qui').is(":checked") && $('#qui_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#qui_turnos_pk').focus();
        return false;
    }
    else if($('#ic_sex').is(":checked") && $('#sex_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#sex_turnos_pk').focus();
        return false;
    }
    else if($('#ic_sab').is(":checked") && $('#sab_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#sab_turnos_pk').focus();
        return false;
    }
    //HORARIO
    else if($('#ic_dom').is(":checked") && $('#hr_turno_dom').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_dom').focus();
        return false;
    }
    else if($('#ic_seg').is(":checked") && $('#hr_turno_seg').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_seg').focus();
        return false;
    }
    else if($('#ic_ter').is(":checked") && $('#hr_turno_ter').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_ter').focus();
        return false;
    }
    else if($('#ic_qua').is(":checked") && $('#hr_turno_qua').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_qua').focus();
        return false;
    }
    else if($('#ic_qui').is(":checked") && $('#hr_turno_qui').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_qui').focus();
        return false;
    }
    else if($('#ic_sex').is(":checked") && $('#hr_turno_sex').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_sex').focus();
        return false;
    }
    else if($('#ic_sab').is(":checked") && $('#hr_turno_sab').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#hr_turno_sab').focus();
        return false;
    }
    //FOLGA INVERTIDA 
    else if($('#ic_folga_inverter').is(":checked")){
        if($('#ic_dom_folga').is(":checked") && $('#dom_turnos_pk').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#dom_turnos_pk').focus();
            return false;
        }
        else if($('#ic_seg_folga').is(":checked") && $('#seg_turnos_pk').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#seg_turnos_pk').focus();
            return false;
        }
        else if($('#ic_ter_folga').is(":checked") && $('#ter_turnos_pk').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#ter_turnos_pk').focus();
            return false;
        }
        else if($('#ic_qua_folga').is(":checked") && $('#qua_turnos_pk').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#qua_turnos_pk').focus();
            return false;
        }
        else if($('#ic_qui_folga').is(":checked") && $('#qui_turnos_pk').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#qui_turnos_pk').focus();
            return false;
        }
        else if($('#ic_sex_folga').is(":checked") && $('#sex_turnos_pk').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#sex_turnos_pk').focus();
            return false;
        }
        else if($('#ic_sab_folga').is(":checked") && $('#sab_turnos_pk').val() ==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#sab_turnos_pk').focus();
            return false;
        }
        //HORARIO
        else if($('#ic_dom_folga').is(":checked") && $('#hr_turno_dom').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_dom').focus();
            return false;
        }
        else if($('#ic_seg_folga').is(":checked") && $('#hr_turno_seg').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_seg').focus();
            return false;
        }
        else if($('#ic_ter_folga').is(":checked") && $('#hr_turno_ter').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_ter').focus();
            return false;
        }
        else if($('#ic_qua_folga').is(":checked") && $('#hr_turno_qua').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_qua').focus();
            return false;
        }
        else if($('#ic_qui_folga').is(":checked") && $('#hr_turno_qui').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_qui').focus();
            return false;
        }
        else if($('#ic_sex_folga').is(":checked") && $('#hr_turno_sex').val()==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_sex').focus();
            return false;
        }
        else if($('#ic_sab_folga').is(":checked") && $('#hr_turno_sab').val() ==""){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            $('#hr_turno_sab').focus();
            return false;
        }
        else{
            fcSalvarAgenda();
        }
    }
    else{
        fcSalvarAgenda();
    }
}
function fcSalvarAgenda(){
   
    $("#agenda_verifcar_qtde_dias_contrato").val("");
    var qtde_dias_selecionados = 0;
    var ic_dom = 2;
    var ic_seg = 2;
    var ic_ter = 2;
    var ic_qua = 2;
    var ic_qui = 2;
    var ic_sex = 2;
    var ic_sab = 2;  
    
    var ic_dom_folga = "";
    var ic_seg_folga = "";
    var ic_ter_folga = "";
    var ic_qua_folga = "";
    var ic_qui_folga = "";
    var ic_sex_folga = "";
    var ic_sab_folga = ""; 
    
    var ic_folga_inverter = "";       
    
    var ic_nao_repetir = 2;    
    var qtde = 0;
    //verifica quais dias foram selecionados
    //DOM
    if($('#ic_nao_repetir').is(":checked")){
        ic_nao_repetir = 1;
    } else{
        ic_dom = 2;
    }
    if($('#ic_dom').is(":checked")){
        ic_dom = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    }else{
        ic_dom = 2;
    }
    //SEG
    if($('#ic_seg').is(":checked")){
        ic_seg = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    }else{
        ic_seg = 2;
    }
    //TER
    if($('#ic_ter').is(":checked")){
        ic_ter = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    }else{
        ic_ter = 2;
    }
    //QUA
    if($('#ic_qua').is(":checked")){
        ic_qua = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    }else{
        ic_qua = 2;
    }
    //QUI
    if($('#ic_qui').is(":checked")){
        ic_qui = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    } else{
        ic_qui = 2;
    }
    //SEX
    if($('#ic_sex').is(":checked")){
        ic_sex = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    }else{
        ic_sex = 2;
    }
    //SAB
    if($('#ic_sab').is(":checked")){
        ic_sab = 1;
        qtde_dias_selecionados += 1;
        qtde +=1;
    }else{
        ic_sab = 2;
    }
        
    //DOM
    if($('#ic_dom_folga').is(":checked")){

        ic_dom_folga = 1;
    }else{
        ic_dom_folga = 2;
    }
    //SEG
    if($('#ic_seg_folga').is(":checked")){
        ic_seg_folga = 1;
    } else{
        ic_seg_folga = 2;
    }
    //TER
    if($('#ic_ter_folga').is(":checked")){
        ic_ter_folga = 1;
    } else{
        ic_ter_folga = 2;
    }
    //QUA
    if($('#ic_qua_folga').is(":checked")){
        ic_qua_folga = 1;      
    } else{
        ic_qua_folga = 2;
    }
    //QUI
    if($('#ic_qui_folga').is(":checked")){
        ic_qui_folga = 1;
    }else{
        ic_qui_folga = 2;
    }
    //SEX
    if($('#ic_sex_folga').is(":checked")){
        ic_sex_folga = 1;
    }else{
        ic_sex_folga = 2;
    }
    //SAB
    if($('#ic_sab_folga').is(":checked")){
        ic_sab_folga = 1;
    } else{
        ic_sab_folga = 2;
    }
    
   //inverteer folga
    if($('#ic_folga_inverter').is(":checked")){
        ic_folga_inverter = 1;
    } 
    
    

     var strJsonTarefa = fcFormatarDadosTarefa();
     var agenda_contratos_itens_pk="";
     if($('#agenda_contratos_itens_pk').val()=="undefined"){
         agenda_contratos_itens_pk="";
     }
     else{
         agenda_contratos_itens_pk = $('#agenda_contratos_itens_pk').val();
     }
    //verifica se algum dia foi selecionado
    if(ic_dom == 2 && ic_seg == 2 && ic_ter == 2 && ic_qua == 2 && ic_qui == 2 && ic_sex == 2 && ic_sab == 2){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $("#agenda_colaboradores_pk").val("");
        
    }else{   
        
        
        var ic_preenchimento_automatico = 2;
    
        if($('#ic_preenchimento_automatico').is(":checked")){
            ic_preenchimento_automatico = 1;
        }
        else{
            ic_preenchimento_automatico = 2;
        }

                
      
        var objParametros = {
            "pk": $("#agenda_colaborador_padrao_pk").val(),
            "ds_agenda": $("#ds_agenda").val(),
            "dt_inicio_agenda": $("#dt_inicio_agenda").val(),
            "dt_fim_agenda": $("#dt_fim_agenda").val(),
            "colaboradores_pk": $("#agenda_colaboradores_pk").val(),
            "processos_etapas_pk": $('#processos_etapas_pk_2').val(),
            "dom_turnos_pk": $('#dom_turnos_pk').val(),
            "seg_turnos_pk": $('#seg_turnos_pk').val(),
            "ter_turnos_pk": $('#ter_turnos_pk').val(),
            "qua_turnos_pk": $('#qua_turnos_pk').val(),
            "qui_turnos_pk": $('#qui_turnos_pk').val(),
            "sex_turnos_pk": $('#sex_turnos_pk').val(),
            "sab_turnos_pk": $('#sab_turnos_pk').val(),
            
            "leads_pk":$("#leads_pk_agenda").val(),
            "contratos_pk":$("#agenda_contratos_pk").val(),
            "ic_dom": ic_dom,
            "ic_seg": ic_seg,
            "ic_ter": ic_ter,
            "ic_qua": ic_qua,
            "ic_qui": ic_qui,
            "ic_sex": ic_sex,
            "ic_sab": ic_sab,
            
            "ic_dom_folga": ic_dom_folga,
            "ic_seg_folga": ic_seg_folga,
            "ic_ter_folga": ic_ter_folga,
            "ic_qua_folga": ic_qua_folga,
            "ic_qui_folga": ic_qui_folga,
            "ic_sex_folga": ic_sex_folga,
            "ic_sab_folga": ic_sab_folga, 
            "ic_folga_inverter": ic_folga_inverter,  
            
            "hr_turno_dom":$("#hr_turno_dom").val(),
            "hr_turno_seg":$("#hr_turno_seg").val(),
            "hr_turno_ter":$("#hr_turno_ter").val(),
            "hr_turno_qua":$("#hr_turno_qua").val(),
            "hr_turno_qui":$("#hr_turno_qui").val(),
            "hr_turno_sex":$("#hr_turno_sex").val(),
            "hr_turno_sab":$("#hr_turno_sab").val(),
            "hr_turno_dom_saida":$("#hr_turno_dom_saida").val(),
            "hr_turno_seg_saida":$("#hr_turno_seg_saida").val(),
            "hr_turno_ter_saida":$("#hr_turno_ter_saida").val(),
            "hr_turno_qua_saida":$("#hr_turno_qua_saida").val(),
            "hr_turno_qui_saida":$("#hr_turno_qui_saida").val(),
            "hr_turno_sex_saida":$("#hr_turno_sex_saida").val(),
            "hr_turno_sab_saida":$("#hr_turno_sab_saida").val(),
            "hr_intervalo_dom":$("#hr_intervalo_dom").val(),
            "hr_intervalo_seg":$("#hr_intervalo_seg").val(),
            "hr_intervalo_ter":$("#hr_intervalo_ter").val(),
            "hr_intervalo_qua":$("#hr_intervalo_qua").val(),
            "hr_intervalo_qui":$("#hr_intervalo_qui").val(),
            "hr_intervalo_sex":$("#hr_intervalo_sex").val(),
            "hr_intervalo_sab":$("#hr_intervalo_sab").val(),
            "hr_intervalo_saida_dom":$("#hr_intervalo_saida_dom").val(),
            "hr_intervalo_saida_seg":$("#hr_intervalo_saida_seg").val(),
            "hr_intervalo_saida_ter":$("#hr_intervalo_saida_ter").val(),
            "hr_intervalo_saida_qua":$("#hr_intervalo_saida_qua").val(),
            "hr_intervalo_saida_qui":$("#hr_intervalo_saida_qui").val(),
            "hr_intervalo_saida_sex":$("#hr_intervalo_saida_sex").val(),
            "hr_intervalo_saida_sab":$("#hr_intervalo_saida_sab").val(),
            "dt_cancelamento":$("#dt_cancelamento_agenda_escala").val(),
            "ds_motivo_cancelamento":$("#ds_motivo_cancelamento").val(),
            "tipo_escala":$("#tipo_escala").val(),
            
            
            
            "n_qtde_dias_semana":$("#qtde_dias_item").val(),
            "produtos_servicos_pk": $('#agenda_produtos_servicos_pk').val(),
            "turnos_pk": $('#turno_base_agenda_pk').val(),
            "hr_inicio_expediente": $('#hr_inicio_expediente').val(),
            "hr_termino_expediente": $('#hr_termino_expediente').val(),
            "hr_saida_intervalo": $('#hr_saida_intervalo').val(),
            "hr_retorno_intervalo": $('#hr_retorno_intervalo').val(),
            "ic_preenchimento_automatico": ic_preenchimento_automatico,
            //"nao_repetir_proxima_semana_pk":$("#nao_repetir_proxima_semana_pk").val(),
            "ic_nao_repetir":ic_nao_repetir,
            "contratos_itens_pk": agenda_contratos_itens_pk,
            "tarefas_agenda": strJsonTarefa
            
        }; 
        //alert($('#agenda_contratos_itens_pk').val())
        var arrEnviar = carregarController("agenda_colaborador_padrao", "salvar", objParametros);
        
        if (arrEnviar.result == 'success'){
            alert(arrEnviar.message);
            
            
            if($("#tblAgenda").length){ 
                $("#janela_agendas").modal("hide");
                fcRecarregarGridAgenda();
            }
            else{
                $("#janela_agendas").modal("hide");
                $("#modal_agenda_escala_contrato").modal("hide");
                $("#loader").show();
                $("#exibir").hide();
                fcCarregar();
            }
            
            
            
            
            
        }    
        else{
            alert(arrEnviar.result);
        }
    }
    
}

function fcCarregarTurno(){
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("turno", "listarTodos", objParametros);
    
    carregarComboAjax($("#dom_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#seg_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#ter_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#qua_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#qui_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#sex_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#sab_turnos_pk"), arrCarregar, " ", "pk", "ds_turno");
    carregarComboAjax($("#turno_base_agenda_pk"), arrCarregar, " ", "pk", "ds_turno");
        
}

function fcCarregarProduto(){

    var objParametros = {
        "leads_pk": $("#leads_pk_agenda").val(),
        "contratos_pk":$("#agenda_contratos_pk").val(),
        "colaborador_pk":colaborador_pk
    };      
    
    var arrCarregar = carregarController("produto_servico", "listarTodosPorLeads", objParametros);
    
    carregarComboAjax($("#agenda_produtos_servicos_pk"), arrCarregar, " ", "pk", "ds_produto_servico");    
}

function fcValidarDiaETurnoCarregarColaboradores(){
    if($('#ic_dom').is(":checked") && $('#dom_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#dom_turnos_pk').focus();
        return false;
    }
    else if($('#ic_seg').is(":checked") && $('#seg_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#seg_turnos_pk').focus();
        return false;
    }
    else if($('#ic_ter').is(":checked") && $('#ter_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#ter_turnos_pk').focus();
        return false;
    }
    else if($('#ic_qua').is(":checked") && $('#qua_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#qua_turnos_pk').focus();
        return false;
    }
    else if($('#ic_qui').is(":checked") && $('#qui_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#qui_turnos_pk').focus();
        return false;
    }
    else if($('#ic_sex').is(":checked") && $('#sex_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#sex_turnos_pk').focus();
        return false;
    }
    else if($('#ic_sab').is(":checked") && $('#sab_turnos_pk').val()==""){
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
        $('#sab_turnos_pk').focus();
        return false;
    }
    else{
        fcCarregarColaboradores();
    }
}
function fcCarregarColaboradores(){
 
    var ic_dom = 2;
    var ic_seg = 2;
    var ic_ter = 2;
    var ic_qua = 2;
    var ic_qui = 2;
    var ic_sex = 2;
    var ic_sab = 2;
    
    //DOM
    if($('#ic_dom').is(":checked")){
        ic_dom = 1;
    }
    //SEG
    if($('#ic_seg').is(":checked")){
        ic_seg = 1;
    }
    //TER
    if($('#ic_ter').is(":checked")){
        ic_ter = 1;
    }
    //QUA
    if($('#ic_qua').is(":checked")){
        ic_qua = 1;
    }
    //QUI
    if($('#ic_qui').is(":checked")){
        ic_qui = 1;
    }
    //SEX
    if($('#ic_sex').is(":checked")){
        ic_sex = 1;
    }
    //SAB
    if($('#ic_sab').is(":checked")){
        ic_sab = 1;
    }
     
    var objParametros = {
        "pk": "",
        "dt_inicio_agenda": $("#dt_inicio_agenda").val(),
        "dt_fim_agenda": $("#dt_fim_agenda").val(),
        "produtos_servicos_pk": $("#agenda_produtos_servicos_pk").val(),
        "agenda_colaborador_padrao_pk": $("#agenda_colaborador_padrao_pk").val(),
        "ic_dom": ic_dom,
        "ic_seg": ic_seg,
        "ic_ter": ic_ter,
        "ic_qua": ic_qua,
        "ic_qui": ic_qui,
        "ic_sex": ic_sex,
        "ic_sab": ic_sab,
        "dom_turnos_pk":$("#dom_turnos_pk").val(),
        "seg_turnos_pk":$("#seg_turnos_pk").val(),
        "ter_turnos_pk":$("#ter_turnos_pk").val(),
        "qua_turnos_pk":$("#qua_turnos_pk").val(),
        "qui_turnos_pk":$("#qui_turnos_pk").val(),
        "sex_turnos_pk":$("#sex_turnos_pk").val(),
        "sab_turnos_pk":$("#sab_turnos_pk").val(),
        
        
    };      
    
    var arrCarregar = carregarController("colaborador", "listarTodosColaboradoresEServico", objParametros); 
    
    carregarComboAjax($("#agenda_colaboradores_pk"), arrCarregar, " ", "pk", "ds_colaborador");
    
    
    if(colaborador_pk!=""){
        $("#agenda_colaboradores_pk").val(colaborador_pk);
        
        $("#agenda_colaboradores_pk").prop("disabled",true);
        
        
    }
}
function fcCarregarColaboradoresPesq(){
 
    var ic_dom = 2;
    var ic_seg = 2;
    var ic_ter = 2;
    var ic_qua = 2;
    var ic_qui = 2;
    var ic_sex = 2;
    var ic_sab = 2;
    
    //DOM
    if($('#ic_dom').is(":checked")){
        ic_dom = 1;
    }
    //SEG
    if($('#ic_seg').is(":checked")){
        ic_seg = 1;
    }
    //TER
    if($('#ic_ter').is(":checked")){
        ic_ter = 1;
    }
    //QUA
    if($('#ic_qua').is(":checked")){
        ic_qua = 1;
    }
    //QUI
    if($('#ic_qui').is(":checked")){
        ic_qui = 1;
    }
    //SEX
    if($('#ic_sex').is(":checked")){
        ic_sex = 1;
    }
    //SAB
    if($('#ic_sab').is(":checked")){
        ic_sab = 1;
    }
     
    var objParametros = {
        "pk": "",
        "dt_inicio_agenda": $("#dt_inicio_agenda").val(),
        "dt_fim_agenda": $("#dt_fim_agenda").val(),
        "produtos_servicos_pk": $("#agenda_produtos_servicos_pk").val(),
        "agenda_colaborador_padrao_pk": $("#agenda_colaborador_padrao_pk").val(),
        "ic_dom": ic_dom,
        "ic_seg": ic_seg,
        "ic_ter": ic_ter,
        "ic_qua": ic_qua,
        "ic_qui": ic_qui,
        "ic_sex": ic_sex,
        "ic_sab": ic_sab,
        "dom_turnos_pk":$("#dom_turnos_pk").val(),
        "seg_turnos_pk":$("#seg_turnos_pk").val(),
        "ter_turnos_pk":$("#ter_turnos_pk").val(),
        "qua_turnos_pk":$("#qua_turnos_pk").val(),
        "qui_turnos_pk":$("#qui_turnos_pk").val(),
        "sex_turnos_pk":$("#sex_turnos_pk").val(),
        "sab_turnos_pk":$("#sab_turnos_pk").val(),
        
        
    };      
    
    var arrCarregar = carregarController("colaborador", "listarTodosColaboradoresEServico", objParametros); 
    
    carregarComboAjax($("#colaborador_pk_pesq_agenda"), arrCarregar, " ", "pk", "ds_colaborador");
}

function fcLimparFormAgenda(){    

    $("#agenda_colaborador_padrao_pk").val("");
    $("#grid").empty();
    $("#agenda_produtos_servicos_pk").val("");
    $("#agenda_contratos_itens_pk").val("");
    $("#dt_inicio_agenda").val("");
    $("#dt_fim_agenda").val("");
    $("#agenda_colaboradores_pk").val("");
    $("#agenda_contratos_pk").val("");
    $("#dt_cancelamento_agenda_escala").val("");
    $("#ds_motivo_cancelamento").val("");
    $("#tipo_escala").val("");
    $("#agenda_colaboradores_pk").html('');
    
    $("#ic_dom").prop("checked", false);
    $("#ic_seg").prop("checked", false);
    $("#ic_ter").prop("checked", false);
    $("#ic_qua").prop("checked", false);
    $("#ic_qui").prop("checked", false);
    $("#ic_sex").prop("checked", false);
    $("#ic_sab").prop("checked", false);
    
    $("#ic_dom_folga").prop("checked", false);
    $("#ic_seg_folga").prop("checked", false);
    $("#ic_ter_folga").prop("checked", false);
    $("#ic_qua_folga").prop("checked", false);
    $("#ic_qui_folga").prop("checked", false);
    $("#ic_sex_folga").prop("checked", false);
    $("#ic_sab_folga").prop("checked", false);
    $("#ic_folga_inverter").prop("checked", false);
    
    $("#ic_dom").prop("disabled", false);
    $("#ic_seg").prop("disabled", false);
    $("#ic_ter").prop("disabled", false);
    $("#ic_qua").prop("disabled", false);
    $("#ic_qui").prop("disabled", false);
    $("#ic_sex").prop("disabled", false);
    $("#ic_sab").prop("disabled", false);
    
    $("#ic_dom_folga").prop("disabled", false);
    $("#ic_seg_folga").prop("disabled", false);
    $("#ic_ter_folga").prop("disabled", false);
    $("#ic_qua_folga").prop("disabled", false);
    $("#ic_qui_folga").prop("disabled", false);
    $("#ic_sex_folga").prop("disabled", false);
    $("#ic_sab_folga").prop("disabled", false);
    $("#ic_folga_inverter").prop("disabled", false);
    
    $("#dom_turnos_pk").val("");
    $("#seg_turnos_pk").val("");
    $("#ter_turnos_pk").val("");
    $("#qua_turnos_pk").val("");
    $("#qui_turnos_pk").val("");
    $("#sex_turnos_pk").val("");
    $("#sab_turnos_pk").val("");
    $("#hr_turno_dom").val("");
    $("#hr_turno_seg").val("");
    $("#hr_turno_ter").val("");
    $("#hr_turno_qua").val("");
    $("#hr_turno_qui").val("");
    $("#hr_turno_sex").val("");
    $("#hr_turno_sab").val("");
    $("#hr_turno_dom_saida").val("");
    $("#hr_turno_seg_saida").val("");
    $("#hr_turno_ter_saida").val("");
    $("#hr_turno_qua_saida").val("");
    $("#hr_turno_qui_saida").val("");
    $("#hr_turno_sex_saida").val("");
    $("#hr_turno_sab_saida").val("");
    $("#hr_intervalo_dom").val("");
    $("#hr_intervalo_seg").val("");
    $("#hr_intervalo_ter").val("");
    $("#hr_intervalo_qua").val("");
    $("#hr_intervalo_qui").val("");
    $("#hr_intervalo_sex").val("");
    $("#hr_intervalo_sab").val("");
    $("#hr_intervalo_saida_dom").val("");
    $("#hr_intervalo_saida_seg").val("");
    $("#hr_intervalo_saida_ter").val("");
    $("#hr_intervalo_saida_qua").val("");
    $("#hr_intervalo_saida_qui").val("");
    $("#hr_intervalo_saida_sex").val("");
    $("#hr_intervalo_saida_sab").val("");
    
    $("#leads_pk_agenda").val("");
    $("#turno_base_agenda_pk").val("");
    $("#hr_inicio_expediente").val("");
    $("#hr_termino_expediente").val("");
    $("#hr_saida_intervalo").val("");
    $("#hr_retorno_intervalo").val("");
    $("#ic_preenchimento_automatico").prop("checked", false);
}


//abre o formulario para a inclusao de um novo contato.
function fcAbrirFormNovoAgendaEdit(){
  
    //limpa os dados de qualquer registro existe
    fcLimparFormAgenda();
    
    $("#janela_agendas").modal();
}

function fcAbrirFormNovoAgenda(){
    //limpa os dados de qualquer registro existe
    fcLimparFormAgenda();
    
    $("#grid_itens_contrato").html("");
    $("#dias_por_servico").html("");
    
    carregarComboContrato();
    
    fcListarLeadAgenda();
    
    

    colaborador_pk = "";
    
    $("#agenda_colaboradores_pk").prop("disabled",false);
    
    $("#agenda_produtos_servicos_pk").prop("disabled",false);
    
    if(leads_pk!=""){
        $("#leads_pk_agenda").val(leads_pk);
        $("#leads_pk_agenda").prop("disabled", true);
    }
    else{

        $("#leads_pk_agenda").prop("disabled", false);
        
    }
   
    //carrega grid de produtos/servicos contratados
    //fcFormatarGridItensContratados();
    
    
    $("#janela_agendas").modal();
    
    
    
    
    var validator = $( "#form_agenda" ).validate();
    validator.resetForm();
}

//-----------------------------ITENS CONTRATADOS-----------------//
function fcItensContrato(pk){
    
    $("#grid_itens_contrato").empty();
    $("#grid_itens_contrato").html();
    var strRetorno = "";
    var strNenhumRegisto = "";
    var qtde_dias_semana = "";
    var ds_produto_servico = "";
    var ds_itens_contratador = "";
    var ds_profissionais_contratados = "";
    var ds_diferenca = "";
    var objParametros1 = {
        "leads_pk": $("#leads_pk_agenda").val(),
        "contratos_pk":$("#agenda_contratos_pk").val()      
    };   

    var arrCarregar1 = carregarController("agenda_colaborador_padrao", "listarItensContratados", objParametros1);

    if (arrCarregar1.result == 'success'){        
        strRetorno+="<div class='row'>";
        strRetorno+=    "<div class='col-md-12'>";
        strRetorno+=        "<table class='table' style='width:100%' >";
        strRetorno+=            "<thead>";
        strRetorno+=                "<tr align='center'>";
        strRetorno+=                    "<th >Produtos/Serviços</th><th >Qtde. Colaborador</th><th >Escala</th>";
        strRetorno+=                "</tr>";
        strRetorno+=            "</thead>";        
        for(i=0; i < arrCarregar1.data.length ;i++){   
            qtde_dias_semana = arrCarregar1.data[i]['t_qtde_dias_semana'];
            ds_produto_servico = arrCarregar1.data[i]['t_ds_produto_servico'];
            ds_itens_contratador = arrCarregar1.data[i]['t_qtde_contratado'];
            ds_profissionais_contratados = arrCarregar1.data[i]['t_qtde_profissional'];
            if(arrCarregar1.data[i]['t_diferenca']< 0){
                ds_diferenca = 0;
            }else{
                ds_diferenca = arrCarregar1.data[i]['t_diferenca'];
            }
            strRetorno+=        "<tbody>";
            strRetorno+=            "<tr align='center'>";
            strRetorno+=                "<td width='20%'>"+ds_produto_servico+"</td>";
            strRetorno+=                "<td width='20%'>"+ds_itens_contratador+"</td>";
            strRetorno+=                "<td width='20%'>"+qtde_dias_semana+"</td>";
            strRetorno+=            "</tr>";
            strRetorno+=        "</tbody>";
        }    
        strRetorno+=        "</table>";
        strRetorno+=    "</div>";
        strRetorno+="</div>";
        
        $("#grid_itens_contrato").html(strRetorno);
    }    
}

function fcDiasContratados(){
    
    $("#dias_por_servico").html();
    var strRetorno = "";
    var strNenhumRegisto = "";
    var qtde_dias_semana = "";
    var ds_produto_servico = "";
    var ds_itens_contratador = "";
    var ds_profissionais_contratados = "";
    var ds_diferenca = "";
    var objParametros1 = {
        "leads_pk": $("#leads_pk_agenda").val(),
        "contratos_pk":$("#agenda_contratos_pk").val(),
        "produtos_servicos_pk":$("#agenda_produtos_servicos_pk").val()
    };   

    var arrCarregar1 = carregarController("agenda_colaborador_padrao", "listarItensContratados", objParametros1);
 
    if (arrCarregar1.result == 'success'){ 
        for(i=0; i < arrCarregar1.data.length ;i++){  
            qtde_dias_semana = arrCarregar1.data[i]['t_qtde_dias_semana'];
            var agenda_contratos_itens_pk = arrCarregar1.data[i]['t_contratos_itens_pk'];
        }
        strRetorno+="<div class='row'>";
        strRetorno+=    "<div class='col-md-5'>";
        strRetorno+=    "<b>Escala</b>:";
        strRetorno+=    "</div>";
        strRetorno+=    "<div class='col-md-4'>";
        strRetorno+=    qtde_dias_semana;
        strRetorno+=    "</div>";        
        strRetorno+="</div>";
        
        $("#dias_por_servico").html(strRetorno);
        $("#qtde_dias_item").val(qtde_dias_semana); 
        
        /*if(qtde_dias_semana=="12x6"){
            $("#exibir_checkbox").show();
            $(document).on('click', '#ic_nao_repetir', fcExibirComboNaoRepetir);
        }
        else{
            $("#exibir_checkbox").hide();
        }*/
        $("#agenda_contratos_itens_pk").val(agenda_contratos_itens_pk);
    } 
}

function fcExibirComboNaoRepetir(){
    if($('#ic_nao_repetir').is(":checked")){
        $('#ic_nao_repetir').prop('checked', true);
        fcComboNaoRepeticaoProximaSemana();
        $("#exibir_nao_repetir").show();
        
        
    }
    else {
        $('#ic_nao_repetir').prop('checked', false);
        $("#exibir_nao_repetir").hide()
        $("#nao_repetir_proxima_semana_pk").val("")
    }
}

function fcComboNaoRepeticaoProximaSemana(){
    
    var strNaoRepeticao = "";
    strNaoRepeticao +="<div class='row' id='exibir_nao_repetir' style='display:none'> ";
    strNaoRepeticao +="<div class='col-md-4'>";
    strNaoRepeticao +="<label for='cargos_pk'>Não Repetir Próxima Semana: </label>";
    strNaoRepeticao +="<select class='form-control form-control-sm'  id='nao_repetir_proxima_semana_pk' name='nao_repetir_proxima_semana_pk' >";
    strNaoRepeticao +="<option></option>";
    //if($('#ic_dom').is(":checked")){
        strNaoRepeticao +="<option value='1'>Domingo</option>";
    //}
    //SEG
    //if($('#ic_seg').is(":checked")){
       strNaoRepeticao +="<option value='2'>Segunda</option>";
    //}
    //TER
    //if($('#ic_ter').is(":checked")){
        strNaoRepeticao +="<option value='3'>Terça</option>";
    //}
    //QUA
    //if($('#ic_qua').is(":checked")){
        strNaoRepeticao +="<option value='4'>Quarta</option>";
    //}
    //QUI
    //if($('#ic_qui').is(":checked")){
        strNaoRepeticao +="<option value='5'>Quinta</option>";
    //}
    //SEX
    //if($('#ic_sex').is(":checked")){
        strNaoRepeticao +="<option value='6'>Sexta</option>";
    //}
    //SAB
    //if($('#ic_sab').is(":checked")){
        strNaoRepeticao +="<option value='7'>Sabado</option>";
    //}
    strNaoRepeticao +="</select>";
    strNaoRepeticao +="</div>"; 
                            
    strNaoRepeticao +="</div>";
    $("#combo_nao_repetir").append(strNaoRepeticao);
    
    
}

function fcFormatarGridItensContratados(contrato_pk){
        
        var strRetorno = "";
        var strNenhumRegisto = "";
        var qtde_dias_semana = "";
        var ds_produto_servico = "";
        var ds_itens_contratador = "";
        var ds_profissionais_contratados = "";
        var ds_diferenca = "";        
        
        var objParametros = {
            "leads_pk": $("#leads_pk_agenda").val(),
            "processos_default_pk": processos_default_pk,
            "processos_pk":pk
        };     
    
        var arrCarregar = carregarController("contrato", "listarContratoLeadProcesso", objParametros); 
        
        if (arrCarregar.result == 'success'){            
            if(arrCarregar.data.length >0){      
                for(j=0; j < arrCarregar.data.length ;j++){                    
                    if(arrCarregar.data[j]['t_vl_total'] > "0,00"){             
                        strRetorno+="<div class='row'>";
                        strRetorno+="  <div class='col-md-12'>";
                        strRetorno+="     <h5>Cod.Contrato "+arrCarregar.data[j]['t_pk']+" DT.Ini "+arrCarregar.data[j]['t_dt_inicio_contrato']+" DT.Fim "+arrCarregar.data[j]['t_dt_fim_contrato']+"</h5>";
                        strRetorno+="  </div>";
                        strRetorno+="</div>";
                        var objParametros1 = {
                           "leads_pk": $("#leads_pk_agenda").val(),
                           "contratos_pk":contrato_pk,
                           "produtos_servicos_pk":$("#agenda_produtos_servicos_pk").val()
                        };   
                        var arrCarregar1 = carregarController("agenda_colaborador_padrao", "listarItensContratados", objParametros1);
                       
                        if (arrCarregar1.result == 'success'){
                            for(i=0; i < arrCarregar1.data.length ;i++){
                           
                                strRetorno+="<div class='row'><div class='col-md-12'>";
                                strRetorno+="<table class='table table-striped table-bordered ' style='width:100%' >";
                                strRetorno+="<tbody>";
                                strRetorno+="<tr>";
                                strRetorno+="<th width='20%'>Produtos/Serviços</th><th width='20%'>Qtde. Itens Contrat</th><th width='20%'>Qtde. Dias</th><th width='20%'>Qtde. Profissionais</th><th width='20%'>Dif</th>";
                                strRetorno+="</tr>";

                                //if(arrCarregar.data[i]['t_qtde_profissional'] > 0){


                                    qtde_dias_semana = arrCarregar1.data[i]['t_qtde_dias_semana'];
                                    ds_produto_servico = arrCarregar1.data[i]['t_ds_produto_servico'];
                                    ds_itens_contratador = arrCarregar1.data[i]['t_qtde_contratado'];
                                    ds_profissionais_contratados = arrCarregar1.data[i]['t_qtde_profissional'];
                                    if(arrCarregar1.data[i]['t_diferenca']< 0){
                                        ds_diferenca = 0;
                                    }
                                    else{
                                        ds_diferenca = arrCarregar1.data[i]['t_diferenca'];
                                    }


                                    strRetorno+="<tr>";
                                    strRetorno+="<td width='20%'><b>"+ds_produto_servico+"</b></td>";

                                    strRetorno+="<td width='20%'><b>"+ds_itens_contratador+"</b></td>";
                                    strRetorno+="<td width='20%'><b>"+qtde_dias_semana+"</b></td>";
                                    strRetorno+="<td width='20%'><b>"+ds_profissionais_contratados+"</b></td>";
                                    strRetorno+="<td width='20%'><b>"+ds_diferenca+"</b></td>";
                                    strRetorno+="</tr>";
                                    strRetorno+="<tr>";

                                    var objParametros2 = {
                                        "leads_pk": $("#leads_pk_agenda").val(),
                                        "processos_pk": pk,
                                        "contratos_pk":arrCarregar1.data[i]['t_contratos_itens_pk'],
                                        "qtde_dias_contrato":arrCarregar1.data[i]['t_qtde_dias_semana']
                                    };   
                                    var arrCarregar2 = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorLeadProdutosServicos", objParametros2);
                                    if (arrCarregar2.result == 'success'){

                                        var dt_ini = "";
                                        var dt_fim = "";
                                        var ds_dias_semana= "";
                                        var ds_colaborador= "";
                                        for(l=0; l < arrCarregar2.data.length ;l++){
                                            strRetorno+="<div class='row'><div class='col-md-12'>";
                                            strRetorno+="<table class='table table-striped table-bordered' style='width:100%' id='tblResultado'>";
                                            strRetorno+="<thead><tr>";
                                            strRetorno+="<th width='20%'>Colaborador</th><th width='20%'>Dt.Inicio</th><th width='20%'>Dt.Fim</th><th width='20%'>Dia Semana</th>";
                                            strRetorno+="</tr>";
                                            strRetorno+="</thead>";
                                            strRetorno+="<tbody>";
                                            
                                            dt_ini = arrCarregar2.data[l]['t_dt_inicio_agenda'];
                                            dt_fim = arrCarregar2.data[l]['t_dt_fim_agenda'];
                                            ds_dias_semana = arrCarregar2.data[l]['t_ds_dia_semana'];
                                            ds_colaborador = arrCarregar2.data[l]['t_ds_colaborador'];

                                            strRetorno+="<tr>";
                                            strRetorno+="<td width='20%'>"+ds_colaborador+"</td>";
                                            strRetorno+="<td width='20%'>"+dt_ini+"</td>";
                                            strRetorno+="<td width='20%'>"+dt_fim+"</td>";
                                            strRetorno+="<td width='20%'>"+ds_dias_semana+"</td>";

                                            strRetorno+="</tr>";
                                        }
                                        strRetorno+="</tbody>";
                                        strRetorno+="</table>";
                                        strRetorno+="</div>";
                                        strRetorno+="</div>";
                                        strRetorno+="<hr><br>";

                                    }
                                //}

                            }
                        }
                        
                    }
                }
            } 
            
        }
        else{
            alert('Falhar ao carregar o registro');
        }
    if(strRetorno!=""){
        $("#grid").append(strRetorno);
    }else{        
        strNenhumRegisto+="<div class='row'>";
        strNenhumRegisto+="<div class='col-md-12 text-center'>";
        strNenhumRegisto+="   <h3><b>Nenhum Registro Encontrado</b></h3>";
        strNenhumRegisto+=" </div>";
        strNenhumRegisto+="</div>";
        $("#grid").append(strNenhumRegisto);
    }
    
}

function carregarGridDiaSemanaTurno(){
 
    tblAgendaTurno = $("#tblAgendaTurno").DataTable({
        "scrollX": false,
        "responsive": true,
        "searching": false,
        "ordering": false,
        "paging": false,
        "bFilter": false,
        "bInfo": false,
        "columnDefs" : [{
            orderable: false,
            targets: [1,2,3,4,5,6]
        }],        
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }            
    });
    
}

function carregarComboContrato(){
   
    var objParametros = {
        "leads_pk": $("#leads_pk_agenda").val(),
        "processos_pk":pk,
        "colaborador_pk":colaborador_pk
    };      
    
    var arrCarregar = carregarController("contrato", "listarLeadsPk", objParametros);   

    carregarComboAjax($("#agenda_contratos_pk"), arrCarregar, "   ", "pk", "ds_combo_contrato");
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
    }else{
        $("#dt_inicio_agenda").val("");
        $("#dt_fim_agenda").val("");
    }    
}



//----------------------------TAREFAS------------------------------------------------
function fcVerificarDiaSemana(ic_dia_semana){

    var ic_dom = 2;
    var ic_seg = 2;
    var ic_ter = 2;
    var ic_qua = 2;
    var ic_qui = 2;
    var ic_sex = 2;
    var ic_sab = 2; 
    
    if($('#ic_dom').is(":checked")){
        ic_dom = 1;
    }
    //SEG
    if($('#ic_seg').is(":checked")){
        ic_seg = 1;
    }
    //TER
    if($('#ic_ter').is(":checked")){
        ic_ter = 1;
    }
    //QUA
    if($('#ic_qua').is(":checked")){
        ic_qua = 1;
    }
    //QUI
    if($('#ic_qui').is(":checked")){
        ic_qui = 1;
    }
    //SEX
    if($('#ic_sex').is(":checked")){
        ic_sex = 1;
    }
    //SAB
    if($('#ic_sab').is(":checked")){
        ic_sab = 1;
    }
    
    if(ic_dia_semana==1 && ic_dom==2){        
        return false;
    }
    else if(ic_dia_semana==2 && ic_seg==2){        
        return false;
    }
    else if(ic_dia_semana==3 && ic_ter==2){       
        return false;
    }
    else if(ic_dia_semana==4 && ic_qua==2){        
        return false;
    }
    else if(ic_dia_semana==5 && ic_qui==2){        
        return false;
    }
    else if(ic_dia_semana==6 && ic_sex==2){        
        return false;
    }
    else if(ic_dia_semana==7 && ic_sab==2){        
        return false;
    }
    else{
         return true;
    }
    
   
}
function fcAbrirModalTarefa(ic_dia_semana){
    
    if(!fcVerificarDiaSemana(ic_dia_semana)){
        alert("Selecione o Dia da Semana");
        return false;
    }
    
    $("#ic_dia").val("");
    $("#ds_tarefa").val("");
    $("#obs_tarefa").val("");
    $("#hr_inicio").val("");
    $("#ic_dia").val(ic_dia_semana);
    
    $("#modal_tarefa").modal();
}


//Tabela escondida para inserir as tarefas
function fcFormatarGrid(){
        
   var objParametros = {
        "agendas_pk": $("#agenda_colaborador_padrao_pk").val(),
        "ic_dia":$("#ic_dia").val()
    };     
    var v_url = montarUrlController("agenda_colaborador_tarefa", "listarTarefaPorIcDiaAgenda", objParametros);
    
    //Trata a tabela
    tblTarefa = $('#tblTarefa').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "searching": false,
        "paging": false,
        "bFilter": false,
        "bInfo": false, 
        "columnDefs": [
           {"targets": -1, "data": "ic_dia"},
           {"targets": -2, "data": "hr_inicio"},
           {"targets": -3, "data": "obs_tarefa"},
           {"targets": -4, "data": "ds_tarefa"},
           {"targets": -5, "data": "pk"},
           

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    
    
    
    
}

function fcIncluirTarefa(){   
    
    if($("#agenda_colaborador_padrao_pk").val()!=""){
        fcSalvarTarefa();
    }
    else{
        fcIncluirLinhaTarefa();
        $("#modal_tarefa").modal("hide");
    }
    
}
//Incluir linha Tabela escondida 
function fcIncluirLinhaTarefa(){
    tblTarefa.row.add(
        {
            "pk":"",
            "ds_tarefa":$("#ds_tarefa").val(),
            "obs_tarefa":$("#obs_tarefa").val(),
            "hr_inicio":$("#hr_inicio").val(),
            "ic_dia":$("#ic_dia").val()
        }
    ).draw();
    
     return false;
}

function fcSalvarTarefa(){
    var objParametros = {
        "agendas_pk": $("#agenda_colaborador_padrao_pk").val(),
        "pk":"",
        "ds_tarefa":$("#ds_tarefa").val(),
        "obs_tarefa":$("#obs_tarefa").val(),
        "hr_inicio":$("#hr_inicio").val(),
        "ic_dia":$("#ic_dia").val()

    }; 
    //alert($('#agenda_contratos_itens_pk').val())
    var arrEnviar = carregarController("agenda_colaborador_tarefa", "salvar", objParametros);
    if (arrEnviar.result == 'success'){
         $("#modal_tarefa").modal("hide");
    }    
    else{
        alert(arrEnviar.result);
    }
}

function fcAbrirModalHistoricoTarefa(ic_dia_semana){
    $("#ic_dia_historico").val(ic_dia_semana)
    tblHistoricoTarefa.clear().destroy();
    fcFormatarGridHistorico();
    
    
    if($("#agenda_colaborador_padrao_pk").val()==""){
        var  data = tblTarefa.rows().data();
        
        for(i = 0; i< data.length; i++){
            if(data[i]['ic_dia']==ic_dia_semana){
                tblHistoricoTarefa.row.add(
                    {
                        "pk":"",
                        "ds_tarefa":data[i]['ds_tarefa'],
                        "obs_tarefa":data[i]['obs_tarefa'],
                        "hr_inicio":data[i]['hr_inicio'],
                        "ic_dia":data[i]['ic_dia']
                    }
                ).draw();
            }
        }
    }
    $("#modal_historico_tarefa").modal();    
}

function fcFormatarGridHistorico(){       
   var objParametros = {
        "agendas_pk": $("#agenda_colaborador_padrao_pk").val(),
        "ic_dia":$("#ic_dia_historico").val()
    };     
    var v_url = montarUrlController("agenda_colaborador_tarefa", "listarTarefaPorIcDiaAgenda", objParametros);
  
    //Trata a tabela
    tblHistoricoTarefa = $('#tblHistoricoTarefa').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "searching": false,
        "paging": false,
        "bFilter": false,
        "bInfo": false, 
        "columnDefs": [
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            },
           {"targets": -2, "data": "hr_inicio"},
           {"targets": -3, "data": "obs_tarefa"},
           {"targets": -4, "data": "ds_tarefa"},
           {"targets": -5, "data": "pk"},
           

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    $('#tblHistoricoTarefa tbody').on('click', '.function_delete', function () {
        var data;
        
        if(tblHistoricoTarefa.row( $(this).parents('li') ).data()){
            data = tblHistoricoTarefa.row( $(this).parents('li') ).data();
        }
        else if(tblHistoricoTarefa.row( $(this).parents('tr') ).data()){
            data = tblHistoricoTarefa.row( $(this).parents('tr') ).data();
        }
        
        if(data['pk'] != ""){
            fcExcluirTarefa(data['pk']);
        }
        
        if(data['pk']==""){
            //REMOVE REGISTRO DA TABELA INVISIVEL, quando excluir do historico excluir da tabela que formata os dados para cadastrar no BD
            var  data1 = tblTarefa.rows().data();
            for(i = 0; i< data1.length; i++){

                if(data1[i]['ds_tarefa']==data['ds_tarefa']){
                    if(data1[i]['obs_tarefa']==data['obs_tarefa']){
                        if(data1[i]['hr_inicio']==data['hr_inicio']){
                            if(data1[i]['ic_dia']==data['ic_dia']){
                                //REMOVE O REGISTRO DE ACORDO COM O INDICE
                                data1.row(i).remove().draw();
                            }
                        }
                    }

                }
            }
        }
                
        tblHistoricoTarefa.row($(this).parents('tr')).remove().draw();
        
        tblHistoricoTarefa.clear().destroy();
        fcFormatarGridHistorico();
    } );
    
}
function fcExcluirTarefa(v_pk){
    if(v_pk != ""){
        var objParametros = {
            "pk": v_pk
        };              

        var arrExcluir = carregarController("agenda_colaborador_tarefa", "excluir", objParametros);   
        if (arrExcluir.result == 'success'){

            tblHistoricoTarefa.clear().destroy();
            fcFormatarGridHistorico();
        }
        else{
            alert('Falhou a requisição de exclusão.');
        }
    }
    else{
        alert("Código não encontrado");
    }
}
//FORMATA OS DADOS DAS TAREFAS PARA SALVAR NO BANCO DE DADOS
function fcFormatarDadosTarefa(){
    
    try{
        var tarefas_pk = "";
        var ds_tarefa = "";
        var obs_tarefa = "";
        var hr_inicio = "";
        var ic_dia = "";

        var arrKeys = [];
        var arrDados = [];
        arrKeys[0] = "tarefas_pk";
        arrKeys[1] = "ds_tarefa";
        arrKeys[2] = "obs_tarefa";
        arrKeys[3] = "hr_inicio";
        arrKeys[4] = "ic_dia";
        
        var  data = tblTarefa.rows().data();
        
        for(i = 0; i< data.length; i++){
            tarefas_pk = data[i]['pk'];
            ds_tarefa =  data[i]['ds_tarefa'];
            obs_tarefa =  data[i]['obs_tarefa'];
            hr_inicio =  data[i]['hr_inicio'];
            ic_dia =  data[i]['ic_dia'];

            arrDados[i] = [tarefas_pk, ds_tarefa,obs_tarefa,hr_inicio,ic_dia];
                        
        }
        return arrayToJson(arrKeys, arrDados);
    }
    catch(err) {
        alert(err);
    } 
}

function fcVerificarFolga(){
    $('#ic_dom').click(function() {
        if($('#ic_dom').is(":checked")){
            $("#ic_dom_folga").prop("disabled", true);
            $("#ic_dom_folga").prop("checked", false);
        }
        else{
            $("#ic_dom_folga").prop("disabled", false);
        }
    }); 
    $('#ic_seg').click(function() {
        if($('#ic_seg').is(":checked")){
            $("#ic_seg_folga").prop("disabled", true);
            $("#ic_sab_folga").prop("checked", false);
        }
        else{
            $("#ic_seg_folga").prop("disabled", false);
        }
    }); 
    $('#ic_ter').click(function() {
        if($('#ic_ter').is(":checked")){
            $("#ic_ter_folga").prop("disabled", true);
            $("#ic_ter_folga").prop("checked", false);
        }
        else{
            $("#ic_ter_folga").prop("disabled", false);
        }
    }); 
    $('#ic_qua').click(function() {
        if($('#ic_qua').is(":checked")){
            $("#ic_qua_folga").prop("disabled", true);
            $("#ic_qua_folga").prop("checked", false);
        }
        else{
            $("#ic_qua_folga").prop("disabled", false);
        }
    }); 
    $('#ic_qui').click(function() {
        if($('#ic_qui').is(":checked")){
            $("#ic_qui_folga").prop("disabled", true);
            $("#ic_qui_folga").prop("checked", false);
        }
        else{
             $("#ic_qui_folga").prop("disabled", false);
        }
    }); 
    $('#ic_sex').click(function() {
        if($('#ic_sex').is(":checked")){
            $("#ic_sex_folga").prop("disabled", true);
            $("#ic_sex_folga").prop("checked", false);
        }
        else{
             $("#ic_sex_folga").prop("disabled", false);
        }
    }); 
    $('#ic_sab').click(function() {
        if($('#ic_sab').is(":checked")){
            $("#ic_sab_folga").prop("disabled", true);
            $("#ic_sab_folga").prop("checked", false);
        }
        else{
             $("#ic_sab_folga").prop("disabled", false);
        }
    });
    
}
function fcVerificarTrabalho(){
    $('#ic_dom_folga').click(function() {
        if($('#ic_dom_folga').is(":checked")){
            $("#ic_dom").prop("disabled", true);
            $("#ic_dom").prop("checked", false);
        }
        else{
             $("#ic_dom").prop("disabled", false);
        }
    }); 
    $('#ic_seg_folga').click(function() {
        if($('#ic_seg_folga').is(":checked")){
            $("#ic_seg").prop("disabled", true);
            $("#ic_seg").prop("checked", false);
        }
        else{
             $("#ic_seg").prop("disabled", false);
        }
    }); 
    $('#ic_ter_folga').click(function() {
        if($('#ic_ter_folga').is(":checked")){
            $("#ic_ter").prop("disabled", true);
            $("#ic_ter").prop("checked", false);
        }
        else{
             $("#ic_ter").prop("disabled", false);
        }
    }); 
    $('#ic_qua_folga').click(function() {
        if($('#ic_qua_folga').is(":checked")){
            $("#ic_qua").prop("disabled", true);
            $("#ic_qua").prop("checked", false);
        }
        else{
             $("#ic_qua").prop("disabled", false);
        }
    }); 
    $('#ic_qui_folga').click(function() {
        if($('#ic_qui_folga').is(":checked")){
            $("#ic_qui").prop("disabled", true);
            $("#ic_qui").prop("checked", false);
        }
        else{
            $("#ic_qui").prop("disabled", false);
        }
    }); 
    $('#ic_sex_folga').click(function() {
        if($('#ic_sex_folga').is(":checked")){
            $("#ic_sex").prop("disabled", true);
            $("#ic_sex").prop("checked", false);
        }
        else{
            $("#ic_sex").prop("disabled", false);
        }
    }); 
    $('#ic_sab_folga').click(function() {
        if($('#ic_sab_folga').is(":checked")){
            $("#ic_sab").prop("disabled", true);
            $("#ic_sab").prop("checked", false);
        }
        else{
            $("#ic_sab").prop("disabled", false);
        }
    });
    
}

function fcListarLeadAgenda(){
    
    
    var objParametros = {
        "leads_pk": leads_pk
    };      
    
    var arrCarregar = carregarController("lead", "listarTodosAtivo", objParametros);   
   
    carregarComboAjax($("#leads_pk_agenda"), arrCarregar, " ", "pk", "ds_lead");
    
}   
function fcListarLeadAgendaPesq(){
    
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("lead", "listarTodosAtivo", objParametros);   
   
    carregarComboAjax($("#leads_pk_pesq_agenda"), arrCarregar, " ", "pk", "ds_lead");
    
}   
function fcListarProdutoServicoPesq(){
    
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("produto_servico", "listarTodos", objParametros);   
   
    carregarComboAjax($("#produtos_pesq_agenda"), arrCarregar, " ", "pk", "ds_produto_servico");
    
    
}

function fcValidarPreencherAutomatico(){
    
    
    
    
    if($("#leads_pk_agenda").val()==""){
        alert("Por favor, informe um Posto de Trabalho.");

        $("#ic_preenchimento_automatico").prop("checked", false);
        $("#leads_pk_agenda").focus();
        return false;

    }
    if($("#agenda_contratos_pk").val()==""){
        alert("Por favor, informe um Contrato.");

        $("#ic_preenchimento_automatico").prop("checked", false);
        $("#agenda_contratos_pk").focus();
        return false;

    }
    if($("#agenda_produtos_servicos_pk").val()==""){
        alert("Por favor, informe um Produtos/Serviços.");

        $("#ic_preenchimento_automatico").prop("checked", false);
        $("#agenda_produtos_servicos_pk").focus();
        return false;

    }
    if($("#agenda_colaboradores_pk").val()==""){
        alert("Por favor, informe um Colaboradores.");

        $("#ic_preenchimento_automatico").prop("checked", false);
        $("#agenda_colaboradores_pk").focus();
        return false;

    }
    
    
    var ic_preenchimento_automatico = 2;
    
    if($('#ic_preenchimento_automatico').is(":checked")){
        ic_preenchimento_automatico = 1;
    }
    else{
        ic_preenchimento_automatico = 2;
    }
    
    
    
    
    if(ic_preenchimento_automatico==1){
        
        if($("#turno_base_agenda_pk").val()==""){
            alert("Por favor, informe um Turno.");
            
            $("#ic_preenchimento_automatico").prop("checked", false);
            $("#turno_base_agenda_pk").focus();
            return false;
            
        }
        if($("#hr_inicio_expediente").val()==""){
            alert("Por favor, informe Horário Inicio.");
            
            $("#ic_preenchimento_automatico").prop("checked", false);
            $("#hr_inicio_expediente").focus();
            
            return false;
        }
            
        if($("#hr_termino_expediente").val()==""){
            alert("Por favor, informe Horário Término.");
            
            $("#ic_preenchimento_automatico").prop("checked", false);
            $("#hr_termino_expediente").focus();
            return false;
            
        }
        
        fcPreencherGridEscala();
        
        
    }
    else{
        $("#ic_preenchimento_automatico").prop("checked", false);
        
        fcLimparRegistroGridEscalaHorario();
    }
    
}


function fcLimparRegistroGridEscalaHorario(){
     //ESCALA 
     
    $("#ic_dom").prop("checked", false);
    $("#ic_seg").prop("checked", false);
    $("#ic_ter").prop("checked", false);
    $("#ic_qua").prop("checked", false);
    $("#ic_qui").prop("checked", false);
    $("#ic_sex").prop("checked", false);
    $("#ic_sab").prop("checked", false);


    //FOLGA
    $("#ic_dom_folga").prop("checked", false);
    $("#ic_seg_folga").prop("checked", false);
    $("#ic_ter_folga").prop("checked", false);
    $("#ic_qua_folga").prop("checked", false);
    $("#ic_qui_folga").prop("checked", false);
    $("#ic_sex_folga").prop("checked", false);
    $("#ic_sab_folga").prop("checked", false);


    //TURNOS
    $("#dom_turnos_pk").val("");
    $("#seg_turnos_pk").val("");
    $("#ter_turnos_pk").val("");
    $("#qua_turnos_pk").val("");
    $("#qui_turnos_pk").val("");
    $("#sex_turnos_pk").val("");
    $("#sab_turnos_pk").val("");
    
    
    
    //HORARIOS
    $("#hr_turno_dom").val("");
    $("#hr_intervalo_dom").val("");
    $("#hr_intervalo_saida_dom").val("");
    $("#hr_turno_dom_saida").val("");

    $("#hr_turno_seg").val("");
    $("#hr_intervalo_seg").val("");
    $("#hr_intervalo_saida_seg").val("");
    $("#hr_turno_seg_saida").val("");

    $("#hr_turno_ter").val("");
    $("#hr_intervalo_ter").val("");
    $("#hr_intervalo_saida_ter").val("");
    $("#hr_turno_ter_saida").val("");

    $("#hr_turno_qua").val("");
    $("#hr_intervalo_qua").val("");
    $("#hr_intervalo_saida_qua").val("");
    $("#hr_turno_qua_saida").val("");

    $("#hr_turno_qui").val("");
    $("#hr_intervalo_qui").val("");
    $("#hr_intervalo_saida_qui").val("");
    $("#hr_turno_qui_saida").val("");

    $("#hr_turno_sex").val("");
    $("#hr_intervalo_sex").val("");
    $("#hr_intervalo_saida_sex").val("");
    $("#hr_turno_sex_saida").val("");

    $("#hr_turno_sab").val("");
    $("#hr_intervalo_sab").val("");
    $("#hr_intervalo_saida_sab").val("");
    $("#hr_turno_sab_saida").val("");
    
}

function fcPreencherGridEscala(){
    
    
    
    
    
    //HORARIOS
                
    $("#hr_turno_dom").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_dom").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_dom").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_dom_saida").val($("#hr_termino_expediente").val());

    $("#hr_turno_seg").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_seg").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_seg").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_seg_saida").val($("#hr_termino_expediente").val());

    $("#hr_turno_ter").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_ter").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_ter").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_ter_saida").val($("#hr_termino_expediente").val());

    $("#hr_turno_qua").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_qua").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_qua").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_qua_saida").val($("#hr_termino_expediente").val());

    $("#hr_turno_qui").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_qui").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_qui").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_qui_saida").val($("#hr_termino_expediente").val());

    $("#hr_turno_sex").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_sex").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_sex").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_sex_saida").val($("#hr_termino_expediente").val());

    $("#hr_turno_sab").val($("#hr_inicio_expediente").val());
    $("#hr_intervalo_sab").val($("#hr_saida_intervalo").val());
    $("#hr_intervalo_saida_sab").val($("#hr_retorno_intervalo").val());
    $("#hr_turno_sab_saida").val($("#hr_termino_expediente").val());
    
    
    switch($("#qtde_dias_item").val()){
        
        case "1D":{
                //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", false);
                $("#ic_qua").prop("checked", false);
                $("#ic_qui").prop("checked", false);
                $("#ic_sex").prop("checked", false);
                $("#ic_sab").prop("checked", false);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", true);
                $("#ic_qua_folga").prop("checked", true);
                $("#ic_qui_folga").prop("checked", true);
                $("#ic_sex_folga").prop("checked", true);
                $("#ic_sab_folga").prop("checked", true);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                return false;
        }
        case "2D":{
                
                 //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", true);
                $("#ic_qua").prop("checked", false);
                $("#ic_qui").prop("checked", false);
                $("#ic_sex").prop("checked", false);
                $("#ic_sab").prop("checked", false);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", false);
                $("#ic_qua_folga").prop("checked", true);
                $("#ic_qui_folga").prop("checked", true);
                $("#ic_sex_folga").prop("checked", true);
                $("#ic_sab_folga").prop("checked", true);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                
                
                return false;
        }
        case "3D":{
                
                 //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", true);
                $("#ic_qua").prop("checked", true);
                $("#ic_qui").prop("checked", false);
                $("#ic_sex").prop("checked", false);
                $("#ic_sab").prop("checked", false);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", false);
                $("#ic_qua_folga").prop("checked", false);
                $("#ic_qui_folga").prop("checked", true);
                $("#ic_sex_folga").prop("checked", true);
                $("#ic_sab_folga").prop("checked", true);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                
                
                return false;
        }
        case "4D":{
                
                 //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", true);
                $("#ic_qua").prop("checked", true);
                $("#ic_qui").prop("checked", true);
                $("#ic_sex").prop("checked", false);
                $("#ic_sab").prop("checked", false);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", false);
                $("#ic_qua_folga").prop("checked", false);
                $("#ic_qui_folga").prop("checked", false);
                $("#ic_sex_folga").prop("checked", true);
                $("#ic_sab_folga").prop("checked", true);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                
                return false;
        }
        case "5D":{
                
                
                 //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", true);
                $("#ic_qua").prop("checked", true);
                $("#ic_qui").prop("checked", true);
                $("#ic_sex").prop("checked", true);
                $("#ic_sab").prop("checked", false);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", false);
                $("#ic_qua_folga").prop("checked", false);
                $("#ic_qui_folga").prop("checked", false);
                $("#ic_sex_folga").prop("checked", false);
                $("#ic_sab_folga").prop("checked", false);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                
                return false;
        }
        case "6X1":{
                
                
                 //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", true);
                $("#ic_qua").prop("checked", true);
                $("#ic_qui").prop("checked", true);
                $("#ic_sex").prop("checked", true);
                $("#ic_sab").prop("checked", true);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", false);
                $("#ic_qua_folga").prop("checked", false);
                $("#ic_qui_folga").prop("checked", false);
                $("#ic_sex_folga").prop("checked", false);
                $("#ic_sab_folga").prop("checked", false);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                
                
                
                return false;
        }
        case "12x36":{
                
                
                 //ESCALA 
                $("#ic_dom").prop("checked", false);
                $("#ic_seg").prop("checked", true);
                $("#ic_ter").prop("checked", false);
                $("#ic_qua").prop("checked", true);
                $("#ic_qui").prop("checked", false);
                $("#ic_sex").prop("checked", true);
                $("#ic_sab").prop("checked", false);
                
                
                //FOLGA
                $("#ic_dom_folga").prop("checked", true);
                $("#ic_seg_folga").prop("checked", false);
                $("#ic_ter_folga").prop("checked", true);
                $("#ic_qua_folga").prop("checked", false);
                $("#ic_qui_folga").prop("checked", true);
                $("#ic_sex_folga").prop("checked", false);
                $("#ic_sab_folga").prop("checked", true);
                
                
                //TURNOS
                $("#dom_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#seg_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#ter_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qua_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#qui_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sex_turnos_pk").val($("#turno_base_agenda_pk").val());
                $("#sab_turnos_pk").val($("#turno_base_agenda_pk").val());
                
                
                
                
                
                
                
                return false;
        }
        
        default:{
                return false;
        }
    }
    
    
}

function fcPegarProcessosEtapas(){
    
    var objParametros = {
        "leads_pk": $("#leads_pk_agenda").val()
    };      

    var arrCarregar = carregarController("processo", "listarEtapasLeads", objParametros);
    
    if (arrCarregar.result == 'success'){
        $("#processos_etapas_pk_2").val(arrCarregar.data[0]['pk']);
        pk = arrCarregar.data[0]['processos_pk'];
    }
    
    
    
}


function fcVerificarEscalaColaborador(){
    var objParametros = {
        "pk": $("#agenda_colaboradores_pk").val(),
        "dt_base":$("#dt_inicio_agenda").val()
    };      

    var arrCarregar = carregarController("colaborador", "verificarEscala", objParametros);
    
    if (arrCarregar.result == 'success'){
        if(arrCarregar.data[0]['qtde']>0){
            var resultado = confirm("Colaborador(a) "+$("#agenda_colaboradores_pk option:selected").text()+" já faz parte de uma escala, deseja continuar ?");
            if (resultado == true) {
                
            }
            else{
                if(colaborador_pk!=""){
                    $("#agenda_colaboradores_pk").prop("disabled",false);
                    setTimeout(function(){$("#janela_agendas").modal("hide");},1000);
                    
                }
                $("#agenda_colaboradores_pk").val("");
            }
        }
        
    }
}

function fcVerificarQtdeAgendaProduto(){
    var objParametros = {
        "produtos_servicos_pk": $("#agenda_produtos_servicos_pk").val(),
        "contratos_pk":$("#agenda_contratos_pk").val()
    };      

    var arrCarregar = carregarController("agenda_colaborador_padrao", "verificarQtdeEscalaPorProduto", objParametros);
    if (arrCarregar.result == 'success'){
        if(arrCarregar.data[0]['qtde']<=0){
           alert("Já existe a Quantidade de Colaboradores para esse Serviço");
           
           $("#janela_agendas").modal("hide");
        }
        
    }
}

$(document).ready(function() {
    
    fcListarLeadAgenda();
    if(leads_pk!=""){
        $("#exibir_campos_pesq_hidden").show();
        $("#exibir_pesquisa_agenda").hide();
        $("#leads_pk_agenda").val(leads_pk);
        $("#leads_pk_agenda").prop("disabled", true);
    }
    else{
        
        $("#exibir_campos_pesq_hidden").hide();
        $("#exibir_pesquisa_agenda").show();
        
        fcCarregarColaboradoresPesq();
        fcListarProdutoServicoPesq();

        fcListarLeadAgendaPesq();
        
        $(".chzn-select").chosen({allow_single_deselect: true});
    }
       
        
    $("#leads_pk_agenda").change(function(){ 



        if($("#leads_pk_agenda").val()!=""){  


            $("#leads_pk_agenda").prop("disabled", false);


            fcPegarProcessosEtapas();  
            carregarComboContrato();
        }
    });
    
    $("#grid_itens_contrato").html();
    //AGENDA
    $(document).on('click', '#btn_modal_agenda', fcAbrirFormNovoAgenda);
    $(document).on('click', '#btntarefa', fcIncluirTarefa);
    $('#btn_modal_tarefa_dom').click(function() { fcAbrirModalTarefa(1);});
    $('#btn_modal_tarefa_seg').click(function() {fcAbrirModalTarefa(2);});
    $('#btn_modal_tarefa_ter').click(function() {fcAbrirModalTarefa(3);});
    $('#btn_modal_tarefa_qua').click(function() {fcAbrirModalTarefa(4);});
    $('#btn_modal_tarefa_qui').click(function() {fcAbrirModalTarefa(5);});
    $('#btn_modal_tarefa_sex').click(function() {fcAbrirModalTarefa(6);});
    $('#btn_modal_tarefa_sab').click(function() {fcAbrirModalTarefa(7);});
    
    $('#btn_historico_dom').click(function() {fcAbrirModalHistoricoTarefa(1);});
    $('#btn_historico_seg').click(function() {fcAbrirModalHistoricoTarefa(2);});
    $('#btn_historico_ter').click(function() {fcAbrirModalHistoricoTarefa(3);});
    $('#btn_historico_qua').click(function() {fcAbrirModalHistoricoTarefa(4);});
    $('#btn_historico_qui').click(function() {fcAbrirModalHistoricoTarefa(5);});
    $('#btn_historico_sex').click(function() {fcAbrirModalHistoricoTarefa(6);});
    $('#btn_historico_sab').click(function() {fcAbrirModalHistoricoTarefa(7);});
    
   
    carregarComboContrato();
    
    //AGENDAS
    fcValidarFormAgendas();
    
    fcCarregarGridAgenda();
    
    //carregarGridDiaSemanaTurno();
    
    fcCarregarTurno();
    
    
    
    
    
    
    $('#ic_preenchimento_automatico').click(function() {

        fcValidarPreencherAutomatico();
    });
    
    
    
    //Atribui o evento para filtro dos colaboradores na tela da agenda.
    //$(document).on('click', '#cmdCarregarColaboradores', fcValidarDiaETurnoCarregarColaboradores);       
    $("#agenda_colaboradores_pk").change(function(){
       
     if($("#agenda_colaboradores_pk").val()!=""){
         fcVerificarEscalaColaborador();
     }
        
    });      
    
    $("#agenda_contratos_pk").change(function(){ 
        fcCarregarDataContrato();
        fcItensContrato();
      
        fcCarregarProduto();
      
      
    });

    $("#agenda_produtos_servicos_pk").change(function(){ 
        if($("#agenda_produtos_servicos_pk").val()!=""){
            fcVerificarQtdeAgendaProduto();
        }
        
        
        fcValidarDiaETurnoCarregarColaboradores();  
        fcDiasContratados();
    });
    
   $('#dt_cancelamento_agenda_escala').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 
    $("#dt_cancelamento_agenda_escala").keypress(function(){
       mascara(this,mdata);
    });
  
    $('#dt_inicio_agenda').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker("setDate", new Date() ); 
    $("#dt_inicio_agenda").keypress(function(){
       mascara(this,mdata);
    });
    

    $('#dt_fim_agenda').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker("setDate", new Date() ); 
    
    $("#dt_fim_agenda").keypress(function(){
       mascara(this,mdata);
    });

    fcFormatarGrid();
    fcFormatarGridHistorico();
    $('#ic_aditivo').click(function() {

        $('#ic_contrato').prop('checked', false);
        $('#ic_aditivo').prop('checked', true);
        $('#exib_contrato_pai').show();
    });
    $('#ic_contrato').click(function() {

        $('#ic_contrato').prop('checked', true);
        $('#ic_aditivo').prop('checked', false);
        $('#contrato_pai_pk').val("null");
        $('#agenda_responsavel_visible').show();
        $('#exib_contrato_pai').hide();
    });

    $("#exib_contrato_pai").hide();
    
    
    $("#hr_turno_dom").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_seg").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_ter").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_qua").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_qui").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_sex").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_sab").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_dom_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_seg_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_ter_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_qua_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_qui_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_sex_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_turno_sab_saida").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_dom").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_seg").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_ter").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_qua").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_qui").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_sex").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_sab").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_dom").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_seg").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_ter").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_qua").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_qui").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_sex").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_intervalo_saida_sab").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_inicio").keypress(function(){
       mascara(this,horamask);
    });
    $("#exibir_nao_repetir").hide()
    $("#exibir_checkbox").hide();
    
    fcVerificarFolga();
    
    fcVerificarTrabalho();
    
    
    $("#hr_inicio_expediente").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_termino_expediente").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_saida_intervalo").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_retorno_intervalo").keypress(function(){
       mascara(this,horamask);
    });
    
    
    
    
    $('#dt_periodo_ini_agenda_pesq').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 
    $("#dt_periodo_ini_agenda_pesq").keypress(function(){
       mascara(this,mdata);
    });
    
    
    $('#dt_periodo_fim_agenda_pesq').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker();
    $("#dt_periodo_fim_agenda_pesq").keypress(function(){
       mascara(this,mdata);
    });
    
    
    $(document).on('click','#cmdPesquisarAgenda',fcPesquisarGridAgenda);
        
    
    
    
    
    if(colaborador_pk!=""){
        
        
        fcCarregarColaboradores();
        
        $("#janela_agendas").modal();
        $("#agenda_colaboradores_pk").prop("disabled",true);
        fcVerificarEscalaColaborador();
    }
    
    
    
} );
