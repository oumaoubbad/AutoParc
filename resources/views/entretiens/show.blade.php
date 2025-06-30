@extends('layouts.master')

@section('content')
<div class="row my-6 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                               
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2>entretiens</h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-6 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('entretiens.index') }}"> retour</a>
                         <a class="btn btn-secondary" href="{{ route('entretiens.edit', $entretien->id) }}"> modifier</i> </a>

        
                         </div>
                    </div>
            </div>
           
     

    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-6">

                <strong>Voiture:</strong>

                {{$entretien->voiture->matricule  }}

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-6">

                <strong>date debut:</strong>

                {{ $entretien->date_debut }}

            </div>

        </div>

       
        <div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>date fin:</strong>

    {{ $entretien->date_fin }} 

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>type entretien :</strong>

    {{ $entretien->tentretien->name  }}

</div>

</div>

<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>Prix :</strong>

    {{ $entretien->prix}}

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group fs-6">

    <strong>note :</strong>

    {{ $entretien->note}}

</div>



<div class="col-md-4 mb-3">

         
<img src="/images/entetien.jpg" width="400" height="200" class="text-right mx-5 my-2 font-weight-bold ">
</div>
</div>

    </div>

    </div>

</div>

  
</div>
</div>

    </div>
@endsection