var tblEscala;
var tblGridDados;
//--------------------------------------------------------SEMANA ATUAL--------------------------------------------------//

function fcCarregarSemana(){
   //LIMPA AS VARIAVEIS
   
   //fcLimparVariaveisSemanaPassada();
  
   //fcLimparVariaveisSemanaSeguinte();
   
    var v_dt_agenda = $("#dt_agenda").val();
         
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");
    
    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, (partesDt_base[0]));
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana01());
       
    var v_dia = "";
    if(nova_data.getDate()<10){
        v_dia = "0";
    }
    
    var v_mes = "";
    if(nova_data.getMonth()<10){
        v_mes = "0";
    }
    if((nova_data.getDate()-7)<=0){
        var day = 1;
    }
    else{
        var day = (nova_data.getDate()-7);
    }
     //gera a data do começo da semana 
    var nova_v_dt_agenda =  v_dia+day+"/"+v_mes+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();
      //separa a data 
        var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

        //pega a data que ja passou pelo for 
        var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
        var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);

        //a cada looping acrescenta mais um dia 
        nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 20);

        //gera a data do dia seguinte

         var v_dia_fim = "";
        if(nova_dt_agenda_dia_proximo.getDate()<10){
            v_dia_fim = "0";
        }

        var v_mes_fim = "";
        if(nova_dt_agenda_dia_proximo.getMonth()<10){
            v_mes_fim = "0";
        }

        
        var nova_v_dt_agenda_fim =  v_dia_fim+nova_dt_agenda_dia_proximo.getDate()+"/"+v_mes_fim+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();
        
    
        fcCarregarEscala(nova_v_dt_agenda);
    //for(i=0;i<7;i++){        
        if(nova_v_dt_agenda !=""){
            
            var objParametros = {
                "leads_pk": leads_pk,
                "dt_agenda": nova_v_dt_agenda,
                "dt_agenda_fim": nova_v_dt_agenda_fim,
                //"dia_semana": i
            };         
        
            var arrCarregar = carregarController("agenda_colaborador_padrao", "listarAgendaLeadData", objParametros);  
            if (arrCarregar.result == 'success'){
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
                    var strResultado="";
                    strResultado += "<div class='modal-content' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'  >";
                    strResultado += "<div style=''>" //color classificaçaõ
                    strResultado += "<div class='modal-body'><div class='row'>";
                    
                    var strResultadoFim="";
                    strResultadoFim="</div></div></div></div><br>";
                    
                   
                    if(arrCarregar.data[j]['t_ic_dom']==1){
                        
                        
                        $("#ds_agenda_dom_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_dom_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_dom_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_dom_passada").html(arrCarregar.data[j]['t_dom_ds_turnos']);
                        $("#ds_dia_semana_dom_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_dom_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_dom_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_dom_passada_pk").val(arrCarregar.data[j]['t_pk']);
                        
                        
                        if(arrCarregar.data[j]['t_ds_colaboradores_dom']!=null){

                                if($("#dt_agenda_dom_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_dom_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_dom_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_dom_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa);  
                                    
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_dom_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_dom_ds_turnos']+" ( "+hr_turno_dom+" - "+hr_turno_dom_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_dom']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(1,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_dom_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_dom_passada").html()+'"'+",1,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_dom_passada").html());
                                    }
                                    else{
                                        $(".ds_colaborador_dom_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_dom_ds_turnos']+" ( "+hr_turno_dom+" - "+hr_turno_dom_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_dom']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_dom']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(1,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_dom_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_dom']+'"'+","+'"'+$("#dt_agenda_dom_passada").html()+'"'+",1,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_dom_passada").html());
                                    }
                                    
                                }
                            
                        }
                        
                        
                        $("#ds_agenda_dom").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_dom").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_dom").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_dom").html(arrCarregar.data[j]['t_dom_ds_turnos']);
                        $("#ds_dia_semana_dom").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_dom").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_dom").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_dom_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_dom']!=null){
                                if($("#dt_agenda_dom").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_dom").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_dom").html(),
                                        "dt_agenda_fim": $("#dt_agenda_dom").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa);  

                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_dom").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_dom_ds_turnos']+" ( "+hr_turno_dom+" - "+hr_turno_dom_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_dom']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(1,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_dom_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_dom").html()+'"'+",1,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_dom").html());
                                    }
                                    else{  
                                        $(".ds_colaborador_dom").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_dom_ds_turnos']+" ( "+hr_turno_dom+" - "+hr_turno_dom_saida+" )</label><br>"+
                                                                                      "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_dom']+"</label><br>"+
                                                                                      "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_dom']+"</label><br>"+ 
                                                                                      "<a href='javascript:fcAbrirModalTarefa(1,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                      "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_dom_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_dom']+'"'+","+'"'+$("#dt_agenda_dom").html()+'"'+",1,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                      strResultadoFim+$(".ds_colaborador_dom").html());
                                    }
                                }
                            
                        }
                        
                        $("#ds_agenda_dom_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_dom_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_dom_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_dom_seguinte").html(arrCarregar.data[j]['t_dom_ds_turnos']);
                        $("#ds_dia_semana_dom_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_dom_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_dom_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_dom_seguinte_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_dom']!=null){
                                if($("#dt_agenda_dom_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_dom_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_dom_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_dom_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa);  
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_dom_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_dom_ds_turnos']+" ( "+hr_turno_dom+" - "+hr_turno_dom_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_dom']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(1,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_dom_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_dom_seguinte").html()+'"'+",1,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_dom_seguinte").html());
                                    }
                                    else{ 
                                        $(".ds_colaborador_dom_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_dom_ds_turnos']+" ( "+hr_turno_dom+" - "+hr_turno_dom_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_dom']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_dom']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(1,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_dom_ds_turnos']+'"'+","+'"'+hr_turno_dom+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_dom']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_dom']+'"'+","+'"'+$("#dt_agenda_dom_seguinte").html()+'"'+",1,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_dom_seguinte").html());
                                    }
                                }
                            
                        }
                    }
                    
                    if(arrCarregar.data[j]['t_ic_seg']==1){
                        
                        $("#ds_agenda_seg_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_seg_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_seg_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_seg_passada").html(arrCarregar.data[j]['t_seg_ds_turnos']);
                        $("#ds_dia_semana_seg_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_seg_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_seg_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_seg_passada_pk").val(arrCarregar.data[j]['t_pk']);
                        
                        if(arrCarregar.data[j]['t_ds_colaboradores_seg']!=null){

                                if($("#dt_agenda_seg_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_seg_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_seg_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_seg_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa);  
                                    
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_seg_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_seg_ds_turnos']+" ( "+hr_turno_seg+" - "+hr_turno_seg_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_seg']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(2,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_seg_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_seg_passada").html()+'"'+",2,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_seg_passada").html());
                                    }
                                    else{     
                                        $(".ds_colaborador_seg_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_seg_ds_turnos']+" ( "+hr_turno_seg+" - "+hr_turno_seg_saida+" )</label><br>"+
                                                                                      "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_seg']+"</label><br>"+
                                                                                      "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_seg']+"</label><br>"+ 
                                                                                      "<a href='javascript:fcAbrirModalTarefa(2,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                      "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_seg_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_seg']+'"'+","+'"'+$("#dt_agenda_seg_passada").html()+'"'+",2,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                      strResultadoFim+$(".ds_colaborador_seg_passada").html());
                                    }
                                }
                        }
                        
                        $("#ds_agenda_seg").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_seg").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_seg").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_seg").html(arrCarregar.data[j]['t_seg_ds_turnos']);
                        $("#ds_dia_semana_seg").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_seg").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_seg").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_seg_pk").val(arrCarregar.data[j]['t_pk']);
                        
                        if(arrCarregar.data[j]['t_ds_colaboradores_seg']!=null){
                                if($("#dt_agenda_seg").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_seg").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                     var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_seg").html(),
                                        "dt_agenda_fim": $("#dt_agenda_seg").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa);  
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_seg").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_seg_ds_turnos']+" ( "+hr_turno_seg+" - "+hr_turno_seg_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_seg']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(2,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_seg_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_seg").html()+'"'+",2,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_seg_passada").html());
                                    }
                                    else{
                                        $(".ds_colaborador_seg").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_seg_ds_turnos']+" ( "+hr_turno_seg+" - "+hr_turno_seg_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_seg']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_seg']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(2,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_seg_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_seg']+'"'+","+'"'+$("#dt_agenda_seg").html()+'"'+",2,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_seg").html());
                                    }
                                }
                        }
                        $("#ds_agenda_seg_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_seg_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_seg_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_seg_seguinte").html(arrCarregar.data[j]['t_seg_ds_turnos']);
                        $("#ds_dia_semana_seg_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_seg_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_seg_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_seg_seguinte_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_seg']!=null){
                                if($("#dt_agenda_seg_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_seg_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_seg_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_seg_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa);  
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_seg_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_seg_ds_turnos']+" ( "+hr_turno_seg+" - "+hr_turno_seg_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_seg']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(2,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_seg_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_seg_seguinte").html()+'"'+",2,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_seg_seguinte").html());
                                    }
                                    else{
                                        $(".ds_colaborador_seg_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_seg_ds_turnos']+" ( "+hr_turno_seg+" - "+hr_turno_seg_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_seg']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_seg']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(2,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_seg_ds_turnos']+'"'+","+'"'+hr_turno_seg+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_seg']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_seg']+'"'+","+'"'+$("#dt_agenda_seg_seguinte").html()+'"'+",2,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_seg_seguinte").html());
                                    }
                                }
                        }
                        

                    }

                    if(arrCarregar.data[j]['t_ic_ter']==1){
                       
                        $("#ds_agenda_ter_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_ter_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_ter_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_ter_passada").html(arrCarregar.data[j]['t_ter_ds_turnos']);
                        $("#ds_dia_semana_ter_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_ter_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_ter_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_ter_passada_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_ter']!=null){
                                if($("#dt_agenda_ter_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_ter_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_ter_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_ter_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         
                                    
                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_ter_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_ter_ds_turnos']+" ( "+hr_turno_ter+" - "+hr_turno_ter_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_ter']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(3,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_ter_passada").html()+'"'+",3,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim + $(".ds_colaborador_ter_passada").html());
                                                                    
                                    }
                                    else{
                                        $(".ds_colaborador_ter_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_ter_ds_turnos']+" ( "+hr_turno_ter+" - "+hr_turno_ter_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_ter']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_ter']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(3,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_ter']+'"'+","+'"'+$("#dt_agenda_ter_passada").html()+'"'+",3,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim + $(".ds_colaborador_ter_passada").html());
                                                                          
                                    }

                                }
                            
                        }
                        $("#ds_agenda_ter").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_ter").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_ter").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_ter").html(arrCarregar.data[j]['t_ter_ds_turnos']);
                        $("#ds_dia_semana_ter").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_ter").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_ter").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_ter_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_ter']!=null){
                                if($("#dt_agenda_ter").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_ter").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_ter").html(),
                                        "dt_agenda_fim": $("#dt_agenda_ter").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_ter").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_ter_ds_turnos']+" ( "+hr_turno_ter+" - "+hr_turno_ter_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_ter']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(3,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_ter").html()+'"'+",3,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+
                                                                          strResultadoFim +$(".ds_colaborador_ter").html());
                                    }
                                    else{
                                        $(".ds_colaborador_ter").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_ter_ds_turnos']+" ( "+hr_turno_ter+" - "+hr_turno_ter_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_ter']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_ter']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(3,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_ter']+'"'+","+'"'+$("#dt_agenda_ter").html()+'"'+",3,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_ter").html());
                                    }
                                }
                            
                        }
                        $("#ds_agenda_ter_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_ter_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_ter_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_ter_seguinte").html(arrCarregar.data[j]['t_ter_ds_turnos']);
                        $("#ds_dia_semana_ter_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_ter_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_ter_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_ter_seguinte_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_ter']!=null){
                           
                                if($("#dt_agenda_ter_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_ter_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_ter_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_ter_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_ter_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_ter_ds_turnos']+" ( "+hr_turno_ter+" - "+hr_turno_ter_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_ter']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(3,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_ter_seguinte").html()+'"'+",3,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_ter_seguinte").html());
                                    }
                                    else{
                                        $(".ds_colaborador_ter_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_ter_ds_turnos']+" ( "+hr_turno_ter+" - "+hr_turno_ter_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_ter']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_ter']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(3,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_ter']+'"'+","+'"'+$("#dt_agenda_ter_seguinte").html()+'"'+",3,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_ter_seguinte").html());
                                    }
                                }
                            
                        }
                        

                    }

                    if(arrCarregar.data[j]['t_ic_qua']==1){
                        $("#ds_agenda_qua_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_qua_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_qua_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_qua_passada").html(arrCarregar.data[j]['t_qua_ds_turnos']);
                        $("#ds_dia_semana_qua_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_qua_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_qua_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_qua_passada_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_qua']!=null){
                                if($("#dt_agenda_qua_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_qua_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_qua_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_qua_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_qua_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qua_ds_turnos']+" ( "+hr_turno_qua+" - "+hr_turno_qua_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qua']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(4,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qua_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_qua_passada").html()+'"'+",4,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_qua_passada").html());
                                    }
                                    else{
                                        $(".ds_colaborador_qua_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qua_ds_turnos']+" ( "+hr_turno_qua+" - "+hr_turno_qua_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qua']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_qua']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(4,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_ter_ds_turnos']+'"'+","+'"'+hr_turno_ter+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_ter']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_ter']+'"'+","+'"'+$("#dt_agenda_qua_passada").html()+'"'+",4,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_qua_passada").html());
                                    }
                                }
                        }
                            
                        $("#ds_agenda_qua").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_qua").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_qua").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_qua").html(arrCarregar.data[j]['t_qua_ds_turnos']);
                        $("#ds_dia_semana_qua").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_qua").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_qua").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_qua_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_qua']!=null){
                                if($("#dt_agenda_qua").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_qua").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_qua").html(),
                                        "dt_agenda_fim": $("#dt_agenda_qua").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_qua").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qua_ds_turnos']+" ( "+hr_turno_qua+" - "+hr_turno_qua_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qua']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(4,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qua_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_qua").html()+'"'+",4,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_qua").html());
                                    }
                                    else{
                                        $(".ds_colaborador_qua").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qua_ds_turnos']+" ( "+hr_turno_qua+" - "+hr_turno_qua_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qua']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_qua']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(4,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qua_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_qua']+'"'+","+'"'+$("#dt_agenda_qua").html()+'"'+",4,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_qua").html());
                                    }
                                }
                        }
                            
                        $("#ds_agenda_qua_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_qua_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_qua_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_qua_seguinte").html(arrCarregar.data[j]['t_qua_ds_turnos']);
                        $("#ds_dia_semana_qua_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_qua_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_qua_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_qua_seguinte_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_qua']!=null){
                                if($("#dt_agenda_qua_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_qua_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_qua_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_qua_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_qua_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qua_ds_turnos']+" ( "+hr_turno_qua+" - "+hr_turno_qua_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qua']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(4,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qua_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_qua_seguinte").html()+'"'+",4,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_qua_seguinte").html());
                                    }
                                    else{
                                        $(".ds_colaborador_qua_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qua_ds_turnos']+" ( "+hr_turno_qua+" - "+hr_turno_qua_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qua']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_qua']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(4,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qua_ds_turnos']+'"'+","+'"'+hr_turno_qua+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qua']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_qua']+'"'+","+'"'+$("#dt_agenda_qua_seguinte").html()+'"'+",4,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_qua_seguinte").html());
                                    }
                                }
                        }
                            
                    }
                        
                    if(arrCarregar.data[j]['t_ic_qui']==1){
                        $("#ds_agenda_qui_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_qui_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_qui_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_qui_passada").html(arrCarregar.data[j]['t_qui_ds_turnos']);
                        $("#ds_dia_semana_qui_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_qui_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_qui_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_qui_passada_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_qui']!=null){
                                if($("#dt_agenda_qui_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_qui_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_qui_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_qui_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_qui_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qui_ds_turnos']+" ( "+hr_turno_qui+" - "+hr_turno_qui_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qui']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(5,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qui_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_qui_passada").html()+'"'+",5,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_qui_passada").html());
                                    }
                                    else{    
                                            $(".ds_colaborador_qui_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qui_ds_turnos']+" ( "+hr_turno_qui+" - "+hr_turno_qui_saida+" )</label><br>"+
                                                                                      "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qui']+"</label><br>"+
                                                                                      "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_qui']+"</label><br>"+ 
                                                                                      "<a href='javascript:fcAbrirModalTarefa(5,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                      "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qui_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_qui']+'"'+","+'"'+$("#dt_agenda_qui_passada").html()+'"'+",5,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                      strResultadoFim+$(".ds_colaborador_qui_passada").html());
                                    }
                            }
                        }
                            
                        $("#ds_agenda_qui").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_qui").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_qui").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_qui").html(arrCarregar.data[j]['t_qui_ds_turnos']);
                        $("#ds_dia_semana_qui").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_qui").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_qui").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_qui_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_qui']!=null){
                            if(arrCarregar.data[j]['t_ds_colaboradores_qui']!=null){
                                if($("#dt_agenda_qui").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_qui").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_qui").html(),
                                        "dt_agenda_fim": $("#dt_agenda_qui").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_qui").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qui_ds_turnos']+" ( "+hr_turno_qui+" - "+hr_turno_qui_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qui']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(5,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qui_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_qui").html()+'"'+",5,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_qui").html());
                                    }
                                    else{ 
                                        $(".ds_colaborador_qui").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qui_ds_turnos']+" ( "+hr_turno_qui+" - "+hr_turno_qui_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qui']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_qui']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(5,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                   "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qui_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_qui']+'"'+","+'"'+$("#dt_agenda_qui").html()+'"'+",5,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_qui").html());
                                    }
                                }
                            }
                        }
                        $("#ds_agenda_qui_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_qui_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_qui_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_qui_seguinte").html(arrCarregar.data[j]['t_qui_ds_turnos']);
                        $("#ds_dia_semana_qui_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_qui_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_qui_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_qui_seguinte_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_qui']!=null){
                                if($("#dt_agenda_qui_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_qui_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_qui_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_qui_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_qui_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qui_ds_turnos']+" ( "+hr_turno_qui+" - "+hr_turno_qui_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qui']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(5,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qui_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_qui_seguinte").html()+'"'+",5,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_qui_seguinte").html());
                                    }
                                    else{    
                                        $(".ds_colaborador_qui_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_qui_ds_turnos']+" ( "+hr_turno_qui+" - "+hr_turno_qui_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_qui']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_qui']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(5,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_qui_ds_turnos']+'"'+","+'"'+hr_turno_qui+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_qui']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_qui']+'"'+","+'"'+$("#dt_agenda_qui_seguinte").html()+'"'+",5,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_qui_seguinte").html());
                                        }
                                    }
                        }
                    }
                            

                    if(arrCarregar.data[j]['t_ic_sex']==1){
                        $("#ds_agenda_sex_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_sex_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_sex_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_sex_passada").html(arrCarregar.data[j]['t_sex_ds_turnos']);
                        $("#ds_dia_semana_sex_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_sex_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_sex_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_sex_passada_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_sex']!=null){
                                if($("#dt_agenda_sex_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_sex_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                   var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_sex_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_sex_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_sex_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sex+" - "+hr_turno_sex_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(6,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sex_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_sex_passada").html()+'"'+",6,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_sex_passada").html());
                                    }
                                    else{      
                                        $(".ds_colaborador_sex_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sex+" - "+hr_turno_sex_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_sex']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(6,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sex_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_sex']+'"'+","+'"'+$("#dt_agenda_sex_passada").html()+'"'+",6,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_sex_passada").html());
                                    }
                                }
                        }
                        $("#ds_agenda_sex").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_sex").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_sex").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_sex").html(arrCarregar.data[j]['t_sex_ds_turnos']);
                        $("#ds_dia_semana_sex").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_sex").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_sex").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_sex_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_sex']!=null){
                                if($("#dt_agenda_sex").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_sex").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_sex").html(),
                                        "dt_agenda_fim": $("#dt_agenda_sex").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_sex").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sex+" - "+hr_turno_sex_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(6,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sex_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_sex").html()+'"'+",6,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_sex").html());
                                    }
                                    else{        
                                        $(".ds_colaborador_sex").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sex+" - "+hr_turno_sex_saida+" )</label><br>"+
                                                                              "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                              "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_sex']+"</label><br>"+ 
                                                                              "<a href='javascript:fcAbrirModalTarefa(6,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                              "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sex_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_sex']+'"'+","+'"'+$("#dt_agenda_sex").html()+'"'+",6,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                              strResultadoFim+$(".ds_colaborador_sex").html());
                                    }
                                }
                        }
                            
                        $("#ds_agenda_sex_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_sex_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_sex_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_sex_seguinte").html(arrCarregar.data[j]['t_sex_ds_turnos']);
                        $("#ds_dia_semana_sex_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_sex_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_sex_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_sex_seguinte_pk").val(arrCarregar.data[j]['t_pk']);
                        if(arrCarregar.data[j]['t_ds_colaboradores_sex']!=null){
                                if($("#dt_agenda_sex_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_sex_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_sex_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_sex_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_sex_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sex+" - "+hr_turno_sex_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(6,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sex_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_sex_seguinte").html()+'"'+",6,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_sex_seguinte").html());
                                    }
                                    else{         
                                        $(".ds_colaborador_sex_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sex+" - "+hr_turno_sex_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_sex']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(6,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sex_ds_turnos']+'"'+","+'"'+hr_turno_sex+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sex']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_sex']+'"'+","+'"'+$("#dt_agenda_sex_seguinte").html()+'"'+",6,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_sex_seguinte").html());
                                        }
                                    }
                        }
                            
                    }
