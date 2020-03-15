<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 */
class ImageController extends Controller
{

    public funtion showUploadForm()
    {
      return view('upload');
    }

}
