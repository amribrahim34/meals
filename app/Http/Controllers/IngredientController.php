<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;

class IngredientController extends Controller
{
   public function addIngredient (StoreIngredientRequest $request )
   {
        $v=$request->validated();
        $ingredient = Ingredient::create($v);
        return response(['data'=>$ingredient],201);
   }

   public function getIngredients()
   {
        $ingredients = Ingredient::get();
        return response(['data' =>$ingredients]);
   }
}
