<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

class FileController extends Controller
{
    public function __construct()
     {
      
     }
    
    /**
     * download file in upload folder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  File $file
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, File $file)
    {        
        $this->authorize("download", $file);
        
        return Storage::download($file->path, $file->original_name);
    }
}
