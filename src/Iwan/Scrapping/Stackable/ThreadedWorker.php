<?php
namespace Iwan\Scrapping\Stackable;

use \Worker;
use Iwan\Scrapping\Worker as ScrappingWorker;
use \Mutex;

/**
 * Worker that is capable of using stackable
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ThreadedWorker extends Worker
{
    /**
     * Class that performs scrapping
     * @var Worker
     */
    protected $worker;

    /**
     * URL to be scrapped
     * @var string
     */
    protected $url;

    /**
     * Output mutex
     * @var long
     */
    protected $logMutex;

    /**
     * Log file
     * @var SplFileObject
     */
    protected $file;

    /**
     * Class constructor
     * @param Worker $worker
     */
    public function __construct(ScrappingWorker $worker, $logMutex, $file)
    {
        $this->worker = $worker;
        $this->logMutex = $logMutex;
        $this->file = $file;
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
    public function go()
    {
        $start = microtime(true);
        $this->log("Running with url: {$this->url}");
        $title = $this->worker->scrap($this->url);
        $this->log("Title: $title");
        $total = microtime(true) - $start;
        $this->log("Running for: $total");

        return $title;
    }

    /**
     * This method just has to exist and should set up the environment
     * @param string $url
     */
    public function run()
    {
        $this->log('run() called...');
    }

    /**
     * Logs messages to application log
     * @param string  $msg   message to be logged
     * @param integer $level log level
     */
    protected function log($msg)
    {
        Mutex::lock($this->logMutex);
        echo "Stackable THREAD {$this->getThreadId()}:\t$msg\n";
        $file = fopen($this->file, 'a');
        fwrite($file, "Stackable THREAD {$this->getThreadId()}:\t$msg\n");
        fclose($file);
        Mutex::unlock($this->logMutex);
    }
}
