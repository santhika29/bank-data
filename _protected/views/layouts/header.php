<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<!-- Main Header -->
    <header class="main-header">

        <?php use cinghie\adminlte\widgets\NavbarLogo; ?>

        <!-- logo -->
        <?= NavbarLogo::widget([
            'logo_lg' => 'Bank Data Yakes',
            'logo_mini' => 'BD-Y',
            'logo_url' => Yii::$app->homeUrl
        ]) ?>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <?= cinghie\adminlte\widgets\SidebarToggle::widget() ?>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->   
                        <!-- Navbar Right Menu -->
                            <!-- navbar user -->
                            <?= cinghie\adminlte\widgets\NavbarUser::widget([
                                'username' => Yii::$app->user->identity->username,
                                //'userimg' => Yii::$app->user->identity->profile->getImageUrl(),
                                'usercreated' => Yii::$app->user->identity->created_at,
                                'userbody' => false,
                                /*
                                'userbodyname1' => 'Account',
                                'userbodylink1' => Url::to(['/user/settings/account']),
                                'userbodyname2' => 'Profile',
                                'userbodylink2' => Url::to(['/user/settings/profile']),
                                'userbodyname3' => 'Networks',
                                'userbodylink3' => Url::to(['/user/security/networks']),
                                */
                                'userfooter' => true,
                                'userfootername1' => 'Account',
                                'userfooterlink1' => Url::to(['/user/settings/account']),
                                'userfootername2' => 'Logout',
                                'userfooterlink2' => '/site/logout'
                            ]) ?>
                </ul>
            </div>
        </nav>
    </header>