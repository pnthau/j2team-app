<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = ['firstname', 'lastname', 'year', 'gender'];
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->firstname} {$this->lastname}",
            //set: fn ($value) => strtolower($value),
        );
    }
    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "100$value",
            set: fn ($value) => $value,
        );
    }
    protected function age(): Attribute
    {
        return Attribute::make(
            // get: fn ($value) => (new DateTime())->diff(new DateTime($this->year))->y,
            get: function () {
                $now = new DateTime();
                $date = new DateTime($this->year);
                return $now->diff($date)->y;
            }
        );
    }
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'Male' : 'Female',
            set: fn ($value) => $value === 'Male' ? 1 : 0,
        );
    }
}
