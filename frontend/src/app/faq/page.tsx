export default function Page(){
  return (
      <div className="page-content">
          <div className="container">
              <div className="row">
                  <div className="main-content col-12">
                      <div className="content-area card">
                          <div className="card-innr">
                              <div className="content">
                                  <h4 className="text-secondary">Частые вопросы</h4>
                                  <div className="accordion-simple" id="faqList-1">
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-1"> Что такое {'<?=$sitename?>?'} </h6>
                                          <div id="collapse-1-1" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Это онлайн сервис мгновенных игр</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-3"> Как получить стартовый бонус? </h6>
                                          <div id="collapse-1-3" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Привяжите аккаунт Вконтакте и вступите в нашу группу. Стартовый
                                                      бонус можно получить только 1 раз</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-2"> Какая у вас реферальная система? </h6>
                                          <div id="collapse-1-2" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Вы получаете <b>10%</b> от каждого пополнения реферала</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-7"> Как пополнить? </h6>
                                          <div id="collapse-1-7" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Нажмите на кнопку "пополнить", укажите платежную систему, введите
                                                      сумму</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-4"> Сколько времени занимает выплата? </h6>
                                          <div id="collapse-1-4" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Процесс выплаты занимает от 5 минут до 24 часов с момента создания
                                                      заявки</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-5"> Как отменить выплату? </h6>
                                          <div id="collapse-1-5" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Для отмены выплаты нажмите на красный крестик напротив заявки</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div className="accordion-item">
                                          <h6 className="accordion-heading collapsed" data-toggle="collapse"
                                              data-target="#collapse-1-6"> Ввели неправильные реквизиты? </h6>
                                          <div id="collapse-1-6" className="collapse" data-parent="#faqList-1">
                                              <div className="accordion-content">
                                                  <p>Напишите в <a href="<?=$group?>">поддержку</a></p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  )
}
