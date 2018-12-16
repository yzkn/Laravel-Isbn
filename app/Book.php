<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'summary__isbn',
        'summary__cover',
        'summary__title',
        'summary__author',
        'summary__publisher',
        'summary__pubdate',
        'userid',
    ];
}
