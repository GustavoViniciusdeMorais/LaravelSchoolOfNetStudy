<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description'];
    protected $appends = ['short_description'];
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        // static::addGlobalScope('isDeleted', function(Builder $builder){
        //     $builder->where('deleted_at', '<>', null);
        // });
    }

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    /**
     * Virtual short description attribute
     * @return string
     */
    public function getShortDescriptionAttribute()
    {
        if (isset($this->attributes['description'])) {
            if (strlen($this->attributes['description']) > 10) {
                return mb_substr($this->attributes['description'], 0, 10) . '...';
            }
            return $this->attributes['description'];
        }
    }
}
