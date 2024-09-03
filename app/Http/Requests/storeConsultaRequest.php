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
            'condition'=>'max:255|required',
            'heartRate'=>'numeric|min:1|required',
            'respiratoryRate'=>'numeric|min:1|required',
            'patient_id'=>'integer|min:1|required',
            'symptoms'=>'string|required'
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
            'condition.max'=>'o nome do condition ultrapassou o número maximo de letras',
            'condition.required' => 'o condition é um campo obrigatorio',
            'heartRate.numeric' => 'a frequencia cardiaca deve der informada como um número',
            'heartRate.min'=>'a frequencia cardiaca deve ser maior que 1',
            'heartRate.required'=>'o frequencia cardiaca é um campo obrigatorio',
            'respiratoryRate.numeric' => 'a frequencia respiratoria deve der informada como um número',
            'respiratoryRate.min'=>'a frequencia respiratoria deve ser maior que 1',
            'respiratoryRate.required'=>'o frequencia respiratoria é um campo obrigatorio',
            'patient_id.integer'=>'o campo patient_id deve der informado como um número inteiro',
            'patient_id.min'=>'o campo patient_id deve ser maior que 1',
            'patient_id.required'=>'o campo patient_id é um campo obrigatorio',
            'symptoms.string'=>'o campo symptoms deve ser um string',
            'symptoms.required'=>'o campo symptoms é um campo obrigatorio'
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
