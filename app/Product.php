<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $short_description
 * @property string $description
 * @property string $created_at
 * @property string $modified_at
 * @property PsOrder[] $psOrders
 * @property PsPayment[] $psPayments
 * @property PsProductImage[] $psProductImages
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_product';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'short_description', 'description', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psOrders()
    {
        return $this->hasMany('App\PsOrder', 'product_id');
    }
 
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psPayments()
    {
        return $this->hasMany('App\PsPayment', 'product_id');
    }

    /** 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psProductImages()
    {
        return $this->hasMany('App\PsProductImage', 'product_id');
    }
 

    public function psPageFormat()
    {
        return $this->belongsToMany('App\PageFormat','ps_product_page_format','product_id','paper_format');
    }

    public function psCoverColor() 
    {
        return $this->belongsToMany('App\CoverColor','ps_product_cover_color','product_id','color_id');
    }

    public function psCoverSheet()
    {
        return $this->belongsToMany('App\CoverSheet','ps_product_cover_sheet','product_id','cover_sheet_id');
    }

    public function psBackCover()
    {
        return $this->belongsToMany('App\BackCovers','ps_product_back_cover','product_id','back_cover_id');
    }
 
    public function psProductAttribute()
    {
        return $this->belongsToMany('App\ProductAttributes','ps_product_attribute_realationship','product_id','attribute_id');
    }
} 
  