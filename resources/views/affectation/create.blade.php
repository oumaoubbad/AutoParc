@extends('layouts.master')
@section('content')




    <form action="{{ route('affectations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row my-3">
        <section class="vh-80">
  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center h-80">
      <div class="col col-xl-8">

        <div class="card border-info" style="border-radius: 1rem;">
          <div class="row g-0">
          <h3 class="text-dark mb-3 p-3 py-3">
                                  <strong>  Affecter cette Reservation : </strong></i>
                                </h3>
            <div class="col-md-6 col-lg-5 d-none d-md-block py-5">
             <img src="/images/999.png"  width="700" height="500"
                alt="login form" class="img-fluid" >
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group fs-5">
                <strong >utilisateur:</strong>
                {{App\Models\User::findOrFail($reservation->user_id)->name}}
            </div>
            <div class="form-group fs-5 ">
                <strong >voiture:</strong>
                {{App\Models\Voiture::findOrFail($reservation->voiture_id)->matricule}}
            </div>
            <div class="form-group fs-5">
                <strong >date debut:</strong>
                {{$reservation->date_debut}}            </div>
            <div class="form-group fs-5">
                <strong >date fin:</strong>
                {{$reservation->date_fin}}
            </div>
            <div class="form-group fs-5">
                <strong >region:</strong>
                {{$reservation->region}}            </div>
            <div class="form-group fs-5">
                <strong >distinations:</strong>
                {{$reservation->direction}}            </div>
            <div class="form-group fs-5">
                <strong >description:</strong>
                {{$reservation->description}}            </div>
        </div>

                </div>
            </div>

              </div>

            </div>
            <div class="form-row  p-4">
    <div class="col-md-6 mb-3 ">

    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">


                              <div class="form-group">
                                  <button class="btn btn-dark">
                                      Accepter
                                  </button>

                <a class="btn btn-secondary" href="{{ route('affectations.index') }}"> retour</a>

</div>
</div>
</div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>


                              </form>


@endsection
