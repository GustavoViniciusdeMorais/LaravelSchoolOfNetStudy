<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pages\Actions\GetPages;

class PagesController extends Controller
{
    
    public function index()
    {
        $action = new GetPages();
        $pages = $action->execute();
        return view('Page::index')->with(['pages' => $pages]);
    }
}
