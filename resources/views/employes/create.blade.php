@extends('layouts.master')

@section('content')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card border-info shadow-sm p-4">
        <h2 class="mb-4 text-center text-info">Ajouter Employé</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('employes.store') }}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf

          <div class="row mb-3">
            <div class="col-md-4">
              <label for="nom" class="form-label fw-semibold">Nom</label>
              <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="{{ old('nom') }}" required>
            </div>

            <div class="col-md-4">
              <label for="prenom" class="form-label fw-semibold">Prénom</label>
              <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" value="{{ old('prenom') }}" required>
            </div>

            <div class="col-md-4">
              <label for="fonction_id" class="form-label fw-semibold">Fonction</label>
              <select id="fonction_id" name="fonction_id" class="form-select" required>
                <option value="" disabled selected>Fonction</option>
                @foreach ($fonctions as $fonction)
                  <option value="{{ $fonction->id }}" {{ old('fonction_id') == $fonction->id ? 'selected' : '' }}>{{ $fonction->fonc }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="adr" class="form-label fw-semibold">Adresse</label>
            <input type="text" id="adr" name="adr" class="form-control" placeholder="Adresse" value="{{ old('adr') }}" required>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="col-md-6">
              <label for="CIN" class="form-label fw-semibold">CIN</label>
              <input type="text" id="CIN" name="CIN" class="form-control" placeholder="CIN" value="{{ old('CIN') }}" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
              <label for="tel" class="form-label fw-semibold">Téléphone</label>
              <input type="tel" id="tel" name="tel" class="form-control" placeholder="Téléphone" value="{{ old('tel') }}" required>
            </div>

            <div class="col-md-4">
              <label for="image" class="form-label fw-semibold">Image</label>
              <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>

            <div class="col-md-4">
              <label for="num_permis" class="form-label fw-semibold">Numéro de permis</label>
              <input type="text" id="num_permis" name="num_permis" class="form-control" placeholder="Numéro de permis" value="{{ old('num_permis') }}">
            </div>
          </div>

          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-info px-5">Ajouter</button>
            <a href="{{ route('employes.index') }}" class="btn btn-secondary px-5">Annuler</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
