<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $table = 'statuses';

    /**
     * @var string[]
     */
    protected $fillable =['name'];

    #Relations

    /**
     * Returns all the models that have this status
     *
     * @return HasMany
     */
    protected function ship(): HasMany
    {
        return $this->hasMany(Ship::class, 'status_id');
    }
}
