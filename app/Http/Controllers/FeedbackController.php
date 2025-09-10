<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\TouristAttraction;
use Illuminate\Http\Request;
// reCAPTCHA removed: no external HTTP/config needed

class FeedbackController extends Controller
{
    public function index()
    {
        $comentarios = Feedback::with('touristAttraction')->where('tipo', 'comentario')->where('aprovado', true)->latest()->paginate(10, ['*'], 'comentarios');
        $sugestoes = Feedback::with('touristAttraction')->where('tipo', 'sugestao')->where('aprovado', true)->latest()->paginate(10, ['*'], 'sugestoes');
        $atracoes = TouristAttraction::orderBy('nome_pt')->get(['id','nome_pt','nome_en','nome_es']);

        return view('feedback.index', compact('comentarios', 'sugestoes', 'atracoes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|in:comentario,sugestao',
            'nome' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'conteudo' => 'required|string|min:5',
            'tourist_attraction_id' => 'nullable|exists:tourist_attractions,id',
            'atracao_sugerida' => 'nullable|string|max:255',
        ]);

        // Sugestões são aprovadas automaticamente; comentários precisam de aprovação
        $validated['aprovado'] = $validated['tipo'] === 'sugestao' ? true : false;
        // Status da sugestão inicia como pendente
        if ($validated['tipo'] === 'sugestao') {
            $validated['sugestao_status'] = 'pendente';
        }
        Feedback::create($validated);

        $message = $validated['tipo'] === 'comentario' 
            ? 'Comentário enviado para aprovação.' 
            : 'Sugestão enviada com sucesso!';

        return redirect()->route('feedback.index')->with('success', $message);
    }
}


