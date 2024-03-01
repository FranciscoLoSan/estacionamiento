@extends('layouts.base')
@section('title', 'Agregar')

@section('content')
    <!-- Content here -->
    <div class="card text-center m-4">
        <div class="card-header">
            <div class="row">
                <div class="col-2">
                    <a class="navbar-brand btn btn-warning" href="{{url('/bins/index')}}">Atras</a>
                </div>
                <div class="col-8">
                    Información de auto
                </div>

            </div>
        </div>
        <form  >
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control text-center" id="modelo" name="modelo" @if(isset($bin)) value="{{$bin->modelo}}" @endif readonly>
            </div>
            <div class="mb-3">
                <label for="placas" class="form-label">Placas</label>
                <input type="text" class="form-control text-center" id="placas" name="placas" @if(isset($bin)) value="{{$bin->placas}}" @endif readonly>
            </div>
            <div class="mb-3">
                <label for="cajon" class="form-label">Cajón</label>
                <input type="text" class="form-control text-center" id="cajon" name="cajon" @if(isset($bin)) value="{{$bin->cajon}}" @endif readonly>
            </div> 
            <div class="row">
                <label for="hora_entrada" class="form-label">Entrada</label>
                <div class="mb-3 col-6">
                    <input type="time" class="form-control text-center" id="hora_entrada" name="hora_entrada" @if(isset($bin)) value="{{$bin->hora_entrada}}" @else value="{{ \Carbon\Carbon::now()->format('H:i') }}"@endif readonly/>
                </div>
                <div class="mb-3 col-6">    
                    <input type="text" class="form-control text-center" id="fecha_entrada" name="fecha_entrada" @if(isset($bin)) value="{{$bin->fecha_entrada}}" @else value="{{ \Carbon\Carbon::now()->format('y-m-d') }}" @endif readonly/>
                </div>
            </div>

            @if (isset($bin)) 
                <div class="row">
                    <label for="hora_salida" class="form-label">Salida</label>
                    <div class="mb-3 col-6">
                        <input type="time" class="form-control text-center" id="hora_salida" min="{{ $bin->hora_entrada}}" name="hora_salida" value="{{ \Carbon\Carbon::now()->format('H:i') }}" onchange="cambiarTarifa();" readonly>
                    </div>
                    <div class="mb-3 col-6">    
                        <input type="text" class="form-control text-center" id="fecha_salida" name="fecha_salida" value="{{ \Carbon\Carbon::now()->format('y-m-d') }}" readonly/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="hora_salida" class="form-label">Tárifa</label>
                        <input type="number" class="form-control text-center" id="tarifa" name="tarifa" value="28" readonly/>
                    </div>
                    <div class="mb-3 col-6">    
                        <label for="total_pago" class="form-label">Total</label>
                        <input type="number" class="form-control text-center" id="total_pago" name="total_pago" value="{{ $bin->total_pago}}" readonly/>
                    </div>
                </div>
                    
                <div class="mb-3 col-6"> 
                    <input type="number" class="form-control text-center d-none" id="estado" name="estado" value="1" readonly/>
                </div>
            @endif  
        </form>
        <div class="card-footer text-muted m-2">
        </div>
    </div>
@endsection 