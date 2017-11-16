<?php

namespace geoffry304\quicklinks\controllers;

use \geoffry304\quicklinks\models\QuicklinkSearch;
use Yii;

/**
 * DefaultController
 * @package geoffry304\quicklinks\controllers;
 */
class DefaultController extends \yii\web\Controller {

    /**
     * Module Default Action.
     * @return mixed
     */
    public function actionIndex() {
        $request = \Yii::$app->request;
        $id = $request->get('id');
        if (!$id){
            $id = Yii::$app->user->id;
        }
        $searchModel = new QuicklinkSearch(['userid' => $id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($id != \Yii::$app->user->id && !Yii::$app->user->can('admin')) {
            throw new \yii\web\ForbiddenHttpException();
        } else {
            return $this->render('/quicklink/index', [
                        'id' => $id,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

}
