<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title_english
 * @property string $title_german
 * @property string $text_english
 * @property string $text_german
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 */
class FrequentlyAskedQuestion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_frequently_asked_question';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title_english', 'title_german', 'text_english', 'text_german', 
    'status', 'created_at', 'updated_at', 'deleted_at'];

}
