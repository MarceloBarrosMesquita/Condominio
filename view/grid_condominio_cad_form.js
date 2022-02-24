var tblEscala;
var tblGridDados;
var tabela  ;

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();  

if(dd<10) {
    dd = '0'+dd
} 
if(mm<10) {
    mm = '0'+mm
}   
var dtAtual = dd+'/'+mm+'/'+yyyy;
function fcCarregar(){   

    fcLimparVariaveisSemana();
    
    fcCarregarDiaSemanaEMesGrid();
    //CARREGA AS DATAS DAS SEMANAS
    var DTsemana1 = fcCarregarDataSemana();  
   
    //CARREGA AS VISITAS POS SEMANA
    //fcCarregarSemana();
}
function fcCarregarDataSemana(){ 
    
   
    
    var data = new Date();

    // Guarda cada pedaço em uma variável
    var dia     = data.getDate();           // 1-31
    var dia_sem = data.getDay();            // 0-6 (zero=domingo)
    var mes     = data.getMonth();          // 0-11 (zero=janeiro)
    var ano4    = data.getFullYear();       // 4 dígitos
   
    var dia_fim = 7 - (dia_sem+1);
    var primeiroDia = "";
    var ultimoDia = "";
    if($("#intSemana").val()==1){
         primeiroDia = new Date("0"+ano4, (mes), (dia-dia_sem));
         ultimoDia = new Date(ano4, (mes), (dia + dia_fim));
    }
    else if($("#intMes").val()==1){
         primeiroDia = new Date("0"+$("#ds_ano").val(), ($("#ic_mes").val()-1), 1);
         ultimoDia = new Date($("#ds_ano").val(), $("#ic_mes").val(), 0);
    }
    else{
         primeiroDia = new Date("0"+$("#ds_ano").val(), ($("#ic_mes").val()-1), 1);
         ultimoDia = new Date($("#ds_ano").val(), $("#ic_mes").val(), 0);
    }
   
    
    var dd = primeiroDia.getDate();        
    var mm = primeiroDia.getMonth()+1; //January is 0!   
    var yyyy = primeiroDia.getFullYear();
    
    var countUltDia = ultimoDia.getDate();
    
    
    var nova_v_dt_agenda = dd +"/"+mm+"/"+yyyy;
    
    
    
    for(i=(dd-1);i<countUltDia;i++){

        if(nova_v_dt_agenda !=""){
            
            var ArrData = nova_v_dt_agenda.split("/");
            //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
            //0 dia; 1 mes; 2 ano
            
            var dt_semana = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
            if(dt_semana.getDate()< 10){
                var dia = "0"+dt_semana.getDate();
            }
            else{
                var dia = dt_semana.getDate();
            }
            
            
            if(dt_semana.getDay()==0){
                if(dtAtual==nova_v_dt_agenda){
                        $(".dia_mes"+i).html(dia).css("color", "blue");
                    }
                    else{
                        //alert(nova_v_dt_agenda);
                        $(".dia_mes"+i).html(dia).css("fontSize", "10");
                    } 
                $(".dia_semana"+i).html("Dom").css("fontSize", "10");


           }else if(dt_semana.getDay()==1){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html(dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html(dia).css("fontSize", "10");
                } 
                $(".dia_semana"+i).html("Seg").css("fontSize", "10");


           }else if(dt_semana.getDay()==2){
               
               if(dtAtual==nova_v_dt_agenda){

                    $(".dia_mes"+i).html(dia).css("color", "blue");
                }
                else{
                    
                    $(".dia_mes"+i).html(dia).css("fontSize", "10")
                } 
                $(".dia_semana"+i).html("Ter").css("fontSize", "10");

           }else if(dt_semana.getDay()==3){
               
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html(dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html(dia).css("fontSize", "10")
                } 
                $(".dia_semana"+i).html("Qua").css("fontSize", "10");


           }else if(dt_semana.getDay()==4){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html(dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html(dia).css("fontSize", "10")
                } 
               $(".dia_semana"+i).html("Qui").css("fontSize", "10");

           } else if(dt_semana.getDay()==5){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html(dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html(dia).css("fontSize", "10")
                } 
                $(".dia_semana"+i).html("Sex").css("fontSize", "10")

           }else if(dt_semana.getDay()==6){
               if(dtAtual==nova_v_dt_agenda){
                $(".dia_mes"+i).html(dia).css("color", "blue");
            }
            else{
                $(".dia_mes"+i).html(dia).css("fontSize", "10")
            } 
            $(".dia_semana"+i).html("Sab").css("fontSize", "10")
           }  

                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");
                
                
                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);
                 
                var nova_v_dt_agenda = 0;
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
                nova_v_dt_agenda = dia+"/"+mes+"/"+ano;
 
            
        }
       
    }
    return (nova_v_dt_agenda);  
    
}
function fcCarregarDiaSemanaEMesGrid(){
    

    var data = new Date();

    // Guarda cada pedaço em uma variável
    var dia     = data.getDate();           // 1-31
    var dia_sem = data.getDay();            // 0-6 (zero=domingo)
    var mes     = data.getMonth();          // 0-11 (zero=janeiro)
    var ano4    = data.getFullYear();       // 4 dígitos
   
    var dia_fim = 7 - (dia_sem+1);
    
    if($("#intSemana").val()==1){
         primeiroDia = new Date("0"+ano4, (mes), (dia-dia_sem));
         ultimoDia = new Date(ano4, (mes), (dia + dia_fim));
    }
    else if($("#intMes").val()==1){
         primeiroDia = new Date("0"+$("#ds_ano").val(), ($("#ic_mes").val()-1), 1);
         ultimoDia = new Date($("#ds_ano").val(), $("#ic_mes").val(), 0);
    }
    else{
         primeiroDia = new Date("0"+$("#ds_ano").val(), ($("#ic_mes").val()-1), 1);
         ultimoDia = new Date($("#ds_ano").val(), $("#ic_mes").val(), 0);
    }
    
    
    var ddi = primeiroDia.getDate();        
    var mmi = primeiroDia.getMonth()+1; //January is 0!   
    var yyyyi = primeiroDia.getFullYear();
    
    var ddf = ultimoDia.getDate();        
    var mmf = ultimoDia.getMonth()+1; //January is 0!   
    var yyyyf = ultimoDia.getFullYear();
        var dia_a = "";
    if(ddi<10){
        dia_a = "0"+ddi;
    }
    else{
        dia_a = ddi;
    }
    var mes_a = "";
    if(mmi<10){
        mes_a = "0"+mmi;
    }
    else{
        mes_a = mmi;
    }
    var nova_v_dt_agenda = dia_a+"/"+mes_a+"/"+yyyyi;
    
    var dt_agenda = dia_a+"/"+mes_a+"/"+yyyyi;
    var nova_v_dt_agenda_fim = ddf+"/"+mmf+"/"+yyyyf;
    
    
    var countUltDia = ultimoDia.getDate();
            
    var strRetorno = "";

    strRetorno+="<div class='row'><div class='col-md-12'>";
    strRetorno+="<table id='tabela' class='table table-striped table-bordered tblResultado' style='width:100%' id='tblResultado' >";
    strRetorno+="<thead><tr>";
    strRetorno+="   <td><input type='text' class='form-control' style='min-width:100px;'  id='txtColaborador' /></td>";
    strRetorno+="   <td><input type='text' class='form-control' style='min-width:80px;'  id='txtRe' /></td>";
    strRetorno+="   <td><input type='text' class='form-control' style='min-width:130px;' id='txtServio' /></td>";
    strRetorno+="   <td><input type='text' class='form-control' style='min-width:45px;'  id='txtEscala' /></td>";
    for(i=(ddi-1);i<countUltDia;i++){
        strRetorno+="<td align='center'><b><div class='dia_semana"+i+"'></b></td>";
    }
    strRetorno+="</tr>";
    strRetorno+="<tr>";
    strRetorno+="<td align='center'><font style='font-size: 10px'><b>Colaborador</b></font></td>";
    strRetorno+="<td align='center'><font style='font-size: 10px'><b>R.E</b></font></td>";
    strRetorno+="<td align='center'><font style='font-size: 10px'><b>Serviço</b></font></td>";
    strRetorno+="<td align='center'><font style='font-size: 10px'><b>Escala</b></font></td>";
    
    for(i=(ddi-1);i<countUltDia;i++){
        strRetorno+="<td align='center'><b><div class='dia_mes"+i+"'></b></td>";
    }
    strRetorno+="</tr>";
    strRetorno+="</thead>";
    strRetorno+="<tbody>";
    var objParametros1 = {
            "leads_pk": leads_pk,
            "dt_agenda": nova_v_dt_agenda,
            "dt_agenda_fim": nova_v_dt_agenda_fim,
            //"dia_semana": i
        };         

        var arrCarregar1 = carregarController("agenda_colaborador_padrao", "listarColaboradorAgendaData", objParametros1); 
       
        if (arrCarregar1.result == 'success'){
            
            
            for(p=0; p < arrCarregar1.data.length ;p++){                
                strRetorno+="<tr>";
                strRetorno+="<th><font style='font-size: 8px'>"+arrCarregar1.data[p]['t_ds_colaborador']+"</font></th>";
                strRetorno+="<th><font style='font-size: 10px'>"+arrCarregar1.data[p]['t_ds_re']+"</font></th>";
                strRetorno+="<th><font style='font-size: 8px'>"+arrCarregar1.data[p]['t_ds_produto_servico']+"</font></th>";
                strRetorno+="<th><font style='font-size: 10px'>"+arrCarregar1.data[p]['t_n_qtde_dias_semana']+"</font></th>";
                
                var objParametrosCores = {
                    "colaborador_pk": arrCarregar1.data[p]['t_colaborador_pk'],
                    "dt_agenda": nova_v_dt_agenda,
                    "dt_agenda_fim": nova_v_dt_agenda_fim,
                    "leads_pk": leads_pk
                        //"dia_semana": i
                };         

                var arrCarregarCores = carregarController("agenda_colaborador_pausa", "listarCores", objParametrosCores);
           
                
                        
                var objParametros = {
                    "leads_pk": leads_pk,
                    "dt_agenda": nova_v_dt_agenda,
                    "dt_agenda_fim": nova_v_dt_agenda_fim,
                    "colaborador_pk": arrCarregar1.data[p]['t_colaborador_pk']
                };         

                var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaLeadDataGrid", objParametros);  
                
                if (arrCarregar.result == 'success'){
                    if(arrCarregar.data.length > 0){
                        for(j=0; j < arrCarregar.data.length ;j++){
                           
                            var hr_turno_dom = "";
                            if(arrCarregar.data[j]['t_hr_turno_dom']!=null){
                                hr_turno_dom = arrCarregar.data[j]['t_hr_turno_dom'];
                            }
                            var hr_turno_seg = "";
                            if(arrCarregar.data[j]['t_hr_turno_seg']!=null){
                                hr_turno_seg = arrCarregar.data[j]['t_hr_turno_seg'];
                            }
                            var hr_turno_ter = "";
                            if(arrCarregar.data[j]['t_hr_turno_ter']!=null){
                                hr_turno_ter = arrCarregar.data[j]['t_hr_turno_ter'];
                            }
                            var hr_turno_qua = "";
                            if(arrCarregar.data[j]['t_hr_turno_qua']!=null){
                                hr_turno_qua = arrCarregar.data[j]['t_hr_turno_qua'];
                            }
                            var hr_turno_qui = "";
                            if(arrCarregar.data[j]['t_hr_turno_qui']!=null){
                                hr_turno_qui = arrCarregar.data[j]['t_hr_turno_qui'];
                            }
                            var hr_turno_sex = ""
                            if(arrCarregar.data[j]['t_hr_turno_sex']!=null){
                                hr_turno_sex = arrCarregar.data[j]['t_hr_turno_sex'];
                            }
                            var hr_turno_sab = ""
                            if(arrCarregar.data[j]['t_hr_turno_sab']!=null){
                                hr_turno_sab = arrCarregar.data[j]['t_hr_turno_sab'];
                            }

                            var hr_turno_dom_saida = "";
                            if(arrCarregar.data[j]['t_hr_turno_dom_saida']!=null){
                                hr_turno_dom_saida = arrCarregar.data[j]['t_hr_turno_dom_saida'];
                            }
                            var hr_turno_seg_saida = "";
                            if(arrCarregar.data[j]['t_hr_turno_seg_saida']!=null){
                                hr_turno_seg_saida = arrCarregar.data[j]['t_hr_turno_seg_saida'];
                            }
                            var hr_turno_ter_saida = "";
                            if(arrCarregar.data[j]['t_hr_turno_ter_saida']!=null){
                                hr_turno_ter_saida = arrCarregar.data[j]['t_hr_turno_ter_saida'];
                            }
                            var hr_turno_qua_saida = "";
                            if(arrCarregar.data[j]['t_hr_turno_qua_saida']!=null){
                                hr_turno_qua_saida = arrCarregar.data[j]['t_hr_turno_qua_saida'];
                            }
                            var hr_turno_qui_saida = "";
                            if(arrCarregar.data[j]['t_hr_turno_qui_saida']!=null){
                                hr_turno_qui_saida = arrCarregar.data[j]['t_hr_turno_qui_saida'];
                            }
                            var hr_turno_sex_saida = ""
                            if(arrCarregar.data[j]['t_hr_turno_sex_saida']!=null){
                                hr_turno_sex_saida = arrCarregar.data[j]['t_hr_turno_sex_saida'];
                            }
                            var hr_turno_sab_saida = ""
                            if(arrCarregar.data[j]['t_hr_turno_sab_saida']!=null){
                                hr_turno_sab_saida = arrCarregar.data[j]['t_hr_turno_sab_saida'];
                            }
                            
                             var dt_ini_agenda = arrCarregar.data[j]['t_dt_inicio_agenda'];

                             // Precisamos quebrar a string para retornar cada parte
                             var dataSplit = dt_ini_agenda.split('/');

                             var day = dataSplit[0]; // 15
                             var month = dataSplit[1]; // 04
                             var year = dataSplit[2]; // 2019

                             // Agora podemos inicializar o objeto Date, lembrando que o mês começa em 0, então fazemos -1.
                             var data_inicio_da_agenda = new Date(year, month - 1, day);

                           
                            var intInverter = 1;
                            var QtdeColaboradores = 1;
                            for(i=(ddi-1);i<countUltDia;i++){
                               
                                var strBackGround = "";
                                var strDiaFolga = "";
                                var strFontColor = "";
                                strDiaFolga = "Folga";
                                strFontColor = "red";
                                var dt_for_agenda = dt_agenda;

                                 // Precisamos quebrar a string para retornar cada parte
                                 var dataSplitFor = dt_for_agenda.split('/');

                                 var dayFor = dataSplitFor[0]; // 15
                                 var monthFor = dataSplitFor[1]; // 04
                                 var yearFor = dataSplitFor[2]; // 2019

                                // Agora podemos inicializar o objeto Date, lembrando que o mês começa em 0, então fazemos -1.
                                var data_for_agenda = new Date(yearFor, monthFor - 1, dayFor);
                                                
                               if(data_inicio_da_agenda <= data_for_agenda){ 

                                    if (arrCarregarCores.result == 'success'){
                                        if(arrCarregarCores.data.length > 0){
                                            for(c=0; c < arrCarregarCores.data.length ;c++){
                                                //PONTO
                                                if(arrCarregarCores.data[c]['dt_hr_ponto']==dt_agenda){
                                                     strBackGround = "green";

                                                }
                                                //FALTA
                                                if(arrCarregarCores.data[c]['dt_escala']==dt_agenda){
                                                    strBackGround = "orange";

                                                }
                                                //TROCA COLABORADOR
                                                if(arrCarregarCores.data[c]['dt_inicio_pausa']==dt_agenda && arrCarregarCores.data[c]['motivos_pausas_pk']!=null){
                                                    strBackGround = "yellow";

                                                }
                                                //EXCLUSAO
                                                if(arrCarregarCores.data[c]['dt_inicio_pausa']==dt_agenda && arrCarregarCores.data[c]['motivo_exclusao_pk']!=null){
                                                    strBackGround = "salmon";

                                                }
                                                //REMOVER FOLGA
                                                if(arrCarregarCores.data[c]['dt_inicio_pausa']==dt_agenda && arrCarregarCores.data[c]['motivo_exclusao_pk']==null && arrCarregarCores.data[c]['motivos_pausas_pk']==null){
                                                    
                                                   strDiaFolga = "("+arrCarregarCores.data[c]['ds_agenda_colaborador_pausa']+")";
                                                   strFontColor = "blue";
                                                   strBackGround = "#f2f2f2";

                                                }
                                                
                                                 //ATRIBUIR FOLGA
                                                if(arrCarregarCores.data[c]['dt_inicio_pausa']==dt_agenda && arrCarregarCores.data[c]['motivo_folga_pk']!=null){
                                                   
                                                    strDiaFolga = "Folga";
                                                    strFontColor = "red";
                                                    strBackGround = "#aacaff";
                                                }
                                                
                                                
                                            }
                                        }
                                    }
                                   
                                   var ArrData = dt_agenda.split("/");
                                   //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
                                   //0 dia; 1 mes; 2 ano

                                   var dt_semana = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
                                  //DOMINGO
                                   if(dt_semana.getDay()==0){
                                       
                                       //Escala de trabalho
                                       //TRABALHANDO
                                        if(arrCarregar.data[j]['t_ic_dom']==1){
                                          
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                                intInverter = 0 + intInverter;
                                                QtdeColaboradores = 0 + QtdeColaboradores;
                                               if (intInverter % 2 == 0) {
                                                   
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                       
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                       
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+dt_agenda+'"'+",1,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>("+strDiaFolga+")</p></font></a><br>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }
                                               else{
                                                   
                                                   if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                    
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+dt_agenda+'"'+",1,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>("+strDiaFolga+")</p></font></a><br>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                               
                                                if(strBackGround=="#aacaff"){
                                                    
                                                    strRetorno+="<th  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                    //strRetorno+="<font size=2 color=red >Folga</font>";
                                                    strRetorno+="</th>";
                                               }
                                               else{
                                                   strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                               }
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_dom_folga']==1){ 
                                            
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                       
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                       
                                                        strRetorno+="<th class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+dt_agenda+'"'+",1,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red><div id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>("+strDiaFolga+")</div></font></a><br>";
                                                        
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                      
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                    
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+dt_agenda+'"'+",1,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>("+strDiaFolga+")</p></font></a><br>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                        
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_dom+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                           
                                            if(strBackGround=="#f2f2f2"){
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                           }
                                            else if(strBackGround==""){
                                                 strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>"; 
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+dt_agenda+'"'+",1,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red><div id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>("+strDiaFolga+")</div></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        }  
                                    //SEGUNDA    
                                   }
                                   else if(dt_semana.getDay()==1){      
                                       //TRABALHANDO
                                       
                                        if(arrCarregar.data[j]['t_ic_seg']==1){
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                      
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                      
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+dt_agenda+'"'+",2,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                        
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }
                                               else{
                                                   if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                       
                                                        strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_seg+")</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_seg+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                                if(strBackGround=="#aacaff"){
                                                    
                                                    strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                    //strRetorno+="<font size=2 color=red >Folga</font>";
                                                    strRetorno+="</th>";
                                               }
                                               else{
                                                   strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_seg+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                               }
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_seg_folga']==1){   
                                            
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 0) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+dt_agenda+'"'+",2,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }
                                               else{
                                                   if(strBackGround=="#aacaff"){
                                                      
                                                        strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                       
                                                        strRetorno+="<th  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_seg+")</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_seg+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_seg+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                            if(strBackGround=="#f2f2f2"){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                           }
                                            else if(strBackGround==""){
                                                 strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>("+strDiaFolga+")</p></font></a><br>";
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+dt_agenda+'"'+",2,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>("+strDiaFolga+")</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        }  
                                     //TERÇA   
                                    }else if(dt_semana.getDay()==2){
                                        //TRABALHANDO
                                        if(arrCarregar.data[j]['t_ic_ter']==1){
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 0) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+dt_agenda+'"'+",3,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_ter+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+dt_agenda+'"'+",3,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_ter+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                               
                                               if(strBackGround=="#aacaff"){
                                                    strRetorno+="<th class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></p></font></a><br>";
                                                    //strRetorno+="<font size=2 color=red >Folga</font>";
                                                    strRetorno+="</th>";
                                               }else{
                                                   strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_ter+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                               }
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_ter_folga']==1){                                               
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+dt_agenda+'"'+",3,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   
                                                    strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_ter+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                                    
                                               }
                                           }
                                           else{
                                               if(strBackGround=="#aacaff"){
                                                    strRetorno+="<th class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                    //strRetorno+="<font size=2 color=red >Folga</font>";
                                                    strRetorno+="</th>";
                                               }
                                               else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_ter+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+dt_agenda+'"'+",3,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                }
                                                else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_ter+")</p></font></a><br>";
                                                 strRetorno+="</th>";
                                               }
                                               
                                                
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                            if(strBackGround=="#f2f2f2"){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                           }
                                            else if(strBackGround==""){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+dt_agenda+'"'+",3,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        } 
                                        
                                        
                                    //QUARTA    
                                   }else if(dt_semana.getDay()==3){
                                        if(arrCarregar.data[j]['t_ic_qua']==1){
                                            
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+dt_agenda+'"'+",4,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qua+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+dt_agenda+'"'+",4,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qua+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                               
                                                if(strBackGround=="#aacaff"){
                                                       
                                                    strRetorno+="<th class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                    //strRetorno+="<font size=2 color=red >Folga</font>";
                                                    strRetorno+="</th>";
                                               }
                                               else{
                                                    strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qua+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                               }
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_qua_folga']==1){ 
                                            
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               
                                               if (intInverter % 2 == 0) {
                                                  
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                       
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+dt_agenda+'"'+",4,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }
                                               else{
                                                   if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qua+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+dt_agenda+'"'+",4,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qua+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                               }
                                           }
                                           else{
                                             
                                                    strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qua+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                                
                                                
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                            if(strBackGround=="#f2f2f2"){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                           }
                                            else if(strBackGround==""){
                                                 strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+dt_agenda+'"'+",4,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        }
                                    //QUINTA
                                   }else if(dt_semana.getDay()==4){
                                        if(arrCarregar.data[j]['t_ic_qui']==1){
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 0) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+dt_agenda+'"'+",5,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   if(strBackGround=="#aacaff"){
                                                       
                                                        strRetorno+="<th class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qui+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+dt_agenda+'"'+",5,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qui+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                                    
                                               }
                                           }
                                           else{
                                               if(strBackGround=="#aacaff"){
                                                    strRetorno+="<th class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                    //strRetorno+="<font size=2 color=red >Folga</font>";
                                                    strRetorno+="</th>";
                                               }
                                               else{
                                                    strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                    strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qui+")</p></font></a><br>";
                                                    strRetorno+="</th>";
                                                }
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_qui_folga']==1){                                               
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+dt_agenda+'"'+",5,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                    if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                    }
                                                    else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qui+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+dt_agenda+'"'+",5,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    else{
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qui+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                    }
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_qui+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                            if(strBackGround=="#f2f2f2"){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                           }
                                            else if(strBackGround==""){
                                                 strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+dt_agenda+'"'+",5,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        }
                                        
                                    //SEXTA
                                   } else if(dt_semana.getDay()==5){
                                       if(arrCarregar.data[j]['t_ic_sex']==1){
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+dt_agenda+'"'+",6,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                    if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                    }
                                                    else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sex+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+dt_agenda+'"'+",6,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    else{
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sex+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                    }
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sex+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_sex_folga']==1){                                               
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 0) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+dt_agenda+'"'+",6,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                    if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                    }
                                                    else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sex+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+dt_agenda+'"'+",6,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    else{
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sex+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                    }
                                                    
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sex+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                            if(strBackGround=="#f2f2f2"){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                           }
                                            else if(strBackGround==""){
                                                 strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>"; 
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+dt_agenda+'"'+",6,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        }
                                    //SABADO
                                   }else if(dt_semana.getDay()==6){
                                        if(arrCarregar.data[j]['t_ic_sab']==1){
                                           if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 0) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+dt_agenda+'"'+",7,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sab+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+dt_agenda+'"'+",7,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sab+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                    }
                                                    
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sab+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }                                          
                                        }
                                        //FOLGA
                                        else if(arrCarregar.data[j]['t_ic_sab_folga']==1){                                               
                                            if(arrCarregar.data[j]['t_ic_folga_inverter']==1){
                                               if (intInverter % 2 == 1) {
                                                   //FOLGA QUE FOI MARCADA COMO TRABALHADA 
                                                   if(strBackGround=="#f2f2f2"){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+dt_agenda+'"'+",7,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                       strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                    
                                               }else{
                                                   if(strBackGround=="#aacaff"){
                                                        strRetorno+="<th class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";'>"+strDiaFolga+"</p></font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else if(strBackGround==""){
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sab+")</p></font></a><br>";
                                                        //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+dt_agenda+'"'+",7,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                        //strRetorno+="<font size=2 color=red >Folga</font>";
                                                        strRetorno+="</th>";
                                                   }
                                                   else{
                                                        strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                        strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sab+")</p></font></a><br>";
                                                        strRetorno+="</th>";
                                                    }
                                                    
                                               }
                                           }
                                           else{
                                               
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:blue;>("+hr_turno_sab+")</p></font></a><br>";
                                                strRetorno+="</th>";
                                           }
                                        }
                                        //NÃO FOI MARCADO NO CADASTRO DA ESCALA 
                                        else{
                                            if(strBackGround=="#f2f2f2"){
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else if(strBackGround=="#aacaff"){
                                                strRetorno+="<th class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+",1)'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<font size=2 color=red >Folga</font>";
                                                strRetorno+="</th>";
                                            }
                                            else if(strBackGround==""){
                                                 strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+","+'"Folga"'+")'><font size=2 ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                //strRetorno+="<a href='javascript:abrirModalIncluirEscala("+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+dt_agenda+'"'+",7,"+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  color=red>Folga</font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                            else{
                                                strRetorno+="<th bgcolor='"+strBackGround+"' class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'><div  class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                                 strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+","+arrCarregar.data[j]['t_processos_etapas_pk']+","+arrCarregar.data[j]['t_contratos_itens_pk']+")'><font size=2  ><p id='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"' style=color:"+strFontColor+";>"+strDiaFolga+"</p></font></a><br>";
                                                 //strRetorno+="<font size=2 color=red >Folga</font>";
                                                 strRetorno+="</th>";
                                            }
                                        }
                                    }                                
                               }else{                                  
                                   var ArrData = dt_agenda.split("/");
                                   //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
                                   //0 dia; 1 mes; 2 ano

                                   var dt_semana = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);

                                   if(dt_semana.getDay()==0){

                                           strRetorno+="<th><div class='dom"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                          // strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+hr_turno_dom_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",1,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";
                                           
                                   }else if(dt_semana.getDay()==1){
                                       
                                           strRetorno+="<th><div class='seg"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                          // strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+hr_turno_seg_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",2,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";
                                           
                                   }else if(dt_semana.getDay()==2){

                                           strRetorno+="<th><div class='ter"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                          // strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+hr_turno_ter_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",3,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";

                                   }else if(dt_semana.getDay()==3){

                                            strRetorno+="<th><div class='qua"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                          // strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+hr_turno_qua_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",4,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";

                                   }else if(dt_semana.getDay()==4){
                                            strRetorno+="<th><div class='qui"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                           //strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+hr_turno_qui_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",5,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";


                                   } else if(dt_semana.getDay()==5){
                                           strRetorno+="<th><div class='sex"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                           //strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+hr_turno_sex_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",6,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";



                                   }else if(dt_semana.getDay()==6){
                                           strRetorno+="<th><div class='sab"+i+""+arrCarregar1.data[p]['t_colaborador_pk']+"'>";
                                           //strRetorno+="<a href='javascript:fcAbrirModalPainel("+'"'+arrCarregar.data[j]['t_dt_inicio_agenda']+'"'+","+'"'+arrCarregar.data[j]['t_dt_fim_agenda']+'"'+","+'"'+dt_agenda+'"'+","+arrCarregar1.data[p]['t_colaborador_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+'"'+arrCarregar.data[j]['t_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+hr_turno_sab_saida+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+arrCarregar.data[j]['t_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregar.data[j]['t_produto_servico_pk']+","+'"'+arrCarregar1.data[p]['t_ds_colaborador']+'"'+",7,"+'"'+arrCarregar1.data[j]['t_ds_re']+'"'+","+'"'+arrCarregar1.data[j]['t_n_qtde_dias_semana']+'"'+")'><font style='font-size: 12px'>...</font></a><br>";
                                           strRetorno+="</th>";

                                   }
                               }
                                //separa a data 
                                var p_nova_dt_agenda = dt_agenda.split("/");


                                //pega a data que ja passou pelo for 
                                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                                //a cada looping acrescenta mais um dia 
                                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                                var dt_agenda = 0;
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
                                dt_agenda = dia+"/"+mes+"/"+ano;
                                intInverter ++ ;
                            }
                            
                            intInverter = 1 + QtdeColaboradores;
                            QtdeColaboradores++;
                            dt_agenda = nova_v_dt_agenda;
                        }
                        strRetorno+="</tr>";
                    }
                      
                   
                   
                }
                 
            }
            
        }
    
        strRetorno+="</tbody>";
        strRetorno+="</table>";
        strRetorno+="</div>";
        strRetorno+="</div>";
        strRetorno+="<hr><br>";
        //alert(strRetorno);
        $("#grid_dia_mes_semana").append(strRetorno); 
       
        //fcVerificarCor();

}


function fcLimparVariaveisSemana(){
    var ultimoDia = new Date($("#ds_ano").val(), $("#ic_mes").val(), 0);
    $("#grid_dia_mes_semana").empty();
    $("#grid_dia_mes_semana").append("");
    
    var countUltDia = ultimoDia.getDate();
    
    
    for(i=0;i<countUltDia;i++){
        $(".dia_semana"+i).html("");
        $(".dia_mes"+i).html("");
    }
          
}



//----------------------------------------------------------------------------------------MODAL------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function fcAbrirModalPainel(dt_inicio_agenda,dt_fim_agenda,dt_agenda,colaborador_pk,turnos_pk,ds_turno,hr_turno,hr_turno_saida,ds_produto_servico,agenda_pk,contratos_pk,produtos_servicos_pk,ds_colaborador,dia_semana,ds_re,ds_escala,processos_etapas_pk,contratos_itens_pk,ds_folga,int_atribuir_folga){
   
   $("#html_modal_painel").empty();
   $("#html_modal_painel").append("");
    
    var strModal="";
   
    //INCLUIR ESCALA
    if(ds_folga=="Folga"){
        if(int_atribuir_folga!=1){
            var objParametrosPausa = {
                "colaborador_pk": colaborador_pk,
                "dt_agenda": dt_agenda,
                "dt_agenda_fim": dt_agenda,
                "turnos_pk": turnos_pk
                //"dia_semana": i
            };         

            var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarIncluirEscala", objParametrosPausa); 
            //VERIFICA SE TEM ALGUMA ESCALA
            if(arrCarregarPausa.data.length == 0){

                strModal+="<div class='modal fade bd-example-modal-lg' id='janela_modal_painel' tabindex='-1' role='dialog' aria-labelledby='janela_contatosLabel' aria-hidden='true'>";
                strModal+="    <div class='modal-dialog modal-lg' role='document'>";

                strModal+="        <div class='modal-content'>";
                strModal+="            <div class='modal-header'>";
                strModal+="                <h5 class='modal-title' id='janela_contatosLabel'>Painel</h5>";
                strModal+="                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                strModal+="                    <span aria-hidden='true'>&times;</span>";
                strModal+="                </button>";
                strModal+="            </div>";
                strModal+="            <form id='form_contato'>";
                strModal+="                <div class='modal-body'>";
                strModal+="                    <div class='row'>";
                strModal+="                <div class='col-md-12'>           ";                         
                strModal+="                    <div id='ds_re_painel'></div>";
                strModal+="                </div>        ";                                                                  
                strModal+="            </div>";
                strModal+="            <div class='row'>";
                strModal+="                <div class='col-md-12'>        ";                            
                strModal+="                    <div id='ds_colaborador_painel'></div>";
                strModal+="                </div>                   ";                                                       
                strModal+="            </div>";
                strModal+="            <div class='row'>";
                strModal+="                <div class='col-md-12'>      ";                              
                strModal+="                    <div id='ds_funcao_painel'></div>";
                strModal+="                </div>                        ";                                                  
                strModal+="            </div>";
                /*strModal+="            <div class='row'>";
                strModal+="                <div class='col-md-12'>     ";                               
                strModal+="                    <div id='hr_painel'></div>";
                strModal+="                </div>               ";                                                           
                strModal+="            </div>";*/
                strModal+="             <br>";
                strModal+="            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    ";
                strModal+="            <br>";
                strModal+="                    <div class='row'>   ";  

                strModal+="                        <div class='col-md-12 text-center' align='center'>";
                strModal+="                            <a href='javascript:abrirModalIncluirEscala("+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+dt_agenda+'"'+","+dia_semana+","+colaborador_pk+","+agenda_pk+","+processos_etapas_pk+","+contratos_itens_pk+")'><img border='0' src='../img/calendario.png' width='38' height='38'><br><font size='3px'>Incluir Escala</font></a><br>";
                strModal+="                        </div>";            
                strModal+="        </div>";
                 strModal+="            <br>";
                strModal+="                    <div class='row'>   ";             
            
                strModal+="                        <div class='col-md text-center' >";
                strModal+="                            <button type='button' class='btn btn-secondary' id='cmdCancelarModalPainel'>Fechar</button>";
                strModal+="                        </div>";

                strModal+="                     </div>"; 
                strModal+="    </div>";
                strModal+="</div>";


                $("#html_modal_painel").append(strModal);
                $("#ds_re_painel").html("R.E: "+ds_re);
                $("#ds_colaborador_painel").html("Nome Colaborador: "+ds_colaborador);
                $("#ds_funcao_painel").html("Função: "+ds_produto_servico);
                $("#hr_painel").html("Turno / Escala: " +ds_turno+" / "+ hr_turno);


            }
            // SE TIVER VERIFICA SE TEM ALGUM TIPO DE PAUSA, EXCLUSAO OU FOLGA
            else{
                var objParametrosPausa = {
                    "colaborador_pk": colaborador_pk,
                    "dt_agenda": dt_agenda,
                    "dt_agenda_fim": dt_agenda,
                    "turnos_pk": turnos_pk
                    //"dia_semana": i
                };         

                var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 

                if(arrCarregarPausa.data.length > 0){

                    strModal+="<div class='modal fade bd-example-modal-lg' id='janela_modal_painel' tabindex='-1' role='dialog' aria-labelledby='janela_contatosLabel' aria-hidden='true'>";
                    strModal+="    <div class='modal-dialog modal-lg' role='document'>";

                    strModal+="        <div class='modal-content'>";
                    strModal+="            <div class='modal-header'>";
                    strModal+="                <h5 class='modal-title' id='janela_contatosLabel'>Painel</h5>";
                    strModal+="                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    strModal+="                    <span aria-hidden='true'>&times;</span>";
                    strModal+="                </button>";
                    strModal+="            </div>";
                    strModal+="            <form id='form_contato'>";
                    strModal+="                <div class='modal-body'>";
                    strModal+="                    <div class='row'>";
                    strModal+="                <div class='col-md-12'>           ";                         
                    strModal+="                    <div id='ds_re_painel'></div>";
                    strModal+="                </div>        ";                                                                  
                    strModal+="            </div>";
                    strModal+="            <div class='row'>";
                    strModal+="                <div class='col-md-12'>        ";                            
                    strModal+="                    <div id='ds_colaborador_painel'></div>";
                    strModal+="                </div>                   ";                                                       
                    strModal+="            </div>";
                    strModal+="            <div class='row'>";
                    strModal+="                <div class='col-md-12'>      ";                              
                    strModal+="                    <div id='ds_funcao_painel'></div>";
                    strModal+="                </div>                        ";                                                  
                    strModal+="            </div>";
                    strModal+="            <div class='row'>";
                    strModal+="                <div class='col-md-12'>     ";                               
                    strModal+="                    <div id='hr_painel'></div>";
                    strModal+="                </div>               ";                                                           
                    strModal+="            </div>";
                    strModal+="<br>";
                    strModal+="            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    ";
                    strModal+="            <br>";
                    strModal+="                     <br>";
                    strModal+="                    <div class='row'>   ";             
                    strModal+="                        <div class='col-md-5 text-center' align='center'>";
                    strModal+="                            <a href='javascript:fcAbrirModalTarefa("+'"'+dt_agenda+'"'+","+dia_semana+","+agenda_pk+")'><img border='0' src='../img/relatorio.png' width='38' height='38'><br><font size='3px'>Tarefas</font></a><br>";
                    strModal+="                        </div>";
                    strModal+="                        <div class='col-md-5 text-center' align='center'>";
                    strModal+="                            <a href='javascript:abrirModalRetomarEscala("+'"'+ds_turno+'"'+","+'"'+hr_turno_saida+'"'+","+'"'+hr_turno+'"'+","+'"'+dt_agenda+'"'+","+dia_semana+","+colaborador_pk+")'><img border='0' src='../img/relogio.png' width='38' height='38'><br><font size='3px'>Retornar Escala</font></a><br>";
                    strModal+="                        </div>";
                    strModal+="                     </div>";  
                     strModal+="            <br>";
                strModal+="                    <div class='row'>   ";             
            
                strModal+="                        <div class='col-md text-center' >";
                strModal+="                            <button type='button' class='btn btn-secondary' id='cmdCancelarModalPainel'>Fechar</button>";
                strModal+="                        </div>";

                strModal+="                     </div>"; 
                    strModal+="        </div>";
                    strModal+="    </div>";
                    strModal+="</div>";
                    $("#html_modal_painel").append(strModal);

                    $("#ds_funcao_painel").html("Função: "+ds_produto_servico);
                    $("#hr_painel").html("Turno / Escala: " +ds_turno+" / "+ hr_turno);


                    $("#ds_re_painel").html("R.E: "+arrCarregarPausa.data[0]['t_ds_re']);
                    $("#ds_colaborador_painel").html("Nome Colaborador: "+arrCarregarPausa.data[0]['t_ds_colaboradores']);



                }
                else{
                    //CASO CONTRARIO EXIBE O MODAL DE TRABALHO

                    strModal+="<div class='modal fade bd-example-modal-lg' id='janela_modal_painel' tabindex='-1' role='dialog' aria-labelledby='janela_contatosLabel' aria-hidden='true'>";
                    strModal+="    <div class='modal-dialog modal-lg' role='document'>";

                    strModal+="        <div class='modal-content'>";
                    strModal+="            <div class='modal-header'>";
                    strModal+="                <h5 class='modal-title' id='janela_contatosLabel'>Painel</h5>";
                    strModal+="                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    strModal+="                    <span aria-hidden='true'>&times;</span>";
                    strModal+="                </button>";
                    strModal+="            </div>";
                    strModal+="            <form id='form_contato'>";
                    strModal+="                <div class='modal-body'>";
                    strModal+="            <div class='row'>";
                    strModal+="                <div class='col-md-12'>        ";                            
                    strModal+="                    <div id='ds_colaborador_painel'></div>";
                    strModal+="                </div>                   ";                                                       
                    strModal+="            </div>";
                    strModal+="                    <div class='row'>";
                    strModal+="                <div class='col-md-12'>           ";                         
                    strModal+="                    <div id='ds_re_painel'></div>";
                    strModal+="                </div>        ";                                                                  
                    strModal+="            </div>";
                    strModal+="            <div class='row'>";
                    strModal+="                <div class='col-md-12'>     ";                               
                    strModal+="                    <div id='hr_painel'></div>";
                    strModal+="                </div>               ";                                                           
                    strModal+="            </div>";
                    strModal+="            <div class='row'>";
                    strModal+="                <div class='col-md-12'>      ";                              
                    strModal+="                    <div id='ds_funcao_painel'></div>";
                    strModal+="                </div>                        ";                                                  
                    strModal+="            </div>";

                    strModal+="<br>";
                    strModal+="            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    ";
                    strModal+="            <br>";
                    strModal+="                    <div class='row'>   ";             

                    strModal+="                        <div class='col-md text-center' >";
                    strModal+="                            <a href='javascript:abrirModalPonto("+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+hr_turno+'"'+","+'"'+hr_turno_saida+'"'+","+colaborador_pk+","+'"'+dt_agenda+'"'+","+dia_semana+","+'"'+ds_turno+'"'+")'><img border='0' src='../img/ponto.png' width='35' height='40'><br><font size='3px'>Ponto</font></a><br>";
                    strModal+="                        </div>";
                    strModal+="                        <div class='col-md text-center' >";
                    strModal+="                            <a href='javascript:abrirModalFolga("+turnos_pk+","+colaborador_pk+","+'"'+dt_agenda+'"'+","+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+","+dia_semana+")'><img border='0' src='../img/nao_alterar_horario.png' width='38' height='38'><br><font size='3px'>Folga</font></a><br>";
                    strModal+="                        </div>";
                    strModal+="                        <div class='col-md text-center'>";
                    strModal+="                            <a href='javascript:abrirModal("+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_colaborador+'"'+","+'"'+dt_agenda+'"'+","+dia_semana+","+produtos_servicos_pk+","+turnos_pk+","+colaborador_pk+","+contratos_pk+",1,"+'"'+ds_re+'"'+")'><img border='0' src='../img/change_01.png' width='38' height='38'><br><font size='3px'>Troca de Colaborador</font></a><br>";
                    strModal+="                        </div>";

                    strModal+="                        <div class='col-md text-center' >";
                    strModal+="                            <a href='javascript:fcAbrirModalTarefa("+'"'+dt_agenda+'"'+","+dia_semana+","+agenda_pk+","+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+")'><img border='0' src='../img/relatorio.png' width='38' height='38'><br><font size='3px'>Tarefas</font></a><br>";
                    strModal+="                        </div>";
                    strModal+="                        <div class='col-md text-center' >";
                    strModal+="                            <a href='javascript:abrirModalExclusao("+turnos_pk+","+colaborador_pk+","+'"'+dt_agenda+'"'+","+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+","+dia_semana+")'><img border='0' src='../img/excluir.png' width='38' height='38'><br><font size='3px'>Excluir</font></a><br>";
                    strModal+="                        </div>";

                    strModal+="                     </div>"; 
                    strModal+="            <br>";
                    strModal+="                    <div class='row'>   ";             

                    strModal+="                        <div class='col-md text-center' >";
                    strModal+="                            <button type='button' class='btn btn-secondary' id='cmdCancelarModalPainel'>Fechar</button>";
                    strModal+="                        </div>";

                    strModal+="                     </div>"; 
                    strModal+="        </div>";
                    strModal+="    </div>";
                    strModal+="</div>";
                    $("#html_modal_painel").append(strModal);
                    $("#ds_re_painel").html("R.E: "+ds_re);
                    $("#ds_colaborador_painel").html("Nome Colaborador: "+ds_colaborador);
                    $("#ds_funcao_painel").html("Função: "+ds_produto_servico);
                    $("#hr_painel").html("Turno / Escala: " +ds_turno+" / "+ hr_turno);

                }
            }
        }
        
        else{
            //SE ESTIVER DE FOLGA
            strModal+="<div class='modal fade bd-example-modal-lg' id='janela_modal_painel' tabindex='-1' role='dialog' aria-labelledby='janela_contatosLabel' aria-hidden='true'>";
            strModal+="    <div class='modal-dialog modal-lg' role='document'>";

            strModal+="        <div class='modal-content'>";
            strModal+="            <div class='modal-header'>";
            strModal+="                <h5 class='modal-title' id='janela_contatosLabel'>Painel</h5>";
            strModal+="                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            strModal+="                    <span aria-hidden='true'>&times;</span>";
            strModal+="                </button>";
            strModal+="            </div>";
            strModal+="            <form id='form_contato'>";
            strModal+="                <div class='modal-body'>";
            strModal+="                    <div class='row'>";
            strModal+="                <div class='col-md-12'>           ";                         
            strModal+="                    <div id='ds_re_painel'></div>";
            strModal+="                </div>        ";                                                                  
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>        ";                            
            strModal+="                    <div id='ds_colaborador_painel'></div>";
            strModal+="                </div>                   ";                                                       
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>      ";                              
            strModal+="                    <div id='ds_funcao_painel'></div>";
            strModal+="                </div>                        ";                                                  
            strModal+="            </div>";
            /*strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>     ";                               
            strModal+="                    <div id='hr_painel'></div>";
            strModal+="                </div>               ";                                                           
            strModal+="            </div>";*/
            strModal+="             <br>";
            strModal+="            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    ";
            strModal+="            <br>";
            strModal+="                    <div class='row'>   ";  

            strModal+="                        <div class='col-md-12 text-center' align='center'>";
            strModal+="                            <a href='javascript:abrirModalIncluirEscala("+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+dt_agenda+'"'+","+dia_semana+","+colaborador_pk+","+agenda_pk+","+processos_etapas_pk+","+contratos_itens_pk+")'><img border='0' src='../img/calendario.png' width='38' height='38'><br><font size='3px'>Incluir Escala</font></a><br>";
            strModal+="                        </div>";            
            strModal+="        </div>";
            strModal+="            <br>";
            strModal+="                    <div class='row'>   ";             

            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <button type='button' class='btn btn-secondary' id='cmdCancelarModalPainel'>Fechar</button>";
            strModal+="                        </div>";

            strModal+="                     </div>"; 
            strModal+="    </div>";
            strModal+="</div>";


            $("#html_modal_painel").append(strModal);
            $("#ds_re_painel").html("R.E: "+ds_re);
            $("#ds_colaborador_painel").html("Nome Colaborador: "+ds_colaborador);
            $("#ds_funcao_painel").html("Função: "+ds_produto_servico);
            $("#hr_painel").html("Turno / Escala: " +ds_turno+" / "+ hr_turno);
        }
        
    }
    //VERIFICA SE EXISTE ALGUMA PAUSA
    else{
         var objParametrosPausa = {
            "colaborador_pk": colaborador_pk,
            "dt_agenda": dt_agenda,
            "dt_agenda_fim": dt_agenda,
            "turnos_pk": turnos_pk
            //"dia_semana": i
        };         

        var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
       
        if(arrCarregarPausa.data.length > 0){
            
            strModal+="<div class='modal fade bd-example-modal-lg' id='janela_modal_painel' tabindex='-1' role='dialog' aria-labelledby='janela_contatosLabel' aria-hidden='true'>";
            strModal+="    <div class='modal-dialog modal-lg' role='document'>";

            strModal+="        <div class='modal-content'>";
            strModal+="            <div class='modal-header'>";
            strModal+="                <h5 class='modal-title' id='janela_contatosLabel'>Painel</h5>";
            strModal+="                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            strModal+="                    <span aria-hidden='true'>&times;</span>";
            strModal+="                </button>";
            strModal+="            </div>";
            strModal+="            <form id='form_contato'>";
            strModal+="                <div class='modal-body'>";
            strModal+="                    <div class='row'>";
            strModal+="                <div class='col-md-12'>           ";                         
            strModal+="                    <div id='ds_re_painel'></div>";
            strModal+="                </div>        ";                                                                  
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>        ";                            
            strModal+="                    <div id='ds_colaborador_painel'></div>";
            strModal+="                </div>                   ";                                                       
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>      ";                              
            strModal+="                    <div id='ds_funcao_painel'></div>";
            strModal+="                </div>                        ";                                                  
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>     ";                               
            strModal+="                    <div id='hr_painel'></div>";
            strModal+="                </div>               ";                                                           
            strModal+="            </div>";
            strModal+="<br>";
            strModal+="            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    ";
            strModal+="            <br>";
            strModal+="                     <br>";
            strModal+="                    <div class='row'>   ";             
            strModal+="                        <div class='col-md-5 text-center' align='center'>";
            strModal+="                            <a href='javascript:fcAbrirModalTarefa("+'"'+dt_agenda+'"'+","+dia_semana+","+agenda_pk+")'><img border='0' src='../img/relatorio.png' width='38' height='38'><br><font size='3px'>Tarefas</font></a><br>";
            strModal+="                        </div>";
            strModal+="                        <div class='col-md-5 text-center' align='center'>";
            strModal+="                            <a href='javascript:abrirModalRetomarEscala("+'"'+ds_turno+'"'+","+'"'+hr_turno_saida+'"'+","+'"'+hr_turno+'"'+","+'"'+dt_agenda+'"'+","+dia_semana+","+colaborador_pk+")'><img border='0' src='../img/relogio.png' width='38' height='38'><br><font size='3px'>Retornar Escala</font></a><br>";
            strModal+="                        </div>";
            strModal+="                     </div>";  
             strModal+="            <br>";
            strModal+="                    <div class='row'>   ";             

            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <button type='button' class='btn btn-secondary' id='cmdCancelarModalPainel'>Fechar</button>";
            strModal+="                        </div>";

            strModal+="                     </div>"; 
            strModal+="        </div>";
            strModal+="    </div>";
            strModal+="</div>";
            $("#html_modal_painel").append(strModal);
            
            $("#ds_funcao_painel").html("Função: "+ds_produto_servico);
            $("#hr_painel").html("Turno / Escala: " +ds_turno+" / "+ hr_turno);
            

            $("#ds_re_painel").html("R.E: "+arrCarregarPausa.data[0]['t_ds_re']);
            $("#ds_colaborador_painel").html("Nome Colaborador: "+arrCarregarPausa.data[0]['t_ds_colaboradores']);

            

        }
        else{
            
            //CASO CONTRARIO EXIBIR MODAL DE TRABALHO
            strModal+="<div class='modal fade bd-example-modal-lg' id='janela_modal_painel' tabindex='-1' role='dialog' aria-labelledby='janela_contatosLabel' aria-hidden='true'>";
            strModal+="    <div class='modal-dialog modal-lg' role='document'>";

            strModal+="        <div class='modal-content'>";
            strModal+="            <div class='modal-header'>";
            strModal+="                <h5 class='modal-title' id='janela_contatosLabel'>Painel</h5>";
            strModal+="                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            strModal+="                    <span aria-hidden='true'>&times;</span>";
            strModal+="                </button>";
            strModal+="            </div>";
            strModal+="            <form id='form_contato'>";
            strModal+="                <div class='modal-body'>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>        ";                            
            strModal+="                    <div id='ds_colaborador_painel'></div>";
            strModal+="                </div>                   ";                                                       
            strModal+="            </div>";
            strModal+="                    <div class='row'>";
            strModal+="                <div class='col-md-12'>           ";                         
            strModal+="                    <div id='ds_re_painel'></div>";
            strModal+="                </div>        ";                                                                  
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>     ";                               
            strModal+="                    <div id='hr_painel'></div>";
            strModal+="                </div>               ";                                                           
            strModal+="            </div>";
            strModal+="            <div class='row'>";
            strModal+="                <div class='col-md-12'>      ";                              
            strModal+="                    <div id='ds_funcao_painel'></div>";
            strModal+="                </div>                        ";                                                  
            strModal+="            </div>";
            
            strModal+="<br>";
            strModal+="            <hr style='height:1px; border:none; color:#14074F; background-color:#14074F; margin-top: 0px; margin-bottom: 0px;'>    ";
            strModal+="            <br>";
            strModal+="                    <div class='row'>   ";             
            
            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <a href='javascript:abrirModalPonto("+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+hr_turno+'"'+","+'"'+hr_turno_saida+'"'+","+colaborador_pk+","+'"'+dt_agenda+'"'+","+dia_semana+","+'"'+ds_turno+'"'+")'><img border='0' src='../img/ponto.png' width='35' height='40'><br><font size='3px'>Ponto</font></a><br>";
            strModal+="                        </div>";
            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <a href='javascript:abrirModalFolga("+turnos_pk+","+colaborador_pk+","+'"'+dt_agenda+'"'+","+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+","+dia_semana+")'><img border='0' src='../img/nao_alterar_horario.png' width='38' height='38'><br><font size='3px'>Folga</font></a><br>";
            strModal+="                        </div>";
            strModal+="                        <div class='col-md text-center'>";
            strModal+="                            <a href='javascript:abrirModal("+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_colaborador+'"'+","+'"'+dt_agenda+'"'+","+dia_semana+","+produtos_servicos_pk+","+turnos_pk+","+colaborador_pk+","+contratos_pk+",1,"+'"'+ds_re+'"'+")'><img border='0' src='../img/change_01.png' width='38' height='38'><br><font size='3px'>Troca de Colaborador</font></a><br>";
            strModal+="                        </div>";
            
            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <a href='javascript:fcAbrirModalTarefa("+'"'+dt_agenda+'"'+","+dia_semana+","+agenda_pk+","+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+")'><img border='0' src='../img/relatorio.png' width='38' height='38'><br><font size='3px'>Tarefas</font></a><br>";
            strModal+="                        </div>";
            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <a href='javascript:abrirModalExclusao("+turnos_pk+","+colaborador_pk+","+'"'+dt_agenda+'"'+","+'"'+ds_re+'"'+","+'"'+ds_colaborador+'"'+","+'"'+ds_produto_servico+'"'+","+'"'+ds_turno+'"'+","+'"'+hr_turno+'"'+","+dia_semana+")'><img border='0' src='../img/excluir.png' width='38' height='38'><br><font size='3px'>Excluir</font></a><br>";
            strModal+="                        </div>";
            
            strModal+="                     </div>"; 
             strModal+="            <br>";
            strModal+="                    <div class='row'>   ";             

            strModal+="                        <div class='col-md text-center' >";
            strModal+="                            <button type='button' class='btn btn-secondary' id='cmdCancelarModalPainel'>Fechar</button>";
            strModal+="                        </div>";

            strModal+="                     </div>"; 
            strModal+="        </div>";
            strModal+="    </div>";
            strModal+="</div>";
            $("#html_modal_painel").append(strModal);
            $("#ds_re_painel").html("R.E: "+ds_re);
            $("#ds_colaborador_painel").html("Nome Colaborador: "+ds_colaborador);
            $("#ds_funcao_painel").html("Função: "+ds_produto_servico);
            $("#hr_painel").html("Turno / Escala: " +ds_turno+" / "+ hr_turno);
            
        }
    }
    
    
    
    //if(dt_agenda >= dt_inicio_agenda  &&  dt_agenda <= dt_fim_agenda ){
       
        
        
        $("#janela_modal_painel").modal();
    //}
    
}
function fcFecharModalPainel(){
    $("#janela_modal_painel").modal("hide");
}
function fcLimparVariavelExclusao(){
    $("#turnos_exclusao_pk").val("");
    $("#colaborador_exclusao_pk").val("");
    $("#dt_base_exclusao").val("");
    $("#ds_obs_exclusao").val("");
    $("#motivo_exclusao_pk").val("");
    $("#ds_obs_exclusao").val("");
    $("#dia_semana_exclusao").val("");
}
function fcLimparVariavelFolga(){
    $("#turnos_folga_pk").val("");
    $("#colaborador_folga_pk").val("");
    $("#dt_base_folga").val("");
    $("#ds_obs_folga").val("");
    $("#motivo_folga_pk").val("");
    $("#ds_obs_folga").val("");
    $("#dia_semana_folga").val("");
}
function abrirModalExclusao(turnos_pk,colaborador_pk,dt_agenda,ds_re,ds_colaborador,ds_funcao,ds_turno,hr_entrada,dia_semana){
    fcLimparVariavelExclusao();
    $("#ds_re_excluir").html("R.E: "+ds_re);
    $("#ds_colaborador_excluir").html("Nome Colaborador: "+ds_colaborador);
    $("#ds_funcao_excluir").html("Função: "+ds_funcao);
    $("#hr_excluir").html("Turno / Escala: " +ds_turno + hr_entrada);
    $("#turnos_exclusao_pk").val(turnos_pk);
    $("#colaborador_exclusao_pk").val(colaborador_pk);
    $("#dt_base_exclusao").val(dt_agenda);
    $("#dia_semana_exclusao").val(dia_semana);
    $("#modal_exclusao").modal();
}
function abrirModalFolga(turnos_pk,colaborador_pk,dt_agenda,ds_re,ds_colaborador,ds_funcao,ds_turno,hr_entrada,dia_semana){
    fcLimparVariavelFolga();
    $("#ds_re_folga").html("R.E: "+ds_re);
    $("#ds_colaborador_folga").html("Nome Colaborador: "+ds_colaborador);
    $("#ds_funcao_folga").html("Função: "+ds_funcao);
    $("#hr_folga").html("Turno / Escala: " +ds_turno + hr_entrada);
    $("#turnos_folga_pk").val(turnos_pk);
    $("#colaborador_folga_pk").val(colaborador_pk);
    $("#dt_base_folga").val(dt_agenda);
    $("#dia_semana_folga").val(dia_semana);
    $("#modal_folga").modal();
}
function fcDeletarPonto(dt_base,colaborador_pk){
    var objParametros = {
        "pk": "",
        "dt_hora_ponto": dt_base,
        "colaborador_pk": colaborador_pk

    }; 

    var arrEnviar = carregarController("ponto", "excluirColaborador", objParametros);
   
}
function fcDeletarFalta(dt_base,colaborador_pk){
    var objParametros = {
        "pk": "",
        "dt_escala": dt_base,
        "colaborador_pk": colaborador_pk,
        "leads_pk": leads_pk

    }; 

    var arrEnviar = carregarController("colaborador_falta", "excluirColaborador", objParametros);
    

}
function fcDeletarTrocaColaborador(dt_base,colaborador_pk){
    var objParametros = {
        "pk": "",
        "dt_inicio_pausa": dt_base,
        "dt_fim_pausa": dt_base,
        "colaboradores_pk": colaborador_pk

    }; 

    var arrEnviar = carregarController("agenda_colaborador_pausa", "excluirColaboradorTroca", objParametros);

}
function fcDeletarExclusao(dt_base,colaborador_pk){
    var objParametros = {
        "pk": "",
        "dt_inicio_pausa": dt_base,
        "dt_fim_pausa": dt_base,
        "colaboradores_pk": colaborador_pk

    }; 

    var arrEnviar = carregarController("agenda_colaborador_pausa", "excluirColaboradorExclusao", objParametros);

}
function fcDeletarFolga(dt_base,colaborador_pk){
    var objParametros = {
        "pk": "",
        "dt_inicio_pausa": dt_base,
        "dt_fim_pausa": dt_base,
        "colaboradores_pk": colaborador_pk

    }; 

    var arrEnviar = carregarController("agenda_colaborador_pausa", "excluirColaboradorFolga", objParametros);
  
}
function fcDeletarExclusaoNovaEscala(dt_base,colaborador_pk){
    var objParametros = {
        "pk": "",
        "dt_inicio_pausa": dt_base,
        "dt_fim_pausa": dt_base,
        "colaboradores_pk": colaborador_pk

    }; 

    var arrEnviar = carregarController("agenda_colaborador_pausa", "carregarExclusaoNovaEscala", objParametros);
    
}
function fcSalvarExclusao(){
     var ArrData = $("#dt_base_exclusao").val().split("/");
    var data = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
    var objParametros = {
            "pk": "",
            "turnos_pk": $("#turnos_exclusao_pk").val(),
            "obs": $("#obs_ponto").val(),
            "colaboradores_pk": $("#colaborador_exclusao_pk").val(),
            "dt_inicio_pausa": $("#dt_base_exclusao").val(),
            "dt_fim_pausa": $("#dt_base_exclusao").val(),
            "motivo_exclusao_pk": $("#motivo_exclusao_pk").val(),
            "ds_obs_exclusao": $("#ds_obs_exclusao").val(),
            "ds_agenda_colaborador_pausa": "Exclusão",

        }; 

        var arrEnviar = carregarController("agenda_colaborador_pausa", "salvar", objParametros);
     
        if (arrEnviar.result == 'success'){
            fcDeletarPonto($("#dt_base_exclusao").val(),$("#colaborador_exclusao_pk").val());
            fcDeletarFalta($("#dt_base_exclusao").val(),$("#colaborador_exclusao_pk").val());
            fcDeletarTrocaColaborador($("#dt_base_exclusao").val(),$("#colaborador_exclusao_pk").val());
            fcDeletarFolga($("#dt_base_exclusao").val(),$("#colaborador_exclusao_pk").val());
            alert(arrEnviar.message);
            $("#modal_exclusao").modal("hide");
            $("#janela_modal_painel").modal("hide");
            if($("#dia_semana_exclusao").val()==1){
                 $(".dom"+(data.getDate()-1)+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }
             else if($("#dia_semana_exclusao").val()==2){
                  $(".seg"+(data.getDate()-1)+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }
             else if($("#dia_semana_exclusao").val()==3){
                 $(".ter"+(data.getDate()-1)+""+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }
             else if($("#dia_semana_exclusao").val()==4){
                  $(".qua"+(data.getDate()-1)+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }
             else if($("#dia_semana_exclusao").val()==5){
                  $(".qui"+(data.getDate()-1)+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }
             else if($("#dia_semana_exclusao").val()==6){
                  $(".sex"+(data.getDate()-1)+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }
             else if($("#dia_semana_exclusao").val()==7){
                  $(".sab"+(data.getDate()-1)+$("#colaborador_exclusao_pk").val()).css("background-color", "salmon");
             }

        }    
        else{
            alert(arrEnviar.result);
        }
}
function fcSalvarFolga(){
     var ArrData = $("#dt_base_folga").val().split("/");
    var data = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
    var objParametros = {
            "pk": "",
            "turnos_pk": $("#turnos_folga_pk").val(),
            "colaboradores_pk": $("#colaborador_folga_pk").val(),
            "dt_inicio_pausa": $("#dt_base_folga").val(),
            "dt_fim_pausa": $("#dt_base_folga").val(),
            "motivo_folga_pk": $("#motivo_folga_pk").val(),
            "ds_obs_folga": $("#ds_obs_folga").val(),
            "ds_agenda_colaborador_pausa": "Folga"

        }; 

        var arrEnviar = carregarController("agenda_colaborador_pausa", "salvar", objParametros);
       
        if (arrEnviar.result == 'success'){
            fcDeletarPonto($("#dt_base_folga").val(),$("#colaborador_folga_pk").val());
            fcDeletarFalta($("#dt_base_folga").val(),$("#colaborador_folga_pk").val());
            fcDeletarExclusaoNovaEscala($("#dt_base_folga").val(),$("#colaborador_folga_pk").val());
            fcDeletarTrocaColaborador($("#dt_base_folga").val(),$("#colaborador_folga_pk").val());
            fcDeletarExclusao($("#dt_base_folga").val(),$("#colaborador_folga_pk").val());
            
            alert(arrEnviar.message);
            $("#modal_folga").modal("hide");
            $("#janela_modal_painel").modal("hide");
            
            if($("#dia_semana_folga").val()==1){
                document.getElementById("dom"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#dom"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }
             else if($("#dia_semana_folga").val()==2){
                  document.getElementById("seg"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#seg"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }
             else if($("#dia_semana_folga").val()==3){
                document.getElementById("ter"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#ter"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }
             else if($("#dia_semana_folga").val()==4){
                document.getElementById("qua"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#qua"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }
             else if($("#dia_semana_folga").val()==5){
                  document.getElementById("qui"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#qui"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }
             else if($("#dia_semana_folga").val()==6){
                  document.getElementById("sex"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#sex"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }
             else if($("#dia_semana_folga").val()==7){
                  document.getElementById("sab"+(data.getDate()-1)+$("#colaborador_folga_pk").val()).innerHTML = "Folga";
                $("#sab"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "red");
             }

        }    
        else{
            alert(arrEnviar.result);
        }
}

function fcLimparVariavelPonto(){
    $("#ds_re_ponto").html("");
    $("#ds_colaborador_ponto").html("");
    $("#ds_funcao_ponto").html("");
    $("#hr_ponto").html("");
    $("#colaborador_ponto_pk").val("");
    $("#motivo_falta_pk").val("");
    
    $("#hr_entrada_manual").val("");
    $("#obs_ponto").val("");
    $("#dia_semana_ponto").val("");
    $("#dt_escala_ponto").val("");
    $('#ic_hr_sistema').prop('checked', false);
    $('#ic_hr_sistema').prop('disabled', false);
    $('#ic_falta').prop('checked', false);
    $('#ic_falta').prop('disabled', false);
    $('#motivo_falta_pk').prop('disabled', false);
    $('#hr_entrada_manual').prop('disabled', false);
}
function abrirModalPonto(ds_re,ds_colaborador,ds_funcao,hr_entrada,hr_saida,colaborador_pk,dt_agenda,dia_semana,ds_turno){
    
    fcLimparVariavelPonto();
   
    $("#ds_re_ponto").html("R.E: "+ds_re);
    $("#ds_colaborador_ponto").html("Nome Colaborador: "+ds_colaborador);
    $("#ds_funcao_ponto").html("Função: "+ds_funcao);
    $("#hr_ponto").html("Turno / Escala: " +ds_turno + hr_entrada);
    $("#colaborador_ponto_pk").val(colaborador_pk);
    $("#dt_escala_ponto").val(dt_agenda);
    $("#dia_semana_ponto").val(dia_semana);
      
    
    $("#modal_ponto").modal();
}
function fcDesabilitarHrSistema(){
    if($('#ic_hr_sistema').is(":checked")){
        $('#ic_hr_sistema').prop('checked', true);
        $('#hr_entrada_manual').val("");
        $('#hr_entrada_manual').prop('disabled',true);
        $('#motivo_falta_pk').prop('disabled',true);
        $('#ic_falta').prop('disabled',true);
        $('#ic_falta').prop('checked',false);
        
    }
    else {
        $('#ic_hr_sistema').prop('checked', false);
        $('#hr_entrada_manual').prop('disabled',false);
        $('#motivo_falta_pk').prop('disabled',true);
        $('#ic_falta').prop('disabled',false);
        $('#ic_falta').prop('checked',false);
    }
    
    
    
}
function fcDesabilitarFalta(){
    if($('#ic_falta').is(":checked")){
        $('#ic_falta').prop('checked', true);
        $('#hr_entrada_manual').val("");
        $('#hr_entrada_manual').prop('disabled',true);
        $('#motivo_falta_pk').prop('disabled',false);
        $('#ic_hr_sistema').prop('checked', false);
        $('#ic_hr_sistema').prop('disabled', true);
        
    }
    else {
        $('#ic_falta').prop('checked', false);
        $('#hr_entrada_manual').val("");
        $('#hr_entrada_manual').prop('disabled',false);
        $('#motivo_falta_pk').prop('disabled',true);
        $('#ic_hr_sistema').prop('checked', false);
        $('#ic_hr_sistema').prop('disabled', false);
    }
    
    
    
}

function fcSalvarPonto(){
    var ArrData = $("#dt_escala_ponto").val().split("/");
    var data_ponto = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
    
    if($('#ic_falta').is(":checked")){
        var objParametros = {
            "pk": "",
            "motivo_falta_pk": $("#motivo_falta_pk").val(),
            "obs": $("#obs_ponto").val(),
            "colaborador_pk": $("#colaborador_ponto_pk").val(),
            "dt_escala": $("#dt_escala_ponto").val(),
            "leads_pk": leads_pk,

        }; 

        var arrEnviar = carregarController("colaborador_falta", "salvar", objParametros);
        
        if (arrEnviar.result == 'success'){
            fcDeletarPonto($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            fcDeletarExclusao($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            fcDeletarFolga($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            fcDeletarTrocaColaborador($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            alert(arrEnviar.message);
            $("#modal_ponto").modal("hide");
            $("#janela_modal_painel").modal("hide");
            
            if($("#dia_semana_ponto").val()==1){
                 $(".dom"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
             else if($("#dia_semana_ponto").val()==2){
                  $(".seg"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
             else if($("#dia_semana_ponto").val()==3){
                 $(".ter"+(data_ponto.getDate()-1)+""+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
             else if($("#dia_semana_ponto").val()==4){
                  $(".qua"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
             else if($("#dia_semana_ponto").val()==5){
                  $(".qui"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
             else if($("#dia_semana_ponto").val()==6){
                  $(".sex"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
             else if($("#dia_semana_ponto").val()==7){
                  $(".sab"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "orange");
             }
            /*$("#loader").show();
            $("#exibir").hide();
            window.setTimeout(function(){
                fcCarregar();
               $("#loader").hide();
               $("#exibir").show();
            }, 200);*/

        }    
        else{
            alert(arrEnviar.result);
        }
    }else{
        var str_hora = "";
        if($('#ic_hr_sistema').is(":checked")){
            var data = new Date();
            var hora    = data.getHours();          // 0-23
            var min     = data.getMinutes();        // 0-59
            var seg     = data.getSeconds();        // 0-59
            
             str_hora = hora + ':' + min;
        }
        else{
             str_hora = $("#hr_entrada_manual").val()
        }
        
        //Pega o Pin do Colaborador
        var ds_pin = FcBuscarPinColaborador($("#colaborador_ponto_pk").val())
        

        var objParametros = {
            "pk": "",
            "colaborador_pk": $("#colaborador_ponto_pk").val(),
            "dt_hora_ponto": $("#dt_escala_ponto").val(),
            "hr_ponto": str_hora,
            "ds_pin": ds_pin,
            "tipo_ponto_pk": 1,
            "ic_dispositivo": 2
        }; 

        var arrEnviar = carregarController("ponto", "salvar", objParametros);
       
        if (arrEnviar.result == 'success'){
            fcDeletarFalta($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            fcDeletarExclusao($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            fcDeletarFolga($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            fcDeletarTrocaColaborador($("#dt_escala_ponto").val(),$("#colaborador_ponto_pk").val());
            
            alert(arrEnviar.message);
            $("#modal_ponto").modal("hide");
            $("#janela_modal_painel").modal("hide");
            if($("#dia_semana_ponto").val()==1){
                 $(".dom"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "green");
                
             }
             else if($("#dia_semana_ponto").val()==2){
                  $(".seg"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "green");
             }
             else if($("#dia_semana_ponto").val()==3){
                 $(".ter"+(data_ponto.getDate()-1)+""+$("#colaborador_ponto_pk").val()).css("background-color", "green");
             }
             else if($("#dia_semana_ponto").val()==4){
                  $(".qua"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "green");
             }
             else if($("#dia_semana_ponto").val()==5){
                  $(".qui"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "green");
             }
             else if($("#dia_semana_ponto").val()==6){
                  $(".sex"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "green");
             }
             else if($("#dia_semana_ponto").val()==7){
                  $(".sab"+(data_ponto.getDate()-1)+$("#colaborador_ponto_pk").val()).css("background-color", "green");
             }
             
            
            /*$("#loader").show();
            $("#exibir").hide();
            window.setTimeout(function(){
                fcCarregar();
               $("#loader").hide();
               $("#exibir").show();
            }, 200);*/

        }    
        else{
            alert(arrEnviar.result);
        }
    }
}


function fcLimparVariavelColaborador(){

    //$("#ds_colaborador_atual_agenda").html("");
    $("#dt_base_modal").html("");
    $("#dt_base_inclusao_modal").val("");
    $("#dias_semana_inclusao").val("");
    $("#produtos_servicos_pk").val("");
    $("#turnos_pk").val("");
    $("#agenda_contratos_pk").val("");
    $("#colaborador_atual_pk").val("");
    $("#ds_obs").val("");
    $("#dia_semana_troca").val("");
    $("#pausa_pk").val("");
}
function abrirModal(ds_turno,hr_turno,ds_produto_servico,ds_colaborador,dt_agenda,dia_semana,produtos_servicos_pk,turnos_pk,colaborador_atual_pk,contratos_pk,pausa_pk,ds_re){
    
    var arrCarregar = permissao("agenda_colaborador", "ins");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }

    fcLimparVariavelColaborador();
    
    //$("#ds_turno_agenda").html("Turno:  "+ds_turno+" ("+hr_turno+")");
    //$("#ds_servico_agenda").html("Serviço:  "+ds_produto_servico);
    //$("#ds_colaborador_atual_agenda").html("Colaborador Atual:  "+ds_colaborador);
    $("#dt_base_modal").html(dt_agenda);
    $("#dt_base_inclusao_modal").val(dt_agenda);
    $("#dias_semana_inclusao").val(dia_semana);
    $("#produtos_servicos_pk").val(produtos_servicos_pk);
    $("#turnos_pk").val(turnos_pk);
    $("#colaborador_atual_pk").val(colaborador_atual_pk);
    $("#agenda_contratos_pk").val(contratos_pk);
    $("#ds_re_troca").html("R.E: "+ds_re);
    $("#ds_colaborador_troca").html("Nome Colaborador: "+ds_colaborador);
    $("#ds_funcao_troca").html("Função: "+ds_produto_servico);
    $("#hr_troca").html("Turno / Escala: " +ds_turno + hr_turno);
    $("#dt_escala_ponto").val(dt_agenda);
    $("#dia_semana_troca").val(dia_semana);
    if(pausa_pk!=0){
        $("#pausa_pk").val(pausa_pk);
    }
    

    fcCarregarColaboradores();

    fcCarregarMotivoAlteracaoEscala();

    $("#janela_escala").modal();
    
}
function abrirModalRetomarEscala(ds_turno,hr_turno_saida,hr_turno,dt_agenda,dia_semana,colaborador_pk){
    
    var arrCarregar = permissao("agenda_colaborador", "ins");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    if(dia_semana==1){
        $("#ds_dia_semana").html("Domingo");
    }
    else if(dia_semana==2){
        $("#ds_dia_semana").html("Segunda");
    }
    else if(dia_semana==3){
        $("#ds_dia_semana").html("Terça");
    }
    else if(dia_semana==4){
        $("#ds_dia_semana").html("Quarta");
    }
    else if(dia_semana==5){
        $("#ds_dia_semana").html("Quinta");
    }
    else if(dia_semana==6){
        $("#ds_dia_semana").html("Sexta");
    }
    else if(dia_semana==7){
        $("#ds_dia_semana").html("Sabado");
    }
    $("#dt_inicio_inc").val(dt_agenda);
    $("#dt_base_modal_inc").html(dt_agenda);
    $("#ds_turno_inc").html(ds_turno);
    $("#ds_hr_entrada_inc").html(hr_turno);
    $("#ds_hr_saida_inc").html(hr_turno_saida);
    $("#dia_semana_inc").val(dia_semana);
    $("#colaborador_pk_inc").val(colaborador_pk);
    

    $("#janela_retornar_escala").modal();
    
}

function fcIncluirRetomarEscala(){
    var ArrData = $("#dt_inicio_inc").val().split("/");
    var data = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
    
    fcDeletarTrocaColaborador($("#dt_inicio_inc").val(),$("#colaborador_pk_inc").val());
    fcDeletarExclusao($("#dt_inicio_inc").val(),$("#colaborador_pk_inc").val());
    fcDeletarFolga($("#dt_inicio_inc").val(),$("#colaborador_pk_inc").val());

    $("#janela_retornar_escala").modal("hide");
    $("#janela_modal_painel").modal("hide");
    if($("#dia_semana_inc").val()==1){
        $(".dom"+(data.getDate()-1)+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");
        

    }
    else if($("#dia_semana_inc").val()==2){
         $(".seg"+(data.getDate()-1)+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");

    }
    else if($("#dia_semana_inc").val()==3){
        $(".ter"+(data.getDate()-1)+""+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");

    }
    else if($("#dia_semana_inc").val()==4){
         $(".qua"+(data.getDate()-1)+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");

    }
    else if($("#dia_semana_inc").val()==5){
         $(".qui"+(data.getDate()-1)+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");

    }
    else if($("#dia_semana_inc").val()==6){
         $(".sex"+(data.getDate()-1)+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");

    }
    else if($("#dia_semana_inc").val()==7){
         $(".sab"+(data.getDate()-1)+$("#colaborador_pk_inc").val()).css("background-color", "#f2f2f2");

    }
        

    
   
    
}
function abrirModalIncluirEscala(ds_re,ds_colaborador,ds_funcao,dt_agenda,dia_semana,colaborador_pk,agenda_pk,processos_etapas_pk,contratos_itens_pk){
    
    var arrCarregar = permissao("agenda_colaborador", "ins");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    if(dia_semana==1){
        $("#ds_dia_semana_ins").html("Dia Semana: Domingo");
    }
    else if(dia_semana==2){
        $("#ds_dia_semana_ins").html("Dia Semana: Segunda");
    }
    else if(dia_semana==3){
        $("#ds_dia_semana_ins").html("Dia Semana: Terça");
    }
    else if(dia_semana==4){
        $("#ds_dia_semana_ins").html("Dia Semana: Quarta");
    }
    else if(dia_semana==5){
        $("#ds_dia_semana_ins").html("Dia Semana: Quinta");
    }
    else if(dia_semana==6){
        $("#ds_dia_semana_ins").html("Dia Semana: Sexta");
    }
    else if(dia_semana==7){
        $("#ds_dia_semana_ins").html("Dia Semana: Sabado");
    }
    $("#dt_inicio_ins").val(dt_agenda);
    $("#dt_base_modal_ins").html("Dia Atual Escala: "+dt_agenda);
    $("#dia_semana_ins").val(dia_semana);
    $("#colaborador_pk_ins").val(colaborador_pk);
    $("#agenda_pk_ins").val(agenda_pk);
    $("#processos_etapas_pk_ins").val(processos_etapas_pk);
    $("#contratos_itens_pk_ins").val(contratos_itens_pk);
    $("#ds_re_ins").html("R.E: "+ds_re);
    $("#ds_colaborador_ins").html("Nome Colaborador: "+ds_colaborador);
    $("#ds_funcao_ins").html("Função: "+ds_funcao);
    fcCarregarTurno();

    $("#hr_turno_ins").keypress(function(){
       mascara(this,horamask);
    });
    $("#janela_incluir_escala").modal();
    
}

function fcCarregarTurno(){
    
    var objParametros = {
        "pk": ""
    };      
    
    var arrCarregar = carregarController("turno", "listarTodos", objParametros);
    
    carregarComboAjax($("#turnos_pk_ins"), arrCarregar, " ", "pk", "ds_turno");
        
}

function fcIncluirNovaEscala(){
    var ArrData = $("#dt_inicio_ins").val().split("/");
    var data = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
    
        var objParametros = {
            "ds_agenda_colaborador_pausa": $("#hr_turno_ins").val(),
            "turnos_pk": $("#turnos_pk_ins").val(),
            "dt_inicio_pausa": $("#dt_inicio_ins").val(),
            "dt_fim_pausa": $("#dt_inicio_ins").val(),
            "colaboradores_pk": $("#colaborador_pk_ins").val(),
        }; 
     

        var arrEnviar = carregarController("agenda_colaborador_pausa", "salvar", objParametros);
       
        if (arrEnviar.result == 'success'){
            fcDeletarFalta($("#dt_inicio_ins").val(),$("#colaborador_pk_ins").val());
            fcDeletarExclusao($("#dt_inicio_ins").val(),$("#colaborador_pk_ins").val());
            fcDeletarTrocaColaborador($("#dt_inicio_ins").val(),$("#colaborador_pk_ins").val());
            fcDeletarFolga($("#dt_inicio_ins").val(),$("#colaborador_pk_ins").val());
            fcDeletarPonto($("#dt_inicio_ins").val(),$("#colaborador_pk_ins").val());
            
            alert(arrEnviar.message);
            $("#janela_incluir_escala").modal("hide");
            $("#janela_modal_painel").modal("hide");
            
            if($("#dia_semana_ins").val()==1){
                document.getElementById("dom"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#dom"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             else if($("#dia_semana_ins").val()==2){
                document.getElementById("seg"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#seg"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             else if($("#dia_semana_ins").val()==3){
                 document.getElementById("ter"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#ter"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             else if($("#dia_semana_ins").val()==4){
                document.getElementById("qua"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#qua"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             else if($("#dia_semana_ins").val()==5){
                document.getElementById("qui"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#qui"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             else if($("#dia_semana_ins").val()==6){
                document.getElementById("sex"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#sex"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             else if($("#dia_semana_ins").val()==7){
                document.getElementById("sab"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).innerHTML = "("+$("#hr_turno_ins").val()+")";
                $("#sab"+(data.getDate()-1)+$("#colaborador_pk_ins").val()).css("color", "blue");
             }
             
            
            /*$("#loader").show();
            $("#exibir").hide();
            window.setTimeout(function(){
                fcCarregar();
               $("#loader").hide();
               $("#exibir").show();
            }, 200);*/

        }    
        else{
            alert(arrEnviar.result);
        }
        

    
   
    
}



function fcCarregarMotivoAlteracaoEscala(){
    var objParametros = {
        "pk": "",
        "ic_status": 1
    };  
    
    var arrCarregar = carregarController("motivo_alteracao_escala", "listarTodos", objParametros); 
   
    carregarComboAjax($("#motivo_alteracao_pk"), arrCarregar, " ", "pk", "ds_motivo_alteracao_escala");
        
}
function fcCarregarColaboradores(){
    var objParametros = {
        "pk": "",
        "dia_semana_pk": $("#dias_semana_inclusao").val(),
        "turnos_pk": $("#turnos_pk").val(),
        "contratos_itens_pk":$("#produtos_servicos_pk").val() ,
        "dt_inicio_agenda": $("#dt_base_inclusao_modal").val(),
        "agenda_colaborador_padrao_pk":""
    };  
    
    var arrCarregar = carregarController("colaborador", "listarTodosColaboradoresEServicoAgenda", objParametros); 
    carregarComboAjax($("#colaboradores_pk"), arrCarregar, " ", "pk", "ds_colaborador");
        
}


function fcIncluirColaboradorPausa(){
    if($("#motivo_alteracao_pk").val()==""){
        $("#alert_motivo").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_motivo").slideUp(500);
        });
        return false;
    }
    if($("#colaboradores_pk").val()==""){
        $("#alert_colaborador").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_colaborador").slideUp(500);
        });
        return false;
    }
    var ArrData = $("#dt_base_inclusao_modal").val().split("/");
    var data = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);
    //atualiza o registro no DB, pois já existe uma PK para contatos no banco.
    var objParametros = {
        "pk": $("#pausa_pk").val(),
        "ds_agenda_colaborador_pausa": "Substituição Agenda",
        "dt_inicio_pausa": $("#dt_base_inclusao_modal").val(),
        "dt_fim_pausa": $("#dt_base_inclusao_modal").val(),
        "colaboradores_pk": $("#colaborador_atual_pk").val(),
        "colaborador_substituto_pk": $("#colaboradores_pk").val(),
        "turnos_pk": $("#turnos_pk").val(),
        "motivos_pausas_pk": $("#motivo_alteracao_pk").val(),
        "leads_pk": leads_pk,
        
    }; 

    var arrEnviar = carregarController("agenda_colaborador_pausa", "salvar", objParametros);

    if (arrEnviar.result == 'success'){
        fcDeletarFalta($("#dt_base_inclusao_modal").val(),$("#colaborador_atual_pk").val());
        fcDeletarExclusao($("#dt_base_inclusao_modal").val(),$("#colaborador_atual_pk").val());
        fcDeletarPonto($("#dt_base_inclusao_modal").val(),$("#colaborador_atual_pk").val());
        fcDeletarFolga($("#dt_base_inclusao_modal").val(),$("#colaborador_atual_pk").val());
        alert(arrEnviar.message);
        $("#janela_escala").modal("hide");
        $("#janela_modal_painel").modal("hide");
        /*$("#loader").show();
        $("#exibir").hide();
        window.setTimeout(function(){
            fcCarregar();
           $("#loader").hide();
           $("#exibir").show();
        }, 200);*/
        if($("#dia_semana_troca").val()==1){
                 $(".dom"+(data.getDate()-1)+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
             else if($("#dia_semana_troca").val()==2){
                  $(".seg"+(data.getDate()-1)+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
             else if($("#dia_semana_troca").val()==3){
                 $(".ter"+(data.getDate()-1)+""+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
             else if($("#dia_semana_troca").val()==4){
                  $(".qua"+(data.getDate()-1)+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
             else if($("#dia_semana_troca").val()==5){
                  $(".qui"+(data.getDate()-1)+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
             else if($("#dia_semana_troca").val()==6){
                  $(".sex"+(data.getDate()-1)+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
             else if($("#dia_semana_troca").val()==7){
                  $(".sab"+(data.getDate()-1)+$("#colaborador_atual_pk").val()).css("background-color", "yellow");
             }
        
    }    
    else{
        alert(arrEnviar.result);
    }
    
   
    
}

function fcCarregarLead(){
        var objParametros = {
            "pk": leads_pk,
        };         
        
        var arrCarregar = carregarController("lead", "listarPk", objParametros);  
        
        if (arrCarregar.result == 'success'){
            
            $(".ds_condominio").html("GRID DE ESCALAS - "+arrCarregar.data[0]['ds_lead']);

        }
        else{
            alert('Falhar ao carregar o registro');
        }
}

function fcCarregarEtapasProcesso(){

    var objParametros = {
        "leads_pk": leads_pk
    };        

    var arrCarregar = carregarController("processo", "listarEtapasLeads", objParametros);
    
    if (arrCarregar.result == 'success'){
        for(i = 0; i < arrCarregar.data.length; i++){
            $('#processos_etapas_pk').val(arrCarregar.data[0]['pk']);
        }
    }      
    else{
        alert('Falhar ao carregar o registro');
    }
}


//---------------------------------------------------------------TAREFA----------------------------------

function fcAbrirModalTarefa(dt_agenda,ic_dia_semana,agendas_pk,ds_re,ds_colaborador,ds_funcao,ds_turno,hr_entrada){

    
    $("#ic_dia").val("");
    $('#ic_tarefa_recorrente').prop('checked', false);
    $("#ds_tarefa").val("");
    $("#obs_tarefa").val("");
    $("#hr_inicio").val("");
    $("#dt_execucao").val(dt_agenda);
    $("#ic_dia").val(ic_dia_semana);
    $("#agendas_pk").val(agendas_pk);
    $("#ds_re_tarefa").html("R.E: "+ds_re);
    $("#ds_colaborador_tarefa").html("Nome Colaborador: "+ds_colaborador);
    $("#ds_funcao_tarefa").html("Função: "+ds_funcao);
    $("#hr_tarefa").html("Turno / Escala: " +ds_turno + hr_entrada);
    
    
    
    
    $("#modal_tarefa").modal();
    window.setTimeout(function(){
    tblTarefa.clear().destroy();
    
    fcFormatarGrid();
    }, 200);
    
}
function fcFormatarGrid(){
       
   var objParametros = {
        "agendas_pk": $("#agendas_pk").val(),
        "ic_dia":$("#ic_dia").val(),
        "dt_execucao":$("#dt_execucao").val()
    };     
    var v_url = montarUrlController("agenda_colaborador_tarefa", "listarTarefaPorIcDiaAgenda", objParametros);
    
    //Trata a tabela
    tblTarefa = $('#tblTarefa').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "searching": false,
        "paging": false,
        "bFilter": false,
        "bInfo": false, 
        "columnDefs": [
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            },
           {"targets": -2, "data": "hr_inicio"},
           {"targets": -3, "data": "dt_execucao"},
           {"targets": -4, "data": "obs_tarefa"},
           {"targets": -5, "data": "ds_tarefa"},
           {"targets": -6, "data": "pk"},
           

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    $('#tblTarefa tbody').on('click', '.function_delete', function () {
        var data;
        
        if(tblTarefa.row( $(this).parents('li') ).data()){
            data = tblTarefa.row( $(this).parents('li') ).data();
        }
        else if(tblTarefa.row( $(this).parents('tr') ).data()){
            data = tblTarefa.row( $(this).parents('tr') ).data();
        }
        
        if(data['pk'] != ""){
            fcExcluirTarefa(data['pk']);
        }
        tblTarefa.clear().destroy();
        fcFormatarGrid();
        
    } );
    
}
function fcExcluirTarefa(v_pk){
    if(v_pk != ""){
        var objParametros = {
            "pk": v_pk
        };              

        var arrExcluir = carregarController("agenda_colaborador_tarefa", "excluir", objParametros);   
        if (arrExcluir.result == 'success'){

            tblTarefa.clear().destroy();
            fcFormatarGrid();
        }
        else{
            alert('Falhou a requisição de exclusão.');
        }
    }
    else{
        alert("Código não encontrado");
    }
}
function fcSalvarTarefa(){
    var ic_tarefa_recorrente = "";
     
    if($("#ic_tarefa_recorrente").is(":checked")){
       ic_tarefa_recorrente = 1; 
      
    }
    var objParametros = {
        "agendas_pk": $("#agendas_pk").val(),
        "pk":"",
        "dt_execucao":$("#dt_execucao").val(),
        "ic_tarefa_recorrente":ic_tarefa_recorrente,
        "ds_tarefa":$("#ds_tarefa").val(),
        "obs_tarefa":$("#obs_tarefa").val(),
        "hr_inicio":$("#hr_inicio").val(),
        "ic_dia":$("#ic_dia").val()

    }; 
    //alert($('#agenda_contratos_itens_pk').val())
    var arrEnviar = carregarController("agenda_colaborador_tarefa", "salvar", objParametros);

    if (arrEnviar.result == 'success'){
         tblTarefa.clear().destroy();
        fcFormatarGrid();
    }    
    else{
        alert(arrEnviar.result);
    }
}

function fcGridDados(){
    var objParametrosContrato = {
        "leads_pk":  leads_pk
    };    
    
    var v_url = carregarController("contrato", "listarDadosContratoLead", objParametrosContrato); 
        //Trata a tabela
        tblGridDados = $('#tblGridDados').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=18 height=18 title='Agenda de Escalas'src='../img/calendario.png'></span></a>"
            },
           {"targets": -2, "data": "n_qtde"}, 
           {"targets": -3, "data": "n_qtde_dias_semana"},
           {"targets": -4, "data": "ds_produto_servico"},
           {"targets": -5, "data": "dt_periodo"},
           {"targets": -6, "data": "pk"}, 
         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });

}


function fcDatasCaleandario(label,acao){
    
    fcLimparVariaveisSemana();
    
    var today = new Date();
    var dd = today.getDate();        
    var mm = today.getMonth()+1; //January is 0!   
    var yyyy = today.getFullYear();
    var hh = today.getHours();
    var min = today.getMinutes();
  
   
      
    if(label=='mes'){
        if(acao=='anterior'){     
            if($("#ic_mes").val()==1){
                mm = 12;
                yyyy = ($("#ds_ano").val()-1);
            }else{
                mm = ($("#ic_mes").val()-1);
                yyyy = (new Number($("#ds_ano").val()));
            }                        
        }else if(acao=='proximo'){             
            if($("#ic_mes").val()==12){
                mm = 1;
                yyyy = (new Number($("#ds_ano").val())+1) 
            }else{
                mm = (new Number($("#ic_mes").val())+1);
                yyyy = (new Number($("#ds_ano").val()));
            }             
        }
    }     
    
    
    if(label=='ano'){
        if(acao=='anterior'){  
            mm = $("#ic_mes").val();
            yyyy = ($("#ds_ano").val()-1);
        }else if(acao=='proximo'){    
            mm = $("#ic_mes").val();
            yyyy = (new Number($("#ds_ano").val())+1)      
        }
    }  
      
    $("#ano_pk").text(yyyy);    
    $("#ds_ano").val(yyyy);       
    if(mm=='1'){
        $("#ds_mes").text('Janeiro');
        $("#ic_mes").val(1);
    }else if(mm=='2'){
        $("#ds_mes").text('Fevereiro');
        $("#ic_mes").val(2);
    }else if(mm=='3'){
        $("#ds_mes").text('Março');
        $("#ic_mes").val(3);
    }else if(mm=='4'){
        $("#ds_mes").text('Abril');
        $("#ic_mes").val(4);
    }else if(mm=='5'){
        $("#ds_mes").text('Maio');
        $("#ic_mes").val(5);
    }else if(mm=='6'){
        $("#ds_mes").text('Junho');
        $("#ic_mes").val(6);
    }else if(mm=='7'){
        $("#ds_mes").text('Julho');
        $("#ic_mes").val(7);
    }else if(mm=='8'){
        $("#ds_mes").text('Agosto');
        $("#ic_mes").val(8);
    }else if(mm=='9'){
        $("#ds_mes").text('Setembro');
        $("#ic_mes").val(9);
    }else if(mm=='10'){
        $("#ds_mes").text('Outubro');
        $("#ic_mes").val(10);
    }else if(mm=='11'){
        $("#ds_mes").text('Novembro');
        $("#ic_mes").val(11);
    }else if(mm=='12'){
        $("#ds_mes").text('Dezembro');
        $("#ic_mes").val(12);
    }  

    fcCarregar();
}
function FcBuscarPinColaborador(colaborador_pk){

        var objParametrosColaboradores = {
            "colaborador_pk": colaborador_pk
        };
        
        var arrColaborador = carregarController("colaborador", "listarDadosColaborador", objParametrosColaboradores);
               
        if (arrColaborador.result == 'success'){
       
           return arrColaborador.data[0]['ds_pin']
        }
        
      }

$(document).ready(function(){
 
    var arrCarregar = permissao("agenda_condominio", "ins");       
  
             
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    fcDatasCaleandario('','');

    $(document).on('click', '#cmdPreviMes', function () {            
        fcDatasCaleandario('mes','anterior');
    } );
        
    $(document).on('click', '#cmdNextMes', function () {  
        fcDatasCaleandario('mes','proximo');
    } );    
    
    $(document).on('click', '#cmdPreviAno', function () {  
        fcDatasCaleandario('ano','anterior');
    } );    

    $(document).on('click', '#cmdNextAno', function () {  
        fcDatasCaleandario('ano','proximo');
    } ); 
    
    fcGridDados();
    
    //fcCarregarEtapasProcesso();
    //$(document).on('click', '#cmdEnviar', fcCarregar);
    $(document).on('click', '#cmdIncluir', fcIncluirColaboradorPausa);
    $(document).on('click', '#cmdRetornarEscala', fcIncluirRetomarEscala);
    $(document).on('click', '#cmdIncluirEscala', fcIncluirNovaEscala);
    $(document).on('click', '#cmdCancelarModalPainel', fcFecharModalPainel);
    
    
    $('#cmdAgendaColaborador').on('click', function(e) {
        e.preventDefault();
        if($("#colaboradores_pk").val()!=""){
            $("#myModal").modal("show");
            $(".modal-body-agenda").html('<iframe width="1180px" height="525px" frameborder="0" scrolling="yes" allowtransparency="true" src="agenda_colaborador_cad_form.php?token='+token+'&pk='+$("#colaboradores_pk").val()+'"></iframe>');
            
        }
        else{
            $("#myModal").modal("hide");
            $("#colaboradores_pk").focus();
        }
       
    });
    
    fcCarregarLead();
    fcFormatarGrid();
    
    //TAREFA
    $(document).on('click', '#btntarefa', fcSalvarTarefa);
    
    
    $("#hr_inicio").keypress(function(){
       mascara(this,horamask);
    });
    $("#hr_entrada_manual").keypress(function(){
       mascara(this,horamask);
    });
    $(document).on('click', '#btnPonto', fcSalvarPonto);
    $(document).on('click', '#ic_hr_sistema', fcDesabilitarHrSistema);
    $(document).on('click', '#ic_falta', fcDesabilitarFalta);
    $(document).on('click', '#btnExclusao', fcSalvarExclusao);
    $(document).on('click', '#btnAtribuirFolga', fcSalvarFolga);
    
    $("#tabela input").keyup(function(){
            var index = $(this).parent().index();
            var nth = "#tabela th:nth-child("+(index+1).toString()+")";
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
    
    
    
    
    $('#ic_exibir_por_semana').click(function() {
        $('#ic_exibir_por_semana').addClass('active');
        $('#ic_exibir_por_mes').removeClass('active');
        $("#intSemana").val(1);
        $("#intMes").val("");
        fcDatasCaleandario('','');
    });
    $('#ic_exibir_por_mes').click(function() {
        $('#ic_exibir_por_mes').addClass('active');
        $('#ic_exibir_por_semana').removeClass('active');
        $("#intSemana").val("");
        $("#intMes").val(1);
        fcDatasCaleandario('','');
    });

    // Mostra o resultado

    
    $("#loader").hide();
    $("#exibir").show();
   
});


