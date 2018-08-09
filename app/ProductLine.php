<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    public $additional_attributes=['name'];

    /**
     * Create an accessor to substitute in for the `id`.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->productSubcategory->product_category_id}-{$this->productSubcategory->short_name}-{$this->print_method_id}";
    }

    /**
     * ProductSubcategory relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productSubcategory()
    {
        return $this->belongsTo(ProductSubcategory::class);
    }

    /**
     * PrintMethod relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function printMethod()
    {
        return $this->belongsTo(PrintMethod::class);
    }

    /**
     * CouponCode relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function couponCode()
    {
        return $this->belongsTo(CouponCode::class);
    }

    /**
     * ProductFeature relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productFeatures()
    {
        return $this->belongsToMany(ProductFeature::class)->withTimestamps();
    }

    /**
     * ProductNote relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productNotes()
    {
        return $this->belongsToMany(ProductNote::class)->withTimestamps();
    }

    /**
     * QuantityBreak relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quantityBreaks()
    {
        return $this->belongsToMany(QuantityBreak::class)
            ->withPivot(
                'additional_color_charge',
                'second_side_charge',
                'process_charge',
                'bleed_charge',
                'white_ink_charge',
                'hotstamp_charge'
            )
            ->withTimestamps();
    }
}
