var tblResultado;
var tblCompraProduto;
var rLinhaSelecionadaProd;
function fcPesquisar(){
	
    tblResultado.clear().destroy();
    fcCarregarGrid();
    
}

function fcLimparVariavelCompras(){
    $("#fornecedor_pk_ins").val("");
    $("#categoria_pk_ins").val("");
    $("#empresa_pk_ins").val("");
    $("#tipo_grupo_centro_custo_pk").val("");
    $("#grupo_lancamento_centro_custo_pk").val("");
    $("#ds_numero_nota_ins").val("");
    $("#dt_pagamento").val("");
    $("#dt_entrega").val("");
    $("#metodos_pagamento_pk").val("");
    $("#qtde_parcelas").val("");
    $("#vl_notafiscal").val("");
    $("#vl_frete").val("");
    $("#compras_pk").val("");
    
    
}


function fcListarOptionParcela(){
    $("#qtde_parcela_combo").append("");
    $("#qtde_parcela_combo").empty();
    var str ="";
    str += "<select class='form-control form-control-sm chzn-select'  id='qtde_parcelas' name='qtde_parcelas' >";
    str += "                            <option ></option>";
    for(i=1;i<73;i++){
        str += "                            <option value='"+i+"'>"+i+" Parcela(s)</option>";
    }
    str += "                        </select>";
    
    $("#qtde_parcela_combo").append(str);
}

function fcIncluir(){
    
    $(".chzn-select").chosen('destroy');  
    fcListarOptionParcela();
     
    fcLimparVariavelCompras();
    
    fcRecarregarGridProduto();
    
    tblDocumentos.clear().destroy();    
    fcCarregarGridDocumentos();
    
    $("#exibir_documento").hide();
    $("#modal_compra").modal();
    
    $(".chzn-select").chosen({allow_single_deselect: true});

}

function fcEditarCompra(objRegistro){
    
    
    $(".chzn-select").chosen('destroy');  
    fcListarOptionParcela();
     
    fcLimparVariavelCompras();
    
    
    fcCarregarCategorias();
    //Combo Fornecedores
    fcCarregarFornecedor(""); 
    
    fcCarregarProdutos("");
    
    fcCarregarEmpresa();
    
    fcListarMetodosPagamentoReceita();
    
    
    $("#tipo_grupo_centro_custo_pk").val(objRegistro['tipo_grupo_centro_custo_pk']);
    
    
    
    
    
    
    fcListarItensGruposCentroCustoReceita();
    
    $("#grupo_lancamento_centro_custo_pk").val(objRegistro['grupo_lancamento_centro_custo_pk']);
    
    $("#fornecedor_pk_ins").val(objRegistro['fornecedor_pk']);
    $("#categoria_pk_ins").val(objRegistro['categoria_pk']);
    $("#empresa_pk_ins").val(objRegistro['conta_pk']);
    
    
    $("#ds_numero_nota_ins").val(objRegistro['ds_numero_nota']);
    $("#dt_pagamento").val(objRegistro['dt_pagamento']);
    $("#dt_entrega").val(objRegistro['dt_entrega']);
    $("#metodos_pagamento_pk").val(objRegistro['metodos_pagamento_pk']);
    $("#qtde_parcelas").val(objRegistro['qtde_parcelas']);
    $("#vl_notafiscal").val(float2moeda(objRegistro['vl_notafiscal']));
    $("#vl_frete").val(float2moeda(objRegistro['vl_frete']));
    $("#compras_pk").val(objRegistro['pk']);
    
    
    
    
    
    
    fcRecarregarGridProduto();
    
    tblDocumentos.clear().destroy();    
    fcCarregarGridDocumentos();

    $("#modal_compra").modal();
    
    setTimeout(function(){
        $(".chzn-select").chosen({allow_single_deselect: true});
        //fcRecarregarGridProduto();
    }, 500);
}

