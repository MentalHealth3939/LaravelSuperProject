<?php

namespace App\Models;

use App\Models\Product;

class PanelProduct extends Product
{
    protected static function booted()
    { 

    }

    public function getForeignKey()
    {
        $parent = get_parent_class($this);
        return (new $parent)->getForeignKey();
    }
    
    public function geTMorphClass()
    {
        $parent = get_parent_class($this);
        return (new $parent)->getMorphClass();
    }
}

