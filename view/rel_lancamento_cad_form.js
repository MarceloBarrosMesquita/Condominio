var tblResultado;
var tblResultadoColab;
var click_id = 0;
var arrMes = [];



function fcCarregarGrid(){
    var strNenhumRegisto = "";
    var strRetorno = "";
        
        
        
        
        
    var objParametros = {
        tipo_lancamento_pk:tipo_lancamento_pk,
        ic_status_pagamento:ic_status,
        "dt_vencimento_ini": dt_vencimento_ini,
        "dt_vencimento_fim": dt_vencimento_ini,
        "empresas_pk":empresas_pk,
        "tipo_grupo_pk":tipo_grupo_pk,
        "grupo_leancamento_pk":grupo_leancamento_pk,
        "usuario_cadastro_pk":usuario_cadastro_pk
    };         

    var arrCarregar = carregarController("lancamento", "RelatorioLancamento", objParametros); 
 
    if (arrCarregar.result == 'success'){
        
        if(arrCarregar.data.length > 0){   
            
                    strRetorno+="<div class='row'><div class='col-md-12'>";
                    strRetorno+="<table class='table table-striped table-bordered ' style='width:100%' id='tblResultado'>";

                    strRetorno+="<tbody>";
                    strRetorno+="<tr>";
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Cód</font></th>";
                    strRetorno+="<th width='10%' class='menu_fixo'><font style='font-size: 12px'>Tipo<br>Lançamento</font></th>"; 
                    
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Valor</font></th>";
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Dt Vencimento<br>Recebimento</font></th>";   
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Data<br>Competência / Referência</font></th>";
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Método de Recebimento<br>Pagamento</font></th>";
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Status</font></th>";
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Tipo Operação<br>Planos Conta</font></th>";    
                    strRetorno+="<th width='10%' class='menu_fixo'><font style='font-size: 12px'>Empresa do <br>lançamento</font></th>";
                    strRetorno+="<th width='10%' class='menu_fixo'><font style='font-size: 12px'>Conta do Bancária</font></th>";
                    strRetorno+="<th width='10%' class='menu_fixo'><font style='font-size: 12px'>Identificação do<br>Lançamento</font></th>";
                    strRetorno+="<th width='10%'><font style='font-size: 12px'>Grupo Origem<br>do Lançamento</font></th>";
                    strRetorno+="<th width='5%'class='menu_fixo'><font style='font-size: 12px'>Rebido de ?<br>Pago para ?</font></th>";
                    strRetorno+="<th width='10%'><font style='font-size: 12px'>Grupos Centro<br>de Custo</font></th>";
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Centro de Custo</font></th>";
                    
                    strRetorno+="<th width='5%' class='menu_fixo'><font style='font-size: 12px'>Usuário de<br>Cadastro</font></th>";
                    strRetorno+="<th width='10%' class='menu_fixo'><font style='font-size: 12px'>Observação</font></th>";
                    strRetorno+="</tr>";
                    
                    for(i=0; i < arrCarregar.data.length ;i++){

                        strRetorno+="<tr>";
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_pk']+"</font></th>";
                        strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_operacao']+"</font></th>"; 
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+float2moeda(arrCarregar.data[i]['t_vl_lancamento'])+"</font></th>"; 
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_dt_vencimento']+"</font></th>"; 
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_dt_competencia']+"</font></th>"; 
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_metodo_pagamento']+"</font></th>"; 
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_status_pagamento']+"</font></th>";
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_tipo_operacao']+"</font></th>";
                        if(arrCarregar.data[i]['t_ds_razao_social']==null){
                            strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'></font></th>";
                        }
                        else{
                            strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_razao_social']+"</font></th>";
                        }
                        if(arrCarregar.data[i]['t_ds_conta_bancaria']==null){
                            strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'></font></th>";
                        }
                        else{
                            strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_conta_bancaria']+"</font></th>";
                        }
                        
                        strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_lancamento']+"</font></th>";
                        strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_tipo_grupo']+"</font></th>";
                        
                        
                        if(arrCarregar.data[i]['t_ds_recebido_de']==null){
                            strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'></font></th>";
                        }
                        else{
                            strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_recebido_de']+"</font></th>";
                        }
                        if(arrCarregar.data[i]['t_ds_tipo_grupo_centro_custo']==null){
                            strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'></font></th>";
                        }
                        else{
                            strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_tipo_grupo_centro_custo']+"</font></th>";
                        }
                        if(arrCarregar.data[i]['t_ds_recebido_de_centro_custo']==null){
                            strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'></font></th>";
                        }
                        else{
                            strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_ds_recebido_de_centro_custo']+"</font></th>";
                        }
                       
                        strRetorno+="<th width='5%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['ds_usuario']+"</font></th>";
                         if(arrCarregar.data[i]['t_n_documento']==null){
                            strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'></font></th>";
                        }
                        else{
                            strRetorno+="<th width='10%' align='center'><font style='font-size: 13px'>"+arrCarregar.data[i]['t_n_documento']+"</font></th>";
                        }
                        strRetorno+="</tr>";
                }
                strRetorno+="</tbody>";
                strRetorno+="</table>";
                strRetorno+="</div>";
                strRetorno+="</div>";
                strRetorno+="<br><br><br><br>";
                if(strRetorno!=""){
                    $("#grid").html(strRetorno);
                }
                else{

                    strNenhumRegisto+="<div class='row'>";
                    strNenhumRegisto+="<div class='col-md-12 text-center'>";
                    strNenhumRegisto+="   <h3><b>Nenhum Registro Encontrado</b></h3>";
                    strNenhumRegisto+=" </div>";
                    strNenhumRegisto+="</div>";
                    $("#grid").html(strNenhumRegisto);
                }

        }
        else{
            strNenhumRegisto+="<div class='row'>";
            strNenhumRegisto+="<div class='col-md-12 text-center'>";
            strNenhumRegisto+="   <h3><b>Nenhum Registro Encontrado</b></h3>";
            strNenhumRegisto+=" </div>";
            strNenhumRegisto+="</div>";
            $("#grid").html(strNenhumRegisto);
        }
        
    }
    else{
        alert('Falhar ao carregar o registro');
    }
}



