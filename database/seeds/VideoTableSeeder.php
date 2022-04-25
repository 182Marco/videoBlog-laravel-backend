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
                "title" => "Niccolò & Gigetto - Mamma Esco - I Soliti Idioti",
                "url" => "https://www.youtube.com/watch?v=FwW8LL82KPg&t=934s",
                "credits" => "I bambini più cinici e scorretti che nessun genitore vuole avere o sa di avere. Il meglio dalla terza stagione de 'I Soliti Idioti' di Niccolò & Gigetto.",
            ],
            [
                "title" => "Arthur kills three guys in the subway | Joker [UltraHD, HDR]",
                "url" => "https://www.youtube.com/watch?v=mUPJckUSdzo",
                "credits" => "Joker (2019) Scene: Arthur kills three guys in the subway",
            ],
            [
                "title" => "Guè, DJ Harsh - Lifestyle (Official Video)",
                "url" => "https://www.youtube.com/watch?v=n0YmcbgZJ5k",
                "credits" => "Regia: Marc Lucas & Igor Grbesic Executive Producer: Matteo Stefani Dop: Dario Scommegna Producer: Jacopo Colamartino 1ac: Giuseppe Torsello Gaffer: Gabriele Leone Secondo Elettrico: Giovanni Sacchi Make Up Artist: Giulia Fortunato",
            ],
            [
                "title" => 'Francesca Miola - "3,2,1" (video ufficiale)',
                "url" => "https://www.youtube.com/watch?v=aCZm_QR8C14",
                "credits" => "Autori: Francesca Miola, Marco Rettani, Zibba, Giulia Pratell Director : Mirko Fasoli Photography : Bruno Santinoli / Simone Ferrari Make up & Hair Style : Camilla Arietti Editing : Mirko Fasoli Color : Mirko Fasoli Styling: Yazael Angelo Cruciani Management: Manuel Magni m.magni@newtoneagency.it Comunicazione: Samantha Nocera s.nocera@newtoneagency.it",
            ],
            [
                "title" => "Fight Club - Sull'aereo",
                "url" => "https://www.youtube.com/watch?v=yqxdI8trOlk",
                "credits" => "Scena in cui il protagonista (Norton) conosce il venditore di saponi Tyler Durden (Brad Pitt), dal quale riceve il proprio biglietto da visita.",
            ],
            [
                "title" => "GUE' PEQUENO & DJ HARSH - FASTLIFE 4 (Official Trailer)",
                "url" => "https://www.youtube.com/watch?v=YPAtXPSqt6Q",
                "credits" => "La musica in questo video Ulteriori informazioni Ascolta senza annunci con YouTube Premium Brano Disclaimer Artista Guè, DJ Harsh Album Disclaimer Concesso in licenza a YouTube da UMG (per conto di Universal Music Italia srL.); Soundreef Ltd e 1 società di gestione dei diritti musicali",
            ],
            [
                "title" => "The Big Bang Theory - Quando piange Sheldon? - ITA",
                "url" => "https://www.youtube.com/watch?v=9r8wC3XU4Is",
                "credits" => "Tratto dall'episodio 3x10 - Progetto Gorilla",
            ],
            [
                "title" => "Troy (Achilles Vs Boagrius) 4K",
                "url" => "https://www.youtube.com/watch?v=_z5UKystdZg",
                "credits" => "This is going to be a re-sound for the video  Achilles is Shrouded in Myth as being demi-god but it is later clarified to not be the case .... implying no one had ever managed that before. Achilles vs. Boagrius. This is only for entertainment Only",
            ],
            [
                "title" => 'Come On, Take My Gun From Me" | Pimento | Better Call Saul',
                "url" => "https://www.youtube.com/watch?v=N723si1wAG8",
                "credits" => "Sobchak mocks Mike for not carrying a gun for a bodyguard job. Mike puts him in his place. From Season 1, Episode 9 'Pimento' - Chuck wants to transfer the Sandpiper case to HHM much to Jimmy's dismay. Mike gets a job offer working as a bodyguard. ",
            ],
            [
                "title" => "Sebastian Maniscalco - Tattoos (What's Wrong With People?)",
                "url" => "https://www.youtube.com/watch?v=3DcIwJEYNQk",
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
