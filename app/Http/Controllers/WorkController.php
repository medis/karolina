<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    private $limit = 10;

    /**
     * WorkController constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $group = (int) $this->request->query('group');
        $images = Work::query()->skip($this->limit * $group)->take($this->limit)->get();
        return $images;
    }

    public function show(Work $work)
    {
        return view('work', compact('work'));
    }
}
