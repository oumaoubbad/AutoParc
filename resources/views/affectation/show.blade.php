@extends('layouts.master')

@section('content')
<div class="row my-6 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                               
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2>affectations</h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-6 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('affectations.index') }}"> retour</a>
                         <a class="btn btn-secondary" href="{{ route('affectations.edit', $affectation->id) }}"> modifier</i> </a>

        
                         </div>
                    </div>
            </div>
           
     

    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-5">

                <strong>utilisateur:</strong>

                {{App\Models\Reservation::findOrFail($affectation->reservation_id)->user_id}}

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-5">

                <strong>voiture:</strong>

                {{App\Models\Reservation::findOrFail($affectation->reservation_id)->voiture_id}}
            </div>

        </div>

       
        <div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>Date debut:</strong>

    {{App\Models\Reservation::findOrFail($affectation->reservation_id)->date_debut}}
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>Date fin:</strong>

    {{App\Models\Reservation::findOrFail($affectation->reservation_id)->date_fin}}
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>destination:</strong>

    {{App\Models\Reservation::findOrFail($affectation->reservation_id)->direction}}
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>region :</strong>

    {{App\Models\Reservation::findOrFail($affectation->reservation_id)->region}}
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>description :</strong>

    {{App\Models\Reservation::findOrFail($affectation->reservation_id)->description}}
</div>

</div>
<div class="col-md-4 mb-3">

         
<img src="/images/99.jpg" width="400" height="200" class="text-right mx-5 my-2 font-weight-bold ">
</div>


</div>

    </div>

    </div>

</div>

  
</div>

    </div>
@endsection