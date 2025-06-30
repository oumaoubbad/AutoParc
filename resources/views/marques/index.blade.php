@extends("layouts.master")



  @section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">


            <div class="card border-info my-3">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <form action="{{ route('marques.store') }}" class="align-center" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-row align-center  p-4">
    <div class="col-sm-5 my-1">
      <label class="sr-only" for="inlineFormInputName">Marque</label>
      <input type="text" name="name" class="form-control" placeholder="Marque">
    </div>
    <div class="col-sm-5 my-1">
      <label class="sr-only" for="inlineFormInputGroupUsername">Logo</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-image"></i></div>
        </div>
        <input type="file" name="image" class="form-control" placeholder="Logo">
          </div>
    </div>

    <div class="col-auto text-right mx-2 my-1">
      <button type="submit" class="btn btn-info"> <i class="fas fa-plus "></i></button>
    </div>
  </div>
</form>


        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Logo</th>
                        <th>Marque</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($marques as $key => $marque)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th><img src="image/{{ $marque->image }}" class="rounded" alt="Card image cap" height="70px " width="70px"></th>
                  <th>{{ $marque->name }}</th>
                  <th>

                  <form method="POST" action="{{ route('marques.destroy', $marque->id) }}">


                    <a class="btn btn-secondary" href="{{ route('marques.edit',$marque->id) }}"> <i class="fas fa-edit "></i> </a>

                    @csrf
                    @method('DELETE')

                    <button onclick="return myFunction();" type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>

                   </form>
                  </th>

                </tr>
                @endforeach
              </tbody>

            </table>

</div>
</div>
</div>

    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


<script>
     $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 </script>
 @if(Session()->has('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{Session()->get('success')}}",
        showConfirmButton: false,
        timer: 2000
});
function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
    </script>
    @endif
@endsection



