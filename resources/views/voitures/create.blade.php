@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-info shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0 fw-bold">Ajouter Voiture</h3>
                </div>
                <div class="card-body px-5 py-4">

                    <form action="{{ route('voitures.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="matricule" class="form-label fw-semibold">Matricule</label>
                                <input type="text" name="matricule" id="matricule" class="form-control" placeholder="Ex: 123-ABC-45" required>
                            </div>
                            <div class="col-md-4">
                                <label for="ncg" class="form-label fw-semibold">Numéro carte grise</label>
                                <input type="text" name="ncg" id="ncg" class="form-control" placeholder="Numéro de carte grise" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kilo" class="form-label fw-semibold">Kilométrage</label>
                                <input type="number" name="kilo" id="kilo" class="form-control" placeholder="Kilométrage" min="0" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="marque_id" class="form-label fw-semibold">Marque</label>
                                <select name="marque_id" id="marque_id" class="form-select" required>
                                    <option value="" selected disabled>Choisir une marque</option>
                                    @foreach ($marques as $marque)
                                        <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="modele_id" class="form-label fw-semibold">Modèle</label>
                                <select name="modele_id" id="modele_id" class="form-select" required>
                                    <option value="" selected disabled>Choisir un modèle</option>
                                    @foreach ($modeles as $modele)
                                        <option value="{{ $modele->id }}">{{ $modele->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="etat" class="form-label fw-semibold">État</label>
                                <select name="etat" id="etat" class="form-select" required>
                                    <option value="" selected disabled>Choisir l'état</option>
                                    <option value="1">En service</option>
                                    <option value="0">En panne</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="tcarburant_id" class="form-label fw-semibold">Type carburant</label>
                                <select name="tcarburant_id" id="tcarburant_id" class="form-select" required>
                                    <option value="" selected disabled>Type carburant</option>
                                    @foreach ($tcarburants as $tcarburant)
                                        <option value="{{ $tcarburant->id }}">{{ $tcarburant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label for="image" class="form-label fw-semibold">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-3">
                                <label for="status" class="form-label fw-semibold">Disponibilité</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="" selected disabled>Disponibilité</option>
                                    <option value="1">Disponible</option>
                                    <option value="0">Affecté</option>
                                </select>
                            </div>

                            <div class="col-md-6 text-center">
                                <img src="/images/location.png" alt="Location" class="img-fluid rounded" style="max-height: 180px;">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3">
                            <button type="submit" class="btn btn-info px-4 py-2 fw-semibold shadow-sm">Ajouter</button>
                            <a href="{{ route('voitures.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold shadow-sm">Retour</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
