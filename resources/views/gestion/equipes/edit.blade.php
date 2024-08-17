@extends('layouts.admin.app')

@section('title', 'Modifier une Équipe')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier une Équipe</h4>
                        <a href="{{ route('admin.equipes.index') }}" class="btn btn-secondary btn-round ms-auto">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.equipes.update', $equipe->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="photo"><strong>Photo :</strong></label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @if($equipe->photo)
                                    <img src="{{ asset('storage/' . $equipe->photo) }}" alt="Photo de l'Équipe" style="width: 150px; height: auto;" class="mt-2">
                                @endif
                                @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="nom"><strong>Nom :</strong></label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $equipe->nom) }}" required>
                                @error('nom')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="profession"><strong>Profession :</strong></label>
                                <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" value="{{ old('profession', $equipe->profession) }}" required>
                                @error('profession')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="details"><strong>Détails :</strong></label>
                                <textarea name="details" class="form-control @error('details') is-invalid @enderror" rows="4" required>{{ old('details', $equipe->details) }}</textarea>
                                @error('details')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#details'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
