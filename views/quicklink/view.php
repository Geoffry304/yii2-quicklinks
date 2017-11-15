<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Quicklink */
?>
<div class="quicklink-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userid',
            'link',
            'title',
            'icon',
            'newwindow',
            'position',
        ],
    ]) ?>

</div>
