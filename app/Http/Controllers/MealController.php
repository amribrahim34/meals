<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function addMeal(StoreMealRequest $request)
    {
        $v = $request->validated();
        $meal = Meal::create($v);
        $meal->ingredients()->sync($v['ingredients']);
        $meal->load('ingredients');
        return response(['data'=>$meal],201);
    }

    public function getMeals(Request $request)
    {
        $ids = $request->ingredients ?? [];
        $meals = Meal::whereHas('ingredients',function($q)use($ids){
            $q->whereIn('ingredients.id',$ids);
        })->get();
        return response(['data'=>$meals]);
    }
}
