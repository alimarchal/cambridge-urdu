<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\PaperQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('papers')->get();
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        $papers = Paper::all();
        return view('question.create', compact('papers'));
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'question' => 'required',
            'right_option' => 'required',
            'wrong_option_1' => 'required',
            'wrong_option_2' => 'required',
            'wrong_option_3' => 'required',
        ])->validate();

        if (!is_null($request->papers)){

            $question = $this->getQuestion($request);

            foreach ($request->papers as $paper){
                PaperQuestion::create([
                    'paper_id' => $paper,
                    'question_id' => $question->id,
                ]);
            }
        }
        else{
            $this->getQuestion($request);
        }
        return redirect()->route('question.create')->with('success', 'Question added');
    }

    /**
     * @param Request $request
     * @return Question
     */
    public function getQuestion(Request $request): Question
    {
        $question = Question::create([
            'question' => $request->question,
        ]);

        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->right_option,
            'valid' => 1,
        ]);
        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->wrong_option_1,
        ]);
        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->wrong_option_2,
        ]);
        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->wrong_option_3,
        ]);
        return $question;
    }

    public function edit($id)
    {
        $papers = Paper::all();
        $question = Question::with('option', 'papers')->findOrFail($id);
        return view('question.edit', compact('question', 'papers'));
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'question' => 'required',
            'right_option' => 'required',
            'wrong_option_1' => 'required',
            'wrong_option_2' => 'required',
            'wrong_option_3' => 'required',
        ])->validate();

        $question = Question::with('option')->where('id', $id)->first();

        if (!is_null($request->papers)){

            $this->extracted($question, $request);

            foreach ($request->papers as $paper){
                PaperQuestion::create([
                    'paper_id' => $paper,
                    'question_id' => $question->id,
                ]);
            }
        }
        else{

            $this->extracted($question, $request);
        }
        return redirect()->route('question.index')->with('success', 'Question added');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model|\LaravelIdea\Helper\App\Models\_IH_Question_QB|object|\Illuminate\Database\Eloquent\Builder|Question|null $question
     * @param Request $request
     */
    public function extracted(object|null $question, Request $request): void
    {
        $question->update([
            'question' => $request->question,
        ]);

        $question->option()->delete();

        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->right_option,
            'valid' => 1,
        ]);
        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->wrong_option_1,
        ]);
        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->wrong_option_2,
        ]);
        $question->option()->create([
            'question_id' => $question->id,
            'name' => $request->wrong_option_3,
        ]);
    }

    public function delete($id)
    {
        $question = Question::where('id', $id)->first();
        $question->delete();
        return redirect()->route('question.index')->with('success', 'Deleted successfully !!!');
    }
}
