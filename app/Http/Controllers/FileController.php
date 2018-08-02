<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

class FileController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
      
     }
    
    //
    public function download(File $file)
    {
        return Storage::download($file->path, $file->original_name);
    }
}
