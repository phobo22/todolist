<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "title",
        "description",
        "category",
        "deadline",
        "status",
    ];

    protected function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected function scopeCategory(Builder $query, array $categories) : void {
        $query->whereIn('category', $categories);
    }

    protected function scopeStatus(Builder $query, array $status) {
        $query->whereIn('status', $status);
    }

    protected function scopeTitle(Builder $query, string $title) : void {
        $query->where('title', 'like', '%' . $title . '%');
    }
}
