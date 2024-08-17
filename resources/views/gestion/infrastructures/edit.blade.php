@extends('layouts.admin.app')

@section('title', 'Modifier Infrastructure')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Infrastructure</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.infrastructures.update', $infrastructure->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="type">Type d'Infrastructure</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="equipements" {{ $infrastructure->type == 'equipements' ? 'selected' : '' }}>Équipements</option>
                                    <option value="batiments" {{ $infrastructure->type == 'batiments' ? 'selected' : '' }}>Unités d'opérations</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description', $infrastructure->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if($infrastructure->image)
                                <br>
                                <img src="{{ asset('storage/' . $infrastructure->image) }}" alt="Image actuelle" style="width: 150px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('admin.infrastructures.index') }}" class="btn btn-secondary">Annuler</a>
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
