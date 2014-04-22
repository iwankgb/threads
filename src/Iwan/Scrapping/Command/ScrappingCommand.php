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

/**
 * Scrapping console command
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ScrappingCommand extends Command
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

    public $done;

    /**
     * Allows to set dependency injection container
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Configures the command
     */
    protected function configure()
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'URL to be scrapped')
            ->setName('scrap')
            ->setDescription("Let's scrap some titles...");
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
        $this->prepareThreads($output, count($urls));
        $this->doWork($urls);
        $total = microtime(true) - $start;
        $output->writeln("<fg=red>TOTAL: $total</fg=red>");
        $this->closeMutex();
    }

    /**
     * Do some cleanup
     */
    private function closeMutex()
    {
//        var_dump($this->pool);
        foreach ($this->pool as $worker) {
            var_dump($worker->getTerminationInfo());
        }
        $loggerMutex = $this->container->get('logger_mutex');
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
            $this->pool[$i]->setUrl($url);
            $this->pool[$i]->start();
            $this->pool[$i]->synchronized(function (Thread $thread) {
                $id = $thread->getThreadId();
                if (!$thread->done) {
                    echo "$id - synchronizing...\n";
                    sleep(5);
                    $thread->notify();
                    echo "$id - synchronized...\n";
                } else {
                    echo "$id - something is wrong...\n";
                }
            }, $this->pool[$i]);
            $i++;
        }
        foreach ($this->pool as $worker) {
//            $worker->join();
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
            $this->pool[] = $this->container->get('threaded_scrapper');
        }
    }
}
