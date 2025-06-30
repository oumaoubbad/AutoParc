@extends("layouts.master")

  @section('content')   
  @if(auth()->user()->role)   

<div class="container">
    <div class="row my-5">
        <div class="col-md-11 mx-auto">
       
            <div class="card border-info my-3">
   
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="text-center font-weight-bold ">
            <div class="pull-left py-2">
                <h2><strong>Affectations</strong></h2>
            </div>
            
            </div>
          
            
        </div>
       
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        
                        <th>Date début</th>
                        
                        <th>Date fin</th>
                        <th>Distination</th>
                        <th>Region</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($affectations as $key => $affectation)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
    
                  <th>{{App\Models\Reservation::findOrFail($affectation->reservation_id)->date_debut}}</th>
                  <th>{{App\Models\Reservation::findOrFail($affectation->reservation_id)->date_fin}}</th>
                  <th>{{App\Models\Reservation::findOrFail($affectation->reservation_id)->direction}}</th>
                  <th>{{App\Models\Reservation::findOrFail($affectation->reservation_id)->region}}</th>
                  <th>
                      
                  <form action="{{ route('affectations.destroy', $affectation->id) }}" method="POST">     
                    <a class="btn btn-secondary" href="{{ route('affectations.show',$affectation->id) }}"> <i class="fas fa-eye"></i> </a>
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-info"> <i class="fas fa-trash"></i></button>

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


@endif
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
            'copy', 'csv', 'excel', 'pdf', 'print' , 'colvis' 
        ]
    } );
} );
function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
@endsection