//------------------------------------------SABADO--------------------------------------------------------------------------                    
                    if(arrCarregar.data[j]['t_ic_sab']==1){
                        $("#ds_agenda_sab_passada").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_sab_passada").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_sab_passada").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_sab_passada").html(arrCarregar.data[j]['t_sab_ds_turnos']);
                        $("#ds_dia_semana_sab_passada").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_sab_passada").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_sab_passada").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_sab_passada_pk").val(arrCarregar.data[j]['t_pk']);    
                        if(arrCarregar.data[j]['t_ds_colaboradores_sab']!=null){
                                if($("#dt_agenda_sab_passada").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_sab_passada").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                     var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_sab_passada").html(),
                                        "dt_agenda_fim": $("#dt_agenda_sab_passada").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_sab_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sab_ds_turnos']+" ( "+hr_turno_sab+" - "+hr_turno_sab_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sab']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(7,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sab_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_sab_passada").html()+'"'+",7,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_sab_passada").html());
                                    }
                                    else{      
                                        $(".ds_colaborador_sab_passada").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sab+" - "+hr_turno_sab_saida+" )</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                                  "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_sex']+"</label><br>"+ 
                                                                                  "<a href='javascript:fcAbrirModalTarefa(7,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                                  "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sab_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_sab']+'"'+","+'"'+$("#dt_agenda_sab_passada").html()+'"'+",7,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                                  strResultadoFim+$(".ds_colaborador_sab_passada").html());
                                    }
                                }
                        }
                            
                        $("#ds_agenda_sab").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_sab").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_sab").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_sab").html(arrCarregar.data[j]['t_sab_ds_turnos']);
                        $("#ds_dia_semana_sab").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_sab").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_sab").html(arrCarregar.data[j]['t_qtde_colaborador']);
                        $("#agenda_sab_pk").val(arrCarregar.data[j]['t_pk']);    
                        if(arrCarregar.data[j]['t_ds_colaboradores_sab']!=null){
                                if($("#dt_agenda_sab").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_sab").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                    var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_sab").html(),
                                        "dt_agenda_fim": $("#dt_agenda_sab").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_sab").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sab_ds_turnos']+" ( "+hr_turno_sab+" - "+hr_turno_sab_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sab']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(7,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sab_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_sab").html()+'"'+",7,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_sab").html());
                                    }
                                    else{     
                                        $(".ds_colaborador_sab").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sab+" - "+hr_turno_sab_saida+" )</label><br>"+
                                                                              "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                              "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_sex']+"</label><br>"+ 
                                                                              "<a href='javascript:fcAbrirModalTarefa(7,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                              "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sab_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_sab']+'"'+","+'"'+$("#dt_agenda_sab").html()+'"'+",7,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                              strResultadoFim+$(".ds_colaborador_sab").html());
                                    }
                                }
                        }
                            
                        $("#ds_agenda_sab_seguinte").html(arrCarregar.data[j]['t_ds_agenda']);
                        $("#dt_inicio_agenda_sab_seguinte").html(arrCarregar.data[j]['t_dt_inicio_agenda']);
                        $("#dt_fim_agenda_sab_seguinte").html(arrCarregar.data[j]['t_dt_fim_agenda']);
                        $("#ds_turno_sab_seguinte").html(arrCarregar.data[j]['t_sab_ds_turnos']);
                        $("#ds_dia_semana_sab_seguinte").html(arrCarregar.data[j]['t_ds_dias_semana_pk']);
                        $("#ds_produto_servico_sab_seguinte").html(arrCarregar.data[j]['t_ds_produto_servico']);
                        $("#qtde_colaborador_sab_seguinte").html(arrCarregar.data[j]['t_qtde_colaborador']);
                         $("#agenda_sab_seguinte_pk").val(arrCarregar.data[j]['t_pk']);    
                        if(arrCarregar.data[j]['t_ds_colaboradores_sab']!=null){
                            if($("#dt_agenda_sab_seguinte").html() >= arrCarregar.data[j]['t_dt_inicio_agenda'] &&  $("#dt_agenda_sab_seguinte").html() <= arrCarregar.data[j]['t_dt_fim_agenda'] ){      
                                var objParametrosPausa = {
                                        "colaborador_pk": arrCarregar.data[j]['t_colaboradores_pk'],
                                        "dt_agenda": $("#dt_agenda_sab_seguinte").html(),
                                        "dt_agenda_fim": $("#dt_agenda_sab_seguinte").html(),
                                        "turnos_pk": arrCarregar.data[j]['t_turnos_pk'],
                                        //"dia_semana": i
                                    };         

                                    var arrCarregarPausa = carregarController("agenda_colaborador_pausa", "listarPausa", objParametrosPausa); 
                                    if(arrCarregarPausa.data.length > 0){
                                        $(".ds_colaborador_sab_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sab_ds_turnos']+" ( "+hr_turno_sab+" - "+hr_turno_sab_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sab']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregarPausa.data[0]['t_ds_colaboradores']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(7,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sab_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+arrCarregarPausa.data[0]['t_ds_colaboradores']+'"'+","+'"'+$("#dt_agenda_sab_seguinte").html()+'"'+",7,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregarPausa.data[0]['t_colaborador_substituto_pk']+","+arrCarregar.data[j]['t_contratos_pk']+","+arrCarregarPausa.data[0]['t_pk']+")'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                            strResultadoFim+$(".ds_colaborador_sab_seguinte").html());
                                    }
                                    else{      
                                        $(".ds_colaborador_sab_seguinte").html(strResultado+"<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/turno.png'> "+arrCarregar.data[j]['t_sex_ds_turnos']+" ( "+hr_turno_sab+" - "+hr_turno_sab_saida+" )</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/produto_servico.png'> "+arrCarregar.data[j]['t_ds_produto_servico_sex']+"</label><br>"+
                                                                          "<label id='grupo' class='col-sm-12' style='font-size: 14px;'><img width=28 height=28 src='../img/responsavel.png'> "+arrCarregar.data[j]['t_ds_colaboradores_sex']+"</label><br>"+ 
                                                                          "<a href='javascript:fcAbrirModalTarefa(7,"+arrCarregar.data[j]['t_pk']+")'><img border='0' src='../img/relatorio.png' width='28' height='28'></a><br>"+ 
                                                                          "<a href='javascript:abrirModal("+'"'+arrCarregar.data[j]['t_sab_ds_turnos']+'"'+","+'"'+hr_turno_sab+'"'+","+'"'+arrCarregar.data[j]['t_ds_produto_servico_sab']+'"'+","+'"'+arrCarregar.data[j]['t_ds_colaboradores_sab']+'"'+","+'"'+$("#dt_agenda_sab_seguinte").html()+'"'+",7,"+arrCarregar.data[j]['t_produto_servico_pk']+","+arrCarregar.data[j]['t_turnos_pk']+","+arrCarregar.data[j]['t_colaboradores_pk']+","+arrCarregar.data[j]['t_contratos_pk']+",0)'><img border='0' src='../img/change_01.png' width='28' height='28'></a><br>"+ 
                                                                          strResultadoFim+$(".ds_colaborador_sab_seguinte").html());
                                    } 
                            } 
                        }

                    }

                }
            }
            else{
                alert('Falhar ao carregar o registro');
            }
        } 
    //} 
}

