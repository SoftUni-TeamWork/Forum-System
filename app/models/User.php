<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    function __construct() {
        $this->rules = [
            'username' => 'required|min:5|unique:users',
            'password' => 'required|min:6',
            'password-confirm' => 'same:password',
            'email' => 'required|email|unique:users'
        ];

        $this->errorDefinitions = [
            'username.required' => 'потребителското име е задължително',
            'username.unique' => 'има такъв потребител',
            'username.min' => 'поне 5 символа',
            'password.required' => 'паролата е задължителна',
            'password.min' => 'поне 6 символа',
            'password-confirm.same' => 'паролите не съвпадат',
            'email.unique' => 'вече съществува email'
        ];
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    public $timestamps = false;
    protected $primaryKey = 'user_id';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'auth_token');

    public function validate($questionData) {
        return parent::validate($questionData);
    }

    public function setData($userData) {
        $this->username = $userData['username'];
        $this->password = Hash::make($userData['password']);
        $this->email = $userData['email'];
//        $this->registered_on = new DateTime();
    }
}