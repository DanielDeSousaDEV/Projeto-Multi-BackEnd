<?php

namespace App\Http\Requests;

use App\Rules\CPF;
use App\Rules\Tel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class storePacienteRequest extends FormRequest
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
        return [
            'name'=>['string','required'],
            'condition'=>['string','required'],
            'birthDate'=>['required'],
            'cpf'=>['cpf','unique:patients','required'],
            'telephone'=>['telefone_com_ddd','required'],
            'photo'=>['image','required'] 
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string'=>'o campo name deve ser uma string',
            'name.required'=>'o campo name é um campo obrigatorio',
            'condition.string'=>'o campo condição deve ser um string',
            'condition.required'=>'o campo condition é um campo obrigatorio',
            'birthDate.required'=>'o campo birthDate é um campo obrigatorio',
            'cpf.unique'=>'o campo cpf é um campo unico',
            'cpf.required'=>'o campo cpf é um campo obrigatorio',
            'telephone.telefone_com_ddd'=>'o campo telephone está em um formato invalido',
            'telephone.required'=>'o campo telephone é um campo obrigatorio',
            'photo.image'=>'o campo photo deve ser uma imagem',
            'photo.required'=>'o campo photo é um campo obrigatorio',
        ];
    }

    //Acontece quando a validação falha
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Erro de validação',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
