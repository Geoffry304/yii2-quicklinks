<?php

namespace geoffry304\quicklinks;

/**
 * Description of QuicklinkWidget
 *
 * @author G.Vandeneede
 */
use Yii;

class QuicklinkWidget extends \yii\base\Widget {

    const PLUGIN_NAME = 'Quicklink';

    public $sort = true;

    public function run() {
        parent::run();

        echo $this->getOutput();
    }

    public function getOutput() {
        $models = models\Quicklink::find()->where(['userid' => Yii::$app->user->id]);

        if ($this->sort) {
            $models->orderBy('position');
        }
        $models = $models->all();
        $output = "";
        if ($models) {
            $count = count($models);
            foreach ($models as $model) {
                $title = ($count > 3) ? $model->iconStyle : $model->iconStyle . " " . $model->title;
                $output .= "<li class='dropdown'>";
                if ($model->newwindow == models\Quicklink::TARGET_NEWWINDOW) {
                    $output .= \yii\helpers\Html::a($title, $model->link, ['title' => $model->title, 'target' => '_blank']);
                } else {
                    $output .= \yii\helpers\Html::a($title, $model->link, ['title' => $model->title]);
                }
                $output .= "</li>";
            }
        }
        
        return $output;
    }

}
