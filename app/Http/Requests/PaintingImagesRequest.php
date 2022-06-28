<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed $filename
 * @property mixed $painting_id
 * @property mixed $id
 */
class PaintingImagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "filename" => ["image", "nullable", "max:1999", "mimes:jpeg,png,jpg,gif,svg"],
            "painting_id" => ["integer", "nullable"]
        ];
    }
}
