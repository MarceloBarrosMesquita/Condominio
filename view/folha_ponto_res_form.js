var tblResultado;
function fcPesquisar(){

    tblResultado.clear().destroy();
    fcCarregarGrid();

}



function fcAbrirModal(v_pk){
    
    $("#janela_folha").modal();
    $("#colaboradores_pk").val(v_pk);
    tblFolha.clear().destroy();
    fcCarregarGridFolha();
    //sendPost('colaborador_cad_form.php', {token: token, pk: v_pk});
}

function fcCarregarQualificacao(){

    var objParametros = {
        "pk": ""

    };

    var arrCarregar = carregarController("produto_servico", "listarTodos", objParametros);
    carregarComboAjax($("#produtos_servicos_pk"), arrCarregar, " ", "pk", "ds_produto_servico");
}
function fcCarregarGrid(){
    var objParametros = {
        "ds_colaborador": $("#ds_colaborador").val(),
        "ic_status": $("#ic_status").val(),
        "ds_pin": $("#ds_pin").val(),
        "generos_pk": $("#generos_pk").val(),
        "ds_re": $("#ds_re").val(),
        "ic_status_app": $("#ic_status_app").val(),
        "produtos_servicos_pk": $("#produtos_servicos_pk").val()
    };

    var v_url = montarUrlController("colaborador", "listarDataTable", objParametros);
   
    //Trata a tabela
    tblResultado = $('#tblResultado').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 src='../img/copiar.png'></span></a>"
            },
            {"targets": -2, "data": "t_ds_cel2"},            
            {"targets": -3, "data": "t_ic_status"}, 
            {"targets": -4, "data": "ds_status_app"}, 
            {"targets": -5, "data": "t_ds_cel"},
            {"targets": -6, "data": "t_ds_re"},
            {"targets": -7, "data": "t_ds_pin"},
            {"targets": -8, "data": "t_ds_colaborador"},
            {"targets": -9, "data": "t_pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });


    //Atribui os eventos na coluna ação.
    $('#tblResultado tbody').on('click', '.function_edit', function () {
        var data;
        if(tblResultado.row( $(this).parents('li')).data()){
            data = tblResultado.row( $(this).parents('li')).data();
        }
        else if(tblResultado.row( $(this).parents('tr')).data()){
            data = tblResultado.row( $(this).parents('tr')).data();
        }
        fcAbrirModal(data['t_pk']);

    } );
}
function fcCarregarGridFolha(){


    var objParametros = {
        "colaboradores_pk": $("#colaboradores_pk").val()
    };

    var v_url = montarUrlController("ponto_folha", "listarPorColaborador", objParametros);
 
    //Trata a tabela
    tblFolha = $('#tblFolha').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 src='../img/copiar.png'></span></a>"
            },
            {"targets": -2, "data": "t_dt_periodo_fim"},
            {"targets": -3, "data": "t_dt_periodo_ini"},
            {"targets": -4, "data": "t_ds_colaborador"},
            {"targets": -5, "data": "t_pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });


    //Atribui os eventos na coluna ação.
    $('#tblFolha tbody').on('click', '.function_edit', function () {
        var data;
        if(tblFolha.row( $(this).parents('li')).data()){
            data = tblFolha.row( $(this).parents('li')).data();
        }
        else if(tblFolha.row( $(this).parents('tr')).data()){
            data = tblFolha.row( $(this).parents('tr')).data();
        }
        fcAbrirModalFolha(data['t_dt_periodo_ini'],data['t_dt_periodo_fim'], data['t_colaborador_pk']);

    } );
}

function fcCarregarGenero(){
    //Carrega os grupos
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("genero", "listarTodos", objParametros); 
    carregarComboAjax($("#generos_pk"), arrCarregar, " ", "pk", "ds_genero");
    
}

function fcValidarForm(){

    $("#form").validate({
        rules :{
            dt_periodo_ini:{
                required:true
            },
            dt_periodo_fim:{
                required:true
            }

        },
        messages:{
            dt_periodo_ini:{
                required:"Por favor, informe Data Início"
              
            },
            dt_periodo_fim:{
                required:"Por favor, informe Data Fim"
              
            }

        },
        submitHandler: function(form){
            fcEnviar(); //Se a validação deu certo, faz o envio do formulario.
            return false;
        }
    });

}
function fcEnviar(){


    var objParametros = {
        "pk": "",
        "dt_periodo_ini": $("#dt_periodo_ini").val(),
        "dt_periodo_fim": $("#dt_periodo_fim").val(),
        "obs": $("#obs").val(),
        "colaborador_pk": $("#colaboradores_pk").val()
    };    

    var arrEnviar = carregarController("ponto_folha", "salvar", objParametros);   
     
    if (arrEnviar.result == 'success'){
        // Reload datable
        tblFolha.clear().destroy();
        fcCarregarGridFolha();
        fcAbrirModalFolha($("#dt_periodo_ini").val(),$("#dt_periodo_fim").val(), $("#colaboradores_pk").val());
    }
    else{
        alert('Falhou a requisição para salvar o registro');
    }
}

