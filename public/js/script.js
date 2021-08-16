$( document ).ready(function() {

    let dados = $('#produtoId').val();

    if (dados)
    {
        let url = '/carregarDadosProduto';
        $.ajax({
            url: url,
            type: "get",
            async: "true",
            data: {
                idCategoria: id
            },
            success: function (resp) {
                $('#categoriaNome').val(resp[0].nome_categoria);
                $('#categoriaId').val(resp[0].id_categoria_planejamento);

                $('#nomeBotao').html('Alterar');
            },
            error: function (resp) {
                Swal.fire({
                    title: 'Error!',
                    text: 'deu algum erro na aplicação',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
    }

});

function cadastrarCategoria()
{
    let valor = $('#categoriaNome').val();
    let id = $('#categoriaId').val();

    if (valor === '') {
        alert('Preencha o nome da categoria');
        return;
    }
    let url = '/cadastroCategoria';
    $.ajax({
        url: url,
        type: "get",
        dataType: "json",
        data: {
            valueCategoria: valor,
            categoriaId: id
        },
        success: function (resp) {
            Swal.fire({
                title: 'Salvo',
                text: 'Categoria salva com sucesso',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((resp) => {
                location.reload();
            })
        },
        error: function (resp) {
            Swal.fire({
                title: 'Error!',
                text: 'deu algum erro na aplicação',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }
    });
}

function deletarCategoria(id)
{
    let url = '/deletarCategoria';
    Swal.fire({
        title: 'Deletar',
        text: 'Tem certeza que deseja deletar essa categoria?',
        icon: 'warning',
        confirmButtonText: 'SIM'
    }).then((resp) => {
        $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            data: {
                idCategoria: id
            },
            success: function (resp) {
                location.reload();
            },
            error: function (resp) {
                Swal.fire({
                    title: 'Error!',
                    text: 'deu algum erro na aplicação',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
    })

}

function editarCategoria(id)
{
    let url = '/editarCategoria';
        $.ajax({
            url: url,
            type: "get",
            async: "true",
            data: {
                idCategoria: id
            },
            success: function (resp) {
               $('#categoriaNome').val(resp[0].nome_categoria);
               $('#categoriaId').val(resp[0].id_categoria_planejamento);

               $('#nomeBotao').html('Alterar');
            },
            error: function (resp) {
                Swal.fire({
                    title: 'Error!',
                    text: 'deu algum erro na aplicação',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
}

function formatarMoeda()
{
    var elemento = document.getElementById('valor');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
    if(valor == 'NaN') elemento.value = '';
}


function deletarProduto(id)
{
    let url = '/deletarProduto';
    Swal.fire({
        title: 'Deletar',
        text: 'Tem certeza que deseja deletar esse Produto?',
        icon: 'warning',
        confirmButtonText: 'SIM'
    }).then((resp) => {
        $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            data: {
                idProduto: id
            },
            success: function (resp) {
                location.reload();
            },
            error: function (resp) {
                Swal.fire({
                    title: 'Error!',
                    text: 'deu algum erro na aplicação',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
    })

}

function editarProduto(id)
{
    let url = "/carregarDadosProduto/"+id;
    window.location.href = url;
    // $.ajax({
    //     url: url,
    //     type: "get",
    //     async: "true",
    //     data: {
    //         idCategoria: id
    //     },
    //     success: function (resp) {
    //
    //     },
    //     error: function (resp) {
    //         Swal.fire({
    //             title: 'Error!',
    //             text: 'deu algum erro na aplicação',
    //             icon: 'error',
    //             confirmButtonText: 'OK'
    //         })
    //     }
    // });
}


