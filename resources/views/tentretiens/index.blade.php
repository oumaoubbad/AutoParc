@extends('layouts.master')

  @section('content')   
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
        <div class="pull-left ">
            <h2><strong>Type entretien</strong></h2>
        </div>
        
   
            <div class="card border-info my-3">
   
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <form action="{{ route('tentretiens.store') }}" class="align-center" method="POST" enctype="multipart/form-data">

    @csrf
  <div class="form-row align-center  p-4">
  <div class="col-sm-5 my-1">
      <label class="sr-only" for="inlineFormInputName">tentretien</label>
      <input type="text" name="name" class="form-control" placeholder="tentretien">
    </div>
    
    <div class="col-auto text-right mx-2 my-1">
      <button type="submit" class="btn btn-info"> <i class="fas fa-plus "> Ajouter</i></button>
    </div>
  </div>
</form>
          
            
        </div>
        
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        
                        <th>tentretien</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($tentretiens as $key => $tentretien)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{ $tentretien->name }}</th>
                  <th>
                      
                    <form  action="{{ route('tentretiens.destroy',$tentretien->id) }}" method="POST">
     
      
                    <a class="btn btn-secondary" href="{{ route('tentretiens.edit',$tentretien->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button  onclick="return myFunction();" type="submit" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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
@section('js')
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
    @if(session()->has('success'))
   <script>
           Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: "{{session()->get('success')}}" ,
           showConfirmButton: false,
           timer: 1500 ,
});
function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
   </script>
   @endif

   
@endsection