function fcSalvarCompra(){
    
    
    var strProdutoItem = fcFormatarDadosProdutos();
    
    var strDocs = fcFormatarDadosDocumentos();
    
    if($("#fornecedor_pk_ins").val()==""){
        $("#alert_fornecedor").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_fornecedor").slideUp(500);
        });
        $('#fornecedor_pk_ins').focus();
        return false;
    }
    if($("#categoria_pk_ins").val()==""){
        $("#alert_categoria").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_categoria").slideUp(500);
        });
        $('#categoria_pk_ins').focus();
        return false;
    }
    if($("#empresa_pk_ins").val()==""){
        $("#alert_empresa").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_empresa").slideUp(500);
        });
        $('#empresa_pk_ins').focus();
        return false;
    }
    if($("#ds_numero_nota_ins").val()==""){
        $("#alert_n_doc").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_n_doc").slideUp(500);
        });
        $('#ds_numero_nota_ins').focus();
        return false;
    }
    if($("#dt_pagamento").val()==""){
        $("#alert_dt_pag").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_dt_pag").slideUp(500);
        });
        $('#dt_pagamento').focus();
        return false;
    }
    if($("#metodos_pagamento_pk").val()==""){
        $("#alert_forma_apg").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_forma_apg").slideUp(500);
        });
        $('#metodos_pagamento_pk').focus();
        return false;
    }
    if($("#vl_notafiscal").val()==""){
        $("#alert_vl_n_doc").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_vl_n_doc").slideUp(500);
        });
        $('#vl_notafiscal').focus();
        return false;
    }
    
    var vl_frete = "";
    if($("#vl_frete").val()!=""){
        var vl_frete = moeda2float($("#vl_frete").val());
    }
    
    
  
    
    
    //atualiza o registro no DB, pois já existe uma PK para contatos no banco.
    var objParametros = {
        "pk": $("#compras_pk").val(),
        "fornecedor_pk": $("#fornecedor_pk_ins").val(),
        "categoria_pk": $("#categoria_pk_ins").val(),
        "conta_pk": $("#empresa_pk_ins").val(),
        "dt_pagamento": $("#dt_pagamento").val(),
        "metodos_pagamento_pk": $("#metodos_pagamento_pk").val(),
        "qtde_parcelas": $("#qtde_parcelas").val(),
        "ds_numero_nota": $("#ds_numero_nota_ins").val(),
        "vl_notafiscal": moeda2float($("#vl_notafiscal").val()),
        "vl_frete":vl_frete,
        "dt_entrega": $("#dt_entrega").val(),
        "grupo_lancamento_centro_custo_pk": $("#grupo_lancamento_centro_custo_pk").val(),
        "centro_custo_pk": $("#tipo_grupo_centro_custo_pk").val(),
        //"produtos_itens_pk": strProdutoItem,
        "documentos_pk": strDocs
    }; 
    var arrEnviar = carregarController("compra", "salvar", objParametros);
   
    if (arrEnviar.result == 'success'){
        
        
        
        $("#compras_pk").val(arrEnviar.data[0]['pk']);
        fcSalvarProdutoAposSalvarCompra();
        
        alert(arrEnviar.message);
        $("#modal_compra").modal("hide");
        fcRecarregarGridCompra();
        
        
    }    
    else{
        alert(arrEnviar.result);
    }
    
}

function fcRecarregarGridCompra(){
    tblResultado.ajax.reload();    
    //fcCarregarGrid();
}
function fcExcluir(v_pk){

    if (confirm("Deseja realmente excluir o registro '" + v_pk + "'?")){
        if(v_pk != ""){

            var objParametros = {
                "pk": v_pk
            };              
            
            var arrExcluir = carregarController("compra", "excluir", objParametros);   

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
    sendPost('compra_cad_form.php', {token: token, pk: v_pk});
}

function fcCarregarGrid(){

    
    var objParametros = {
        "fornecedor_pk": $("#fornecedor_pk").val(),
        "categorias_pk": $("#categorias_pk").val(),
        "ds_numero_nota": $("#ds_numero_nota").val(),
        "contas_pk": $("#empresas_pk").val(),
        "dt_cadastro_ini": $("#dt_cadastro_ini").val(),
        "dt_cadastro_fim": $("#dt_cadastro_fim").val()
    };     
    
    var v_url = montarUrlController("compra", "listarDataTable", objParametros);
    
    //Trata a tabela
    tblResultado = $('#tblResultado').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 src='../img/copiar.png'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            },
           {"targets": -2, "data": "vl_pagamento"},
           {"targets": -3, "data": "dt_cadastro"},
           {"targets": -4, "data": "ds_conta"},
           {"targets": -5, "data": "ds_numero_nota"},
           {"targets": -6, "data": "ds_categoria"},
           {"targets": -7, "data": "ds_fornecedor"},
           {"targets": -8, "data": "pk"}

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
        fcEditarCompra(data);
        
    } );   
    
    $('#tblResultado tbody').on('click', '.function_delete', function () {
        var data;
        if(tblResultado.row( $(this).parents('li') ).data()){
            data = tblResultado.row( $(this).parents('li') ).data();
        }
        else if(tblResultado.row( $(this).parents('tr') ).data()){
            data = tblResultado.row( $(this).parents('tr') ).data();
        }
        fcExcluir(data['pk']);
    } );            
    
}


