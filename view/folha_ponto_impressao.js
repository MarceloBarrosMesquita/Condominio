function fcAbrirModalFolha(dt_periodo_ini,dt_periodo_fim,leads_pk){

    $("#grid").empty();
    var mesAno = dt_periodo_ini;
    var str = "";
    var arrDatas = dt_periodo_ini.split("/");
    var arrDatasFim = dt_periodo_fim.split("/");
    
    
    
    
    var objParametros = {
        "leads_pk": leads_pk,
        "dt_periodo_ini":dt_periodo_ini,
        "dt_periodo_fim":dt_periodo_fim,
        "ic_modal_exibicao":1
    };
    var arrCarregar = carregarController("ponto_folha", "listarGridPontoFolhaPostoTrabalho", objParametros);
    
    
    if (arrCarregar.result == 'success'){
        for(t=0;t<arrCarregar.data.length;t++){
    
        //PEGA A EMPRESA DO COLABORADOR
            var objParametrosConta = {
                "pk":arrCarregar.data[t]['t_colaborador_pk']
            };    

            var arrCarregarConta = carregarController("colaborador", "listarPk", objParametrosConta); 
            if (arrCarregarConta.result == 'success'){
                if(arrCarregarConta.data.length>0){
                    if(arrCarregarConta.data[0]['ds_razao_social_empresa']!=null){
                        var ds_empresa = arrCarregarConta.data[0]['ds_razao_social_empresa'];
                    }
                    else{
                        var ds_empresa =  " ";
                    }
                    if(arrCarregarConta.data[0]['ds_cpf_cnpj_empresa']!=null){
                        var ds_cnpj = arrCarregarConta.data[0]['ds_cpf_cnpj_empresa'];
                    }
                    else{
                        var ds_cnpj =  " ";
                    }
                    if(arrCarregarConta.data[0]['ds_endereco_empresa']!=null){
                        var ds_endereco = arrCarregarConta.data[0]['ds_endereco_empresa'];
                    }
                    else{
                        var ds_endereco =  " ";
                    }
                    

                }

            }
    
    
    
            
            var objParametrosColab = {
                "pk":arrCarregar.data[t]['t_colaborador_pk']
            };    

            var arrCarregarColab = carregarController("colaborador", "listarPorPkEFuncao", objParametrosColab); 
            
            if (arrCarregarColab.result == 'success'){
                
                
                
                var ds_colaborador = arrCarregarColab.data[0]['ds_colaborador'];
                var ds_ctps = arrCarregarColab.data[0]['ds_ctps']+" / "+arrCarregarColab.data[0]['ds_serie'];
                var dt_admissao = arrCarregarColab.data[0]['dt_admissao'];
                var ds_produto_servico = arrCarregarColab.data[0]['ds_produto_servico'];
                
                
            }
            
            str +="<page size='A4'>";
            str +="<div class='row ' >";
            str +="<div class='col-md-2'>&nbsp;</div>";
            str +="<div class='col-md-10'>";
            str +="<table style='border-style: solid;width=100%' width=80%>";
            str +="<thead>";
            str +="<tr style='border-style: solid;width=100%' align=center>";
            str +="<th colspan='7' nowrap style='border-style: solid;background-color:cdcdcd'align=center>";
            str +="<b>Dados do Empregador";
            str +="</b>";
            str +="</th>";

            str +="</tr>";
            str +="<tr>";
            str +="<th colspan=4 style='border-style: solid;' align=center>Empregador: Nome/Empresa<br>";
            str+=ds_empresa;
            str +="</th>";
            str +="<th colspan=3 style='border-style: solid;' align=center>CEI/CNPJ Nº<br>";
            str+=ds_cnpj;
            str +="</th>";
            str +="</tr>";
            str +="<tr>";
            str +="<th colspan=7 style='border-style: solid;' align=center>Enderço:<br>";
            str+=ds_endereco;
            str +="</th>";
            str +="</tr>";
            str +="<tr style='border-style: solid;width=100%' align=center>";
            str +="<th colspan='7' nowrap style='border-style: solid;background-color:cdcdcd'align=center>";
            str +="<b>Dados do Empregado";
            str +="</b>";
            str +="</th>";

            str +="</tr>";
            str +="<tr>";
            str +="<th colspan=7 style='border-style: solid;' align=center>Nome<br>";
            str+=ds_colaborador;
            str +="</th>";
            str +="</tr>";

            str +="<tr>";
            str +="<th colspan=4 style='border-style: solid;' align=center>CTPS Nº e Série:<br>";
            str+=ds_ctps;
            str +="</th>";
            str +="<th colspan=3 style='border-style: solid;' align=center>Função:<br>";
            str+=ds_produto_servico;
            str +="</th>";
            str +="</tr>";
            str +="<tr>";
            str +="<th colspan=4 style='border-style: solid;' align=center>Data Admissão:<br>";
            str+=dt_admissao;
            str +="</th>";
            str +="<th  colspan=3 style='border-style: solid;' align=center>Mês/Ano:<br>";
            str+=mesAno.substring(3);
            str +="</th>";
            str +="</tr>";
            str +="<tr>";
            str +="<th colspan=7 style='border-style: solid;' align=center>Posto de Trabalho:<br>";
            str+=arrCarregar.data[t]['t_ds_lead'];
            str +="</th>";
            str +="</tr>";
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
            str +="<b>Hora Extra";
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
                    "colaborador_pk":arrCarregar.data[t]['t_colaborador_pk'],
                    "dt_ini": arrDatas[0]+"/"+(arrDatas[1])+"/"+arrDatas[2],
                    "dt_fim": arrDatasFim[0]+"/"+(arrDatasFim[1])+"/"+arrDatasFim[2]
                };    

            var arrCarregarEntrada = carregarController("ponto", "folhaPonto", objParametrosEntrada); 
            
            
            // 3 de abril de 2019
            
            //separa a data 
                                

           var dt_periodo_ini1 = dt_periodo_ini;
           
            for(i = 0 ;i< 31;i++){
                var dataSplitFim = dt_periodo_fim.split('/');

                var dayFim = dataSplitFim[0]; // 15
                var monthFim = dataSplitFim[1]; // 04
                var yearFim = dataSplitFim[2]; // 2019
                
                var data_fim = new Date(yearFim, monthFim - 1, dayFim);


                var dataSplit = dt_periodo_ini1.split('/');

                var day = dataSplit[0]; // 15
                var month = dataSplit[1]; // 04
                var year = dataSplit[2]; // 2019

                // Agora podemos inicializar o objeto Date, lembrando que o mês começa em 0, então fazemos -1.
                var data_inicio = new Date(year, month - 1, day);
                
                
                
                if(data_inicio <= data_fim){

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
                    
                    var data = new Date(arrDatas[2], arrDatas[1] - 1, dia);
                    var count_ferias ="";
                    var colaborador_ferias ="";
                    var dt_hora_extra ="";
                    var count_falta ="";
                    var colaborador_falta ="";
                    var dt_hora_ponto ="";
                    var HoraExtra ="";
                    
                    
                   
                    var objParametrosFalta = {
                        "leads_pk": leads_pk,
                        "colaborador_pk":arrCarregar.data[t]['t_colaborador_pk'],
                        "dt_ini": dia+"/"+(dataSplit[1])+"/"+dataSplit[2],
                        "dt_fim": dia+"/"+(dataSplit[1])+"/"+dataSplit[2]
                    };    

                    var arrCarregarFalta = carregarController("colaborador_falta", "listarFaltaParaPonto", objParametrosFalta)
                   
                    if(arrCarregarFalta.data.length > 0){
                        if(arrCarregarFalta.data[0]['count_falta']!=""){
                             count_falta = arrCarregarFalta.data[0]['count_falta'];
                            if(arrCarregarFalta.data[0]['ds_colaborador_falta']!=""){
                                 colaborador_falta = arrCarregarFalta.data[0]['ds_colaborador_falta'];
                            }
                        }
                        else if(arrCarregarFalta.data[0]['count_ferias']!=""){
                             count_ferias = arrCarregarFalta.data[0]['count_ferias'];
                            if(arrCarregarFalta.data[0]['ds_colaborador_ferias']!=""){
                                 colaborador_ferias = arrCarregarFalta.data[0]['ds_colaborador_ferias'];
                            }
                        }
                        
                    }
                    
                    if(arrCarregarEntrada.data.length > 0){
                        
                        for(j=0;j<arrCarregarEntrada.data.length;j++){
                            var dt_hora_ponto = "";
                            
                            
                            
                            if(arrCarregarEntrada.data[j]['dt_hora_ponto']!=null){
                                
                             
                            
                                var dataSplitPonto = dt_hora_ponto.split('/');


                                var dayPonto = dataSplitPonto[0]; // 15
                                var monthPonto = dataSplitPonto[1]; // 04
                                var yearPonto = dataSplitPonto[2]; // 2019

                                var data_ponto = new Date(yearPonto, monthPonto - 1, dayPonto);
                          
                                //if(data_inicio == data_ponto){
                                    var dt_hora_ponto = arrCarregarEntrada.data[j]['dt_hora_ponto'];
                                //}
                            }
                            
                            
                            
                            if(arrCarregarEntrada.data[j]['dt_hora_extra']!=null){
                                var dt_hora_extra = arrCarregarEntrada.data[j]['dt_hora_extra'];
                           
                                var dataSplitExtra = dt_hora_extra.split('/');


                                var dayExtra = dataSplitExtra[0]; // 15
                                var monthExtra = dataSplitExtra[1]; // 04
                                var yearExtra = dataSplitExtra[2]; // 2019

                                var data_extra = new Date(yearExtra, monthExtra - 1, dayExtra);
                                if(data_inicio == data_extra){
                                    var HoraExtra = arrCarregarEntrada.data[j]['hr_extra'];
                                }
                            }
                            
                            
                            if(arrCarregarEntrada.data[j]['ds_legenda']==null){
                                ds_legenda="";
                            }else{                        
                                ds_legenda=arrCarregarEntrada.data[j]['ds_legenda'];                            
                            }

                            if(arrCarregarEntrada.data[j]['ds_registro_ponto']==null){
                                 ds_registro_ponto="";                       
                            }
                            else{
                          
                                if(arrCarregarEntrada.data[j]['dt_hora_ponto_entrada']==dt_periodo_ini1){ 
                                    
                                    hora_entrada = arrCarregarEntrada.data[j]['dt_rh_entratada'];     
                                }
                                if(arrCarregarEntrada.data[j]['dt_hora_ponto_saida']==dt_periodo_ini1){   
                                    hora_saida = arrCarregarEntrada.data[j]['dt_rh_saida'];     
                                }
                                if(arrCarregarEntrada.data[j]['dt_hora_ponto_saida_intervalo']==dt_periodo_ini1){ 
                                    hora_saida_intervalo = arrCarregarEntrada.data[j]['dt_rh_saida_intervalo'];     
                                }
                                if(arrCarregarEntrada.data[j]['dt_hora_ponto_entrada_retorno']==dt_periodo_ini1){    
                                    hora_entrada_retorno = arrCarregarEntrada.data[j]['dt_rh_entratada_retorno'];     
                                }
                            }      
                        } 
                    }
                    
                    if(hora_entrada!=""){
                       str +="<tr style='border-style: solid;'>";
                        str +="<td style='border-style: solid;' align=center>";
                        str +="<b>"+dt_periodo_ini1;
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
                        str +="<td style='border-style: solid;' align=center> ";
                        str += HoraExtra;
                        str +="</td>";

                        str +="</tr>"; 
                    }
                    else if(count_falta!=""){
                        str +="<tr style='border-style: solid;'>";
                        str +="<td style='border-style: solid;' align=center>";
                        str +="<b>"+dt_periodo_ini1;
                        str +="</b>";
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center>";  
                        str +="<font color=red><b>Falta</b></font>";       
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center>";
                        str +="<font color=red><b>Falta</b></font>"; 
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center>";
                        str +="<font color=red><b>Falta</b></font>"; 
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center> ";
                        str +="<font color=red><b>Falta</b></font>"; 
                        str +="</td>";
                        str +="<td style='border-style: solid;' align=center> ";
                        str +="<font color=red><b>Falta</b></font>"; 
                        str +="</td>";

                        str +="</tr>";
                    }
                    else if(count_ferias){
                        str +="<tr style='border-style: solid;'>";
                        str +="<td style='border-style: solid;' align=center>";
                        str +="<b>"+dt_periodo_ini1;
                        str +="</b>";
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center>";  
                        str +="<font color=blue><b>Férias</b></font>";       
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center>";
                        str +="<font color=blue><b>Férias</b></font>";   
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center>";
                        str +="<font color=blue><b>Férias</b></font>";  
                        str +="</td>";

                        str +="<td style='border-style: solid;' align=center> ";
                        str +="<font color=blue><b>Férias</b></font>";  
                        str +="</td>";
                        str +="<td style='border-style: solid;' align=center> ";
                        str +="<font color=blue><b>Férias</b></font>";  
                        str +="</td>";

                        str +="</tr>";
                    }
                    else{
                        str +="<tr style='border-style: solid;'>";
                        str +="<td style='border-style: solid;' align=center>";
                        str +="<b>"+dt_periodo_ini1;
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
                        str +="<td style='border-style: solid;' align=center> ";
                        str += HoraExtra;
                        str +="</td>";

                        str +="</tr>"; 
                    }
                } 
                    
                    
                var p_nova_dt_agenda = dt_periodo_ini1.split("/");


                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                var dt_periodo_ini1 = 0;
                var dia = 0;
                var mes = 0;
                var ano = 0;
                if(nova_dt_agenda_dia_proximo.getDate()<10){
                    dia = "0"+nova_dt_agenda_dia_proximo.getDate();
                    mes = (nova_dt_agenda_dia_proximo.getMonth()+1);
                    ano = nova_dt_agenda_dia_proximo.getFullYear();
                }
                else{
                    dia = nova_dt_agenda_dia_proximo.getDate();
                    mes = (nova_dt_agenda_dia_proximo.getMonth()+1);
                    ano = nova_dt_agenda_dia_proximo.getFullYear();
                }

                if((nova_dt_agenda_dia_proximo.getMonth()+1)<10){
                    mes = "0"+(nova_dt_agenda_dia_proximo.getMonth()+1);
                    ano = nova_dt_agenda_dia_proximo.getFullYear();

                }
                else{
                    mes = (nova_dt_agenda_dia_proximo.getMonth()+1);
                    ano = nova_dt_agenda_dia_proximo.getFullYear();

                }                
                dt_periodo_ini1 = dia+"/"+mes+"/"+ano;
            }  
            str +="<tr style='border-style: solid;'>";
            str +="<td style='border-style: solid;' colspan=6>";
            str +="<br><br><b>_______________________________________________</b><br><b>Assinatura</b>";
            str +="</td>";
            str +="</tr>";
            str +="</tbody>";
            str +="</table>";
            str +="</div>";
            str +="</div>";  
            
            str +="</page>";  
            if(t < (arrCarregar.data.length-1)){
                str +="<div style='page-break-after:always'></div>";  
            }
           //str +="</page>";  
            
            
            
        }
       
    }
   
    $("#grid").append(str);
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
    sendPost('folha_ponto_posto_trabalho_res_form.php',{token: token});
}
function fcImprimir(){
    window.print();
    
}
$(document).ready(function(){
    fcAbrirModalFolha(dt_periodo_ini,dt_periodo_fim,leads_pk);
    $("#loader").hide();
    $("#exibir").show();
    

    $(document).on('click', '#cmdVoltar', fcVoltar);
    $(document).on('click', '#cmdImprimir', fcImprimir);
    setTimeout(function(){
        //fcImprimir();
    }, 300);
   
    
    
});