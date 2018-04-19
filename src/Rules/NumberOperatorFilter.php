<?php

namespace Viperxes\Client\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumberOperatorFilter implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(eq|gt|gte|lt|lte):(0|[1-9]\d*)$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must contain number operator and value';
    }
}
