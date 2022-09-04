<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
    protected $appends = ['short_description'];

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
