<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\Perfil;
use Illuminate\Http\Request;
use Impacto\Usuarios\PerfilRepository;

class PerfilController extends Controller {

    protected $perfilRepository;
    /**
     * @var Modulo
     */
    private $modulo;

    public function __construct(PerfilRepository $perfilRepository, Modulo $modulo){
        $this->perfilRepository = $perfilRepository;
        $this->modulo = $modulo;
    }

    public function index(Request $request){

        $listagem = $this->perfilRepository->listagem($request->get('s'));

        return view('admin.perfis.index')->with(compact('listagem'));

    }

    public function create(){

        return view('admin.perfis.create');

    }

    public function store(Perfil $request){

        $input = $request->all();

        $perfil = $this->perfilRepository->store($input);
        if ($perfil){
            $request->session()->flash('success', 'Registro Cadastrado!');
        }

        return redirect()->intended(route('admin.perfis.index'));

    }

    public function edit($id){

        $perfil = $this->perfilRepository->show($id);

        if(!$perfil){
            return redirect()->route('admin.perfis.index');
        }

        return view('admin.perfis.edit')->with(compact('perfil'));

    }

    public function update(Perfil $request, $id){

        $input = $request->all();

        $perfil = $this->perfilRepository->update($id, $input);

        if ($perfil){
            $request->session()->flash('success', 'Registro Atualizado!');
        }

        return redirect()->intended(route('admin.perfis.index'));

    }

    public function destroy($id){

        $perfil = $this->perfilRepository->delete($id);

        session()->flash('success', 'Registro Excluído!');

        return response()->json($perfil);

    }

    public function show($id)
    {
        $perfil = $this->perfilRepository->show($id);

        if(!$perfil){
            return redirect()->route('admin.perfis.index');
        }

        return view('admin.perfis.show')->with(compact('perfil'));
    }
}
