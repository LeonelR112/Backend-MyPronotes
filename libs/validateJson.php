<?php

    function validateJsonPost(Object $json){

        if($json->method == "" || !is_string($json->method)){
            return false;
            die();
        }
        if($json->body == "" || !is_object($json->body)){
            return false;
            die();
        }
        if($json->body->title == "" || !is_string($json->body->title)){
            return false;
            die();
        }
        if($json->body->content == "" || !is_string($json->body->content)){
            return false;
            die();
        }
        if($json->body->created_at == "" || !is_string($json->body->created_at)){
            return false;
            die();
        }
        if($json->body->updated_at == "" || !is_string($json->body->updated_at)){
            return false;
            die();
        }

        return true;
    }


    
    function validateJsonPut(Object $json){

        if($json->method == "" || !is_string($json->method)){
            return false;
            die();
        }
        if($json->body == "" || !is_object($json->body)){
            return false;
            die();
        }
        if($json->body->id == "" || !is_numeric($json->body->id)){
            return false;
            die();
        }
        if($json->body->title == "" || !is_string($json->body->title)){
            return false;
            die();
        }
        if($json->body->content == "" || !is_string($json->body->content)){
            return false;
            die();
        }
        if($json->body->updated_at == "" || !is_string($json->body->updated_at)){
            return false;
            die();
        }

        return true;
    }

    function validateJson(Object $json){

        if($json->method == "" || !is_string($json->method)){
            return false;
            die();
        }
        if($json->body == "" || !is_object($json->body)){
            return false;
            die();
        }
        if($json->body->title == "" || !is_string($json->body->title)){
            return false;
            die();
        }
        if($json->body->content == "" || !is_string($json->body->content)){
            return false;
            die();
        }
        if($json->body->created_at == "" || !is_string($json->body->created_at)){
            return false;
            die();
        }
        if($json->body->updated_at == "" || !is_string($json->body->updated_at)){
            return false;
            die();
        }
        return true;
    }

    function validateKeysJson(Object $json){

        if(!isset($json->method)){
            return false;
            die();
        }
        if(!isset($json->body)){
            return false;
            die();
        }
        if(!isset($json->body->title)){
            return false;
            die();
        }
        if(!isset($json->body->content)){
            return false;
            die();
        }
        if(!isset($json->body->created_at)){
            return false;
            die();
        }
        if(!isset($json->body->updated_at)){
            return false;
            die();
        }

        return true;
        
    }

    
    function validateKeysJsonPut(Object $json){

        if(!isset($json->method)){
            return false;
            die();
        }
        if(!isset($json->body)){
            return false;
            die();
        }
        if(!isset($json->body->id)){
            return false;
            die();
        }
        if(!isset($json->body->title)){
            return false;
            die();
        }
        if(!isset($json->body->content)){
            return false;
            die();
        }
        if(!isset($json->body->updated_at)){
            return false;
            die();
        }

        return true;
        
    }

?>