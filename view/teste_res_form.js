//--------------------------------------------------------SEMANA ATUAL--------------------------------------------------//

function fcCarregar(){
    
    
    
    //LIMPA AS VARIAVEIS
    fcLimparVariaveisSemana01();
    fcLimparVariaveisSemana02();
    fcLimparVariaveisSemana03();
    fcLimparVariaveisSemana04();
    fcLimparVariaveisSemana05();
    fcLimparVariaveisSemana06();
   //RETORNA AS DATAS
   
   fcCarregarDataSemana01();
    
   
    var v_dt_agenda = "01/"+$("#ic_mes").val()+"/"+$("#ds_ano").val();
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana01());
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = nova_data.getDate()+"/"+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
    var colorClassificacao = "background-color:#e0e0e0";  
    
    for(i=0;i<7;i++){

        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "colaborador_pk":6,
                "dt_base": nova_v_dt_agenda,
                "dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorData", objParametros);  
            
            if (arrCarregar.result == 'success'){
                for(j=0; j < arrCarregar.data.length ;j++){
                    var strResultado ="";
                    if(i==0){          

                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_dom1").html(strResultado+"<br>"+$(".ds_lead_dom1").html());
                            alert($(".ds_lead_dom1").html());
                    }

                    if(i==1){           


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_seg1").html(strResultado+"<br>"+$(".ds_lead_seg1").html());
                        
                    }

                    if(i==2){
                                        


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_ter1").html(strResultado+"<br>"+$(".ds_lead_ter1").html());
                    }

                    if(i==3){                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_qua1").html(strResultado+"<br>"+$(".ds_lead_qua1").html());
                    }

                    if(i==4){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            $(".ds_lead_qui1").html(strResultado+"<br>"+$(".ds_lead_qui1").html());
                            
                            
                        
                    }

                    if(i==5){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sex1").html(strResultado+"<br>"+$(".ds_lead_sex1").html());
                        
                    }

                    if(i==6){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sab1").html(strResultado+"<br>"+$(".ds_lead_sab1").html());
                       
                    }

                }
                
                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                //gera a data do dia seguinte
                
                nova_v_dt_agenda = nova_dt_agenda_dia_proximo.getDate()+"/"+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();

            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    } 
}

function fcPosicaoDataSemana01(){
    var v_dt_agenda = "01/"+$("#ic_mes").val()+"/"+$("#ds_ano").val();
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
       
        
        if (arrCarregar.result == 'success'){
            
            var posicao_data = arrCarregar.data[0]['dia_semana'];

        }
        else{
            alert('Falhar ao carregar o registro');
        }
        return posicao_data;
    }
}


function fcLimparVariaveisSemana01(){
    var strResultado =" ";
    //DOMINGO                     
    $(".ds_lead_dom1").html("");
    $("#dt_agenda_dom1").html("").css("color", "");

    //SEGUNDA
    $(".ds_lead_seg1").html("");
    $("#dt_agenda_seg1").html("").css("color", "");

    //TERÇA
    $(".ds_lead_ter1").html("");
    $("#dt_agenda_ter1").html("").css("color", "");

    //QUARTA
    $(".ds_lead_qua1").html("");
    $("#dt_agenda_qua1").html("").css("color", "");

    //QUINTA
    $(".ds_lead_qui1").html("");
    $("#dt_agenda_qui1").html("").css("color", "");

    
    //SEXTA
    $(".ds_lead_sex1").html("");
    $("#dt_agenda_sex1").html("").css("color", "");

    //SABADO
    $(".ds_lead_sab1").html("");
    $("#dt_agenda_sab1").html("").css("color", "");
                  
}

