var tblResultado;
var click_id = 0;

function fcCarregarGrid(){  
   var strRetorno = "";
   
 
    var strNenhumRegisto = "";
    var strColaboradores = "";
        
            strRetorno+="<table id='tabela'  class='table-responsive-sm' style='width:100%' id='tblResultado'>";
            strRetorno+="    <thead>";
            strRetorno+="       <tr>";
            strRetorno+="            <th><input type='text' id='rxtPostoTrabalho' placeholder='Pesquisar por'/></th>";
            strRetorno+="            <th><input type='text' id='txtColaborador' placeholder='Pesquisar por'/></th>";
            strRetorno+="            <th><input type='text' id='txtRE' placeholder='Pesquisar por'/></th>";
            strRetorno+="            <th><input type='text' id='txtDsPin' placeholder='Pesquisar por'/></th>";
            strRetorno+="            <th><input type='text' id='txtEscala' placeholder='Pesquisar por'/></th>";
            strRetorno+="            <th><input type='text' id='txtAtraso' placeholder='Pesquisar por'/></th>";

            strRetorno+="       </tr>";
            strRetorno+="    </thead>";
            var segundo_ponto ="";
            var segundo_intervalo = "";
            var segundo_positivo = "";
            var soma_segundo_positivo = "";
            strRetorno+="    <tbody>";
            strRetorno+="       <tr  align=center style='background-color:f5f5f5;border-color:b4b4b4;border-style: solid;'>";
            strRetorno+="           <th  align=center>Posto Trabalho</th>";
            strRetorno+="           <th  align=center>Tel. Posto</th>";
            strRetorno+="           <th >Colaborador</th>";
            strRetorno+="           <th >Cel. Colaborador</th>";
            strRetorno+="           <th >Horário Escala</th>";
            strRetorno+="           <th >Tempo Atraso</th>"; 
            strRetorno+="       </tr>";
            
                var objParametros = {
                    "dt_ini": $("#dt_ini").val(),
                    "dt_fim": $("#dt_fim").val()
                };    

                var arrCarregar = carregarController("ponto", "popUpAtraso", objParametros); 
                
                if (arrCarregar.result == 'success'){
                    
                    if(arrCarregar.data.length > 0){
                       
                        //strRetorno+="    </tbody>";
                        //strRetorno+="<tfoot>";
                        for(j=0; j < arrCarregar.data.length ;j++){  

                            if(arrCarregar.data[j]['ds_lead']!= null){
                                $ds_lead = arrCarregar.data[j]['ds_lead'];
                            }else{
                                $ds_lead = "";
                            }          
                            if(arrCarregar.data[j]['ds_tel']!= null){
                                ds_tel = arrCarregar.data[j]['ds_tel'];
                            }else{
                                ds_tel = "";
                            }          

                            if(arrCarregar.data[j]['ds_colaborador']!= null){
                                ds_colaborador = arrCarregar.data[j]['ds_colaborador'];
                            }else{
                                ds_colaborador = "";
                            }

                            if(arrCarregar.data[j]['ds_cel']!= null){
                                ds_cel = arrCarregar.data[j]['ds_cel'];
                            }else{
                                ds_cel = "";
                            }
                            if(arrCarregar.data[j]['ds_legenda']==null){
                                ds_legenda="";
                            }else{
                                 ds_legenda=arrCarregar.data[j]['ds_legenda'];
                            }

                            if(ds_legenda=="Inicio Expediente"){
                                
                                //DIFERENCA DO HORARIO 
                                if(arrCarregar.data[j]['hr_diferenca']== null){
                                    var ds_hr_dif = 'Vazio';
                                }
                                else{
                                    if(parseInt(arrCarregar.data[j]['segundos'])< 0){
                                        var ds_hr_dif = "Dentro do Horário";
                                    }
                                    else if(parseInt(arrCarregar.data[j]['segundos'])== 0){
                                        var ds_hr_dif = "";

                                    }
                                    else{
                                        var ds_hr_dif = arrCarregar.data[j]['hr_diferenca'];
                                        segundo_ponto = parseInt(arrCarregar.data[j]['segundos']);
                                    }
                                }
                                //COR DOS HORARIOS
                                var ds_background = "";
                                var ds_fonte_color = "";
                                if(parseInt(arrCarregar.data[j]['segundos']) >=60 && parseInt(arrCarregar.data[j]['segundos'])< 600){
                                    ds_background = '#c3c3c1';
                                }
                                if(parseInt(arrCarregar.data[j]['segundos'])>= 600){
                                    ds_background = '#e6df55';
                                }
                                if(parseInt(arrCarregar.data[j]['segundos'])>= 900){
                                    ds_background = '#f99856';
                                }
                                if (parseInt(arrCarregar.data[j]['segundos'])>= 1500){
                                    ds_background = '#ec1c24';
                                    ds_fonte_color = 'white';
                                }
                            }
                            
                            if(parseInt(arrCarregar.data[j]['segundos'])>0){
                                if(ds_legenda=="Inicio Expediente"){
                                    strRetorno+="<tr align=center style='border-color:b4b4b4;border-style: solid;background-color:"+ds_background+";color:"+ds_fonte_color+"'>";
                                }
                                else{
                                    strRetorno+="<tr align=center style='border-color:b4b4b4;border-style: solid;'>";
                                }

                                strRetorno+="<td  width='10%'>"+$ds_lead+"</td>";
                                strRetorno+="<td  width='10%'>"+ds_tel+"</td>";
                                strRetorno+="<td  width='10%'>"+ds_colaborador+"</td>";
                                strRetorno+="<td  width='10%'>"+ds_cel+"</td>"; 
                                strRetorno+="<td  width='10%'>"+arrCarregar.data[j]['hr_escala']+"</td>";

                                if(ds_legenda=="Inicio Expediente"){
                                    strRetorno+="<td  width='10%' >"+ds_hr_dif+"</td>";
                                }
                                else{
                                    strRetorno+="<td  width='10%' ></td>";
                                }

                                strRetorno+="</tr>";
                            }

                        }
                        
                    }
                }
                
                strRetorno+="</tbody>";
                strRetorno+="</table>"; 
                if(strRetorno!=""){        
                    $("#grid").html(strRetorno);
                }else{ 
                    $("#grid").append(strNenhumRegisto);
                }
                $("#loader").hide();
                $("#exibir").show();
}
function toTimeString(seconds) {
  return (new Date(seconds * 1000)).toUTCString().match(/(\d\d:\d\d:\d\d)/)[0];
}

