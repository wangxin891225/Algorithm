<?php
/**
 * 链表队列
 * User: wangx
 * Date: 2019/11/1
 * Time: 16:24
 */
//function myLoad( $class ) {
//    $file = $class . '.php';
//    if (is_file($file)) {
//        require_once($file);
//    }
//}
//
//spl_autoload_register( 'myLoad' );

class Node
{
    public $val;
    public $next;
    public function __construct( $val = null, $next = null )
    {
        $this->val  = $val;
        $this->next = $next;
    }
}

class LinkQueue
{
    public $tail;    //尾节点
    public $head;
    public $size;           //长度

    public function __construct()
    {
        $this->head = new Node();
    }

    /**
     * push
     * @param $value
     */
    public function push( $value ){
//        var_dump($this->head->val,$this->tail)."<br>";
        if( $this->head->val==null ){
            $this->tail = new Node( $value );
            $this->head = $this->tail;
        }else{
            $this->tail->next =  new Node( $value );
//            var_dump($this->head);
            $this->tail = $this->tail->next;
        }
        $this->size++;
    }

    /**
     * pop
     * @return null
     * @throws \Exception
     */
    public function pop(){
        if( $this->size<=0 )
            throw new \Exception('超过链表范围');
        $val = $this->head->val;
        $this->head = $this->head->next;

        $this->size--;
        return $val;
    }

    /**
     * 查看队首
     */
    public function checkHead(){
        return $this->head->val;
    }

    /**
     * 查看队尾
     */
    public function checkEnd(){
        return $this->tail->val;
    }

    /**
     * toString
     */
    public function toString(){
        $r = [];
        while( $this->head ){
            $r[] = $this->head->val;
            $this->head = $this->head->next;
        }
        return implode('->',$r);
    }
}

echo "<pre>";
$queue = new LinkQueue();
$queue->push(1);
//var_dump($queue->tail,$queue->head);echo "<br>";
$queue->push(3);
//var_dump($queue->tail,$queue->head);exit;
$queue->push(6);
$queue->push(9);
var_dump($queue->tail,$queue->head,$queue->size);

print_r($queue->pop());
var_dump($queue->tail,$queue->head,$queue->size);exit;
//print_r($queue->checkHead());
//print_r($queue->checkEnd());
//print_r($queue->toString());