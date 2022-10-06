<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    private $car;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    /**
     * Display a listing of the cars
     *
     * @param  \App\Models\car  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cars = $this->car->paginate(10);

        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /** 
     * Lista Carros via API
     */
    public function list()
    {
        return $this->car->paginate(10);
    }

    /** 
     * Lista um Carro via API
     */
    public function show($id)
    {
        $car = $this->car->find($id);

        if ($car) {
            return response()->json([
                'status' => true,
                'message' => 'Carro encontrado!',
                'data' => $car
            ], 202);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Carro não encontrado',
            ], 404);
        }
    }

    /** 
     * Cadastra Carro via API
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'plan' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401);
            }

            $this->car->create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Carro cadastro com sucesso!!!',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /** 
     * Atualiza Carro via API
     */
    public function update($id, Request $request)
    {
        $car = $this->car->find($id);
        $car->update($request->all());
        $car->save();

        if ($car) {
            return response()->json([
                'status' => true,
                'message' => 'Carro atualizado com sucesso!',
            ], 200);
        }
    }

    /** 
     * Deletar Carro via API
     */
    public function destroy($car_id)
    {
        $car = $this->car->find($car_id);
        if ($car) {
            $car->delete();

            return response()
                ->json([
                    'data' => $car,
                    'message' => 'Carro foi removido com sucesso!',
                    "status" => true
                ], 200);
        } else {
            return response()
                ->json([
                    'data' => $car,
                    'message' => 'Carro não encontrado',
                    "status" => false
                ], 404);
        }
    }
}
