@extends("layouts.master")

  @section('content')
  @if(auth()->user()->role)

<div class="container">
    <div class="row my-5">
        <div class="col-md-11 mx-auto">

            <div class="card border-info my-3">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="text-center font-weight-bold ">
            <div class="pull-left my-3">
                <h3><strong>Réservations</strong></h3>
            </div>

            </div>


        </div>

            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Utilisateur</th>
                        <th>voiture</th>

                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Distination</th>
                        <th>Region</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($reservations as $key => $reservation)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{App\Models\User::findOrFail($reservation->user_id)->name}}</th>
                  <th> <img src="image/{{App\Models\Voiture::findOrFail($reservation->voiture_id)->image}}" alt="Card image cap"  width="100px"></th>                  <th>{{ $reservation->date_debut }}</th>
                  <th>{{ $reservation->date_fin }}</th>
                  <th>{{ $reservation->direction }}</th>
                  <th>{{ $reservation->region }}</th>
                  <th>
                  @if(Auth::user()->role)
                  {{$reservation->status}}
                  @if($reservation->status==0)
                      <form id="approve-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="approveLeave({{$reservation->id}})"  class="btn btn-sm btn-info text-white" name="approve" value="1"> Accepter<i class="fa fa-check" aria-hidden="true"></i></button>--}}
                          <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir accepter la réservation?')" class="btn btn-sm btn-info text-white" name="approve" value="1"><i class="fa fa-check" aria-hidden="true"> Accepter</i></button>
                      </form>
                      <form id="reject-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="rejectLeave({{$reservation->id}})" class="btn btn-sm  btn-secondary text-white"  name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>--}}
                      <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir refuser la réservation')" class="btn btn-sm btn-secondary text-white " name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>
                      </form>
                  @elseif($reservation->status==1)

                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-secondary text-white" onclick="return confirm('Êtes-vous sûr de vouloir refuser la réservation?')" type="submit" name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>
                      </form>
                  @else
                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button   class="btn btn-sm btn-info text-white" onclick="return confirm('Êtes-vous sûr de vouloir accepter la réservation?')" type="submit" name="approve" value="1"><i class="fa fa-check" aria-hidden="true"> Accepter</i></button>
                      </form>
                  @endif

                      {{--<a href="{{route('reservation.approve',$reservation->id)}}" class="btn btn-sm btn-secondary">en attente</a>--}}
                      {{--<a href="{{route('reservation.pending',$reservation->id)}}"  class="btn btn-sm text-infis ">Accepter<i class="fa fa-check" aria-hidden="true"></i></a>--}}
                      {{--<a href="{{route('reservation.reject',$reservation->id)}}"  class="btn btn-sm text-danger"><i class="fa fa-times" aria-hidden="true">Refuser</i></a>--}}
                      @else
                      @if($reservation->status==0)
                          <span class="badge badge-pill badge-secondary">en attente</span>
                      @elseif($reservation->status==1)
                          <span class="badge badge-pill badge-info">accepté</span>
                      @else
                          <span class="badge badge-pill badge-danger">refusé</span>
                      @endif
                  @endif

                  </th>
                  <th>

                  <form action="" method="POST">
                    <a class="btn btn-info"  href="{{ route('reservations.show',$reservation->id) }}"> <i class="fas fa-eye"></i> </a>

                    <a class="btn btn-dark" href="{{ route('affectation.create' , $reservation->id ) }}"> <i class="fa fa-check" aria-hidden="true"></i></a>

                    @csrf
                    @method('DELETE')


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
@else
<div class="container">
    <div class="row my-5">
        <div class="col-md-12 mx-auto">

            <div class="card my-3">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="text-center font-weight-bold ">
            <div class="pull-left py-2">
               <h2> <strong>Mes Réservations </strong></h2>
            </div>

            </div>


        </div>

            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Voiture</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Distination</th>
                        <th>Region</th>
                        <th>Statis</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach (auth()->user()->reservations as $key => $reservation)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th> <img src="image/{{App\Models\Voiture::findOrFail($reservation->voiture_id)->image}}" alt="Card image cap"   width="100px" height="80px ">
</th>

                  <th>{{ $reservation->date_debut }}</th>
                  <th>{{ $reservation->date_fin }}</th>
                  <th>{{ $reservation->direction }}</th>
                  <th>{{ $reservation->region }}</th>
                  <th>
                  @if(Auth::user()->role)
                  {{$reservation->status}}
                  @if($reservation->status==0)
                      <form id="approve-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="approveLeave({{$reservation->id}})" class="btn btn-sm btn-info" name="approve" value="1">Accepté</button>--}}
                          <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-info" name="approve" value="1">Accepté</button>
                      </form>
                      <form id="reject-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="rejectLeave({{$reservation->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Refusé</button>--}}
                          <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Refusé</button>
                      </form>
                  @elseif($reservation->status==1)

                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Refusé</button>
                      </form>
                  @else
                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-info" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Accepté</button>
                      </form>
                  @endif

                      {{--<a href="{{route('reservation.approve',$reservation->id)}}" class="btn btn-sm btn-secondary">en attente</a>--}}
                      {{--<a href="{{route('reservation.pending',$reservation->id)}}" class="btn btn-sm btn-info ">Accepter<i class="fa fa-check" aria-hidden="true"></i></a>--}}
                      {{--<a href="{{route('reservation.reject',$reservation->id)}}"  class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true">Refuser</i></a>--}}
                    @else
                      @if($reservation->status==0)
                          <h5><span class="badge badge-pill badge-secondary">en attente</span></h5>
                      @elseif($reservation->status==1)
                         <h5> <span   class="badge badge-pill  badge-info">accepté</span></h5>
                      @else
                         <h5> <span  class="badge badge-pill badge-danger ">refusé</span></h5>
                      @endif
                  @endif

                  </th>
                  <th>

                  <form action="" method="POST">
                    <a class="btn btn-dark"  href="{{ route('reservations.show',$reservation->id) }}"> <i class="fas fa-eye"></i> </a>

                    <a class="btn btn-secondary" href="{{ route('reservations.edit', $reservation->id) }}"><i class="fas fa-edit "></i> </a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-info"><i class="fa fa-times" aria-hidden="true"></i>
 </button>

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
            'copy', 'csv', 'excel', 'pdf', 'print' , 'colvis'
        ]
    } );
} );
 </script>
@endsection