function fcCarregar(){   

    fcLimparVariaveisSemana();
    
    //CARREGA AS DATAS DAS SEMANAS
    var DTsemana1 = fcCarregarDataSemana();  
  
    //CARREGA AS VISITAS POS SEMANA
    fcCarregarSemana();
}

function fcPosicaoDataSemana01(){
    var v_dt_agenda = $("#dt_agenda").val();
    
    if(v_dt_agenda !=""){
        var objParametros = {
            "dt_agenda": v_dt_agenda  
        };      
        var arrCarregar = carregarController("agenda_colaborador_padrao", "listarData", objParametros);  
         
        if (arrCarregar.result == 'success'){      
            var posicao_data = arrCarregar.data[0]['dia_semana'];
        }else{
            alert('Falhar ao carregar o registro');
        }

        return posicao_data;
    }
}



function fcCarregarEscala(v_data_semana_passada){   
    
     var v_dt_agenda = $("#dt_agenda").val();
         
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    
    
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, (partesDt_base[0]));
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana01());
       
    var v_dia = "";
    if(nova_data.getDate()<10){
        v_dia = "0";
    }
    
    var v_mes = "";
    if(nova_data.getMonth()<10){
        v_mes = "0";
    }
    
    if((nova_data.getDate()-7)<=0){
        var day = 1;
    }
    else{
        var day = (nova_data.getDate()-7);
    }
     //gera a data do começo da semana 
    var nova_v_dt_agenda =  v_dia+day+"/"+v_mes+(nova_data.getMonth()+1)+"/"+nova_data.getFullYear();

      //separa a data 
        var p_nova_dt_agenda = nova_v_dt_agenda.split("/");

        //pega a data que ja passou pelo for 
        var nova_dt_agenda_dia_anterior = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);
        var nova_dt_agenda_dia_proximo = new Date(p_nova_dt_agenda[2], p_nova_dt_agenda[1] - 1, p_nova_dt_agenda[0]);

        //a cada looping acrescenta mais um dia 
        nova_dt_agenda_dia_proximo.setDate(nova_dt_agenda_dia_anterior.getDate() + 20);

        //gera a data do dia seguinte

         var v_dia_fim = "";
        if(nova_dt_agenda_dia_proximo.getDate()<10){
            v_dia_fim = "0";
        }

        var v_mes_fim = "";
        if(nova_dt_agenda_dia_proximo.getMonth()<10){
            v_mes_fim = "0";
        }

        
        var nova_v_dt_agenda_fim =  v_dia_fim+nova_dt_agenda_dia_proximo.getDate()+"/"+v_mes_fim+(nova_dt_agenda_dia_proximo.getMonth()+1)+"/"+nova_dt_agenda_dia_proximo.getFullYear();
       
     
        
}

