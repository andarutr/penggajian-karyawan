<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUser extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nik' => 'required|unique:users|numeric',
            'nama_lengkap' => 'required|alpha',
            'jenis_kelamin' => 'required|alpha',
            'status' => 'required|alpha',
            'agama' => 'required|alpha',
            'kewarganegaraan' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'divisi_id' => 'required|numeric',
            'jabatan_id' => 'required|numeric',
            'role_id' => 'required|numeric'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'validations'    => $validator->errors()
        ], 422));
    }
}
