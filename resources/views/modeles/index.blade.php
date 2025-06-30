@extends("layouts.master")

  @section('content')   
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
       
            <div class="card border-info my-3">
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 my-2 text-center ">
                        <h2>Modéles</h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('modeles.create') }}"> <i class="fas fa-plus "> Ajouter Modéle</i></a>
        
                         </div>
                    </div>
            </div>
            </div> 
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Modéle</th>
                        <th>Marque</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($modeles as $key => $modele)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{ $modele->marque->name }}</th>
                  <th>{{ $modele->name }}</th>
                  <th>
                      
                  <form action="{{ route('modeles.destroy', $modele->id) }}" method="POST">     
      
                    <a class="btn btn-secondary" href="{{ route('modeles.edit', $modele->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button onclick="return myFunction();" type="submit" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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
            'copy', 'csv', 'excel', 'pdf', 'print' , 
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