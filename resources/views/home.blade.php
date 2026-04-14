@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="card shadow-sm mb-4 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-3 mb-5">
                        <div>
                            <h1 class="h3 mb-2">Mon profil</h1>
                            <p class="text-muted mb-0">Bienvenue sur votre espace personnel, {{ $user->prenom }}.</p>
                        </div>
                        <div class="d-flex flex-column flex-sm-row gap-2">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg">Modifier mon profil</a>
                            <a href="{{ route('password.change') }}" class="btn btn-outline-primary btn-lg">Changer le mot de passe</a>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-7">
                            <div class="bg-light rounded-4 p-4 h-100 profile-info-panel">
                                <h2 class="h5 mb-4">Informations personnelles</h2>
                                <div class="mb-3 profile-field">
                                    <span class="text-muted d-block small">Nom</span>
                                    <strong>{{ $user->nom }}</strong>
                                </div>
                                <div class="mb-3 profile-field">
                                    <span class="text-muted d-block small">Prénom</span>
                                    <strong>{{ $user->prenom }}</strong>
                                </div>
                                <div class="mb-3 profile-field">
                                    <span class="text-muted d-block small">Email</span>
                                    <strong>{{ $user->email }}</strong>
                                </div>
                                <div class="profile-field">
                                    <span class="text-muted d-block small">Téléphone</span>
                                    <strong>{{ $user->telephone }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="bg-white border rounded-4 p-4 h-100 text-center profile-avatar-card">
                                <h2 class="h5 text-uppercase text-muted mb-4">Photo de profil</h2>
                                @if($user->avatar)
                                    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="rounded-circle mb-4 profile-avatar">
                                @else
                                    <div class="text-muted mb-4">Aucune photo de profil.</div>
                                @endif
                                <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control form-control-sm mb-3" type="file" name="avatar" required>
                                    <button type="submit" class="btn btn-primary btn-sm">Changer la photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection