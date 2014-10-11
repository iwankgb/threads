<?php
namespace Iwan\Scrapping\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Pool;
use Iwan\Scrapping\Pool\ThreadedWorker;
use Iwan\Scrapping\Stackable\Payload;
use \SplObjectStorage;
use \stdClass;
use Symfony\Component\Console\Helper\Table;

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
        $log = $input->getArgument('log');

        $pool = $this->preparePool($size, $log);
        foreach ($urls as $url) {
            $payload = new Payload($url);
            $pool->submit($payload);
        }
        $pool->shutdown();

        $data = new SplObjectStorage();
        $pool->collect(function (Payload $work) use ($data) {
            $item = new stdClass();
            $item->title = $work->getTitle();
            $item->url = $work->getUrl();
            $data->attach($item);

            return true;
        });

        $arrData = [];
        foreach ($data as $item) {
            $arrData[] = [
                $item->url,
                $item->title,
            ];
        }

        $table = new Table($output);
        $table
            ->setHeaders(['URL', 'Title'])
            ->setRows($arrData);
        $table->render();
    }

    /**
     * Prepares worker pool
     * @param  integer $size worker pool size
     * @param  string  $log  path to log file
     * @return Pool
     */
    private function preparePool($size, $log)
    {
        $pool = new Pool(
            $size,
            ThreadedWorker::class,
            [
                function () {return $this->container->get('scrapper');},
                function () {return $this->container->get('logger_file');},
                $log,
            ]
        );

        return $pool;
    }
}