function fcCarregarCategorias(){    
    var objParametros = {
        "pk": ""
    };          
    var arrCarregar = carregarController("categoria_produto", "listarTodos", objParametros);    
    carregarComboAjax($("#categorias_pk"), arrCarregar, " ", "pk", "ds_categoria");        
    carregarComboAjax($("#categoria_pk_ins"), arrCarregar, " ", "pk", "ds_categoria");        
    carregarComboAjax($("#categorias_ins_prod_pk"), arrCarregar, " ", "pk", "ds_categoria");        
}
function fcCarregarCategoriasProd(){    
    var objParametros = {
        "pk": ""
    };          
    var arrCarregar = carregarController("categoria_produto", "listarTodos", objParametros);           
    carregarComboAjax($("#categorias_ins_prod_pk"), arrCarregar, " ", "pk", "ds_categoria");        
}
function fcCarregarFornecedor(categorias_produto_pk){    
    var objParametros = {
        "categorias_produto_pk": categorias_produto_pk
    };          
    var arrCarregar = carregarController("fornecedor", "listarPorCategoria", objParametros);    
    carregarComboAjax($("#fornecedor_pk"), arrCarregar, " ", "pk", "ds_fornecedor");        
    carregarComboAjax($("#fornecedor_pk_ins"), arrCarregar, " ", "pk", "ds_fornecedor");        
}
function fcSelecionarCategoriaFornecedor(){    
    var objParametros = {
        "pk": $("#fornecedor_pk_ins").val()
    };          
    var arrCarregar = carregarController("fornecedor", "listarPk", objParametros);  
    if(arrCarregar.data[0]['categorias_produto_pk']!=null){
        $("#categoria_pk_ins").val(arrCarregar.data[0]['categorias_produto_pk']);
    }
          
}
function fcCarregarEmpresa(){    
    var objParametros = {
        "pk": ""
    };          
    var arrCarregar = carregarController("conta", "listarPk", objParametros);    
    
    carregarComboAjax($("#empresas_pk"), arrCarregar, " ", "pk", "ds_conta");        
    carregarComboAjax($("#empresa_pk_ins"), arrCarregar, " ", "pk", "ds_conta");        
}

function fcListarMetodosPagamentoReceita(){

    var objParametros = {
        "pk": ""
    };          
   
    var arrCarregar = carregarController("metodo_pagamento", "listarTodos", objParametros);   

    carregarComboAjax($("#metodos_pagamento_pk"), arrCarregar, " ", "pk", "ds_metodo_pagamento");    
   
}

function fcListarItensGruposCentroCustoReceita(){

    var objParametros = {
        "tipo_grupo_pk": ""
    };          
    if($("#tipo_grupo_centro_custo_pk").val()==1){
        var arrCarregar = carregarController("lancamento", "listaItensGrupoLeads", objParametros); 
       
        carregarComboAjax($("#grupo_lancamento_centro_custo_pk"), arrCarregar, " ", "pk", "ds_lead"); 
        
    }else if($("#tipo_grupo_centro_custo_pk").val()==2){
        
        var arrCarregar = carregarController("lancamento", "listaItensGrupoColaboradores", objParametros);    
        carregarComboAjax($("#grupo_lancamento_centro_custo_pk"), arrCarregar, " ", "pk", "ds_colaborador");   
        
    }else if($("#tipo_grupo_centro_custo_pk").val()==3){
        var arrCarregar = carregarController("lancamento", "listaItensGrupoFornecedores", objParametros);    
        carregarComboAjax($("#grupo_lancamento_centro_custo_pk"), arrCarregar, " ", "pk", "ds_fornecedor");  
        
    }
    else if($("#tipo_grupo_centro_custo_pk").val()==4){
        var arrCarregar = carregarController("equipe", "listarTodos", objParametros);    
        carregarComboAjax($("#grupo_lancamento_centro_custo_pk"), arrCarregar, " ", "pk", "ds_equipe");   
    }
}





///-------------------------------------------------------MODAL PRODUTO-----------------------------------------------------------------------//


function fcLimparVariavelProdutos(){
    $("#produto_compra_pk").val("");
    $("#categorias_ins_prod_pk").val("");
    $("#produtos_pk").val("");
    $("#vl_item_produto").val("");
    $("#qtde_produto").val("");
    $("#acao").val("ins")
    
    if($("#categoria_pk_ins").val()!=""){
        $("#categorias_ins_prod_pk").val($("#categoria_pk_ins").val());
    }
    
    $('#ic_entrega').prop('checked', true);
    
    
    
    
    
}

