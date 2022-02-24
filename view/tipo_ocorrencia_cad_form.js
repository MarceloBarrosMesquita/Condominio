function fcValidarForm(){

    $("#form").validate({
        rules :{
            ds_tipo_ocorrencia:{
                required:true,
                minlength:3
            },
            ic_fechar_ocorrencia_auto:{
                required:true
            }

        },
        messages:{
            ds_tipo_ocorrencia:{
                required:"Por favor, informe Tipo ocorrência",
                minlength:"Tipo ocorrência deve ter pelo menos 3 caracteres"
            },
            ic_fechar_ocorrencia_auto:{
                required:"Por favor, informe  Fechar ocorrência"
            }

        },
        submitHandler: function(form){
            fcEnviar(); //Se a validação deu certo, faz o envio do formulario.
            return false;
        }
    });

}
function fcEnviar(){

    var v_ds_tipo_ocorrencia = $("#ds_tipo_ocorrencia").val();
    var v_ic_fechar_ocorrencia_auto = $("#ic_fechar_ocorrencia_auto").val();


    var objParametros = {
        "pk": pk,
        "ds_tipo_ocorrencia": (v_ds_tipo_ocorrencia),
        "ic_fechar_ocorrencia_auto": (v_ic_fechar_ocorrencia_auto)        
    };    

    var arrEnviar = carregarController("tipo_ocorrencia", "salvar", objParametros);           
           
    if (arrEnviar.result == 'success'){
        // Reload datable
        alert(arrEnviar.message);
        sendPost("tipo_ocorrencia_res_form.php", {token: token});
    }
    else{
        alert('Falhou a requisição para salvar o registro');
    }
}

function fcCancelar(){

    sendPost("tipo_ocorrencia_res_form.php", {token: token});
}

function fcCarregar(){

    if(pk > 0){

        var objParametros = {
            "pk": pk
        };        
        
        var arrCarregar = carregarController("tipo_ocorrencia", "listarPk", objParametros);
        
        if (arrCarregar.result == 'success'){
        
            $("#ds_tipo_ocorrencia").val(arrCarregar.data[0]['ds_tipo_ocorrencia']);
            $("#ic_fechar_ocorrencia_auto").val(arrCarregar.data[0]['ic_fechar_ocorrencia_auto']);

        }
        else{
            alert('Falhar ao carregar o registro');
        }
    }
}

$(document).ready(function()
    {
        var arrCarregar = permissao("tipo_ocorrencia", "ins");        

        if (arrCarregar.result != 'success'){            
            alert('Falhar ao carregar o registro');
            return false;
        }
        //Atribui os eventos
        $(document).on('click', '#cmdCancelar', fcCancelar);

        //Atribui a validação do formulário dos campos obrigatórios
        fcValidarForm();

        //Verifica se o registro é para alteracao e puxa os dados.
        fcCarregar();

    }
);
