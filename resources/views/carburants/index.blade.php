@extends('layouts.master')

  @section('content')   

    <div class="row my-5">
        <div class="col-md-12 ">
        
            <div class="card border-info my-5">
   
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2><strong>carburants</strong></h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('carburants.create') }}"> <i class="fas fa-plus "> Ajouter carburant</i></a>
        
                         </div>
                    </div>
            </div>
            
        </div>
      
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>voiture</th>
                        <th>date </th>
                        <th>kilométrage</th>
                        <th>type carburant</th>
                        <th>litre</th>
                        <th>prix</th>
                        <th>note</th>
                      
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($carburants as $key => $carburant)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th><img src="image/{{ $carburant->voiture->image }}" class=" mx-auto d-block" width="100px"></th>
                  <th>{{ $carburant->date }}</th>
                  <th>{{ $carburant->kilom }}</th>
                  <th>{{ $carburant->tcarburant->name }}</th>
                  <th>{{ $carburant->litre }}</th>
                  <th>{{ $carburant->prix }}</th>
                  <th>{{ $carburant->note }}</th>
                  
                  
                  
                  
                
                  <th>
                      
                  <form  id="del" method="POST" action="{{ route('carburants.destroy', $carburant->id) }}">
     
                    <a class="btn btn-dark"  href="{{ route('carburants.show',$carburant->id) }}"> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('carburants.edit', $carburant->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button onclick="return myFunction();"  type="submit" onclick="deleteCar()" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>






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