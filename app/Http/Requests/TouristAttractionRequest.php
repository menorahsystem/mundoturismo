<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TouristAttractionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'cidade' => 'required|string|max:255',
            'estado' => 'nullable|string|max:100',
            'pais' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'imagem_url' => 'nullable|url|max:1000',
            'endereco' => 'nullable|string|max:500',
            'nome_pt' => 'required|string|max:255',
            'nome_en' => 'required|string|max:255',
            'nome_es' => 'required|string|max:255',
            'descricao_pt' => 'nullable|string|max:1000',
            'descricao_en' => 'nullable|string|max:1000',
            'descricao_es' => 'nullable|string|max:1000',
        ];

        // Adicionar regras de unicidade baseadas no método HTTP
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $attractionId = $this->route('attraction')->id;
            $rules['nome_pt'] .= '|unique:tourist_attractions,nome_pt,' . $attractionId;
            $rules['nome_en'] .= '|unique:tourist_attractions,nome_en,' . $attractionId;
            $rules['nome_es'] .= '|unique:tourist_attractions,nome_es,' . $attractionId;
        } else {
            $rules['nome_pt'] .= '|unique:tourist_attractions,nome_pt';
            $rules['nome_en'] .= '|unique:tourist_attractions,nome_en';
            $rules['nome_es'] .= '|unique:tourist_attractions,nome_es';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cidade.max' => 'O nome da cidade não pode ter mais de 255 caracteres.',
            'estado.max' => 'O estado/província não pode ter mais de 100 caracteres.',
            'pais.required' => 'O campo país é obrigatório.',
            'pais.max' => 'O nome do país não pode ter mais de 255 caracteres.',
            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.max' => 'O nome da categoria não pode ter mais de 255 caracteres.',
            'imagem_url.url' => 'A URL da imagem deve ser uma URL válida (ex: https://exemplo.com/imagem.jpg).',
            'imagem_url.max' => 'A URL da imagem não pode ter mais de 1000 caracteres.',
            'endereco.max' => 'O endereço não pode ter mais de 500 caracteres.',
            'nome_pt.required' => 'O nome em português é obrigatório.',
            'nome_pt.max' => 'O nome em português não pode ter mais de 255 caracteres.',
            'nome_pt.unique' => 'Já existe um ponto turístico com este nome em português.',
            'nome_en.required' => 'O nome em inglês é obrigatório.',
            'nome_en.max' => 'O nome em inglês não pode ter mais de 255 caracteres.',
            'nome_en.unique' => 'Já existe um ponto turístico com este nome em inglês.',
            'nome_es.required' => 'O nome em espanhol é obrigatório.',
            'nome_es.max' => 'O nome em espanhol não pode ter mais de 255 caracteres.',
            'nome_es.unique' => 'Já existe um ponto turístico com este nome em espanhol.',
            'descricao_pt.max' => 'A descrição em português não pode ter mais de 1000 caracteres.',
            'descricao_en.max' => 'A descrição em inglês não pode ter mais de 1000 caracteres.',
            'descricao_es.max' => 'A descrição em espanhol não pode ter mais de 1000 caracteres.',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'cidade' => 'cidade',
            'estado' => 'estado/província',
            'pais' => 'país',
            'categoria' => 'categoria',
            'imagem_url' => 'URL da imagem',
            'endereco' => 'endereço',
            'nome_pt' => 'nome em português',
            'nome_en' => 'nome em inglês',
            'nome_es' => 'nome em espanhol',
            'descricao_pt' => 'descrição em português',
            'descricao_en' => 'descrição em inglês',
            'descricao_es' => 'descrição em espanhol',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // Validação customizada removida temporariamente para evitar conflitos
        // Será implementada de forma mais simples no controller se necessário
    }
}
