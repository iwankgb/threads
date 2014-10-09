<?php
namespace Iwan\Scrapping\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Mutex;
use Iwan\Scrapping\Scrapped\Scrapped;
use Thread;
use Iwan\Scrapping\Stackable\Payload;

/**
 * Scrapping console command
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ScrappingStackableCommand extends Command
{
    /**
     * Dependency injection container
     * @var Container
     */
    private $container;

    /**
     * Thread pool
     * @var array
     */
    private $pool;

    /**
     * Array of Payloads
     * @var array
     */
    private $payload;

    public $done;

    /**
     * Allows to set dependency injection container
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
        $this->pool = [];
        $this->payload = [];
    }

    /**
     * Configures the command
     */
    protected function configure()
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'URL to be scrapped')
            ->setName('scrap:stackable')
            ->setDescription("Let's scrap some titles... (stackable version)");
    }

    /**
     * Executing the command
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start = microtime(true);
        $urls = $input->getArgument('url');
        $this->prepareThreads($output, 2);
        $this->doWork($urls);
        $this->closeMutex();

        $data = $this->getData();
        foreach ($data as $url => $title) {
            $output->writeln("$url\t$title");
        }

        $total = microtime(true) - $start;
        $output->writeln("<fg=red>TOTAL: $total</fg=red>");
    }

    /**
     * Returns data from the payloads
     * @return array
     */
    private function getData()
    {
        $data = [];
        foreach ($this->payload as $payload) {
            $data[$payload->getUrl()] = $payload->getTitle();
        }

        return $data;
    }

    /**
     * Do some cleanup
     */
    private function closeMutex()
    {
        foreach ($this->pool as $worker) {
            $worker->shutdown();
        }
        $loggerMutex = $this->container->get('logger_file');
        Mutex::destroy($loggerMutex);
    }

    /**
     * Dispatching the work to threads
     * @param array $urls
     */
    private function doWork(array $urls)
    {
        $i= 0;
        foreach ($urls as $url) {
            $this->payload[$i] = new Payload($url);
            $this->pool[$i % 2]->stack($this->payload[$i]);
            $i++;
        }
        foreach ($this->pool as $worker) {
            $worker->start();
        }
        foreach ($this->pool as $worker) {
            $worker->join();
        }
    }

    /**
     * Prepares thread pool
     * @param integer $count number of threads to prepare
     */
    private function prepareThreads(OutputInterface $output, $count = 5)
    {
        $this->pool = [];
        for ($i=0;$i<$count;$i++) {
            $this->pool[] = $this->container->get('threaded_scrapper_stackable');
        }
    }
}