function fcCarregarProdutos(categorias_produto_pk){    
    var objParametros = {
        "categorias_produto_pk": categorias_produto_pk
    };          
    var arrCarregar = carregarController("produto", "listarPorCategoria", objParametros);  
  
    carregarComboAjax($("#produtos_pk"), arrCarregar, " ", "pk", "ds_produto");        
}

function fcIncluirProduto(){
    
    $(".chzn-select").chosen('destroy'); 
    
    fcLimparVariavelProdutos();
    
    fcCarregarProdutos($("#categorias_ins_prod_pk").val());
    
    $("#janela_produto").modal();
    setTimeout(function(){
        $(".chzn-select").chosen({allow_single_deselect: true});
        //fcRecarregarGridProduto();
    }, 500);
    
}

function fcCarregarGridProduto(){
    
     var objParametros = {
        "compras_pk": $("#compras_pk").val()
    };     
    
    var v_url = montarUrlController("produto_iten", "listarPorCompra", objParametros);
  
    //Trata a tabela
    tblCompraProduto = $('#tblCompraProduto').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit'><span><img width=16 height=16 src='../img/copiar.png'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            },
           {"targets": -2, "data": "vl_item"},
           {"targets": -3, "data": "ds_entrega"},
           {"targets": -4, "data": "qtde"},
           {"targets": -5, "data": "ic_entrega","visible":false},
           {"targets": -6, "data": "ds_produto"},
           {"targets": -7, "data": "produtos_pk","visible":false},
           {"targets": -8, "data": "ds_categoria"},
           {"targets": -9, "data": "categorias_produto_pk","visible":false},
           {"targets": -10, "data": "pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    
    
    //Atribui os eventos na coluna ação.
    $('#tblCompraProduto tbody').on('click', '.function_edit', function () {
        var data;
        rLinhaSelecionadaProd = null;
        if(tblCompraProduto.row( $(this).parents('li')).data()){
            data = tblCompraProduto.row( $(this).parents('li')).data();
            rLinhaSelecionadaProd = $(this).parents('li');
        }
        else if(tblCompraProduto.row( $(this).parents('tr')).data()){
            data = tblCompraProduto.row( $(this).parents('tr')).data();
            rLinhaSelecionadaProd = $(this).parents('tr');
        }
        fcEditarProduto(data);
        
    } );   
    
    $('#tblCompraProduto tbody').on('click', '.function_delete', function () {
        var data;
        if(tblCompraProduto.row( $(this).parents('li') ).data()){
            data = tblCompraProduto.row( $(this).parents('li') ).data();
        }
        else if(tblCompraProduto.row( $(this).parents('tr') ).data()){
            data = tblCompraProduto.row( $(this).parents('tr') ).data();
        }
        if(data['pk'] != ""){
            fcExcluirProduto(data['t_pk']);
        }
        tblCompraProduto.row($(this).parents('tr')).remove().draw();
        
    } );
}

function fcExcluirProduto(v_pk){

    if(v_pk != ""){
        var objParametros = {
            "pk": v_pk
        };              

        var arrExcluir = carregarController("compra", "excluirProduto", objParametros);   
       
        if (arrExcluir.result == 'success'){

            //Exibe a mensagem
            alert(arrExcluir.message);
            fcRecarregarGridMateriais();
        }
        else{
            alert('Falhou a requisição de exclusão.');
        }
    }
    else{
        alert("Código não encontrado");
    }
}


function fcEditarProduto(objRegistro){
    
    $(".chzn-select").chosen('destroy'); 
    
    fcLimparVariavelProdutos();
    
    
    $(".chzn-select").chosen('destroy'); 
    fcCarregarCategoriasProd();
   //Lista fornecedor e Produtos conforme a categoria        
    fcCarregarProdutos(objRegistro['categorias_produto_pk']);
    $(".chzn-select").chosen('destroy'); 
    
    $("#acao").val("upd");
    //$(".chzn-select").chosen('destroy'); 
    $("#produto_compra_pk").val(objRegistro['pk']);
    $("#categorias_ins_prod_pk").val(objRegistro['categorias_produto_pk']);
    $("#produtos_pk").val(objRegistro['produtos_pk']);
    $("#vl_item_produto").val((objRegistro['vl_item']));
    $("#qtde_produto").val(objRegistro['qtde']);
    if(objRegistro['ic_entrega']==2){
        $('#ic_entrega').prop('checked', true);
    }
    else{
        $('#ic_entrega').prop('checked', false);
    }
    
    
    setTimeout(function(){
        $(".chzn-select").chosen('destroy');
       
    }, 500)
    $("#janela_produto").modal();
    
    
}



function fcEnviarProduto(){
    
    if($("#categorias_ins_prod_pk").val()==""){
        $("#alert_categoria_prod").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_categoria_prod").slideUp(500);
        });
        $('#categorias_ins_prod_pk').focus();
        return false;
    }
    if($("#produtos_pk").val()==""){
        $("#alert_produto_prod").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_produto_prod").slideUp(500);
        });
        $('#produtos_pk').focus();
        return false;
    }
    if($("#vl_item_produto").val()==""){
        $("#alert_vl_prod").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_vl_prod").slideUp(500);
        });
        $('#vl_item_produto').focus();
        return false;
    }
    if($("#qtde_produto").val()==""){
        $("#alert_qtde_prod").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_qtde_prod").slideUp(500);
        });
        $('#qtde_produto').focus();
        return false;
    }
    
    
    
    

        if($("#compras_pk").val() == ""){
            if($("#acao").val() == "ins"){
                fcIncluirProdutoSemPk();
            }
            else if($("#acao").val() == "upd"){
                fcEditarProdutoSemPk();
            }
        }
        else{
            fcSalvarProduto();
        }   
        $("#janela_produto").modal("hide");
        $("#modal_compra").modal("show");
}

