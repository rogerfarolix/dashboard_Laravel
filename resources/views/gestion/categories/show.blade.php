@extends('layouts.admin.app')

@section('title', 'Détails de la Catégorie')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Détails de la Catégorie</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Nom de la Catégorie</label>
                            <p id="name" class="form-control-plaintext">{{ $categorie->name }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <p id="description" class="form-control-plaintext">{!! $categorie->description !!}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image de la Catégorie</label>
                            @if ($categorie->image)
                                <img src="{{ asset('storage/' . $categorie->image) }}" alt="Image de la catégorie" class="img-fluid mt-2" style="width: 150px;">
                            @else
                                <p>Aucune image disponible</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-primary">Modifier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
