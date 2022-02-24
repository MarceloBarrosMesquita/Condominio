var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();  
var countUltDia = 0 ;  

if(dd<10) {
    dd = '0'+dd
} 
if(mm<10) {
    mm = '0'+mm
}   
var dtAtual = dd+'/'+mm+'/'+yyyy;



function fcDatasCaleandario(label,acao){
    
    
    $("#grid_dia_mes_semana").append(""); 
    $("#grid_dia_mes_semana").empty(""); 
    
    
    
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

    //fcCarregarDataSemana();
    
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
    
    
    if($("#intSemana").val()==1){
         countUltDia = 7;
    }
    else{
         countUltDia = ultimoDia.getDate();
    }
    var nova_v_dt_agenda = dd +"/"+mm+"/"+yyyy;
    

    
    
    //CARREGAR O HTML DO CALENDARIO
    fcCarregarDiaSemanaEMesGrid();
    
    
    
    for(i=0;i<countUltDia;i++){
     
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
                    $(".dia_mes"+i).html("Dom " +dia).css("color", "blue");
                }
                else{
                    //alert(nova_v_dt_agenda);
                    $(".dia_mes"+i).html("Dom " +dia).css("fontSize", "10");
                } 
           }else if(dt_semana.getDay()==1){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html("Seg " +dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html("Seg " +dia).css("fontSize", "10");
                } 
           }else if(dt_semana.getDay()==2){
               
               if(dtAtual==nova_v_dt_agenda){

                    $(".dia_mes"+i).html("Ter " +dia).css("color", "blue");
                }
                else{
                    
                    $(".dia_mes"+i).html("Ter " +dia).css("fontSize", "10")
                } 
           }else if(dt_semana.getDay()==3){
               
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html("Qua " +dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html("Qua " +dia).css("fontSize", "10")
                } 
           }else if(dt_semana.getDay()==4){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html("Qui " +dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html("Qui " +dia).css("fontSize", "10")
                } 
            } else if(dt_semana.getDay()==5){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html("Sex " +dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html("Sex " +dia).css("fontSize", "10")
                } 
           }else if(dt_semana.getDay()==6){
               if(dtAtual==nova_v_dt_agenda){
                    $(".dia_mes"+i).html("Sab " +dia).css("color", "blue");
                }
                else{
                    $(".dia_mes"+i).html("Sab " + dia).css("fontSize", "10")
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
    
    
}

function fcCarregarDiaSemanaEMesGrid(){
    
    
    var strRetorno = "";

    strRetorno+="<div class='row'><div class='col-md-12'>";
    strRetorno+="<table id='tabela' class='table table-striped table-bordered tblResultado' style='width:100%' id='tblResultado' >";
    strRetorno+="<thead><tr>";
    
    strRetorno+="   <td width='30%'><input type='text' class='form-control' style='min-width:130px;' id='txtPostoTrabalho' /></td>";
    strRetorno+="   <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtColaborador' /></td>";
    strRetorno+="   <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtQualificacao' /></td>";
    strRetorno+="   <td width='5%'><input type='text' class='form-control' style='min-width:130px;' id='txtEscala' /></td>";
    strRetorno+="   <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtStatus' /></td>";
    strRetorno+="   <td width='15%'><input type='text' class='form-control' style='min-width:130px;' id='txtApontamento' /></td>";
    for(i=(0);i<countUltDia;i++){
        strRetorno+="<td align='center'><b><div class='dia_mes"+i+"'></b></td>";
    }
    strRetorno+="</tr>";
    strRetorno+="<tr>";
    
    strRetorno+="</tr>";
    strRetorno+="</thead>";
    strRetorno+="<tbody>";
    
    
    strRetorno+="</tbody>";
    strRetorno+="</table>";
    strRetorno+="</div>";
    strRetorno+="</div>";
    strRetorno+="<hr><br>";
    
    
    $("#grid_dia_mes_semana").append(strRetorno); 
       

}




$(document).ready(function()
    {
        
        
        //CARREGAR PASSAGEM DE MÊS
        fcDatasCaleandario('','');

        $(document).on('click', '#cmdPreviMes', function () {  
            $("#loader").show();
            $("#exibir").hide();

            setTimeout(function(){ fcDatasCaleandario('mes','anterior'); }, 500);
        } );

        $(document).on('click', '#cmdNextMes', function () {  
            $("#loader").show();
            $("#exibir").hide();

            setTimeout(function(){ fcDatasCaleandario('mes','proximo'); }, 500);
        } );    

        $(document).on('click', '#cmdPreviAno', function () {  
            $("#loader").show();
            $("#exibir").hide();

            setTimeout(function(){ fcDatasCaleandario('ano','anterior'); }, 500);
        } );    

        $(document).on('click', '#cmdNextAno', function () { 
            $("#loader").show();
            $("#exibir").hide();
            setTimeout(function(){ fcDatasCaleandario('ano','proximo'); }, 500);

        } );
        
        
    }
);