@extends('layouts.admin.app')

@section('title', 'Partenaires')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Panel Partenaires</h4>
                            <a href="{{ route('admin.partenaires.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Ajouter Partenaire
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Logo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Logo</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($partenaires as $partenaire)
                                    <tr>
                                        <td>{{ $partenaire->nom }}</td>
                                        <td>
                                            @if($partenaire->logo)
                                            <img src="{{ asset('storage/' . $partenaire->logo) }}" alt="Logo" style="width: 100px;">
                                            @else
                                            Pas de logo
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.partenaires.edit', $partenaire->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.partenaires.destroy', $partenaire->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?');" title="Supprimer">
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
