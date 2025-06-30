@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-info shadow-sm">
                <div class="card-header bg-light d-flex justify-content-center align-items-center">
                    <h2 class="mb-0"><strong>Ajouter Utilisateur</strong></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nom & Prénom</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                            <div class="col-md-6">
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="" disabled selected>Choisir un rôle</option>
                                    <option value="1" {{ old('role') == "1" ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ old('role') == "0" ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">Sexe</label>
                            <div class="col-md-6">
                                <select id="sex" name="sex" class="form-select @error('sex') is-invalid @enderror" required>
                                    <option value="" disabled selected>Choisir le sexe</option>
                                    <option value="1" {{ old('sex') == "1" ? 'selected' : '' }}>Femme</option>
                                    <option value="0" {{ old('sex') == "0" ? 'selected' : '' }}>Homme</option>
                                </select>
                                @error('sex')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Champ mot de passe avec toggle -->
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword" tabindex="-1" title="Afficher/Masquer le mot de passe">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmer mot de passe</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex gap-2">
                                <button type="submit" class="btn btn-info">Ajouter</button>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
});
</script>
@endsection
