<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionAnswerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('question_answers')->insert([
            [
                'question' => 'How did you know about our product?',
                'type' => 'multiple_choice',
                'options' => json_encode([
                    'From the advert',
                    'Google Search',
                    'From our social accounts',
                    'Others',
                ]),
                'responses' => json_encode([
                    'From the advert' => 35,
                    'Google Search' => 43,
                    'From our social accounts' => 75,
                    'Others' => 75,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Do you think the price is reasonable?',
                'type' => 'yes_no',
                'options' => json_encode(['Yes', 'No']),
                'responses' => json_encode([
                    'Yes' => 40,
                    'No' => 60,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How likely are you to recommend us to a family and friends?',
                'type' => 'rating',
                'options' => json_encode(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
                'responses' => json_encode([
                    '1' => 1,
                    '2' => 1,
                    '3' => 2,
                    '4' => 3,
                    '5' => 4,
                    '6' => 5,
                    '7' => 10,
                    '8' => 15,
                    '9' => 12,
                    '10' => 7,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How likely are you to recommend us to a family and friends?',
                'type' => 'rating',
                'options' => json_encode(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
                'responses' => json_encode([
                    '1' => 1,
                    '2' => 1,
                    '3' => 2,
                    '4' => 3,
                    '5' => 4,
                    '6' => 5,
                    '7' => 10,
                    '8' => 15,
                    '9' => 12,
                    '10' => 7,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How would you rate your overall experience?',
                'type' => 'rating',
                'options' => json_encode(["Very Bad", "Bad", "Neutral", "Good", "Excellent"]),
                'responses' => json_encode([
                    "Very Bad" => 2,
                    "Bad" => 4,
                    "Neutral" => 18,
                    "Good" => 13,
                    "Excellent" => 7
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
