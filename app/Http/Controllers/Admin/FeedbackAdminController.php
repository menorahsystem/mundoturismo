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
        if ($status === 'aprovado') {
            $query->where('aprovado', true);
        } elseif ($status === 'pendente') {
            $query->where('aprovado', false);
        }

        $feedback = $query->paginate(15)->withQueryString();
        return view('admin.feedback.index', compact('feedback', 'tipo', 'status'));
    }

    public function approve(Feedback $feedback)
    {
        $feedback->update(['aprovado' => true]);
        return back()->with('success', 'Feedback aprovado.');
    }

    public function reject(Feedback $feedback)
    {
        $feedback->update(['aprovado' => false]);
        return back()->with('success', 'Feedback marcado como pendente.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback excluído.');
    }
}



