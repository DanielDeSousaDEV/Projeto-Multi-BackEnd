<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Tel implements ValidationRule
{
    /** 
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $telRegExp = '/[\(][0-9]{2}[\)][0-9]{5}[-][0-9]{4}/';
        $valorCorespodente = preg_match($telRegExp,$value);

        if (!$valorCorespodente) {
            $fail('o :attribute não corresponde ao formato esperado');
        }
    }
}
