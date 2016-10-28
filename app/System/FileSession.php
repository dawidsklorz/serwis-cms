<?php
namespace System;

class FileSession
{
    protected $data = [];           
    protected $fileName;            
    protected $id;                  

    public function __construct($id)                                                 
    {
        $this->id = $id;
        $this->fileName  = "./session".$id.".json";
    }

    public function start()                                                          
    {
        if(is_file($this->fileName))
        {
            $this->data = json_decode(file_get_contents($this->fileName), true);     
        }
        else
        {
            file_put_contents($this->fileName, "");
        }
    }

    public function save()                                                           
    {
        $json = json_encode($this->data);
        file_put_contents($this->fileName, $json);
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}
