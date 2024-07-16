export default function Custom404() {
    return (
        <>
            <div className="topbar-wrap" style={{paddingTop: 0}}>
                <div className="topbar is-sticky">
                    <div className="container">
                        <div className="">

                            <ul className="topbar-nav d-lg-none">
                                <li className="topbar-nav-item relative"><a className="toggle-nav"
                                                                            href="https://demo.themenio.com/tokenwiz/buy-token.html#">
                                    <div className="toggle-icon"><span className="toggle-line"></span><span
                                        className="toggle-line"></span><span className="toggle-line"></span><span
                                        className="toggle-line"></span></div>
                                </a></li>
                            </ul>
                            <center className="desktop-nav"
                                    style={{
                                        fontWeight: 600,
                                        padding: "5px",
                                        color: "#fff",
                                        fontSize: "25px"
                                    }}>{'<?=$sitename?>'}</center>
                        </div>
                    </div>
                </div>
            </div>
            <div className="page-content">
                <div className="container">
                    <div className="row">
                        <div className="main-content col-12">
                            <div className="content-area ">
                                <div className="page-header page-header-kyc">
                                    <div className="container">
                                        <div className="row justify-content-center">
                                            <div className="col-lg-8 col-xl-7 text-center"><h2
                                                className="page-title">Страница не найдена</h2>
                                                <a href="/" className="btn btn-primary"
                                                   style={{marginTop: "15px"}}>На
                                                    главную</a></div>
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
