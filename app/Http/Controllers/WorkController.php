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
        $category = (string) $this->request->query('cat');
        $query = Work::query();
        switch ($category) {
            case 'garments':
                $query->whereIn('type', ['accessories', 'dresses', 'skirts', 'trousers', 'tops', 'jackets']);
                break;
            case 'lookbooks':
                $query->whereIn('type', ['seasons', 'studio_images']);
                break;
            case 'drawings':
                $query->whereIn('type', ['illustrations', 'posters']);
                break;
            default:
                if (! empty($category)) {
                    $query->where('type', '=', $category);
                }
        }
        $images = $query->orderBy('order', 'asc')->skip($this->limit * $group)->take($this->limit)->get();
        return $images;
    }

    public function show(Work $work)
    {
        $imagesArr = [$work->main_image];
        if (! empty($work->images)) {
            foreach (json_decode($work->images) as $image) {
                $imagesArr[] = $image;
            }
        }
        $imageChunks = array_chunk($imagesArr, 2);
        return view('work', compact('work', 'imageChunks'));
    }
}
