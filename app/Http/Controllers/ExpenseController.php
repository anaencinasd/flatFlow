<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Http\Requests\ExpenseRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExpenseController extends Controller
{
    public function index():JsonResponse
    {
        
            $expense = Expense::all();
        
            return response()->json(['data' => $expense], 200);
        
    }

    public function store(ExpenseRequest $request):JsonResponse
    {
        $expense=Expense::create($request->all());

        return response()->json([
            'success'=>true,
            'data'=>$expense
        ], 201);
    }

    public function show ($id):JsonResponse
    {
        $expense = Expense::find($id);

        return response()->json($expense, 200);
    }

    public function update(ExpenseRequest $request, $id):JsonResponse
    {

        $expense=Expense::find($id);
        $expense->id_user=$request->id_user;
        $expense->title=$request->title;
        $expense->total=$request->total;
        $expense->save();

        return response()->json([
            'success'=>true, 
            'data'=>$expense
        ]);

    }

    public function destroy($id):JsonResponse
    {
        Expense::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }
}
