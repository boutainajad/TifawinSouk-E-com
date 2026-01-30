<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::withCount('produits')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    public function show(Categorie $category)
    {
        $category->load('produits');
        return view('categories.show',['categorie' => $category]);
    }

    public function edit(Categorie $category)
    {
        return view('categories.edit', ['categorie' => $category]);
    }

    public function update(Request $request, Categorie $category)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie modifiée avec succès.');
    }

    public function destroy(Categorie $category)
    {
        if ($category->produits()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle contient des produits.');
        }

        $category->delete();
        
        return redirect()->route('categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}