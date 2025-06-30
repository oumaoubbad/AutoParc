@extends('layouts.master')     
@section('content')
<div class="container">
    <div class="row my-5 ">
        <div class="col-md-8 mx-auto">
            <div class="card border-info">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                    Modifier type réparation</i>
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
    
    <form action="{{ route('treparations.update',$treparation->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')



                              <div class="form-group">
                              <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $treparation->name }}" class="form-control" placeholder="Name">

                              </div>
                              
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Modifier
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('treparations.index') }}"> retour</a>
          
                              </div>
                              </form>
                            </div>
                  
            </div>
        </div>
    </div>
</div>
@endsection