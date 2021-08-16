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
                        @if(empty($dados))
                        <input type="text" id="nomeProduto" name="nomeProduto" value="">
                        @else
                        <input type="text" id="nomeProduto" name="nomeProduto" value="{{$dados[0]->nome_produto ?: ''}}">
                        @endif
                        @if($id)
                        <input type="hidden" id="produtoId" name="produtoId" value="{{$id}}">
                        @endif
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
                        @if(!empty($dados))
                        <input type="text" maxlength="9" id="valor" name="valor" value="{{$dados[0]->valor_produto}}" onkeyup="formatarMoeda()">
                        @else
                            <input type="text" maxlength="9" id="valor" name="valor"  onkeyup="formatarMoeda()">
                            @endif
                    </div>
                    <button type="submit" class="btn btn-success" id="cadastroProduto" >
                        @if(!$id)
                        <span id="nomeBotao">Cadastrar</span>
                        @else
                            <span id="nomeBotao">Alterar</span>
                        @endif
                    </button>
                </fieldset>

            </form>
        </div>
    </div>


@endsection
