@extends('layout')

@section('title', 'Liste des Produits')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Liste des Produits</h2>
        <a href="{{ route('produits.create') }}" class="btn btn-success"> Nouveau Produit</a>
    </div>

    @if($produits->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td><code>{{ $produit->reference }}</code></td>
                        <td><strong>{{ $produit->nom }}</strong></td>
                        <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                        <td>{{ number_format($produit->prix, 2) }} MAD</td>
                        <td>
                            <span style="color: {{ $produit->stock > 10 ? '#27ae60' : ($produit->stock > 0 ? '#f39c12' : '#e74c3c') }}">
                                {{ $produit->stock }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('produits.edit', ['produit' => $produit->id]) }}" class="btn btn-warning btn-small"> Modifier</a>
                                <form action="{{ route('produits.destroy', ['produit' => $produit->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small"> Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #999; padding: 2rem;">Aucun produit trouvé. Créez-en un pour commencer !</p>
    @endif
</div>
@endsection