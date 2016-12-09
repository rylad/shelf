<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function games()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Games')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $types = type::orderBy('name','ASC')->get();
        $types_for_checkboxes = [];
        foreach($types as $type) {
            $types_for_checkboxes[$type->id] = $type->name;
        }
        return $types_for_checkboxes;
    }
}	
	