function fcCarregarDataSemana01(){    
    //joga as data em uma variavel     
   var v_dt_agenda = "01/"+$("#ic_mes").val()+"/"+$("#ds_ano").val();
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana01());
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    if(nova_data.getDate()<10){
        dia_comeco = "0"+nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        dia_comeco = nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    
    if((nova_data.getMonth()+1)<10){
        mes_comeco = "0"+(nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
        
    }
    
    nova_v_dt_agenda = dia_comeco+"/"+mes_comeco+"/"+ano_comeco;
    for(i=0;i<7;i++){
       
        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "dt_agenda":  nova_v_dt_agenda
            };      
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  

            if (arrCarregar.result == 'success'){
                 var dia = nova_v_dt_agenda.split("/");

                if(arrCarregar.data[0]['dia_semana']==0){
                     
                    $("#dt_agenda_dom1").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==1){
                    $("#dt_agenda_seg1").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==2){
                    $("#dt_agenda_ter1").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==3){
                    $("#dt_agenda_qua1").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==4){
                    $("#dt_agenda_qui1").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==5){
                    $("#dt_agenda_sex1").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==6){
                    $("#dt_agenda_sab1").html(dia[0]);
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
            
            else{
                alert('Falhar ao carregar o registro');
            }
        }
       
    }
    //carrega os dados da semana Seguinte
    fcPosicaoDataSemana02(nova_v_dt_agenda);
    fcCarregarDataSemana02(nova_v_dt_agenda);
    fcCarregarSemana02(nova_v_dt_agenda);
    
}

//---------------------------------------------------------------------2º SEMANA-----------------------------------------


function fcPosicaoDataSemana02(nova_v_dt_agenda){
    var v_dt_agenda = nova_v_dt_agenda;
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
       
        
        if (arrCarregar.result == 'success'){
            
            var posicao_data = arrCarregar.data[0]['dia_semana'];

        }
        else{
            alert('Falhar ao carregar o registro');
        }
        return posicao_data;
    }
}

function fcLimparVariaveisSemana02(){
    
    //DOMINGO                     
    $(".ds_lead_dom2").html("");
    $("#dt_agenda_dom2").html("").css("color", "");

    //SEGUNDA
    $(".ds_lead_seg2").html("");
    $("#dt_agenda_seg2").html("").css("color", "");

    //TERÇA
    $(".ds_lead_ter2").html("");
    $("#dt_agenda_ter2").html("").css("color", "");

    //QUARTA
    $(".ds_lead_qua2").html("");
    $("#dt_agenda_qua2").html("").css("color", "");

    //QUINTA
    $(".ds_lead_qui2").html("");
    $("#dt_agenda_qui02").html("").css("color", "");

    
    //SEXTA
    $(".ds_lead_sex2").html("");
    $("#dt_agenda_sex2").html("").css("color", "");

    //SABADO
    $(".ds_lead_sab2").html("");
    $("#dt_agenda_sab2").html("").css("color", "");
                  
}

function fcCarregarDataSemana02(nova_dt_agenda){    
    //joga as data em uma variavel     
     var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana02(nova_dt_agenda));
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    if(nova_data.getDate()<10){
        dia_comeco = "0"+nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        dia_comeco = nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    
    if((nova_data.getMonth()+1)<10){
        mes_comeco = "0"+(nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
        
    }
    
    nova_v_dt_agenda = dia_comeco+"/"+mes_comeco+"/"+ano_comeco;
    for(i=0;i<7;i++){
       
        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "dt_agenda":  nova_v_dt_agenda
            };      
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  

            if (arrCarregar.result == 'success'){
                var dia = nova_v_dt_agenda.split("/");

                if(arrCarregar.data[0]['dia_semana']==0){
                    $("#dt_agenda_dom2").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==1){
                    $("#dt_agenda_seg2").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==2){
                    $("#dt_agenda_ter2").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==3){
                    $("#dt_agenda_qua2").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==4){
                    $("#dt_agenda_qui2").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==5){
                    $("#dt_agenda_sex2").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==6){
                    $("#dt_agenda_sab2").html(dia[0]);
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
            
            else{
                alert('Falhar ao carregar o registro');
            }
        }
       
    }
    //carrega os dados da semana Seguinte
    fcPosicaoDataSemana03(nova_v_dt_agenda);
    fcCarregarDataSemana03(nova_v_dt_agenda);
    fcCarregarSemana03(nova_v_dt_agenda);
    
}

function fcCarregarSemana02(nova_dt_agenda){
    
   
    var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana02(nova_dt_agenda));
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = nova_data.getDate()+"/"+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
    
    var colorClassificacao = "background-color:#e0e0e0";  
    
    for(i=0;i<7;i++){

        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "colaborador_pk":6,
                "dt_base": nova_v_dt_agenda,
                "dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorData", objParametros);  
            
            if (arrCarregar.result == 'success'){
                for(j=0; j < arrCarregar.data.length ;j++){
                    var strResultado ="";
                    if(i==0){          
                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_dom2").html(strResultado+"<br>"+$(".ds_lead_dom2").html());
                    }

                    if(i==1){           


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_seg2").html(strResultado+"<br>"+$(".ds_lead_seg2").html());
                        
                    }

                    if(i==2){
                                        


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_ter2").html(strResultado+"<br>"+$(".ds_lead_ter2").html());
                    }

                    if(i==3){                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_qua2").html(strResultado+"<br>"+$(".ds_lead_qua2").html());
                    }

                    if(i==4){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            $(".ds_lead_qui2").html(strResultado+"<br>"+$(".ds_lead_qui2").html());
                            
                            
                        
                    }

                    if(i==5){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sex2").html(strResultado+"<br>"+$(".ds_lead_sex2").html());
                        
                    }

                    if(i==6){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sab2").html(strResultado+"<br>"+$(".ds_lead_sab2").html());
                       
                    }

                }
                
                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                //gera a data do dia seguinte
                
                nova_v_dt_agenda = nova_dt_agenda_dia_proximo.getDate()+"/"+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();

            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    } 
}

