<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

rmrevin\yii\ionicon\AssetBundle::register($this);
rmrevin\yii\fontawesome\AssetBundle::register($this);
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../web/images/skc_icon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <?= $this->render('navbar.php') ?>
        <?= $this->render('sidebar.php') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1><?= $this->title ?></h1>
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <?= $content ?>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            </div>
            <?= Yii::powered() ?>
        </footer>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
