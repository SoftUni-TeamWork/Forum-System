<?php

/**
 * Created by PhpStorm.
 * User: d.georgiev.91
 * Date: 14-8-25
 * Time: 0:57
 */
class Question extends BaseModel {

    function  __construct() {
        $this->rules = [
            //to do add rules
        ];

        $this->errorDefinitions = [
            //to do add error messages
        ];
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    public $timestamps = false;
    protected $primaryKey = 'question_id';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'auth_token');

    public function validate($questionData) {
        return parent::validate($questionData);
    }

    public function setData($questionData) {
        //to do implement
    }
} 