//---------------------------------------------------------------------3º SEMANA-----------------------------------------


function fcPosicaoDataSemana03(nova_v_dt_agenda){
    var v_dt_agenda = nova_v_dt_agenda;
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
       
        
        if (arrCarregar.result == 'success'){
            
            var posicao_data = arrCarregar.data[0]['dia_semana'];

        }
        else{
            alert('Falhar ao carregar o registro');
        }
        return posicao_data;
    }
}

function fcLimparVariaveisSemana03(){
    
    //DOMINGO                     
    $(".ds_lead_dom3").html("");
    $("#dt_agenda_dom3").html("").css("color", "");

    //SEGUNDA
    $(".ds_lead_seg3").html("");
    $("#dt_agenda_seg3").html("").css("color", "");

    //TERÇA
    $(".ds_lead_ter3").html("");
    $("#dt_agenda_ter3").html("").css("color", "");

    //QUARTA
    $(".ds_lead_qua3").html("");
    $("#dt_agenda_qua3").html("").css("color", "");

    //QUINTA
    $(".ds_lead_qui3").html("");
    $("#dt_agenda_qui3").html("").css("color", "");

    
    //SEXTA
    $(".ds_lead_sex3").html("");
    $("#dt_agenda_sex3").html("").css("color", "");

    //SABADO
    $(".ds_lead_sab3").html("");
    $("#dt_agenda_sab3").html("").css("color", "");
                  
}

