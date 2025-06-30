@extends("layouts.master")
@section('content')
<div class="container">
    <div class="row my-5 ">
        <div class="col-md-8 mx-auto">
            <div class="card border-info">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                    Modifier modele</i>
                                </h3>


                                @if ($errors->any())
        <div class="alert alert-info">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('modeles.update',$modele->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')



        <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $modele->name }}" class="form-control" placeholder="Name">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <select name="marque_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($marques as $marque)
                                            <option value="{{ $marque->id }}"
                                                {{ $marque->id == $modele->marque_id ? 'selected' : '' }}>
                                                {{ $marque->name }}</option>
                                        @endforeach
                </select>  
            </div>
            </div>
                              
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Modifier
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('modeles.index') }}"> retour</a>
          
                              </div>
                              </form>
                            </div>
                            </div>
                    </div>
                
        </div>
    </div>

@endsection