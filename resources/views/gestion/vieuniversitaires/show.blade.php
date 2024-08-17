@extends('layouts.admin.app')

@section('title', 'Détails du Contenu Vie Universitaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails du Contenu Vie Universitaire</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $vieuniversitaire->type }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($vieuniversitaire->image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $vieuniversitaire->image) }}" alt="Image" style="width: 100px;">
                            </div>
                            @else
                            <p>Aucune image disponible</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <a href="{{ route('admin.vieuniversitaires.index') }}" class="btn btn-secondary">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
