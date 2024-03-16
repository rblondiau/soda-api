<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soda extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'carbonated', 'caffeinated', 'brand_id'];
    /**
     * Get the brand that owns the soda.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
