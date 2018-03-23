<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Customer;
use App\Question;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller {
    //

    public function showTestList(){
        $ip = request()->ip();
        $tests = Test::all();

        $arr = array();
        foreach($tests as $test){
            $row = array();

            $c = Customer::select('q_answered')->where('id_test', $test->id)->where('ip', $ip)->first();
            $q = Question::where('id_test', $test->id)->get();

            $row['id'] = $test->id;
            $row['title'] = $test->title;
            $row['created_at'] = $test->created_at;

            $row['answered'] = 0;
            if($c['q_answered']){
                $row['answered'] = count(array_map('intval', explode(',', $c['q_answered'])))-1;
            }

            $row['total_questions'] = count($q);

            $arr[] = $row;
        }

        $data = array(
            'tests' => $arr,
            'title' => 'Tests list'
        );

        $cookieName = 'questions';
        $cookieValue = array("aa", 3, 5);
        return (Cookie($cookieName, $cookieValue, true, 10));

//        return $arr;
        return view('home')->with($data);
    }
}
