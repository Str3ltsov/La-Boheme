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
                'question' => 'What age coach are you looking for?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            [
                'question' => 'What kind of experience are you looking for in a head coach?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            [
                'question' => 'How many assistants can a coach choose?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            [
                'question' => 'What is the estimated annual budget for the coach?',
                'reservation_type_id' => Constants::reservationTypeVyrtren
            ],
            /*
             * Vyr tren ass
             */

            [
                'question' => 'Choose what Assistant to the head coach you are looking for?',
                'reservation_type_id' => Constants::reservationTypeVyrtrenass
            ],
            [
                'question' => 'What kind of experience are you looking for in a Assistant to the head coach?',
                'reservation_type_id' => Constants::reservationTypeVyrtrenass
            ],
            [
                'question' => 'What is the estimated annual budget for a Assistant to the head coach?',
                'reservation_type_id' => Constants::reservationTypeVyrtrenass
            ],
            /*
             * Fiz tren
             */

            [
                'question' => 'What kind of experience are you looking for in a Physical training coach?',
                'reservation_type_id' => Constants::reservationTypeFiztren
            ],
            [
                'question' => 'Will the physical training coach need to work with youth teams?',
                'reservation_type_id' => Constants::reservationTypeFiztren
            ],
            [
                'question' => 'What is the estimated annual budget for a Physical training coach?',
                'reservation_type_id' => Constants::reservationTypeFiztren
            ],

        ]);
    }
}
