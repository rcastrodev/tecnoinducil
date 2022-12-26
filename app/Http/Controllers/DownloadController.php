<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function content()
    {
        return view('administrator.download.content');
    }
    

    public function storeSlider(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/download','custom');
        }
        
        Content::create($data);
        return back()->with('mensaje', 'Creado con exito');
    }

    public function updateSlider(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/download','custom');
        }        
        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }


    public function destroyHomeGenericSection($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);
        $element->delete();
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        return DataTables::of(Content::where('section_id', 6)->orderBy('order', 'ASC'))
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2'])
        ->make(true);
    }
}
