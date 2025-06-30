@extends('layouts.master')     
@section('content')
<div class="container">
    <div class="row my-5 ">
        <div class="col-md-8 mx-auto">
            <div class="card border-info">
                        <div class="col-md-10 mx-auto">
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
    
    <form action="{{ route('administratif.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
  <h4 class="my-2"> voiture </h4>
        <div class="form-group">
         <select name="voiture_id" class="form-control" aria-label="Default select example">
              
              <option selected> voiture</option>
              @foreach ($voitures as $voiture)
                  <option value="{{ $voiture->id }}">{{ $voiture->matricule }}</option>
              @endforeach
          </select>
                              </div>
 <h4> Assurance </h4>
 <div class="form-row">
    <div class="col-md-6 ">
        <div class="form-group">
                              <strong>assurance début:</strong>
                            

<input type="date" name="assurance_debut"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 ">
<div class="form-group">
                              <strong>expire-le:</strong>
                            

<input type="date" name="assurance_expire_le"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
</div>

<h4> Visite technique </h4>
<div class="form-row">
    <div class="col-md-6 ">
        <div class="form-group">
                              <strong>effectue_le:</strong>
                            

<input type="date" name="effectue_le"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 ">
<div class="form-group">
                              <strong>expire-le:</strong>
                            

<input type="date" name="visite_expire_le"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
</div>
<h4> Vignette </h4>
<div class="form-row">
    <div class="col-md-6 ">
        <div class="form-group">
                              <strong>vignet:</strong>
                            

<input type="date" name="vignet"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 ">
<div class="form-group">
                              <strong>expire-le:</strong>
                            

<input type="date" name="vignet_expire_le"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
</div>                        
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('administratif.index') }}"> retour</a>
          
                              </div>
                              </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection