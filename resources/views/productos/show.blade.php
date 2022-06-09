@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1>{{ $producto->nombre }}</h1>
</div>

<div class="row">
    <div class="col s8">
        <div class="row">
            <img width="320" height="300" 
                @if(is_null($producto->imagen))
                    src="{{asset('img/no_disponible.jpg') }}"
                 @else
                    src="{{asset('img/'.$producto->imagen) }}"
                @endif
            />

    </div>

        <div class="row">
            <ul>
                <li>Descripcion: {{$producto->desc}}</li>
                <br>
                <li>Precio: {{$producto->precio}} pesos</li>
                <br>
                <li>Categoria: {{$producto->categoria->nombre}}</li>
                <br>
                <li>Marca: {{$producto->marca->nombre}}</li>
            </ul>

        </div>
    </div>

    <div class="col s4">

    <form method="POST" action="{{ route('carrito.store') }}">
        @csrf
        <div class="row">
            <h4>Añadir al Carrito </h4>
    </div>

    <div class="row">
        <div class="col s4 input-field">
            <select name="cantidad" id="cantidad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <label for="cantidad">Cantidad</label>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
        <button class="btn waves-effect waves-light" type="submit"> Guardar </button>
        </div>
    </div>
    <input type="hidden" name="prod_id" value="{{ $producto->id}}">
    <input type="hidden" name="prod_name" value="{{ $producto->nombre}}">
    </form>
    </div>
</div>

@endsection