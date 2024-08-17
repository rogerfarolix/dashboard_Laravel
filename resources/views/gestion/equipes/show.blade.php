@extends('layouts.admin.app')

@section('title', 'Détails de l\'Équipe')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails de l'Équipe</h4>
                        <a href="{{ route('admin.equipes.index') }}" class="btn btn-secondary btn-round ms-auto">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="photo"><strong>Photo :</strong></label>
                            <br>
                            @if($equipe->photo)
                                <img src="{{ asset('storage/' . $equipe->photo) }}" alt="Photo de l'Équipe" style="width: 300px; height: auto;">
                            @else
                                <p>Pas de photo disponible</p>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="nom"><strong>Nom :</strong></label>
                            <p>{{ $equipe->nom }}</p>
                        </div>
                        <div class="form-group mt-3">
                            <label for="profession"><strong>Profession :</strong></label>
                            <p>{{ $equipe->profession }}</p>
                        </div>
                        <div class="form-group mt-3">
                            <label for="details"><strong>Détails :</strong></label>
                            <p>{{ $equipe->details }}</p>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.equipes.edit', $equipe->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('admin.equipes.destroy', $equipe->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe ?');">
                                    <i class="fa fa-times"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
