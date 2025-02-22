<?php
class UserValidator{
    private $data;
    private $errors=[];
    private static $fields=["name", "email","password","age","gender"];
    

    public function __construct($post_data)
    {
        $this->data=$post_data;
    }

    public function ValidateForm(){
        foreach (self::$fields as $field) {
           if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
           }
        }

        $this->ValidateName();
        $this->ValidateEmail();
        $this->ValidatePassword();
        $this->ValidateAge();
        $this->ValidateGender();
        return $this->errors;
    }


    private function ValidateName(){
        $var=trim($this->data["name"]);

        if(empty($var)){
            $this->addError("name", "name cannot be empty");
        }else{
            if(!preg_match('/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/',$var )){
                $this->addError("name", "name must be 2-50 chars and alphanumeric");   
            }
        }
    }


    private function ValidateEmail(){
        $var=trim($this->data["email"]);

        if(empty($var)){
            $this->addError("email", "email cannot be empty");
        }else{
            if(!filter_var($var,FILTER_VALIDATE_EMAIL)){
                $this->addError("email", "email must be valid");   
            };
        }
    }

    private function ValidatePassword(){
        $var=trim($this->data["password"]);

        if(empty($var)){
            $this->addError("password", "password cannot be empty");
        }else{
            if(!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/' ,$var )){
                $this->addError("password", "password must meet req");   
            }
        }
    }

    private function ValidateAge(){
        $var=trim($this->data["age"]);

        if(empty($var)){
            $this->addError("age", "age cannot be empty");
        }else{
            if($var<18){
                $this->addError("age", "age must not be less than 18");   
            }
        }
    }

    private function ValidateGender(){
        $var=trim($this->data["gender"]);

        if($var!="male"&&$var!="female"){
            $this->addError("gender", "gender cannot be empty");
        }
    }

    private function addError($key, $value){
        $this->errors[$key]=$value;
    }
}


class Logininput{
    public $data;
    public $errors=[];
    public static $fields=["email", "password"];

    public function __construct($post_data)
    {
        $this->data=$post_data;
    }

    public function ValidateForm(){
        foreach (self::$fields as $field) {
            if(!array_key_exists($field,$this->data)){
                trigger_error("$field not present in data" );
                return;
            }
        }


        $this->ValidateEmail();
        $this->ValidatePassword();
        return $this->errors;
    }


    public function ValidateEmail(){
        $var=trim($this->data["email"]);
        if(empty($var)){
            $this->addError("email", "name cannot be empty");
        }else{
            if(!filter_var($var,FILTER_VALIDATE_EMAIL)){
                $this->addError("email", "email must be valid");   
            };
        }
    }


    public function Validatepassword(){
        $var=trim($this->data["password"]);
        if(empty($var)){
            $this->addError("password", "password cannot be empty");
        }else{
            if(!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/' ,$var)){
                $this->addError("password", "password must meet req");
            }
        }
    }


    public function addError($key, $value){
        $this->errors[$key]=$value;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>