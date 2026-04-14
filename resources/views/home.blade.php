@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h1 class="h4 mb-0">Mon Profil</h1>
                            <p class="text-muted mb-0">Bienvenue, {{ $user->prenom }}.</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary ms-auto">Modifier</a>
                    </div>

                    <div class="row align-items-center g-4 mb-4">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-3 p-4 h-100">
                                <h2 class="h5 mb-3">Mes informations</h2>
                                <p class="mb-3"><strong>Nom :</strong> {{ $user->nom }}</p>
                                <p class="mb-3"><strong>Prénom :</strong> {{ $user->prenom }}</p>
                                <p class="mb-3"><strong>Email :</strong> {{ $user->email }}</p>
                                <p class="mb-0"><strong>Téléphone :</strong> {{ $user->telephone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-4 h-100 text-center">
                                <h2 class="h5 text-uppercase text-muted mb-4">Photo de profil</h2>
                                @if($user->avatar)
                                    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="img-fluid rounded-circle mb-4" style="max-width: 180px;">
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