<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuicklinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('quicklink', 'Quicklinks');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
?>
<div class="quicklink-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable-quicklink',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['quicklink/create', 'userid' => $id],
                    ['role'=>'modal-remote','title'=> Yii::t('quicklink','Create new Quicklinks'),'class'=>'btn btn-success']).
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> '. Yii::t('quicklink','Quicklinks'),
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; '. Yii::t('quicklink','Delete all'),
                                ["quicklink/bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>Yii::t('quicklink','Are you sure?'),
                                    'data-confirm-message'=>Yii::t('quicklink','Are you sure you want to delete this item')
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "size"=>"modal-md",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
