<?php

namespace Database\Seeders;

use App\Models\Choices;
use App\Models\Question;
use App\Models\Examination;
use App\Models\QuestionType;
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

        $type = QuestionType::factory()->create([
            'name' => 'Multiple Choices',
        ]);
        QuestionType::factory()->create([
            'name' => 'True Or False',
        ]);
        QuestionType::factory()->create([
            'name' => 'Essay',
        ]);
        $exam = Examination::factory()->create([
            'name' => 'examination 1',
            'start_dateTime' => date('Y-m-d H:i:s'),
            'end_dateTime' => $nextWeekDateTime,
            'numberOfAttempts' => '1'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'At present, scientists report about the formation of holes in the ozone layer of the atmosphere. This dangerous trend is being blamed on what of the following wrong practices?',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'The use of ozone itself on the surface of the earth.'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'The excessive use of aerosols.'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Removal of the protective cover like the green plants.'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'The use of soil fertilizers on earth.'
        ]);

        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'The El Niño phenomenon, which grabbed control of the world\'s weather machine, is described by meteorologists as ________________.',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Landslides, flashfloods, warm air currents.'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Heavy downpours, tropical storms, strong winds'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Lack of rains, droughts, crop failure'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Monsoons, easterly winds, low pressure area.'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'The progressive flooding in some parts of Mindanao are believed to be caused by ______________________',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Cultural minority discrimination.'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Irrigation of vast rice fields'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Wanton cutting of trees'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Construction of fish ponds'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'Which environmental law required industries to install anti-pollution devices and bans the use of incinerators?',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Philippine Clean Air Act'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Environmental Security Act'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Anti-pollution Act'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Greenpeace Act'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'The "red tide" phenomenon causes what particular marine organism to be poisonous for human consumption?',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Arthropods'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Mollusks'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Earthworms'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Algae'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'What do you call the natural environment where a certain orgranism lives in thrives?',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Community'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Habitat'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Country'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Ecosystem'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'Which of the following best describes the science of Ecology?',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Living things'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Rocks'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Life and Environment'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Weather and Climate'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'All of the following are autotrophs, except ____________.',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Fern'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Grasshopper'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Herb'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Grass'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'The main organ for repirations is the _____________.',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Nose'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Lungs'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Esophagus'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Trachea'
        ]);
        $question = Question::factory()->create([
            'type_id' => $type->id,
            'examinations_id' => $exam->id,
            'Question' => 'What term is used to describe an organism which depends its subsistence on others?',
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'A',
            'description' => 'Prey'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'B',
            'description' => 'Parasite'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'C',
            'description' => 'Medium'
        ]);
        Choices::factory()->create([
            'questions_id' => $question->id,
            'letter' => 'D',
            'description' => 'Host'
        ]);
        

    }
}
