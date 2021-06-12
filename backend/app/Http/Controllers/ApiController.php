<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function questionCalc()
    {
        $questions = [
            ["value" => "A.Good"],
            ["value" => "B.Fair"],
            ["value" => "C.Neutral"],
            ["value" => "D.Bad"],
        ];

        $questions_custom = [];
        foreach ($questions as $key => $question) {
            switch ($question['value']) {
                case "A.Good":
                case "B.Fair":
                case "C.Neutral":
                case "D.Bad":
                    $item = Question::where('value', $question['value'])->get();
                    $calc = Question::percentValue(count(Question::all()), count($item));

                    $questions_custom[] = [
                        "id" => $key,
                        "value" => $question['value'],
                        "percent" => $calc,
                        "count" => count($item)
                    ];
                    break;
            }
        }

        return json_encode([
            "success" => true,
            "questions_custom" => $questions_custom
        ]);
    }

    public function question(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode([
                "message" => __('Please check fields!'),
                "success" => false,
            ]);
        } else {
            $question = new Question();
            $question->value = $request->value;
            $question->save();
        }

        return json_encode([
            "message" => __('Form submitted successful!'),
            "success" => true,
        ]);
    }
}
