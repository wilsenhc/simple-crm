<?php

namespace Tepuilabs\SimpleCrm\Models;

use Tepuilabs\SimpleCrm\Models\Lead;
use Tepuilabs\SimpleCrm\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Tepuilabs\SimpleCrm\Models\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function notes(): MorphMany
    {
        return $this->morphMany(Note::class, 'commentable');
    }
}
