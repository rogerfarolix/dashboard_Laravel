@extends('layouts.admin.app')

@section('title', 'Modifier une image')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier une image</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.galeries.update', $galerie->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{ asset('storage/' . $galerie->image) }}" alt="Image actuelle" style="width: 100px;">
                            </div>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
