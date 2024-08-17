@extends('layouts.admin.app')

@section('title', 'Ajouter un contenu de Vie Universitaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter un contenu</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.vieuniversitaires.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Sélectionnez un type</option>
                                    <option value="Clubs Artistiques et Culturels">Clubs Artistiques et Culturels</option>
                                    <option value="Clubs des Hôtes et Langues">Clubs des Hôtes et Langues</option>
                                    <option value="Événements & Célébrations">Événements & Célébrations</option>
                                    <option value="Travaux pratiques">Travaux pratiques</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
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
