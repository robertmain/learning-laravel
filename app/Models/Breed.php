<?php 

namespace Furbook\Models\Breed;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model {
    
    /**
     * Enable or disable table timestamps
     *
     * @var boolean
     */
    protected $timestamps = false;

    public function breed(){
        return $this->hasMany('Furbook\Models\Cat');
    }
}