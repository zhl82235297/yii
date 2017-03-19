<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%tui}}".
 *
 * @property integer $id
 * @property integer $jobs_id
 * @property integer $com_id
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $type
 */
class Tui extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tui}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobs_id', 'com_id', 'start_time', 'end_time', 'type'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jobs_id' => 'Jobs ID',
            'com_id' => 'Com ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'type' => 'Type',
        ];
    }


    public function  creat($data){
        /*$this->setAttributes($data);
        return $this->insert();*/
        $sql = "insert into fen_tui(jobs_id,com_id,start_time,end_time,type)values('{$data['jobs_id']}','{$data['com_id']}','{$data['start_time']}','{$data['end_time']}','{$data['type']}')";
        return yii::$app->db->createCommand($sql)->execute();
    }


    public function getAll(){
        $sql="select t.id,j.jobs_name,c.companyname,start_time,end_time,type from fen_jobs as j join fen_tui as t on j.id=t.jobs_id join fen_company_profile as c on c.id=t.com_id";
        return yii::$app->db->createCommand($sql)->queryAll();
    }
}
