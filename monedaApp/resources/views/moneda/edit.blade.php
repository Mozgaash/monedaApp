@extends('moneda.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('moneda' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Atrás</a>
                <a href="{{ url('moneda') }}" class="btn btn-primary">Monedas</a>
                <a href="#" data-id="{{ $moneda->id }}" data-nombre="{{ $moneda->nombre }}" class="btn btn-danger" id="enlaceBorrar">Borrar moneda</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif
<form role="form" action="{{ url('moneda/' . $moneda->id) }}" method="post" id="editCoinForm">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" maxlength="50" minlength="2" required class="form-control" id="nombre" placeholder="Nombre de la moneda" name="nombre" value="{{ old('nombre', $moneda->nombre) }}">
        </div>
        <div class="form-group">
            <label for="simbolo">Símbolo</label>
            <input type="text" maxlength="4" minlength="1" required class="form-control" id="simbolo" placeholder="Simbolo de la moneda" name="simbolo" value="{{ old('simbolo', $moneda->simbolo) }}">
        </div>
        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" maxlength="50" minlength="2" required class="form-control" id="pais" placeholder="País de la moneda" name="pais" value="{{ old('pais', $moneda->pais) }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="any" required class="form-control" id="valor" placeholder="Valor en euros de la moneda" name="valor" value="{{ old('valor', $moneda->valor) }}">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" required class="form-control" id="fecha" placeholder="Fecha de instauración de la moneda" name="fecha" value="{{ old('fecha', $moneda->fecha) }}">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
@endsection