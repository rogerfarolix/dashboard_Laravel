@extends('layouts.admin.app')

@section('title', 'Détails de l\'Infrastructure')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails de l'Infrastructure</h4>
                        <a href="{{ route('admin.infrastructures.index') }}" class="btn btn-secondary btn-round ms-auto">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="type"><strong>Type d'Infrastructure :</strong></label>
                            <p>{{ ucfirst($infrastructure->type) }}</p>
                        </div>
                        <div class="form-group">
                            <label for="image"><strong>Image :</strong></label>
                            <br>
                            @if($infrastructure->image)
                            <img src="{{ asset('storage/' . $infrastructure->image) }}" alt="Image de l'Infrastructure" style="width: 300px; height: auto;">
                            @else
                            <p>Pas d'image disponible</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description"><strong>Description :</strong></label>
                            <p>{!! $infrastructure->description ?? 'Aucune description disponible' !!}</p>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.infrastructures.edit', $infrastructure->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('admin.infrastructures.destroy', $infrastructure->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette infrastructure ?');">
                                    <i class="fa fa-times"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
