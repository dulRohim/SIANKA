<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kontingen */

$this->title = $model->kontingen_id;
$this->params['breadcrumbs'][] = ['label' => 'Kontingens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontingen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kontingen_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kontingen_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kontingen_id',
            'kontingen_nama',
            'kontingen_official',
            'kontingen_cp',
            'username',
            'password',
            'authKey',
            'accessToken',
        ],
    ]) ?>

</div>
