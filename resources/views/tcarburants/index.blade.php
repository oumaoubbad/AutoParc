@extends('layouts.master')


  @section('content')   
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
        
        
            <div class="card border-info my-3">
            <form action="{{ route('tcarburants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-row align-items-center  p-2">
    <div class="col-sm-5 my-1">
      <label class="sr-only" for="inlineFormInputName">tcarburant</label>
      <input type="text" name="name" class="form-control" placeholder="tcarburant">
    </div>
    
    
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-info"> <i class="fas fa-plus "></i> ajouter</button>
    </div>
  </div>
</form>
           
        
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        
                        <th>tcarburant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($tcarburants as $key => $tcarburant)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{ $tcarburant->name }}</th>
                  <th>
                      
                    <form id="deleteForm" action="{{ route('tcarburants.destroy',$tcarburant->id) }}" method="POST">
     
      
                    <a class="btn btn-secondary" href="{{ route('tcarburants.edit',$tcarburant->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button  onclick="deleteS();" type="submit" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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
  function deleteS(){
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    document.getElementById("deleteForm").submit();
    
  }
})
  }
  </script>
  @endsection 