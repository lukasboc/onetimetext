<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Text extends Model
{
    use HasFactory;

    protected $table = "texts";

    protected $casts = [
        'notify_on_read' => 'boolean',
        'expires_at'     => 'datetime',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function create(array $input)
    {
        return new Text([
            'key' => $input['key'],
            'user_id' => $input['user_id'],
            'value' => $input['value']
        ]);
    }
}

