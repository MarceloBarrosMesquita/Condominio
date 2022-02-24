function fcValidarForm(){

    $("#form").validate({
        rules :{
            ds_usuario:{
                required:true,
                minlength:3
            },
            ds_email:{
                required:true,
                minlength:3
            },
            ic_status:{
                required:true
            },
            grupos_pk:{
                required:true
            }

        },
        messages:{
            ds_usuario:{
                required:"Por favor, informe Usuário",
                minlength:"Usuário deve ter pelo menos 3 caracteres"
            },
            ds_email:{
                required:"Por favor, informe Login",
                minlength:"Login deve ter pelo menos 3 caracteres"
            },
            ic_status:{
                required:"Por favor, informe Status"
            },
            grupos_pk:{
                required:"Por favor, informe Grupo"
            }

        },
        submitHandler: function(form){
            fcEnviar(); //Se a validação deu certo, faz o envio do formulario.
            return false;
        }
    });

}
function validarGridControlePonto(){
    if($('#ic_dom').is(":checked") && $('#dom_turnos_pk').val()==""){
        return false;
    }
    else if($('#ic_seg').is(":checked") && $('#seg_turnos_pk').val()==""){
        return false;
    }
    else if($('#ic_ter').is(":checked") && $('#ter_turnos_pk').val()==""){
        return false;
    }
    else if($('#ic_qua').is(":checked") && $('#qua_turnos_pk').val()==""){
        return false;
    }
    else if($('#ic_qui').is(":checked") && $('#qui_turnos_pk').val()==""){
        return false;
    }
    else if($('#ic_sex').is(":checked") && $('#sex_turnos_pk').val()==""){
        return false;
    }
    else if($('#ic_sab').is(":checked") && $('#sab_turnos_pk').val()==""){
        
        return false;
    }
    return true;
}
function fcEnviar(){
    
    
        if(!validarGridControlePonto()){
            $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
            return false;
        }
        if($("#grupos_pk option:selected").text()=="Clientes"){
            if($('#leads_pk').val()==""){
                $("#alert_ds_lead").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alert_ds_lead").slideUp(500);
                });
                $('#leads_pk').focus();
                return false;
            }
        }
        
    
        var ic_dom = 2;
        var ic_seg = 2;
        var ic_ter = 2;
        var ic_qua = 2;
        var ic_qui = 2;
        var ic_sex = 2;
        var ic_sab = 2;    
        //verifica quais dias foram selecionados
        //DOM
        if($('#ic_dom').is(":checked")){
            ic_dom = 1;
        }
        else{
            ic_dom = 2;
        }
        //SEG
        if($('#ic_seg').is(":checked")){
            ic_seg = 1;
        }
        else{
            ic_seg = 2;
        }
        //TER
        if($('#ic_ter').is(":checked")){
            ic_ter = 1;
        }
        else{
            ic_ter = 2;
        }
        //QUA
        if($('#ic_qua').is(":checked")){
            ic_qua = 1;
        }
        else{
            ic_qua = 2;
        }
        //QUI
        if($('#ic_qui').is(":checked")){
            ic_qui = 1;
        }
        else{
            ic_qui = 2;
        }
        //SEX
        if($('#ic_sex').is(":checked")){
            ic_sex = 1;

        }
        else{
            ic_sex = 2;
        }
        //SAB
        if($('#ic_sab').is(":checked")){
            ic_sab = 1;
        }
        else{
            ic_sab = 2;
        }
        
        
        var v_ds_usuario = $("#ds_usuario").val();
        var v_ds_login = $("#ds_email").val();
        var v_ds_senha = "";
        var v_ds_email = $("#ds_email").val();
        var v_ds_cel = $("#ds_cel").val();
        var v_ic_status = $("#ic_status").val();
        var v_grupos_pk = $("#grupos_pk").val();
        if(pk==""){
             v_ds_senha = "gepros";
        }
        else{
            if($('#ic_senha').is(":checked")){
               v_ds_senha = "gepros";
            }
            else{
               v_ds_senha = $("#ds_senha").val();
            }
        }


        var objParametros = {
            "pk": pk,
            "ds_usuario": (v_ds_usuario),
            "ds_login": (v_ds_login),
            "ds_senha": (v_ds_senha),
            "ds_email": (v_ds_email),
            "ds_cel": (v_ds_cel),
            "ic_status": (v_ic_status),
            "grupos_pk": (v_grupos_pk),
            "ic_dom": ic_dom,
            "ic_seg": ic_seg,
            "ic_ter": ic_ter,
            "ic_qua": ic_qua,
            "ic_qui": ic_qui,
            "ic_sex": ic_sex,
            "ic_sab": ic_sab,
            "leads_pk":$("#leads_pk").val(),
            "hr_entrada_dom":$("#hr_entrada_dom").val(),
            "usuario_ponto_pk":$("#usuario_ponto_pk").val(),
            "hr_saida_dom":$("#hr_saida_dom").val(),
            "hr_entrada_seg":$("#hr_entrada_seg").val(),
            "hr_saida_seg":$("#hr_saida_seg").val(),
            "hr_entrada_ter":$("#hr_entrada_ter").val(),
            "hr_saida_ter":$("#hr_saida_ter").val(),
            "hr_entrada_qua":$("#hr_entrada_qua").val(),
            "hr_saida_qua":$("#hr_saida_qua").val(),
            "hr_entrada_qui":$("#hr_entrada_qui").val(),
            "hr_saida_qui":$("#hr_saida_qui").val(),
            "hr_entrada_sex":$("#hr_entrada_sex").val(),
            "hr_saida_sex":$("#hr_saida_sex").val(),
            "hr_entrada_sab":$("#hr_entrada_sab").val(),
            "hr_saida_sab":$("#hr_saida_sab").val(),
            "turnos_pk_dom": $('#dom_turnos_pk').val(),
            "turnos_pk_seg": $('#seg_turnos_pk').val(),
            "turnos_pk_ter": $('#ter_turnos_pk').val(),
            "turnos_pk_qua": $('#qua_turnos_pk').val(),
            "turnos_pk_qui": $('#qui_turnos_pk').val(),
            "turnos_pk_sex": $('#sex_turnos_pk').val(),
            "turnos_pk_sab": $('#sab_turnos_pk').val()
        };    

        var arrEnviar = carregarController("usuario", "salvar", objParametros);           
       
        if (arrEnviar.result == 'success'){
            // Reload datable
            alert(arrEnviar.message);
            sendPost("usuario_res_form.php", {token: token});
        }
        else{
            alert('Falhou a requisição para salvar o registro');
        }
    
    

    
}

