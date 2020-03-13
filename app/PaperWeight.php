<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $paper_weight
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
class PaperWeight extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_paper_weight';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['paper_weight', 'surname', 'name_english', 'name_german', 'status', 
    'weight_per_sheet', 'min_sheets_for_spine', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psLettersOfSpines() 
    {
        return $this->hasMany('App\PsLettersOfSpine', 'paper_weight_id');
    }

    public function psPageOptions()
    {
        return $this->belongsToMany('App\PageOptions', 'ps_page_options_paper_weight','paper_weight_id','page_option_id');
    }
}
