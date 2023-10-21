<?php

namespace Database\Seeders;

use App\Models\Choices;
use App\Models\Question;
use App\Models\Examination;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $currentTimestamp = time();

        // Calculate the timestamp for next week (add 7 days)
        $nextWeekTimestamp = strtotime('+7 days', $currentTimestamp);

        // Format the timestamp as a date and time
        $nextWeekDateTime = date('Y-m-d H:i:s', $nextWeekTimestamp);
        $exam = Examination::factory()->create([
            'name' => 'examination 1',
            'start_dateTime' => date('Y-m-d H:i:s'),
            'end_dateTime' => $nextWeekDateTime,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        $question = Question::factory()->create([
            'examinations_id' => $exam->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
        ]);

    }
}
