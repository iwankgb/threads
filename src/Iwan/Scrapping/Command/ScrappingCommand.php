<?php
namespace Iwan\Scrapping\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
            ->addArgument('url', InputArgument::REQUIRED, 'URL to be scrapped')
            ->setName('scrap')
            ->setDescription("Let's scrap some titles...");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $scrapper = $this->container->get('scrapper');
        $title = $scrapper->scrap($url);
        $output->writeln($title);
    }
}