function fcCarregarDataSemana(){    
    //joga as data em uma variavel    
    
    
    //joga as data em uma variavel     
    var v_dt_agenda = $("#dt_agenda").val();

    
    //Separa as datas  dia,mes,ano
    var partesDt_base = v_dt_agenda.split("/");

    
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var data_base = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    var nova_data = new Date(partesDt_base[2], partesDt_base[1] - 1, partesDt_base[0]);
    
    //subtrai de acordo com a posicao do dia da semana
    nova_data.setDate(data_base.getDate() - fcPosicaoDataSemana01());
    var v_semana = "";
    var v_dia_semana = "";
    
   
    
    //gera a data do começo da semana
    
    var nova_v_dt_agenda = 0;
    var dia_comeco = 0;
    var mes_comeco = 0;
    var ano_comeco = 0;
    
    var day = (nova_data.getDate()-7);
    
     //gera a data do começo da semana 
    if((nova_data.getDate()-7)<10){
        dia_comeco = "0"+(day);
        mes_comeco = (nova_data.getMonth()+1);
        ano_comeco = nova_data.getFullYear();
    } else{
        dia_comeco = (day);
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
    
    if((nova_data.getDate()-7)<=0){
        dia_comeco = 31 - (nova_data.getDate()-7);
        mes_comeco = (nova_data.getMonth());
        ano_comeco = nova_data.getFullYear();
    }
    
    
    var dt_ver = (dia_comeco)+"/"+mes_comeco+"/"+ano_comeco;
    var ArrDataV = dt_ver.split("/");
    //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
    //0 dia; 1 mes; 2 ano
    var dt_semanav = new Date(ArrDataV[2], ArrDataV[1] - 1, ArrDataV[0]);   
        
    if(dt_semanav.getDay()!=0){   
        nova_v_dt_agenda = (dia_comeco-dt_semanav.getDay())+"/"+mes_comeco+"/"+ano_comeco;
        
    }
    else{
         nova_v_dt_agenda = (dia_comeco)+"/"+mes_comeco+"/"+ano_comeco;
    }
    for(i=0;i<21;i++){
        if(nova_v_dt_agenda !=""){
            var ArrData = nova_v_dt_agenda.split("/");
            //exemplo de como as datas são montadas: Mon Jul 16 2018 00:00:00 GMT-0300 (Hora oficial do Brasil);
            //0 dia; 1 mes; 2 ano
            var dt_semana = new Date(ArrData[2], ArrData[1] - 1, ArrData[0]);   
            var dia = nova_v_dt_agenda.split("/");
                //PRIMEIRA SEMANA 
                if(i<=6){
                    
                    
                    if(dt_semana.getDay()==0){
                        if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_dom_passada").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                //alert(nova_v_dt_agenda);
                                $("#dt_agenda_dom_passada").html(nova_v_dt_agenda);
                            } 
                        $("#dia_semana_dom_passada").html("Dom");


                   }else if(dt_semana.getDay()==1){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_seg_passada").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_seg_passada").html(nova_v_dt_agenda);
                        } 
                        $("#dia_semana_seg_passada").html("Seg");


                   }else if(dt_semana.getDay()==2){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_ter_passada").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_ter_passada").html(nova_v_dt_agenda);
                        } 
                        $("#dia_semana_ter_passada").html("Ter");

                   }else if(dt_semana.getDay()==3){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_qua_passada").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_qua_passada").html(nova_v_dt_agenda);
                        } 
                        $("#dia_semana_qua_passada").html("Qua");


                   }else if(dt_semana.getDay()==4){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_qui_passada").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_qui_passada").html(nova_v_dt_agenda);
                        } 
                       $("#dia_semana_qui_passada").html("Qui");

                   } else if(dt_semana.getDay()==5){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_sex_passada").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_sex_passada").html(nova_v_dt_agenda);
                        } 
                        $("#dia_semana_sex_passada").html("Sex");

                   }else if(dt_semana.getDay()==6){
                       if(v_dt_agenda==nova_v_dt_agenda){
                        $("#dt_agenda_sab_passada").html(nova_v_dt_agenda).css("color", "blue");
                    }
                    else{
                        $("#dt_agenda_sab_passada").html(nova_v_dt_agenda);
                    } 
                    $("#dia_semana_sab_passada").html("Sab");

                   }  
                }
                
                //SEGUNDA SEMANA 
                if(i>=7 && i < 14){
                     if(dt_semana.getDay()==0){

                        if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_dom").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_dom").html(nova_v_dt_agenda);
                        }
                        $("#dia_semana_dom").html("Dom");

                        
                    }else if(dt_semana.getDay()==1){

                        if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_seg").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_seg").html(nova_v_dt_agenda);
                        }

                        $("#dia_semana_seg").html("Seg");


                    }else if(dt_semana.getDay()==2){
                        if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_ter").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_ter").html(nova_v_dt_agenda);
                        }

                        $("#dia_semana_ter").html("Ter");

                        
                   }else if(dt_semana.getDay()==3){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_qua").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_qua").html(nova_v_dt_agenda);
                        }

                        $("#dia_semana_qua").html("Qua");

                   }else if(dt_semana.getDay()==4){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_qui").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_qui").html(nova_v_dt_agenda);
                        }
                        $("#dia_semana_qui").html("Qui");

                   } else if(dt_semana.getDay()==5){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_sex").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_sex").html(nova_v_dt_agenda);
                        } 

                        $("#dia_semana_sex").html("Sex");

                   }else if(dt_semana.getDay()==6){
                       if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_sab").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_sab").html(nova_v_dt_agenda);
                        }

                        $("#dia_semana_sab").html("Sab");

                   }    
                }
                
                //TERCEIRA SEMANA 
                if(i>=14 && i < 21){
                     if(dt_semana.getDay()==0){
                         if(v_dt_agenda==nova_v_dt_agenda){
                            $("#dt_agenda_dom_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                        }
                        else{
                            $("#dt_agenda_dom_seguinte").html(nova_v_dt_agenda);
                        }

                        $("#dia_semana_dom_seguinte").html("Dom");

                            
                           
                       }else if(dt_semana.getDay()==1){

                            if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_seg_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                $("#dt_agenda_seg_seguinte").html(nova_v_dt_agenda);
                            }

                            $("#dia_semana_seg_seguinte").html("Seg");


                       }else if(dt_semana.getDay()==2){

                           if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_ter_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                $("#dt_agenda_ter_seguinte").html(nova_v_dt_agenda);
                            }                          
                           
                           
                            $("#dia_semana_ter_seguinte").html("Ter");

                            
                       }else if(dt_semana.getDay()==3){
                           
                           
                           if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_qua_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                $("#dt_agenda_qua_seguinte").html(nova_v_dt_agenda);
                            }   
                            $("#dia_semana_qua_seguinte").html("Qua");

                       }else if(dt_semana.getDay()==4){
                           
                           if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_qui_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                $("#dt_agenda_qui_seguinte").html(nova_v_dt_agenda);
                            }       
                            $("#dia_semana_qui_seguinte").html("Qui");

                       } else if(dt_semana.getDay()==5){
                           if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_sex_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                $("#dt_agenda_sex_seguinte").html(nova_v_dt_agenda);
                            }  
                            $("#dia_semana_sex_seguinte").html("Sex");

                       }else if(dt_semana.getDay()==6){
                           
                           if(v_dt_agenda==nova_v_dt_agenda){
                                $("#dt_agenda_sab_seguinte").html(nova_v_dt_agenda).css("color", "blue");
                            }
                            else{
                                $("#dt_agenda_sab_seguinte").html(nova_v_dt_agenda);
                            } 
                           $("#dia_semana_sab_seguinte").html("Sab");

                       }
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


