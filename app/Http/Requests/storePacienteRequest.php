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
            'nome'=>['string','required'],
            'condicao'=>['string','required'],
            'dataNasc'=>['required'],
            'cpf'=>[new CPF,'unique:pacientes','required'],
            'telefone'=>[new Tel,'required'],
            'foto'=>['image','required']
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
            'nome.string'=>'o campo nome deve ser uma string',
            'nome.required'=>'o campo nome é um campo obrigatorio',
            'condicao.string'=>'o campo condição deve ser um string',
            'condicao.required'=>'o campo condicao é um campo obrigatorio',
            'dataNasc.required'=>'o campo dataNasc é um campo obrigatorio',
            'cpf.unique'=>'o campo cpf é um campo unico',
            'cpf.required'=>'o campo cpf é um campo obrigatorio',
            'telefone.required'=>'o campo telefone é um campo obrigatorio',
            'foto.image'=>'o campo image deve ser uma imagem',
            'foto.required'=>'o campo foto é um campo obrigatorio',
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
