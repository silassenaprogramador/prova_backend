<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
       
    protected $fillable = [
        'titulo', 
        'conteudo', 
        'autor',
        'categoria'
    ];
    
    public function postagensCategoria($categoria)
    {
        
        $result = DB::table("posts")
                    ->select("*")
                    ->where("categoria",'=',$categoria)
                    ->get();
        
        return $result;
    }
    
}
