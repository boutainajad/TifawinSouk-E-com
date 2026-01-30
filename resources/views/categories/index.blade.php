@extends('layout')

@section('title', 'Liste des Catégories')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Liste des Catégories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-success"> Nouvelle Catégorie</a>
    </div>

    @if($categories->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Nb Produits</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td><strong>{{ $categorie->nom }}</strong></td>
                        <td>{{ Str::limit($categorie->description, 50) }}</td>
                        <td>{{ $categorie->produits->count() }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('categories.show', ['category' => $categorie]) }}" class="btn btn-small" style="background-color: #3498db;"> Voir</a>
                                <a href="{{ route('categories.edit', ['category' => $categorie->id]) }}" class="btn btn-warning btn-small"> Modifier</a>
                                <form action="{{ route('categories.destroy', ['category' => $categorie->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #999; padding: 2rem;">Aucune catégorie trouvée. Créez-en une pour commencer !</p>
    @endif
</div>
@endsection