@extends('.layouts.admin.app')

@section('title', 'Détails de l\'Avis')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails de l'Avis</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Nom:</strong> {{ $avi->nom }}</p>
                        <p><strong>Email:</strong> {{ $avi->email }}</p>
                        <p><strong>Avis:</strong> {!! $avi->avis !!}</p>
                        <p><strong>Note:</strong> {{ $avi->note }}</p>
                        <p><strong>Validé:</strong> {{ $avi->valide ? 'Oui' : 'Non' }}</p>
                        <a href="{{ route('admin.avis.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
