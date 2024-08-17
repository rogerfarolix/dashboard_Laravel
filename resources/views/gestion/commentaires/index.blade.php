@extends('layouts.admin.app')

@section('title', 'Commentaires')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Panel Commentaires</h4>
                            <a href="{{ route('admin.commentaires.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Ajouter Commentaire
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Actualité</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Actualité</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($commentaires as $commentaire)
                                    <tr>
                                        <td>{{ $commentaire->nom }}</td>
                                        <td>{{ $commentaire->email }}</td>
                                        <td>{!! Str::limit($commentaire->message, 15) !!}</td>
                                        <td>{{ $commentaire->actualite->titre ?? 'Non spécifié' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.commentaires.show', $commentaire->id) }}" class="btn btn-link btn-info btn-lg" title="Voir les détails">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.commentaires.edit', $commentaire->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.commentaires.destroy', $commentaire->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');" title="Supprimer">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
