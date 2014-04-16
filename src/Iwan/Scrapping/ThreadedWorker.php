<?php
namespace Iwan\Scrapping;

use \Thread;

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
     * Scrapped title
     * @var string
     */
    private $title;

    /**
     * Class constructor
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
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
     * Gets scrapped title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * This method really runs the task
     * @param string $url
     */
    public function run()
    {
        $this->title = $this->worker->scrap($this->url);
    }
}
