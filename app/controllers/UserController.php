<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('registerForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $user = User::where('username', '=', Input::get('username'))->first();


        if ($user !== NULL) {
            $msg = ['msg' => 'Има такъв потребител'];
            return Redirect::to('user/register')->withErrors($msg);
        } else {
            echo 'user is NOT here';
            $data = Input::all();
            $rules = [
                'username' => 'required|min:6',
                'password' => 'required|min:6'
            ];
            $validator = Validator::make($data, $rules, ['username.required' => 'поне 6 символа',
                        'username.min' => 'поне 6 символа',
                        'password.required' => 'поне 6 символа',
                        'password.min' => 'поне 6 символа']);
            if ($validator->fails()) {

                return Redirect::to('user/register')->withErrors($validator)->withInput();
            } else {
                $user = new User();
                $user->username = Input::get('username');
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                $msg = ['msg' => 'Успешно създаден потребител!'];
                return Redirect::to('user/register')->withErrors($msg);
            }
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
            return Redirect::to('user/login');
        }
    }

    public function logged() {
//        echo Auth::check();
        $questions = Questions::all();
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
        }
//        echo '<pre>'.print_r($arr,true).'</pre>';exit; //ДЕНИС, тук пробвам данните към вюто!
        return View::make('hello', $arr);
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
//        echo 'dfdf';
        Auth::logout();
        Session::flush();

        return Redirect::to('/');
    }

}
