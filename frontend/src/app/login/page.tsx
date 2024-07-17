export default function Login() {
    return (
        <>
            <div className="card-block" style={{display: "none"}}>
                <div className="card-text">
                    <h1>Nvuti</h1>
                    <p>Если вы не знаете, чем заняться сегодня вечером, то рекомендуем вам обратить внимание на <b>онлайн
                        игру Нвути</b>. Интернет сервис Nvuti.best представляет собой состязание с выбором суммы и шанса
                        победы. Здесь не только увлекательные развлечения, но и множество преимуществ.</p>
                    <h2>Nvuti - мобильная версия</h2>
                    <p>Глобальный прогресс не стоит на месте и сегодня есть у каждого возможность играть в нвути онлайн
                        с мобильных устройств. Наш настоящий сайт nvuti полностью адаптивен к вашим гаджетам.
                        Официальный сайт становится доступен вне дома, будь-то работа, школа или парк.</p>
                    <p>Другими словами, сервис Нвути предлагает своим пользователям играть с мобильных устройств, причем
                        для этого не нужно скачивать и устанавливать на свой телефон дополнительные приложения.</p>

                    <h3>Играть на официальном сайте нвути в полном объёме честно</h3>

                    <p>Так как в начале каждой игры виден хеш-код игры, благодаря ему не составит труда проверить
                        сражение нвути. Вкладывая средства, вы можете быть уверены в том, что администрация сайта не
                        выдает вам фальшивые данные, поскольку разработчики nvuti каждый день совершенствуют
                        систему.</p>

                    <h3>Игра базируется на бонусах</h3>

                    <p>Если выпадает символ разброса, то начисляется стартовый бонус nvuti. Это означает, что игрок
                        получает возможность <b>играть без депозита</b>.</p>
                    <p>При этом на счет начисляются настоящие деньги, следовательно пользователь может
                        поэкспериментировать с разнообразными стратегиями. Мы постоянно предоставляет различные бонусы и
                        настоящие раздачи денег, которые дают шанс выиграть приз - Джек-пот.</p>

                    <h3>Делитесь с друзьями ссылкой нвути</h3>
                    <p>Приглашайте друзей выиграть денежный куш, сидя дома на диване или кресле, где вас ничего не
                        отвлекает. Продвинутая реферальная система начисляет 10% за каждый депозит. Для этого проделайте
                        один легкий шаг - отправьте ему ссылку на <b>сайт Нвути бест</b> или разместите в социальных
                        сетях, форумах.</p>
                    <p>На подлинном сайте поддерживается более 20 видов оплаты, таких как: QIWI, WebMoney, VISA,
                        MasterCard, Dash, Bitcoin, Payeer и многие другие. Посетители мгновенных игр часто задаются
                        вопросом: «А какая у вас комиссия при пополнении?» Мы с радостью отвечаем, что на
                        сайте <b>nvuti</b> никогда не было и не будет издержек.</p>
                    <p>По всем вопросам, связанным с регистрацией, можно проконсультироваться со службой
                        онлайн-техподдержки, доступной в любое время.</p>

                    <h4>Быстрые выплаты на настоящем сайте Нвути</h4>
                    <p>Программисты нашего официального сайта тащтельно слядет за игрой нвути. Благодаря им, вывод
                        осуществляется за считанные минуты на любую платежную систему электронных денег.</p>
                    <p>Хотим заметить, что выплата возможна только на кошелек с которого был пополнен баланс на сайте
                        нвути. Это одна из мер безопасности сайта nvuti для защиты вашего баланса аккаунта от
                        мошенников.</p>

                </div>
            </div>
            <div className="page-content">
                <div className="container">
                    <div className="row">
                        <div className="aside sidebar-right col-lg-3 ">
                            <div className="content-area card">

                                <div className="card-innr">
                                    <div id="enterBlock">
                                        <div className="card-head has-aside">
                                            <h4 className="card-title">Авторизация</h4>
                                        </div>
                                        <div style={{marginTop: "8px"}}>
                                            <ul className="row guttar-20px guttar-vr-20px">


                                                <li className="col">
                                                    <div id="uLogin"
                                                         data-ulogin="display=buttons;fields=photo_big,first_name,last_name;mobilebuttons=0;redirect_uri=<?=$is_http?>%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;">
                                                        <a href="#" data-uloginbutton="vkontakte"
                                                           style={{width: "100%"}}
                                                           className="btn btn-outline btn-dark btn-facebook btn-block"><i
                                                            className="fab fa-vk" style={{color: "#2c80ff"}}
                                                            aria-hidden="true"></i><span>Вконтакте</span></a></div>
                                                </li>

                                            </ul>
                                            <div className="sap-text"><span>Или</span></div>

                                            <div className="input-item"><input type="text" id="userLogin"
                                                                               placeholder="Логин"
                                                                               className="input-bordered"/></div>
                                            <div className="input-item"><input id="userPass" type="password"
                                                                               placeholder="Пароль"
                                                                               className="input-bordered"/></div>
                                            <div style={{
                                                transform: "scale(0.65)",
                                                marginLeft: "-42px",
                                                marginTop: "-17px"
                                            }}
                                                 className="g-recaptcha" data-sitekey="<?=$sitekey?>"></div>
                                            <a id="butEnter" className="btn btn-primary btn-block"
                                               style={{
                                                   boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)",
                                                   color: "white"
                                               }}
                                            >Войти</a>
                                            <a id="loadEnter" className="btn btn-primary btn-block disabled"
                                               style={{
                                                   boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)",
                                                   display: "none"
                                               }}>
                                                <div className="loader"></div>
                                            </a>
                                            <div className="btn btn-danger btn-block" id="error_enter"
                                                 style={{
                                                     marginTop: "15px",
                                                     display: "none",
                                                     pointerEvents: "none"
                                                 }}></div>


                                            <div className="gaps-2x"></div>
                                            <div className="gaps-2x"></div>
                                            <div
                                                className="form-note text-center"><strong
                                                style={{color: "#2c80ff", cursor: "pointer"}}>Регистрация</strong></div>


                                        </div>
                                    </div>

                                    <div id="registerBlock" style={{display: "none"}}>
                                        <div className="card-head has-aside">
                                            <h4 className="card-title">Регистрация</h4>
                                        </div>
                                        <div style={{marginTop: "8px"}}>
                                            <div className="input-item"><input type="text" id="userRegsiter"
                                                                               placeholder="Логин"
                                                                               className="input-bordered"/></div>
                                            <div className="input-item"><input id="userPassRegister" type="password"
                                                                               placeholder="Пароль"
                                                                               className="input-bordered"/></div>
                                            <div className="input-item"><input id="userPassRegister1" type="password"
                                                                               placeholder="Повторите пароль"
                                                                               className="input-bordered"/></div>
                                            <div className="input-item">
                                                <input type="checkbox"
                                                       className="input-checkbox input-checkbox-md"
                                                       id="CheckBox_9"/><label
                                                style={{textTransform: "unset"}} htmlFor="CheckBox_9">Cоглашаюсь с <a
                                                href="/terms.php" target="_blank" rel="noopener noreferrer">Пользовательским
                                                соглашением</a></label>
                                            </div>
                                            <div style={{
                                                transform: "scale(0.65)",
                                                marginLeft: "-42px",
                                                marginTop: "-17px"
                                            }}
                                                 className="g-recaptcha" data-sitekey="<?=$sitekey?>"></div>
                                            <div id="butRegister" className="btn btn-primary btn-block"
                                                 style={{boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)"}}
                                            >Зарегистрироваться
                                            </div>
                                            <div className="btn btn-danger btn-block" id="error_register"
                                                 style={{
                                                     marginTop: "15px",
                                                     display: "none",
                                                     pointerEvents: "none"
                                                 }}></div>


                                            <div className="gaps-2x"></div>
                                            <div className="gaps-2x"></div>
                                            <div
                                                className="form-note text-center">Есть аккаунт? <strong
                                                style={{color: "#2c80ff", cursor: "pointer"}}>Войти</strong></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </>

    )
}
