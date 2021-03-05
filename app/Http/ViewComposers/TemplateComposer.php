<?php

namespace App\Http\ViewComposers;

use App\Models\System;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class TemplateComposer
{
    /**
     * TemplateComposer constructor
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $have_politice = auth()->user()->hasAnyRole(['teacher', 'student']) &&  auth()->user()->accept_policy == 0;
        $policity = System::all()->first();
        
        $view->with('policity', $policity)->with('have_politice', $have_politice);
    }
}