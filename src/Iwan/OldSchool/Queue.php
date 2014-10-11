<?php
namespace Iwan\OldSchool;

/**
 * Class represents IPC message queue.
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class Queue
{
    /**
     * Message queue
     * @var resource
     */
    private $queue;

    /**
     * Max message size
     * @var integer
     */
    private $size;

    /**
     * A logger
     * @var Logger
     */
    private $logger;

    /**
     * Constructor
     * @param integer $id
     * @param integer $size
     */
    public function __construct($id, $size, Logger $logger)
    {
        $this->queue = msg_get_queue($id);
        $this->size = $size;
        $this->logger = $logger;
    }

    /**
     * Destroys the queue
     * @return void
     */
    public function kill()
    {
        msg_remove_queue($this->queue);
    }

    /**
     * Sends message
     * @param  integer $type
     * @param  string  $msg
     * @return void
     */
    public function send($type, $msg)
    {
        $err = 0;
        if (!msg_send($this->queue, $type, $msg, true, false, $err)) {
            $this->logger->critical("Message of type $type not sent: $err", (array) $msg);
        } else {
            $this->logger->debug("Message of type $type sent", (array) $msg);
        }
    }

    /**
     * Waits for and receives a message
     * @param  integer $type
     * @return mixed
     */
    public function receive($type)
    {
        $rcvType = 0;
        $msg = '';
        msg_receive($this->queue, $type, $rcvType, $this->size, $msg);

        return $msg;
    }
}
