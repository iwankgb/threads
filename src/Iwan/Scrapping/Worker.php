<?php
namespace Iwan\Scrapping;

use \http\Client;
use \http\Client\Request;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Page scrapping worker; scraps title only
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class Worker
{

    /**
     * Http client
     * @var Client
     */
    private $client;

    /**
     * DOM document crawler
     * @var Crawler
     */
    private $crawler;

    public function __construct(Client $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    public function scrap($url)
    {
        $request = new Request('GET', $url);
        $this->client->enqueue($request);
    }
}
