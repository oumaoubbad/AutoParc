@extends("layouts.master")

@section("content")
@if(auth()->user()->role)
<div class="container py-5">

    <div class="row text-center mb-4">
        @php
            $stats = [
                ['count' => \App\Models\Voiture::count(), 'label' => 'Voitures', 'icon' => 'fas fa-car', 'url' => 'voitures', 'bg' => 'info'],
                ['count' => \App\Models\Employe::count(), 'label' => 'Employés', 'icon' => 'fas fa-user', 'url' => 'employes', 'bg' => 'dark', 'text' => 'text-white'],
                ['count' => \App\Models\Affectation::count(), 'label' => 'Affectations', 'icon' => 'fa fa-handshake', 'url' => 'affectations', 'bg' => 'secondary'],
                ['count' => \App\Models\User::count(), 'label' => 'Utilisateurs', 'icon' => 'fa fa-users', 'url' => 'user', 'bg' => 'info'],
                ['count' => \App\Models\Reservation::count(), 'label' => 'Réservations', 'icon' => 'fa fa-calendar-check', 'url' => 'reservation', 'bg' => 'dark', 'text' => 'text-white'],
                ['count' => \App\Models\Booking::count(), 'label' => 'Événements', 'icon' => 'fa fa-calendar', 'url' => '/calendar/index', 'bg' => 'secondary']
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="col-md-2 col-6 mb-4">
            <div class="small-box bg-{{ $stat['bg'] }}">
                <div class="inner">
                    <h3>{{ $stat['count'] }}</h3>
                    <p>{{ $stat['label'] }}</p>
                </div>
                <div class="icon">
                    <i class="{{ $stat['icon'] }} {{ $stat['text'] ?? '' }}"></i>
                </div>
                <a href="{{ url($stat['url']) }}" class="small-box-footer text-white">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        @foreach($topArt as $administratif)
        <div class="col-md-4 mb-4">
            <div class="card border-info h-100">
                <div class="card-body text-center">
                    <h5><b>Expire le :</b></h5>
                    <p><b>Matricule :</b> {{ $administratif->voiture->matricule }}</p>
                    <img src="/image/{{ $administratif->voiture->image }}" alt="Voiture" class="img-fluid mb-3" style="max-height: 170px;">
                    <p><b>Assurance :</b> <span class="badge badge-dark">{{ $administratif->assurance_expire_le }}</span></p>
                    <p><b>Visite :</b> <span class="badge badge-secondary">{{ $administratif->visite_expire_le }}</span></p>
                    <p><b>Vignette :</b> <span class="badge badge-info">{{ $administratif->vignet_expire_le }}</span></p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('administratif.edit', $administratif->id) }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit"></i> Mise à jour
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <canvas id="pie-chart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="canvas" height="280" width="600"></canvas>
        </div>
    </div>

</div>
@endif
@endsection

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
  $(function(){
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = $("#pie-chart");

    var data = {
      labels: cData.label,
      datasets: [{
        label: "Users Count",
        data: cData.data,
        backgroundColor: [
          "#DEB887", "#A9A9A9", "#DC143C",
          "#F4A460", "#2E8B57", "#1D7A46", "#CDA776"
        ],
        borderColor: [
          "#CDA776", "#989898", "#CB252B",
          "#E39371", "#1D7A46", "#F4A460", "#CDA776"
        ],
        borderWidth: 1
      }]
    };

    var options = {
      responsive: true,
      title: {
        display: true,
        text: "Les réservations de la semaine dernière",
        fontSize: 18
      },
      legend: {
        display: true,
        position: "bottom",
        labels: { fontSize: 16 }
      }
    };

    new Chart(ctx, {
      type: "pie",
      data: data,
      options: options
    });
  });

  window.onload = function() {
    var year = <?php echo $year; ?>;
    var voiture = <?php echo $voiture; ?>;

    var barChartData = {
      labels: year,
      datasets: [{
        label: 'Voitures',
        backgroundColor: "Turquoise",
        data: voiture
      }]
    };

    var ctx = document.getElementById("canvas").getContext("2d");
    new Chart(ctx, {
      type: 'bar',
      data: barChartData,
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Nombre de voitures par année'
        }
      }
    });
  };
</script>
@endsection
