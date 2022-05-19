<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Primera ruta

Route::get('hola' , function(){ 

echo "Tengo sueño, Tokyo Revengers el besto shonen"; 

});

//Ruta de arreglos: 

Route::get('arreglo' , function(){

    $estudiantes = [ 

    "CA" => 1, 
    "JO" => true, 
    "AN" => 2.45 
 
    ];

//Recorrer el arreglo 

foreach($estudiantes as $e){

    echo $e."<hr />"; 

}

// Areglos elementos en PHP 

$estudiantes[] = "Camilo"; 

echo "<pre>"; 
var_dump($estudiantes); 
echo "</pre>";  

}); 



Route::get('paises' , function(){

    $paises = [

    "Colombia" => [

        "capital" => "Bogotá", 
        "moneda" => "Peso", 
        "población" => 51,
        "ciudades" => [

            "Medellin", 
            "Cali", 
            "Barranquilla"
        ]
     ],

    "Perú" => [ 

        "capital" => "Lima",
        "moneda" => "Sol",
        "población" => 32, 
        "ciudades" => [

            "Arequipa", 
            "Trujillo"
        ]
    ], 

    "Paraguay" => [ 

        "capital" => "Asunción",
        "moneda" => "Guaraní",
        "población" => 7,
        "ciudades" => [

            "Luque"
        ]
    ],

    "Argentina" => [

        "capital" => "Buenos Aires", 
        "moneda" => "Peso Argentino", 
        "población" => 45,
        "ciudades" => [

            "Buenos Aires"
        ]
    ],

    "Ecuador" => [

        "capital" => "Quito", 
        "moneda" => "Dólar", 
        "población" => 17,
        "ciudades" => [

            "Quito"
        ]

    ]

    ]; 

// Mostrar la vista 

return view('paises')
->with("paises", $paises); 

}); 

Route::get('prueba' , function(){
    return view('productos.new');
});

//rutas rest - resource 

Route::resource('productos', ProductoController::class);



