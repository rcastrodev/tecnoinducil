<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HomeStoreSliderRequest;
use App\Http\Requests\HomeSliderUpdateRequest;
use App\Http\Requests\UpdateHomeGenericSectionRequest;

class HomeController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'home')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $section2   = Content::where('section_id', 2)->first();
        return view('administrator.home.content', compact('section2'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function storeHomeGenericSection(HomeStoreSliderRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/home', 'custom');
        $content = Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function updateHomeGenericSection(UpdateHomeGenericSectionRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','custom');
        }        
        $element->update($data);
        return response()->json([], 200);
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','custom');
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

        return DataTables::of(Content::where('section_id', 1)->orderBy('order', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}



