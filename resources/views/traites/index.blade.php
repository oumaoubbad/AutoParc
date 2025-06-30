@extends('layouts.master')

  @section('content')   

  <div class="row my-5">
        <div class="col-md-11 mx-auto">
        
        <div class="card border-info my-5">
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2><strong>Traite</strong></h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('traites.create') }}"> <i class="fas fa-plus "> Ajouter Voiture</i></a>
        
                         </div>
                    </div>
            </div>
            </div>
      
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Voiture</th>
                        <th>date d'achat</th>
                        <th>jour de traite</th>
                        <th>mois resté</th>
                        <th>montant avancé</th>
                        <th>prix d'achat</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($traites as $key => $traite)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th><img src="image/{{ $traite->voiture->image }}" class=" mx-auto d-block" width="100px"></th>
                  <th>{{ $traite->date_achat }}</th>
                  <th>{{ $traite->jour_traite }}</th>
                  <th>{{ $traite->mois_reste }}</th>
                  <th>{{ $traite->montant_avance }}</th>
                  <th>{{ $traite->prix_achat }}</th>
                  
                  
                
                  <th>
                      
                  <form  id="del" method="POST" action="{{ route('traites.destroy', $traite->id) }}">
     
                    <a class="btn btn-dark" href=""> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('traites.edit', $traite->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button  type="submit" onclick="deleteCar()" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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