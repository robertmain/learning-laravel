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
    protected $breeds;

    public function __construct(Breed $breeds)
    {
        $this->breeds = $breeds;
    }

    public function compose(View $view)
    {
        $view->with('breeds', $this->breeds->pluck('name', 'id'));
    }
}