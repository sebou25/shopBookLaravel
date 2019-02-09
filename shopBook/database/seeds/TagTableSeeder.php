<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        //création des tags
        //attention à l'auto complétion
        $tag = new \App\Tag();
        //nom du tag
        $tag->nom ="#desir";
        $tag->save();

        $tag2 = new \App\Tag();
        //nom du tag
        $tag2->nom ="#philosophe";
        $tag2->save();

        $tag3 = new \App\Tag();
        //nom du tag
        $tag3->nom ="#politique";
        $tag3->save();

        $tag4 = new \App\Tag();
        //nom du tag
        $tag4->nom ="#mal";
        $tag4->save();

        $tag5 = new \App\Tag();
        //nom du tag
        $tag5->nom ="#fiction";
        $tag5->save();

        $tag6 = new \App\Tag();
        //nom du tag
        $tag6->nom ="#zombi";
        $tag6->save();

    }
}
