<?php

namespace App\Http\Controllers;

use App\Models\TouristAttraction;
use Illuminate\Http\Request;

class TouristAttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attractions = TouristAttraction::paginate(10);
        
        // Calcular estatísticas do banco de dados completo
        $stats = [
            'total_attractions' => TouristAttraction::count(),
            'total_countries' => TouristAttraction::distinct()->count('pais'),
            'total_categories' => TouristAttraction::distinct()->count('categoria'),
        ];
        
        return view('admin.attractions.index', compact('attractions', 'stats'));
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
    public function store(Request $request)
    {
        $request->validate([
            'cidade' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'imagem_url' => 'nullable|url|max:500',
            'endereco' => 'nullable|string|max:500',
            'nome_pt' => 'required|string|max:255|unique:tourist_attractions,nome_pt',
            'nome_en' => 'required|string|max:255|unique:tourist_attractions,nome_en',
            'nome_es' => 'required|string|max:255|unique:tourist_attractions,nome_es',
            'descricao_pt' => 'nullable|string|max:1000',
            'descricao_en' => 'nullable|string|max:1000',
            'descricao_es' => 'nullable|string|max:1000',
        ], [
            'nome_pt.unique' => 'Já existe um ponto turístico com este nome em português.',
            'nome_en.unique' => 'Já existe um ponto turístico com este nome em inglês.',
            'nome_es.unique' => 'Já existe um ponto turístico com este nome em espanhol.',
        ]);

        // Verificação adicional para cidade + país
        $existingLocation = TouristAttraction::where('cidade', $request->cidade)
            ->where('pais', $request->pais)
            ->first();

        if ($existingLocation) {
            return back()->withErrors(['cidade' => 'Já existe um ponto turístico em "' . $request->cidade . ', ' . $request->pais . '".'])
                        ->withInput();
        }

        try {
            TouristAttraction::create($request->all());
            return redirect()->route('admin.attractions.index')
                ->with('success', 'Ponto turístico criado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
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
    public function update(Request $request, TouristAttraction $attraction)
    {
        $request->validate([
            'cidade' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'imagem_url' => 'nullable|url|max:500',
            'endereco' => 'nullable|string|max:500',
            'nome_pt' => 'required|string|max:255|unique:tourist_attractions,nome_pt,' . $attraction->id,
            'nome_en' => 'required|string|max:255|unique:tourist_attractions,nome_en,' . $attraction->id,
            'nome_es' => 'required|string|max:255|unique:tourist_attractions,nome_es,' . $attraction->id,
            'descricao_pt' => 'nullable|string|max:1000',
            'descricao_en' => 'nullable|string|max:1000',
            'descricao_es' => 'nullable|string|max:1000',
        ], [
            'nome_pt.unique' => 'Já existe um ponto turístico com este nome em português.',
            'nome_en.unique' => 'Já existe um ponto turístico com este nome em inglês.',
            'nome_es.unique' => 'Já existe um ponto turístico com este nome em espanhol.',
        ]);

        // Verificação adicional para cidade + país (excluindo o registro atual)
        $existingLocation = TouristAttraction::where('cidade', $request->cidade)
            ->where('pais', $request->pais)
            ->where('id', '!=', $attraction->id)
            ->first();

        if ($existingLocation) {
            return back()->withErrors(['cidade' => 'Já existe um ponto turístico em "' . $request->cidade . ', ' . $request->pais . '".'])
                        ->withInput();
        }

        try {
            $attraction->update($request->all());
            return redirect()->route('admin.attractions.index')
                ->with('success', 'Ponto turístico atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
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
