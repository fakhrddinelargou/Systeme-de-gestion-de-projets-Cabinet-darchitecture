<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string|min:5|max:100',
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:5120', 
            'email' => 'required|email|max:250|unique:users,email',
            'password' => ['required','confirmed',Password::min(8)->letters()->mixedCase() ->numbers()->symbols()],
        ];
    }
}