function fcCarregarDataSemana03(nova_dt_agenda){    
    //joga as data em uma variavel     
     var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana03(nova_dt_agenda));
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    if(nova_data.getDate()<10){
        dia_comeco = "0"+nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        dia_comeco = nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    
    if((nova_data.getMonth()+1)<10){
        mes_comeco = "0"+(nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
        
    }
    
    nova_v_dt_agenda = dia_comeco+"/"+mes_comeco+"/"+ano_comeco;

    for(i=0;i<7;i++){
       
        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "dt_agenda":  nova_v_dt_agenda
            };      
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  

            if (arrCarregar.result == 'success'){
                var dia = nova_v_dt_agenda.split("/");

                if(arrCarregar.data[0]['dia_semana']==0){
                    $("#dt_agenda_dom3").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==1){
                    $("#dt_agenda_seg3").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==2){
                    $("#dt_agenda_ter3").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==3){
                    $("#dt_agenda_qua3").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==4){
                    $("#dt_agenda_qui3").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==5){
                    $("#dt_agenda_sex3").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==6){
                    $("#dt_agenda_sab3").html(dia[0]);
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
            
            else{
                alert('Falhar ao carregar o registro');
            }
        }
       
    }
    //carrega os dados da semana Seguinte
    fcPosicaoDataSemana04(nova_v_dt_agenda);
    fcCarregarDataSemana04(nova_v_dt_agenda);
    fcCarregarSemana04(nova_v_dt_agenda);
    
}

function fcCarregarSemana03(nova_dt_agenda){
    
   
    var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana03(nova_dt_agenda));
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = nova_data.getDate()+"/"+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
    
    var colorClassificacao = "background-color:#e0e0e0";  
    
    for(i=0;i<7;i++){

        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "colaborador_pk":6,
                "dt_base": nova_v_dt_agenda,
                "dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorData", objParametros);  
            
            if (arrCarregar.result == 'success'){
                for(j=0; j < arrCarregar.data.length ;j++){
                    var strResultado ="";
                    if(i==0){          
                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_dom3").html(strResultado+"<br>"+$(".ds_lead_dom3").html());
                    }

                    if(i==1){           


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_seg3").html(strResultado+"<br>"+$(".ds_lead_seg3").html());
                        
                    }

                    if(i==2){
                                        


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_ter3").html(strResultado+"<br>"+$(".ds_lead_ter3").html());
                    }

                    if(i==3){                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_qua3").html(strResultado+"<br>"+$(".ds_lead_qua3").html());
                    }

                    if(i==4){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            $(".ds_lead_qui3").html(strResultado+"<br>"+$(".ds_lead_qui3").html());
                            
                            
                        
                    }

                    if(i==5){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sex3").html(strResultado+"<br>"+$(".ds_lead_sex3").html());
                        
                    }

                    if(i==6){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sab3").html(strResultado+"<br>"+$(".ds_lead_sab3").html());
                       
                    }

                }
                
                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                //gera a data do dia seguinte
                
                nova_v_dt_agenda = nova_dt_agenda_dia_proximo.getDate()+"/"+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();

            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    } 
}

//---------------------------------------------------------------------4º SEMANA-----------------------------------------


function fcPosicaoDataSemana04(nova_v_dt_agenda){
    var v_dt_agenda = nova_v_dt_agenda;
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
       
        
        if (arrCarregar.result == 'success'){
            
            var posicao_data = arrCarregar.data[0]['dia_semana'];

        }
        else{
            alert('Falhar ao carregar o registro');
        }
        return posicao_data;
    }
}

function fcLimparVariaveisSemana04(){
    
    //DOMINGO                     
    $(".ds_lead_dom4").html("");
    $("#dt_agenda_dom4").html("").css("color", "");

    //SEGUNDA
    $(".ds_lead_seg4").html("");
    $("#dt_agenda_seg4").html("").css("color", "");

    //TERÇA
    $(".ds_lead_ter4").html("");
    $("#dt_agenda_ter4").html("").css("color", "");

    //QUARTA
    $(".ds_lead_qua4").html("");
    $("#dt_agenda_qua4").html("").css("color", "");

    //QUINTA
    $(".ds_lead_qui4").html("");
    $("#dt_agenda_qui4").html("").css("color", "");

    
    //SEXTA
    $(".ds_lead_sex4").html("");
    $("#dt_agenda_sex4").html("").css("color", "");

    //SABADO
    $(".ds_lead_sab4").html("");
    $("#dt_agenda_sab4").html("").css("color", "");
                  
}

