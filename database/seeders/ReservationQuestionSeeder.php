<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservation_questions')->insert([
            /*
             * "Staliuko rezervacija" questions.
             */
            [
                'question' => 'Vaikiška kėdutė',
                'reservation_type_id' => 1
            ],
            [
                'question' => 'Veganai',
                'reservation_type_id' => 1
            ],
            [
                'question' => 'Gliuteno netoleruojantys',
                'reservation_type_id' => 1
            ],
            [
                'question' => 'Ar reikalinga vaikiška kėdutė?',
                'reservation_type_id' => 1
            ],
            [
                'question' => 'Ar svečių tarpe yra vaikų, kuriems reiktų siūlyti „vaikiškus“ patiekalus?',
                'reservation_type_id' => 1
            ],
            /*
             * "Šventės organizavimo paslauga" questions.
             */
            [
                'question' => 'Rezervacijos pobūdis:',
                'reservation_type_id' => 2
            ],
            [
                'question' => 'Ar svečių tarpe yra veganų, alergiškų ar tam tikrų produktų netoleruojančių žmonių?',
                'reservation_type_id' => 2
            ],
            [
                'question' => 'Ar meniu turėtų sudaryti 3 patiekalų vakarienė (pirmasis patiekalas, karštasis patiekalas, desertas)?',
                'reservation_type_id' => 2
            ],
            [
                'question' => 'Kokius gėrimus pasiūlyti Jūsų renginiui?',
                'reservation_type_id' => 2
            ],
            [
                'question' => 'Ar svečių tarpe bus veganų ar tam tikrų produktų netoleruojančių žmonių?',
                'reservation_type_id' => 2
            ],
            [
                'question' => 'Ar svečių tarpe yra vaikų, kuriems reiktų siūlyti „vaikiškus“ patiekalus?',
                'reservation_type_id' => 2
            ],
            [
                'question' => 'Ar reikalinga atskira garso įranga?',
                'reservation_type_id' => 2
            ]
        ]);
    }
}
