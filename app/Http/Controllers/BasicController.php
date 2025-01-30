<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function basicForm(Request $request)
    {

        return view('admin.form.basic-form');
    }
}
