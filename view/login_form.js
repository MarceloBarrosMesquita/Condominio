
function fcEnviar(){
    
    event.preventDefault();
    
    var v_ds_login = $("#ds_login").val();
    var v_ds_senha = $("#ds_senha").val();
    
    
    if(v_ds_login==""){
        $("#alert_login").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_login").slideUp(500);
        });
        $('#ds_login').focus();
        return false;
    }
    if(v_ds_senha==""){
        $("#alert_senha").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_senha").slideUp(500);
        });
        $('#ds_senha').focus();
        return false;
    }
    
    var url = '../controller/usuario.controller.php?job=autenticarUsuario&ds_login=' + encodeURIComponent(v_ds_login)+ '&ds_senha=' + encodeURIComponent(v_ds_senha);
    
    var request = $.ajax({
        url:          url,
        type:         'post',
        cache:        false,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8'
    });
    request.done(function(output){
        if (output.result == 'success'){
            if(v_ds_senha=="gepros"||v_ds_senha=="Gepros"||v_ds_senha=="GEPROS"){
                sendPost("nova_senha.php", {ds_login: (v_ds_login)});
            }
            else{
                fcAbrirPopUpRedirecionar(output.data[0]['token']);
            }
            
            
            //
            
            
        } 
        else{
            alert('Usuário ou Senha Incorreto');
            $('#ds_login').val("");
            $('#ds_senha').val("");
        }
    });
    request.fail(function(jqXHR, textStatus){
        alert('Usuário ou Senha Incorreto ' + textStatus);
    });   
}

function fcAbrirPopUpRedirecionar(token){
    var v_url = "../controller/retorno.controller.php?job=listarRerornoPopUp&token="+token;
   
    var request = $.ajax({
        url:          v_url,
        type:         'post',
        cache:        false,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8'
    });
    request.done(function(output){
        if (output.result == 'success'){
           for(i=0;i<output.data.length;i++){
               
               if(output.data[0]['t_qtde_retorno']>0){
                    var width = 1100;
                    var height = 600;

                    var left = 250;
                    var top = 150;
                    var URL = "retorno_popup.php?token="+token;
                    window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
                }

           } 
           
           sendPost("principal.php", {token: token}); 
           
           //fcAbrirPopUpRedirecionarWhats(token);
        } 
        else{
            alert("error");
        }
    });
    request.fail(function(jqXHR, textStatus){
        alert('Usuário ou Senha Incorreto ' + textStatus);
    });   
}

/*function fcAbrirPopUpRedirecionarWhats(token){
    
    var v_url = "../controller/retorno.controller.php?job=listarDataTablePopupWhats&token="+token;
    var request = $.ajax({
        url:          v_url,
        type:         'post',
        cache:        false,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8'
    });
    request.done(function(output){
        if (output.result == 'success'){
           for(i=0;i<output.data.length;i++){
               
               if(output.data[i]['t_qtde_retorno']>0){  

                    var str =  output.data[i]['t_ds_cel'];
                    var telefone = str.replace(/[^\d]+/g,'');

                    var text = output.data[i]['t_ds_retorno'];
                    if(text==null){
                        text = "Retorno Pendente";
                    }                
                    
                    var urlw = "https://api.whatsapp.com/send?phone=55"+telefone+"&text="+text

                    window.open(urlw, '_blank');
                    
                }

           } 
           
        } 
        else{
            alert("error");
        }
    });
    request.fail(function(jqXHR, textStatus){
        alert('Usuário ou Senha Incorreto ' + textStatus);
    });   
}*/

$(document).ready(function()
    {
        //Atribui a validação do formulário dos campos obrigatórios
        $(document).on('click', '#cmdEnviar', fcEnviar);
        
         $.ajax({
            url : "../versao.txt",
            success : function (data) {
               $("#ds_versao").text(data);
            }
        });
        
        //Verifica se o registro é para alteracao e puxa os dados.
    }    
);
