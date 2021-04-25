<?php

declare(strict_types=1);

namespace App\Http\Repository;

use App\Models\Item;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class ItemsRepository
{

    public function findItemsByCategory(string $category)
    {
        return Item::whereCategory($category)->get();
    }

    public function returnAllItems(): Collection
    {

        return Item::all();
    }

    public function createItem(array $data): array
    {
        try {
            return $this->response(Item::query()->create($data), 201);
        } catch (QueryException $e) {
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

    public function updateItem(int $id, array $data): array
    {
        try {
            $item = Item::query()->findOrFail($id);
            $item->update($data);
            return $this->response(Item::query()->find($id), 200);
        } catch (Exception $e) {
            return $this->response('Invalid request', 400);
        }
    }


    public function deleteItem(int $id): array
    {
        try {
            Item::query()->findOrFail($id)->delete();
            return $this->response('', 204);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 400);
        }
    }
}
