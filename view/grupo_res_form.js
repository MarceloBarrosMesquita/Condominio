var tblResultado;
function fcPesquisar(){
	
    tblResultado.clear().destroy();
    fcCarregarGrid();
    
}

function fcIncluir(){

    sendPost('grupo_cad_form.php',{token: token, pk: ''});

}

function fcExcluir(v_pk, v_ds_grupo){

    if (confirm("Deseja realmente excluir o registro '" + v_ds_grupo + "'?")){
        if(v_pk != ""){
            var url = '../controller/grupo.controller.php?job=excluir&token='+token+'&pk=' + v_pk;
            var request = $.ajax({
                url:          url,
                cache:        false,
                dataType:     'json',
                contentType:  'application/json; charset=utf-8',
                type:         'post'
            });
            request.done(function(output){
                if (output.result == 'success'){

                    //Exibe a mensagem
                    alert(output.message);

                    // Reload datable
                    tblResultado.ajax.reload();
                    
                }
                else{
                    alert('Falhou a requisição de exclusão.');
                }
            });
            request.fail(function(jqXHR, textStatus){
                alert('Falha na req (del): ' + textStatus);
            });
        }
        else{
            alert("Código não encontrado");
        }
    }
}

function fcEditar(v_pk){
    sendPost('grupo_cad_form.php', {token: token, pk: v_pk});
}

function fcCarregarGrid(){

    //Cria url
    var v_url = "../controller/grupo.controller.php?job=listarDataTable&token="+token+"&ds_grupo="+$("#ds_grupo").val();

    //Trata a tabela
    tblResultado = $('#tblResultado').DataTable({
        "scrollX": true,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 title='Editar Grupo' src='../img/copiar.png'></span></a>    <a class='function_delete'><span><img width=16 height=16 title='Excluir Grupo' src='../img/excluir.png'></span></a>"
            },
            {"targets": -2, "data": "t_ds_grupo"},
            {"targets": -3, "data": "t_pk"}

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
    
    $('#tblResultado tbody').on('click', '.function_delete', function () {
        var data;
        if(tblResultado.row( $(this).parents('li') ).data()){
            data = tblResultado.row( $(this).parents('li') ).data();
        }
        else if(tblResultado.row( $(this).parents('tr') ).data()){
            data = tblResultado.row( $(this).parents('tr') ).data();
        }
        fcExcluir(data['t_pk'], data['t_ds_grupo']);
    } );            
    
}



$(document).ready(function(){

    //faz a carga inicial do grid.
    fcCarregarGrid();

    //Atribui os eventos dos demais controles
    $(document).on('click', '#cmdPesquisar', fcPesquisar);
    $(document).on('click', '#cmdIncluir', fcIncluir);

});


