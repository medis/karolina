<?php

namespace App\Http\Controllers;

use App\Page;
use App\Work;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * PageController constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function home()
    {
        return view('home');
    }

    public function about()
    {
        $content = Page::where('page', 'about')->first();
        $data = [
            'title' => 'About',
            'content' => $content['content']
        ];
        return view('page', $data);
    }
}
