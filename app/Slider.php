<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $image_path
 * @property boolean $is_active
 * @property boolean $is_slide
 * @property string $created_at
 * @property string $modified_at
 */
class Slider extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_slider';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['image_path', 'is_active', 'is_slide', 'created_at', 'updated_at', 'deleted_at'];

}
