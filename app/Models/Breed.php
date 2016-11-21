<?php 

namespace Furbook\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model {
    
    /**
     * Enable or disable table timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function cats(){
        return $this->hasMany('Furbook\Models\Cat');
    }
}