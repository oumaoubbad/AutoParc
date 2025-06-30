@extends("layouts.master")

  @section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">


            <div class="card border-info my-3">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <form action="{{ route('fonctions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-row align-items-center  p-2">
    <div class="col-sm-5 my-1">
      <label class="sr-only" for="inlineFormInputName">fonction</label>
      <input type="text" name="fonc" class="form-control" placeholder="fonction">
    </div>


    <div class="col-auto my-1">
      <button type="submit" class="btn btn-info"> <i class="fas fa-plus "></i> ajouter</button>
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

                        <th>fonction</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($fonctions as $key => $fonction)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{ $fonction->fonc }}</th>
                  <th>

                    <form  action="{{ route('fonctions.destroy',$fonction->id) }}" method="POST">


                    <a class="btn btn-secondary" href="{{ route('fonctions.edit',$fonction->id) }}"> <i class="fas fa-edit "></i> </a>

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

@section('js')
<script>
function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
  </script>
  @endsection
