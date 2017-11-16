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
    
    const TARGET_NONEWWINDOW = 1;
    const TARGET_NEWWINDOW = 2;
    /** 
     * @inheritdoc 
     */ 
    public function rules() 
    { 
        return [
            [['userid', 'link'], 'required'],
            [['userid', 'newwindow', 'position'], 'integer'],
            [['title', 'icon'], 'string', 'max' => 255],
            [['link'] ,'url'],
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
            'userid' => Yii::t('quicklink', 'User'),
            'link' => Yii::t('quicklink', 'Link'),
            'title' => Yii::t('quicklink', 'Title'),
            'icon' => Yii::t('quicklink', 'Icon'),
            'newwindow' => Yii::t('quicklink', 'In new window?'),
            'position' => Yii::t('quicklink', 'Position'),
        ]; 
    }
    
    public function attributeHints() {
        return [ 
            'position' => Yii::t('quicklink', 'The position from left to right in the header. eg. 1'),
        ];
    }
    
    public static function valuesNewwindow(){
        return [static::TARGET_NONEWWINDOW => Yii::t('quicklink', 'No'), static::TARGET_NEWWINDOW => Yii::t('quicklink', 'Yes')];
    }
    
    public function getUser()
{
    $class = \geoffry304\quicklinks\Module::getInstance()->modelClasses['User'];
    return $this->hasOne($class, [$class::primaryKey()[0] => 'userid']);
}

    public function geticonstyle(){
        return "<i class='fa $this->icon' aria-hidden='true'></i>";
    }
    
    public function getopeninnewwindow(){
        return ($this->newwindow) ? Yii::t('quicklink', 'No') : Yii::t('quicklink', 'Yes');
    }
} 
