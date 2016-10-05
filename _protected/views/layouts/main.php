<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAssetMinify;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

AppAssetMinify::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-red sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render('header')?>
    
    <?= $this->render('sidebar')?>

    <?= $this->render('content', ['content' => $content])?>

    <?= $this->render('control-right')?>
    
</div><!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
