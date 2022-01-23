<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

abstract class AbstractValidator
{
    protected $fields = [];
    
    /**
     * Validate
     *
     * @return bool
     */
    public function Validate()
    {
        $validator = Validator::make($request()->all(), $this->fields);

        if ($validator->passes()) {
            return $validator->errors()->all();
        }

        return false;
    }
}
