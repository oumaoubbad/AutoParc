@extends('layouts.master')


  @section('content')   














    
 
                
                  <ul class="nav nav-pills text-right">
                    <li class="nav-item"><a class="btn btn-ninfo" href="#administratif" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"> </i></a></li>
                    <li class="nav-item"><a class="btn btn-hecondary" href="#visite" data-toggle="tab"><i class="fa fa-list" aria-hidden="true"> </i></a></li>
                    <li class="nav-item"><a class="btn btn-ninfo" href="{{ route('voitures.create') }}"><i class="fa fa-user-plus" aria-hidden="true"> </i></a><li class="nav-item">

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
                <h2> <strong>Les voitures</strong></h2>
            
     
          
            
        </div>
      
            <div class="card-body">
          
            
  <div class="row my-2">
  @foreach ($voitures as $key => $voiture)


    <div class="col-md-3">
      
      <div class="card border-info" style="width: 20rem;  height: 270px;" >
    <div class="card-body text canter">
       
<img src="image/{{ $voiture->image }}" class="rounded-circle" alt="Card image cap" height="150px " width="150px">
</br>
    <div class="text-secondary">
      <p >
      {{ $voiture->nom }}
      {{ $voiture->prenom }}
</p>
  
</div> 
      {{ $voiture->fonction->fonc }}
   </div>
</br>
   <form   method="POST" action="{{ route('voitures.destroy', $voiture->id) }}">
     
     <a class="btn btn-dalrk" href="{{ route('voitures.show',$voiture->id) }}"> <i class="fas fa-eye"></i> </a>

     <a class="btn btn-semcondary" href="{{ route('voitures.edit', $voiture->id) }}"> <i class="fas fa-edit "></i> </a>

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
                    <div class="row my-5">
        <div class="col-md-11 ">
        
            <div class="card border-info my-5">
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
            <div class="col-sm-3 text-center my-2 ">
                       <h2>  <strong>Voitures </strong></h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('voitures.create') }}"> <i class="fas fa-plus "> Ajouter Voiture</i></a>
        
                         </div>
                    </div>
            </div>
            </div>
   
        
      
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Matricule</th>
                        <th>Image</th>
                        <th>kilométrage</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Etat</th>
                        <th>Type Carburant</th>
                        <th> Carte grise</th>
                        <th>Disponibilité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($voitures as $key => $voiture)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{ $voiture->matricule }}</th>
                  <th><img src="image/{{ $voiture->image }}" class=" mx-auto d-block" width="100px"></th>
                  <th>{{ $voiture->kilo }}</th>
                  <th>{{ $voiture->marque->name }}</th>
                  <th>{{ $voiture->modele->name }}</th>
                  <th>{{ $voiture->etat->name }}</th>
                  <th>{{ $voiture->tcarburant->name }}</th>
                  
                  <th>{{ $voiture->ncg }}</th>
                  <th>
                                        @if($voiture->status)
                                        <span class="badge badge-danger">
                                            dispo
                                        </span>
                                        @else
                                        <span class="badge badge-info">
                                           affecté
                                        </span>
                                        @endif

                                    </th>
                  <th>
                 
                  <form   method="POST" action="{{ route('voitures.destroy', $voiture->id) }}">
     
                    <a class="btn btn-dark" href="{{ route('voitures.show',$voiture->id) }}"> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('voitures.edit', $voiture->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button  type="submit" onclick="return myFunction();" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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
@section('js')
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
  </script>
@endsection


