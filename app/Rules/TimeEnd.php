<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeEnd implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $timeEnd ;
    public function __construct($timeEnd)
    {
        $this->timeEnd=$timeEnd;
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
        return $this->timeEnd <=Carbon::CreateFromTimeString('21:00:00');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'your end time is more than car wash hour.';
    }
}
