@extends('layouts.app')

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card shadow-sm auth-card mx-auto">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4 text-center">Mot de passe oublié</h1>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('password.forgot.post') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Adresse email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Envoyer le lien de réinitialisation</button>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}">Retour à la connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection