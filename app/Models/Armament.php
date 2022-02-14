<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    /**
     * @var string[]
     */
    protected $hidden = ['id','pivot', 'created_at', 'updated_at'];


    #Relations

    /**
     * Returns all the ships that have this type of ammunition.
     *
     * @return BelongsToMany
     */
    public function ships(): BelongsToMany
    {
        return $this->belongsToMany(Ship::class, 'ships_armaments','armament_id', 'ship_id');
    }

}
