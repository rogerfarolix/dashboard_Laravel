@extends('layouts.admin.app')

@section('title', 'Modifier un contenu de Vie Universitaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier un contenu</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.vieuniversitaires.update', $vieuniversitaire->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="Clubs Artistiques et Culturels" {{ $vieuniversitaire->type == 'Clubs Artistiques et Culturels' ? 'selected' : '' }}>Clubs Artistiques et Culturels</option>
                                    <option value="Clubs des Hôtes et Langues" {{ $vieuniversitaire->type == 'Clubs des Hôtes et Langues' ? 'selected' : '' }}>Clubs des Hôtes et Langues</option>
                                    <option value="Événements & Célébrations" {{ $vieuniversitaire->type == 'Événements & Célébrations' ? 'selected' : '' }}>Événements & Célébrations</option>
                                    <option value="Travaux pratiques" {{ $vieuniversitaire->type == 'Travaux pratiques' ? 'selected' : '' }}>Travaux pratiques</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if($vieuniversitaire->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $vieuniversitaire->image) }}" alt="Image actuelle" style="width: 100px;">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $vieuniversitaire->description) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
