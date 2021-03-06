<?php
use yii\helpers\Html;

use app\assets\VendorBowerAsset;
use app\assets\AppAsset;
use app\assets\AdminAsset;

use Common\components\BaseLayoutHelpers;

VendorBowerAsset::register($this);
AppAsset::register($this);
AdminAsset::register($this);
/* @var $this yii\web\View */
/* @var $content string */

$pages = \Yii::$app->controller->getMainMenuPages();
$links = BaseLayoutHelpers::getLinks();
$slides = BaseLayoutHelpers::getSlides();
$subpages = \Yii::$app->controller->getSubmenuPages();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=cyrillic" rel="stylesheet">
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" href="/css/style.css">
  	<link rel="stylesheet" href="/css/plugins.css">
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
</head>
<body>
<?php $this->beginBody() ?>

<a href="javascript: void(null);" class="callback">
  Заказать звонок
</a>

<div class="overlay">
  <div class="mobile-menu">
    <div class="row mobile-menu__header">
      <div class="col-xs-12" id="menu-title">
        Меню
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <ul>
          <?php foreach($pages as $page) : ?>
            <!-- <li class="active"> -->
            <li>
              <a href="javascript: void(null)">
                <?= $page['title']; ?>
              </a>
            </li>
          <?php endforeach ; ?>
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="sub__header">
  <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="pull-left text-left col-xs-6">
          Безопасность 01
        </div>
        <div class="pull-right text-right col-xs-6">
          <span class="phone-label">Телефон: </span>8(911)814-84-78
        </div>
      </div>
    </div>
  </div>
</div>

<!-- need include menu component -->
<?= $this->render('../components/menu', [
    'pages' => $pages,
    'subpages' => $subpages,
  ]) ?>

<!-- here setting whyWeSlider component -->
<?= $this->render('../components/whyWeSlider', compact('slides')); ?>

<?= $content ?>

<!-- footer -->
<div class="footer">
  <div class="container">
    <div class="row sub__footer">
      <div class="col-sm-6 text-left">
        Безопасность 01
      </div>
      <div class="col-sm-6 text-right">
        <a href="tel:89291016310" class="tel">89291016310</a> <a href="mailto:bez-01@bk.ru">bez-01@bk.ru</a>
      </div>
    </div>
    <div class="row quick_links">
      <?php foreach($links as $link): ?>
        <div class="col-md-3">
          <a href="<?=$link->url;?>"><?= $link->title ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Modals -->
<!-- OFFER MODAL -->
<div style="display: none;">
  <div class="box-modal" id="orderModal">
    <div class="box-modal_close arcticmodal-close">
      Закрыть
    </div>
    <form>
      <div class="form-group">
        <label for="inputOrderName">Имя</label>
        <input class="form-control" type="text" name="name" id="inputOrderName">
      </div>
      <div class="form-group">
        <label for="inputOrderPhone">Телефон*</label>
        <input class="form-control" type="text" name="phone" id="inputOrderPhone">
      </div>
      <div class="form-group">
        <label for="inputOrderSubject">Тема*</label>
        <input class="form-control" type="text" name="subject" id="inputOrderSubject">
      </div>
      <div class="form-group">
        <label for="textareaOrderMessage">Сообщение*</label>
        <textarea class="form-control" name="message" rows="8" cols="40"></textarea>
      </div>
      <input type="hidden" name="type" value="">
      <input type="hidden" name="type-id" value="">
      <button type="submit" class="btn btn-default">Заказать</button>
    </form>
  </div>
</div>
<!-- /OFFER MODAL -->

<!-- CALLBACK MODAL -->
<div style="display: none;">
  <div class="box-modal" id="callbackModal">
    <div class="box-modal_close arcticmodal-close">
      Закрыть
    </div>
    <form>
      <div class="form-group">
        <label for="inputCallbackName">Ваше имя</label>
        <input class="form-control" type="text" name="name" id="inputCallbackName" />
      </div>
      <div class="form-group">
        <label for="inputCallbackPhone">Номер телефона</label>
        <input class="form-control" type="text" name="phone" id="inputCallbackPhone" />
      </div>
      <button class="btn btn-default">
        Заказать обратный звонок
      </button>
    </form>
  </div>
</div>
<!-- /CALLBACK MODAL -->

<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

<!-- <script src="/js/plugins.js"></script> -->

<!-- <script src="/js/vendor/ripple.min.js"></script> -->
<!-- <script src="/js/main.js"></script> -->
<!-- <script src="/js/pageActions.js"></script> -->

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
