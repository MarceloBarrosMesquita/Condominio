var tblResultado;
var click_id = 0;

function fcCarregarGrid(){  
    
    
    
    var strModal="";
    $("#grid").append("");
    $("#grid").empty();

    
    strModal+="<div class='row'>";
    strModal+="    <div class='col-md-12'>";
    strModal+="    <table class='table table-striped table-bordered nowrap' style='width:100%' id='tblLeadColaborador'>";
    strModal+="        <thead>";
    strModal+="            <tr>";
    strModal+="                <th>Tipo Apontamento</th>";
    strModal+="                <th>Data Apontamento</th>";
    strModal+="                <th>Colaborador</th>";
    strModal+="                <th>Observação</th>";
    strModal+="                <th>Posto de Trabalho</th>";
    strModal+="            </tr>";
    strModal+="        </thead>";
    strModal+="        <tbody>";
    var objParametros1 = {
        "colaborador_pk": colaborador_pk,
        "dt_ini": dt_apontamento_ini,
        "dt_fim": dt_apontamento_fim,
        "leads_pk": leads_pk
    };         

    var arrCarregar1 = carregarController("agenda_colaborador_pausa", "listarAgendaPausaRel", objParametros1);
    
    if (arrCarregar1.result == 'success'){
        var tipo_apontamento = "";
        var data_apontamento = "";
        var ds_colaboradores = "";
        var ds_lead_grid = "";
        var observacao = "";
        var dt_cadastro = "";
        var usuario_cadastro = "";

        
        if(arrCarregar1.data.length > 0){

            for(i=0; i < arrCarregar1.data.length ;i++){
                var strObs="";
                var strDiaFolga ="";
                var dt_inicio_pausa_folga ="";
                var ds_colaborador_folga ="";
                var ds_lead_folga ="";
                if(tipo_apontamento_pk==1|| tipo_apontamento_pk==""){
                    //ATRIBUIR FOLGA
                    if(arrCarregar1.data[i]['ds_agenda_colaborador_pausa']=="Folga" && arrCarregar1.data[i]['motivo_folga_pk']!=null){

                        if(arrCarregar1.data[i]['ds_motivo_folga']!=null){
                             strDiaFolga = "Folga ";
                        }
                        else{
                             strDiaFolga = "Folga";
                        }

                        if(arrCarregar1.data[i]['ds_obs_folga']!=null){
                            strObs = arrCarregar1.data[i]['ds_obs_folga'];
                        }
                        else{
                            strObs = "";
                        }
                        if(arrCarregar1.data[i]['dt_inicio_pausa']!=null){
                            dt_inicio_pausa_folga = arrCarregar1.data[i]['dt_inicio_pausa'];
                        }
                        else{
                            dt_inicio_pausa_folga = "";
                        }
                        if(arrCarregar1.data[i]['ds_colaborador']!=null){
                            ds_colaborador_folga = arrCarregar1.data[i]['ds_colaborador'];
                        }
                        else{
                            ds_colaborador_folga = "";
                        }
                        if(arrCarregar1.data[i]['ds_lead']!=null){
                            ds_lead_folga = arrCarregar1.data[i]['ds_lead'];
                        }
                        else{
                            ds_lead_folga = "";
                        }

                        tipo_apontamento = strDiaFolga;
                        data_apontamento = dt_inicio_pausa_folga;
                        ds_colaboradores = ds_colaborador_folga;
                        ds_lead_grid = ds_lead_folga;
                        observacao = strObs;
                        dt_cadastro = arrCarregar1.data[i]['dt_cadastro'];
                        usuario_cadastro = arrCarregar1.data[i]['ds_usuario'];

                    }
                }
                if(tipo_apontamento_pk==2|| tipo_apontamento_pk==""){
                    //INCLUIR ESCALA
                    if(arrCarregar1.data[i]['ds_agenda_colaborador_pausa']!="Folga" && arrCarregar1.data[i]['ds_agenda_colaborador_pausa']!="Substituição Agenda" && arrCarregar1.data[i]['ds_agenda_colaborador_pausa']!="Férias"){

                        var dt_inicio_pausa_incluir_escala ="";
                        var ds_colaborador_incluir_escala ="";
                        var ds_lead_incluir_escala ="";


                        if(arrCarregar1.data[i]['dt_inicio_pausa']!=null){
                            dt_inicio_pausa_incluir_escala = arrCarregar1.data[i]['dt_inicio_pausa'];
                        }
                        else{
                            dt_inicio_pausa_incluir_escala = "";
                        }
                        if(arrCarregar1.data[i]['ds_colaborador']!=null){
                            ds_colaborador_incluir_escala = arrCarregar1.data[i]['ds_colaborador'];
                        }
                        else{
                            ds_colaborador_incluir_escala = "";
                        }
                        if(arrCarregar1.data[i]['ds_lead']!=null){
                            ds_lead_incluir_escala = arrCarregar1.data[i]['ds_lead'];
                        }
                        else{
                            ds_lead_incluir_escala = "";
                        }


                        tipo_apontamento = "Incluir Escala";
                        data_apontamento = dt_inicio_pausa_incluir_escala;
                        ds_colaboradores = ds_colaborador_incluir_escala;
                        ds_lead_grid = ds_lead_incluir_escala;
                        observacao = strObs;
                        dt_cadastro = arrCarregar1.data[i]['dt_cadastro'];
                        usuario_cadastro = arrCarregar1.data[i]['ds_usuario'];

                    }
                }
                
                if(tipo_apontamento_pk==3|| tipo_apontamento_pk==""){
                    //TROCA COLABORADOR
                    if( arrCarregar1.data[i]['motivos_pausas_pk']!=null && arrCarregar1.data[i]['ds_agenda_colaborador_pausa']=="Substituição Agenda"){



                        var dt_inicio_pausa_troca ="";
                        var ds_colaborador_troca ="";
                        var ds_lead_troca ="";


                        if(arrCarregar1.data[i]['dt_inicio_pausa']!=null){
                            dt_inicio_pausa_troca = arrCarregar1.data[i]['dt_inicio_pausa'];
                        }
                        else{
                            dt_inicio_pausa_troca = "";
                        }
                        if(arrCarregar1.data[i]['ds_colaborador']!=null){
                            ds_colaborador_troca = arrCarregar1.data[i]['ds_colaborador'];
                        }
                        else{
                            ds_colaborador_troca = "";
                        }
                        if(arrCarregar1.data[i]['ds_lead']!=null){
                            ds_lead_troca = arrCarregar1.data[i]['ds_lead'];
                        }
                        else{
                            ds_lead_troca = "";
                        }


                        tipo_apontamento = "Troca Colaborador";
                        data_apontamento = dt_inicio_pausa_troca;
                        ds_colaboradores = ds_colaborador_troca;
                        ds_lead_grid = ds_lead_troca;
                        observacao = "";
                        dt_cadastro = arrCarregar1.data[i]['dt_cadastro'];
                        usuario_cadastro = arrCarregar1.data[i]['ds_usuario'];

                    }
                }
                if(tipo_apontamento_pk==4|| tipo_apontamento_pk==""){
                    //EXCLUSAO
                    if(arrCarregar1.data[i]['motivo_exclusao_pk']!=null && arrCarregar1.data[i]['ds_agenda_colaborador_pausa']=="Exclusão" ){

                        if(arrCarregar1.data[i]['ds_obs_exclusao']!=null){
                            strObs = arrCarregar1.data[i]['ds_obs_exclusao'];
                        }
                        else{
                            strObs = "";
                        }

                        var dt_inicio_pausa_exclusao ="";
                        var ds_colaborador_exclusao ="";
                        var ds_lead_exclusao ="";


                        if(arrCarregar1.data[i]['dt_inicio_pausa']!=null){
                            dt_inicio_pausa_exclusao = arrCarregar1.data[i]['dt_inicio_pausa'];
                        }
                        else{
                            dt_inicio_pausa_exclusao = "";
                        }
                        if(arrCarregar1.data[i]['ds_colaborador']!=null){
                            ds_colaborador_exclusao = arrCarregar1.data[i]['ds_colaborador'];
                        }
                        else{
                            ds_colaborador_exclusao = "";
                        }
                        if(arrCarregar1.data[i]['ds_lead']!=null){
                            ds_lead_exclusao = arrCarregar1.data[i]['ds_lead'];
                        }
                        else{
                            ds_lead_exclusao = "";
                        }

                        tipo_apontamento = "Exclusão";
                        data_apontamento = dt_inicio_pausa_exclusao;
                        ds_colaboradores = ds_colaborador_exclusao;
                        ds_lead_grid = ds_lead_exclusao;
                        observacao = strObs;
                        dt_cadastro = arrCarregar1.data[i]['dt_cadastro'];
                        usuario_cadastro = arrCarregar1.data[i]['ds_usuario'];

                    }
                }
                if(tipo_apontamento_pk==5|| tipo_apontamento_pk==""){
                    //FÉRIAS
                    if(arrCarregar1.data[i]['motivo_exclusao_pk']==null  && arrCarregar1.data[i]['ds_agenda_colaborador_pausa']=="Férias"){

                        var dt_inicio_pausa_ferias ="";
                        var ds_colaborador_ferias ="";
                        var ds_lead_ferias ="";


                        if(arrCarregar1.data[i]['dt_inicio_pausa']!=null){
                            dt_inicio_pausa_ferias = arrCarregar1.data[i]['dt_inicio_pausa'];
                        }
                        else{
                            dt_inicio_pausa_ferias = "";
                        }
                        if(arrCarregar1.data[i]['ds_colaborador']!=null){
                            ds_colaborador_ferias = arrCarregar1.data[i]['ds_colaborador'];
                        }
                        else{
                            ds_colaborador_ferias = "";
                        }
                        if(arrCarregar1.data[i]['ds_lead']!=null){
                            ds_lead_ferias = arrCarregar1.data[i]['ds_lead'];
                        }
                        else{
                            ds_lead_ferias = "";
                        }


                        tipo_apontamento = "Férias";
                        data_apontamento = dt_inicio_pausa_ferias;
                        ds_colaboradores = ds_colaborador_ferias;
                        ds_lead_grid = ds_lead_ferias;
                        observacao = "";
                        dt_cadastro = arrCarregar1.data[i]['dt_cadastro'];
                        usuario_cadastro = arrCarregar1.data[i]['ds_usuario'];
                    }
                }
               
                
                
                
                if(tipo_apontamento!=""){
                    strModal+="<tr>";
                    strModal+="<td >";
                    strModal+=tipo_apontamento;
                    strModal+="</td>";
                    strModal+="<td>";
                    strModal+=data_apontamento;
                    strModal+="</td>";
                    strModal+="<td>";
                    strModal+=ds_colaboradores;
                    strModal+="</td>";
                    strModal+="<td>";
                    strModal+=observacao;
                    strModal+="</td>";
                    strModal+="<td>";
                    strModal+=ds_lead_grid;
                    strModal+="</td>";
                    strModal+="</tr>";
                }
               
            }
        }
    }
    var objParametros2 = {
        "colaborador_pk": colaborador_pk,
        "dt_ini": dt_apontamento_ini,
        "dt_fim": dt_apontamento_fim,
        "leads_pk": leads_pk
    };         

    var arrCarregar2 = carregarController("agenda_colaborador_pausa", "listarFaltaRel", objParametros2);
    
    if (arrCarregar2.result == 'success'){
        var tipo_apontamento = "";
        var data_apontamento = "";
        var observacao = "";
        var ds_colaboradores = "";
        var ds_lead_grid = "";
        var dt_cadastro = "";
        var usuario_cadastro = "";


        if(arrCarregar2.data.length > 0){
            for(i=0; i < arrCarregar2.data.length ;i++){
                var strObs="";
                var dt_inicio_pausa_falta="";
                var ds_colaborador_falta="";
                var ds_lead_falta="";
                //FALTA

                //if(arrCarregar2.data[i]['dt_escala']==$("#dt_apontamento").val()){
                    if(arrCarregar2.data[i]['obs_falta']!=null){
                        strObs = arrCarregar2.data[i]['obs_falta'];
                    }
                    else{
                        strObs = "";
                    }
                    
                    
                    
                    if(arrCarregar2.data[i]['dt_escala']!=null){
                        dt_inicio_pausa_falta = arrCarregar2.data[i]['dt_escala'];
                    }
                    else{
                        dt_inicio_pausa_falta = "";
                    }
                    if(arrCarregar2.data[i]['ds_colaborador']!=null){
                        ds_colaborador_falta = arrCarregar2.data[i]['ds_colaborador'];
                    }
                    else{
                        ds_colaborador_falta = "";
                    }
                    if(arrCarregar2.data[i]['ds_lead']!=null){
                        ds_lead_falta = arrCarregar2.data[i]['ds_lead'];
                    }
                    else{
                        ds_lead_falta = "";
                    }
                    
                    

                    tipo_apontamento = "Falta";
                    data_apontamento = dt_inicio_pausa_falta;
                    ds_colaboradores = ds_colaborador_falta;
                    ds_lead_grid = ds_lead_falta;
                    observacao = strObs;
                    dt_cadastro = arrCarregar2.data[i]['dt_cadastro'];
                    usuario_cadastro = arrCarregar2.data[i]['ds_usuario'];

                //}
                if(tipo_apontamento_pk==6|| tipo_apontamento_pk==""){
                    if(tipo_apontamento!=""){
                        strModal+="<tr>";
                        strModal+="<td >";
                        strModal+=tipo_apontamento;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=data_apontamento;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=ds_colaboradores;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=observacao;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=ds_lead_grid;
                        strModal+="</td>";
                        strModal+="</tr>";
                    }
                }
            }
        }
    }
    var objParametros3 = {
        "colaborador_pk": colaborador_pk,
        "dt_ini": dt_apontamento_ini,
        "dt_fim": dt_apontamento_fim,
        "leads_pk": leads_pk
    };         

    var arrCarregar3 = carregarController("agenda_colaborador_pausa", "listarHoraExtraRel", objParametros3);
   
    if (arrCarregar3.result == 'success'){
        var tipo_apontamento = "";
        var data_apontamento = "";
        var observacao = "";
        var ds_colaboradores = "";
        var ds_lead_grid = "";
        var dt_cadastro = "";
        var usuario_cadastro = "";


        if(arrCarregar3.data.length > 0){
            for(i=0; i < arrCarregar3.data.length ;i++){
                
                var strObs="";
                var dt_inicio_pausa_hr_extra="";
                var ds_colaborador_hr_extra="";
                var ds_lead_hr_extra="";
                
                if(arrCarregar3.data[i]['hr_extra_ini']!=""){


                    if(arrCarregar3.data[i]['obs']!=null){
                        strObs = arrCarregar3.data[i]['obs'];
                    }
                    else{
                        strObs = "";
                    }
                    
                    
                    if(arrCarregar3.data[i]['dt_escala']!=null){
                        dt_inicio_pausa_hr_extra = arrCarregar3.data[i]['dt_escala'];
                    }
                    else{
                        dt_inicio_pausa_hr_extra = "";
                    }
                    if(arrCarregar3.data[i]['ds_colaborador']!=null){
                        ds_colaborador_hr_extra = arrCarregar3.data[i]['ds_colaborador'];
                    }
                    else{
                        ds_colaborador_hr_extra = "";
                    }
                    if(arrCarregar3.data[i]['ds_lead']!=null){
                        ds_lead_hr_extra = arrCarregar3.data[i]['ds_lead'];
                    }
                    else{
                        ds_lead_hr_extra = "";
                    }
                    
                    
                    
                    tipo_apontamento = "Hora Extra";
                    data_apontamento = dt_inicio_pausa_hr_extra;
                    ds_colaboradores = ds_colaborador_hr_extra;
                    ds_lead_grid = ds_lead_hr_extra;
                    observacao = strObs;
                    dt_cadastro = arrCarregar3.data[i]['dt_cadastro'];
                    usuario_cadastro = arrCarregar3.data[i]['ds_usuario'];
                }
                
                if(tipo_apontamento_pk==7|| tipo_apontamento_pk==""){
                    if(tipo_apontamento!=""){
                        strModal+="<tr>";
                        strModal+="<td >";
                        strModal+=tipo_apontamento;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=data_apontamento;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=ds_colaboradores;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=observacao;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=ds_lead_grid;
                        strModal+="</td>";
                        strModal+="</tr>";
                    }
                }
            }
        }
    }
    var objParametros4 = {
        "colaborador_pk": colaborador_pk,
        "dt_ini": dt_apontamento_ini,
        "dt_fim": dt_apontamento_fim,
        "leads_pk": leads_pk
    };         

    var arrCarregar4 = carregarController("agenda_colaborador_pausa", "listarPontoRel", objParametros4);
    
    if (arrCarregar4.result == 'success'){
        var tipo_apontamento = "";
        var data_apontamento = "";
        var observacao = "";
        var ds_colaboradores = "";
        var ds_lead_grid = "";
        var dt_cadastro = "";
        var usuario_cadastro = "";


        if(arrCarregar4.data.length > 0){
            for(i=0; i < arrCarregar4.data.length ;i++){
                var dt_inicio_pausa_ponto="";
                var ds_colaborador_ponto="";
                var ds_lead_ponto="";



                if(arrCarregar4.data[i]['dt_hora_ponto']!=null){
                    dt_inicio_pausa_ponto = arrCarregar4.data[i]['dt_hora_ponto'];
                }
                else{
                    dt_inicio_pausa_ponto = "";
                }
                if(arrCarregar4.data[i]['ds_colaborador']!=null){
                    ds_colaborador_ponto = arrCarregar4.data[i]['ds_colaborador'];
                }
                else{
                    ds_colaborador_ponto = "";
                }
                if(arrCarregar4.data[i]['ds_lead']!=null){
                    ds_lead_ponto = arrCarregar4.data[i]['ds_lead'];
                }
                else{
                    ds_lead_ponto = "";
                }
            
            
            
            //for(i=0; i < arrCarregar4.data.length ;i++){
                tipo_apontamento = "Ponto";
                data_apontamento = dt_inicio_pausa_ponto;
                ds_colaboradores = ds_colaborador_ponto;
                ds_lead_grid = ds_lead_ponto;
                observacao = "";
                dt_cadastro = arrCarregar4.data[i]['dt_cadastro'];
                usuario_cadastro = arrCarregar4.data[i]['ds_usuario'];
                
                
                
                
                if(tipo_apontamento_pk==8|| tipo_apontamento_pk==""){
                    if(tipo_apontamento!=""){
                        strModal+="<tr>";
                        strModal+="<td >";
                        strModal+=tipo_apontamento;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=data_apontamento;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=ds_colaboradores;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=observacao;
                        strModal+="</td>";
                        strModal+="<td>";
                        strModal+=ds_lead_grid;
                        strModal+="</td>";
                        strModal+="</tr>";
                    }
                }
            }
        }
    }
    
    
    
    strModal+="</tbody>";
    strModal+="</table>";
    strModal+="</div>";
    strModal+="</div>";
    
    
    $("#grid").append(strModal);
     
    
    
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

    sendPost("rel_apontamento_colaborador_res_form.php", {token: token});
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





function fcHistoricoApontamento(){
    
    
    
}



$(document).ready(function(){    
    $(document).on('click', '#cmdCancelar', fcCancelar);
    $(document).on('click', '#cmdExport', fcExport);
     
    //fcCarregarColaborador();
 
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
    
   $("#ds_colaborador").text(ds_colaborador);
   $("#ds_tipo_apontamento").text(ds_tipo_apontamento);
   $("#ds_lead").text(ds_lead);
    
    $("#dt_emissao").text(today);
    $("#dt_ini").text(dt_apontamento_ini);
    $("#dt_fim").text(dt_apontamento_fim);
 
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
    $("#loader").hide();
    $("#exibir").show();

});


