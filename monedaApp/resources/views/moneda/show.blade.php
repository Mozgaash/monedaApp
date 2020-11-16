@extends('moneda.base')

@section('titlePage')
    Datos de la moneda
@endsection

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('moneda/' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('moneda') }}" class="btn btn-primary">Monedas</a>
                <a href="{{ url('moneda/create') }}" class="btn btn-primary">Crear moneda</a>
                <a href="#" data-id="{{ $moneda->id }}" data-nombre="{{ $moneda->nombre }}" class="btn btn-danger" id="enlaceBorrar">Borrar moneda</a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{$moneda->nombre}}</td>
        </tr>
        <tr>
            <td>Símbolo</td>
            <td>{{$moneda->simbolo}}</td>
        </tr>
        <tr>
            <td>País</td>
            <td>{{$moneda->pais}}</td>
        </tr>
        <tr>
            <td>Valor</td>
            <td>{{$moneda->valor}}</td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>{{$moneda->fecha}}</td>
        </tr>
    </tbody>
</table>
@endsection