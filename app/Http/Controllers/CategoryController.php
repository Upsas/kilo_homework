<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoriesRepository;
use App\Http\Service\Validation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    private CategoriesRepository $categoriesRepo;
    /**
     * @var Validation
     */
    private Validation $validation;

    public function __construct(Validation $validation, CategoriesRepository $categoriesRepo)
    {
        $this->validation = $validation;
        $this->categoriesRepo = $categoriesRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $data = $this->validation->validateCategory($request);
        $response = $this->categoriesRepo->addCategory($data);
        return \response($response['message'], $response['statusCode']);
    }

    public function destroy(string $category): Response
    {
        $response = $this->categoriesRepo->deleteCategory($category);
        return \response($response['message'], $response['statusCode']);
    }
}
