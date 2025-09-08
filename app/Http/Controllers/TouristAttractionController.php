<?php

namespace App\Http\Controllers;

use App\Models\TouristAttraction;
use App\Http\Requests\TouristAttractionRequest;
use Illuminate\Http\Request;

class TouristAttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TouristAttraction::query();
        
        // Aplicar filtros de busca
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nome_pt', 'like', "%{$search}%")
                  ->orWhere('nome_en', 'like', "%{$search}%")
                  ->orWhere('nome_es', 'like', "%{$search}%")
                  ->orWhere('cidade', 'like', "%{$search}%")
                  ->orWhere('pais', 'like', "%{$search}%")
                  ->orWhere('categoria', 'like', "%{$search}%");
            });
        }
        
        // Filtro por categoria
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
        
        // Filtro por país
        if ($request->filled('pais')) {
            $query->where('pais', 'like', "%{$request->pais}%");
        }
        
        $attractions = $query->paginate(10)->withQueryString();
        
        // Calcular estatísticas do banco de dados completo
        $stats = [
            'total_attractions' => TouristAttraction::count(),
            'total_countries' => TouristAttraction::distinct()->count('pais'),
            'total_categories' => TouristAttraction::distinct()->count('categoria'),
        ];
        
        // Obter categorias e países únicos para os filtros
        $categories = TouristAttraction::distinct()->pluck('categoria')->sort();
        $countries = TouristAttraction::distinct()->pluck('pais')->sort();
        
        return view('admin.attractions.index', compact('attractions', 'stats', 'categories', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attractions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TouristAttractionRequest $request)
    {
        try {
            TouristAttraction::create($request->validated());
            return redirect()->route('admin.attractions.index')
                ->with('success', 'Ponto turístico criado com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao criar ponto turístico: ' . $e->getMessage());
            
            // Verificar se é um erro de validação específico
            if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                return back()->withErrors(['error' => 'Erro ao salvar no banco de dados. Verifique se todos os campos obrigatórios estão preenchidos corretamente.'])->withInput();
            }
            
            return back()->withErrors(['error' => 'Erro inesperado ao criar o ponto turístico. Tente novamente.'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TouristAttraction $attraction)
    {
        return view('admin.attractions.show', compact('attraction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TouristAttraction $attraction)
    {
        return view('admin.attractions.edit', compact('attraction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TouristAttractionRequest $request, TouristAttraction $attraction)
    {
        try {
            $attraction->update($request->validated());
            return redirect()->route('admin.attractions.index')
                ->with('success', 'Ponto turístico atualizado com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar ponto turístico: ' . $e->getMessage());
            
            // Verificar se é um erro de validação específico
            if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                return back()->withErrors(['error' => 'Erro ao salvar no banco de dados. Verifique se todos os campos obrigatórios estão preenchidos corretamente.'])->withInput();
            }
            
            return back()->withErrors(['error' => 'Erro inesperado ao atualizar o ponto turístico. Tente novamente.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TouristAttraction $attraction)
    {
        $attraction->delete();

        return redirect()->route('admin.attractions.index')
            ->with('success', 'Ponto turístico excluído com sucesso!');
    }
}
