<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CPF implements ValidationRule
{
    /** 
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpfRegExp = '/[0-9]{3}[.][0-9]{3}[.][0-9]{3}[-][0-9]{2}/';
        $valorCorespodente = preg_match($cpfRegExp,$value);

        if (!$valorCorespodente) {
            $fail('o :attribute não corresponde ao formato esperado');
        }
    }
}
