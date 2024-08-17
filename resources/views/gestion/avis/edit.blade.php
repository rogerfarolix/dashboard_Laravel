@extends('.layouts.admin.app')

@section('title', 'Modifier un Avis')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier un Avis</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.avis.update', $avi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" value="{{ $avi->nom }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $avi->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="avis">Avis</label>
                                <textarea name="avis" class="form-control" id="avis" rows="5" required>{{ $avi->avis }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="note">Note (1-5 étoiles)</label>
                                <input type="number" name="note" class="form-control" id="note" min="1" max="5" value="{{ $avi->note }}" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="hidden" name="valide" value="0"> <!-- Valeur par défaut -->
                                <input type="checkbox" name="valide" class="form-check-input" id="valide" value="1" {{ $avi->valide ? 'checked' : '' }}>
                                <label class="form-check-label" for="valide">Validé</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('admin.avis.index') }}" class="btn btn-secondary">Annuler</a>
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
        .create(document.querySelector('#avis'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