function fcCancelar(){
    sendPost("usuario_res_form.php", {token: token});
}

function fcCarregar(){

    if(pk > 0){
        var objParametros = {
            "pk": pk
        };        
        
        var arrCarregar = carregarController("usuario", "listarPk", objParametros);

        if (arrCarregar.result == 'success'){
            
            $("#ds_usuario").val(arrCarregar.data[0]['ds_usuario']);
            //$("#ds_login").val(arrCarregar.data[0]['ds_login']);
            $("#ds_senha").val(arrCarregar.data[0]['ds_senha']);
            $("#ds_email").val(arrCarregar.data[0]['ds_email']);
            $("#ds_cel").val(arrCarregar.data[0]['ds_cel']);
            $("#ic_status").val(arrCarregar.data[0]['ic_status']);
            $("#grupos_pk").val(arrCarregar.data[0]['grupos_pk']);
            
            if(arrCarregar.data[0]['leads_pk']!=""){
                $("#exibir_lead").show();
            }
            fcCarregarLeads();
            $("#leads_pk").val(arrCarregar.data[0]['leads_pk']);
            $(".chzn-select").chosen('destroy');
            $(".chzn-select").chosen({allow_single_deselect: true});
            
            
            if(arrCarregar.data[0]['ic_dom']==1){
                $("input[id=ic_dom]").prop("checked", "true");
           }
           //SEG
           if(arrCarregar.data[0]['ic_seg']==1){
                $("input[id=ic_seg]").prop("checked", "true");
           }
           //TER
           if(arrCarregar.data[0]['ic_ter']==1){
                $("input[id=ic_ter]").prop("checked", "true");
           }
           //QUA
           if(arrCarregar.data[0]['ic_qua']==1){
                $("input[id=ic_qua]").prop("checked", "true");
           }
           //QUI
           if(arrCarregar.data[0]['ic_qui']==1){
                $("input[id=ic_qui]").prop("checked", "true");
           }
           //SEX
           if(arrCarregar.data[0]['ic_sex']==1){
                $("input[id=ic_sex]").prop("checked", "true");
           }
           //SAB
           if(arrCarregar.data[0]['ic_sab']==1){
                $("input[id=ic_sab]").prop("checked", "true");
           }

           $("#usuario_ponto_pk").val(arrCarregar.data[0]['usuario_ponto_pk']); 
           $("#dom_turnos_pk").val(arrCarregar.data[0]['turnos_pk_dom']); 
           $("#seg_turnos_pk").val(arrCarregar.data[0]['turnos_pk_seg']); 
           $("#ter_turnos_pk").val(arrCarregar.data[0]['turnos_pk_ter']); 
           $("#qua_turnos_pk").val(arrCarregar.data[0]['turnos_pk_qua']); 
           $("#qui_turnos_pk").val(arrCarregar.data[0]['turnos_pk_qui']); 
           $("#sex_turnos_pk").val(arrCarregar.data[0]['turnos_pk_sex']); 
           $("#sab_turnos_pk").val(arrCarregar.data[0]['turnos_pk_sab']); 
           
            $("#hr_entrada_dom").val(arrCarregar.data[0]['hr_entrada_dom']);    
            $("#hr_entrada_seg").val(arrCarregar.data[0]['hr_entrada_seg']);    
            $("#hr_entrada_ter").val(arrCarregar.data[0]['hr_entrada_ter']);    
            $("#hr_entrada_qua").val(arrCarregar.data[0]['hr_entrada_qua']);    
            $("#hr_entrada_qui").val(arrCarregar.data[0]['hr_entrada_qui']);    
            $("#hr_entrada_sex").val(arrCarregar.data[0]['hr_entrada_sex']);    
            $("#hr_entrada_sab").val(arrCarregar.data[0]['hr_entrada_sab']); 
            
            $("#hr_saida_dom").val(arrCarregar.data[0]['hr_saida_dom']);    
            $("#hr_saida_seg").val(arrCarregar.data[0]['hr_saida_seg']);    
            $("#hr_saida_ter").val(arrCarregar.data[0]['hr_saida_ter']);    
            $("#hr_saida_qua").val(arrCarregar.data[0]['hr_saida_qua']);    
            $("#hr_saida_qui").val(arrCarregar.data[0]['hr_saida_qui']);    
            $("#hr_saida_sex").val(arrCarregar.data[0]['hr_saida_sex']);    
            $("#hr_saida_sab").val(arrCarregar.data[0]['hr_saida_sab']); 

        }
        else{
            alert('Falhar ao carregar o registro');
        }
    }
}

