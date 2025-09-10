<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackAdminController extends Controller
{
    public function index(Request $request)
    {
        $tipo = $request->query('tipo');
        $status = $request->query('status');

        $query = Feedback::query()->latest();
        if ($tipo) {
            $query->where('tipo', $tipo);
        }
        
        // Para sugestões, mostrar todas (já que são aprovadas automaticamente)
        // Para comentários, filtrar por status
        if ($tipo === 'comentario') {
            if ($status === 'aprovado') {
                $query->where('aprovado', true);
            } elseif ($status === 'pendente') {
                $query->where('aprovado', false);
            }
        } elseif ($tipo === 'sugestao') {
            // Sugestões são sempre aprovadas, não filtrar por status
        } else {
            // Se não especificou tipo, mostrar comentários pendentes e sugestões
            if ($status === 'aprovado') {
                $query->where('aprovado', true);
            } elseif ($status === 'pendente') {
                $query->where('aprovado', false);
            }
        }

        $feedback = $query->paginate(15)->withQueryString();
        return view('admin.feedback.index', compact('feedback', 'tipo', 'status'));
    }

    public function approve(Feedback $feedback)
    {
        // Só pode aprovar comentários, sugestões já são aprovadas automaticamente
        if ($feedback->tipo === 'sugestao') {
            return back()->with('error', 'Sugestões são aprovadas automaticamente.');
        }
        
        $feedback->update(['aprovado' => true]);
        return back()->with('success', 'Comentário aprovado.');
    }

    public function reject(Feedback $feedback)
    {
        // Só pode rejeitar comentários, sugestões não podem ser rejeitadas
        if ($feedback->tipo === 'sugestao') {
            return back()->with('error', 'Sugestões não podem ser rejeitadas.');
        }
        
        $feedback->update(['aprovado' => false]);
        return back()->with('success', 'Comentário marcado como pendente.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback excluído.');
    }

    public function updateSuggestionStatus(Feedback $feedback, Request $request)
    {
        if ($feedback->tipo !== 'sugestao') {
            return back()->with('error', 'Apenas sugestões possuem status de sugestão.');
        }

        $validated = $request->validate([
            'sugestao_status' => 'required|in:pendente,inserido',
        ]);

        $feedback->update($validated);

        return back()->with('success', 'Status da sugestão atualizado.');
    }
}



