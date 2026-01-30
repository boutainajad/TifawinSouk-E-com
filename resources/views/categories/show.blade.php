@extends('layout')

@section('title', 'Détails de la Catégorie')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $categorie->nom }}</h2>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('categories.edit', ['category' => $categorie->id]) }}" class="btn btn-warning"> Modifier</a>
            <a href="{{ route('categories.index') }}" class="btn"> Retour</a>
        </div>
    </div>

    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Informations</h3>
        <p><strong>ID:</strong> {{ $categorie->id }}</p>
        <p><strong>Nom:</strong> {{ $categorie->nom }}</p>
        <p><strong>Description:</strong> {{ $categorie->description ?? 'Aucune description' }}</p>
        <p><strong>Créée le:</strong> {{ $categorie->created_at->format('d/m/Y à H:i') }}</p>
        <p><strong>Modifiée le:</strong> {{ $categorie->updated_at->format('d/m/Y à H:i') }}</p>
    </div>

    <h3 style="color: #2c3e50; margin-bottom: 1rem;">Produits ({{ $categorie->produits->count() }})</h3>

    @if($categorie->produits->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorie->produits as $produit)
                    <tr>
                        <td><code>{{ $produit->reference }}</code></td>
                        <td><strong>{{ $produit->nom }}</strong></td>
                        <td>{{ number_format($produit->prix, 2) }} MAD</td>
                        <td>
                            <span style="color: {{ $produit->stock > 10 ? '#27ae60' : ($produit->stock > 0 ? '#f39c12' : '#e74c3c') }}">
                                {{ $produit->stock }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('produits.edit', ['produit' => $produit->id]) }}" class="btn btn-warning btn-small"> Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #999; padding: 2rem;">Aucun produit dans cette catégorie.</p>
    @endif
</div>
@endsection