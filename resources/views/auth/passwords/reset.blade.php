@extends('layouts.app')

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card shadow-sm auth-card mx-auto">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4 text-center">Réinitialiser le mot de passe</h1>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('password.reset.post') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ old('email', $email) }}">

                        <div class="mb-4">
                            <label class="form-label">Adresse email</label>
                            <input type="email" name="email_display" value="{{ old('email', $email) }}" class="form-control" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirmation du mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Réinitialiser</button>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}">Retour à la connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection