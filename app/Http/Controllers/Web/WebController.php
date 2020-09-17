<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Library\Assistant;
use App\Models\Courses;
use Illuminate\Http\Request;

class WebController extends Controller
{
    use Assistant;

    public function index ()
    {
        return view('welcome');
    }

    public function create ()
    {

        return view('editor', [
            'courses' => $this->getCourses()
        ]);
    }

    public function write (Request $request)
    {
        $page = $this->getPage($request->page);
        $page->content = $request->markdown;
        $page->save();
    }

    public function manage ()
    {
        return view('create');
    }
}
