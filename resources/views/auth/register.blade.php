@extends('layouts.app')

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-9 col-lg-6">
            <div class="card shadow-sm auth-card mx-auto">
                <div class="card-body p-4">
                    <h1 class="h4 mb-3 text-center">Inscription</h1>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" required>
                                @error('nom') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control" required>
                                @error('prenom') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label class="form-label">Adresse email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Numéro de téléphone</label>
                            <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control" required>
                            @error('telephone') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-4">S'inscrire</button>
                    </form>

                    <p class="mt-4 text-center mb-0">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection