<?php
namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postagens = Post::all();
        
        return view('welcome',['lista_postagens'=>$postagens]);
    }
    
    /**
     * 
     * @param type $categoria
     */
    public function listarPostCategoria($categoria)
    {
        
        $objPost = new Post();
        $postagens = $objPost->postagensCategoria($categoria);
        return view('welcome',['lista_postagens'=>$postagens]);
        
    }

    
}
