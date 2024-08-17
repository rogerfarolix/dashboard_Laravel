@extends('.layouts.admin.app')

@section('title', 'Catégories')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Panel Catégories</h4>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Ajouter Catégorie
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Image</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($categories as $Categorie)
                                        <tr>
                                            <td>{{ $Categorie->name }}</td>
                                            <td><img src="{{ asset('storage/' . $Categorie->image) }}" alt="{{ $Categorie->name }}" width="100"></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.categories.show', $Categorie->id) }}" class="btn btn-link btn-info btn-lg" title="Voir les détails">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.categories.edit', $Categorie->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.categories.destroy', $Categorie->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');" title="Supprimer">
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
