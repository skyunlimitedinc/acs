<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcsPrice extends Model
{
    /**
     * Product relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * ProductLineQuantityBreak relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productLineQuantityBreak()
    {
        return $this->belongsTo(ProductLineQuantityBreak::class);
    }
}