function fcCarregarDataSemana04(nova_dt_agenda){    
    //joga as data em uma variavel     
     var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana04(nova_dt_agenda));
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    if(nova_data.getDate()<10){
        dia_comeco = "0"+nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        dia_comeco = nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    
    if((nova_data.getMonth()+1)<10){
        mes_comeco = "0"+(nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
        
    }
    
    nova_v_dt_agenda = dia_comeco+"/"+mes_comeco+"/"+ano_comeco;
    for(i=0;i<7;i++){
       
        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "dt_agenda":  nova_v_dt_agenda
            };      
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  

            if (arrCarregar.result == 'success'){
                var dia = nova_v_dt_agenda.split("/");

                if(arrCarregar.data[0]['dia_semana']==0){
                    $("#dt_agenda_dom4").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==1){
                    $("#dt_agenda_seg4").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==2){
                    $("#dt_agenda_ter4").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==3){
                    $("#dt_agenda_qua4").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==4){
                    $("#dt_agenda_qui4").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==5){
                    $("#dt_agenda_sex4").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==6){
                    $("#dt_agenda_sab4").html(dia[0]);
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
            
            else{
                alert('Falhar ao carregar o registro');
            }
        }
       
    }
    //carrega os dados da semana Seguinte
    fcPosicaoDataSemana05(nova_v_dt_agenda);
    fcCarregarDataSemana05(nova_v_dt_agenda);
    fcCarregarSemana05(nova_v_dt_agenda);
    
}

function fcCarregarSemana04(nova_dt_agenda){
    
   
    var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana04(nova_dt_agenda));
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = nova_data.getDate()+"/"+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
    
    var colorClassificacao = "background-color:#e0e0e0";  
    
    for(i=0;i<7;i++){

        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "colaborador_pk":6,
                "dt_base": nova_v_dt_agenda,
                "dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorData", objParametros);  
            
            if (arrCarregar.result == 'success'){
                for(j=0; j < arrCarregar.data.length ;j++){
                    var strResultado ="";
                    if(i==0){          
                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_dom4").html(strResultado+"<br>"+$(".ds_lead_dom4").html());
                    }

                    if(i==1){           


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_seg4").html(strResultado+"<br>"+$(".ds_lead_seg4").html());
                        
                    }

                    if(i==2){
                                        


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_ter4").html(strResultado+"<br>"+$(".ds_lead_ter4").html());
                    }

                    if(i==3){                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_qua4").html(strResultado+"<br>"+$(".ds_lead_qua4").html());
                    }

                    if(i==4){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            $(".ds_lead_qui4").html(strResultado+"<br>"+$(".ds_lead_qui4").html());
                            
                            
                        
                    }

                    if(i==5){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sex4").html(strResultado+"<br>"+$(".ds_lead_sex4").html());
                        
                    }

                    if(i==6){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sab4").html(strResultado+"<br>"+$(".ds_lead_sab4").html());
                       
                    }

                }
                
                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                //gera a data do dia seguinte
                
                nova_v_dt_agenda = nova_dt_agenda_dia_proximo.getDate()+"/"+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();

            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    } 
}

//---------------------------------------------------------------------5º SEMANA-----------------------------------------


function fcPosicaoDataSemana05(nova_v_dt_agenda){
    var v_dt_agenda = nova_v_dt_agenda;
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
       
        
        if (arrCarregar.result == 'success'){
            
            var posicao_data = arrCarregar.data[0]['dia_semana'];

        }
        else{
            alert('Falhar ao carregar o registro');
        }
        return posicao_data;
    }
}

function fcLimparVariaveisSemana05(){
    
    //DOMINGO                     
    $(".ds_lead_dom5").html("");
    $("#dt_agenda_dom5").html("").css("color", "");

    //SEGUNDA
    $(".ds_lead_seg5").html("");
    $("#dt_agenda_seg5").html("").css("color", "");

    //TERÇA
    $(".ds_lead_ter5").html("");
    $("#dt_agenda_ter5").html("").css("color", "");

    //QUARTA
    $(".ds_lead_qua5").html("");
    $("#dt_agenda_qua5").html("").css("color", "");

    //QUINTA
    $(".ds_lead_qui5").html("");
    $("#dt_agenda_qui5").html("").css("color", "");

    
    //SEXTA
    $(".ds_lead_sex5").html("");
    $("#dt_agenda_sex5").html("").css("color", "");

    //SABADO
    $(".ds_lead_sab5").html("");
    $("#dt_agenda_sab5").html("").css("color", "");
                  
}

