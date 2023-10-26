@extends('employe.layout.layout')
@section('content')

    <div class="container">
        <h1 class="mt-5">{{ $employe->name }} Detail</h1>
    <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $employe->name }}</td>
      <td>{{ $employe->email }}</td>
      <td>{{ $employe->address }}</td>
      <td>{{ $employe->mobile }}</td>

    </tr>
  </tbody>
</table>
    </div>

@endsection