function fcCarregarGrupos(){
    //Carrega os grupos
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("grupo", "listarTodos", objParametros); 
    
    carregarComboAjax($("#grupos_pk"), arrCarregar, " ", "pk", "ds_grupo");
    
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
        
}

function fcLimparFormAgenda(){    
    
    $("#ic_dom").prop("checked", false);
    $("#ic_seg").prop("checked", false);
    $("#ic_ter").prop("checked", false);
    $("#ic_qua").prop("checked", false);
    $("#ic_qui").prop("checked", false);
    $("#ic_sex").prop("checked", false);
    $("#ic_sab").prop("checked", false);
    
    $("#usuario_ponto_pk").val("");
    $("#dom_turnos_pk").val("");
    $("#seg_turnos_pk").val("");
    $("#ter_turnos_pk").val("");
    $("#qua_turnos_pk").val("");
    $("#qui_turnos_pk").val("");
    $("#sex_turnos_pk").val("");
    $("#sab_turnos_pk").val("");
    $("#hr_entrada_dom").val("");
    $("#hr_saida_dom").val("");
    $("#hr_entrada_seg").val("");
    $("#hr_saida_seg").val("");
    $("#hr_entrada_ter").val("");
    $("#hr_saida_ter").val("");
    $("#hr_entrada_qua").val("");
    $("#hr_saida_qua").val("");
    $("#hr_entrada_qui").val("");
    $("#hr_saida_qui").val("");
    $("#hr_entrada_sex").val("");
    $("#hr_saida_sex").val("");
    $("#hr_entrada_sab").val("");
    $("#hr_saida_sab").val("");
    
}

function fcCarregarLeads(){    
    var objParametros = {
        "pk": ""
    };         
    var arrCarregar = carregarController("lead", "listarTodosAtivo", objParametros);    
    
    carregarComboAjax($("#leads_pk"), arrCarregar, " ", "pk", "ds_lead");        
}

$(document).ready(function()
    {
        //Atribui os eventos
        $(document).on('click', '#cmdCancelar', fcCancelar);

        //Atribui a validação do formulário dos campos obrigatórios
        fcValidarForm();

        //Carregar o combo com os grupos.
        fcCarregarGrupos();
        
        fcLimparFormAgenda();
        
        fcCarregarTurno();
        //Verifica se o registro é para alteracao e puxa os dados.
        fcCarregar();
        
        fcCarregarLeads();
        $(".chzn-select").chosen({allow_single_deselect: true});
        
        $("#grupos_pk").change(function(){
          if($("#grupos_pk option:selected").text()=="Clientes"){
              $("#exibir_lead").show();
              $(".chzn-select").chosen('destroy');
              $(".chzn-select").chosen({allow_single_deselect: true});
          }
          else{
              $("#exibir_lead").hide();
              $("#leads_pk").val("");
          }
        });
        
        $("#ds_cel").keypress(function(){
          mascara(this, mascaraTelefone);
        });
        
        $("#hr_entrada_dom").keypress(function(){
            mascara(this,horamask);
         });
        $("#hr_saida_dom").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_entrada_seg").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_saida_seg").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_entrada_ter").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_saida_ter").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_entrada_qua").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_saida_qua").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_entrada_qui").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_saida_qui").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_entrada_sex").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_saida_sex").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_entrada_sab").keypress(function(){
            mascara(this,horamask);
         });
         $("#hr_saida_sab").keypress(function(){
            mascara(this,horamask);
         });
    }
);
