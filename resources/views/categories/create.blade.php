@extends('layout')

@section('title', 'Créer une Catégorie')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Créer une Nouvelle Catégorie</h2>
    </div>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Enregistrer</button>
            <a href="{{ route('categories.index') }}" class="btn"> Retour</a>
        </div>
    </form>
</div>
@endsection