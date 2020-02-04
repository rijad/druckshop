<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $code
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property string $to_date
 * @property string $from_date
 * @property float $by_price
 * @property float $by_percent
 * @property boolean $needs_code
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 */
class Discount extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_discount';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['code', 'surname', 'name_english', 'name_german', 'to_date', 'from_date', 'by_price', 'by_percent', 'needs_code', 'status', 'created_at', 'modified_at'];

}
