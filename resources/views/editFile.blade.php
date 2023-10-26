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


      
        <form action="{{ route('file.file_edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
                <input type="hidden" name="file_id" value="{{ $edit_file->id }}">
                <p>{{ $edit_file->file_name }}</p>
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


      
      </div>
    </div>
</div>
</body>
    
</html>