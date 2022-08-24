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
                "title" => "Pandora 6 Tiktok",
                "url" => "https://player.vimeo.com/video/563602548?h=64714cdb3f",
                "credits" => "",
                "category_id" => "1",
                "aspect_ratio" => "9:16",
            ],
            [
                "title" => "Francesca Chillemi per Grazia e Pandora",
                "url" => "https://player.vimeo.com/video/547867974?h=5b8e5980c2",
                "credits" => "",
                "category_id" => "1",
                "aspect_ratio" => "1:1",
            ],
            [
                "title" => "IGTV Paola Turani per Grazia e Pandora",
                "url" => "https://player.vimeo.com/video/547846677?h=eabb790369",
                "credits" => "",
                "category_id" => "1",
                "aspect_ratio" => "1:1",
            ],
            [
                "title" => "STONE ISLAND LONDON",
                "url" => "https://player.vimeo.com/video/687974380?h=4a4482c378",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Waxman Brothers Commercial",
                "url" => "https://player.vimeo.com/video/534436062?h=2e2e80cf4e",
                "credits" => "Cliente: Waxman Brothers Regia: Mirko Fasoli DOP/Co_Regia : Bruno Santinoli Stylist: Gloria Bertuzzi Make-up Artist: Lucrezia Santantonio Producer: Alice Fangati Attori: Hindaco Anna Fangati Adolfo Alesii Gregory Nunez Perez Alessandro", 
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Publicis Lausanne 30” cut convertible",
                "url" => "https://player.vimeo.com/video/635341889?h=68f8aef44e",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Geox NEW COLLECTION",
                "url" => "https://player.vimeo.com/video/742158324?h=54e17b31fd",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "GEOX New Collection - casa sull’albero",
                "url" => "https://player.vimeo.com/video/742159403?h=068255b17d",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "GEOX Back To School",
                "url" => "https://player.vimeo.com/video/742167109?h=a587e90b1f",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Publicis Lausanne Campaign 30” cut Van",
                "url" => "https://player.vimeo.com/video/635351919?h=5ee9d2def9",
                "credits" => "",
                "category_id" => "2",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Felippe the surfer soul",
                "url" => "https://player.vimeo.com/video/569934640?h=60287b0b3d",
                "credits" => "",
                "category_id" => "3",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Marie Claire Unplugged",
                "url" => "https://player.vimeo.com/video/391989802?h=5ad79f9136",
                "credits" => "",
                "category_id" => "4",
                "aspect_ratio" => "16:9",
            ],
            [
                "title" => "Unconventional woman",
                "url" => "https://player.vimeo.com/video/727444070?h=3b235d6e2c",
                "credits" => "",
                "category_id" => "4",
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
