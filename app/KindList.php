<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $kind
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 */
class KindList extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_kind_list';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['kind', 'surname', 'name_english', 'name_german', 'status', 'created_at', 'modified_at'];

}
