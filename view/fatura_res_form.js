
//-----------------------------------------------------------------FATURAMENTO--------------------------------------------------------------------------------------------//
var tblResultadoFaturamento;


function fcPesquisarFaturamento(){

    tblResultadoFaturamento.clear().destroy();
    fcCarregarGridFaturamento();

}

function fcCarregarGridFaturamento(){
    var objParametros = {
        "leads_pk": $("#leads_pk").val(),
        "dt_inicio_fatura": $("#dt_inicio_fatura_pesq").val(),
        "empresas_pk": $("#empresa_pk_pesq").val(),
        "dt_fim_fatura": $("#dt_fim_fatura_pesq").val()
    };

    var v_url = montarUrlController("fatura", "listarGridFaturamento", objParametros);
  
    //Trata a tabela
    tblResultadoFaturamento = $('#tblResultadoFaturamento').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 src='../img/impressora.png'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='function_painel'><span><img width=16 height=16 src='../img/falta.png'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            },
            {"targets": -2, "data": "ds_descricao_cancelamento"},
            {"targets": -3, "data": "dt_cancelamento"},
            {"targets": -4, "data": "periodo"},
            {"targets": -5, "data": "dt_cadastro"},
            {"targets": -6, "data": "ds_tipo_contrato"},
            {"targets": -7, "data": "ds_lead"},
            {"targets": -8, "data": "pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });

    $('#tblResultadoFaturamento tbody').on('click', '.function_edit', function () {
        var data;
        if(tblResultadoFaturamento.row( $(this).parents('li')).data()){
            data = tblResultadoFaturamento.row( $(this).parents('li')).data();
        }
        else if(tblResultadoFaturamento.row( $(this).parents('tr')).data()){
            data = tblResultadoFaturamento.row( $(this).parents('tr')).data();
        }
        fcImprimirFaturamento(data['pk'],data['leads_pk'],data['dt_inicio_fatura'],data['dt_fim_fatura']);

    } );
    $('#tblResultadoFaturamento tbody').on('click', '.function_painel', function () {
        var data;
        if(tblResultadoFaturamento.row( $(this).parents('li')).data()){
            data = tblResultadoFaturamento.row( $(this).parents('li')).data();
        }
        else if(tblResultadoFaturamento.row( $(this).parents('tr')).data()){
            data = tblResultadoFaturamento.row( $(this).parents('tr')).data();
        }
        fcAbrirModalCancelamento(data['pk']);

    } );
    
    $('#tblResultadoFaturamento tbody').on('click', '.function_delete', function () {
        var data;
        if(tblResultadoFaturamento.row( $(this).parents('li') ).data()){
            data = tblResultadoFaturamento.row( $(this).parents('li') ).data();
        }
        else if(tblResultadoFaturamento.row( $(this).parents('tr') ).data()){
            data = tblResultadoFaturamento.row( $(this).parents('tr') ).data();
        }
        fcExcluir(data['pk']);
    } );    
}

function fcAbrirModalCancelamento(pk){
    $("#pk_cancelamento").val(pk);
    $("#ds_descricao_canelamento").val("");
    $("#dt_cancelamento").val(1);
    
    $("#modal_cancelamento").modal();
}
function fcExcluir(v_pk){

    if (confirm("Deseja realmente excluir o registro '" + v_pk + "'?")){
        if(v_pk != ""){

            var objParametros = {
                "pk": v_pk
            };              
            
            var arrExcluir = carregarController("fatura", "excluir", objParametros);   

            if (arrExcluir.result == 'success'){

                //Exibe a mensagem
                alert(arrExcluir.message);

                // Reload datable
                tblResultadoFaturamento.ajax.reload();

            }
            else{
                alert('Falhou a requisição de exclusão.');
            }
        }
        else{
            alert("Código não encontrado");
        }
    }
}


