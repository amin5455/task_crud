<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
      
<body>
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>Laravel 10 File Upload</h2>
      </div>
  
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif


      
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
                <label class="form-label" for="inputFile">File:</label>
                <input 
                    type="file" 
                    name="file" 
                    id="inputFile"
                    class="form-control @error('file') is-invalid @enderror">
  
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
   
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
       
        </form>


        <table class="table data-table mt-5 w-100">
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Action</td>

         </tr>
         @foreach ($get_file as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->file_name }}</td>
            <td>
                <a href="/file-upload/{{ $user->id }}" class="btn btn-success btn-sm">Delete</a>

                <a href="/file-upload/{{ $user->id }}/edit" class="btn btn-info btn-sm">Edit</a>
            </td>

         </tr>
         @endforeach
      </table>
      
      </div>
    </div>
</div>
</body>
    
</html>