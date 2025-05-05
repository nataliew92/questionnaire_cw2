<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $questionnaireId = DB::table('questionnaires')->insertGetId([
            'title' => 'Gaming Preferences Questionnaire',
            'description' => 'Share your gaming preferences to help us learn more about the platforms, genres, and play styles gamers enjoy most.',
            'status' => 'live',
        ]);

        // Question 1
        $q1 = DB::table('questions')->insertGetId([
            'questionnaire_id' => $questionnaireId,
            'question' => 'What platform do you primarily use for gaming?'
        ]);

        DB::table('answers')->insert([
            ['question_id' => $q1, 'answer' => 'PC'],
            ['question_id' => $q1, 'answer' => 'Xbox'],
            ['question_id' => $q1, 'answer' => 'PlayStation'],
            ['question_id' => $q1, 'answer' => 'Nintendo Switch'],
            ['question_id' => $q1, 'answer' => 'Mobile'],
            ['question_id' => $q1, 'answer' => 'Other'],
        ]);

        // Question 2
        $q2 = DB::table('questions')->insertGetId([
            'questionnaire_id' => $questionnaireId,
            'question' => 'What is your favourite game genre?'
        ]);

        DB::table('answers')->insert([
            ['question_id' => $q2, 'answer' => 'Action/Adventure'],
            ['question_id' => $q2, 'answer' => 'Role-Playing Games (RPG)'],
            ['question_id' => $q2, 'answer' => 'Massively Multiplayer Online Role-Playing Games (MMORPG)'],
            ['question_id' => $q2, 'answer' => 'First-Person Shooter (FPS)'],
            ['question_id' => $q2, 'answer' => 'Strategy'],
            ['question_id' => $q2, 'answer' => 'Simulation'],
            ['question_id' => $q2, 'answer' => 'Other'],
        ]);

        // Question 3
        $q3 = DB::table('questions')->insertGetId([
            'questionnaire_id' => $questionnaireId,
            'question' => 'How many hours do you typically spend gaming each week?'
        ]);

        DB::table('answers')->insert([
            ['question_id' => $q3, 'answer' => 'Less than 5 hours'],
            ['question_id' => $q3, 'answer' => '5–10 hours'],
            ['question_id' => $q3, 'answer' => '11–20 hours'],
            ['question_id' => $q3, 'answer' => '21–30 hours'],
            ['question_id' => $q3, 'answer' => 'More than 30 hours'],
        ]);

        // Question 4
        $q4 = DB::table('questions')->insertGetId([
            'questionnaire_id' => $questionnaireId,
            'question' => 'Do you prefer single-player or multiplayer games?'
        ]);

        DB::table('answers')->insert([
            ['question_id' => $q4, 'answer' => 'Single-player'],
            ['question_id' => $q4, 'answer' => 'Multiplayer'],
            ['question_id' => $q4, 'answer' => 'Both equally'],
            ['question_id' => $q4, 'answer' => 'No preference'],
        ]);

        // Question 5
        $q5 = DB::table('questions')->insertGetId([
            'questionnaire_id' => $questionnaireId,
            'question' => 'How often do you purchase new games?'
        ]);

        DB::table('answers')->insert([
            ['question_id' => $q5, 'answer' => 'Monthly'],
            ['question_id' => $q5, 'answer' => 'Every few months'],
            ['question_id' => $q5, 'answer' => 'Once or twice a year'],
            ['question_id' => $q5, 'answer' => 'Rarely'],
            ['question_id' => $q5, 'answer' => 'Never'],
        ]);
    }
}