@extends('layouts.master')


  @section('content')   














    
 
                
                  <ul class="nav nav-pills text-right">
                    <li class="nav-item"><a class="btn btn-ninfo" href="#administratif" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"> </i></a></li>
                    <li class="nav-item"><a class="btn btn-hecondary" href="#visite" data-toggle="tab"><i class="fa fa-list" aria-hidden="true"> </i></a></li>
                    <li class="nav-item"><a class="btn btn-ninfo" href="{{ route('employes.create') }}"><i class="fa fa-user-plus" aria-hidden="true"> </i></a><li class="nav-item">

                    <div class="text-right mx-5 my-1 font-weight-bold ">
            

            </div>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body border-info">
                  <div class="tab-content">
                    <div class="active tab-pane" id="administratif">
                    
                             
<div class="row ">
        <div class="col-md-12 ">
        
           
   
            <div class="text-center font-weight-bold ">
            <div class="pull-left">
                <h2> <strong>Les employes</strong></h2>
            
     
          
            
        </div>
      
            <div class="card-body">
          
            
  <div class="row my-2">
  @foreach ($employes as $key => $employe)


    <div class="col-md-3">
      
      <div class="card border-info" style="width: 20rem;  height: 270px;" >
    <div class="card-body text canter">
    <th>
      @if($employe->image)
    <img src="image/{{ $employe->image }}" class="rounded-circle" alt="Card image cap" height="150px " width="150px">
@else
    <img src="image/20220623222357.jpg" height="150px " width="150px"/>
@endif
</th>
</br>
    <div class="text-secondary">
      <p >
      {{ $employe->nom }}
      {{ $employe->prenom }}
</p>
  
</div> 
      {{ $employe->fonction->fonc }}
   </div>
</br>
   <form   method="POST" action="{{ route('employes.destroy', $employe->id) }}">
     
     <a class="btn btn-dalrk" href="{{ route('employes.show',$employe->id) }}"> <i class="fas fa-eye"></i> </a>

     <a class="btn btn-semcondary" href="{{ route('employes.edit', $employe->id) }}"> <i class="fas fa-edit "></i> </a>

     @csrf
     @method('DELETE')

     <button onclick="return myFunction();" type="submit" onclick="deleteCar()" class="btn btn-inhfo"> <i class="fas fa-trash"></i> </button>

    </form>

       

  </div>
  </div>

  @endforeach
</div>
  </div>


  
    </div> 


          
            
                    
                        
                      
</div>  
</div>

        </div>
        




                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="visite">
                    <div class="row ">
        <div class="col-md-12 ">
        
            <div class="card border-info my-5">
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2><strong>Employee</strong></h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('employes.create') }}"><i class="fa fa-user-plus" aria-hidden="true"> Ajouter employes</i></a>
        
                         </div>
                    </div>
            </div>
            </div>
   
        
      
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>email</th>
                        <th>Adress</th>
                        <th>Tel</th>
                        <th>CIN</th>
                        <th>Numéro de permis</th>
                        <th>Fonction</th>
                        <th width="120px">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($employes as $key => $employe)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>@if($employe->image)
                  <img src="image/{{ $employe->image }}" class=" mx-auto d-block" height="50px" width="60px">
@else
    <img src="image/20220623222357.jpg" height="80px" width="80px"/>
@endif
</th>
                    
                  <th>{{ $employe->nom }}</th>
                  <th>{{ $employe->prenom }}</th>
                  <th>{{ $employe->email }}</th>
                  <th>{{ $employe->adr }}</th>
                  <th>{{ $employe->tel }}</th>
                  <th>{{ $employe->CIN }}</th>
                  <th>{{ $employe->num_permis }}</th>
                  <th>{{ $employe->fonction->fonc}}</th>
                
                  <th>
                      
                  <form   method="POST" action="{{ route('employes.destroy', $employe->id) }}">
     
                    <a class="btn btn-dark" href="{{ route('employes.show',$employe->id) }}"> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('employes.edit', $employe->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button onclick="return myFunction();" type="submit" onclick="deleteCar()" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
    
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