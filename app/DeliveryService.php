<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $delivery_service
 * @property string $surname
 * @property string $name_english
 * @property string $name_german
 * @property boolean $status
 * @property float $weight_per_sheet
 * @property int $min_sheets_for_spine
 * @property string $created_at
 * @property string $modified_at
 * @property PsLettersOfSpine[] $psLettersOfSpines
 */
class DeliveryService extends Model
{
    /**  
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_delivery_service';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['delivery_service', 'surname', 'name_english', 'name_german', 
    'status', 'weight_per_sheet', 'min_sheets_for_spine', 'shipment_tracking_link', 'active_status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psLettersOfSpines()
    {
        return $this->hasMany('App\PsLettersOfSpine', 'delivery_service_id');
    }
}