function fcCarregarGridLeadFaturamento(){	
    
    $("#grid_leads").empty();
    
    var str = ""; 
    var objParametros = {
        "empresas_pk":  $('#empresa_pk_cad').val(),
        "tipo_contrato_pk":  $('#tipo_contrato_pk').val(),
    };
    var arrCarregar = carregarController("lead", "listarTodosContaFatura", objParametros); 


        str +="<table style='width=100%' width=100% ";
        str +="<tr>";
        str +="         <td>";
        str +="             <table style='width=100%' align=center>";
        str +="                 <tr>";
        str +="                     <td  aling=center>";
        str +="                         <input type='checkbox' name='leads_pk_cad[]' id='leads_pk_cad' onclick='marcarTodosFaturamento(this.checked)'/>";
        str +="                     </td>";
        str +="                     <td  aling=center>";
        str +="                         <b>Selecionar Todos</b>";
        str +="                     </td>";
        str +="                 </tr>";
        str +="             </table>";
        str +="         </td>";
        str +="      </tr>";
        str +="  </table>";

        str +="<table style='border-style: solid;width=100%' width=100%>";
        str +="<thead>";
        str +="<tr style='border-style: solid;width=100%' align=center>";

        str +="<th colspan=2 style='border-style: solid;' align=center>";
        str +="<b>Posto de Trabalho";
        str +="</b>";
        str +="</th>";
        str +="<th colspan=1 style='border-style: solid;' align=center>";
        str +="<b>Empresa";
        str +="</b>";
        str +="</th>";

        str +="</tr>";
        str +="</thead>";
        str +="<tbody>";




        for(j=0;j<arrCarregar.data.length;j++){

            str +="<tr style='border-style: solid;'>";
            str +="<td style='border-style: solid;' align=center>";
            str +="<input type='checkbox' name='leads_pk_cad[]' id='leads_pk_cad' value='"+arrCarregar.data[j]['pk']+"' >";
            str +="</td>";

            str +="<td style='border-style: solid;' align=center>";  
            str += arrCarregar.data[j]['ds_lead'];       
            str +="</td>";
            str +="<td style='border-style: solid;' align=center>";  
            if(arrCarregar.data[j]['ds_razao_social']!=null){
                str += arrCarregar.data[j]['ds_razao_social'];  
            }
            else{
                str += " ";  
            }

            str +="</td>";

            str +="</tr>";   


        } 
        str +="</tbody>";
        str +="</table>";


    $("#grid_leads").append(str);
        
}

function fcEnviarFaturamento(){
    $('#cmdGerarFaturamento').prop('disabled',true);
    
    var itens = document.getElementsByName('leads_pk_cad[]');
    
    if($("#tipo_contrato_pk").val()==""){
        alert("Por favor, informe Tipo Contrato.");
        $('#cmdGerarFaturamento').prop('disabled',false);
        return false;
    }
    if($("#dt_inicio_fatura").val()==""){
        alert("Por favor, informe Data Início.");
        $('#cmdGerarFaturamento').prop('disabled',false);
        return false;
    }
    if($("#dt_fim_fatura").val()==""){
        alert("Por favor, informe Data Fim.");
        $('#cmdGerarFaturamento').prop('disabled',false);
        return false;
    }
    var qtde_lead = 0;
    if(itens.length>0){
        for(i=0; i<itens.length;i++){
            if(itens[i].checked){
                qtde_lead = 1;
            }
        }
    }
    if(qtde_lead==0){
        alert("Por favor, selecione um Posto de Trabalho.");
        $('#cmdGerarFaturamento').prop('disabled',false);
        return false;
    }
    
    
    
    //faz um for com todos os checkbox que tem no formulario com o nome que está na variavel itens ,marcando ou desmarcando
    for(i=0; i<itens.length;i++){
        if(itens[i].checked){
            if(itens[i].value!="on"){
                var objParametros = {
                    "pk": "",
                    "dt_inicio_fatura":$("#dt_inicio_fatura").val(),
                    "dt_fim_fatura":$("#dt_fim_fatura").val(),
                    "empresas_pk":$("#empresa_pk_cad").val(),
                    "tipo_contrato_pk":$("#tipo_contrato_pk").val(),
                    "leads_pk": itens[i].value
                };    

                var arrEnviar = carregarController("fatura", "salvar", objParametros); 
              
              
               
            }
        }
        
    }
    alert("Registro salvo com sucesso.");
    $('#cmdGerarFaturamento').prop('disabled',false);
    $("#janela_folha").modal("hide");
    tblResultadoFaturamento.clear().destroy();
    fcCarregarGridFaturamento();
    
}
function fcSalvarCancelamento(){
    var objParametros = {
        "pk": $("#pk_cancelamento").val(),
        "dt_cancelamento":$("#dt_cancelamento").val(),
        "ds_descricao_cancelamento":$("#ds_descricao_cancelamento").val()
    };    

    var arrEnviar = carregarController("fatura", "salvarDataCancelamento", objParametros); 
    if (arrEnviar.result == 'success'){
        // Reload datable
        alert(arrEnviar.message);
        $("#modal_cancelamento").modal("hide");
        tblResultadoFaturamento.clear().destroy();
        fcCarregarGridFaturamento();
    }
    else{
        alert('Falhou a requisição para salvar o registro');
    }
}

