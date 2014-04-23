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

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function run()
    {
        $this->worker->setUrl($this->url);
        $this->worker->go();
    }

    public function getUrl()
    {
        return $this->url;
    }
}
