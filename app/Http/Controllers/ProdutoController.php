<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tb_categoria_produto;
use App\Models\tb_produto;

class ProdutoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function listaProduto()
    {
        $produtos = DB::table('tb_produtos')->join('tb_categoria_produtos', 'id_categoria_produto','=','id_categoria_planejamento')
            ->select('nome_produto','valor_produto','nome_categoria','id_produto')->get()->reverse();

        return view('welcome', ['listaProdutos' => $produtos]);
    }


    public function index()
    {

        $categorias = tb_categoria_produto::all();

        return view('cadastroCategoria',['categorias' => $categorias]);
    }


    /**
     * <description> Recebe o nome inserido e cadastra na tabela de categoria e também faz o update na tabela;
     * @param Request $request
     */
    public function cadastrarCategoria(Request $request)
    {


        //Instancia do objeto
        $categoria = new tb_categoria_produto;

        //Popula os dados
        $nomeCategoria = $request->valueCategoria;
        $categoria->nome_categoria = $nomeCategoria;

        if (!empty($request->categoriaId))
        {
        $categoriaId = $request->categoriaId;
            DB::table('tb_categoria_produtos')
                ->where('id_categoria_planejamento','=',$categoriaId)
                ->update([
                    'nome_categoria' => $nomeCategoria,
                ]);
        }else{
        $categoria->save();
        }

        return response()->json($categoria);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {

        $id = $request->idCategoria;

        //deleta o dado atravez do id passado
        DB::table('tb_categoria_produtos')->where('id_categoria_planejamento','=',$id)->delete();

        return response()->json('Categoria Excluida com Sucesso');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function editarCategoria(Request $request)
    {
        $id = $request->idCategoria;

        $categoria = DB::table('tb_categoria_produtos')->where('id_categoria_planejamento','=',$id)->get();
        //$users = DB::table('users')->where('votes', '>', 100)->get();

        return $categoria;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function carregarCategoria(){

        $categorias = tb_categoria_produto::all();
        $dados = '';
        $id = '';
        return view('cadastroProduto',['categorias' => $categorias , 'dados' => $dados, 'id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cadastroProduto(Request $request)
    {
       $produto = new tb_produto();

        $nome = $request->nomeProduto;
        $data = $request->data;
        $categoria = $request->categoriaProduto;
        $valor = number_format((int)$request->valor, 2, '.');

        //popula os dados
        $produto->nome_produto = $nome;
        $produto->data_cadastro = $data;
        $produto->id_categoria_produto = $categoria;
        $produto->valor_produto = $valor;

        if ($request->produtoId){
            $produto->id_produto = $request->produtoId;
            $produto->update();
        }else{

        //salva os dados no banco
        $produto->save();
        }


        return redirect('/produtos')->with('msg','Produto cadastrado com sucesso');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletarProduto(Request $request)
    {

        $id = $request->idProduto;

        //deleta o dado atravez do id passado
        DB::table('tb_produtos')->where('id_produto','=',$id)->delete();

        return response()->json('Produto Excluido com Sucesso');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function carregarProduto($id)
    {
        $categorias = tb_categoria_produto::all();

        $dados = DB::table('tb_produtos')->where('id_produto','=',$id)->get();


        return view('cadastroProduto',['categorias' => $categorias ,'id' => $id, 'dados' => $dados]);
    }
}
