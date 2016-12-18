<?php 

namespace Furbook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    public function scopeOfBreed($query, $breedId){
        return $query->where('breed_id', '=', $breedId);
    }
}