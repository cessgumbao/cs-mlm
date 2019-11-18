<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotEqualTo implements Rule
{
    protected $another_value;
    protected $another_value_string;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($another_value_string, $another_value)
    {
        $this->another_value = $another_value;
        $this->another_value_string = $another_value_string;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value != $this->another_value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must not be equal to ' . $this->another_value_string;
    }
}
