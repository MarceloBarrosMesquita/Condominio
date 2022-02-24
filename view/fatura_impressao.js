function fcAbrirModal(pk,dt_inicio_fatura,dt_fim_fatura,leads_pk){
    var str = "";
    var strP = "";
    var strG = "";
    $("#grid").empty();
    
    var objParametros1 = {
        "pk": ""
    };
    var arrCarregar1 = carregarController("conta", "listarContasAtual", objParametros1);
    var ds_conta = arrCarregar1.data[0]['ds_conta'];
    
    
    var objParametros = {
        "pk": pk,
        "leads_pk": leads_pk,
        "dt_inicio_fatura":dt_inicio_fatura,
        "dt_fim_fatura":dt_fim_fatura
    };
    var arrCarregar = carregarController("fatura", "listarPorLead", objParametros);;
    
    if (arrCarregar.result == 'success'){
            
            //str +="<page size='A4'>";
            //PRINT
            strP +="<div class='row' >";
            strP +="<div class='col-md-1'>&nbsp;</div>";
            strP +="<div class='col-md-11'>";
            
            //GRID NAVEGADOR
            strG +="<div class='row' >";
            strG +="<div class='col-md-3'>&nbsp;</div>";
            strG +="<div class='col-md-5'>";
            
            str +="<table style='width=100%'>";
            str +="<thead>";
            str +="<tr>";
            if(arrCarregar.data[0]['ds_razao_social']!=null){
                str +="<th colspan=8 style='align=center' align=center><font color='0070c0'><h2>"+arrCarregar.data[0]['ds_razao_social']+"</h2></font><br>";
            }
            else{
                str +="<th colspan=8 style='align=center' align=center><font color='0070c0'><h2>"+ds_conta+"</h2></font><br>";
            }
            
            str +="</th>";
            str +="<th colspan=2 style='text-align: right;'><font color='0070c0'><h2>FATURA</h2></font><br>";
            str +="</th>";
            str +="</tr>";
            str +="<tr>";
            str +="<th colspan=8 style='color:595959' align=center><b>Data da fatura: </b>";
            str+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+arrCarregar.data[0]['dt_cadastro'];
            str +="</th>";
            str +="<th colspan=1 style='color:595959;text-align:right;' align=center><b>Nº da fatura:</b>";
            str+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+arrCarregar.data[0]['pk'];
            str +="</th>";
            str +="</tr>";
            
            str +="<p>";
            
            str +="<tr style=''>";
            str +="<th style='' colspan=12  align=center>";
            str +="&nbsp;&nbsp;&nbsp;";
            str +="</th>";
            str +="</tr>";
            str +="<tr style=''>";
            str +="<th style='' colspan=12  align=center>";
            str +="&nbsp;&nbsp;&nbsp;";
            str +="</th>";
            str +="</tr>";
            
            
            str +="<tr style=''>";
            str +="<th style='color:595959' colspan=10  align=center><b>Cliente: </b>";
            str +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+arrCarregar.data[0]['ds_lead'];
            str +="</th>";
            str +="</tr>";
            
            str +="<tr style=''>";
            str +="<th style='color:595959' colspan=10  align=center><b>CPF CNPJ:</b> ";
            str +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+arrCarregar.data[0]['ds_cpf_cnpj'];
            str +="</th>";
            str +="</tr>";
            
            str +="<tr style=''>";
            str +="<th style='color:595959' colspan=10   align=center><b>Endereço:</b> ";
            str +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+arrCarregar.data[0]['ds_endereco'];
            str +="</th>";
            str +="</tr>";
            
            str +="<tr style=''>";
            str +="<th style='color:595959' colspan=10><b>Data Vencimento:</b> ";
            if(arrCarregar.data[0]['dt_vencimento']!=null){
                str +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+arrCarregar.data[0]['dt_vencimento'];
            }
            
            str +="</th>";
            str +="</tr>";
            str +="<br>";
            
            
            str +="<p>";
            
            str +="<tr style=''>";
            str +="<th style='' colspan=12  align=center>";
            str +="&nbsp;&nbsp;&nbsp;";
            str +="</th>";
            str +="</tr>";
            str +="<tr style=''>";
            str +="<th style='' colspan=12  align=center>";
            str +="&nbsp;&nbsp;&nbsp;";
            str +="</th>";
            str +="</tr>";
           

              
            str +="<tr style='border-color:0070c0;border-style: solid;background-color:0070c0;' align=center>";
            str +="<th colspan=2 style='border-color:595959;background-color:0070c0;color:white' align=rigth>Item<br>";
            str +="</th>";
            str +="<th colspan=4 style='border-color:595959;background-color:0070c0;color:white' align=rigth>Descrição<br>";
            str +="</th>";
            str +="<th colspan=2 style='border-color:595959;background-color:0070c0;color:white' align=rigth>Data<br>";
            str +="</th>";
            str +="<th colspan=2 style='border-color:595959;background-color:0070c0;color:white' align=rigth>Valor<br>";
            str +="</th>";
            str +="</tr>";
            
            str +="</thead>";
            str +="<tbody >";
            
            
            
            
            
            var valor_servico = 0;
            if(arrCarregar.data.length > 0){
                for(i=0;i<arrCarregar.data.length;i++){
                    if(arrCarregar.data[i]['ds_descricao']!=null){
                        var ds_descricao ="("+arrCarregar.data[i]['ds_descricao']+")";
                    }
                    else{
                        var ds_descricao = "";
                    }
                    
                    if(arrCarregar.data[i]['tipo_item_fatura']==1){
                        
                        valor_servico = arrCarregar.data[i]['vl_total'];
                        
                        str +="<tr style='border-style: solid;border-color:595959;' align=center>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959' align=rigth>"+(i+1)+"<br>";
                        str +="</th>";
                        str +="<th colspan=4 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959' align=rigth>Serviços de concervação e limpeza<br>";
                        str +="</th>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959'align=rigth><br>";
                        str +="</th>";
                        str +="<th colspan=3 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959' align=rigth>R$: "+float2moeda(arrCarregar.data[i]['vl_total'])+"<br>";
                        str +="</th>";
                        str +="</tr>";
                    }
                    else if(arrCarregar.data[i]['tipo_item_fatura']==2){
                        
                        valor_material = arrCarregar.data[i]['vl_total'];
                        
                        str +="<tr style='border-style: solid;border-color:595959;' align=center>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959' align=rigth>"+(i+1)+"<br>";
                        str +="</th>";
                        str +="<th colspan=4 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959' align=rigth>Material de limpeza<br>";
                        str +="</th>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959'align=rigth><br>";
                        str +="</th>";
                        str +="<th colspan=3 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959' align=rigth>R$: "+float2moeda(arrCarregar.data[i]['vl_total'])+"<br>";
                        str +="</th>";
                        str +="</tr>";

                    }
                    else if(arrCarregar.data[i]['tipo_item_fatura']==3){
                        
                        str +="<tr style='border-style: solid;border-color:595959;' align=center>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959' align=rigth>"+(i+1)+"<br>";
                        str +="</th>";
                        str +="<th colspan=4 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959' align=rigth>Serviços extras "+ds_descricao+"<br>";
                        str +="</th>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959'align=rigth><br>";
                        str +="</th>";
                        str +="<th colspan=3 style='border-style: solid;border-color:595959;background-color:b4c6e7;color:595959' align=rigth>R$: "+float2moeda(arrCarregar.data[i]['vl_total'])+"<br>";
                        str +="</th>";
                        str +="</tr>";
                    }
                    else if(arrCarregar.data[i]['tipo_item_fatura']==4){
                        verificarDesconto = 1;
                        str +="<tr style='border-style: solid;border-color:595959;' align=center>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959' align=rigth>"+(i+1)+"<br>";
                        str +="</th>";
                        str +="<th colspan=4 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959' align=rigth>Desconto "+ds_descricao+"<br>";
                        str +="</th>";
                        str +="<th colspan=2 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959'align=rigth><br>";
                        str +="</th>";
                        str +="<th colspan=3 style='border-style: solid;border-color:595959;background-color:d9e1f2;color:595959' align=rigth>R$: "+float2moeda(arrCarregar.data[i]['vl_total'])+"<br>";
                        str +="</th>";
                        str +="</tr>";
                    }

                }
            }
            
            str +="<tr style='border-color:0070c0;border-style: solid;background-color:0070c0;border-color:595959;' align=center>";
            str +="<th colspan=10 style='border-style: solid;border-color:595959;background-color:0070c0;color:black' align=rigth><br></th>";
            str +="</tr>";
           
           
            //CALCULO PARA IMPOSTOS
            /*var objParametrosImposto = {
                "leads_pk": leads_pk,
                "dt_cadastro":arrCarregar.data[0]['dt_cadastro']
            };
            var arrCarregarImposto = carregarController("lead_imposto", "listarImpostoPorLead", objParametrosImposto);

            var valor_inss= 0.00;
            var valor_issqn= 0.00;
            if (arrCarregarImposto.result == 'success'){
                
                if(arrCarregarImposto.data.length>0){
                    
                    for(i=0;i<arrCarregarImposto.data.length;i++){
                        
                        if(arrCarregarImposto.data[i]['imposto_pk']==1){
                            if(arrCarregarImposto.data[i]['ds_percentual_imposto']!=""){
                               
                                if(valor_servico!=0){
                                     valor_inss = (valor_servico * arrCarregarImposto.data[i]['ds_percentual_imposto'])/100;
                                }
                               
                                
                            }
                        }
                        if(arrCarregarImposto.data[i]['imposto_pk']==2){
                            if(arrCarregarImposto.data[i]['ds_percentual_imposto']!=""){
                                if(valor_servico!=0){
                                    valor_issqn = (arrCarregar.data[0]['vl_bruto_total'] * arrCarregarImposto.data[i]['ds_percentual_imposto'])/100;
                                }
                            }
                        }
                    }
                }
            }
            var valor_total_imposto = valor_inss + valor_issqn;
            var valor_total_a_pagar = 0.00;
            var valor_material = 0.00;
            
           
            
            
            var verificarDesconto = 0;
           
           
    
           if(verificarDesconto==1){
               
               valor_total_a_pagar = (parseFloat(valor_material)  + parseFloat(arrCarregar.data[0]['vl_bruto_total'])) - valor_total_imposto ;
           }
           else{
               valor_total_a_pagar = arrCarregar.data[0]['vl_bruto_total'] - valor_total_imposto;
           }*/
            
             
            
            str +="<tr style=''>";
            str +="<th style='' colspan=12  align=center>";
            str +="&nbsp;&nbsp;&nbsp;";
            str +="</th>";
            str +="</tr>";
            str +="<tr style=''>";
            str +="<th style='' colspan=12  align=center>";
            str +="&nbsp;&nbsp;&nbsp;";
            str +="</th>";
            str +="</tr>";
            
            str +="<tr >";
            str +="<td rowspan=5 colspan=6 aling=CENTER>";
            str +="<br><br>";
            str +="</td>";
            str +="<td colspan=5 aling=CENTER style='color:595959'>";
            str +="<b>Valor Bruto:</b> R$ "+float2moeda(arrCarregar.data[0]['vl_bruto_total']);
            str +="</td>";
            str +="</tr>";
            
            str +="<tr >";
            str +="<td colspan=6 aling=CENTER style='color:595959'>";
            str +="<b>Retenção INSS:</b> R$:"+float2moeda(arrCarregar.data[0]['vl_inss']);
            str +="</td>";
            str +="</tr>";  
            
            str +="<tr >";
            str +="<td colspan=6 aling=CENTER style='color:595959'>";
            str +="<b>Retenção ISSQN: </b>R$ "+float2moeda(arrCarregar.data[0]['vl_issqn']);
            str +="</td>";
            str +="</tr>";  
            
            str +="<tr >";
            str +="<td colspan=7 aling=CENTER style='color:595959'>";
            str +="<b>Total de Imp. retidos: </b>R$ "+float2moeda(arrCarregar.data[0]['vl_inss'] + arrCarregar.data[0]['vl_issqn']);
            str +="</td>";
            str +="</tr>";
            
            str +="<tr >";
            str +="<td colspan=6 aling=CENTER style='color:595959'>";
            str +="<b>Valor a Pagar: </b>R$ "+float2moeda(arrCarregar.data[0]['vl_total_fatura']);
            str +="</td>";
            str +="</tr>";
            
            
            
            
            
           
            
            str +="<tr >";
            str +="<td  colspan=10   aling=CENTER style='color:595959'>";
            str +="<b>Observações <br>Desconto de "+arrCarregar.data[0]['qtde_falta']+" falta(s) no valor de R$ "+float2moeda(arrCarregar.data[0]['vl_falta'])+"</b>";
            str +="</td>";
            str +="</tr>";    
               
           
            str +="</tbody>";
            str +="</table>";
            str +="</div>";
            str +="<div class='col-md-2'>&nbsp;</div>";
            str +="</div>";  
            
            //str +="</page>";  
            str +="<div style='page-break-after:always'></div>";  
       
    }
   
    $("#grid").append(strG + str);
    $("#gridPrint").append("<page size=A4>"+strP+str+"</page>");
    $("#janela_impressao").modal();
    
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
function fcVoltar(){
    sendPost('fatura_res_form.php',{token: token});
}
function fcImprimir(){
    $("#grid").hide();
    $("#gridPrint").show();
    window.print();
    
    $("#grid").show();
    $("#gridPrint").hide();
    
}
$(document).ready(function(){
    fcAbrirModal(pk,dt_inicio_fatura,dt_fim_fatura,leads_pk);
    $("#grid").show();
    $("#gridPrint").hide();
    $("#loader").hide();
    $("#exibir").show();
    

    $(document).on('click', '#cmdVoltar', fcVoltar);
    $(document).on('click', '#cmdImprimir', fcImprimir);
    setTimeout(function(){
        //fcImprimir();
    }, 300);
   
    
    
});