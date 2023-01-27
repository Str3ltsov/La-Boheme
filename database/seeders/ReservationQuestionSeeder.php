<?php

namespace Database\Seeders;

use App\Helpers\Constants;
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
             * Vyr tren
             */
            [
                'question' => 'Kokio amžiaus vyr. trenerio ieškote?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            [
                'question' => 'Kokios patirties vyr. trenerio ieškote?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            [
                'question' => 'Kiek asistentų gali pasirinkti vyr. treneris?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            [
                'question' => 'Koks numatytas metinis biudžetas treneriui?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            /*
             * Vyr tren ass
             */

            [
                'question' => 'Kokio trenerio asistento ieškote?',
                'reservation_type_id' => Constants::reservationTypeVyrtrenass
            ],
            [
                'question' => 'Kokios patirties trenerio asistento ieškote?',
                'reservation_type_id' => Constants::reservationTypeVyrtrenass
            ],
            [
                'question' => 'Koks numatytas metinis biudžetas trenerio asistentui?',
                'reservation_type_id' => Constants::reservationTypeVyrtrenass
            ],
            /*
             * Fiz tren
             */

            [
                'question' => 'Kokio fizinio rengimo trenerio ieškote?',
                'reservation_type_id' => Constants::reservationTypeFiztren
            ],
            [
                'question' => 'Ar fizinio rengimo treneriui reikės dirbti su jaunimo komandomis?',
                'reservation_type_id' => Constants::reservationTypeFiztren
            ],
            [
                'question' => 'Koks numatytas metinis biudžetas treneriui?',
                'reservation_type_id' => Constants::reservationTypeFiztren
            ],

        ]);
    }
}
