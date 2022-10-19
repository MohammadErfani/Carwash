<?php

namespace App\Rules;

use App\Models\Appointment;
use Illuminate\Contracts\Validation\Rule;

class FollowingCodePhone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected ?Appointment $appointment;
    protected $message = '';
    public function __construct($appointment)
    {
        $this->appointment=$appointment;
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
        if($this->appointment == null){
            $this->message = "Your Following Code Not found";
        }elseif ($this->appointment->user->phone != $value){
            $this->message = "your phone number is not correct";
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
