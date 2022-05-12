@extends('layouts.menu')

@section('contenido')

<div class="row">

<h1 class="amber-text text-lighten-2"> Nuevo Producto </h1>

</div>

<div class="row">

    <form class="col s8">
        <div class="row">
            <div class="input-field cols8">

            <input 
            type="text"
            placeholder="Nombre de producto"
            id="nombre"
            name="nombre" />

            <label for="nombre"> Nombre </label>

            </div>
        </div>

        <div class="row">

            <div class="input-field col s8">

                <textarea 
                name="desc" 
                id="desc" 
                class="materialize-textarea" >
                </textarea>

                <label for="desc"> Descripcion </label>
            </div>

        </div>

        <div class="row">
            <div class="input field col s8">
                <input 
                type="text"
                nombre="precio"
                id="precio" />

                <label for="precio"> Precio </label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8">

                <div class="btn">

                <span>Imagen de producto</span>
                <input type="file" name="imagen">

                </div>

                <div class="file-path-wrapper">

                <input type="text" class="file-path">
                </div>
            </div>
        </div>

        <div class="row">
        <button class="btn waves-effect waves-light" type="submit"> Guardar
  </button>
        </div>
    </form>

</div>

@endsection