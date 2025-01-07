<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|min:4|max:10',
            'password' => 'required|min:3'
        ];
    }
}
