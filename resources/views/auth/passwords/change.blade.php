@extends('layouts.app')

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card shadow-sm auth-card mx-auto">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4 text-center">Changer le mot de passe</h1>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('password.change.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Mot de passe actuel</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirmation du mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('home') }}" class="btn btn-link">Retour au profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection