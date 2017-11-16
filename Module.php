<?php
namespace geoffry304\quicklinks;
/**
 * Description of Module
 *
 * @author G.Vandeneede
 */


use Yii;

/**
 * Class Module
 * @package geoffry304\quicklinks
 */
class Module extends yii\base\Module {
    
    
    public $controllerNamespace = "geoffry304\quicklinks\controllers";
    
    public $forceTranslation = false;
    
    public $modelClasses = [];
    
    public $modelClass = 'yii\db\ActiveRecord';
    public $controllerClass = 'yii\web\Controller';
    public $userClass = 'app\models\User';
    
    
    public function init(){
        parent::init();
        
        // set up i8n
        if (empty(Yii::$app->i18n->translations['quicklink'])) {
            Yii::$app->i18n->translations['quicklink'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
                'forceTranslation' => $this->forceTranslation,
            ];
        }
        
        // override modelClasses
        $this->modelClasses = array_merge($this->getDefaultModelClasses(), $this->modelClasses);
    }
    
    /**
     * Get default model classes
     */
    protected function getDefaultModelClasses()
    {
        // attempt to calculate user class based on user component
        //   (we do this because yii console does not have a user component)
        if (Yii::$app->get('user', false)) {
            $userClass = Yii::$app->user->identityClass;
        } elseif (class_exists('app\models\User')) {
            $userClass = 'app\models\User';
        }

        return [
            'User' => $userClass,
            'ActiveRecord' => 'yii\db\ActiveRecord',
            'Controller' => 'yii\web\Controller',
        ];
    }
}
