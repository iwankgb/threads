<?php
namespace Iwan\Scrapping\Pool;

use Iwan\Scrapping\Stackable\ThreadedWorker as BaseWorker;
//use \Callable;

/**
 * Description of ThreadedWorker
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class ThreadedWorker extends BaseWorker
{
    public function __construct(Callable $worker, Callable $logMutex, $file)
    {
        parent::__construct($worker(), $logMutex(), $file);
    }
}
