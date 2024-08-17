@extends('.layouts.admin.app')

@section('title', 'Avis')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Panel des Avis</h4>
                            <a href="{{ route('admin.avis.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Ajouter Avis
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Avis</th>
                                        <th>Note</th>
                                        <th>Validé</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Avis</th>
                                        <th>Note</th>
                                        <th>Validé</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($avis as $avi)
                                        <tr>
                                            <td>{{ $avi->nom }}</td>
                                            <td>{{ $avi->email }}</td>
                                            <td>{!! Str::limit($avi->avis, 15) !!}</td>
                                            <td>{{ $avi->note }} / 5</td>
                                            <td>{{ $avi->valide ? 'Oui' : 'Non' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.avis.show', $avi->id) }}" class="btn btn-link btn-info btn-lg" title="Voir les détails">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.avis.edit', $avi->id) }}" class="btn btn-link btn-primary btn-lg" title="Modifier">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.avis.destroy', $avi->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');" title="Supprimer">
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
