<?php
namespace Iwan\OldSchool\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * A scrapping command that will use fork();
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ForkScrapperCommand extends Command
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
    }

    /**
     * Configures the command
     */
    protected function configure()
    {
        $this
            ->addArgument('size', InputArgument::REQUIRED, 'Number of processes to fork')
            ->addArgument('log', InputArgument::REQUIRED, 'Path to the log file')
            ->addArgument('url', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'URLs to be scrapped')
            ->setName('oldschool:scrap')
            ->setDescription("Let's scrap some titles... with a nice fork");
    }

    /**
     * Executes the command
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $count = $input->getArgument('size', 5);
        $urls = $input->getArgument('url');

        $pids = $this->preProc($count);

        $master = $this->container->get('scrapping_master');
        $data = $master->run($count, $urls, $pids);

        $output->writeln('Done');
        $table = $this->getHelper('table');
        $table->setRows($data);
        $table->setHeaders(['URL', 'Title', 'Time']);
        $table->render($output);
    }

    /**
     * Prepares given amount of processes
     * @param  integer $count
     * @return array
     */
    private function preProc($count)
    {
        $pids = [];

        for ($i=1; $i<=$count; $i++) {
            $pid = pcntl_fork();
            if ($pid == -1) {
                continue;
            } elseif ($pid) {
                $pids[$pid] = $pid;
            } else {
                $process = $this->container->get('scrapping_process');
                while (true) {
                    $process->run();
                }
            }
        }

        return $pids;
    }
}
