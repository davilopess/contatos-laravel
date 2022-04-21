@csrf

<div class="row">
  <div class="form-group col-12">
    <label for="name">Nome</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') ?? @$contact->name }}">

    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror

  </div>
</div>

<div class="row">
  <div class="form-group col-12">
    <label for="email">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') ?? @$contact->email }}">

    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror

  </div>
</div>

<div class="row">
  <div class="form-group col-12">
    <label for="contact">Contato</label>
    <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" value="{{ old('contact') ?? @$contact->contact }}">

    @error('contact')
    <div class="text-danger">{{ $message }}</div>
    @enderror

  </div>
</div>


<button type="submit" class="btn btn-success">
  <i class="fas fa-save"></i> Salvar
</button>

@section('js')
@if(Session::has('message'))
<script>
  Swal.fire({
    type: "{{Session::get('type')}}",
    title: "{{Session::get('message')}}",
    showConfirmButton: false,
    timer: 1500
  })
</script>
@endif
@stop