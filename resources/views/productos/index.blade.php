@extends('layouts.menu')

@section('contenido')
<div class="row">
   <center><h1>Catalogo de Productos</h1></center>
</div>
@foreach($productos as $producto)

<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" width="500" height="570" 
      @if($producto->imagen === null)
        src="{{asset('img/no_disponible.jpg') }}"
      @else
        src="{{asset('img/'.$producto->imagen) }}"
      @endif
/>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">more_vert</i></span>
      <p><a href="#">Ver detalles</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">close</i></span>
      <ul>
          <li>
              Descripción: {{$producto->desc }}
          </li>
          <br>
          <li>
              Precio: {{$producto->precio}}
          </li>
          <br>
          <li>
              Categoria: {{$producto->categoria()->get()->nombre}}
          </li>
      </ul>
    </div>
  </div>

@endforeach

@endsection
