<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.post.listpost',['lista_post'=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Validação do laravel
        $this->validate($request,[
            'titulo'=> 'required|min:3',
            'autor' => 'required|min:3',
            'categoria'=> 'required',
            'conteudo'=> 'required|min:10',
        ]);
        
        $objPost = new Post();        
        $objPost->titulo = $request->input('titulo');
        $objPost->autor = $request->input('autor');
        $objPost->categoria = $request->input('categoria');
        $objPost->conteudo = $request->input('conteudo');
        
        if($objPost->save()){
            return redirect()->back()->with('success','Nova postagem cadastrada com sucesso!');
        }else{
            return redirect()->back()->with('error','Ocorreu um erro cadastrar esta postagem!');
        }
        
    }

    
    
    /**
     * 
     */
    public function filtrarPostagensCategoria(Request $request, $categoria)
    {
        
        $objPost = new Post();
        $request->session()->put('ss_categoria',$categoria);
        $lista_postagens = $objPost->postagensCategoria($categoria);
        return view('admin.post.listpost',['lista_post' => $lista_postagens]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objPost = Post::find($id);
        return view('admin.post.editpost',['post'=>$objPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validação do laravel
        $this->validate($request,[
            'titulo'=> 'required|min:3',
            'autor' => 'required|min:3',
            'categoria'=> 'required',
            'conteudo'=> 'required|min:10',
        ]);
        
        //
        $objPost = Post::find($id);
        
        $objPost->titulo = $request->input('titulo');
        $objPost->autor = $request->input('autor');
        $objPost->categoria = $request->input('categoria');
        $objPost->conteudo = $request->input('conteudo');
        
        //
        if($objPost->save()){
            return redirect()->back()->with('success','Postagem alterada com sucesso!');
        }else{
            return redirect()->back()->with('error','Ocorreu um erro alterar esta postagem!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $objPost = Post::find($id);
        $objPost->delete();
        return redirect()->back();
    }
}
