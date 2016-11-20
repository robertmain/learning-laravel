<?php 

namespace Furbook\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date_of_birth', 'breed_id'
    ];

    public function breed(){
        return $this->belongsTo('Furbook\Models\Breed');
    }
}