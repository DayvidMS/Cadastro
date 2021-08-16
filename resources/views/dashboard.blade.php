@extends('layout.main')

@section('title', 'HDC Produtos - Cadastro Produto')

@section('content')


    {{--Pagina de Cadastro de Produtos--}}
    <div class="d-flex justify-content-center">
        <div class="col-4 border border-dark" style="padding: 10px">
            <form id="formProduto" method="POST" action="/cadastroProduto">
                @csrf
                <legend>Cadastro de produtos</legend>
                <fieldset>
                    <div class="form-group">
                        <br>
                        <label for="nomeProduto">Nome do Produto</label>
                        <input type="text" id="nomeProduto" name="nomeProduto">
                        <input type="hidden" id="data" name="data" value="{{date ('Y-m-d H:i:s')}}">
                        <hr>
                        <label for="categoriaProduto">Categoria do produto</label>
                        <select class="form-control"  name="categoriaProduto">
                            @foreach($categorias as $categoria)
                                <option id="{{$categoria->nome_categoria}}" value="{{$categoria->id_categoria_planejamento}}">
                                    {{$categoria->nome_categoria}}
                                </option>
                            @endforeach
                        </select>
                        <hr>
                        <label for="valor">valor do produto: R$</label>
                        <input type="text" maxlength="9" id="valor" name="valor" onkeyup="formatarMoeda()">
                    </div>
                    <button type="submit" class="btn btn-success" id="cadastroProduto" ">
                    <span id="nomeBotao">Cadastrar</span>
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
