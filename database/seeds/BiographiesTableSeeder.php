<?php

use Illuminate\Database\Seeder;
use App\Biography;

class BiographiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instance
        $new_biography = new Biography();
        // populate
        $new_biography->en = "I'm a filmmaker skilled in Digital Contents and short docus for
        advertising and fashion industry.<br />
        Born in Milan in 1990, since I was a kid I developed a more and more
        consistent interest and passion in cinema movies and production.<br />
        After I graduated in Business Communication in IULM - Milan, I decided to
        move to Los Angeles following my passion and I achieved a Master Degree in
        Film Direction at UCLA. After studying and working in LA as a filmmaker, I
        went back to Milan, where I started working as Digital Creator for fashion
        and commercial brands like PMI, Stone Island, Marieclaire, Pandora,
        Grazia, Versace, Philosophy, Alberta Ferretti and others.<br />I have a
        positive, fresh and refined style. My skills in filming makes me agile and
        able to face and work well on any kind of project and production team.<br />On
        the post production side, I can fully manage offline and online progress.";
        
        $new_biography->ita = "Sono un filmmaker esperto in Contenuti digitali e short docus per
        pubblicità e industria della moda.<br />
        Nato a Milano nel 1990, fin da ragazzino ho sviluppato una cultura sempre
        più grande interesse e passione costanti per i film e la produzione
        cinematografica.<br />
        Dopo essermi laureata in Comunicazione d'Impresa presso IULM - Milano, ho
        deciso di farlo mi sono trasferito a Los Angeles seguendo la mia passione
        e ho conseguito un Master in Regia cinematografica all'UCLA. Dopo aver
        studiato e lavorato a Los Angeles come regista, sono tornato a Milano,
        dove ho iniziato a lavorare come Digital Creator per la moda e marchi
        commerciali come PMI, Stone Island, Marieclaire, Pandora, Grazia, Versace,
        Philosophy, Alberta Ferretti e altri.<br />Ho uno stile positivo, attuale
        e raffinato. Le mie abilità nel filmare mi rendono agile e in grado di
        affrontare e lavorare bene su qualsiasi tipo di progetto e team di
        produzione.<br />Sul lato post produzione, posso gestire completamente i
        progressi offline e online.";
        // save
        $new_biography->save();
    }
}
