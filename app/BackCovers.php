<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $back_cover
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 */
class BackCovers extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_back_cover';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
 
    /**
     * @var array
     */
    protected $fillable = ['back_cover', 'surname', 'name_english', 'name_german', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
        return $this->belongsToMany('App\Product', 'ps_product_back_cover','back_cover_id','product_id');
    }

}
