<?php


namespace App\Http\Controllers;

use App\Models\PostoGrad;

class PostoGradController extends Controller
{
    public function index()
    {
        return PostoGrad::orderBy('hierarquia','ASC')->get();

    }

}
