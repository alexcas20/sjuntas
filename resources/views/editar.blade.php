@extends('plantilla')

@section('content')
    <h3 class="text-center mb-3 pt-3">Actualizar {{$salaActualizar->id}}</h3>

    <form action="{{route('update', $salaActualizar->id)}}" method="POST">
        @method('PUT')
            
        @csrf
       

        <div class="form-group">
            <input type="text" name="nombre" id="nombre" value="{{$salaActualizar->nombre}}" class="form-control">
        </div>

        <div class="form-group">
             <input type="text" name="actividad" id="actividad" value="{{$salaActualizar->actividad}}" class="form-control">
        </div>


        <div class="d-grid">
             <button type="submit" class="btn btn-warning btn">Editar</button>
        </div>

    </form>

    @if (session('update'))
    <div class="alert alert-success mt-3">
        {{session('update')}}
    </div>
        
    @endif
@endsection