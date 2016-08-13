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
class ContentPageRoles extends Model
{
    protected $table = 'content_page_roles';
    protected $fillable = [
        'id',
        'content_id',
        'role_id'
    ];
    protected $primaryKey = 'id';
}