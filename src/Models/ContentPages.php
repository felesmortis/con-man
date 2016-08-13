<?php

namespace Seat\ConMan\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ContentSettings short summary.
 *
 * ContentSettings description.
 *
 * @version 1.0
 * @author music
 */
class ContentPages extends Model
{
    protected $table = 'content_pages';
    protected $fillable = [
        'id',
        'content',
        'createdby'
    ];
    protected $primaryKey = 'id';
}