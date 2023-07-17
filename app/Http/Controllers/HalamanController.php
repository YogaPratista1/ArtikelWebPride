<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class HalamanController extends Controller
{
   public function show ()
   {

 
     return view('halaman');
}
}
