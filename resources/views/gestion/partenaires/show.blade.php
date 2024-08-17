@extends('layouts.admin.app')

@section('title', 'Détails du Partenaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails du Partenaire</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom">Nom du Partenaire:</label>
                            <p id="nom" class="form-control">{{ $partenaire->nom }}</p>
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo du Partenaire:</label>
                            @if($partenaire->logo)
                            <div>
                                <img src="{{ asset('storage/' . $partenaire->logo) }}" alt="Logo du Partenaire" style="width: 150px;">
                            </div>
                            @else
                            <p>Aucun logo disponible</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <a href="{{ route('admin.partenaires.edit', $partenaire->id) }}" class="btn btn-primary">Modifier</a>
                            <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
