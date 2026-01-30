@extends('layout')

@section('title', 'Modifier une Catégorie')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier la Catégorie</h2>
    </div>

    <form action="{{ route('categories.update', ['category' => $categorie->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nom">Nom *</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $categorie->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $categorie->description) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Mettre à jour</button>
            <a href="{{ route('categories.index') }}" class="btn"> Retour</a>
        </div>
    </form>
</div>
@endsection