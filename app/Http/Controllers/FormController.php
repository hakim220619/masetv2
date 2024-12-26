<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function loadForm(Request $request)
    {
        $type = $request->input('type');
        $view = '';
        switch ($type) {
            case 'rumah_sederhana':
                $view = 'content.form.form_rumah_sederhana';
                break;
            case 'rumah_menengah':
                $view = 'content.form.form_rumah_menengah';
                break;
                // add other cases as needed
        }
        return view($view);
    }
}
