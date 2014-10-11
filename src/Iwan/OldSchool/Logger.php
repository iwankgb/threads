<?php
namespace Iwan\OldSchool;

use Psr\Log\AbstractLogger;
use \DateTime;

class Logger extends AbstractLogger
{
    private $semaphore;
    private $file;

    public function __construct(Semaphore $semaphore, $file)
    {
        $this->semaphore = $semaphore;
        $this->file = fopen($file, 'a');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function log($level, $message, array $context = array())
    {
        $now = new DateTime();
        $strDate = $now->format('c');
        $this->semaphore->acquire();
        fwrite($this->file, "$strDate $level: $message\n$strDate $level: " . json_encode($context));
        $this->semaphore->release();
    }
}
