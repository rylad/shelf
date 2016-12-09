<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        $data = ['co-op','competative','solo','multiplayer', 'party'];
        foreach($data as $typeName) {
            $type = new type();
            $type->name = $typeName;
            $type->save();
        }
    }
}