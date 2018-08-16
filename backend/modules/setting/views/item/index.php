<?php
use kartik\grid\GridView;
$this->title = "配置项";
$this->params['breadcrumbs'][] = $this->title;
$columns = [
    [ 'class' => \kartik\grid\SerialColumn::class],
    'id',
    'cate_id',
    'name',
    'slug',
    ['attribute' => 'created_at', 'format' => ['datetime']],
    ['attribute' => 'updated_at', 'format' => ['datetime']],
    [
        'attribute' => 'status',
        'class' => \kartik\grid\BooleanColumn::className()
    ],
    [
        'class' => \kartik\grid\ActionColumn::className(),
        'dropdown' => false,
        'viewOptions' => [],
    ]
];
$createButton = \yii\helpers\Html::a('添加配置项', ['create'], ['class' => Yii::$app->params['btnStyle']]);

?>
<?= $this->render('_search', ['searchModel' => $searchModel]); ?>

<?= GridView::widget(
    [
        'autoXlFormat' => false,
        'showPageSummary' => false,
        'pageSummaryRowOptions' => ['class' => 'kv-page-summary default'],
        'export' => [
            'fontAwesome' => true,
            'showConfirmAlert' => false,
            'target' => GridView::TARGET_BLANK,
        ],
        'dataProvider' => $dataProvider,
        'pjax' => false,
        'toolbar' => [
//                $fullExport,
        ],
        'striped' => false,
        'hover' => false,
        'floatHeader' => false,
        'columns' => $columns,
        'responsive' => true,
        'condensed' => true,
        'panel' => [
            'heading' => $createButton,
            'type' => 'default',
            'after' => false,
            'before' => false
        ],

    ]

);
?>