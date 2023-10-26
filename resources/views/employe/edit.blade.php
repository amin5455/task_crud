@extends('employe.layout.layout')
@section('content')


    <div class="container mt-5">
 <h1>Employe Add Here</h1>
 <form action="{{ url('employe/'.$employe->id) }}" method="post">
    {!! csrf_field() !!}
    @method("PATCH")

  <div class="form-group mt-5">
    <input type="hidden" name="id" id="id" value="{{ $employe->id }}">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{ $employe->name }}" placeholder="Name">

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $employe->email }}" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{ $employe->address }}" placeholder="Address">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $employe->mobile }}" placeholder="Mobile">
  </div>
 
  <input type="submit" value="Save" class="btn btn-primary w-100">
</form>
</div>

@stop