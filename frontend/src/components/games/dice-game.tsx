export default function DiceGame() {
    const progress: any[] = Array(6 )
    const response: any[] = Array(14 )

    return(
        <div className="tab-pane fade active show" id="dice-game">
            <div style={{marginTop: "30px"}}>

                <div className="row no-gutters height-100">
                    <div className="col-md-6 ">

                        <div className="row">
                            <div className="col-12 mobileProfit">
                                <ul className="token-info-list text-center" style={{paddingBottom: "0px"}}>
                                    <li className="" style={{fontSize: "64px", marginTop: "-47px"}}
                                        id="BetProfitD">1.11
                                    </li>
                                    <span className="card-sub-title card-tyy">Возможный выигрыш</span>
                                </ul>

                            </div>
                            <div className="col-6">
                                <div className="input-item input-with-label">
                                    <label htmlFor="full-name" className="input-item-label text-center">Сумма</label>
                                    <input autoComplete="off" id="BetSize"

                                           className="input-bordered text-center" value="1" />
                                </div>

                                <div className="d-sm-flex justify-content-center"
                                     style={{width: "100%", margin:0}}>
                                                        <span className="badge badge-dim badge-md badge-light"
                                                              style={{minWidth: "0px", padding: "4px 6px"}}
                                                              >Удвоить</span>
                                    <span
                                          className="badge badge-dim badge-md badge-light"
                                          style={{minWidth: "0px", padding: "4px 6px", marginLeft: "5px"}}>Половина</span>
                                </div>
                                <div className="d-sm-flex justify-content-center tll">
                                                        <span
                                                              className="badge badge-dim badge-md badge-light"
                                                              style={{minWidth: "0px", padding: "4px 6px"}}>Макс</span>
                                    <span
                                          className="badge badge-dim badge-md badge-light"
                                          style={{minWidth: "0px", padding: "4px 6px", marginLeft: "5px"}}>Мин</span>
                                </div>
                            </div>
                            <div className="col-6">
                                <div className="input-item input-with-label"><label htmlFor="full-name"
                                                                                    className="input-item-label text-center">Процент</label><input
                                    autoComplete="off" className="input-bordered text-center"
                                    type="text" name="full-name" value="90" id="BetPercent"
                                    />
                                </div>
                                <div className="d-sm-flex justify-content-center"
                                     style={{width:"100%", margin:0}}>
                                    <center>
                                                            <span className="badge badge-dim badge-md badge-light"
                                                                  style={{minWidth: "0px", padding: "4px 6px"}}
                                                                  >Удвоить</span>
                                        <span className="badge badge-dim badge-md badge-light"
                                              style={{minWidth: "0px", padding: "4px 6px"}}
                                              >Половина</span>
                                    </center>
                                </div>
                                <div className="d-sm-flex justify-content-center tll">
                                                        <span className="badge badge-dim badge-md badge-light"
                                                              style={{minWidth: "0px", padding: "4px 6px"}}
                                                              >Макс</span>
                                    <span className="badge badge-dim badge-md badge-light"
                                          style={{minWidth: "0px", padding: "4px 6px", marginLeft: "5px"}}
                                          >Мин</span>
                                </div>
                            </div>

                            <div className="col-12 text-center hbetf" style={{marginTop:"30px"}}>
                                <center style={{fontSize: "12px"}}>Hash игры:</center>
                                <span id="hashBet">
                                                        7638577a6ed7805e1f4de47f163cafab0beeacb0a66c58423181c6c32061d09d435f485ba81bf4be8621c6e2b500c181d8fb2b407b419d901d64e027bbc5e26c


                                                    </span>
                            </div>


                        </div>

                    </div>
                    <div className="col-md-1 "></div>
                    <div className="col-md-5 height-100">
                        <div className="token-info  ">
                            <div className="heded">
                                <ul className="token-info-list text-center desProfit">
                                    <li className="" style={{fontSize: "64px", marginTop: "-47px"}}
                                        id="BetProfit">19
                                    </li>
                                    <span className="card-sub-title card-tyy">Возможный выигрыш</span>
                                </ul>
                                <div className="row" style={{marginTop: "-7px"}}>
                                    <div className="col-6">
                                                            <span className="card-sub-title card-tyy1 text-center">0 - <span
                                                                id="MinRange"></span></span>
                                        <div id="buttonMin" className="input-item input-with-label"><a
                                             style={{color:"#fff"}}
                                            className="btn btn-light btn-block">Меньше</a></div>
                                    </div>
                                    <div className="col-6">
                                                            <span className="card-sub-title card-tyy1 text-center"><span
                                                                id="MaxRange"></span> - 999999</span>
                                        <div id="buttonMax"
                                             className="input-item input-with-label btn-block"><a
                                            style={{color:"#fff"}}
                                            className="btn btn-light btn-block">Больше</a></div>
                                    </div>
                                    <div className="col-12" style={{marginTop:"-20px"}}>
                                        <div style={{background:"#fff", padding:"0px 20px"}}
                                             className="btn  btn-block"></div>

                                    </div>

                                    <div className="col-12">
                                        <center>
                                            <div id="betLoad" className='cssload-loader'
                                                 style={{background: "none", display: "none"}}>
                                                <div className='cssload-inner cssload-one'></div>
                                                <div className='cssload-inner cssload-two'></div>
                                                <div className='cssload-inner cssload-three'></div>
                                            </div>
                                        </center>
                                        <div id="succes_bet"
                                             style={{background: "linear-gradient(to right, #0ACB90, #2BDE6D)", display: "none", pointerEvents: "none", boxShadow: "0 5px 23px 0 rgba(0, 215, 126, 0.27)"}}
                                             className="btn btn-success btn-block"></div>


                                    </div>
                                    <div className="col-12">
                                        <div id="error_bet"
                                             style={{display:"none", pointerEvents: "none", boxShadow: "0 5px 23px 0 rgba(255, 105, 114, 0.14)"}}
                                             className="btn  btn-block bg-danger"></div>
                                    </div>


                                </div>
                                <center id="checkBet" data-toggle="modal"
                                        data-target="#checkDiceModal"
                                        style={{textAlign: "center", marginTop: "5px", display: "none", WebkitUserSelect: "none", MozUserSelect: "none", cursor:"pointer"}}
                                        >Проверить игру
                                </center>
                                <div className="modal fade" id="checkDiceModal" tabIndex={-1}>
                                    <div className="modal-dialog modal-dialog-md modal-dialog-centered">
                                        <div className="modal-content"><a style={{cursor: "pointer"}}
                                                                          className="modal-close"
                                                                          data-dismiss="modal"
                                                                          aria-label="Close"><em
                                            className="ti ti-close"></em></a>
                                            <div className="popup-body" id="modalDice">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="card-head has-aside" style={{marginTop: "80px"}}>
                <h4 className="card-title">Последние игры</h4>
                <div style={{marginLeft: "177px", display: "inline-block", position: "absolute"}}
                     className="circle-online pulse-online"></div>
                <span id='oe'
                      style={{marginLeft: "194px", display: "inline-block", position: "absolute", marginTop: "3px"}}>{
                    "<?= $online ?>"}</span>

                <div className="card-opt"><a style={{opacity: 0.8, fontWeight: "bolder"}}
                                             className="link link-light ">
                                            <span className="ngh"><em className="ti ti-angle-down"
                                                                      style={{fontSize: "17px", cursor: "pointer"}}></em></span>
                    <span className="ngh"
                          style={{fontWeight: 400, display: "none", fontSize: "17px", cursor: "pointer"}}><em
                        className="ti ti-angle-up"></em></span>
                </a>
                    <div className="toggle-className dropdown-content">
                        <ul className="dropdown-list">
                            <li><a href="#">30 days</a></li>
                            <li><a href="#">1 years</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <table className="table jghtt tnx-table table-responsive text-center"
                   style={{marginTop: "20px"}}>
                <thead>
                <tr>
                    <th style={{width:"14%"}}>Логин</th>
                    <th style={{width:"15%"}}>Число</th>
                    <th style={{width:"15%"}}>Цель</th>
                    <th style={{width:"15%"}}>Сумма</th>
                    <th style={{width:"15%"}}>Шанс</th>
                    <th style={{width:"15%"}}>Выигрыш</th>

                </tr>
                </thead>
                <tbody id='response'>
                {response.map((_)=> (
                    <>
                        <tr>
                            {progress.map((_) => (
                                <td>
                                    <div className="progress effect-shine">
                                        <div className="progress-bar bg-success " role="progressbar"
                                             style={{width: "0%"}} ></div>
                                        {/*aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"*/}
                                    </div>
                                </td>
                            ))}

                        </tr>
                        <tr style={{opacity:0}}>
                            <td>Login</td>
                            <td className="text-danger" style={{fontWeight:600}}>234234</td>
                            <td>499999 - 999999</td>
                            <td>242434</td>
                            <td>
                                <div className="progress effect-shine">
                                    <div className="progress-bar bg-warning" role="progressbar"
                                         style={{width: "55%"}}></div>
                                </div>
                            </td>
                            <td className="text-danger" style={{fontWeight:600}}>0.00</td>
                        </tr>
                    </>
                    ))}
                </tbody>
            </table>
        </div>
    )
}
