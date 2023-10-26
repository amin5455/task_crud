@extends('employe.layout.layout')
@section('content')

    <div class="container">
    @if(session('success'))
    <div class="alert alert-success mt-5">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
@endif

    <h1 class="mt-3 mb-3"> Employe Record</h1>
    <a href="{{ url('/employe/create')}}" class="btn btn-primary mt-5 mb-3">Add Eploye</a>
<table class="table data-table mt-5 w-100">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   
  </tbody>
</table>
</div>
</div>

@stop
