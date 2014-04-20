<?php
namespace Iwan\Scrapping\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Mutex;

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
        $i= 0;
        foreach ($urls as $url) {
            $this->pool[$i]->setUrl($url);
            $output->writeln("<info>{$this->pool[$i]->getThreadId()}: start</info>");
            $this->pool[$i++]->start();
        }
        foreach ($this->pool as $worker) {
            $output->writeln("<info>{$worker->getThreadId()}: join</info>");
            $worker->join();
        }
        $total = microtime(true) - $start;
        $output->writeln("<fg=red>TOTAL: $total</fg=red>");
        $loggerMutex = $this->container->get('logger_mutex');
        Mutex::destroy($loggerMutex);
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
