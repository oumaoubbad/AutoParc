@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                  <strong>  Ajouter entretien </strong></i>
                                </h3>


                                @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('entretiens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        

        <div class="form-row">
    <div class="col-md-6 mb-3">

    <div class="form-group">
                              <strong>date début:</strong>
                            

<input type="date" name="date_debut"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
                              <strong>date fin:</strong>
                            

<input type="date" name="date_fin"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
                             
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">

          <div class="form-group">
          <strong>voiture:</strong>
                                    <select name="voiture_id" id="voiture_id" class="form-control">
                                        <option value="" selected disabled>voiture</option>
                                        @foreach ($voitures as $voiture)
                                        <option value="{{ $voiture->id}}">
                                            {{ $voiture->matricule}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
</div>

<div class="col-md-4 mb-3">
<div class="form-group">
<strong>type entretien:</strong>

          <select name="tentretien_id" class="form-control" aria-label="Default select example">
              
              <option selected> tentretien</option>
              @foreach ($tentretiens as $tentretien)
                  <option value="{{ $tentretien->id }}">{{ $tentretien->name }}</option>
              @endforeach
          </select>
</div>
</div>

    <div class="col-md-4 mb-3">
    <div class="form-group">
                              <strong>prix:</strong>
                <input type="text" name="prix" class="form-control" placeholder="prix">
                              </div>
</div>

    <div class="col-md-12 mb-3">

         
    <div class="form-group">
                              <strong>note:</strong>
                             
                              <textarea type="text" name="note"  rows="5" cols="100" id="editor"  >
                               </textarea>
</div>
</div>



</div>

<div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('entretiens.index') }}"> retour</a>
          
</div>

</div>

                              </form>
                            
                </div>
            </div>
        </div>
    
</div>
@endsection
