<?php
namespace cURL\Tests;

use cURL;

class RequestsQueueTest extends TestCase
{
    /**
     * Test setDefaultOptions() and getDefaultOptions()
     * 
     * @return void
     */
    public function testOptions()
    {
        $q = new cURL\RequestsQueue;
        $opts = $q->getDefaultOptions();
        $this->assertInstanceOf('cURL\Options', $opts);
        $this->assertEmpty($opts->toArray());
        
        $opts = new cURL\Options;
        $opts->set(CURLOPT_URL, 'http://example-1/');
        $opts->set(CURLOPT_USERAGENT, 'browser');
        $q->setDefaultOptions($opts);
        $this->assertEquals($opts, $q->getDefaultOptions());
    }
    
    /**
     * Returns RequestsQueue for tests
     * 
     * @return RequestsQueue    Queue for tests
     */
    protected function prepareTestQueue()
    {
        $test = $this;
        $queue = new cURL\RequestsQueue;
        $queue->getDefaultOptions()
            ->set(CURLOPT_RETURNTRANSFER, true)
            ->set(CURLOPT_ENCODING, '');
        $queue->addListener(
            'complete',
            function (cURL\Event $event) use ($test) {
                $test->validateSuccesfulResponse($event->request->_path, $event->response);
            }
        );
        
        for ($i = 0; $i < 5; $i++) {
            $request = new cURL\Request;
            $request->_path = '/'.$i;
            $request->getOptions()->set(CURLOPT_URL, $this->okTestUrl.$i);
            $queue->attach($request);
        }
        
        $this->assertEquals(5, $queue->count());
        $this->assertEquals(5, count($queue));
        
        return $queue;
    }
    
    /**
     * Test request synchronous
     * 
     * @return void
     */
    public function testQueueSynchronous()
    {
        $queue = $this->prepareTestQueue();
        $queue->send();
    }
    
    /**
     * Test request asynchronous
     * 
     * @return void
     */
    public function testQueueAsynchronous()
    {
        $queue = $this->prepareTestQueue();
        
        while ($queue->socketPerform()) {
            $queue->socketSelect();
        }
        
        try {
            $queue->socketPerform();
        } catch (cURL\Exception $e) {
        }
        
        $this->assertInstanceOf('cURL\Exception', $e);
    }
    
    /**
     * Test requests attaching on run time
     * 
     * @return void
     */
    public function testRepeatOnRuntime()
    {
        $n = 0;
        $queue = $this->prepareTestQueue();
        $queue->addListener(
            'complete',
            function (cURL\Event $event) use (&$n) {
                $n++;
                $request = $event->request;
                $queue = $event->queue;
                if (!isset($request->repeat)) {
                    $request->repeat = true;
                    $queue->attach($request);
                }
            }
        );
        $queue->send();
        $this->assertEquals(10, $n);
    }
    
    /**
     * Test requests attaching on run time
     * 
     * @return void
     */
    public function testAttachNewOnRuntime()
    {
        $total = 10;
        $test = $this;
        $queue = new cURL\RequestsQueue;
        $queue->getDefaultOptions()
            ->set(CURLOPT_RETURNTRANSFER, true)
            ->set(CURLOPT_ENCODING, '');
            
        
        $n = 0;
        $attachNew = function () use ($queue, &$n, $total) {
            if ($n < $total) {
                $n++;
                $request = new cURL\Request;
                $request->_path = '/'.$n;
                $request->getOptions()->set(CURLOPT_URL, $this->okTestUrl.$n);
                $queue->attach($request);
            }
        };
        
        $attachNew();
        $queue->addListener(
            'complete',
            function (cURL\Event $event) use (&$requests, $test, $attachNew) {
                $test->validateSuccesfulResponse($event->request->_path, $event->response);
                $attachNew();
            }
        );
        $queue->send();
        $this->assertEquals($total, $n);
    }
}
