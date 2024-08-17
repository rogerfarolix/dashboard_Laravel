@extends('layouts.admin.app')

@section('title', 'Infrastructures')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Gestion des Infrastructures</h4>
                            <a href="{{ route('admin.infrastructures.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Ajouter Infrastructure
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($infrastructures as $infrastructure)
                                    <tr>
                                        <td>{{ ucfirst($infrastructure->type) }}</td>
                                        <td>
                                            @if($infrastructure->image)
                                            <img src="{{ asset('storage/' . $infrastructure->image) }}" alt="Image" style="width: 100px;">
                                            @else
                                            Pas d'image
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.infrastructures.show', $infrastructure->id) }}" class="btn btn-link btn-info btn-lg" title="Voir les détails">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.infrastructures.edit', $infrastructure->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.infrastructures.destroy', $infrastructure->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette infrastructure ?');" title="Supprimer">
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
