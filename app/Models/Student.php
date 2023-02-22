<?php

namespace App\Models;

use App\Enums\StudentStatusEnum;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'year',
        'gender',
        'status',
        'course_id',
        'avatar'
    ];

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
            get: fn ($value) => "1000$value",
            set: fn ($value) => $value,
        );
    }
    protected function courseId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "1000$value",
            set: fn ($value) => $value
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
    protected function createdFormat(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('Y-m-d'),
        );
    }
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => StudentStatusEnum::getNameStatus($value),
        );
    }
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value
        );
    }

    public static function resizeAvatar($file, $id)
    {
        $original_image = $file;

        // Specify the desired width and height
        $width = 60;
        $height = 60;

        // Resize the image
        $resized_image = Image::make($original_image)->resize($width, $height);
        // Save the resized image to storage
        $file_path = "{$id}.{$original_image->extension()}";
        Storage::put('public/imgs/' . $file_path, (string) $resized_image->encode());

        return $file_path;
    }

    public static function decode($id)
    {
        return substr($id, 4);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