function fcEditarProdutoSemPk(){
    
    fcIncluirProdutoSemPk();
    tblCompraProduto.row(rLinhaSelecionadaProd).remove().draw();
    return false;
}

function fcIncluirProdutoSemPk(){  
    var v_ic_entrega = 1;
    var ds_ic_entrega = "";
    if($('#ic_entrega').is(":checked")){
        v_ic_entrega = 2;
        ds_ic_entrega = "Sim";
    }
    else{
        v_ic_entrega = 1;
        ds_ic_entrega = "Não";
    }
    
    
    
    tblCompraProduto.row.add(
        {
            "pk":"",
            "categorias_produto_pk":$("#categorias_ins_prod_pk").val(),
            "ds_categoria":$("#categorias_ins_prod_pk option:selected").text(),
            "produtos_pk":$("#produtos_pk").val(),
            "ds_produto":$("#produtos_pk option:selected").text(),
            "qtde":$("#qtde_produto").val(),
            "ic_entrega":v_ic_entrega,
            "ds_entrega":ds_ic_entrega,
            "vl_item":$("#vl_item_produto").val(),
            
            "t_functions":""
        }
    ).draw();
    
    return false;
}

function fcRecarregarGridProduto(){
    tblCompraProduto.clear().destroy();    
    fcCarregarGridProduto();
}
function fcSalvarProduto(){
    
    var v_ic_entrega = 1;
    if($('#ic_entrega').is(":checked")){
        v_ic_entrega = 2;
    }
    else{
        v_ic_entrega = 1;
    }
    
    //atualiza o registro no DB, pois já existe uma PK para contatos no banco.
    var objParametros = {
        "pk": $("#produto_compra_pk").val(),
        "compras_pk": $("#compras_pk").val(),
        //"categorias_produto_pk": $("#categorias_ins_prod_pk").val(),
        "produtos_pk": $("#produtos_pk").val(),
        "qtde": $("#qtde_produto").val(),
        "vl_item": moeda2float($("#vl_item_produto").val()),
        "ic_entrega": v_ic_entrega
    }; 
    var arrEnviar = carregarController("compra", "salvarProduto", objParametros);
  
    if (arrEnviar.result == 'success'){
        fcRecarregarGridProduto();
    }    
    else{
        alert(arrEnviar.result);
    }
    
}

function fcSalvarProdutoAposSalvarCompra(){
    
    
    var  data = tblCompraProduto.rows().data();
        
    for(i = 0; i< data.length; i++){
        var objParametros = {
            "pk": "",
            "compras_pk": $("#compras_pk").val(),
            //"categorias_produto_pk": $("#categorias_ins_prod_pk").val(),
            "produtos_pk": data[i]['produtos_pk'],
            "qtde": data[i]['qtde'],
            "vl_item": moeda2float(data[i]['vl_item']),
            "ic_entrega": data[i]['ic_entrega']
        }; 
        var arrEnviar = carregarController("compra", "salvarProduto", objParametros);

        if (arrEnviar.result == 'success'){
           
        }    
        else{
            alert(arrEnviar.result);
        }
    }
    
    
    
}

function fcFormatarDadosProdutos(){    
    try{
        var pk = "";
        var categorias_produto_pk = "";
        var produtos_pk =  "";
        var qtde = "";
        var vl_item= "";
        var ic_entrega= "";
        
        var arrKeys = [];
        var arrDados = [];
        arrKeys[0] = "pk";
        arrKeys[1] = "categorias_produto_pk";
        arrKeys[2] = "produtos_pk";
        arrKeys[3] = "qtde";
        arrKeys[4] = "vl_item";
        arrKeys[5] = "ic_entrega";
        
        var  data = tblCompraProduto.rows().data();
        
        for(i = 0; i< data.length; i++){
            if(data[i]['pk']==""){
                
                
                
                pk = data[i]['pk'];
                categorias_produto_pk = data[i]['categorias_produto_pk'];
                produtos_pk =  data[i]['produtos_pk'];
                qtde = data[i]['qtde'];
                vl_item = moeda2float(data[i]['vl_item']);
                ic_entrega = data[i]['ic_entrega'];
                
                arrDados[i] = [pk, categorias_produto_pk, produtos_pk, qtde, vl_item, ic_entrega]; 
            }
                                   
        }
        return arrayToJson(arrKeys, arrDados);
    }
    catch(err) {
        alert(err);
    } 
}







///-------------------------------------------------------MODAL DOCUMENTO-----------------------------------------------------------------------//


function fcCarregarGridDocumentos(){
    var objParametros = {
        "compras_pk": $("#compras_pk").val()
    };

    var v_url = montarUrlController("documento", "listarDocumentosCompra", objParametros);
   
    //Trata a tabela
    tblDocumentos = $('#tblDocumentos').DataTable({
        "scrollX": false,
        "ajax": {"url": v_url, "type": "POST"},
        "responsive": true,
        "searching": false,
        "paging": false,
        "bFilter": false,
        "bInfo": false,
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<a class='function_edit' download><span><img width=16 height=16 src='../img/download.png'></span></a>"
            },
           {"targets": -2, "data": "t_ds_nome_original"},
           {"targets": -3, "data": "t_ds_obs"},
           {"targets": -4, "data": "t_ds_documento"},
           {"targets": -5, "data": "t_pk"}

         ],
        "language":{
            "url": "../inc/js/datatables/pt_br.php",
            "type": "GET"
            }
    });
    $('#tblDocumentos tbody').on('click', '.function_edit', function () {
        var data;

        if(tblDocumentos.row( $(this).parents('li') ).data()){
            data = tblDocumentos.row( $(this).parents('li') ).data();
        }
        else if(tblDocumentos.row( $(this).parents('tr') ).data()){
            data = tblDocumentos.row( $(this).parents('tr') ).data();
        }
        fcDownloadDocumento(data['t_ds_documento']);
    });
    
}

function fcDownloadDocumento(ds_documento){
    var v_url = "../docs/"+ds_documento;
    window.open(v_url, '_blank');
}


function fcValidarDocumentos(){
    var colunas = $('#tblArquivos tbody tr td');
    if ($(colunas[0]).text() == "Nenhum registro encontrado"){
        $("#alert_documento").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert_documento").slideUp(500);
        });
    }
    else{
        if($("#compras_pk").val() == ""){
            if($("#acao").val() == "ins"){
                var dsDocumento = "";
                var dsNomeOriginal = "";
                $('#tblArquivos tbody tr').each(function () {
                var colunas = $(this).children();
                    var colunas = $(this).children();
                    dsDocumento = $(colunas[0]).text();
                    dsNomeOriginal = $(colunas[1]).text();
                    fcIncluirDocumentoSemPk(dsDocumento,dsNomeOriginal);
                });
                $("#janela_documentos").modal("hide");
            }
        }
        else{
            fcEnviarDocumento($("#compras_pk").val());
            
        }

    }

}

function fcIncluirDocumentoSemPk(v_documento,v_nome_original){
    tblDocumentos.row.add(
        {
            "t_pk":"",
            "t_ds_documento":v_documento,
            "t_ds_obs":$("#ds_obs_doc").val(),
            "t_ds_nome_original":v_nome_original,
            "t_functions":""
        }
    ).draw();

    return false;
}
function fcEnviarDocumento(v_pk){

    var strJSONDadosTabela =  fcFormatarDadosArquivos();
    var v_ds_obs = $("#ds_obs_doc").val();

    var objParametros = {
        "compras_pk": v_pk,
        "ds_arquivo": strJSONDadosTabela,
        "ds_obs": v_ds_obs
    };


    var arrEnviar = carregarController("documento", "salvar", objParametros);
    
    if (arrEnviar.result == 'success'){
        // Reload datable
        $("#janela_documentos").modal("hide");
        //alert(arrEnviar.message);
        tblDocumentos.clear().destroy();
        fcCarregarGridDocumentos();
    }
    else{
        alert('Falhou a requisição para salvar o registro');
    }
}

