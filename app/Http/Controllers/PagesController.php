<?php

namespace App\Http\Controllers;

use SEO;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription('');
        $section1s = Content::where('section_id', 1)->orderBy('order', 'ASC')->get();
        $section2 = Content::where('section_id', 2)->first();
        $products = Product::where('outstanding', 1)->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('section1s', 'section2', 'products'));
    }

    public function empresa()
    {
        SEO::setTitle('Empresa');
        SEO::setDescription('');
        $section1 = Content::where('section_id', 3)->first();
        $section2s= Content::where('section_id', 4)->orderBy('order', 'ASC')->get();

        return view('paginas.empresa', compact('section1', 'section2s'));
    }

    public function productos(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $products = Product::where('name', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%")
                ->orderBy('order', 'ASC')
                ->get();
        } else {
            $products = Product::orderBy('order', 'ASC')->get();
        }
        
        SEO::setTitle("Productos");
        SEO::setDescription('');     
        return view('paginas.productos', compact('products'));
    }

    public function producto(Product $product)
    {
        if ($product) {
            SEO::setTitle($product->name);
            SEO::setDescription('');
        }

        $products = Product::where('id', '<>', $product->id)->orderBy('order', 'ASC')->get();
        return view('paginas.producto', compact('products', 'product'));
    }

    public function descargas()
    {
        SEO::setTitle('descargas');
        SEO::setDescription('');
        $section1s = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        return view('paginas.descargas', compact('section1s'));
    }

    public function calidad()
    {
        SEO::setTitle('calidad');
        SEO::setDescription('');
        $section1 = Content::where('section_id', 5)->first();
        return view('paginas.calidad', compact('section1'));
    }

    public function solicitudPresupuesto()
    {
        SEO::setTitle("presupuesto");
        SEO::setDescription('');
        return view('paginas.solicitud-de-presupuesto');
    }

    public function contacto()
    {
        SEO::setTitle("Contacto");
        SEO::setDescription('');       
        return view('paginas.contacto');
    }
}
