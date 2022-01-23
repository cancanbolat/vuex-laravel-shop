<?php

namespace App\Validations;

use App\Validations\AbstractValidator;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ProductCreateValidator extends AbstractValidator
{
    protected $data;

    public function __construct($data)
    {
        $this->fields = [
            'name' => 'required',
            'description' => 'required',
            'photo_url' => 'required',
            'price' => 'required'
        ];
        $this->data = $data;
    }

    public function validate()
    {
        $validator = Validator::make($this->data, $this->fields);

        if (!$validator->passes()) {

            throw new InvalidArgumentException($validator->errors()->first());
        }
        return false;
    }
}
