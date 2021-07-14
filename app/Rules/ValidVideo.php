<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidVideo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        // Verify if the video code is valid
        $headers = get_headers('https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v='.$value);
        if (!strpos($headers[0], '200')) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The video code is invalid!';
    }
}
