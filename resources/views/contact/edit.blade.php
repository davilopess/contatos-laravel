@extends('adminlte::page')

@section('title', 'Contatos')

@section('content_header')
<h1>Editar contact</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a class="btn btn-primary" href="{{ route('contact.index')}}">
            <i class="fas fa-list"></i> Listar
        </a>
        <a class="btn btn-info" href="{{ route('contact.create')}}">
            <i class="fas fa-plus"></i> Novo
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Editar contato</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('contact.update', $contact->id) }}">
                    @csrf
                    @method('PUT')
                    @include('contact.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop