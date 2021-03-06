@extends('adminlte::page')

@section('title', 'Arcondicionado')

@section('content_header')
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="text-align: end;">
                    @auth
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>

<h1>Listar contatos</h1>
@stop

@section('content')
@auth
<div class="row">
    <div class="col-12 mb-3">
        <a class="btn btn-info" href="{{ route('contact.create')}}">
            <i class="fas fa-plus"></i> Novo
        </a>
    </div>
</div>
@endauth
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Contatos</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="tableType">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Contato</th>
                            @auth
                            <th width="20%">Ações</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr data-id="{{ $contact->id }}">
                            <td>{{($contact->name)}}</td>
                            <td>{{($contact->email)}}</td>
                            <td>{{($contact->contact)}}</td>
                            @auth
                            <td class="text-center">
                                <a class="btn btn-warning" href="{{ route('contact.edit', $contact->id )}}">
                                    <span class="fas fa-edit"></span>
                                </a>
                                <button class="btn btn-danger delete-contact" data-action="{{ route('contact.destroy', $contact->id )}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            @endauth
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {

        $(document).on('click', '.delete-contact', function() {
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não poderá reverter isso!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exclua!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    var route = $(this).attr('data-action');
                    const contact_id = $(this).closest('tr').attr('data-id');

                    $.ajax({
                        url: route,
                        type: 'DELETE'
                    }).done(response => {
                        if (response.success) {
                            $(`tr[data-id=${contact_id}]`).remove();
                            Swal.fire({
                                title: 'Excluído!',
                                text: response.message,
                                type: 'success',
                            });
                        }
                        if (!response.success) {
                            Swal.fire({
                                title: 'Erro ao excluir o contato',
                                text: 'contate o suporte!',
                                type: 'error',
                            });
                        }
                    }).fail(error => {
                        Swal.fire({
                            title: 'Erro ao excluir o contato',
                            text: 'contate o suporte!',
                            type: 'error',
                        });
                    }).always(() => {});
                }
            });
        });
    });
</script>
@stop