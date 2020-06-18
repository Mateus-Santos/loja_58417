function validacao(){
    var formulario = document.forms["formcadastro"];
    var nome_roupa = formulario.nome_roupa.value;
    var descricao_roupa = formulario.descricao_roupa.value;
    var preco_roupa = formulario.preco_roupa.value;
    var nome_tecido = formulario.nome_tecido.value;
    var foto_roupa = formulario.foto_roupa.value;

    var erro = false;

    if(nome_roupa == ""){
        alert("Por favor, preencha o campo nome.");
        document.formcadastro.nome_roupa.focus();
        erro = true;
    }

    if(descricao_roupa == ""){
        alert("Por favor, preencha o campo descrição.");
        document.formcadastro.descricao_roupa.focus();
        erro = true;
    }

    if(preco_roupa==""){
        alert("Por favor, preencha o campo Preço.");
        document.formcadastro.preco_roupa.focus();
        erro = true;
    }

    if(nome_tecido==""){
        alert("Por favor, preencha o campo Tecido.");
        document.formcadastro.nome_roupa.focus();
        erro = true;
    }

    if(foto_roupa==""){
        alert("Por favor, adicione uma imagem.");
        document.formcadastro.foto_roupa.focus();
        erro = true;
    }

    if(erro){
        return false;
    }else{
        return true;
    }

}