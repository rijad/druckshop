<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $paper_weight_id
 * @property integer $delivery_service_id
 * @property int $sheets_range_start
 * @property int $sheets_range_end
 * @property string $letters
 * @property boolean $status
 * @property string $created_at
 * @property string $modified_at
 * @property PsPaperWeight $psPaperWeight
 * @property PsDeliveryService $psDeliveryService
 */
class LettesOfSpine extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_letters_of_spine';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['paper_weight_id', 'delivery_service_id', 'sheets_range_start', 'sheets_range_end', 'letters', 'status', 'created_at', 'modified_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psPaperWeight()
    {
        return $this->belongsTo('App\PsPaperWeight', 'paper_weight_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psDeliveryService()
    {
        return $this->belongsTo('App\PsDeliveryService', 'delivery_service_id');
    }
}
