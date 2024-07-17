export default function Complete() {
    return (
        <div className="page-content">
            <div className="page-header page-header-kyc">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-8 col-xl-7 text-center">
                            <h4 className="page-title">{"<?=$vk_name?>,"} осталось придумать логин и пароль для
                                сайта!</h4>
                            <p className="large"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-10 col-xl-9">
                        <div className="kyc-status card mx-lg-4">
                            <div className="card-innr">

                                <div className="content">

                                    <div className="terms__wrapper">


                                        <center>
                                            <div className="complete-block left">
                                                <div className=" input-item input-with-label">
                                                    <label htmlFor="full-name" style={{marginBottom: "5px"}}
                                                           className="input-item-label text-center">Логин</label>
                                                    <p><input autoComplete="off" id="updatelog" style={{width: "100%"}}
                                                              className="input-bordered text-center" maxLength={15}
                                                              value="" required/></p>


                                                    <label htmlFor="full-name" style={{marginBottom: "5px"}}
                                                           className="input-item-label text-center">Пароль</label>
                                                    <p><input id="updatepass" style={{width: "100%", marginTop: "3px"}}
                                                              type="password" className="input-bordered text-center"
                                                              maxLength={12} value="" required/></p>
                                                    <p></p>
                                                    <div className="btn btn-danger btn-block" id="error_registerc"
                                                         style={{
                                                             marginTop: "15px",
                                                             display: "none",
                                                             pointerEvents: "none"
                                                         }}></div>
                                                    <button id="contbutton" className="btn btn-primary" style={{
                                                        width: "100%",
                                                        boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)",
                                                        color: "#fff",
                                                        marginTop: "10px",
                                                    }}>Продолжить
                                                    </button>
                                                </div>
                                                <div className="complete-block terms__wrapper right"><h5>Для чего это
                                                    нужно?</h5>
                                                    <p>
                                                        Вы сможете входить в свой аккаунт через логин и пароль,</p>
                                                    <p>если ваша страница ВК заблокирована </p>
                                                </div>
                                            </div>
                                        </center>

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
