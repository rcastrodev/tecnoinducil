<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanySlider;
use App\Http\Requests\UpdateCompanySlider;
use App\Http\Requests\UpdateCompanyInfoRequest;
use App\Http\Requests\UpdateCompanyRibbonRequest;

class CompanyController extends Controller
{
    
    public function content()
    {
        $section1 = Content::where('section_id', 3)->first();
        return view('administrator.company.content', compact('section1'));
    }
    

    public function storeSlider(StoreCompanySlider $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images','custom');
        
        Content::create($data);
        return back()->with('mensaje', 'Creado con exito');
    }

    public function updateSlider(UpdateCompanySlider $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images','custom');
        }        
        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }


    public function updateInfo(UpdateCompanyInfoRequest $request)
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
        return DataTables::of(Content::where('section_id', 4)->orderBy('order', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }

}
