<?php
namespace Iwan\Scrapping\Stackable;

use \Stackable;
/**
 * Description of Payload
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class Payload extends Stackable
{
    /**
     * URL to be retrived
     * @var string
     */
    private $url;

    /**
     * Scrapped title
     * @var string
     */
    private $title;

    /**
     * Constructor
     * @param string $url URL to be scrapped
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * When using Stackable then this method really runs the task
     */
    public function run()
    {
        $this->worker->setUrl($this->url);
        $this->title = $this->worker->go();
    }

    /**
     * Returns URL to be retrieved
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Returns title scraped from the URL
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
