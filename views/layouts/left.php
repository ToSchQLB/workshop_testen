<aside class="main-sidebar">

    <section class="sidebar" style="position: sticky; top: 60px">

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Projekte', 'icon'=> \app\models\Projekt::$icon, 'url'=>['/projekt']],
                    ['label' => 'Tickets', 'icon'=> \app\models\Ticket::$icon, 'url'=>['/ticket']],
                    ['label' => 'Admin', 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->can('Admin')],
                    ['label' => 'Ticket-Status', 'url' => ['/ticket-status'], 'visible' => Yii::$app->user->can('Admin')],
                    ['label' => 'Ticket-Kategorie', 'url' => ['/ticket-kategorie'], 'visible' => Yii::$app->user->can('Admin')],
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ],
                    ],
                    ['label' => 'User-Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Logout', 'url' => ['/user/security/logout'], 'visible' => !Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
