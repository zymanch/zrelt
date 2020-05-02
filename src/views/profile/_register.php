<?php /* @var $this Controller */ ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div>
            <div class="modal-body">
              <div class="form">
                <ul class="tab-group">
                  <li class="tab active"><a href="#signup">Регистрация</a></li>
                  <li class="tab"><a href="#login">Вход</a></li>
                </ul>
                <div class="tab-content">
                  <div id="signup">
                    <h1>Регистрация</h1>
                    <form action="/" method="post">
                      <div class="top-row">
                        <div class="field-wrap">
                          <label> Имя<span class="req">*</span> </label>
                          <input type="text" required autocomplete="off" />
                        </div>
                        <div class="field-wrap">
                          <label> Фамилия<span class="req">*</span> </label>
                          <input type="text" required autocomplete="off"/>
                        </div>
                      </div>
                      <div class="field-wrap">
                        <label> Email<span class="req">*</span> </label>
                        <input type="email" required autocomplete="off"/>
                      </div>
                      <div class="field-wrap">
                        <div class="form-group margin-bottom-0">
                          <select class="form-control">
                            <option value="">-- Property -- </option>
                            <option value="1">Property 1</option>
                            <option value="2">Property 2</option>
                            <option value="3">Property 3</option>
                            <option value="4">Property 4</option>
                            <option value="5">Property 5+</option>
                          </select>
                        </div>
                      </div>
                      <div class="field-wrap">
                        <label> Massage<span class="req">*</span> </label>
                        <textarea cols="4" rows="4"></textarea>
                      </div>
                      <button type="submit" class="button button-block hvr-bounce-to-bottom"> Зарегистрироваться </button>
                    </form>
                  </div>
                  <div id="login">
                    <h1>Вход</h1>
                    <form action="/" method="post">
                      <div class="field-wrap">
                        <label> Email<span class="req">*</span> </label>
                        <input type="email" required autocomplete="off"/>
                      </div>
                      <div class="field-wrap">
                        <label> Пароль<span class="req">*</span> </label>
                        <input type="password" required autocomplete="off"/>
                      </div>
                      <p class="forgot"><a href="/site/forgot">Забыли пароль?</a></p>
                      <button class="button button-block hvr-bounce-to-bottom"> Войти </button>
                    </form>
                  </div>
                </div>
                <!-- tab-content --> 
                
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Modal -->
<!-- Header Ends -->
