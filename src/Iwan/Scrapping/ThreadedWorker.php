<?php
namespace Iwan\Scrapping;

use \Thread;
use \Mutex;

/**
 * Pthreads enhanced scrapper
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ThreadedWorker extends Thread
{
    /**
     * Class that performs scrapping
     * @var Worker
     */
    private $worker;

    /**
     * URL to be scrapped
     * @var string
     */
    private $url;

    /**
     * Output mutex
     * @var long
     */
    private $logMutex;

    /**
     * Log file
     * @var SplFileObject
     */
    private $file;

    /**
     * Class constructor
     * @param Worker $worker
     */
    public function __construct(Worker $worker, $logMutex, $file)
    {
        $this->worker = $worker;
        $this->logMutex = $logMutex;
    }

    /**
     * Desctructor - we really need to close the file
     */
    public function __destruct()
    {

    }

    /**
     * Setting the URL
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * This method really runs the task
     * @param string $url
     */
    public function run()
    {
        $this->done = false;
        $start = microtime(true);
        $this->log("Running with url: {$this->url}");
        $title = $this->worker->scrap($this->url);
        $this->log("Title: $title");
        $total = microtime(true) - $start;
        $this->log("Running for: $total");
    }

    /**
     * Logs messages to application log
     * @param string  $msg   message to be logged
     * @param integer $level log level
     */
    private function log($msg)
    {
//        Mutex::lock($this->logMutex);
//        echo " Scrapping THREAD {$this->getThreadId()}:\t$msg\n";
//        $this->file = fopen($file, 'a');
//        fwrite($this->file, "Scrapping THREAD {$this->getThreadId()}:\t$msg\n");
//        fclose($this->file);
//        Mutex::unlock($this->logMutex);
    }
}
