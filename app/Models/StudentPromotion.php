<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class StudentPromotion extends Model
{
    use SoftDeletes, AsSource, Filterable, Attachable;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(StudentSection::class);
    }
}
