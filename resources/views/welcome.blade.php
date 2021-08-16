@extends('layout.main')

@section('title', 'HDC Produtos')

@section('content')

    <h1>Lista de Produtos</h1>
    @if(!empty($listaProdutos))
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">excluir</th>
            <th scope="col">editar</th>
            <th scope="col">Nome do Produto</th>
            <th scope="col">Categoria</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listaProdutos as $produtos)
            <tr>
                <td class="bCategorias">
                    <button type="button" class="btn btn-danger"
                            onclick="deletarProduto({{$produtos->id_produto}})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                <td class="bCategorias">
                    <button type="button" class="btn btn-success"
                            onclick="editarProduto({{$produtos->id_produto}})">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
                <td>{{$produtos->nome_produto}}</td>
                <td>{{$produtos->nome_categoria}}</td>
                <td>{{$produtos->valor_produto}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <h2>Nenhum produto registrado ainda</h2>
@endsection
