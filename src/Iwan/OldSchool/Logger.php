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
        fwrite($this->file, getmypid() . "\t$strDate\t$level\t$message\n");
        fwrite($this->file, getmypid() . "\t$strDate\t$level\t" . json_encode($context) . "\n");
        $this->semaphore->release();
    }
}
