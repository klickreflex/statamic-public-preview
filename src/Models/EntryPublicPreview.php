<?php

namespace Modrictin\StatamicPublicPreview\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class EntryPublicPreview extends Model
{
    use HasUuids;

    protected $table = 'statamic_public_preview_table';

    protected $casts = [
        'valid_until' => 'datetime',
    ];

    protected $fillable = [
        'valid_until',
        'entry_id',
    ];

    public function getConnectionName()
    {
        return config('statamic.statamic-public-preview.db_connection');
    }

    public function getTable(): string
    {
        return config('statamic.statamic-public-preview.table_name') ?? 'statamic_public_preview_table';
    }
}
