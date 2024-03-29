<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Driver extends Model
{
    use HasFactory, HasKey, SoftDeletes;

    protected $guarded = [];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function buses(): HasOne
    {
        return $this->hasOne(Bus::class);
    }
}
