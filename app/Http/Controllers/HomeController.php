<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristAttraction;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Buscar todos os pontos turísticos do banco de dados
        $touristAttractions = TouristAttraction::all();
        
        // Buscar categorias únicas para o filtro
        $categories = TouristAttraction::distinct()->pluck('categoria')->sort()->values();

        return view('home', compact('touristAttractions', 'categories'));
    }

    /**
     * Search tourist attractions with security measures
     */
    public function search(Request $request)
    {
        // Validate and sanitize input
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:100',
            'pais' => 'nullable|string|max:100',
            'cidade' => 'nullable|string|max:100',
        ]);

        $query = TouristAttraction::query();

        // Debug log
        \Log::info('Search request:', $validated);

        // Apply safe scopes
        $query->searchByName($validated['search'] ?? '')
              ->filterByCategory($validated['categoria'] ?? '')
              ->filterByCountry($validated['pais'] ?? '')
              ->filterByCity($validated['cidade'] ?? '');

        // Limit results to prevent abuse
        $touristAttractions = $query->limit(100)->get();
        
        // Buscar categorias únicas para o filtro
        $categories = TouristAttraction::distinct()->pluck('categoria')->sort()->values();

        return view('home', compact('touristAttractions', 'categories'));
    }

    /**
     * Show tourist attraction details
     */
    public function show(TouristAttraction $attraction)
    {
        return view('attractions.show', compact('attraction'));
    }

    /**
     * Change language
     */
    public function changeLanguage($locale)
    {
        if (in_array($locale, ['pt', 'en', 'es'])) {
            session(['locale' => $locale]);
        }
        
        return redirect()->back();
    }
}
