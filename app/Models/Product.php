<?php

namespace App\Models;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;
class Product extends Model
{
    use Rateable;
    // use HasFactory;
    /**
     * @var string
     */
    protected $table = 'products';

    protected $primaryKey = 'product_id';
    /**
     * @var array
     */
    protected $fillable = [
        'brand_id', 'product_code', 'product_sku', 'product_name', 'product_slug', 'product_description', 'product_quantity',
        'product_weight', 'product_price', 'product_sale_price', 'product_status', 'product_featured',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['product_name'] = $value;
        $this->attributes['product_slug'] = Str::slug($value);
    }


    public function cropPlantAnimals()
    {
        return $this->hasMany(CropPlantAnimal::class,'product_id','product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_categories','product_id','category_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'product_coupons', 'product_id', 'coupon_id');
    }

    public function experience_farm()
    {
        return $this->hasOne(ExperienceFarm::class,'product_id','product_id');
    }
}
