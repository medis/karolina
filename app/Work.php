<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;

class Work extends Model
{
    use Resizable;

    protected $guarded = [];

    protected $appends = ['href', 'medium'];

    public function getMediumAttribute()
    {
        return Voyager::image($this->thumbnail('medium', 'main_image'));
    }

    public function getHrefAttribute()
    {
        return route('work', $this->id);
    }
}
