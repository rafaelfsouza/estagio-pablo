<?php

namespace App\Marca;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function inserir($data){
        $Marca = new Marca;

        $Marca->marca = $data->marca;
        $Marca->ativo = $data->ativo;

        $Marca->save();
    }

    public function atualizar($data){

    }
    
    public function deletar($data){

    }

    public function selecionar(){
        
    }
}
