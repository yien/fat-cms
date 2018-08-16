<?php
use yii\helpers\Url;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= env("ADMIN_AVATAR_URL");?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                         'label' => '系统设置',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '配置组', 'icon' => 'circle-o', 'url' => [Url::toRoute('/setting/category')],],
                            ['label' => '配置项', 'icon' => 'circle-o', 'url' => [Url::toRoute('/setting/item')],],
//                            ['label' => '支付方式', 'icon' => 'circle-o', 'url' => [Url::toRoute('/settings/setting')],],
//                            ['label' => '定时任务', 'icon' => 'circle-o', 'url' => [Url::toRoute('/settings/setting')],],
//                            ['label' => '队列服务', 'icon' => 'circle-o', 'url' => [Url::toRoute('/settings/setting')],],
//                            ['label' => '邮件服务', 'icon' => 'circle-o', 'url' => [Url::toRoute('/settings/setting')],],
                        ]
                    ],
//                    [
//                        'label' => '广告管理',
//                        'icon' => 'circle-o',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => '渠道管理', 'icon' => 'circle-o', 'url' => ['/gii'],],
//                            ['label' => '广告组管理', 'icon' => 'circle-o', 'url' => ['/debug'],],
//                            ['label' => '广告位管理', 'icon' => 'circle-o', 'url' => ['/debug'],],
//                        ],
//                    ],

//                    [
//                        'label' => '文章管理',
//                        'icon' => 'circle-o',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => '分类管理', 'icon' => 'circle-o', 'url' => ['/gii'],],
//                            ['label' => '标签管理', 'icon' => 'circle-o', 'url' => ['/debug'],],
//                            ['label' => '附件管理', 'icon' => 'circle-o', 'url' => ['/debug'],],
//                            ['label' => '文章管理', 'icon' => 'circle-o', 'url' => ['/debug'],],
//                        ],
//                    ],

                    [
                        'label' => '推广管理',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '推广模板', 'icon' => 'circle-o', 'url' => ['/gii'],],
                            ['label' => '素材管理', 'icon' => 'circle-o', 'url' => ['/debug'],],
                            ['label' => '推广链接', 'icon' => 'circle-o', 'url' => ['/debug'],],
                        ],
                    ],
                    [
                        'label' => '商品管理',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '商品分类', 'icon' => 'circle-o', 'url' => ['/gii'],],
                            ['label' => '商品列表', 'icon' => 'circle-o', 'url' => ['/debug'],],
                        ],
                    ],


                    [
                        'label' => '订单管理',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '订单列表', 'icon' => 'circle-o', 'url' => ['/gii'],],
                            ['label' => '异常补单', 'icon' => 'circle-o', 'url' => ['/debug'],],
                        ],
                    ],
                    [
                        'label' => '数据统计',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '订单统计', 'icon' => 'circle-o', 'url' => ['/gii'],],
                            ['label' => '异常补单', 'icon' => 'circle-o', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
