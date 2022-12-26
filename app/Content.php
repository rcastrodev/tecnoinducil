<?php

namespace App;

use App\Section;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['section_id', 'order', 'image', 'image1', 'image2', 'content_1', 'content_2', 'content_3', 'content_4'];

    public function section()
    {
        return $this->belongsTo (Section::class);
    }
}
