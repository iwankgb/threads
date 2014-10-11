<?php
namespace Iwan\OldSchool;

/**
 * Description of Master
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class Master
{
    /**
     * Message queue
     * @var Queue
     */
    private $queue;

    /**
     * Constructor
     * @param Queue $queue
     */
    public function __construct(Queue $queue)
    {
        $this->queue = $queue;
    }

    /**
     * Communicates with childs and sends the jobs
     * @param  integer $count
     * @param  array   $urls
     * @param  array   $pids
     * @return array
     */
    public function run($count, array $urls, array $pids)
    {
        $data = [];
        $status = 0;
        foreach ($urls as $url) {
            $this->queue->send(2, $url);
        }

        while (count($urls)) {
            $result = $this->queue->receive(1);
            $data[] = $result;
            array_shift($urls);
        }

        for ($i=1; $i<=$count; $i++) {
            $this->queue->send(2, 'die');
        }

        foreach ($pids as $pid) {
            pcntl_waitpid($pid, $status);
            unset($pids[$pid]);
        }

        $this->queue->kill();

        return $data;
    }
}
