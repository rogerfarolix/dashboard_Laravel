@extends('layouts.admin.app')

@section('title', 'Ajouter Membre de l\'Équipe')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter un Membre de l'Équipe</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.equipes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" name="profession" id="profession" class="form-control" value="{{ old('profession') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="details">Détails</label>
                                <textarea name="details" id="details" class="form-control" >{{ old('details') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
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
        .create(document.querySelector('#details'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
