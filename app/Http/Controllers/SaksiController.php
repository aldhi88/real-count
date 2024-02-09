<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaksiController extends Controller
{
    public function formHasil()
    {
        $data['page'] = 'hasil';
        $data['title'] = "Form Hasil Suara";
        return view('mods.saksi.index', compact('data'));
    }
}
