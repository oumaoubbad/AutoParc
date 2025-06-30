@extends('layouts.master')


  @section('content')


        @if(auth()->user()->role)

         <ul class="nav nav-pills justify-content-center mt-3 mb-4" id="carTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="administratif-tab" data-bs-toggle="tab" data-bs-target="#administratif" type="button" role="tab" aria-controls="administratif" aria-selected="true">
                <i class="fas fa-list"></i> Liste Voitures
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="visite-tab" data-bs-toggle="tab" data-bs-target="#visite" type="button" role="tab" aria-controls="visite" aria-selected="false">
                <i class="fas fa-th"></i> Vue Carte
            </button>
        </li>
        <li class="nav-item ms-3" role="presentation">
            <a href="{{ route('voitures.create') }}" class="btn btn-info rounded-pill px-4"><i class="fas fa-plus"></i> Ajouter Voiture</a>
        </li>
    </ul>


  <div class="tab-content">
  <div class="active tab-pane" id="administratif">

   <div class="row my-5">
        <div class="col-md-12 ">

            <div class="card border-info">
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
            <div class="col-sm-3 text-center my-2 ">
                       <h2>  <strong>Voitures </strong></h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">

                         <a class="btn btn-info" href="{{ route('voitures.create') }}"> <i class="fas fa-plus "> Ajouter Voiture</i></a>

                         </div>
                    </div>
            </div>
            </div>



            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark" >
                    <tr>
                        <th>Id</th>
                        <th>Matricule</th>
                        <th>Image</th>
                        <th>kilométrage</th>
                        <th>Marque</th>
                        <th>Modèle</th>

                        <th >Type Carburant</th>
                        <th> Carte grise</th>
                        <th >Etat</th>
                        <th>Dispo</th>
                        <th  width="150px" >Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($voitures as $key => $voiture)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th >{{ $voiture->matricule }}</th>
                  <th><img src="image/{{ $voiture->image }}" class=" mx-auto d-block" width="100px" height="80px " ></th>
                  <th>{{ $voiture->kilo }}</th>
                  <th>{{ $voiture->marque->name }}</th>
                  <th>{{ $voiture->modele->name }}</th>

                  <th>{{ $voiture->tcarburant->name }}</th>

                  <th>{{ $voiture->ncg }}</th>
                  <th>
                  @if($voiture->etat)
                                        <a href="{{url('change-etats/'.$voiture->id)}}" class="btn btn-sm btn-info">en service</a>
                                        @else
                                        <a href="{{url('change-etats/'.$voiture->id)}}" class="btn btn-sm btn-secondary">en panne</a>

                                        @endif

                                    </th>

                  <th>
                                        @if($voiture->status)
                                        <a href="{{url('change-status/'.$voiture->id)}}" class="btn btn-sm btn-info">Disponible</a>
                                        @else
                                        <a href="{{url('change-status/'.$voiture->id)}}" class="btn btn-sm btn-secondary">Affecté</a>

                                        @endif

                                    </th>
                  <th>

                  <form   method="POST" action="{{ route('voitures.destroy', $voiture->id) }}">

                    <a class="btn btn-dark" href="{{ route('voitures.show',$voiture->id) }}"> <i class="fas fa-eye"></i> </a>

                    <a class="btn btn-secondary" href="{{ route('voitures.edit', $voiture->id) }}"> <i class="fas fa-edit "></i> </a>

                    @csrf
                    @method('DELETE')

                    <button  type="submit" onclick="return myFunction();" class="btn btn-info"> <i class="fas fa-trash"></i> </button>

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





                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="visite">

<div class="row ">
      <div class="col-md-12 ">
         <div class="text-center font-weight-bold ">
            <div class="pull-left">
                <h2> <strong>Les voitures</strong></h2>
            </div>
            <div class="card-body">
                <div class="row my-2">
  @foreach ($voitures as $key => $voiture)


    <div class="col-md-3">

      <div class="card border-info" style="width: 20rem;  height: 270px;" >
    <div class="card-body text canter">

<img src="image/{{ $voiture->image }}" class="rounded-circle" alt="Card image cap" height="150px " width="150px">
</br>
    <div class="text-secondary">
      <p >
      {{ $voiture->matricule }}

</p>

</div>
      {{ $voiture->marque->name }}
   </div>
</br>
   <form   method="POST" action="{{ route('voitures.destroy', $voiture->id) }}">

     <a class="btn btn-dalrk" href="{{ route('voitures.show',$voiture->id) }}"> <i class="fas fa-eye"></i> </a>

     <a class="btn btn-semcondary" href="{{ route('voitures.edit', $voiture->id) }}"> <i class="fas fa-edit "></i> </a>

     @csrf
     @method('DELETE')

     <button onclick="return myFunction();" type="submit" onclick="deleteCar()" class="btn btn-inhfo"> <i class="fas fa-trash"></i> </button>

    </form>



  </div>
  </div>

  @endforeach
</div>
  </div>



    </div>







</div>
</div>
                  </div>
                  </div>
                  <!-- /.tab-content -->

@else
<div class="row ">
        <div class="col-md-12 ">



            <div class="text-center font-weight-bold ">
            <div class="pull-left">
                <h2> <strong>Les Voiture Disponibles</strong></h2>




        </div>

            <div class="card-body">



  <div class="row my-2">
  @foreach ($voituresStatus as $key => $voiture)


    <div class="col-md-4">

      <div class="card" style="width: 25rem;  height: 500px;" >
    <div class="card-body text canter">
        <h4 >   <p class="card-text text-center"> <strong>Matricule :</strong></p>

      {{ $voiture->matricule }} </h4>

</p>
<img src="image/{{ $voiture->image }}" alt="Card image cap" height="170"  width="250px">
      <p class="card-text text-center"><b>Kilométrage :</b>

      <span class="badge badge-dark">
      {{ $voiture->kilo }}       </span>
     </p>
      <p class="card-text text-center"><b>Marquee :</b>
      <span class="badge badge-secondary">
      {{ $voiture->marque->name }}
</span></p>
      <p class="card-text text-center"><b>modele :</b>
      <span class="badge badge-info">
      {{ $voiture->modele->name }}
</span>    </div>

    <div class="row">
        <div class="col-md-6">
        <a href="{{ route('voitures.show',$voiture->id) }}" class="btn mr-2"><i class="fas fa-eye"></i> Voir plus</a>


        </div>
        <div class="col-md-6">
        <a href="{{ route('reservation.create' , $voiture->id ) }}" class="btn mr-2"><i class="fa fa-calendar-check"></i>    Réserver</a>

        </div>
    </div>



  </div>
  </div>

  @endforeach
</div>

  </div>



    </div>



</div>
</div>
@endif


@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>






<script>
     $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 </script>
 @if(Session()->has('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{Session()->get('success')}}",
        showConfirmButton: false,
        timer: 2000
});
function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
    </script>
    @endif

@endsection
