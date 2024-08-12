<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Validator;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class storeConsultaRequest extends FormRequest
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
            'estado'=>'max:255|required',
            'freqCard'=>'numeric|min:1|required',
            'freqResp'=>'numeric|min:1|required',
            'paciente_id'=>'integer|min:1|required',
            'sintomas'=>'JSON|required'
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
            'estado.max'=>'o nome do estado ultrapassou o número maximo de letras',
            'estado.required' => 'o estado é um campo obrigatorio',
            'freqCard.numeric' => 'a frequencia cardiaca deve der informada como um número',
            'freqCard.min'=>'a frequencia cardiaca deve ser maior que 1',
            'freqCard.required'=>'o frequencia cardiaca é um campo obrigatorio',
            'freqResp.numeric' => 'a frequencia respiratoria deve der informada como um número',
            'freqResp.min'=>'a frequencia respiratoria deve ser maior que 1',
            'freqResp.required'=>'o frequencia respiratoria é um campo obrigatorio',
            'paciente_id.integer'=>'o campo paciente_id deve der informado como um número inteiro',
            'paciente_id.min'=>'o campo paciente_id deve ser maior que 1',
            'paciente_id.required'=>'o campo paciente_id é um campo obrigatorio',
            'sintomas.JSON'=>'o campo sintomas deve ser uma string de json valida',
            'sintomas.required'=>'o campo sintomas é um campo obrigatorio'
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
