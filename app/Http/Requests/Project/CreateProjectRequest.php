<?php

namespace App\Http\Requests\Project;

use App\Enums\ScreenshotsState;
use App\Models\Project;
use App\Http\Requests\CattrFormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateProjectRequest extends CattrFormRequest
{
    public function _authorize(): bool
    {
        return $this->user()->can('create', Project::class);
    }

    public function _rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'important' => 'sometimes|required|bool',
            'default_priority_id' => 'sometimes|integer|exists:priorities,id',
            'screenshots_state' => ['required', new Enum(ScreenshotsState::class)],
            'statuses' => 'sometimes|array',
            'statuses.*.id' => 'required|exists:statuses,id',
            'statuses.*.color' => 'sometimes|nullable|string|regex:/^#[a-f0-9]{6}$/i',
        ];
    }
}
