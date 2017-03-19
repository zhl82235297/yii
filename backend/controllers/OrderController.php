<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Order;
use backend\models\search\Order as OrderSearch;
class OrderController extends Controller
{
    public $enableCsrfValidation=false;


    //个人订单管理
    public function actionOrder(){
        //获取参数
        $get=Yii::$app->request->queryParams;
        //var_dump($get);die;
        //var_dump($date);die;
        $url=$get['r'];
        if (isset($get['settr'])) {
            $date=time()-$get['settr']*24*60*60;
            $get['addtime']=$date;
        }
        unset($get['settr']);
        unset($get['r']);
        
        $arr['Order']=$get;
        $arr['r']=$url;
        //$arr['addtime']=$date;
        //var_dump($arr);die;
        //调用搜索类
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($arr);
        //var_dump($dataProvider);die;
        $arr1=array_values($dataProvider->getModels());
        //拼接数据
        $rows=[];
        foreach ($arr1 as $k => $v) {
            foreach ($v as $key => $val) {
                    $rows[$k][$key]=$val;
            } 
        }
        //var_dump($rows);die;
    	return $this->renderPartial('index_per',['data'=>$rows]);
    }
    //个人订单详情
    public function actionOrder_show_per()
    {

        if(Yii::$app->request->ispost){
            $id=Yii::$app->request->post('id');
            $notes=Yii::$app->request->post('notes');
            $sql = "update   fen_order set notes='{$notes}' where id=$id";
            yii::$app->db->createCommand($sql)->execute();
            return $this->renderPartial('../success',array(    
                'message'=>'恭喜您，修改成功',    
                'links'=>array(    
                    array('返回详情','?r=order/order_show_per&id='.$id),    
                    array('查看主页','?r=order/order'),    
                ),    
            )); 
            //$this->success('操作成功！');exit;
        }else{
            $id=Yii::$app->request->get('id');
            $sql='select * from fen_order where id='.$id;
            $info=yii::$app->db->createCommand($sql)->queryOne();
            return $this->renderPartial('order_show_per',['info'=>$info]);
        }
        
    }
    /**
     * 个人订单设置
     */
    public function actionOrder_set_per()
    {
        if(Yii::$app->request->ispost){
            $id=Yii::$app->request->post('id');
            $notes=Yii::$app->request->post('notes');
            $sql = "update   fen_order set notes='{$notes}',is_paid=2 where id=$id";
            yii::$app->db->createCommand($sql)->execute();
            return $this->renderPartial('../success',array(    
                'message'=>'恭喜您，修改成功',    
                'links'=>array(    
                    array('返回主页','?r=order/order'),    
                    array('返回详情','?r=order/order_set_per&id='.$id),    
                ),    
            )); 
            //$this->success('操作成功！');exit;
        }else{

            $id=Yii::$app->request->get('id');
            $sql='select * from fen_order where id='.$id;
            $info=yii::$app->db->createCommand($sql)->queryOne();
            return $this->renderPartial('order_set_per',['info'=>$info]);
        }
    }
    /**
     * 个人取消订单
     */
    public function actionOrder_cancel_per()
    {

        $id=Yii::$app->request->get('id');
        $sql = "update   fen_order set is_paid=3 where id in($id)";
        //返回受影响行数
        $res=yii::$app->db->createCommand($sql)->execute();
        if ($res) {
            return $this->renderPartial('../success',array(    
                'message'=>'成功取消'.$res.'条订单！',    
                'links'=>array(    
                    array('查看主页','?r=order/order'),       
                ),    
            )); 
        }else{
            return $this->renderPartial('../success',array(    
                'message'=>'取消订单失败！',    
                'links'=>array(    
                    array('返回主页','?r=order/order'),       
                ),    
            ));
        }
    }

}
