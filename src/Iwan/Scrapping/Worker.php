<?php
namespace Iwan\Scrapping;

use \http\Client;
use \HttpRequest;
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
    private $request;

    /**
     * DOM document crawler
     * @var Crawler
     */
    private $crawler;

    /**
     * Class constructo
     * @param HttpRequest                           $request
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     */
    public function __construct(HttpRequest $request, Crawler $crawler)
    {
        $this->request = $request;
        $this->crawler = $crawler;
    }

    /**
     * Scraps og:title off the page content
     * @param  string $url
     * @return string
     */
    public function scrap($url)
    {
        $this->request->setMethod(HTTP_METH_GET);
        $this->request->setUrl($url);
        $response = $this->request->send();

        $this->crawler->addHtmlContent($response->getBody());
        $subCrawler = $this->crawler->filterXPath('//head/meta[@property="og:title"]');
        $meta = $subCrawler->getNode(0);

        return $meta->getAttribute('content');
    }
}
