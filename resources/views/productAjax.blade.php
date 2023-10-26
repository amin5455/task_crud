<!DOCTYPE html>
<html>
<head>
    <title>How To Create AJAX CRUD Operation In Laravel 10 - Techsolutionstuff</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

 
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">


</head>
<body>
    
<div class="container">
    <h1 class="mt-3 text-center">Create AJAX CRUD Operation In Laravel 10 </h1>
    <h2 id="del"></h2>
    <a class="btn btn-info mt-3 mb-5" href="javascript:void(0)" id="createNewProduct"> Add New Product</a>
    <table class="table table-bordered data-table w-100">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModelexa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Name" value="" required>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="savedata" value="create">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</body>
    
<script type="text/javascript">
  $(function () {
    
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewProduct').click(function () {
        $('#savedata').val("create-product");
        $('#id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModelexa').modal('show');
        $('#savedata').html('Save Product');
    });
    
    $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
      $.get("{{ route('products.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Product");
          $('#savedata').val("edit-user");
          $('#ajaxModelexa').modal('show');
          $('#id').val(data.id);
          $('#title').val(data.title);
          $('#description').val(data.description);
      })
   });
    
    $('#savedata').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('products.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#productForm').trigger("reset");
              $('#ajaxModelexa').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#savedata').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteProduct', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete this Product!");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('products.store') }}"+'/'+id,
            success: function (data) {
                table.draw();
                $('#del').val('Product Deleted success');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
</html>
 