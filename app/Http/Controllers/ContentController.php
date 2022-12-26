<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public function content()
    {
        return null;
    }

    public function findContent($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function descargarArchivo($id, $reg)
    {
        $content = Content::findOrFail($id);  
        if (Storage::disk('custom')->exists($content->$reg)) {
            return Response::download($content->$reg);  
        }else{
            return back();  
        }
        
    }
}
