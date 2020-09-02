<?php


namespace App;


class InterviewFactory
{

    private static $instance;

    public function __call($method, $ages){

        return 'Function does n\'t exist';
    }

    public static function getInstance(){
        if(!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone(){}

    /**
     * 时间间隔
     * @param string $startTime
     * @param string $endTime
     * @return mixed
     * @throws \Exception
     */
    public function timeInterval(string $startTime,string $endTime)
    {
        $start = new \DateTime($startTime);
        $end = new \DateTime($endTime);
        return $start->diff($end)->days;
    }

    /**
     * 大驼峰式
     * @param $str
     * @return bool|string
     */
    public function greatHump($str)
    {
        $explodeStr = explode('_',$str);
        if ($explodeStr==false)
           return false;
        $returnStr = '';
        foreach ($explodeStr as $string) {
            $returnStr .= ucfirst($string);
        }
        return $returnStr;
    }

    /**
     * 上个月的最后一个周一
     * @return false|string
     */
    public function lastMonthEndFirst()
    {

        $lastMonth = date('Y-m-t',strtotime('-1 month'));
        if(date('w',$lastMonth) == 1 ){
            return $lastMonth;
        }else{
            return date('Y-m-d', strtotime('-1 monday', $lastMonth));
        }

    }

    /**
     * 微信收款
     * @param $money
     * @return false|float
     */
    public function money($money)
    {
        $shouXu = round($money * 0.003,2);

        return $money + $shouXu;
    }



}