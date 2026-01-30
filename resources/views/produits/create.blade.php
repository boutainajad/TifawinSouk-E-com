@extends('layout')

@section('title', 'Créer un Produit')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Créer un Nouveau Produit</h2>
    </div>

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nom">Nom *</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="form-group">
            <label for="reference">Référence *</label>
            <input type="text" name="reference" id="reference" value="{{ old('reference') }}" required>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie *</label>
            <select name="categorie_id" id="categorie_id" required>
                <option value="">-- Sélectionnez une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="prix">Prix (MAD) *</label>
            <input type="number" name="prix" id="prix" value="{{ old('prix') }}" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock *</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Enregistrer</button>
            <a href="{{ route('produits.index') }}" class="btn"> Retour</a>
        </div>
    </form>
</div>
@endsection