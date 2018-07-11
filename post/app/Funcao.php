<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    /**
     * Recebe uma data em formato americano e formata para o formata brasileiro
     * @param type $data
     * @return type
     */
    public static function dataBr($data)
    {
        return date('d/m/Y H:i:s', strtotime($data));
    }
}
