<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollaboratorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ['nullable', 'image', 'max:250'],
            'name' => ['required', 'unique:projects', 'min:4', 'max:50'],
            'bio' => ['required', 'min:20'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Il nome é obbligatorio",
            'name.min' => "Il nome deve essere almeno di :min caratteri",
            'nome.max' => "Il nome deve essere almeno di :max caratteri",
            'bio.min' => "La descrizione deve essere almeno di :min caratteri",
        ];
    }
}
