var tblResultado;
var click_id = 0;
function fcValidarForm(){

    $("#form").validate({
        rules :{
        },
        messages:{
        },
        submitHandler: function(form){
            fcCarregarGrid(); //Se a validação deu certo, faz o envio do formulario.
            return false;
        }
    });

}

function fcCarregarGrid(){
    var tipo_lancamento = 0;
    if($("#tipo_lancamento_receita").is(":checked") == true && $("#tipo_lancamento_despesa").is(":checked") == true){
        tipo_lancamento = 0;
    }
    else if($("#tipo_lancamento_receita").is(":checked") == true){
        tipo_lancamento = 1;
    }
    else if($("#tipo_lancamento_despesa").is(":checked") == true){
        tipo_lancamento = 2;
    }
    else{
        tipo_lancamento = 0;
    }
    
    
    var dt_vencimento_ini = $("#dt_vencimento_ini").val();
    var dt_vencimento_fim = $("#dt_vencimento_fim").val();
    var ds_empresa = $("#empresas_pk option:selected").text();
    var ds_tipo_grupo = $("#tipo_grupo_pk option:selected").text();
    var ds_grupo_leancamento = $("#grupo_leancamento_pk option:selected").text();
    var ds_ic_status = $("#ic_status option:selected").text();
    var ds_usuario_cadastro = $("#usuario_cadastro_pk option:selected").text();
    

    sendPost('rel_lancamento_cad_form.php', {token: token,
        dt_vencimento_ini:dt_vencimento_ini,
        dt_vencimento_fim:dt_vencimento_fim,
        tipo_lancamento_pk:tipo_lancamento,
        ds_empresa:ds_empresa,
        empresas_pk:$("#empresas_pk").val(),
        ds_tipo_grupo:ds_tipo_grupo,
        tipo_grupo_pk:$("#tipo_grupo_pk").val(),
        ds_grupo_leancamento:ds_grupo_leancamento,
        grupo_leancamento_pk:$("#grupo_leancamento_pk").val(),
        ds_ic_status:ds_ic_status,
        ic_status:$("#ic_status").val(),
        ds_usuario_cadastro:ds_usuario_cadastro,
        usuario_cadastro_pk:$("#usuario_cadastro_pk").val()
    });
}

function fcCancelar(){

    sendPost("menu_relatorios.php", {token: token});
}

function carregarComboEmpresaPk(){
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("conta", "listarPk", objParametros);   
   
    carregarComboAjax($("#empresas_pk"), arrCarregar, " ", "pk", "ds_razao_social");
}
function carregarComboUsuarioCadastro(){
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("usuario", "listarTodos", objParametros);   
   
    carregarComboAjax($("#usuario_cadastro_pk"), arrCarregar, " ", "pk", "ds_usuario");
}


function fcListarItensGrupos(){

    var objParametros = {
        "tipo_grupo_pk": ""
    };          
    if($("#tipo_grupo_pk").val()==1){
        var arrCarregar = carregarController("lancamento", "listaItensGrupoLeads", objParametros); 
       
        carregarComboAjax($("#grupo_leancamento_pk"), arrCarregar, " ", "pk", "ds_lead");    
    }else if($("#tipo_grupo_pk").val()==2){
        var arrCarregar = carregarController("lancamento", "listaItensGrupoColaboradores", objParametros);    
        carregarComboAjax($("#grupo_leancamento_pk"), arrCarregar, " ", "pk", "ds_colaborador");   
    }else if($("#tipo_grupo_pk").val()==3){
        var arrCarregar = carregarController("lancamento", "listaItensGrupoFornecedores", objParametros);    
        carregarComboAjax($("#grupo_leancamento_pk"), arrCarregar, " ", "pk", "ds_fornecedor");   
    }
}

$(document).ready(function(){    
           
    $(document).on('click', '#cmdEnviar', fcValidarForm);
    $(document).on('click', '#cmdCancelar', fcCancelar);
    

    $(".chzn-select").chosen({allow_single_deselect: true});
    
    carregarComboEmpresaPk();
    carregarComboUsuarioCadastro();
    
    $("#tipo_grupo_pk").change(function(){ 
        $(".chzn-select").chosen('destroy');
        fcListarItensGrupos();   
        $(".chzn-select").chosen({allow_single_deselect: true});
    });
    
    
    $('#dt_vencimento_ini').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 

    $("#dt_vencimento_ini").keypress(function(){
       mascara(this,mdata);
    });
    $('#dt_vencimento_fim').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 

    $("#dt_vencimento_fim").keypress(function(){
       mascara(this,mdata);
    });
    
    
});


