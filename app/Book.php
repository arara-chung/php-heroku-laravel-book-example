<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'description'
    ];

    // make book->published_at a Carbon instance
    //protected $date = ['published_at'];

    // scopeMethodname --- self-defined function used by instance of Model, e.g. Book::latest()->xxx
    /*
    public function scopePublished($query) {

        $query->where('published_at', '<=', Carbon::now());

    }
    */

    // setNameAttribute --- parse the value from html, using attribute name=
    /*
    public function setPublishedAtAttribute($date) {

        $this->attributes['published_at'] = Carbon::createFromFormate('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);

    }
    */

}
