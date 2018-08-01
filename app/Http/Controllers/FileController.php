<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct(ProjectRepository $projects)
     {
         $this->middleware();
      
     }
    
    //
    public function donwload(File $file)
    {
        
    }
}
