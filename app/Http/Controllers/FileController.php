<?php

namespace App\Http\Controllers;

use Str;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function storeFile(Request $request)
    {   
        $files = new File();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/banner/" . $image))
            {
            $image = Str::random(5) . "_" . $name_image;
            }
        $file->move("img/banner", $image);
        $files->name = $image;
        }
        $files->product_id  = $request->product_id;
        $files->save();

        return response()->json($files->product,200);
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);
        if (!empty($file->name))
        {
            unlink("img/banner/" . $file->name);
        }
        $file->delete();

        return response()->json($file->product,200);

    }

    public function drop($id)
    {
        $files = File::where('product_id',$id)->get();
        foreach($files as $file)
        {
            if (!empty($file->name))
            {
                unlink("img/banner/" . $file->name);
            }
            $file->delete();
        }
        return response()->json($file->product,200);

    }


  
}
