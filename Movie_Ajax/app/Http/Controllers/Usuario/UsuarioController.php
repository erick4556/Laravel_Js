<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Http\Requests\Usuario\UsuarioRequest;
use App\Http\Requests\Usuario\UpdateUserRequest;
use Session; //Para mensajes flash.

class UsuarioController extends Controller
{   
    public function __construct(){
            $this->middleware('auth');
            $this->middleware('admin',['only' => ['create','edit','index']]); //Solo se aplica para el create, edit y index
           // $this->middleware('admin');
    }        

    public function index(Request $request)
    {
       $users = Usuario::paginate(2);
       if($request->ajax()){
        return response()->json(view('usuario/users', compact('users'))->render());
       }
        //mostrar solo los elementos eliminados
        //$users = Usuario::onlyTrashed()->paginate(2);
        return view('usuario/index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        //Otra forma de crear
        //Usuario::create($request->all());
        $usuario = new Usuario();

        $usuario->name = $request->input('name'); //$request->name
        $usuario->email = $request->input('email');  
        //$usuario->password = bcrypt($request->input('password')); Se omite por que en el modelo se hizo el cifrado ya.
        $usuario->password = $request->input('password'); 
        
        $usuario->save();

        return redirect('usuario')->with('status','Usuario creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $users)
    {
      //Sin ruta el id se dirige automaticamente aqui!!..
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario) //Implicit binding
    {
        
        return view('usuario/edit', compact('usuario'));
    }

    //Función customizada
    public function editar($id)
    {
        $usuario = Usuario::find($id);
        return view('usuario/edit', compact('usuario'));
    }

  /*  public function editar(Request $request)
    {
        $usuario = Usuario::find($request->id);
        return view('usuario/edit', compact('usuario'));
    }*/


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Usuario $usuario, UpdateUserRequest $request)
    {
        $usuario->fill($request->all());
        $usuario->save();
        //Otra forma de enviar mensaje
        Session::flash('update','Se ha actualizado correctamente!!');
        return redirect()->route('usuario.index');
       // return redirect('usuario');
    }

    //Función customizada
    public function actualizar(UpdateUserRequest $request,$id)
    {
        $user = Usuario::find($id);
        $input = $request->all();
        $user->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente, pasando el mismo id!!');
        return redirect()->route('usuario.index');
    }

   /* public function actualizar(UpdateUserRequest $request)
    {
        $user = Usuario::find($request->id);
        $input = $request->all();
        $user->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente usando el $request->id!!');
        return redirect()->route('usuario.index');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {   
        //Uso de softdelete
        //$user = User::find($usuario);
        $usuario->delete();
        Session::flash('delete','Se ha eliminado correctamente!!');
        return redirect()->route('usuario.index');
    }
}
