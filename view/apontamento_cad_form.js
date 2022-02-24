function fcValidarForm(){

    $("#form").validate({
        rules :{
            dt_ponto:{
                required:true,
                minlength:3
            },
            hr_entreda:{
                required:true,
                minlength:3
            },
            hr_saida:{
                required:true,
                minlength:3
            },
            ds_local_atual:{
                required:true,
                minlength:3
            },
            apontamento_usuario_pk:{
                required:true,
                minlength:3
            },
            obs:{
                required:true,
                minlength:3
            },
            leads_pk:{
                required:true,
                minlength:3
            },
            ic_status:{
                required:true,
                minlength:3
            }

        },
        messages:{
            dt_ponto:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            hr_entreda:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            hr_saida:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            ds_local_atual:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            apontamento_usuario_pk:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            obs:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            leads_pk:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            },
            ic_status:{
                required:"Por favor, informe ",
                minlength:" deve ter pelo menos 3 caracteres"
            }

        },
        submitHandler: function(form){
            fcEnviar(); //Se a validação deu certo, faz o envio do formulario.
            return false;
        }
    });

}
function fcEnviar(){

    var v_dt_ponto = $("#dt_ponto").val();
    var v_hr_entreda = $("#hr_entreda").val();
    var v_hr_saida = $("#hr_saida").val();
    var v_ds_local_atual = $("#ds_local_atual").val();
    var v_apontamento_usuario_pk = $("#apontamento_usuario_pk").val();
    var v_obs = $("#obs").val();
    var v_leads_pk = $("#leads_pk").val();
    var v_ic_status = $("#ic_status").val();


    var objParametros = {
        "pk": pk,
        "dt_ponto": encodeURIComponent(v_dt_ponto),
        "hr_entreda": encodeURIComponent(v_hr_entreda),
        "hr_saida": encodeURIComponent(v_hr_saida),
        "ds_local_atual": encodeURIComponent(v_ds_local_atual),
        "apontamento_usuario_pk": encodeURIComponent(v_apontamento_usuario_pk),
        "obs": encodeURIComponent(v_obs),
        "leads_pk": encodeURIComponent(v_leads_pk),
        "ic_status": encodeURIComponent(v_ic_status)        
    };    

    var arrEnviar = carregarController("apontamento", "salvar", objParametros);           
           
    if (arrEnviar.result == 'success'){
        // Reload datable
        alert(arrEnviar.message);
        sendPost("apontamento_res_form.php", {token: token});
    }
    else{
        alert('Falhou a requisição para salvar o registro');
    }
}

function fcCancelar(){

    sendPost("apontamento_res_form.php", {token: token});
}

function fcCarregar(){

    if(pk > 0){

        var objParametros = {
            "pk": pk
        };        
        
        var arrCarregar = carregarController("apontamento", "listarPk", objParametros);
        
        if (arrCarregar.result == 'success'){
        
            $("#dt_ponto").val(arrCarregar.data[0]['dt_ponto']);
            $("#hr_entreda").val(arrCarregar.data[0]['hr_entreda']);
            $("#hr_saida").val(arrCarregar.data[0]['hr_saida']);
            $("#ds_local_atual").val(arrCarregar.data[0]['ds_local_atual']);
            $("#apontamento_usuario_pk").val(arrCarregar.data[0]['apontamento_usuario_pk']);
            $("#obs").val(arrCarregar.data[0]['obs']);
            $("#leads_pk").val(arrCarregar.data[0]['leads_pk']);
            $("#ic_status").val(arrCarregar.data[0]['ic_status']);

        }
        else{
            alert('Falhar ao carregar o registro');
        }
    }
}
function fcCarregarLeads(){    
    var objParametros = {
        "pk": ""
    };         
    var arrCarregar = carregarController("lead", "listarTodos", objParametros);    
    
    carregarComboAjax($("#leads_pk"), arrCarregar, " ", "pk", "ds_lead");        
}

function fcGridApontamento(){
    var objParametros = {
        "pk": ""
    };         
    var arrCarregar = carregarController("lead", "listarTodos", objParametros);  
}

$(document).ready(function(){
    //Carrega combo de leads
    fcCarregarLeads()
    
    $("#leads_pk").change(function(){ 
        alert('aqui');        
    });
    
    
    $(".chzn-select").chosen({allow_single_deselect: true});
    //Atribui os eventos
    $(document).on('click', '#cmdCancelar', fcCancelar);

    //Atribui a validação do formulário dos campos obrigatórios
    fcValidarForm();

    //Verifica se o registro é para alteracao e puxa os dados.
    fcCarregar();
 });
