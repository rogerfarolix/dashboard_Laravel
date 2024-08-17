@extends('layouts.admin.app')

@section('title', 'Ajouter un Partenaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter un Partenaire</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.partenaires.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom du Partenaire</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo du Partenaire</label>
                                <input type="file" name="logo" id="logo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
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
