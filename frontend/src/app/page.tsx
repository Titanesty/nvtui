"use client"

import Row from "@/app/row";

export default function Index() {
    const test = () => {
        console.log("1")
    }

   const selectWrapper = [
       {id: 0, title: "Проблема с пополнением", },
       {id: 1, title: "Проблема с выводом", },
       {id: 2, title: "Сотрудничество", },
       {id: 3, title: "Жалобы/предложения", },
       {id: 4, title: "Другое", },
   ]

    return (
        <div className="page-content">
            <div className="container">
               <Row/>
                <div className="main-content col-lg-9" id="support" style={{display:"none"}}>
                    <div className="loader-support " id="loaderSupport" style={{display:"none"}}>
                        <svg viewBox="0 0 80 80">
                            <circle id="test" cx="40" cy="40" r="32"></circle>
                        </svg>
                    </div>

                    <div className="content-area card">


                        <div className="content-area " id="createTicket" style={{display:"none"}}>
                            <div className="card-innr card-innr-fix">
                                <div className="card-head has-aside">
                                    <h4 className="card-title">Новый тикет</h4>
                                    <div className="card-opt"><a
                                        onClick={test}
                                        style={{cursor: "pointer", color: "#2c80ff"}} className="link ucap  "><em
                                        className="fas fa-arrow-left mr-2"></em> Назад</a></div>
                                </div>
                                <div className="gaps-1x"></div>

                                <div className="input-item input-with-label"><label className="input-item-label ">Раздел</label>

                                    <div className="select-wrapper">
                                        <select id="typet" className="input-bordered" autoComplete="off" onChange={test}>
                                            <option style={{display: "none"}}></option>
                                            {
                                                selectWrapper.map(item =>

                                                    (<option value={item.id+1} key={item.id}>{item.title}</option>))

                                            }

                                        </select>
                                </div>

                                </div>
                                <div className="input-item input-with-label"><label className="input-item-label ">Тема</label><input
                                    id="sub" className="input-bordered" type="text" autoComplete="off"/></div>
                                <div className="input-item input-with-label"><label
                                    className="input-item-label ">Сообщение</label><textarea id="mes"
                                                                                         className="input-bordered input-textarea"
                                                                                             autoComplete="off"></textarea>
                                </div>
                                <div id="notch" className="token-calc-note note note-plane mb-10" style={{display:"none"}}><em
                                    className="fas fa-info-circle text-light"></em><span style={{fontSize: "13px",
marginBottom: "15px"}} className="note-text text-light" id="notch_m"></span></div>

                                <div id="te" className="note note-plane note-danger note-sm pdt-1x pl-0"
                                     style={{color: "rgba(255,104,104,0.9)", display: "none"}}></div>
                                <div className="gaps-1x"></div>

                                <button id="sbt" className="btn btn-primary" onClick={test}>Отправить</button>

                            </div>
                        </div>

                        <div className="token-transaction  card-full-height" id="listTickets" style={{display:"none"}}>
                            <div className="card-innr">
                                <div className="card-head has-aside">
                                    <h4 className="card-title">Служба поддержки</h4>
                                    <div className="card-opt"><a
                                        onClick={test}
                                        style={{cursor: "pointer", color: "#2c80ff"}} className="link ucap  "><em
                                        className="fas fa-plus mr-2 mb-1"></em> Создать тикет </a></div>
                                </div>

                                <div id="pqfwf"></div>


                            </div>
                        </div>

                        <div className="chat-wrap" id="chat" style={{display: "none", height: "auto"}}>
                        </div>

                    </div>
                </div>

                <div className="main-content col-lg-9" id="profile" style={{display: "none"}}>
                    <div className="content-area card">
                        <div className="card-innr">
                            <div className="card-head">
                                <h4 className="card-title">Ваш профиль</h4>
                            </div>
                            <ul className="nav nav-tabs nav-tabs-line" role="tablist">
                                <li className="nav-item"><a className="nav-link active" data-toggle="tab" href="#personal-data">Изменить
                                    пароль</a></li>
                                <li className="nav-item"><a className="nav-link" data-toggle="tab" href="#settings">Социальные
                                    сети</a></li>
                            </ul>
                            <div className="tab-content" id="profile-details">
                                <div className="tab-pane fade show active" id="personal-data">

                                    <div className="row">
                                        <div className="col-md-6">
                                            <div className="input-item input-with-label"><label htmlFor="full-name"
                                                                                            className="input-item-label">Новый
                                                пароль</label><input id="resetPass" className="input-bordered"
                                                                     type="password" /></div>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-6">
                                            <div className="input-item input-with-label"><label htmlFor="full-name"
                                                                                            className="input-item-label">Повторите
                                                пароль</label><input id="resetPassRepeat" className="input-bordered"
                                                                     type="password" /></div>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-6">
                                            <a id="error_resetPass" className="btn  btn-block btnError bg-danger "
                                               style={{display:"none", color:"#fff", marginBottom: "15px", margin: "0 auto"}}></a>
                                            <a id="succes_resetPass" className="btn  btn-block btnSuccess"
                                               style={{display:"none", color:"#fff", cursor: "default",  marginBottom: "10px",    background: "linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109))"}}>Пароль
                                                изменен</a>
                                        </div>
                                    </div>
                                    <div className="gaps-1x"></div>
                                    <div className="d-sm-flex justify-content-between align-items-center">
                                        <button className="btn btn-primary"
                                                style={{boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)"}}
                                                onClick={test}>Изменить
                                        </button>




                                        <div className="gaps-2x d-sm-none"></div>
                                    </div>

                                </div>

                                <div className="tab-pane fade" id="settings">

                                    Привязан аккаунт: <a href="<?= $social_link ?>" target="_blank">{"? = $social_link ?"}</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div className="main-content col-lg-9" id="ref" style={{display: "none"}}>
                    <div className="content-area card">
                        <div className="card-innr">
                            <div className="card-head">
                                <h5 className="card-title card-title-md">Приглашайте друзей и зарабатывайте</h5>
                            </div>
                            <div className="card-text">
                                <p>Получайте <strong>10% сразу на баланс</strong> с каждого пополнения реферала.</p>
                            </div>
                            <div className="referral-form">
                                <div className="d-flex justify-content-between align-items-center">
                                    <h5 className="mb-0 font-bold">Ваша ссылка</h5>
                                </div>
                                <div className="copy-wrap mgb-1-5x mgt-1-5x"><span className="copy-feedback"></span><em
                                    className="fa fa-link"></em>
                                    <input type="text" className="copy-address"
                                                                   value="http://<?= $linksite ?>/?i=<?= $id ?>"
                                                                    />
                                    <button className="copy-trigger copy-clipboard"
                                            data-clipboard-text="http://<?= $linksite ?>/?i=<?= $id ?>"><em
                                        className="ti ti-files"></em></button>
                                </div>
                            </div>

                            <div className="note note-plane note-light note-md font-italic"><em className="fas fa-info-circle"></em>
                                <p style={{paddingTop: "3px"}}>Pеферальная ссылка изменена</p></div>
                            <ul className="share-links" style={{display:"none"}}>
                                <li>Поделиться :</li>
                                <li><a href="#"><em className="fab fa-google-plus-g"></em></a></li>
                                <li><a href="#"><em className="fab fa-twitter"></em></a></li>
                                <li><a href="#"><em className="fab fa-facebook-f"></em></a></li>
                                <li><a href="#"><em className="fab fa-linkedin-in"></em></a></li>
                            </ul>
                        </div>
                    </div>


                    <div className="d-sm-flex justify-content-center">

                        <div className="content-area card col-lg-12" style={{borderRadius: "0, 6px, 6px, 0"}}>
                            <div className="card-innr">

                                <table id="example1" className="display table-responsive dataTable no-footer"
                                       style={{width:"100%", display: "inline-table"}}>
                                    <thead>
                                    <tr>
                                        <th style={{width:"20%"}} className="text-center">ID</th>
                                        <th style={{width:"20%"}} className="text-center">Дата</th>
                                        <th style={{width:"20%"}} className="text-center">Логин</th>
                                        <th style={{width:"20%"}} className="text-center">Прибыль (Всего: 0)</th>
                                    </tr>
                                    </thead>
                                    <tbody className="">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div className="main-content col-lg-9" id="bonus" style={{display:"none"}}>
                    <div className="card-innr card">
                        <div className="status status-empty">
                            <div className="status-icon"><em className="ti ti-gift"></em></div>
                            <span className="status-text text-dark">Получайте каждый день до 100 на свой баланс абсолютно бесплатно,<br />Для получения необходимо подписаться на нашу <a
                                href="<?= $group ?>" target="_blank">группу</a></span>
                            <div className="row">

                                <div className="offset-md-3 col-md-6">
                                    <div style={{transform: "scale(0.65)"}} className="g-recaptcha"
                                         data-sitekey="<?= $sitekey ?>"></div>
                                </div>

                                <div className="offset-md-3 col-md-6">
                                    <a className="btn btn-primary"
                                       style={{boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)", color: "#fff", marginTop: "10px"}}
                                       id="butPromo" onClick={test}>Получить</a>
                                </div>

                            </div>
                            <a id="error_promo" className="btn  btnError bg-danger "
                               style={{display:"none", color: "#fff", marginBottom: "15px", margin: "auto", marginTop: "25px", cursor: "default"}}></a>
                            <a id="succes_promo" className="btn btnSuccess"
                               style={{marginTop: "25px", display:"none", color:"#fff", cursor: "default",  marginBottom: "10px",  background: "linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109))"}}></a>
                        </div>
                    </div>
                    <p className="text-light text-center"><em className="fas fa-info-circle" style={{fontSize: "11px"}}></em> Мы не
                        требуем обязательный депозит для вывода средств</p>
                </div>

            </div>
        </div>
    )
}
