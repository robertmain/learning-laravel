<?php
namespace Furbook\Http\Views\Composers;

use Furbook\Models\Breed;
use Illuminate\Contracts\View\View;

/**
* Cat Form View Composer
*
* Provides the cat form with a list of breeds to populate a select list with
*/
class CatFormComposer
{
    
    public function __construct(View $view)
    {
        $view->with('breeds', $this->breeds->lists('name', 'id'));
    }
}