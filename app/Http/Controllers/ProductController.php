<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $colors     = Color::all();
        $products   = Product::orderBy('order', 'ASC')->get();
        return view('administrator.product.create', compact('colors', 'products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/products', 'custom');

        if($request->hasFile('extra'))
            $data['extra'] = $request->file('extra')->store('images/datasheet', 'custom');

        $data['outstanding'] = $request->has('outstanding') ? 1 : 0;
        $product = Product::create($data);        
        
        if($request->input('colors')){
            if(in_array("-1", $request->input('colors'))){
                $product->colors()->attach(Color::pluck('id')->toarray());
            }else{
                $product->colors()->attach($request->input('colors'));
            }
        }
            
        if($request->input('products'))
            $product->relatedProducts()->attach($request->input('products'));
        
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $colors     = Color::all();
        $product    = Product::findOrFail($id);
        $products   = Product::where('id', '<>', $id)->orderBy('order', 'ASC')->get();
        return view('administrator.product.edit', compact('product', 'colors', 'products'));
    }

    public function update(ProductRequest $request)
    {        
        $data = $request->all();
        $product = Product::find($request->input('id'));

        if($request->hasFile('image')){
            if (Storage::disk('custom')->exists($product->image)) {
                Storage::disk('custom')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('images/products', 'custom');
        }

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra)) {
                Storage::disk('custom')->delete($product->extra);
            }
            $data['extra'] = $request->file('extra')->store('images/datasheet', 'custom');
        }

        $data['outstanding'] = $request->has('outstanding') ? 1 : 0;
        $product->update($data);
        $colorsProduct = $product->colors;
        $relatedProducts = $product->relatedProducts;
        
        if($request->input('colors')){
            /** destroy colors */
            if(in_array("-1", $request->input('colors'))){
                $product->colors()->detach();
                $product->colors()->attach(Color::pluck('id')->toarray());
            }else{
                $product->colors()->wherePivotNotIn('color_id', $request->input('colors'))->detach();

                /** update color */
                foreach ($request->input('colors') as $colorID) {
                    if(! in_array($colorID, $colorsProduct->pluck('id')->toArray()))
                        $product->colors()->attach($colorID);
                }
            }
        }else{
            $product->colors()->detach();
        }

        if($request->input('products')){
            $product->relatedProducts()->wherePivotNotIn('product_id_following', $request->input('products'))->detach();
            foreach ($request->input('products') as $productID) {
                if(! in_array($productID, $relatedProducts->pluck('id')->toArray()))
                    $product->relatedProducts()->attach($productID);
            }
        }else{
            $product->relatedProducts()->detach();
        }
            
        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        $element = Product::find($id);
        if (Storage::disk('custom')->exists($element->image)) {
            Storage::disk('custom')->delete($element->image);
        }

        $element->delete();

        return response()->json([], 200);
    }

    public function Imagedestroy($id){
        $product = Product::find($id);
        
        if(Storage::disk('custom')->exists($product->image))
            Storage::disk('custom')->delete($product->image);

        $product->image = null;
        $product->save();

        return response()->json([], 200);
    }

    public function getColor($id)
    {
        $product = Product::find($id);

        return response()->json([
            'colors' => $product->colors
        ]);

    }

    public function getList()
    {
        return DataTables::of(Product::orderBy('order', 'ASC'))
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }

    
    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        
        if (Storage::disk('custom')->exists($producto->extra)) {
            return Response::download($producto->extra);  
        }else{
            return back();
        }
        
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->extra))
            Storage::disk('public')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }
}