pegarUltimoDiaMes = function(year, month){
    var ultimoDia = (new Date(year, month, 0)).getDate();
    return ultimoDia;
};

function pegarPosicaoDiaSemana(data){
    
    var splitData = data.split("/");
    var semana = [0, 1, 2, 3, 4, 5,6];
    var d = new Date(splitData[2], splitData[1] - 1, splitData[0]);
    return semana[d.getDay()];
}

function fcAbrirMapa(origem,destino){
    $("#janela_modal_mapa").modal();
    $("#html_maps").html('<iframe width="750" scrolling="no" height="350" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr='+origem+'&daddr='+destino+'&output=embed"></iframe>');
}

function fcCarregarColaborador(){

    var objParametros = {
        "pk": ds_colaboradores
    };      
    
    var arrCarregar = carregarController("colaborador", "listarPk", objParametros); 
    if (arrCarregar.result == 'success'){
        $("#ds_colaborador").text(arrCarregar.data[0]['ds_colaborador']);
    }
        
}

function fcCancelar(){

    sendPost("rel_ponto_colaborador_res_form.php", {token: token});
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

function fcAtualizar(){
    $("#loader").show();
    $("#exibir").hide();
    fcCarregarGrid();
}

$(document).ready(function(){    
    //$(document).on('click', '#cmdCancelar', fcCancelar);
    //$(document).on('click', '#cmdExport', fcExport);
    $(document).on('click', '#cmdAtualizar', fcAtualizar);
    
    $("#menu_desabilitar_pop").hide();

    //fcCarregarColaborador();
    

    var today = new Date();
    var periodo = new Date();
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
    periodo  = dd + '/' + mm + '/' + yyyy;
    
    $("#dt_emissao").text(today);
    $("#dt_ini").val(periodo);
    $("#dt_fim").val(periodo);
    
    
    fcCarregarGrid();
    
    
    $("#tabela input").keyup(function(){
            var index = $(this).parent().index();
            var nth = "#tabela td:nth-child("+(index+1).toString()+")";
            var valor = $(this).val().toUpperCase();
            $("#tabela tbody tr").show();
            $(nth).each(function(){
                    if($(this).text().toUpperCase().indexOf(valor) < 0){
                            $(this).parent().hide();
                    }
            });
    });
    $("#tabela input").blur(function(){
            $(this).val("");
    });	
    
    //atualiza de 5 em 5 min
    setInterval(function() {
        $("#loader").show();
        $("#exibir").hide();
        fcCarregarGrid();
      }, 300000);
    
});


