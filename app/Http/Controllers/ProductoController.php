<?php

namespace App\Http\Controllers;


use App\Models\Marca; 
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Seleccionar todos los productos de la base de datos
        $productos = Producto::all();  

        //Mostrar el catalogo de productos llevandole las listas de producto

        return view('productos.index') 
            ->with('productos', $productos ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccion de todas las marcas 
        $marcas  = Marca::all(); 
        //Seleccion de todas las categorias
        $categorias = Categoria::all(); 
        //Mostrar la vista con los datos, llevandole marcas
        return view('productos.new')
                    ->with('marcas' , $marcas)
                    ->with('categorias' , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

    //1. Establecer las reglas de validacion que apliquen a cada campo 

     $reglas = [
         "nombre" => 'required|alpha', 
         "desc" => 'required|min:20|max:50', 
         "precio" => 'required|numeric',
         "marca" => 'required',
         "categoria" => 'required',
         "imagen" => 'required|image'

    ]; 

    //Mensajes: 

    $mensajes = [
        "required" => "Campo obligatorio", 
        "alpha" => "Solo letras",
        "min" => "Se permiten 20 caracteres como minimo",
        "numeric" => "Solo numeros",
        "imge" => "Solo imagenes"
    ]; 

    //2. Crear el objeto validador

    $v = Validator::make($r->all() , 
                         $reglas, 
                         $mensajes ); 

    //3. Validar los input data

    if($v->fails()){

    //Validacion fallida
    //Redireccionamiento 
    return redirect('productos/create')
    ->withErrors($v)
    ->withInput(); 

    }else{

    //Accder a propiedades del archivo cargado

    $archivo = $r->imagen;
    $nombre_archivo = $archivo->getClientOriginalName(); 

    //Establecer la ubicacion donde se almacena el archivo
    
    $ruta=public_path()."/img/";
    
    //Mover el archivo

    $archivo->move($ruta,
                    $nombre_archivo);

    //Validacion correcta

    //Crear nuevo producto 

    $p = new Producto; 

    //Asignar valores a los atributos del objeto

    $p-> nombre = $r-> nombre; 
    $p-> desc = $r-> desc; 
    $p-> precio = $r-> precio;
    $p-> marca_id = $r-> marca; 
    $p-> categoria_id = $r-> categoria;
    $p-> imagen = $nombre_archivo;

    //Guardar en db

    $p->save();

    // Redireccionar al formulario con mensaje de exito(session)
    return redirect('productos/create')
    ->with('mensajito', "Producto registrado");
    
    } 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {

        //Seleccionar el producto con id
        $producto = Producto::find($producto); 
        //Mostrar la vista de detalles llevandole el producto seleccionado
        return view('productos.show')
                    ->with('producto', $producto); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo"Aqui va el formulario para editar el producto: $producto "; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
