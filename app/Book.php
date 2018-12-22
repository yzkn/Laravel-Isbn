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
        'onix__RecordReference',
        'onix__ProductIdentifier__IDValue',
        'summary__cover',
        'summary__title',
        'onix__DescriptiveDetail__TitleDetail__TitleText',
        'summary__author',
        'summary__publisher',
        'summary__pubdate',
        'summary__series',
        'summary__volume',
        'userid',
    ];
}
