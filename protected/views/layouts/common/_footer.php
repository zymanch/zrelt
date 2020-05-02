<div class="footer-top">
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      <div class="companyinfo">
        <h2><span>Real</span>-Estate</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
      </div>
    </div>
    <div class="col-sm-7">
      <div class="col-sm-3">
        <div class="video-gallery text-center"> <a href="#">
          <div class="iframe-img"> <img src="/images/iframe1.png" alt="" /> </div>
          <div class="overlay-icon"> <i class="fa fa-play-circle-o"></i> </div>
          </a>
          <p>Circle of Hands</p>
          <h2>24 DEC, 2015</h2>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="video-gallery text-center"> <a href="#">
          <div class="iframe-img"> <img src="/images/iframe2.png" alt="" /> </div>
          <div class="overlay-icon"> <i class="fa fa-play-circle-o"></i> </div>
          </a>
          <p>Circle of Hands</p>
          <h2>24 DEC, 2015</h2>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="video-gallery text-center"> <a href="#">
          <div class="iframe-img"> <img src="/images/iframe3.png" alt="" /> </div>
          <div class="overlay-icon"> <i class="fa fa-play-circle-o"></i> </div>
          </a>
          <p>Circle of Hands</p>
          <h2>24 DEC, 2015</h2>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="video-gallery text-center"> <a href="#">
          <div class="iframe-img"> <img src="/images/iframe4.png" alt="" /> </div>
          <div class="overlay-icon"> <i class="fa fa-play-circle-o"></i> </div>
          </a>
          <p>Circle of Hands</p>
          <h2>24 DEC, 2015</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="address"> <img src="/images/map.png" alt="" />
        <p><i class="fa fa-map-marker"></i> 505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
      </div>
    </div>
  </div>
</div>
</div>
<div class="footer-widget">
<div class="container">
  <div class="row">
      <div class="col-sm-3">
          <div class="single-widget">
              <h2>Статьи</h2>
              <ul class="nav nav-pills nav-stacked">
                  <li><?=CHtml::link('Выбор квартиры', ['help/'.HelpController::HELP_CHOOSE_ALIAS]);?></li>
                  <li><?=CHtml::link('О правомочиях продавца', ['help/'.HelpController::HELP_SELLER_ALIAS]);?></li>

              </ul>
          </div>
      </div>
    <div class="col-sm-3">
      <div class="single-widget">
        <h2>Проверка квартиры</h2>
        <ul class="nav nav-pills nav-stacked">
            <li><?=CHtml::link('Проверка квартиры', ['help/'.HelpController::HELP_CHECK_ALIAS]);?></li>
            <li><?=CHtml::link('Проверка документов', ['help/'.HelpController::HELP_DOCS_CHECK_ALIAS]);?></li>
            <li><?=CHtml::link('О прописанных лицах', ['help/'.HelpController::HELP_PEOPLE_ALIAS]);?></li>
            <li><?=CHtml::link('О притязаниях и судебных спорах', ['help/'.HelpController::HELP_DISPUTE_ALIAS]);?></li>
            <li><?=CHtml::link('Об обременениях и арестах', ['help/'.HelpController::HELP_ENCUMBRANCE_ALIAS]);?></li>
            <li><?=CHtml::link('Долги по коммунальным платежам', ['help/'.HelpController::HELP_DEBT_ALIAS]);?></li>
            <li><?=CHtml::link('Проверяем законность перепланировки', ['help/'.HelpController::HELP_REDEVELOPMENT_ALIAS]);?></li>

        </ul>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="single-widget">
        <h2>Покупка квартиры</h2>
        <ul class="nav nav-pills nav-stacked">
            <li><?=CHtml::link('Как правильно оформить покупку квартиры', ['help/'.HelpController::HELP_SALE_ALIAS]);?></li>
            <li><?=CHtml::link('Заключение предварительного договора', ['help/'.HelpController::HELP_CONTRACT_ALIAS]);?></li>
            <li><?=CHtml::link('Что нужно знать о задатке', ['help/'.HelpController::HELP_DEPOSIT_ALIAS]);?></li>
            <li><?=CHtml::link('Составление документов для регистрации', ['help/'.HelpController::HELP_DOCS_ALIAS]);?></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="single-widget">
        <h2>Наши услуги</h2>
        <form action="#" class="searchform" onsubmit="alert('Подписка временно недоступна');return false;">
          <input type="text" placeholder="Введите ваш email" />
          <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
          <p>Получать выгодные предложения по почте</p>
        </form>
      </div>
    </div>
  </div>
</div>
</div>