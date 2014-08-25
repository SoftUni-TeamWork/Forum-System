<?php

class UserController extends \BaseController {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $userData = Input::all();

        $user = new User();

        if($user->validate($userData)) {
            $user->setData($userData);
            $user->save();

            return Redirect::to('/');
        } else {
            return Redirect::to('user/register')->withErrors($user->errors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        if (Auth::check()) {
            echo Auth::user()->username;
        } else {
            echo 'no user';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
//
    }

    public function login() {

        if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])) {
//            $arr = ['user' => Auth::user()->username, 'id' => Auth::id()];
            return View::make('secure');
        } else {
            return Redirect::to('user.login');
        }
    }

    public function logged() {
//        echo Auth::check();
        $questions = Question::all();
        $arr = [];

        foreach ($questions as $question) {
            $arr['n'.$question->id]['id' . $question->id]['title'] = $question->title;
            $arr['n'.$question->id][$question->id]['text'] = $question->text;
            $arr['n'.$question->id][$question->id]['tags'] = $question->tags;
            $arr['n'.$question->id][$question->id]['category'] = $question->category;
        }

        $arr['count']=  count($arr);

        if (Auth::check()) {
            $arr['user'] = Auth::user()->username;
//            print_r($arr);exit;
            return View::make('secure', $arr);
        }
//        echo '<pre>'.print_r($arr,true).'</pre>';exit; //ДЕНИС, тук пробвам данните към вюто!
        return View::make('user.login', $arr);
    }

    public function logged1() {
        if (Auth::check()) {
            $arr = ['user' => Auth::user()->username, 'id' => Auth::id()];
            return View::make('secure', $arr);
        } else {
            return View::make('login');
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();

        return Redirect::to('/');
    }
}