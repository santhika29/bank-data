<?php
use yii\helpers\Html;
?>
<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <?= cinghie\adminlte\widgets\SidebarUser::widget(['username' => Yii::$app->user->identity->username,]) ?>

            <!-- Sidebar Menu -->
            <?php
                $menuItems[] = ['label' => 'Menu Bank Data', 'options' => ['class' => 'header']];
                // we do not need to display About and Contact pages to employee+ roles
                /*
                if (!Yii::$app->user->can('employee')) {
                    $menuItems[] = ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']];
                    $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
                }
                */
                //only employee+ can see this menu
                if (Yii::$app->user->can('employee')) {
                    $menuItems[] = ['label' => 'Master TPK', 'url' => ['/mastertpk/index'],'icon' => 'fa fa-building-o'];
                    $menuItems[] = ['label' => 'Peserta', 'url' => ['/peserta/index'],'icon' => 'fa fa-user'];  
                }

                // display Users to admin+ roles
                if (Yii::$app->user->can('admin')){
                    $menuItems[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index'],'icon' => 'fa fa-user-secret'];
                    
                }
                
                // display Logout to logged in users
                /*
                if (!Yii::$app->user->isGuest) {
                    $menuItems[] = [
                        'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post'],
                    ];
                }
                */

                // display Signup and Login pages to guests of the site
                if (Yii::$app->user->isGuest) {
                    //$menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
                    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
                }
            ?>
            <?= cinghie\adminlte\widgets\SidebarMenu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>