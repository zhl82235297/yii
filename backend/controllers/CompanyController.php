<?php

namespace backend\controllers;




use Yii;
use yii\web\Controller;
use \backend\models\CompanyProfile;
use \backend\models\Position;
use \backend\models\Tui;
use backend\models\search\CompanyProfile as CompanyProfileSearch;


class CompanyController extends Controller

{
    public $enableCsrfValidation=false;
    
    public function actionCompanyprofile(){

       $get=Yii::$app->request->queryParams;
       
        $url=$get['r'];
        if (isset($get['addtime'])) {
            $date=time()-$get['addtime']*24*60*60;
            $get['addtime']=$date;
        }
        unset($get['addtime']);
        unset($get['r']);
        
        $arr['CompanyProfile']=$get;
        $arr['r']=$url;
        //$arr['addtime']=$date;
        //var_dump($arr);die;
        //调用搜索类
        $searchModel = new CompanyProfileSearch();
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
      return $this->renderPartial('ent_list',['data'=>$rows]);
    }


    
    public function actionEnt_list(){
    	//企業列表
        $model=new CompanyProfile();
        $data=$model->getAll();
        foreach ($data as $key => $v) {
            $data[$key]['addtime']=date('m-d H:i:s',$v['addtime']);
            $data[$key]['refreshtime']=date('m-d H:i:s',$v['refreshtime']);
        }
       
    	return $this->renderPartial('ent_list',['data'=>$data]);
    }
    
     public function actionSearch(){
      $model=new CompanyProfile();
      $cname=$model->attributes=$_GET['cname'];
      //print_r($cname);
       $res=$model->searchname($cname);
       
       if(empty($res)){
        
        echo 0;
       
       }else{
        
        echo json_encode($res);
       
       }

  
     }

     public function actionShan(){
        $model=new CompanyProfile();
        
        $id=$model->attributes=$_GET['id'];
        
        $res=$model->pi($id);
        
        if($res){
            echo 0;
        }else{
            echo 1;
        }
     }

     public  function actionDel(){
 
       $model=new CompanyProfile();
       $id=$model->attributes=$_GET['id'];
       $res=$model->upda($id);
       
       if($res){
      
            return $this->renderPartial('../success',array(    
                'message'=>'恭喜您，删除成功',    
                'links'=>array(    
                    array('返回主页','?r=company/ent_list'),    
                    array('返回详情','?r=company/ent_list&id='.$id),    
                ),
            ));


       }else{
            return $this->renderPartial('../success',array(    
                'message'=>'删除失败',    
                'links'=>array(    
                    array('返回主页','?r=company/ent_list'),    
                    array('返回详情','?r=company/ent_list&id='.$id),    
                ),    
            )); 
       }

     }
    

    
    public function actionTra(){

       //$model=new CompanyProfile();
       
        
        $id=$_GET['id'];
        
        if(isset($_GET['trade'])){
          
          $trade=$_GET['trade'];
          $sql="update fen_company_profile set trade='$trade' where id in($id)";
          $res= yii::$app->db->createCommand($sql)->execute();
           //$res=$model->trades($trade,$id);

        }else if(isset($_GET['famous'])){
      
          $famous=$_GET['famous'];
          $sql="update fen_company_profile set famous='$famous' where id in($id)";
          $res= yii::$app->db->createCommand($sql)->execute();
           //$res=$model->trades($famous,$id);
           }
       
            if($res){
                echo 0;
            }else{
                echo 1;
            }
        }





    public function actionEnt_promotion(){
      $model=new Tui();
      $data=$model->getAll();
    	//企業推廣
    	return $this->renderPartial('ent_promotion',['data'=>$data]);
    }
    public function actionEnt_promotion_add(){
        $model=new CompanyProfile();
        $data=$model->getAll();
        //添加企業推廣
        return $this->renderPartial('spread.html',['data'=>$data]);
        //echo 123;
    }
    //根据企业ID获取对应企业的职位进行推广
    public function actionZw(){
        $id=YII::$app->request->get();
        $model=new Position();
        $data=$model->getAll_one($id['id']);
        echo json_encode($data);
    }
    //推广职位入库
    public function actionTg_add(){
        $post=YII::$app->request->post();
        $post['start_time']=strtotime($post['start_time']);
        $post['end_time']=strtotime($post['end_time'])+3600*24;
        $model=new Tui();
        if($model->creat($post)){
          $this->redirect(['ent_promotion']);
        }
    }

    public function actionIncrement(){
    	//增值服務
    	return $this->renderPartial('increment');
    }
     public function actionJob_list(){

        //職位列表
        $model = new position();
        $arr = $model->getAll();
        return $this->renderPartial('job_list',array('arr' => $arr));
    }
    //单删除
    public function actionJob_del()
    {
        $model = new Position();  
        $id = Yii::$app->request->get('id');
        $arr = $model->jobDel($id);
        echo $arr;
    }
    //批量删除
    public function actionAll_del()
    {
        $model = new Position();
        $data = Yii::$app->request->get('id');
        //处理数据
        $id = explode(',',$data);
        if($model->jobDel($id)){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    public function actionMember(){
    	//企業会员
    	return $this->renderPartial('member');
    }
    public function actionOrder(){
    	//訂單管理
    	return $this->renderPartial('order');
    }

}