function fcLimparVariaveisSemana(){
    var v_semana = "";
    var v_dia_semana = "";
    
    for(j=0;j<3;j++){
        if(j==0){
            v_semana = "_passada";
        }else if(j==1){
            v_semana = "";
        }else if(j==2){
            v_semana = "_seguinte";
        }        
       
        for(i=0;i<7;i++){ 
            if(i==0){
                v_dia_semana = "dom";
            }else if(i==1){
                v_dia_semana = "seg";
            }else if(i==2){
                v_dia_semana = "ter";
            }else if(i==3){
                v_dia_semana = "qua";
            }else if(i==4){
                v_dia_semana = "qui";
            }else if(i==5){
                v_dia_semana = "sex";
            }else if(i==6){
                v_dia_semana = "seb";
            }
            
            $(".escala").html("");
            $(".escala_qtde_contratado").html("");
            
            $("#ds_agenda_"+v_dia_semana+v_semana).html("");
            $("#dt_inicio_agenda_"+v_dia_semana+v_semana).html("");
            $("#dt_fim_agenda_"+v_dia_semana+v_semana).html("");
            $("#ds_turno_"+v_dia_semana+v_semana).html("");
            $("#ds_dia_semana_"+v_dia_semana+v_semana).html("");
            $("#ds_produto_servico_"+v_dia_semana+v_semana).html("");
            $("#qtde_colaborador_"+v_dia_semana+v_semana).html("");
            $(".ds_colaborador_"+v_dia_semana+v_semana).html("");
            $("#dt_agenda_"+v_dia_semana+v_semana).html("");
            $("#dia_semana_"+v_dia_semana+v_semana).html("");
            $("#dt_agenda_"+v_dia_semana+v_semana).html("").css("color", "");
        }   
    }             
}



