@extends('employe.layout.layout')
@section('content')

<div class="container mt-5">
@if(session('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
@endif

 <h1>Employe Add Here</h1>
 <form action="{{ url('employe') }}" method="post">
    @csrf
  <div class="form-group mt-5">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
  </div>
 
  <input type="submit" value="Save" class="btn btn-primary w-100">
 </form>
</div>

@stop
