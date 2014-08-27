<?php

abstract class BaseModel extends Eloquent {
    public $rules;
    public $errorDefinitions;
    public $errors;

    public function validate($data) {
        // make a new validator object
        $validator = Validator::make($data, $this->rules, $this->errorDefinitions);

        // check for failure
        if ($validator->fails()) {
            // set errors and return false
            $this->errors = $validator->errors();

            return false;
        }

        // validation pass
        return true;
    }

    public abstract function setData($data);
}