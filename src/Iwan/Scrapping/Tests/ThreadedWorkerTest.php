<?php
namespace Iwan\Scrapping\Tests;

use Iwan\Scrapping\Worker;
use PHPUnit_Framework_TestCase;
use Mockery as m;
use Iwan\Scrapping\ThreadedWorker;

/**
 * Unit tests of thread enhanced scrapper worker
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ThreadedWorkerTest extends PHPUnit_Framework_TestCase
{
    /**
     * The worker service
     * @var m\Mock
     */
    private $worker;

    /**
     * Subject to tests
     * @var ThreadedWorker
     */
    private $threaded;

    protected function setUp()
    {
        $this->worker = m::mock('Iwan\Scrapping\Worker');
        $this->threaded = new ThreadedWorker($this->worker);
    }

    protected function tearDown()
    {
        m::close();
    }

    public function testWorker()
    {
        $this->worker->shouldReceive('scrap')->with('http://example.com/2.html')->andReturn('This is it!');

        $this->threaded->setUrl('http://example.com/2.html');
        $this->threaded->start();
        $this->threaded->join();
        $title = $this->threaded->getTitle();
        $this->assertSame('This is it!', $title);
    }
}
