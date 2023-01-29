<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected function createdFormat(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('Y-m-d'),
        );
    }
    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "1000$value",
        );
    }
    public static function decode($id)
    {
        return substr($id, 4);
    }
}
