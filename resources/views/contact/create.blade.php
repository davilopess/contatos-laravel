@extends('adminlte::page')

@section('title', 'Contato')

@section('content_header')
<h1>Cadastrar Contato</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a class="btn btn-primary" href="{{ route('contact.index')}}">
            <i class="fas fa-list"></i> Listar
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Cadastrar contact</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    @include('contact.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')

@stop