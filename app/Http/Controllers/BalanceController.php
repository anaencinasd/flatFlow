<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\BalanceRequest;

class BalanceController extends Controller
{
    public function index():JsonResponse
    {
        
            $balance = Balance::all();
        
            return response()->json(['data' => $balance], 200);
        
    }

    public function store(BalanceRequest $request):JsonResponse
    {
        $balance=Balance::create($request->all());

        return response()->json([
            'success'=>true,
            'data'=>$balance
        ], 201);
    }

    public function show ($id):JsonResponse
    {
        $balance = Balance::find($id);

        return response()->json($balance, 200);
    }

    public function update(BalanceRequest $request, $id):JsonResponse
    {

        $balance=Balance::find($id);
        $balance->id_user=$request->id_user;
        $balance->id_expense=$request->id_expense;
        $balance->totalOwed=$request->totalOwed;
        $balance->save();

        return response()->json([
            'success'=>true, 
            'data'=>$balance
        ]);

    }

    public function destroy($id):JsonResponse
    {
        Balance::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }
}
