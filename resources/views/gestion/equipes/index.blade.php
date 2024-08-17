@extends('layouts.admin.app')

@section('title', 'Liste des Équipes')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des Équipes</h4>
                        <a href="{{ route('admin.equipes.create') }}" class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> Ajouter une Équipe
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Profession</th>
                                        <th>Détails</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($equipes as $equipe)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($equipe->photo)
                                                <img src="{{ asset('storage/' . $equipe->photo) }}" alt="Photo de l'Équipe" style="width: 100px; height: auto;">
                                            @else
                                                Pas de photo
                                            @endif
                                        </td>
                                        <td>{{ $equipe->nom }}</td>
                                        <td>{{ $equipe->profession }}</td>
                                        <td>{!! \App\Helpers\HtmlHelper::truncateHtml($equipe->details, 100) !!}</td>

                                        <td>
                                            <a href="{{ route('admin.equipes.show', $equipe->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Voir
                                            </a>
                                            <a href="{{ route('admin.equipes.edit', $equipe->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Modifier
                                            </a>
                                            <form action="{{ route('admin.equipes.destroy', $equipe->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe ?');">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
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