function fcCancelar(){

    sendPost("rel_lancamento_res_form.php", {token: token});
}

function fcExport(){

    var htmlPlanilha = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
    htmlPlanilha += '<head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>PlanilhaTeste</x:Name>';
    htmlPlanilha += '<x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml>';
    htmlPlanilha += '<![endif]--></head><body><table>' + $("#form").html() + '</table></body></html>';
 
    var htmlBase64 = btoa(htmlPlanilha);
    var link = "data:application/vnd.ms-excel;base64," + htmlBase64;
 
    var hyperlink = document.createElement("a");
    hyperlink.download = "export.xls";
    hyperlink.href = link;
    hyperlink.style.display = 'none';
 
    document.body.appendChild(hyperlink);
    hyperlink.click();
    document.body.removeChild(hyperlink);
}

$(document).ready(function(){    
    
    $(document).on('click', '#cmdCancelar', fcCancelar);
    $(document).on('click', '#cmdExport', fcExport);
    
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var hh = today.getHours();
    var min = today.getMinutes();
    var seg = today.getSeconds();
    //data
    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 
    //hora 
    if(hh<10) {
        hh = '0'+hh
    } 

    if(min<10) {
        min = '0'+min
    } 
    if(seg<10) {
        seg = '0'+seg
    } 

    today = dd + '/' + mm + '/' + yyyy + ' '+hh+':'+min+':'+seg;


    $("#dt_emissao").text(today);
    
    
    
    $("#dt_periodo").text(dt_vencimento_ini+" até "+dt_vencimento_fim);
    
    if(tipo_lancamento_pk==0){
        $("#ds_tipo_lancamento").text("Receita e Despesa");
    }
    else if(tipo_lancamento_pk==1){
        $("#ds_tipo_lancamento").text("Receita");
    }
    if(tipo_lancamento_pk==2){
        $("#ds_tipo_lancamento").text("Despesa");
    }
    
    $("#ds_empresa").text(ds_empresa);
    $("#ds_tipo_grupo").text(ds_tipo_grupo);
    $("#ds_grupo_leancamento").text(ds_grupo_leancamento);
    $("#ds_usuario_cadastro").text(ds_usuario_cadastro);
    $("#ds_ic_status").text(ds_ic_status);
   
    fcCarregarGrid();

});


