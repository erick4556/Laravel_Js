<?php

namespace PruebaLaravel\Http\Controllers\Trainer;

use Illuminate\Http\Request;
use PruebaLaravel\Http\Controllers\Controller;
use PruebaLaravel\Models\Trainer\Trainer;
use PruebaLaravel\Http\Requests\Trainer\StoreTrainerRequest;
use Image;

class TrainerController extends Controller
{
    //Middleware
    public function __construct(){
            $this->middleware('auth');
            $this->middleware('admin');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    //public function index()
    {   

      /*if(empty($request->user())){
            return redirect()->route('login');
        }
        $request->user()->authorizeRoles(['admin','user']);*/
        $trainers = Trainer::all();
       return view('entrenador/index', compact('trainers')); //Genera un array con la información que nosotros le asignemos.);
         // return View('entrenador/index')->with('trainers', $trainers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return view('entrenador/create');
        $request->user()->authorizeRoles(['admin']);
        return view('entrenador/create_subv'); //Vista con la subview
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request) //No validado
    public function store(StoreTrainerRequest $request)
    {
        //Obtener todos los datos que son enviados por nuestro usuario...
        //return $request->all();
       /* $trainer = new Trainer();
        $trainer->nombre = $request->input('nombre');
        $trainer->save();
        return redirect()->route('trainers.index');*/
        //return "Saved";

         $trainer = new Trainer();

        //Se va preguntar si tiene un archivo
       if($request->hasFile('avatar')){
             $file = $request->file('avatar'); //Al request le especifico que estamos trabajando con un archivo. 
            //Para no tener problema que ese nombre se repita voy a usar el time() osea la fecha actual     
             $name_image = time().$file->getClientOriginalName(); //Concatenar el nombre original del archivo.
              //Muevo la imagenes a la carpeta images que generamos. Con move asigno la dirección donde se va almacenar el archivo y asignamos el nombre que va recibir.
            $file->move(public_path().'/images/', $name_image);
            
  
        }

            
             $trainer->nombre = $request->input('nombre');
             $trainer->descripcion = $request->input('descripcion');
             $trainer->slug = $request->input('slug');
             $trainer->avatar = $name_image;
             $trainer->save();

            return redirect()->route('trainers.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //public function show(Trainer $trainer)//Implicid Binding //Especificar que vamos a recibir un modelo de tipo trainer.
    //public function show($slug) //No usar id sino nombre
    public function show(Trainer $trainer, Request $request) //Implicit binding customizado
    {
        $request->user()->authorizeRoles(['admin']);
        //$trainer = Trainer::find($id); //Metodos de eloquent..
        //Esto no se usaría por que ya tenemos customizado el implicit en el modelo.
        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail(); //Esta función lo que hace es lanzar una excepción si no encontramos el modelo que estamos buscando
        return view('entrenador/show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    public function edit(Trainer $trainer, Request $request) //Implicti Binding
    {
        $request->user()->authorizeRoles(['admin']);
        //return view('entrenador/edit', compact('trainer'));
         return view('entrenador/edit_subv', compact('trainer')); //Sub view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function update(Request $request, $id)
    public function update(Request $request, Trainer $trainer) //Implicit
    {
        //$trainer->fill($request->all()); // No se puede usar esto para el avatar.
        $trainer->fill($request->except('avatar'));
         if($request->hasFile('avatar')){
             $file = $request->file('avatar');    
             $name_image = time().$file->getClientOriginalName();
             $trainer->avatar = $name_image;//Actualizar el path que estamos asignando en la base de datos.
            $file->move(public_path().'/images/', $name_image);
        }  
        $trainer->save();
       return redirect()->route('trainers.show',[$trainer])->with('status','Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer, Request $request) //Implicit Binding
    {  
        //$request->user()->authorizeRoles(['admin']); 
        //Eliminar el archivo del mismo proyecto..
        //Va lanzar la ruta donde se encuentra la carpeta pública.
        $file_path = public_path().'/images/'.$trainer->avatar; 
        \File::delete($file_path);
        $trainer->delete();
        return redirect()->route('trainers.index');
        
    }
}