function fcCarregarDataSemana05(nova_dt_agenda){    
    //joga as data em uma variavel     
     var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana05(nova_dt_agenda));
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    if(nova_data.getDate()<10){
        dia_comeco = "0"+nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        dia_comeco = nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    
    if((nova_data.getMonth()+1)<10){
        mes_comeco = "0"+(nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
        
    }
    
    nova_v_dt_agenda = dia_comeco+"/"+mes_comeco+"/"+ano_comeco;
    for(i=0;i<7;i++){
       
        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "dt_agenda":  nova_v_dt_agenda
            };      
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  

            if (arrCarregar.result == 'success'){
                var dia = nova_v_dt_agenda.split("/");

                if(arrCarregar.data[0]['dia_semana']==0){
                    $("#dt_agenda_dom5").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==1){
                    $("#dt_agenda_seg5").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==2){
                    $("#dt_agenda_ter5").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==3){
                    $("#dt_agenda_qua5").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==4){
                    $("#dt_agenda_qui5").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==5){
                    $("#dt_agenda_sex5").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==6){
                    $("#dt_agenda_sab5").html(dia[0]);
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
            
            else{
                alert('Falhar ao carregar o registro');
            }
        }
       
    }
    //carrega os dados da semana Seguinte
    fcPosicaoDataSemana06(nova_v_dt_agenda);
    fcCarregarDataSemana06(nova_v_dt_agenda);
    fcCarregarSemana06(nova_v_dt_agenda);
    
}

function fcCarregarSemana05(nova_dt_agenda){
    
   
    var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana05(nova_dt_agenda));
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = nova_data.getDate()+"/"+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
    
    var colorClassificacao = "background-color:#e0e0e0";  
    
    for(i=0;i<7;i++){

        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "colaborador_pk":6,
                "dt_base": nova_v_dt_agenda,
                "dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorData", objParametros);  
            
            if (arrCarregar.result == 'success'){
                for(j=0; j < arrCarregar.data.length ;j++){
                    var strResultado ="";
                    if(i==0){          
                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_dom5").html(strResultado+"<br>"+$(".ds_lead_dom5").html());
                    }

                    if(i==1){           


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_seg5").html(strResultado+"<br>"+$(".ds_lead_seg5").html());
                        
                    }

                    if(i==2){
                                        


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_ter5").html(strResultado+"<br>"+$(".ds_lead_ter5").html());
                    }

                    if(i==3){                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_qua5").html(strResultado+"<br>"+$(".ds_lead_qua5").html());
                    }

                    if(i==4){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            $(".ds_lead_qui5").html(strResultado+"<br>"+$(".ds_lead_qui5").html());
                            
                            
                        
                    }

                    if(i==5){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sex5").html(strResultado+"<br>"+$(".ds_lead_sex5").html());
                        
                    }

                    if(i==6){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sab5").html(strResultado+"<br>"+$(".ds_lead_sab5").html());
                       
                    }

                }
                
                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                //gera a data do dia seguinte
                
                nova_v_dt_agenda = nova_dt_agenda_dia_proximo.getDate()+"/"+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();

            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    } 
}

//---------------------------------------------------------------------6º SEMANA-----------------------------------------


function fcPosicaoDataSemana06(nova_v_dt_agenda){
    var v_dt_agenda = nova_v_dt_agenda;
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
       
        
        if (arrCarregar.result == 'success'){
            
            var posicao_data = arrCarregar.data[0]['dia_semana'];

        }
        else{
            alert('Falhar ao carregar o registro');
        }
        return posicao_data;
    }
}

function fcLimparVariaveisSemana06(){
    
    //DOMINGO                     
    $(".ds_lead_dom6").html("");
    $("#dt_agenda_dom6").html("").css("color", "");

    //SEGUNDA
    $(".ds_lead_seg6").html("");
    $("#dt_agenda_seg6").html("").css("color", "");

    //TERÇA
    $(".ds_lead_ter6").html("");
    $("#dt_agenda_ter6").html("").css("color", "");

    //QUARTA
    $(".ds_lead_qua6").html("");
    $("#dt_agenda_qua6").html("").css("color", "");

    //QUINTA
    $(".ds_lead_qui6").html("");
    $("#dt_agenda_qui6").html("").css("color", "");

    
    //SEXTA
    $(".ds_lead_sex6").html("");
    $("#dt_agenda_sex6").html("").css("color", "");

    //SABADO
    $(".ds_lead_sab6").html("");
    $("#dt_agenda_sab6").html("").css("color", "");
                  
}

