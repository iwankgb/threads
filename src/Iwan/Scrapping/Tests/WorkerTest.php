<?php
namespace Iwan\Scrapping\Tests;

use PHPUnit_Framework_TestCase;
use Mockery as m;
use Iwan\Scrapping\Worker;
use http\Client\Request;

/**
 * Page scrapper test
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class WorkerTest extends PHPUnit_Framework_TestCase
{

    /**
     * Mock of http\Client
     * @var m\Mock
     */
    private $client;

    /**
     * Mock of Symfony\Component\DomCrawler\Crawler
     * @var m\Mock
     */
    private $crawler;

    /**
     * Subject to tests
     * @var Worker
     */
    private $worker;

    protected function setUp()
    {
        parent::setUp();
        $this->client = m::mock('http\Client');
        $this->crawler = m::mock('Symfony\Component\DomCrawler\Crawler');
        $this->worker = new Worker($this->client, $this->crawler);
    }

    protected function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    public function testExample()
    {
        $this->client->shouldReceive('enqueue')->with(
            m::on(
                function (Request $request) {
                    var_dump($request->getOptions());
                }
            )
        );
        $this->worker->scrap('http://example.com');
    }
}
