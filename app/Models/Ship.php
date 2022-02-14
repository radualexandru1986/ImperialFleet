<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ship extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey ='id';

    /**
     * @var string
     */
    protected $table = 'ships';

    /**
     * @var string[]
     */
    protected $fillable = [
        'armament_id',
        'status',
        'name',
        'class',
        'crew',
        'image',
        'value'
    ];

    #Relations

    /**
     * @return BelongsToMany
     */
     public function armaments(): BelongsToMany
     {
        return $this->belongsToMany(Armament::class, 'ships_armaments', 'ship_id', 'armament_id');
     }

}
