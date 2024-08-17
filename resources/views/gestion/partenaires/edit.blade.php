@extends('layouts.admin.app')

@section('title', 'Modifier Partenaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Partenaire</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.partenaires.update', $partenaire->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nom du Partenaire</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ $partenaire->nom }}" required>
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo du Partenaire</label>
                                @if($partenaire->logo)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $partenaire->logo) }}" alt="Logo actuel" style="width: 150px;">
                                </div>
                                @endif
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
