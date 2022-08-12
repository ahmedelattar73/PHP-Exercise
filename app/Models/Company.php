<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @method static Builder insert(array $values)
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol'
    ];
}
