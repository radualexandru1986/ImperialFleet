<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Armament extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $table = 'armaments';

    /**
     * @var string[]
     */
    protected $fillable = ['title', 'qty'];

    #Relations

    /**
     * Returns all the ships that have this type of ammunition.
     *
     * @return HasMany
     */
    public function ships(): HasMany
    {
        return $this->hasMany(Ship::class, 'armament_id');
    }

}
