@extends("layouts.master")

  @section('content')   


<div class="col-md-12 my-5">
              <div class="card border-info">
                <div class="card-header p-2 bg-secondary">
                  <ul class="nav nav-pills ">
                    <li class="nav-item"><a class="nav-link active text-white" href="#administratif" data-toggle="tab">Assurance</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#visite" data-toggle="tab">Visite technique</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#vignette" data-toggle="tab">Vignette</a></li>
                    <div class="text-right mx-5 my-1 font-weight-bold ">
            
            <a class="btn btn-info" href="{{ route('administratif.create') }}"> <i class="fas fa-plus "> Ajouter </i></a>

            </div>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="administratif">
                    <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class=" font-weight-bold ">
            <div class="pull-left">
                <h2><strong>Assurance</strong></h2>
            </div>
            </div>
          
            
        </div>
                    <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Voiture</th>
                        <th>Assurance début</th>
                        <th>Expire-le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($administratifs as $key => $administratif)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th><img src="image/{{ $administratif->voiture->image }}" class=" mx-auto d-block" width="100px"></th>
                  <th>{{ $administratif->assurance_debut }}</th>
                  <th>{{ $administratif->assurance_expire_le }}</th>
                  <th>
                      
                  <form action="{{ route('administratif.destroy', $administratif->id) }}" method="POST">     
                    <a class="btn btn-dark" href=""> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('administratif.edit', $administratif->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
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
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="visite">
                    <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class=" font-weight-bold ">
            <div class="pull-left">
                <h2><strong>visite technique</strong></h2>
            </div>
           
            </div>
          
            
        </div>
                    <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Voiture</th>
                        <th>Effectue_le</th>
                        <th>Expire-le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($administratifs as $key => $administratif)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th><img src="image/{{ $administratif->voiture->image }}" class=" mx-auto d-block" width="100px"></th>
                  <th>{{ $administratif->effectue_le }}</th>
                  <th>{{ $administratif->visite_expire_le }}</th>
                  <th>
                      
                  <form action="{{ route('administratif.destroy', $administratif->id) }}" method="POST">     
                    <a class="btn btn-dark" href=""> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('administratif.edit', $administratif->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
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
                      <div class="tab-pane" id="vignette">
                    <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class=" font-weight-bold ">
            <div class="pull-left">
                <h2><strong>Vignette</strong></h2>
            </div>
           
            </div>
          
            
        </div>
                    <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Voiture</th>
                        <th>Vignette</th>
                        <th>Expire-le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($administratifs as $key => $administratif)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th><img src="image/{{ $administratif->voiture->image }}" class=" mx-auto d-block" width="100px"></th>
                  <th>{{ $administratif->vignet }}</th>
                  <th>{{ $administratif->vignet_expire_le }}</th>
                  <th>
                      
                  <form action="{{ route('administratif.destroy', $administratif->id) }}" method="POST">     
                    <a class="btn btn-dark" href=""> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href="{{ route('administratif.edit', $administratif->id) }}"> <i class="fas fa-edit "></i> </a>
     
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
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
@endsection
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
  </script>