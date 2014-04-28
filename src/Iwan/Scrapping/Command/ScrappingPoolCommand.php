<?php
namespace Iwan\Scrapping\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Pool;
use Iwan\Scrapping\Stackable\ThreadedWorker;
use Iwan\Scrapping\Stackable\Payload;

/**
 * BBC scrapping using thread pool
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ScrappingPoolCommand extends Command
{
    /**
     * Dependency injection container
     * @var Container
     */
    private $container;

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
            ->addArgument('size', InputArgument::REQUIRED, 'Number of workers to create')
            ->addArgument('log', InputArgument::REQUIRED, 'Path to the log file')
            ->addArgument('url', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'URL to be scrapped')
            ->setName('scrap:pool')
            ->setDescription("Let's scrap some titles... (worker pool version)");
    }

    /**
     * Executes the command
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $size = $input->getArgument('size');
        $urls = $input->getArgument('url');

        $pool = $this->preparePool($size);
        foreach ($urls as $url) {
            $payload = new Payload($url);
            $pool->submit($payload);
        }
        $pool->shutdown();

        $pool->collect(function (Payload $work) use ($output) {
            $output->writeln($work->getUrl() . "\t" . $work->getTitle());
        });
    }

    /**
     * Prepares worker pool
     * @param  integer $size worker pool size
     * @return Pool
     */
    private function preparePool($size)
    {
        $pool = new Pool(
            $size,
            ThreadedWorker::class,
            [
                $this->container->get('scrapper'),
                $this->container->get('logger_mutex_stackable'),
                $size,
            ]
        );

        return $pool;
    }
}
