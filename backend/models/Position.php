<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%jobs}}".
 *
 * @property string $id
 * @property string $uid
 * @property string $jobs_name
 * @property string $companyname
 * @property string $company_id
 * @property string $company_addtime
 * @property integer $company_audit
 * @property integer $emergency
 * @property integer $stick
 * @property integer $amount
 * @property string $category_cn
 * @property integer $trade
 * @property string $scale_cn
 * @property integer $district
 * @property string $district_cn
 * @property string $tag
 * @property integer $education
 * @property string $experience_cn
 * @property integer $minwage
 * @property integer $maxwage
 * @property integer $negotiable
 * @property string $contents
 * @property string $addtime
 * @property string $deadline
 * @property string $refreshtime
 * @property integer $stime
 * @property string $setmeal_deadline
 * @property integer $setmeal_id
 * @property string $setmeal_name
 * @property integer $audit
 * @property integer $display
 * @property string $click
 * @property string $key
 * @property integer $user_status
 * @property string $department
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jobs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'jobs_name', 'companyname', 'company_id', 'company_addtime', 'stick', 'amount', 'trade', 'scale_cn', 'district', 'district_cn', 'tag', 'education', 'experience_cn', 'minwage', 'maxwage', 'negotiable', 'contents', 'addtime', 'deadline', 'refreshtime', 'stime', 'setmeal_id', 'setmeal_name', 'key', 'department'], 'required'],
            [['uid', 'company_id', 'company_addtime', 'company_audit', 'emergency', 'stick', 'amount', 'trade', 'district', 'education', 'minwage', 'maxwage', 'negotiable', 'addtime', 'deadline', 'refreshtime', 'stime', 'setmeal_deadline', 'setmeal_id', 'audit', 'display', 'click', 'user_status'], 'integer'],
            [['contents', 'key'], 'string'],
            [['jobs_name', 'companyname', 'tag'], 'string', 'max' => 50],
            [['category_cn', 'district_cn'], 'string', 'max' => 100],
            [['scale_cn', 'experience_cn'], 'string', 'max' => 30],
            [['setmeal_name', 'department'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'jobs_name' => 'Jobs Name',
            'companyname' => 'Companyname',
            'company_id' => 'Company ID',
            'company_addtime' => 'Company Addtime',
            'company_audit' => 'Company Audit',
            'emergency' => 'Emergency',
            'stick' => 'Stick',
            'amount' => 'Amount',
            'category_cn' => 'Category Cn',
            'trade' => 'Trade',
            'scale_cn' => 'Scale Cn',
            'district' => 'District',
            'district_cn' => 'District Cn',
            'tag' => 'Tag',
            'education' => 'Education',
            'experience_cn' => 'Experience Cn',
            'minwage' => 'Minwage',
            'maxwage' => 'Maxwage',
            'negotiable' => 'Negotiable',
            'contents' => 'Contents',
            'addtime' => 'Addtime',
            'deadline' => 'Deadline',
            'refreshtime' => 'Refreshtime',
            'stime' => 'Stime',
            'setmeal_deadline' => 'Setmeal Deadline',
            'setmeal_id' => 'Setmeal ID',
            'setmeal_name' => 'Setmeal Name',
            'audit' => 'Audit',
            'display' => 'Display',
            'click' => 'Click',
            'key' => 'Key',
            'user_status' => 'User Status',
            'department' => 'Department',
        ];
    }
    //获取职位列表
    public function getAll()
    {
        return $this->find()->asArray()->all();
    }


    //获取某个企业下职位
    public function getAll_one($id)
    {
        return $this->find('id','name')->where(['audit' => '1'])->andwhere(['company_id'=>$id])->asArray()->all();

    }


    //删除职位
    public function jobDel($id)
    {
         return $this->deleteAll(['id'=>$id]);
    }
}