function fcCarregarGridArquivos(){
    tblArquivos = $("#tblArquivos").DataTable(
        {
            "searching": false,
            "paging": false,
            "columnDefs" : [{
                orderable: false,
                targets: [0,1,2]
            }],
            "language":{
                "url": "../inc/js/datatables/pt_br.php",
                "type": "GET"
                }
        }
    );
    return false;
}
//COMEÇO DOCUMENTOS UPLOAD

function fcAlterarNomeArquivo(v_arquivo){
        var objParametros = {
            "compras_pk": $("#compras_pk").val(),
            "ds_arquivo": v_arquivo
        };


        var arrEnviar = carregarController("documento", "renomearArquivoColaborador", objParametros);

        if (arrEnviar.result == 'success'){
            // Reload datable
            $("#ds_documento").text(arrEnviar.data[0]['t_ds_nome_salvo']);

        }
        else{
            alert('Falhou a requisição para salvar o registro');
        }

}

function fcApagarArquivo(){
    var nome_arquivo = "";
    $('#tblArquivos tbody tr').click(function () {
        var colunas = $(this).children();
        nome_arquivo = $(colunas[0]).text();
        fcExcluirArquivo(nome_arquivo);
    });

    tblArquivos.row($(this).parents('tr')).remove().draw();
}

function fcCancelarEnvioDocumento(){
    var nome_arquivo = "";
    $('#tblArquivos tbody tr').each(function () {
        var colunas = $(this).children();
            var colunas = $(this).children();
            nome_arquivo = $(colunas[0]).text();
            fcExcluirArquivo(nome_arquivo);
        });
}


function fcExcluirArquivo(v_nome_arquivo){
    var objParametros = {
        "nome_arquivo": v_nome_arquivo
    };


    var arrEnviar = carregarController("documento", "removerArquivo", objParametros);

    if (arrEnviar.result == 'success'){

    }
}
function fcIncluirLinhaArquivo(nome_original){
    tblArquivos.row.add(
            [$("#ds_documento").text(),
             nome_original,
             "<a class='function_delete'><span><img width=16 height=16 src='../img/excluir.png'></span></a>"
            ]
    ).draw( false );

    //Adiciona o evento click na linha que acabou de ser adicionada.
    $(".function_delete").on("click",fcApagarArquivo);
    return false;
}


function Reset(){
    $('#progress .progress-bar').css('width', '0%');
}
$(function () {

    $('#fileupload').fileupload({

        dataType: 'json',
        done: function (e, data) {
            window.setTimeout('Reset()', 2000);

            $.each(data.files, function (index, file) {

                $("#ds_nome_original").text(file.name);

                fcAlterarNomeArquivo(file.name);
                fcIncluirLinhaArquivo(file.name);
                
                fcValidarDocumentos();



            });
        },
        fail: function (data) {
            alert("Falha ao subir o arquivo");
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css('width', progress + '%');
        }
    });
});

function fsClean() {
    $('#progress .progress-bar').css('width', '0%');
}

function fcFormatarDadosArquivos(){
    var colunas = $('#tblArquivos tbody tr td');
    if ($(colunas[0]).text() != "Nenhum registro encontrado"){
        var dsDocumento = "";
        var dsNomeOriginal = "";

        var arrKeys = [];
        arrKeys[0] = "ds_documento";
        arrKeys[1] = "ds_nome_original";

        var arrDados = [];
            var i = 0;
            $('#tblArquivos tbody tr').each(function () {
            var colunas = $(this).children();
                dsDocumento =  $(colunas[0]).text();
                dsNomeOriginal = $(colunas[1]).text();


                arrDados[i] = [dsDocumento, dsNomeOriginal];

                i++;
            });

        return arrayToJson(arrKeys, arrDados);
    }


}
function fcFormatarDadosDocumentos(){
    
    
    
     try{
        var pk = "";
        var ds_documento = "";
        var ds_obs =  "";
        var ds_nome_original = "";
        
        var arrKeys = [];
        var arrDados = [];
        arrKeys[0] = "pk";
        arrKeys[1] = "ds_documento";
        arrKeys[2] = "ds_obs";
        arrKeys[3] = "ds_nome_original";
        
        var  data = tblDocumentos.rows().data();
        
        for(i = 0; i< data.length; i++){
            if(data[i]['t_pk']==""){
                
                
                pk = data[i]['t_pk'];
                ds_documento = data[i]['t_ds_documento'];
                ds_obs =  data[i]['t_ds_obs'];
                ds_nome_original = data[i]['t_ds_nome_original'];
                
                arrDados[i] = [pk, ds_documento, ds_obs, ds_nome_original]; 
            }
                                   
        }
        return arrayToJson(arrKeys, arrDados);
    }
    catch(err) {
        alert(err);
    } 


}

