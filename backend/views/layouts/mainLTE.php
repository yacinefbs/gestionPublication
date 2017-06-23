<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class='skin-blue sidebar-mini wysihtml5-supported'>
<?php $this->beginBody() ?>

<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="?r=site" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
     <?php
    NavBar::begin([
        'innerContainerOptions'=>['class'=>'navbar-custom-menu'],
        'options' => [
            'class' => 'navbar navbar-static-top',
        ],
    ]);

    $menuItems = [
        
    ];

    $menuItems[]='<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>';

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li class="dropdown pull-right">'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav '],
        'items' => $menuItems,

    ]);
    NavBar::end();
    ?>
    <!-- <nav class="navbar navbar-static-top">
      Sidebar toggle button
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
    
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
          </li>
          Control Sidebar Toggle Button
        </ul>
      </div>
    </nav> -->
</header>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['client/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['client/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un Client</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Article</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['article/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['article/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un article</a></li>
          </ul>
        </li>
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Publication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['publication/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['publication/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un Publication</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Catégorie</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['categorie/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['categorie/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter une catégorie</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Evenement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['evenement/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['evenement/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un événement</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
<div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
