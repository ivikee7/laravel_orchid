<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class StudentSection extends Model
{
    use SoftDeletes, AsSource, Filterable, Attachable;

    public function promotions(): HasMany
    {
        return $this->hasMany(StudentPromotion::class);
    }
}
