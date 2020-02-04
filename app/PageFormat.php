<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $page_format
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property boolean $can_add_din_A2
 * @property boolean $can_add_din_A3
 * @property boolean $status
 * @property int $max_pages_A2
 * @property int $max_pages_A3
 * @property string $created_at
 * @property string $modified_at
 */
class PageFormat extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_page_format';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['page_format', 'surname', 'name_english', 'name_german', 'can_add_din_A2', 'can_add_din_A3', 'status', 'max_pages_A2', 'max_pages_A3', 'created_at', 'modified_at'];

}
