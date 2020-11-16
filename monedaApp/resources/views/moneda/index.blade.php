@extends('moneda.base')
@section('titlePage')
    Listado de monedas
@endsection

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('moneda/create') }}" class="btn btn-primary">Crear moneda</a>
            </div>
        </div>
    </div>
</div>

<!--
op -> store, update, destroy
r -> negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th>#id</th>
            <th>Nombre</th>
            <th>Símbolo</th>
            <th>País</th>
            <th>Valor</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($monedas as $moneda)
        <tr>
            <td>{{ $moneda->id }}</td>
            <td>{{ $moneda->nombre }}</td>
            <td>{{ $moneda->simbolo }}</td>
            <td>{{ $moneda->valor }}</td>
            <td>{{ $moneda->fecha }}</td>
            
            <td><a href="{{ url('moneda/' . $moneda->id) }}">show</a></td>
            <td><a href="{{ url('moneda/' . $moneda->id . '/edit') }}">edit</a></td>
            <td><a href="#" data-id="{{ $moneda->id }}" class="enlaceBorrar" >delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('moneda') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection