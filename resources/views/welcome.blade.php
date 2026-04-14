@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <div class="row align-items-center gy-4">
                        <div class="col-lg-6">
                            <h1 class="display-6 mb-3">Bienvenue sur ContactApp</h1>
                            <p class="lead text-muted">Gère facilement ton compte, édite ton profil et ajoute une photo de profil grâce à une interface simple.</p>
                            <div class="d-flex flex-column gap-2 mt-4">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Connexion</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Créer un compte</a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="p-4 bg-dark rounded-4">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="Illustration" class="img-fluid rounded-4 shadow-sm" style="max-height: 320px; width: auto;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
