@extends('layouts.admin.app')

@section('title', 'Modifier Actualité')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier une Actualité</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.actualites.update', $actualite->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="categorie_id">Catégorie</label>
                                <select name="categorie_id" id="categorie_id" class="form-control" required>
                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ $categorie->id == $actualite->categorie_id ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $actualite->date) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $actualite->titre) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description1">Description 1</label>
                                <textarea name="description1" id="description1" class="form-control">{{ old('description1', $actualite->description1) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image1">Image 1</label>
                                <input type="file" name="image1" id="image1" class="form-control">
                                @if($actualite->image1)
                                <img src="{{ asset('storage/' . $actualite->image1) }}" alt="Image 1" style="width: 100px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <input type="file" name="image2" id="image2" class="form-control">
                                @if($actualite->image2)
                                <img src="{{ asset('storage/' . $actualite->image2) }}" alt="Image 2" style="width: 100px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <input type="file" name="image3" id="image3" class="form-control">
                                @if($actualite->image3)
                                <img src="{{ asset('storage/' . $actualite->image3) }}" alt="Image 3" style="width: 100px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description2">Description 2</label>
                                <textarea name="description2" id="description2" class="form-control">{{ old('description2', $actualite->description2) }}</textarea>
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
        .create(document.querySelector('#description1'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#description2'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
