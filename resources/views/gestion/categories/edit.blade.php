@extends('layouts.admin.app')

@section('title', 'Modifier la Catégorie')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier la Catégorie</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.categories.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name">Nom de la Catégorie</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $categorie->name) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $categorie->description) }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Image de la Catégorie</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                                @if ($categorie->image)
                                    <img src="{{ asset('storage/' . $categorie->image) }}" alt="Image de la catégorie" class="mt-2" style="width: 150px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
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
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