function fcCarregarDataSemana06(nova_dt_agenda){    
    //joga as data em uma variavel     
     var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana06(nova_dt_agenda));
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    if(nova_data.getDate()<10){
        dia_comeco = "0"+nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        dia_comeco = nova_data.getDate();
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    
    if((nova_data.getMonth()+1)<10){
        mes_comeco = "0"+(nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    }
    else{
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
        
    }
    
    nova_v_dt_agenda = dia_comeco+"/"+mes_comeco+"/"+ano_comeco;
    for(i=0;i<7;i++){
       
        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "dt_agenda":  nova_v_dt_agenda
            };      
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  

            if (arrCarregar.result == 'success'){
                var dia = nova_v_dt_agenda.split("/");

                if(arrCarregar.data[0]['dia_semana']==0){
                    $("#dt_agenda_dom6").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==1){
                    $("#dt_agenda_seg6").html(dia[0]);

                }
                else if(arrCarregar.data[0]['dia_semana']==2){
                    $("#dt_agenda_ter6").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==3){
                     
                    $("#dt_agenda_qua6").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==4){
                    $("#dt_agenda_qui6").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==5){
                    $("#dt_agenda_sex6").html(dia[0]);
                }
                else if(arrCarregar.data[0]['dia_semana']==6){
                    $("#dt_agenda_sab6").html(dia[0]);
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
            
            else{
                alert('Falhar ao carregar o registro');
            }
        }
       
    }
    
}

function fcCarregarSemana06(nova_dt_agenda){
    
   
    var v_dt_agenda = nova_dt_agenda;
     
    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana06(nova_dt_agenda));
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = nova_data.getDate()+"/"+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
    
    var colorClassificacao = "background-color:#e0e0e0";  
    
    for(i=0;i<7;i++){

        if(nova_v_dt_agenda !=""){
            var objParametros = {
                "colaborador_pk":6,
                "dt_base": nova_v_dt_agenda,
                "dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaColaboradorData", objParametros);  
            
            if (arrCarregar.result == 'success'){
                for(j=0; j < arrCarregar.data.length ;j++){
                    var strResultado = " ";
                    if(i==0){          
                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_dom6").html(strResultado+"<br>"+$(".ds_lead_dom6").html());
                    }

                    if(i==1){           


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_seg6").html(strResultado+"<br>"+$(".ds_lead_seg6").html());
                        
                    }

                    if(i==2){
                                        


                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_ter6").html(strResultado+"<br>"+$(".ds_lead_ter6").html());
                    }

                    if(i==3){                        
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_qua6").html(strResultado+"<br>"+$(".ds_lead_qua6").html());
                    }

                    if(i==4){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            $(".ds_lead_qui6").html(strResultado+"<br>"+$(".ds_lead_qui6").html());
                            
                            
                        
                    }

                    if(i==5){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sex6").html(strResultado+"<br>"+$(".ds_lead_sex6").html());
                        
                    }

                    if(i==6){
                            strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                            strResultado += "<div style="+colorClassificacao+">"; //color classificaçaõ
                            strResultado += "<div class='modal-body'><div class='row'>";

                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=18 height=18 src='../img/predio.png'> <a href='lead_cad_form.php?token="+token+"&pk="+arrCarregar.data[j]['t_leads_pk']+"'>"+arrCarregar.data[j]['t_condominio']+"</a></label>"; // Nome Do lead//
                            strResultado += "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=20 height=18 src='../img/relogio.png'> "+arrCarregar.data[j]['t_ds_turnos_pk']+"</label>"; // Nome Do lead//
                            strResultado += "</div></div>";
                            strResultado += "</div></div>";
                            
                            $(".ds_lead_sab6").html(strResultado+"<br>"+$(".ds_lead_sab6").html());
                       
                    }

                }
                
                //separa a data 
                var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

                //pega a data que ja passou pelo for 
                var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
                
                //a cada looping acrescenta mais um dia 
                nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 1);

                //gera a data do dia seguinte
                
                nova_v_dt_agenda = nova_dt_agenda_dia_proximo.getDate()+"/"+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();

            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    } 
}

$(document).ready(function(){
    $(document).on('click', '#cmdEnviar', fcCarregar); 
    $("#ds_ano").keypress(function(){
        mascara(this,soNumeros);
     });
    var mm = "";
    
    var today = new Date();
    if(today.getMonth()+1 <10){
         mm = "0"+(today.getMonth()+1); //January is 0!
    }
    else{
        mm = (today.getMonth()+1); //January is 0!
    }
   
    var yyyy = today.getFullYear(); 
    
    $("#ic_mes").val(mm);
    $("#ds_ano").val(yyyy);
    
    fcCarregar(); 
    
    
});