function fcLimparDadosDocumento(){
    $("#ds_obs_doc").val("");
    $("#acao").val("");
}
function fcAbrirFormNovoDocumento(){
    tblArquivos.clear().destroy();
    fcCarregarGridArquivos();
    fcLimparDadosDocumento();
    $("#acao").val("ins");
    $("#janela_documentos").modal();

}


$(document).ready(function(){

    
    fcCarregarCategorias();
    //Combo Fornecedores
    fcCarregarFornecedor(""); 
    
    fcCarregarProdutos("");
    
    fcCarregarEmpresa();
    
    fcListarMetodosPagamentoReceita();
    
    $("#tipo_grupo_centro_custo_pk").change(function(){ 
        $(".chzn-select").chosen('destroy');
        fcListarItensGruposCentroCustoReceita();    
        $(".chzn-select").chosen({allow_single_deselect: true});
    });
    
    //Combo  Produtos
    $(".chzn-select").chosen({allow_single_deselect: true});
    //Lista fornecedor e Produtos conforme a categoria        
    $("#fornecedor_pk_ins").change(function(){     
        if($("#fornecedor_pk_ins").val()!=''){
            $(".chzn-select").chosen('destroy');
            fcSelecionarCategoriaFornecedor();
            $(".chzn-select").chosen({allow_single_deselect: true});
        }            
    });
    $("#vl_notafiscal").on('keyup', function () {
        mascara(this,moeda);       
    });
    $("#vl_frete").on('keyup', function () {
        mascara(this,moeda);       
    });
    $("#ds_numero_nota").on('keyup', function () {
        
        mascara(this,soNumeros);       
    });
    $("#ds_numero_nota_ins").on('keyup', function () {
        mascara(this,soNumeros);       
    });
    $("#dt_cadastro_ini").on('keyup', function () {
        mascara(this,mdata);       
    });
    $("#dt_cadastro_fim").on('keyup', function () {
        mascara(this,mdata);       
    });
    $("#dt_pagamento").on('keyup', function () {
        mascara(this,mdata);       
    });
    $("#dt_entrega").on('keyup', function () {   
        mascara(this,mdata);       
    });
    
    $('#dt_cadastro_ini').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker();
    $('#dt_cadastro_fim').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker();
    $('#dt_pagamento').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker();
    $('#dt_entrega').datepicker({defaultDate: "",
        dateFormat: 'dd/mm/yyyy',
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        minDate: 0
    }).datepicker();



    //faz a carga inicial do grid.
    fcCarregarGrid();
    //Atribui os eventos dos demais controles
    $(document).on('click', '#cmdPesquisar', fcPesquisar);
    $(document).on('click', '#cmdIncluir', fcIncluir);
    $(document).on('click', '#cmdSalvarCompra', fcSalvarCompra);
    
    
    
    
    //---------------------PRODUTOS-------------------------------//
    $(document).on('click', '#cmdIncluirProduto', fcIncluirProduto);
   
    fcCarregarGridProduto();
    
     $(document).on('click', '#cmdEnviarProduto', fcEnviarProduto);
    
   
    //Lista fornecedor e Produtos conforme a categoria        
    $("#categorias_ins_prod_pk").change(function(){     
       
        if($("#categorias_ins_prod_pk").val()!=""){
            $(".chzn-select").chosen('destroy');
            fcCarregarProdutos($("#categorias_ins_prod_pk").val());
            $(".chzn-select").chosen({allow_single_deselect: true});
        }            
    });
    
    $("#vl_item_produto").on('keyup', function () {
        mascara(this,moeda);       
    });
    $("#qtde_produto").on('keyup', function () {
        mascara(this,soNumeros);       
    });
    
    
    //------------------------DOCUMENTOS--------------------------------//
    
    
    //carrega dados da grid de documentos
    
    
    $(document).on('click', '#cmdIncluirDocumento', fcAbrirFormNovoDocumento);
    $(document).on('click', '#cmdCancelarDocumento', fcCancelarEnvioDocumento);

    $(document).on('click', '#cmdEnviarDocumento', fcValidarDocumentos);
    
    fcCarregarGridDocumentos();

    fcCarregarGridArquivos();

});


