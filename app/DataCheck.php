<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $check_list
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 */
class DataCheck extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_data_check';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['check_list', 'surname', 'name_english', 'name_german', 'status', 
    'created_at', 'updated_at', 'deleted_at'];

}
