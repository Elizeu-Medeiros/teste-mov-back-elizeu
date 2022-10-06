<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    private $brand;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /** 
     * Lista Marcas via API
     */
    public function list()
    {
        return $this->brand->paginate(10);
    }

    /** 
     * Lista um Marca via API
     */
    public function show($id)
    {
        $brand = $this->brand->find($id);

        if ($brand) {
            return response()->json([
                'status' => true,
                'message' => 'Marca encontrado!',
                'data' => $brand
            ], 202);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Marca não encontrado',
            ], 404);
        }
    }

    /** 
     * Cadastra Marca via API
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'image' => 'required|string',
                'image_2x' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401);
            }

            $this->brand->create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Marca cadastro com sucesso!!!',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /** 
     * Atualiza Marca via API
     */
    public function update($id, Request $request)
    {
        $brand = $this->brand->find($id);
        $brand->update($request->all());
        $brand->save();

        if ($brand) {
            return response()->json([
                'status' => true,
                'message' => 'Marca atualizado com sucesso!',
            ], 200);
        }
    }

    /** 
     * Deletar Marca via API
     */
    public function destroy($brand_id)
    {
        $brand = $this->brand->find($brand_id);
        if ($brand) {
            $brand->delete();

            return response()
                ->json([
                    'data' => $brand,
                    'message' => 'Marca foi removido com sucesso!',
                    "status" => true
                ], 200);
        } else {
            return response()
                ->json([
                    'data' => $brand,
                    'message' => 'Marca não encontrado',
                    "status" => false
                ], 404);
        }
    }
}
