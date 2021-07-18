<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Password implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    const DEFAULT_MIN_LENGTH = 3;

    public $maxLength;

    public $minLength;

    public $uppercasePasses;

    public $numericPasses;

    public $letters;

    public $specialCharacterPasses;

    public function min($minimumLength){
        $this->minLength = $minimumLength;
        return $this;
    }

    public function max($maximumLength){
        $this->maxLength = $maximumLength;
        return $this;
    }

    public function letters(){
        $this->letters = true;
        return $this;
    }

    public function numbers(){
        $this->numericPasses = true;
        return $this;
    }
    public function symbols(){
        $this->specialCharacterPasses = true;
        return $this;
    }

    public function upperCase(){
        $this->uppercasePasses = true;
    }


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
        $result = (Str::length($value) >= ($this->minLength ?? self::DEFAULT_MIN_LENGTH));
        
        if(!empty($this->maxLength)) {
            $this->maxLength = (Str::length($value) >= $this->maxLength);
        }
        $result = $result && ($this->maxLength ?? true);
        

        if(!empty($this->uppercasePasses)) {
            $this->uppercasePasses = (Str::lower($value) !== $value);
        }
        $result = $result && ($this->uppercasePasses ?? true);


        if(!empty($this->numericPasses)) {
            $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));
        }
        $result = $result && ($this->numericPasses ?? true);


        if(!empty($this->specialCharacterPasses)) {
            $this->specialCharacterPasses = ((bool) preg_match('/[^A-Za-z0-9]/', $value));
        }
        $result = $result && ($this->specialCharacterPasses ?? true);

        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case ! $this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must contain at least one uppercase character.';

            case ! $this->numericPasses
                && $this->uppercasePasses
                && $this->specialCharacterPasses:
                return 'The :attribute must contain at least one number.';

            case ! $this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->numericPasses:
                return 'The :attribute must contain at least one special character.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must contain at least one uppercase character and one number.';

            case ! $this->uppercasePasses
                && ! $this->specialCharacterPasses
                && $this->numericPasses:
                return 'The :attribute must contain at least one uppercase character and one special character.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && ! $this->specialCharacterPasses:
                return 'The :attribute must contain at least one uppercase character, one number, and one special character.';

            default:
                return 'The :attribute must be at least'. $this->minLength ?? self::DEFAULT_MIN_LENGTH .' characters.';
        }
    }
}
