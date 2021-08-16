@extends('layout.main')

@section('title', 'HDC Produtos - Categoria')

@section('content')

    @if(!empty($categorias))
    {{--    Página de cadastro de catégorias. --}}
    <div class="col-4 border border-dark" id="cadastroCategoria">
        <form id="formularioCategoria">
            <div class="form-group">
                <label for="categoriaNome"><b>Categoria</b></label>
                <hr>
                <input type="text" class="form-control" id="categoriaNome" placeholder="Nome da categoria">
                <input type="hidden" id="categoriaId" value="">
            </div>
            <br>

            <button type="button" class="btn btn-success" id="cadastroCategoria" onclick="cadastrarCategoria()">
                <span id="nomeBotao">Cadastrar</span>
            </button>
        </form>
        <br>
    </div>
    <div class="col-5" id="editCategoria">
        {{--        @if($categorias)--}}
        @foreach($categorias as $categoria)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">excluir</th>
                    <th scope="col">editar</th>
                    <th scope="col">Categoria</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="bCategorias">
                        <button type="button" class="btn btn-danger"
                                onclick="deletarCategoria({{$categoria->id_categoria_planejamento}})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <td class="bCategorias">
                        <button type="button" class="btn btn-success"
                                onclick="editarCategoria({{$categoria->id_categoria_planejamento}})">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    <td>{{$categoria->nome_categoria}}</td>
                </tr>
                </tbody>
            </table>
        @endforeach
                @else
                    <h2>Nenhuma Categoria cadastrada</h2>
                @endif
    </div>

@endsection
