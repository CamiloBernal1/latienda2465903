@extends('layouts.menu')
@section('contenido')
@if(session('mensajito'))

<div class="row">
    <span class="#64b5f6 blue lighten-2">{{session('mensajito')}}</span>
</div>
@endif

<div class="row">

<h1 class="amber-text text-lighten-2"> Nuevo Producto </h1>

</div>

<div class="row">

    <form method="POST"
          action="{{ route('productos.store') }}"
          class="col s8"
          enctype="multipart/form-data">
          @csrf

        <div class="row">
            <div class="input-field cols8">

            <input 
            type="text"
            placeholder="Nombre de producto"
            id="nombre"
            name="nombre"
            value="{{ old('nombre') }}" />

            <label for="nombre"> Nombre </label>
            <span class="#f48fb1 pink lighten-3"> {{ $errors->first('nombre') }}</span>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">

            <textarea 
            name="desc" 
            id="desc" 
            class="materialize-textarea" >
            {{ old('desc') }}
            </textarea>

            <label for="desc"> Descripcion </label>
            <span class="#ce93d8 purple lighten-3"> {{ $errors->first('desc') }}</span>

            </div>
        </div>

        <div class="row">
            <div class="input field col s8">

            <label for="precio"> Precio </label>

            <input 
            type="text"
            name="precio"
            id="precio"
            value = "{{ old('precio')}}">

            <span class="#b39ddb deep-purple lighten-3"> {{ $errors->first('precio') }}</span>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">

            <select name="marca" id="marca">

            <option value="">Elige marca</option>

            @foreach($marcas as $marca)

            <option value="{{ $marca->id }}">
                   
               {{ $marca->nombre }}
            
            </option>

               @endforeach

            </select>

            <label for="marca">Elija marca</label>

            <span class="#64b5f6 blue lighten-2"> {{ $errors->first('marca') }}</span>

          </div>
        </div>
        <div>
        
        <div class="row">
            <div class="input-field col s8">
            
            <select name="categoria" id="categoria">

            <option value="">Elige categoria</option>

             @foreach($categorias as $categoria)

            <option value="{{ $categoria->id }}">
                   
               {{ $categoria->nombre }}
            
            </option>

               @endforeach

            </select>

            <label for="categoria"> Elija la categoria </label>

            <span class="#aed581 light-green lighten-2"> {{ $errors->first('categoria') }}</span>

          </div>
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
                <span class="#e57373 red lighten-2">{{ $errors->first('imagen')  }} </span>
            </div>
        </div>
        <div class="row">
        <button class="btn waves-effect waves-light" type="submit"> Guardar
  </button>
        </div>
    </form>

</div>

@endsection