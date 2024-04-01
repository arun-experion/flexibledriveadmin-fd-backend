<?php

namespace App;
use Storage;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $appends = ['image_url'];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     */
    protected $fillable = ['product_id', 'image', 'created_at', 'updated_at'];    
     
    public function getImageUrlAttribute() {

        // return  Storage::disk('public')->url('products/') . $this->image;
        // return  Storage::url('products/'. $this->image) ;
        // Storage::url('file.jpg');
        //return url('../storage/app/public/products/'). "/".$this->image;
        return url('../public/storage/products/'). "/".$this->image;

    }
}
