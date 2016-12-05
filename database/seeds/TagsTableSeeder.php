<?php
use Illuminate\Database\Seeder;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $data = ['fantasy','realistic','long','short'];
        foreach($data as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}