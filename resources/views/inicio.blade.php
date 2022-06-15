@extends('plantilla')

@section('content')
<div class="row">
    
    <div class="col-md-7"></div>
        
    {{--Fila formulario--}}
    <div class="col-md-5">
        <h3 class="text-center mb-4">Agendar Sala de Juntas</h3>

        <form action="{{route('store')}}" method="POST">
        @csrf

        <div class="form group">
            <select class="form-select form-select form-select" id="sala" name="sala" value="{{old('sala')}}" required>
                <option disabled selected value="">Escoger la sala</option>
                <option value="1">Sala 1</option>
                <option value="2">Sala 2</option>
                <option value="3">Sala 3</option>
                <option value="4">Sala 4</option>
                <option value="5">Sala 5</option>
            </select>
        </div>

        @error('sala')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
              La sala ya esta ocupada, selecciona otra, porfavor!
            </div>
          </div>
            <div class="alert alert-danger">
                La sala es requerida
            </div>
        @enderror


            <div class="form-group">
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Completo" value="{{old('nombre')}}" required>
            </div>

            @error('nombre')
            <div class="alert alert-danger">
                El nombre es requerido
            </div>
        @enderror

            <div class="form-group">
                <input type="text" name="actividad" id="actividad" class="form-control" placeholder="Actividad a realizar" value="{{old('actividad')}}" required>
            </div>

            @error('actividad')
            <div class="alert alert-danger">
                La actividad es requerida
            </div>
        @enderror


            <div class="form-group">
                <label class="form-label"  for="time" id="">Hora de inicio</label>
                <input class="form-control" type="time" id="horadinicio" name="horadinicio" required>
            </div>

            @error('horadinicio')
            <div class="alert alert-danger">
                La hora de inicio es requerida!
            </div>
        @enderror

        <div class="form-group">
            <label class="form-label"  for="time" id="">Hora de termino</label>
            <input class="form-control" type="time" id="horadtermino" name="horadtermino" required>
        </div>

        @error('horadtermino')
        <div class="alert alert-danger">
            La hora de terminacion es requerida!
        </div>
    @enderror

        

            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success " id="guardar">Agendar Sala</button>
            </div>
        </form>

        @if (session('agregar'))

            <div class="alert alert-success mt-3">

                {{session('agregar')}}

            </div>
            
        @endif

        
    </div>
    {{--Fin fila formulario--}}
    
</div>
<div class="pt-5">
<table class="table table-striped">
    <tr>
        
        <th>Sala</th>
        <th>Nombre</th>
        <th>Actividad</th>
        <th>Hora de Inicio</th>
        <th>Hora de Termino</th>
        <th>Acciones</th>
    </tr>

    @foreach ($salas as $item)
    <tr>
        <td>{{$item->sala}}</td>
        <td>{{$item->nombre}}</td>
        <td>{{$item->actividad}}</td>
        <td>{{$item->horadinicio}}</td>
        <td>{{$item->horadtermino}}</td>
        <td>

         
            <a href="{{route('editar', $item->id)}}" class="btn btn-warning">Editar</a>
           
            <form action="{{route('eliminar', $item->id)}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger" >Finalizar</button>
            
            </form>
            
        </td>
    </tr>
        
    @endforeach
    
</table>

@if (session('eliminar'))

<div class="alert alert-success mt-3">

    {{session('eliminar')}}

</div>

@endif

</div>
@endsection