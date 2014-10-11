<?php
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use \Pool;
use Iwan\Scrapping\Stackable\Payload;
use Iwan\Scrapping\Pool\ThreadedWorker;
/**
 * This is just proof of concept. Running pthreads using php-fpm
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../config/'));
$loader->load('services.yml');
$container->compile();

$pool = new Pool(
    2,
    ThreadedWorker::class,
    [
        function () use ($container) {return $container->get('scrapper');},
        function () use ($container) {return $container->get('logger_file');},
        '/home/maciek/projects/threads/threads.log',
    ]
);
$urls = [
    'http://www.bbc.com/news/world-asia-27096629',
    'http://www.bbc.com/future/story/20140418-the-top-attenborough-moments',
    'http://www.bbc.com/news/world-europe-27124453',
    'http://www.bbc.com/news/world-middle-east-27128902',
    'http://www.bbc.co.uk/news/world-middle-east-27186339',
    'http://www.bbc.co.uk/sport/football/27194672',
    'http://www.bbc.co.uk/news/entertainment-arts-27194863',
    'http://www.bbc.co.uk/news/entertainment-arts-27186593',
    'http://www.bbc.co.uk/news/technology-27187615',
    'http://www.bbc.com/autos/story/20140428-what-your-car-says-about-you',
    'http://www.bbc.com/future/story/20140428-the-myth-of-tech-revolutions',
    'http://www.bbc.co.uk/arabic/middleeast/2014/04/140428_april6_reaction_verdict.shtml',
    'http://www.bbc.co.uk/russian/international/2014/04/140428_us_russia_new_sanctions.shtml',
    'http://www.bbc.co.uk/burmese/world/2014/04/140428_obama_philippines.shtml',
    'http://www.bbc.co.uk/tamil/sri_lanka/2014/04/140428_npcpta.shtml',
    'http://www.bbc.co.uk/pashto/world/2014/04/140428_ma_egypt_court.shtml',
    'http://www.bbc.co.uk/nepali/news/2014/04/140428_barassociation.shtml',
    'http://www.bbc.co.uk/burmese/burma/2014/04/140428_ethnic_gov_peace_talk_problem.shtml',
];

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

header('Content-Type: text/html; charset=utf8');
?>
<html>
    <body>
        <table>
            <tr>
                <th>Title</th>
                <th>URL</th>
            </tr>
            <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row->title ?></td>
                <td><?php echo $row->url ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
