<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class, 50)->create()->each(function ($question) {
            $count = rand(1, 5);
            $question->answer_count = $count;
            $question->save();

            $categoriesAll = Category::all();

            $categories = $categoriesAll->random(rand(1,4));

            foreach ($categories as $category) {
                $question->categories()->attach($category->id);
            }

            factory(Answer::class, $count)->create(['question_id' => $question->id]);
        });
    }
}

