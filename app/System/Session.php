<?php
namespace System;
use System\FileSession;

class Session
{
    protected $storage;
    protected $id;

    public function __construct($id)
    {
        $this->storage = new FileSession($id);
        $this->id = $id;
    }

    public function start()
    {
        $this->storage->start();
    }

    public function save()
    {
        $this->storage->save();
    }

    public function set($key, $value)
    {
        $this->storage->set($key, $value);
    }
    
    public function get($key)
    {
        return $this->storage->get($key);
    }
}
