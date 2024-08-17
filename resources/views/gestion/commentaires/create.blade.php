@extends('layouts.admin.app')

@section('title', 'Ajouter un Commentaire')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter un Commentaire</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.commentaires.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="actualite_id">Actualité</label>
                                <select name="actualite_id" id="actualite_id" class="form-control" required>
                                    <option value="">Sélectionnez une actualité</option>
                                    @foreach($actualites as $actualite)
                                        <option value="{{ $actualite->id }}">{{ $actualite->titre }}</option>
                                    @endforeach
                                </select>
                                @error('actualite_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
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
        .create(document.querySelector('#message'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
