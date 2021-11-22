<?php

namespace App\Http\Requests\TimeInterval;

use App\Http\Requests\AuthorizesAfterValidation;
use App\Http\Requests\FormRequest;
use App\Models\TimeInterval;

class PutScreenshotRequest extends FormRequest
{
    use AuthorizesAfterValidation;

    /**
     * Determine if user authorized to make this request.
     *
     * @return bool
     */
    public function authorizeValidated(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'screenshot' => 'required|image',
        ];
    }
}