function fcImprimirFaturamento(pk,leads_pk,dt_inicio_fatura,dt_fim_fatura){
  
    //get the modal box content and load it into the printable div
     sendPost('fatura_impressao.php',{token: token, leads_pk: leads_pk,dt_inicio_fatura:dt_inicio_fatura,dt_fim_fatura:dt_fim_fatura,pk:pk});
}

function fcCarregarLeadsFaturamento(){    
    var objParametros = {
        "pk": ""
    };         
    var arrCarregar = carregarController("lead", "listarTodos", objParametros);    
   
    carregarComboAjax($("#leads_pk"), arrCarregar, " ", "pk", "ds_lead");                 
}

function marcarTodosFaturamento(marcar){
    //pega o checkbox pelo name 
    var itens = document.getElementsByName('leads_pk_cad[]');
    //faz um for com todos os checkbox que tem no formulario com o nome que está na variavel itens ,marcando ou desmarcando
    var i = 0;
    for(i=0; i<itens.length;i++){
        itens[i].checked = marcar;
    }
}
function fcGerarFaturamento(){
    $("#grid_leads").empty();
    $("#grid_leads").append("");
    $("#dt_inicio_fatura").val("");
    $("#dt_fim_fatura").val("");
    $("#leads_pk_cad").val("");
    $("#empresa_pk_cad").val("");
    $("#tipo_contrato_pk").val("");
    $(".chzn-select").chosen('destroy');
    //fcCarregarGridLeadFaturamento();
    
    $("#janela_folha").modal();
    setTimeout(function(){ $(".chzn-select").chosen({allow_single_deselect: true}); }, 1000);
    
    $("#empresa_pk_cad").val("");
    //
}



function fcCarregarEmpresa(){
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("conta", "listarPk", objParametros);    
    carregarComboAjax($("#empresa_pk_pesq"), arrCarregar, " ", "pk", "ds_razao_social");
    carregarComboAjax($("#empresa_pk_cad"), arrCarregar, " ", "pk", "ds_razao_social");
        
}

function fcCarregarUPD(){
    
    var objParametros = {
        "pk": ""
    };    

    var arrEnviar = carregarController("fatura", "carregarUpdValoresImposto", objParametros); 
    alert(v_last_url);
    if (arrEnviar.result == 'success'){
        // Reload datable
        alert(arrEnviar.message);
    }
    else{
        alert('Falhou a requisição para salvar o registro');
    }
    
    
}

$(document).ready(function(){
   //FATURAMENTO 
   
   
    
    fcCarregarLeadsFaturamento();
    fcCarregarEmpresa();
    fcCarregarGridFaturamento();
    
    $(".chzn-select").chosen({allow_single_deselect: true});
    
    
    $('#empresa_pk_cad').change(function() {
        if($('#empresa_pk_cad').val()!=""){
            fcCarregarGridLeadFaturamento();
        }
        else{
            $("#grid_leads").empty();
        }
    });
    $('#tipo_contrato_pk').change(function() {
        
        fcCarregarGridLeadFaturamento();
    });


    
    
    //Atribui os eventos dos demais controles
    $(document).on('click', '#cmdPesquisarFaturamento', fcPesquisarFaturamento);
    //$(document).on('click', '#fcCarregarUPD', fcCarregarUPD);
    $(document).on('click', '#cmdIncluirFaturamento', fcGerarFaturamento);
    //$(document).on('click', '#cmdGerarFaturamento', fcEnviarFaturamento);
    
    
    $("#cmdGerarFaturamento").click(function(){
        $('#cmdGerarFaturamento').prop('disabled',true);
        setTimeout(function(){ fcEnviarFaturamento(); }, 1000);
    });
    
    
    $(document).on('click', '#cmdSalvarCancelamento', fcSalvarCancelamento);

   $('#dt_inicio_fatura_pesq').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 

    $("#dt_inicio_fatura_pesq").keypress(function(){
       mascara(this,mdata);
    });
    $('#dt_fim_fatura_pesq').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 

    $("#dt_fim_fatura_pesq").keypress(function(){
       mascara(this,mdata);
    });
   $('#dt_inicio_fatura').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 

    $("#dt_inicio_fatura").keypress(function(){
       mascara(this,mdata);
    });
    $('#dt_fim_fatura').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker(); 

    $("#dt_fim_fatura").keypress(function(){
       mascara(this,mdata);
    });
   
});