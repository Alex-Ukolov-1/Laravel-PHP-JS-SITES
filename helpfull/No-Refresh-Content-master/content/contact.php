<form class="guruweba_example_form" name="feedback" method="POST" action="/feedback.php">
  <div class="guruweba_example_caption">Обратная связь</div>
  <div class="guruweba_example_infofield">Тема обращения</div>
  <select name="theme" required="required">
    <option value="">Выберите вариант</option>
    <option>Вопрос по работе сервиса</option>
    <option>Помощь в оформлении заказа</option>
    <option>Сотрудничество</option>
    <option>Пожелания / предложения</option>
  </select>
  <div>Ваше имя</div>
  <input type="text" name="name" required="required">
  <div>Ваш email</div>
  <input type="email" name="email" required="required">
  <div>Сообщение</div>
  <textarea name="message"></textarea>
  <input type="submit" name="submit_btn" value="Отправить">
</form>