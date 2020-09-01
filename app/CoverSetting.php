<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $color
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 */
class CoverSetting extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_cover_settings';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['cover_settings', 'surname', 'name_english', 'name_german', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
        return $this->belongsToMany('App\Product', 'ps_product_cover_color','color_id','product_id');
    }

}
