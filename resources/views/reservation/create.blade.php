@extends('layouts.master')

@section('content')

<div class="row my-5">
  <div class="col-md-8 mx-auto">
    <div class="card border-info shadow-sm">
      <div class="card-header bg-info text-white">
        <h3 class="mb-0"><strong>Réserver :</strong></h3>
      </div>

      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-6">
            <strong>Voiture :</strong>
            <img src="/image/{{ $voiture->image }}" alt="Image voiture" class="img-fluid rounded mt-2 shadow-sm">
          </div>
          <div class="col-md-6 d-flex flex-column justify-content-center">
            <p><strong>Matricule :</strong> {{ $voiture->matricule }}</p>
            <p><strong>Marque :</strong> {{ $voiture->marque->name }}</p>
            <p><strong>Kilométrage :</strong> {{ $voiture->kilo }}</p>
            <p><strong>Numéro de carte grise :</strong> {{ $voiture->ncg }}</p>
            <p><strong>Type carburant :</strong> {{ $voiture->tcarburant->name }}</p>
          </div>
        </div>

        <form action="{{ route('reservations.store') }}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          <input type="hidden" name="voiture_id" value="{{ $voiture->id }}">

          <div class="row g-3">
            <div class="col-md-6">
              <label for="date_debut" class="form-label"><strong>Date début</strong></label>
              <input type="date" id="date_debut" name="date_debut" class="form-control"
                min="2000-01-01" max="2100-12-31" required>
            </div>

            <div class="col-md-6">
              <label for="date_fin" class="form-label"><strong>Date fin</strong></label>
              <input type="date" id="date_fin" name="date_fin" class="form-control"
                min="2000-01-01" max="2100-12-31" required>
            </div>

            <div class="col-md-6">
              <label for="region" class="form-label"><strong>Région</strong></label>
              <input type="text" id="region" name="region" class="form-control" placeholder="Votre région" required>
            </div>

            <div class="col-md-6">
              <label for="direction" class="form-label"><strong>Destination</strong></label>
              <input type="text" id="direction" name="direction" class="form-control" placeholder="Destination" required>
            </div>

            <div class="col-12">
              <label for="description" class="form-label"><strong>Description</strong></label>
              <textarea id="description" name="description" rows="4" class="form-control" placeholder="Détails supplémentaires..."></textarea>
            </div>
          </div>

          <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary px-4">Retour</a>
            <button type="submit" class="btn btn-info px-4">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
