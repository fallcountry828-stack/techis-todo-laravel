<?php   
public function index(){
    //usersDBからデータ取得
    $usersdata = User::all();

    return view ('members.index',[
        'usersdata'=> $usersdata,
    ]);


}