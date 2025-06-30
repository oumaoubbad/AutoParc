@extends('layouts.master')

@section('content')
<div class="row my-6 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                               
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-4 text-center my-2 py-2">
                        <h4> <strong> détails de la voiture : </strong></h4>
                    </div>
                    <div class="col-sm-8 my-2">
                         <div class="text-right mx-6 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('voitures.index') }}"> retour</a>
                         <a class="btn btn-secondary" href="{{ route('voitures.edit', $voiture->id) }}"> modifier</i> </a>

        
                         </div>
                    </div>
            </div>
           
     

    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-6">

              <h5>  <strong> Matricule:</strong>

                {{ $voiture->matricule }} </h5>

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-6">
            <h5>
                <strong> Marque:</strong>

                {{ $voiture->marque->name }}
</h5>
            </div>

        </div>

       
        <div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">
<h5>
    <strong> Modele:</strong>

    {{ $voiture->modele->name }} 
</h5>
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

<h5>  <strong> Etat:</strong>

    {{ $voiture->etat }}
</h5>
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">
<h5>
    <strong> Kilométrage:</strong>

    {{ $voiture->kilo }}
</h5>
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">
<h5>
    <strong> Type Carburant:</strong>

    {{ $voiture->tcarburant->name }}</h5>
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">
<h5>
    <strong> Numéro de carte grise :</strong>

    {{ $voiture->ncg}}
</h5>
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">
<h5>
    <strong> Disponibilité:</strong>

    @if($voiture->status)
                                        <span class="badge badge-danger">
                                            dispo
                                        </span>
                                        @else
                                        <span class="badge badge-info">
                                           affecté
                                        </span>
                                        @endif

</h5>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">
<h5>
    <strong> Image:</strong>

    <img src="/image/{{ $voiture->image }}" width="600px">
</h5>
</div>

</div>

</div>

 

    </div>

</div>

  
</div>

</div>
</div>


@endsection