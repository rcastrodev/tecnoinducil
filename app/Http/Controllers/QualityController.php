<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QualityController extends Controller
{
    public function content()
    {
        $section1 = Content::where('section_id', 5)->first();
        return view('administrator.quality.content', compact('section1'));
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();   
        if ($request->hasFile('image')) {
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);

            $data['image'] = $request->file('image')->store('images/company','custom');
        } 
        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }
}
