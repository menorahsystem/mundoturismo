<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristAttraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade',
        'pais',
        'categoria',
        'imagem_url',
        'endereco',
        'nome_pt',
        'nome_en',
        'nome_es',
        'descricao_pt',
        'descricao_en',
        'descricao_es',
    ];

    /**
     * The accessors to append to the model's array form.
     */
    protected $appends = ['localizacao', 'category_color', 'gradient', 'icon', 'waze_url', 'google_maps_url', 'google_maps_navigation_url'];

    /**
     * Boot the model and add validation rules
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($attraction) {
            static::validateUniqueNames($attraction);
        });

        static::updating(function ($attraction) {
            static::validateUniqueNames($attraction);
        });
    }

    /**
     * Validate unique names across all languages
     */
    protected static function validateUniqueNames($attraction)
    {
        // Verificar se já existe um ponto turístico com o mesmo nome em português
        $existingPt = static::where('nome_pt', $attraction->nome_pt)
            ->when($attraction->exists, function ($query) use ($attraction) {
                return $query->where('id', '!=', $attraction->id);
            })
            ->first();

        if ($existingPt) {
            throw new \Exception('Já existe um ponto turístico com o nome "' . $attraction->nome_pt . '" em português.');
        }

        // Verificar se já existe um ponto turístico com o mesmo nome em inglês
        $existingEn = static::where('nome_en', $attraction->nome_en)
            ->when($attraction->exists, function ($query) use ($attraction) {
                return $query->where('id', '!=', $attraction->id);
            })
            ->first();

        if ($existingEn) {
            throw new \Exception('Já existe um ponto turístico com o nome "' . $attraction->nome_en . '" em inglês.');
        }

        // Verificar se já existe um ponto turístico com o mesmo nome em espanhol
        $existingEs = static::where('nome_es', $attraction->nome_es)
            ->when($attraction->exists, function ($query) use ($attraction) {
                return $query->where('id', '!=', $attraction->id);
            })
            ->first();

        if ($existingEs) {
            throw new \Exception('Já existe um ponto turístico com o nome "' . $attraction->nome_es . '" em espanhol.');
        }

        // Removida a validação de localização para permitir múltiplos pontos turísticos na mesma cidade
    }

    /**
     * Scope for safe search by name
     */
    public function scopeSearchByName($query, $searchTerm)
    {
        if (empty($searchTerm)) {
            return $query;
        }

        $sanitizedTerm = trim($searchTerm);
        $sanitizedTerm = htmlspecialchars($sanitizedTerm, ENT_QUOTES, 'UTF-8');
        
        return $query->where(function($q) use ($sanitizedTerm) {
            $q->where('nome_pt', 'like', '%' . $sanitizedTerm . '%')
              ->orWhere('nome_en', 'like', '%' . $sanitizedTerm . '%')
              ->orWhere('nome_es', 'like', '%' . $sanitizedTerm . '%');
        });
    }

    /**
     * Scope for safe filter by category
     */
    public function scopeFilterByCategory($query, $category)
    {
        if (empty($category)) {
            return $query;
        }

        $sanitizedCategory = trim($category);
        $sanitizedCategory = htmlspecialchars($sanitizedCategory, ENT_QUOTES, 'UTF-8');
        
        return $query->where('categoria', $sanitizedCategory);
    }

    /**
     * Scope for safe filter by country
     */
    public function scopeFilterByCountry($query, $country)
    {
        if (empty($country)) {
            return $query;
        }

        $sanitizedCountry = trim($country);
        $sanitizedCountry = htmlspecialchars($sanitizedCountry, ENT_QUOTES, 'UTF-8');
        
        // Debug log to see what's being searched
        \Log::info('Searching for country: ' . $sanitizedCountry);
        
        return $query->where('pais', 'like', '%' . $sanitizedCountry . '%');
    }

    /**
     * Scope for safe filter by city
     */
    public function scopeFilterByCity($query, $city)
    {
        if (empty($city)) {
            return $query;
        }

        $sanitizedCity = trim($city);
        $sanitizedCity = htmlspecialchars($sanitizedCity, ENT_QUOTES, 'UTF-8');
        
        return $query->where('cidade', 'like', '%' . $sanitizedCity . '%');
    }

    /**
     * Get the name based on current locale
     */
    public function getNomeAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"nome_$locale"} ?? $this->nome_pt;
    }

    /**
     * Get the description based on current locale
     */
    public function getDescricaoAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"descricao_$locale"} ?? $this->descricao_pt;
    }

    /**
     * Get the full location (city, country)
     */
    public function getLocalizacaoAttribute()
    {
        return "{$this->cidade}, {$this->pais}";
    }

    /**
     * Get category color for Tailwind CSS
     */
    public function getCategoryColorAttribute()
    {
        $colors = [
            'Histórico' => 'orange',
            'Religioso' => 'purple',
            'Natural' => 'green',
            'Cultural' => 'yellow',
            'Arquitetônico' => 'red',
            'Gastronômico' => 'pink',
            'Esportivo' => 'blue',
            'Tecnológico' => 'indigo',
        ];

        return $colors[$this->categoria] ?? 'gray';
    }

    /**
     * Get gradient for card background
     */
    public function getGradientAttribute()
    {
        $gradients = [
            'Histórico' => 'from-orange-400 to-orange-600',
            'Religioso' => 'from-purple-400 to-purple-600',
            'Natural' => 'from-green-400 to-green-600',
            'Cultural' => 'from-yellow-400 to-yellow-600',
            'Arquitetônico' => 'from-red-400 to-red-600',
            'Gastronômico' => 'from-pink-400 to-pink-600',
            'Esportivo' => 'from-blue-400 to-blue-600',
            'Tecnológico' => 'from-indigo-400 to-indigo-600',
        ];

        return $gradients[$this->categoria] ?? 'from-gray-400 to-gray-600';
    }

    /**
     * Get icon for the attraction
     */
    public function getIconAttribute()
    {
        $icons = [
            'Histórico' => '🏛️',
            'Religioso' => '🕌',
            'Natural' => '🏔️',
            'Cultural' => '🗿',
            'Arquitetônico' => '🏰',
            'Gastronômico' => '🍽️',
            'Esportivo' => '⚽',
            'Tecnológico' => '💻',
        ];

        return $icons[$this->categoria] ?? '📍';
    }

    /**
     * Get Waze navigation URL
     */
    public function getWazeUrlAttribute()
    {
        // Incluir o nome do ponto turístico + cidade + país para busca mais precisa
        $location = urlencode($this->nome_pt . ', ' . $this->cidade . ', ' . $this->pais);
        return "https://waze.com/ul?q={$location}&navigate=yes";
    }

    /**
     * Get Google Maps URL
     */
    public function getGoogleMapsUrlAttribute()
    {
        // Incluir o nome do ponto turístico + cidade + país para busca mais precisa
        $location = urlencode($this->nome_pt . ', ' . $this->cidade . ', ' . $this->pais);
        return "https://www.google.com/maps/search/?api=1&query={$location}";
    }

    /**
     * Get Google Maps navigation URL
     */
    public function getGoogleMapsNavigationUrlAttribute()
    {
        // Incluir o nome do ponto turístico + cidade + país para navegação direta
        $location = urlencode($this->nome_pt . ', ' . $this->cidade . ', ' . $this->pais);
        return "https://www.google.com/maps/dir/?api=1&destination={$location}";
    }
}
