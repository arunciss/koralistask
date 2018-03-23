<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Question;
use App\Test;

class CustomersController extends Controller
{


    public function index(){
        //
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'answer' => 'required'
        ]);

        $cId = $id;
        $qId = $request->input("q_id");
        $tId = $request->input("t_id");

        $answer = $request->input("answer");

        $ques = Question::find($qId);
        $score = $ques->correct == $answer ? $ques->point : 0;

        $cust = Customer::find($cId);
        $cust->score += $score;
        $cust->q_answered = $cust->q_answered . $qId . ',';
        $cust->a_selected = $cust->a_selected . $answer . ',';
        $cust->current_question = -1;
        $cust->save();

        return redirect('/' . $tId);
    }

    public function save(Request $request, $id){
        $this->validate($request, [
            'nickname' => 'required'
        ]);

        $nick = $request->input("nickname");

        $cust = Customer::find($id);
        $cust->name = $nick;
        $cust->status = 1;
        $cust->current_question = 0;
        $cust->save();

        return redirect('/scoreboard');
    }

    public function scoreboard(){
        $score = Customer::where('status', 1)->orderBy('score', 'DESC')->get();

        $arr = array();
        $nr = 1;
        foreach($score as $line){
            $row = array();

            $t = Test::select('title')->where('id', $line->id_test)->first();

            $row['number'] = $nr;
            $row['name'] = $line->name;
            $row['title'] = $t['title'];
            $row['score'] = $line->score;
            $row['updated_at'] = $line->updated_at;

            $arr[] = $row;
            $nr++;
        }

        return view('/scoreboard')->with('scores', $arr);
    }

    public function destroy($id){
        $c = Customer::find($id);
        $test = $c->id_test;

        $c->delete();

        return redirect('/' . $test);
    }
}
