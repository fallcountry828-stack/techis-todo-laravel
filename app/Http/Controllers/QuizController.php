<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Sale;

class QuizController extends Controller
{
    public function show()
    {
        $quizzes = Quiz::all();
        return view('question.quiz3', compact('quizzes'));
    }

    public function quiz4_show()
    {
        $fruits = "orange";
        return view('question.quiz4', compact('fruits'));
    }

    public function login(Request $request)
    {
        $request->session()->flush();
        //ログインユーザーの設定
        $user_info = array(
            'email' => 'techis@test',
            'password' => '1234'
        );
        //ログインチェック
        if (Auth::attempt($user_info)) {
            //ログインに成功
            return view('question.quiz5');
        } else {
            //ログインに失敗
            return view('question.quiz5');
        }
    }

    public function quiz6_show()
    {
        $quizzes = Quiz::all();
        return view('question.quiz6', compact('quizzes'));
    }

    public function quiz7_show(){
        //find()で指定したIDのデータを抽出
        $quiz = Quiz::find(1);
        //viewを呼び出しcompactメソッドで変数を渡す
        return view('question.quiz7', compact('quiz'));
    }

    public function quiz8_redirect(){
        return redirect()->route('quiz7');
    }

    public function quiz9_show($id){
        //find()で指定したIDのデータを抽出
        $quiz = Quiz::find($id);
        //viewを呼び出しcompactメソッドで変数を渡す
        return view('question.quiz9', compact('quiz'));
    }

    public function quiz10_show(){
        return view('question.quiz10');
    }

    public function quiz10_store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'type' => 'required',
        ]);
        Quiz::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
        ]);

        return redirect()->route('quiz10_test');
    }

    public function quiz11_show_all(Request $request){
        $companies = Company::all();
        $sales = Sale::all();
        return view('question.quiz11', compact('companies','sales'));
    }

    public function quiz11_show_get(Request $request){
        $companies = Company::where("founding_date", "like", "%-03-%")->where('address','like','テスト2%')->get();
        $sales = Sale::where('company_id','=','2')->orwhere('sales','>','8000')->orderBy('sales','desc')->get();
        return view('question.quiz11', compact('companies','sales'));
    }

    public function quiz12_show($id){
        //find()で指定したIDのデータを抽出
        $quiz = Quiz::findorfail($id);
        //viewを呼び出しcompactメソッドで変数を渡す
        return view('question.quiz12', compact('quiz'));
    }

    public function quiz12_update(Request $request,$id){
        //find()で指定したIDのデータを抽出
        $validated = $request->validate([
            'name' => 'required|max:30',
            'type' => 'required',
        ]);
        $quiz = Quiz::find($id);
        $quiz->name = $validated['name'];
        $quiz->type = $validated['type'];
        $quiz->save();
        return redirect('/quiz3');
    }

    public function quiz12_delete($id){
        //find()で指定したIDのデータを抽出
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect('/quiz3');
    }
}

