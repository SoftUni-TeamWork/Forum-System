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

        if ($user->validate($userData)) {
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
            $questionData = Question::all();
        $arr = [];
//        echo '<pre>' . print_r($questions, true) . '</pre>';exit;
        foreach ($questionData as $question) {
           $arr['n' . $question->question_id]['n' . $question->question_id]['title'. $question->question_id] = $question->title;
            $arr['n' . $question->question_id]['n' . $question->question_id]['text'. $question->question_id] = $question->text;
            $arr['n' . $question->question_id]['n' . $question->question_id]['user_id'. $question->question_id] = $question->user_id;
            $arr['n' . $question->question_id]['n' . $question->question_id]['category_id'. $question->question_id] = $question->category_id;
            $arr['n' . $question->question_id]['n' . $question->question_id]['category_name'. $question->question_id] = $question->category_id;
          }

        $arr['count'] = count($arr);
            return View::make('secure',$arr);
        } else {
            return Redirect::to('user.login');
        }
    }

    public function logged() {
//        echo Auth::check();
        $questionData = Question::all();
        $arr = [];
//        echo '<pre>' . print_r($questions, true) . '</pre>';exit;
        foreach ($questionData as $question) {
            $arr['n' . $question->question_id]['n' . $question->question_id]['title'. $question->question_id] = $question->title;
            $arr['n' . $question->question_id]['n' . $question->question_id]['text'. $question->question_id] = $question->text;
            $arr['n' . $question->question_id]['n' . $question->question_id]['user_id'. $question->question_id] = $question->user_id;
            $arr['n' . $question->question_id]['n' . $question->question_id]['category_id'. $question->question_id] = $question->category_id;
            $arr['n' . $question->question_id]['n' . $question->question_id]['category_name'. $question->question_id] = $question->category_id;
        }

        $arr['count'] = count($arr);

        if (Auth::check()) {
            $arr['user'] = Auth::user()->username;
//            print_r($arr);exit;
//            echo '<pre>' . print_r($arr, true) . '</pre>';exit;
            return View::make('secure', $arr);
        }
//        echo '<pre>' . print_r($arr, true) . '</pre>';exit;
        return View::make('user.login', $arr);
    }

//maybe not in use DO NOT DELETE YET
//    public function logged1() {
//        if (Auth::check()) {
//            $arr = ['user' => Auth::user()->username, 'id' => Auth::id()];
//            return View::make('secure', $arr);
//        } else {
//            return View::make('login');
//        }
//    }

    public function logout() {
        Auth::logout();
        Session::flush();

        return Redirect::to('/');
    }

}
