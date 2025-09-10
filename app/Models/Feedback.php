<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'tipo',
        'nome',
        'email',
        'conteudo',
        'tourist_attraction_id',
        'atracao_sugerida',
        'aprovado',
        'sugestao_status',
    ];

    public function touristAttraction()
    {
        return $this->belongsTo(TouristAttraction::class);
    }
}


