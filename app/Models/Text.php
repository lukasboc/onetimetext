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

    public function create(array $input)
    {
        return new Text([
            'key' => $input['key'],
            'user_id' => $input['user_id'],
            'value' => $input['value']
        ]);
    }
}

