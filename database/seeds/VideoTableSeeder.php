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
                "title" => "STONE_ISLAND_LONDON",
                "url" => "https://vimeo.com/687974380",
                "credits" => "I bambini più cinici e scorretti che nessun genitore vuole avere o sa di avere. Il meglio dalla terza stagione de 'I Soliti Idioti' di Niccolò & Gigetto.",
            ],
            [
                "title" => "Waxman Brothers Commercial",
                "url" => "https://vimeo.com/534436062",
                "credits" => "Cliente: Waxman Brothers Regia: Mirko Fasoli DOP/Co_Regia : Bruno Santinoli Stylist: Gloria Bertuzzi Make-up Artist: Lucrezia Santantonio Producer: Alice Fangati",
            ],
            [
                "title" => "Publicis_Lausanne_Campaign_30”_cut_Van",
                "url" => "https://vimeo.com/635351919",
                "credits" => "",
            ],
            [
                "title" => 'Publicis_Lausanne_30”_cut_convertible',
                "url" => "https://vimeo.com/635341889",
                "credits" => "Autori: Francesca Miola, Marco Rettani, Zibba, Giulia Pratell Director : Mirko Fasoli Photography : Bruno Santinoli / Simone Ferrari Make up & Hair Style : Camilla Arietti Editing : Mirko Fasoli Color : Mirko Fasoli Styling: Yazael Angelo Cruciani Management: Manuel Magni m.magni@newtoneagency.it Comunicazione: Samantha Nocera s.nocera@newtoneagency.it",
            ],
            [
                "title" => "Pandora 6 Tiktok",
                "url" => "https://vimeo.com/563602548",
                "credits" => "Scena in cui il protagonista (Norton) conosce il venditore di saponi Tyler Durden (Brad Pitt), dal quale riceve il proprio biglietto da visita.",
            ],
            [
                "title" => "HEAD&SHOULDERS_Italia_Mateo_9x16",
                "url" => "https://vimeo.com/729509125",
                "credits" => "La musica in questo video Ulteriori informazioni Ascolta senza annunci con YouTube Premium Brano Disclaimer Artista Guè, DJ Harsh Album Disclaimer Concesso in licenza a YouTube da UMG (per conto di Universal Music Italia srL.); Soundreef Ltd e 1 società di gestione dei diritti musicali",
            ],
            [
                "title" => "HEAD&SHOULDERS_Italia_Ciro_9x16",
                "url" => "https://vimeo.com/729508468",
                "credits" => "Tratto dall'episodio 3x10 - Progetto Gorilla",
            ],
            [
                "title" => "IGTV Paola Turani per Grazia e Pandora",
                "url" => "https://vimeo.com/547846677",
                "credits" => "This is going to be a re-sound for the video  Achilles is Shrouded in Myth as being demi-god but it is later clarified to not be the case .... implying no one had ever managed that before. Achilles vs. Boagrius. This is only for entertainment Only",
            ],
            [
                "title" => 'Felippe_the surfer_soul',
                "url" => "https://vimeo.com/569934640",
                "credits" => "Sobchak mocks Mike for not carrying a gun for a bodyguard job. Mike puts him in his place. From Season 1, Episode 9 'Pimento' - Chuck wants to transfer the Sandpiper case to HHM much to Jimmy's dismay. Mike gets a job offer working as a bodyguard. ",
            ],
            [
                "title" => "Francesca Chillemi per Grazia e Pandora",
                "url" => "https://vimeo.com/547867974",
                "credits" => 'What’s the story behind your tattoo? Watch the full "What\'s Wrong With People?" special on @Netflix Follow Sebastian Maniscalco Instagram: https://bit.ly/3DmwqMz Twitter: https://bit.ly/3CjC5BK TikTok: https://bit.ly/3DmtcIW Facebook: https://bit.ly/3ccjA7T Website: https://bit.ly/SMLiveWebsite',
            ],
            [
                "title" => "Marie Claire Unplugged",
                "url" => "https://vimeo.com/391989802",
                "credits" => 'What’s the story behind your tattoo? Watch the full "What\'s Wrong With People?" special on @Netflix Follow Sebastian Maniscalco Instagram: https://bit.ly/3DmwqMz Twitter: https://bit.ly/3CjC5BK TikTok: https://bit.ly/3DmtcIW Facebook: https://bit.ly/3ccjA7T Website: https://bit.ly/SMLiveWebsite',
            ],
            [
                "title" => "",
                "url" => "https://vimeo.com/727444070",
                "credits" => 'What’s the story behind your tattoo? Watch the full "What\'s Wrong With People?" special on @Netflix Follow Sebastian Maniscalco Instagram: https://bit.ly/3DmwqMz Twitter: https://bit.ly/3CjC5BK TikTok: https://bit.ly/3DmtcIW Facebook: https://bit.ly/3ccjA7T Website: https://bit.ly/SMLiveWebsite',
            ],
        ];

        foreach($videos as $video){
            // instance
            $new_video = new Video();
            // populate
            $new_video->url = $video['url'];
            $new_video->title = $video['title'];
            $new_video->slug = Str::slug( $new_video->title, '-');
            $new_video->credits = $video['credits'];
            // save
            $new_video->save();
        } 
    }
}
