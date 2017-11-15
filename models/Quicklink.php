<?php

namespace geoffry304\quicklinks\models;

use Yii; 
use \yii\db\ActiveRecord;

/** 
 * This is the base model class for table "quicklink". 
 * 
 * @property integer $id
 * @property integer $userid
 * @property string $link
 * @property string $title
 * @property string $icon
 * @property integer $newwindow
 * @property integer $position
 */ 
class Quicklink extends ActiveRecord
{  
    /** 
     * @inheritdoc 
     */ 
    public function rules() 
    { 
        return [
            [['userid', 'link'], 'required'],
            [['userid', 'newwindow', 'position'], 'integer'],
            [['link', 'title', 'icon'], 'string', 'max' => 255]
        ]; 
    } 

    /** 
     * @inheritdoc 
     */ 
    public static function tableName() 
    { 
        return 'quicklink'; 
    } 

    /** 
     * @inheritdoc 
     */ 
    public function attributeLabels() 
    { 
        return [ 
            'id' => Yii::t('quicklink', 'ID'),
            'userid' => Yii::t('quicklink', 'Userid'),
            'link' => Yii::t('quicklink', 'Link'),
            'title' => Yii::t('quicklink', 'Title'),
            'icon' => Yii::t('quicklink', 'Icon'),
            'newwindow' => Yii::t('quicklink', 'Newwindow'),
            'position' => Yii::t('quicklink', 'Position'),
        ]; 
    } 
} 
