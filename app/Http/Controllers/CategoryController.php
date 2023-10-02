<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class CategoryController extends Controller
{
    public function index():JsonResponse
    {
        
            $Category = Category::all();
        
            return response()->json(['data' => $Category], 200);
        
    }

    public function store(CategoryRequest $request):JsonResponse
    {
        $Category=Category::create($request->all());

        return response()->json([
            'success'=>true,
            'data'=>$Category
        ], 201);
    }

    public function show ($id):JsonResponse
    {
        $Category = Category::find($id);

        return response()->json($Category, 200);
    }

    public function update(CategoryRequest $request, $id):JsonResponse
    {

        $Category=Category::find($id);
        $Category->Category=$request->Category;
        $Category->save();

        return response()->json([
            'success'=>true, 
            'data'=>$Category
        ]);

    }

    public function destroy($id):JsonResponse
    {
        Category::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }

}
