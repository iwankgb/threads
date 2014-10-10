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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $count = $input->getArgument('size', 5);
        $urls = $input->getArgument('url');
        $output->writeln('Processes to be forked: ' . $count);
        $pids = [];
        $data = [];

        $q = msg_get_queue(getmypid());
        $status = 0;

        for ($i=1; $i<=$count; $i++) {
            $output->writeln('Forking: ' . $i);
            $pid = pcntl_fork();
            if ($pid == -1) {
                continue;
            } elseif ($pid) {
                $pids[$pid] = $pid;
            } else {
                while (true) {
                    $type = 0;
                    $msg = '';
                    msg_receive($q, 2, $type, 1024, $msg);
                    if ($msg == 'die') {
                        $output->writeln(getmypid() . ': to die, in the rain...');
                        exit;
                    } else {
                        $url = $msg;
                        $start = microtime(true);
                        $output->writeln("Child: " . getmypid() . "\n");
                        $scrapper = $this->container->get('scrapper');
//                        $url = 'http://www.bbc.com/news/world-africa-29577175';
                        $title = $scrapper->scrap($url);
                        $end = microtime(true);
                        $output->writeln($url .": " . $title);
                        $output->writeln("TIME\t" . $start ."\t" . $end);
                        msg_send($q, 1, [$url, $title, $start, $end]);
                    }
                }
            }
        }

        foreach ($urls as $url) {
            $output->writeln("Sending URL");
            msg_send($q, 2, $url);
        }

        while (count($urls)) {
            $output->writeln('czekam');
            $type = 0;
            $msg = '';
            msg_receive($q, 1, $type, 1024, $msg);
            $msg[2] = $msg[3]-$msg[2];
            unset($msg[3]);
            $data[]= $msg;
            array_shift($urls);
        }

        for ($i=1; $i<=$count; $i++) {
            $output->writeln("Sending die");
            msg_send($q, 2, 'die');
        }

        foreach ($pids as $pid) {
            pcntl_waitpid($pid, $status);
            unset($pids[$pid]);
        }

        msg_remove_queue($q);

        $output->writeln('Done');
        $table = $this->getHelper('table');
        $table->setRows($data);
        $table->setHeaders(['URL', 'Title', 'Time']);
        $table->render($output);
    }
}
