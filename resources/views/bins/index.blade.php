@extends('layouts.base')
@section('title', 'Estacionamiento')

@section('content')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Cajón</th>
                <th scope="col">Auto</th>
                <th scope="col">Placas</th>
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>
                <th scope="col">Pago</th>
                <th scope="col">Acciones</th>
                <th scope="col"><a href="{{ url('/bins/create') }}" class="btn btn-success">Ingresar</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bins as $bin)
                <tr>
                    <th scope="row">{{ $bin->cajon }}</th>
                    <td>
                        {{ $bin->modelo }}

                    </td>
                    <td>{{ $bin->placas }}</td>
                    <td>{{ $bin->hora_entrada.'  '. $bin->fecha_entrada }}</td>
                    <td>
                        @if( isset( $bin->hora_salida) )
                            {{ $bin->hora_salida.'  '. $bin->fecha_salida }}
                        @else
                            --:--
                        @endif
                    </td>
                    <td>
                        @if( isset($bin->pago))
                            ${{ $bin->pago }} 
                        @else 
                            $---.-- 
                        @endif
                    </td>
                    <td>

                        <a class="btn btn-primary float-left" href="{{ url('bins', [$bin->id]) }}"> Ver </a>
                        @if($bin->estado != 0)
                            <a class="btn btn-info float-left ml-1" href="{{ url('bins', [$bin->id, 'edit']) }}"> Pagar </a>
                        @endif
                    </td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
