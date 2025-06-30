@extends('layouts.master')

@section('css')
<style>
    /* Custom styles pour un look moderne en gris */
    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 6px 25px rgb(0 0 0 / 0.15);
    }
    .card-header {
        background: linear-gradient(90deg, #6c757d, #343a40); /* gris clair vers gris foncé */
        color: #fff;
        font-weight: 700;
        font-size: 1.4rem;
        border-radius: 1rem 1rem 0 0;
        text-align: center;
    }
    label {
        font-weight: 600;
        color: #333;
    }
    .form-control:focus {
        box-shadow: 0 0 8px #6c757d;
        border-color: #6c757d;
    }
    .btn-info {
        background: #6c757d; /* gris bootstrap */
        border: none;
        border-radius: 50px;
        padding: 10px 30px;
        font-weight: 600;
        transition: background 0.3s ease;
    }
    .btn-info:hover {
        background: #343a40; /* gris plus foncé au hover */
    }
    .btn-secondary {
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
    }
    .row.g-4 > [class*='col-'] {
        margin-bottom: 1.8rem;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center g-4">

        <!-- Modifier utilisateur -->
        <div class="col-md-7 col-lg-6">
            <div class="card">
                <div class="card-header">Modifier utilisateur</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name">Nom & Prénom</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email">E-Mail</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="role">Rôle</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value="" disabled {{ old('role', $user->role) === null ? 'selected' : '' }}>Sélectionner un rôle</option>
                                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="sex">Sexe</label>
                            <select name="sex" id="sex" class="form-select @error('sex') is-invalid @enderror" required>
                                <option value="" disabled {{ old('sex', $user->sex) === null ? 'selected' : '' }}>Sélectionner le sexe</option>
                                <option value="1" {{ old('sex', $user->sex) == 1 ? 'selected' : '' }}>Femme</option>
                                <option value="0" {{ old('sex', $user->sex) == 0 ? 'selected' : '' }}>Homme</option>
                            </select>
                            @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-3 justify-content-center">
                            <button type="submit" class="btn btn-info">Modifier</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Changer mot de passe -->
        <div class="col-md-7 col-lg-6">
            <div class="card">
                <div class="card-header">Changer le mot de passe</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.change.password', $user->id) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" autocomplete="new-password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password-confirm">Confirmer mot de passe</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password" required>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">Valider</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
