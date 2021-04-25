<?php

namespace App\Http\Repository;

use App\Models\Categorie;
use Illuminate\Database\QueryException;

class CategoriesRepository
{
    public function addCategory(array $data): array
    {
        try {
            return $this->response(Categorie::query()->create($data), 201);
        } catch (QueryException $e) {
            return $this->response('Category duplicate', 400);
        }
    }

    public function deleteCategory(string $category): array
    {
        try {
            Categorie::whereName($category)->firstOrFail()->delete();
            return $this->response('', 204);
        } catch (\Exception $e) {
            return $this->response('Wrong category', 400);
        }
    }

    private function response($content, int $statusCode): array
    {
        return [
            'message' => $content,
            'statusCode' => $statusCode
        ];
    }
}
