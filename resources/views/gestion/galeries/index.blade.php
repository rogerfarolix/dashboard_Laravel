@extends('layouts.admin.app')

@section('title', 'Galeries')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Gestion des Galeries</h4>
                            <a href="{{ route('admin.galeries.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Ajouter Image
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($galeries as $galerie)
                                    <tr>
                                        <td>
                                            @if($galerie->image)
                                            <img src="{{ asset('storage/' . $galerie->image) }}" alt="Image" style="width: 100px;">
                                            @else
                                            Pas d'image
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.galeries.edit', $galerie->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.galeries.destroy', $galerie->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?');" title="Supprimer">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
