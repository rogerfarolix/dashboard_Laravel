@extends('layouts.admin.app')

@section('title', 'Détails du Commentaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails du Commentaire</h4>
                        <a href="{{ route('admin.commentaires.edit', $commentaire->id) }}" class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-edit"></i> Modifier
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="actualite_id">Actualité</label>
                                    <p>{{ $commentaire->actualite->titre }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <p>{{ $commentaire->nom }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <p>{{ $commentaire->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <p>{! $commentaire->message !}</p>
                                </div>
                                <form action="{{ route('admin.commentaires.destroy', $commentaire->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
