<?php
namespace Iwan\OldSchool;

use Iwan\Scrapping\Worker;

/**
 * Class representing singe worker process
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class Process
{
    /**
     * Message queue
     * @var Queue
     */
    private $queue;

    /**
     * Page scrapper
     * @var Worker
     */
    private $scrapper;

    /**
     * A simple logger
     * @var Logger
     */
    private $logger;

    /**
     * Constructor
     * @param Queue  $queue
     * @param Worker $scrapper
     */
    public function __construct(Queue $queue, Worker $scrapper, Logger $logger)
    {
        $this->queue = $queue;
        $this->scrapper = $scrapper;
        $this->logger = $logger;
    }

    /**
     * Runs the jobs sent in from Master
     * @return void
     */
    public function run()
    {
        $msg = $this->queue->receive(2);
        if ($msg == 'die') {
            exit;
        } else {
            $start = microtime(true);
            $title = $this->scrapper->scrap($msg);
            $end = microtime(true);
            $time = $end-$start;
            $this->queue->send(1, [$msg, $title, $time]);
            $this->logger->debug("$msg\t$title\t$time");
        }
    }
}
