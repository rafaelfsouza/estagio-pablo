<?php

namespace App\Produto;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function inserir($data){
        $Produto = new Produto;

        $Produto->categoria_id = $data->categoria_id;
        $Produto->marca_id = $data->marca_id;
        $Produto->preco = $data->preco;
        $Produto->imagem = $data->imagem;
        $Produto->produto = $data->produto;

        $Produto->save();
        return 0;
    }

    public function atualizar($data){
        $Produto = new Produto;

        $Produto->categoria_id = $data->categoria_id;
        $Produto->marca_id = $data->marca_id;
        $Produto->preco = $data->preco;
        $Produto->imagem = $data->imagem;
        $Produto->produto = $data->produto;

        $Produto->save();
        return 0;
    }
    
    public function deletar($data){
        $Produto = new Produto;
        $Produto = Produto::find($data);
        $Produto->delete();
        return 0;
    }

    public function selecionar(){

    }
}
