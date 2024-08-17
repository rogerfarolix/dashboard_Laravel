@extends('layouts.admin.app')

@section('title', 'Détails de l\'Actualité')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails de l'Actualité</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Catégorie:</strong> {{ $actualite->categorie->name }}</p>
                        <p><strong>Date:</strong> {{ $actualite->date }}</p>
                        <p><strong>Titre:</strong> {{ $actualite->titre }}</p>
                        <p><strong>Description 1:</strong> {!! $actualite->description1 !!}</p>
                        @if($actualite->image1)
                        <p><strong>Image 1:</strong></p>
                        <img src="{{ asset('storage/' . $actualite->image1) }}" alt="Image 1" style="width: 200px;">
                        @endif
                        @if($actualite->image2)
                        <p><strong>Image 2:</strong></p>
                        <img src="{{ asset('storage/' . $actualite->image2) }}" alt="Image 2" style="width: 200px;">
                        @endif
                        @if($actualite->image3)
                        <p><strong>Image 3:</strong></p>
                        <img src="{{ asset('storage/' . $actualite->image3) }}" alt="Image 3" style="width: 200px;">
                        @endif
                        <p><strong>Description 2:</strong> {!! $actualite->description2 !!}</p>
                        <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
