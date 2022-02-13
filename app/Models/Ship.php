<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'status_id',
        'name',
        'class',
        'crew',
        'image',
        'value'
    ];

    #Relations

    /**
     * @return BelongsTo
     */
     public function armament(): BelongsTo
     {
         return $this->belongsTo(Armament::class, 'armament_id');
     }

    /**
     * @return BelongsTo
     */
     public function status(): BelongsTo
     {
         return $this->belongsTo(Status::class, 'status_id');
     }

}
