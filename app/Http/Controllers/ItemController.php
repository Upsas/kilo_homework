<?php

namespace App\Http\Controllers;

use App\Http\Repository\ItemsRepository;
use App\Http\Service\Validation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * @var ItemsRepository
     */
    private ItemsRepository $itemsRepo;
    /**
     * @var Validation
     */
    private Validation $validator;

    public function __construct(ItemsRepository $itemsRepo, Validation $validator)
    {
        $this->itemsRepo = $itemsRepo;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return \response($this->itemsRepo->returnAllItems());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $data = $this->validator->validateItems($request);
        $response = $this->itemsRepo->createItem($data);
        return \response($response['message'], $response['statusCode']);
    }

    /**
     * Display the specified resource.
     *
     * @param string $category
     * @return Response
     */
    public function show(string $category): Response
    {
        return \response($this->itemsRepo->findItemsByCategory($category));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $data = $this->validator->validateItems($request);
        $response = $this->itemsRepo->updateItem($id, $data);
        return \response($response['message'], $response['statusCode']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $response = $this->itemsRepo->deleteItem($id);
        return \response($response['message'], $response['statusCode']);
    }
}
