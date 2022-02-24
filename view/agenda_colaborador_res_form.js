var tblResultado;
function fcPesquisar(){
	
    tblResultado.clear().destroy();
    fcCarregarGrid();
    
}

function fcIncluir(){

    sendPost('colaborador_cad_form.php',{token: token, pk: ''});

}

function fcExcluir(v_pk, v_ds_colaborador){
    var arrCarregar = permissao("agenda_colaborador", "del");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    if (confirm("Deseja realmente excluir o registro '" + v_ds_colaborador + "'?")){
        if(v_pk != ""){

            var objParametros = {
                "pk": v_pk
            };              
            
            var arrExcluir = carregarController("colaborador", "excluir", objParametros);   

            if (arrExcluir.result == 'success'){

                //Exibe a mensagem
                alert(arrExcluir.message);

                // Reload datable
                tblResultado.ajax.reload();

            }
            else{
                alert('Falhou a requisição de exclusão.');
            }
        }
        else{
            alert("Código não encontrado");
        }
    }
}

function fcEditar(v_pk){
    var arrCarregar = permissao("agenda_colaborador", "upd");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    sendPost('agenda_colaborador_cad_form.php', {token: token, pk: v_pk});
}

function fcCarregarGrid(){

    
    var objParametros = {
        "ds_colaborador": $("#ds_colaborador").val(),
        "ic_status":$("#ic_status").val()
    };     
    
    var v_url = montarUrlController("colaborador", "listarDataTable", objParametros);

    //Trata a tabela
    tblResultado = $('#tblResultado').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=18 height=18 title='Agenda de Escalas Colaborador' src='../img/calendario.png'></span></a>"
            },
           {"targets": -2, "data": "t_ic_status"},
           {"targets": -3, "data": "t_ds_bairro"},
           {"targets": -4, "data": "t_ic_whatsapp"},
           {"targets": -5, "data": "t_ds_cel"},
           {"targets": -6, "data": "t_ds_colaborador"},
           {"targets": -7, "data": "t_pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    
    
    //Atribui os eventos na coluna ação.
    $('#tblResultado tbody').on('click', '.function_edit', function () {
        var data;
        if(tblResultado.row( $(this).parents('li')).data()){
            data = tblResultado.row( $(this).parents('li')).data();
        }
        else if(tblResultado.row( $(this).parents('tr')).data()){
            data = tblResultado.row( $(this).parents('tr')).data();
        }
        fcEditar(data['t_pk']);
        
    } );             
    
}



$(document).ready(function(){
    var arrCarregar = permissao("agenda_colaborador", "cons");        
        
    if (arrCarregar.result != 'success'){            
        alert('Falhar ao carregar o registro');
        return false;
    }
    //faz a carga inicial do grid.
    fcCarregarGrid();

    //Atribui os eventos dos demais controles
    $(document).on('click', '#cmdPesquisar', fcPesquisar);
    $(document).on('click', '#cmdIncluir', fcIncluir);

});