function fcAbrirModalFolha(dt_periodo_ini,dt_periodo_fim,colaboradores_pk){
    
    $("#dt_periodo_ini_edit").val("");
    $("#dt_periodo_fim_edit").val("");
    $("#colaboradores_pk_edit").val("");
    
    $("#dt_periodo_ini_edit").val(dt_periodo_ini);
    $("#dt_periodo_fim_edit").val(dt_periodo_fim);
    $("#colaboradores_pk_edit").val(colaboradores_pk);

     $("#grid").empty();
     var arrDatas = dt_periodo_ini.split("/");
    var objParametrosConta = {
            "pk":""
        };    
 
    var arrCarregarConta = carregarController("conta", "listarContasAtual", objParametrosConta); 
    if (arrCarregarConta.result == 'success'){
        if(arrCarregarConta.data.length>0){
            $("#ds_conta").text(arrCarregarConta.data[0]['ds_conta'])
            $("#ds_cpf_cnpj_conta").text(arrCarregarConta.data[0]['ds_cpf_cnpj'])
            $("#ds_endereco_conta").text(arrCarregarConta.data[0]['ds_endereco'])
        }
        
    }
    var objParametrosColab = {
            "pk":colaboradores_pk
        };    
 
    var arrCarregarColab = carregarController("colaborador", "listarPorPkEFuncao", objParametrosColab); 
   
    if (arrCarregarColab.result == 'success'){
        $("#ds_colaborador_imp").text(arrCarregarColab.data[0]['ds_colaborador'])
        $("#ds_ctps_serie").text(arrCarregarColab.data[0]['ds_ctps']+" / "+arrCarregarColab.data[0]['ds_serie'])
        $("#ds_funcao").text(arrCarregarColab.data[0]['ds_produto_servico'])
        $("#dt_admissao").text(arrCarregarColab.data[0]['dt_admissao'])
    }
    
    
    var mesAno = dt_periodo_ini;
    //alert(mesAno.substring(3))
    $("#ds_mesAno").text(mesAno.substring(3))


    var str = "";
    str +="<div class='row'>";
    str +="<div class='col-md-1'>&nbsp;</div>";
    str +="<div class='col-md-10'>";
    str +="<table style='border-style: solid;width=100%' width=100%>";
    str +="<thead>";
    str +="<tr style='border-style: solid;width=100%' align=center>";
    str +="<th rowspan='2' nowrap style='border-style: solid;'align=center>";
    str +="<b>Dia";
    str +="</b>";
    str +="</th>";
    str +="<th rowspan='2' nowrap style='border-style: solid;' align=center>";
    str +="<b>Entrada";
    str +="</b>";
    str +="</th>";
    str +="<th colspan='2' style='border-style: solid;' align=center>";
    str +="<b>Intervalo";
    str +="</b>";
    str +="</th>";
    str +="<th rowspan='2' nowrap style='border-style: solid;' align=center>";
    str +="<b>Saida";
    str +="</b>";
    str +="</th>";
    /*str +="<th colspan='2'>";
    str +="<b>Extra";
    str +="</b>";
    str +="</th>";*/
    str +="<th rowspan='2' nowrap style='border-style: solid;' align=center> ";
    str +="<b>Assinatura";
    str +="</b>";
    str +="</th>";

    str +="</tr>";
    str +="<tr>";
    str +="<th style='border-style: solid;' align=center>Saida";
    str +="</th>";
    str +="<th style='border-style: solid;' align=center>Retorno";
    str +="</th>";

    /*str +="<th>Entrada";
    str +="</th>";
    str +="<th>Saida";
    str +="</th>";*/

    str +="</tr>";
    str +="</thead>";
    str +="<tbody>";
    

    
     var objParametrosEntrada = {
            "colaborador_pk":colaboradores_pk,
            "dt_ini": "01/"+arrDatas[1]+"/"+arrDatas[2],
            "dt_fim": "31/"+arrDatas[1]+"/"+arrDatas[2]
        };    

    var arrCarregarEntrada = carregarController("ponto", "folhaPonto", objParametrosEntrada); 

    
    for(i = 0 ;i< 31;i++){
        
            if(i< 9){
                var dia = "0"+(i+1);
            }
            else{
                var dia = (i+1);
            }
                        
            var hr_turno ;
            var hr_turno_saida;
            var hora_entrada = "";
            var ds_legenda = "";
            var ds_registro_ponto ="";
            var hora_saida ="";
            var hora_saida_intervalo = "";
            var hora_entrada_retorno = "";
            for(j=0;j<arrCarregarEntrada.data.length;j++){ 
                if(arrCarregarEntrada.data[j]['ds_legenda']==null){
                    ds_legenda="";
                }else{                        
                    ds_legenda=arrCarregarEntrada.data[j]['ds_legenda'];                            
                }
                
                if(arrCarregarEntrada.data[j]['ds_registro_ponto']==null){
                     ds_registro_ponto="";                       
                }else{
                    if(arrCarregarEntrada.data[j]['dt_hora_ponto_entrada']==dia+"/"+arrDatas[1]+"/"+arrDatas[2]){    
                        hora_entrada = arrCarregarEntrada.data[j]['dt_rh_entratada'];     
                    }
                    if(arrCarregarEntrada.data[j]['dt_hora_ponto_saida']==dia+"/"+arrDatas[1]+"/"+arrDatas[2]){   
                        hora_saida = arrCarregarEntrada.data[j]['dt_rh_saida'];     
                    }
                    if(arrCarregarEntrada.data[j]['dt_hora_ponto_saida_intervalo']==dia+"/"+arrDatas[1]+"/"+arrDatas[2]){ 
                        hora_saida_intervalo = arrCarregarEntrada.data[j]['dt_rh_saida_intervalo'];     
                    }
                    if(arrCarregarEntrada.data[j]['dt_hora_ponto_entrada_retorno']==dia+"/"+arrDatas[1]+"/"+arrDatas[2]){    
                        hora_entrada_retorno = arrCarregarEntrada.data[j]['dt_rh_entratada_retorno'];     
                    }
                }      
            
            }
            str +="<tr style='border-style: solid;'>";
            str +="<td style='border-style: solid;' align=center>";
            str +="<b>"+dia+"/"+arrDatas[1]+"/"+arrDatas[2];
            str +="</b>";
            str +="</td>";
            
            str +="<td style='border-style: solid;' align=center>";  
            str += hora_entrada;       
            str +="</td>";
            
            str +="<td style='border-style: solid;' align=center>";
            str += hora_saida_intervalo;  
            str +="</td>";
            
            str +="<td style='border-style: solid;' align=center>";
            str += hora_entrada_retorno;
            str +="</td>";
            
            str +="<td style='border-style: solid;' align=center> ";
            str += hora_saida;
            str +="</td>";
            
            str +="<td style='border-style: solid;'>";
            str +="&nbsp;";
            str +="</td>";
            str +="</tr>";
        }    
    str +="</tbody>";
    str +="</table>";
    str +="</div>";
    str +="</div>";    
    $("#grid").append(str);
    $("#janela_impressao").modal();
    
}

function fcImprimir(){
  
    //get the modal box content and load it into the printable div
     sendPost('folha_ponto_impressao.php',{token: token, colaboradores_pk: $("#colaboradores_pk_edit").val(),dt_periodo_ini:$("#dt_periodo_ini_edit").val(),dt_periodo_fim:$("#dt_periodo_fim_edit").val()});
}
$(document).ready(function(){

    //faz a carga inicial do grid.
    fcCarregarGenero();
    fcCarregarGrid();
    fcCarregarQualificacao();
    
    fcCarregarGridFolha();
    //Atribui os eventos dos demais controles
    $(document).on('click', '#cmdPesquisar', fcPesquisar);
    
    
    $('#dt_periodo_ini').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker("setDate", new Date() ); 
    
    $("#dt_periodo_ini").keypress(function(){
       mascara(this,mdata);
    });
    $('#dt_periodo_fim').datepicker({defaultDate: "getDate()",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker("setDate", new Date() ); 
    
    $("#dt_periodo_fim").keypress(function(){
       mascara(this,mdata);
    });
    
    fcValidarForm();
    
    $(document).on('click', '#btnImprimirModal', fcImprimir);

});


