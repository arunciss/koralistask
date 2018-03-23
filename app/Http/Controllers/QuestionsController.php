<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Test;
use App\Customer;

class QuestionsController extends Controller {

    public function showQuestions($id){
        // Get customer data
        $customer = $this->getCustomerData($id);

        // Set answered questions list
        $answered = array_map('intval', explode(',', $customer[0]->q_answered));

        $q = count(Question::where('id_test', $id)->get());
        $a = count($answered)-1;

        if($a == $q) return redirect('/the-end/' . $id);

        // Get question
        if($customer[0]->current_question < 0){
            $question = Question::where('id_test', $id)->whereNotIn('id', $answered)->inRandomOrder()->first();
            $this->updateCustomerData($customer[0]->id, $question->id);
        } else {
            $question = Question::where('id', $customer[0]->current_question)->first();
        }

        $data = array(
            'question' => $question,
            'title' => Test::find($id)->title,
            'customer' => $customer,
            'answered' => $a,
            'total_questions' => $q
        );
        return view('question')->with($data);
    }

    public function getCustomerData($id_test){
        $ip = request()->ip();

        $c = Customer::where('id_test', $id_test)->where('ip', $ip)->get();

        if(count($c)){
            // Turn back customer information
            return $c;
        } else {
            // Create new customer
            $c = new Customer();
            $c->id_test = $id_test;
            $c->score = 0;
            $c->ip = $ip;
            $c->status = 0;
            $c->save();

            return Customer::where('id_test', $id_test)->where('ip', $ip)->get();
        }
    }

    public function updateCustomerData($id, $qId){
        $customer = Customer::find($id);
        $customer->current_question = $qId;
        $customer->save();
    }

    public function theEnd($id){
        $c = $this->getCustomerData($id);

        $answered = array_map('intval', explode(',', $c[0]->q_answered));
        $questions = Question::where('id_test', $id)->get();

        $maxScore = 0;
        foreach($questions as $question){
            $maxScore += $question->point;
        }

        $q = count($questions);
        $a = count($answered)-1;

        $selected = array_map('intval', explode(',', $c[0]->a_selected));
        $arr = array();
        $nr = 1;
        foreach($questions as $question){
            $row = array();

            $len = 0;
            for($i = 0; $i < count($answered); $i++){
                if($answered[$i] == $question->id){
                    $len = $i;
                }
            }

            $row["number"] = $nr;
            $row["question"] = $question->question;
            $row["a1"] = $question->answer_01;
            $row["a2"] = $question->answer_02;
            $row["a3"] = $question->answer_03;
            $row["a4"] = $question->answer_04;

            $row["s1"] = '';
            if($question->correct === 1 && $selected[$len] === 1){
                $row["s1"] = 'bg-success';
            } elseif($question->correct === 1){
                $row["s1"] = 'bg-success';
            } elseif($selected[$len] === 1){
                $row["s1"] = 'bg-danger';
            }

            $row["s2"] = '';
            if($question->correct === 2 && $selected[$len] === 2){
                $row["s2"] = 'bg-success';
            } elseif($question->correct === 2){
                $row["s2"] = 'bg-success';
            } elseif($selected[$len] === 2){
                $row["s2"] = 'bg-danger';
            }

            $row["s3"] = '';
            if($question->correct === 3 && $selected[$len] === 3){
                $row["s3"] = 'bg-success';
            } elseif($question->correct === 3){
                $row["s3"] = 'bg-success';
            } elseif($selected[$len] === 3){
                $row["s3"] = 'bg-danger';
            }

            $row["s4"] = '';
            if($question->correct === 4 && $selected[$len] === 4){
                $row["s4"] = 'bg-success';
            } elseif($question->correct === 4){
                $row["s4"] = 'bg-success';
            } elseif($selected[$len] === 4){
                $row["s4"] = 'bg-danger';
            }


            $row["selected"] = $selected[$len];
            $row["correct"] = $question->correct;

            $arr[] = $row;
            $nr++;
        }

//        return $arr;

        $data = array(
            'title' => 'Well done! You finished test.',
            'customer' => $c,
            'maxScore' => $maxScore,
            'total' => $q,
            'results' => $arr
        );

        if(count($c[0]) > 0 && $a === $q){
            return view('the-end')->with($data);
        }

        return redirect('/');

    }
}
