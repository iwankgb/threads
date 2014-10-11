<?php
namespace Iwan\OldSchool;

class Semaphore
{
    private $semaphore;

    public function __construct($key)
    {
        $this->semaphore = sem_get($key);
    }

    public function acquire()
    {
        sem_acquire($this->semaphore);
    }

    public function release()
    {
        sem_release($this->semaphore);
    }

    public function remove()
    {
        sem_remove($this->semaphore);
    }
}
