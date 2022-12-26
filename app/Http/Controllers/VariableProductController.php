<?php

namespace App\Http\Controllers;

use App\VariableProduct;
use Illuminate\Http\Request;

class VariableProductController extends Controller
{
    public function store(Request $request)
    {
        $pv = VariableProduct::create($request->all());
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $pv = VariableProduct::find($request->input('id'));
        $pv->update($request->all());
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        VariableProduct::find($id)->delete();
    }
}

