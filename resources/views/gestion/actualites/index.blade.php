@extends('layouts.admin.app')

@section('title', 'Actualités')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Panel Actualités</h4>
                            <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Ajouter Actualité
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Titre</th>
                                        <th>Image 1</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Titre</th>
                                        <th>Image 1</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($actualites as $actualite)
                                    <tr>
                                        <td>{{ $actualite->date }}</td>
                                        <td>{{ $actualite->titre }}</td>
                                        <td>
                                            @if($actualite->image1)
                                            <img src="{{ asset('storage/' . $actualite->image1) }}" alt="Image 1" style="width: 100px;">
                                            @else
                                            Pas d'image
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.actualites.show', $actualite->id) }}" class="btn btn-link btn-info btn-lg" title="Voir les détails">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.actualites.destroy', $actualite->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?');" title="Supprimer">
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