//----------------------------------------------------------------------------------------MODAL------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function fcLimparVariavelColaborador(){
    $("#ds_turno_agenda").html("");
    $("#ds_servico_agenda").html("");
    $("#ds_colaborador_atual_agenda").html("");
    $("#dt_base_modal").html("");
    $("#dt_base_inclusao_modal").val("");
    $("#dias_semana_inclusao").val("");
    $("#produtos_servicos_pk").val("");
    $("#turnos_pk").val("");
    $("#agenda_contratos_pk").val("");
    $("#colaborador_atual_pk").val("");
    $("#ds_obs").val("");
    $("#pausa_pk").val("");
}
function abrirModal(ds_turno,hr_turno,ds_produto_servico,ds_colaborador,dt_agenda,dia_semana,produtos_servicos_pk,turnos_pk,colaborador_atual_pk,contratos_pk,pausa_pk){
    
    var arrCarregar = permissao("agenda_colaborador", "ins");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    fcLimparVariavelColaborador();
    
    $("#ds_turno_agenda").html("Turno:  "+ds_turno+" ("+hr_turno+")");
    $("#ds_servico_agenda").html("Serviço:  "+ds_produto_servico);
    $("#ds_colaborador_atual_agenda").html("Colaborador Atual:  "+ds_colaborador);
    $("#dt_base_modal").html(dt_agenda);
    $("#dt_base_inclusao_modal").val(dt_agenda);
    $("#dias_semana_inclusao").val(dia_semana);
    $("#produtos_servicos_pk").val(produtos_servicos_pk);
    $("#turnos_pk").val(turnos_pk);
    $("#colaborador_atual_pk").val(colaborador_atual_pk);
    $("#agenda_contratos_pk").val(contratos_pk);
    if(pausa_pk!=0){
        $("#pausa_pk").val(pausa_pk);
    }
    

    fcCarregarColaboradores();

    fcCarregarMotivoAlteracaoEscala();

    $("#janela_escala").modal();
    
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
        alert(arrEnviar.message);
        $("#janela_escala").modal("hide");
        $("#loader").show();
        $("#exibir").hide();
        window.setTimeout(function(){
            fcCarregar();
           $("#loader").hide();
           $("#exibir").show();
        }, 200);
        
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
            
            $(".ds_condominio").html("Lead - "+arrCarregar.data[0]['ds_lead']);

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

function fcAbrirModalTarefa(ic_dia_semana,agendas_pk){

    
    $("#ic_dia").val("");
    $("#ds_tarefa").val("");
    $("#obs_tarefa").val("");
    $("#hr_inicio").val("");
    $("#ic_dia").val(ic_dia_semana);
    $("#agendas_pk").val(agendas_pk);
    
    
    
    
    $("#modal_tarefa").modal();
    window.setTimeout(function(){
    tblTarefa.clear().destroy();
    
    fcFormatarGrid();
    }, 200);
    
}
function fcFormatarGrid(){
       
   var objParametros = {
        "agendas_pk": $("#agendas_pk").val(),
        "ic_dia":$("#ic_dia").val()
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
           {"targets": -3, "data": "obs_tarefa"},
           {"targets": -4, "data": "ds_tarefa"},
           {"targets": -5, "data": "pk"},
           

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
    var objParametros = {
        "agendas_pk": $("#agendas_pk").val(),
        "pk":"",
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

$(document).ready(function(){
 
    var arrCarregar = permissao("agenda_condominio", "ins");       
  
             
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
     
    //fcGridDados();
    
    //fcCarregarEtapasProcesso();
    $(document).on('click', '#cmdEnviar', fcCarregar);
    $(document).on('click', '#cmdIncluir', fcIncluirColaboradorPausa);
    
    
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
    
    
    //carrega datepicker com a data atual
    $('#dt_agenda').datepicker({defaultDate: "getDate()",
            dateFormat: 'dd/mm/yyyy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            changeMonth: false,
            numberOfMonths: 1,
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true,
            todayBtn: "linked",
            minDate: 0
        }).datepicker("setDate", new Date() );
    

    $("#dt_agenda").keypress(function(){
        mascara(this, mdata);
    }); 
    
    
    fcLimparVariaveisSemana();    

    fcCarregarLead();
    
    //fcCarregarTurno();

    fcCarregar();

    //TAREFA
    $(document).on('click', '#btntarefa', fcSalvarTarefa);
    fcFormatarGrid();
    $("#hr_inicio").keypress(function(){
       mascara(this,horamask);
    });
    
    $("#loader").hide();
    $("#exibir").show();
   
});


