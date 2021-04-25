<?php

declare(strict_types=1);

namespace App\Http\Service;

use Illuminate\Http\Request;

class Validation
{
    /**
     * @param Request $request
     * @return array
     */
    public function validateItems(Request $request): array
    {
        return $request->validate([
            'category' => 'same:category',
            'name' => 'ends_with:_item',
            'value' => 'integer|gt:9|max:100',
            'quality' => 'integer|min:-10|max:50'
        ]);
    }

    public function validateCategory(Request $request): array
    {
        return $request->validate([
            'name' => 'string|min:5',
        ]);
    }
}
