<?php

use Illuminate\Database\Seeder;
use App\Video;
use Illuminate\Support\Str;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos =[
            [
                "title" => "Head&Shoulders R&F 3",
                "url" => "https://player.vimeo.com/video/729598978?h=5fb5063227",
                "credits" => "",
                "category_id" => "1",
                "aspect_ratio" => "4:5",
            ],
            [
                "title" => "Head&Shoulders R&F",
                "url" => "https://player.vimeo.com/video/729597099?h=63a040bcde",
                "credits" => "",
                "category_id" => "1",
                "aspect_ratio" => "4:5",
            ],
            [
                "title" => "HEAD&SHOULDERS Italia Ciro",
                "url" => "https://player.vimeo.com/video/729508468?h=0a29375783",
                "credits" => "",
                "category_id" => "1",
                "aspect_ratio" => "9:16",
            ],
            [
                "title" => "STONE ISLAND LONDON",
                "url" => "https://player.vimeo.com/video/687974380?h=4a4482c378",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
        ];

        foreach($videos as $video){
            // instance
            $new_video = new Video();
            // populate
            $new_video->url = $video['url'];
            $new_video->title = $video['title'];
            $new_video->slug = Str::slug( $new_video->title, '-');
            $new_video->category_id = $video['category_id'];
            $new_video->credits = $video['credits'];
            $new_video->aspect_ratio = $video['aspect_ratio'];
            // save
            $new_video->save();
        } 
    }
}
