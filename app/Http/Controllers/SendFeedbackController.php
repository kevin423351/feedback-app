<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class SendFeedbackController extends Controller
{

    public function viewForm(){  
        return view('posts',[
            'posts' => 'hi'
        ]);
    }

    public function insert(Request $request){
        $user_input = $request->id;
        $time = date('Y-m-d H:i:s');
        // return gettype($user_input);
        echo 'Je hebt gedrukt op knop '.$user_input;
        $data = array("knop"=>$user_input,"date"=>$time);
     

        Feedback::create([
            'knop' => $user_input,
            'date' => $time
        ]);

        if ($user_input != ''){
            echo " het is $time"; 
        }  
    }
}
