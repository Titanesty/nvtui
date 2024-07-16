import Mines from "@/components/games/mines";
import DiceGame from "@/components/games/dice-game";
import CoinFlip from "@/components/games/coin-flip";
import NewDice from "@/components/games/new-dice";
import Wheel from "@/components/games/wheel";
import Battle from "@/components/games/battle";

export default function Row() {
    const exit = () => {
        location.href = ''
    }

    const getLasterMyWithdraws = () => {
        console.log("getLasterMyWithdraws")
    }

    const getNowDeposits = () => {
        console.log("getNowDeposits")
    }

    return (
        <div className="row">
            <div className="aside sidebar-right col-lg-3 ">
                <a href="#" data-toggle="modal" data-target="#promo"
                   className="btn btn-info btn-xl btn-between w-100 mgb-1-5x">Активировать промокод <em
                    className="ti ti-arrow-right"></em></a>
                <div className="token-statistics card card-token height-auto ">
                    <div className="card-innr">
                        <div className="token-balance">


                            <div className="token-balance token-balance-with-icon mobile" style={{marginBottom: "0px"}}>
                                <div className="token-balance-text">
                                    <h6 className="card-sub-title">{"? = $login ?"}</h6>


                                    <span style={{
                                        color: "#fff",
                                        fontWeight: 500,
                                        fontSize: "1.6em",
                                        lineHeight: 1,
                                        letterSpacing: "-0.02em"
                                    }}
                                          className="odometer" id="userBalanceMob">
                                        {"? = $balance ?"}</span>
                                </div>
                                <div style={{margin: "0 auto"}}>
                                    <span style={{fontSize: "13px"}} className="btn btn-xs btn-primary btn-auto"
                                          data-toggle="modal" data-target="#modalDeposit"
                                          onClick={getNowDeposits}>Пополнить</span>
                                    <span style={{fontSize: "13px"}} className="btn btn-xs btn-primary btn-auto"
                                          data-toggle="modal" data-target="#withdraw"
                                          onClick={getLasterMyWithdraws}>Вывести</span>
                                </div>


                            </div>


                            <div className="token-balance token-balance-with-icon kjfwf">
                                <div style={{height: "50px"}} className="token-balance-icon">
                                    <div className="user-photo" style={{fontSize: "20px"}}>
                                        {"<?= $img ?>"}                             </div>
                                </div>
                                <div className="token-balance-text">
                                    <h6 className="card-sub-title">
                                        {"<?= $login ?>"}                                 </h6>


                                    <span style={{
                                        color: "#fff",
                                        fontWeight: 500,
                                        fontSize: "1.6em",
                                        lineHeight: 1,
                                        letterSpacing: "-0.02em"
                                    }}
                                          className="odometer" id="userBalance"></span>
                                </div>


                            </div>
                            <div className="kjfwf" style={{margin: "0 auto"}}><span style={{fontSize: "13px"}}
                                                                                    className="btn btn-xs btn-primary btn-auto"
                                                                                    data-toggle="modal"
                                                                                    data-target="#modalDeposit"
                                                                                    onClick={getNowDeposits}>Пополнить </span>
                                <span style={{fontSize: "13px"}} className="btn btn-xs btn-primary btn-auto"
                                      data-toggle="modal" data-target="#withdraw"
                                      onClick={getLasterMyWithdraws}>Вывести</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div className="token-sales card mrnr">
                    <div className="card-innr">
                        <div className="token-rate-wrap row">
                            <div className="token-rate col-md-6 col-lg-12 ativemenu">
                                <a className="asff4 font-mid text-dark mfjkg" style={{cursor: "pointer"}}
                                >Играть</a>
                            </div>
                        </div>
                        <div className="token-rate-wrap row">
                            <div className="token-rate col-md-6 col-lg-12">
                                <a className="asff4 font-mid text-dark" style={{cursor: "pointer"}}
                                >Настройки
                                    аккаунта</a>
                            </div>
                        </div>
                        <div className="token-rate-wrap row">
                            <div className="token-rate col-md-6 col-lg-12">
                                <a className="asff4 font-mid text-dark" style={{cursor: "pointer"}}
                                >Служба поддержки</a>
                                <div className="new-mes"
                                     style={{
                                         position: "absolute",
                                         height: "14px",
                                         width: "14px",
                                         borderRadius: "50%",
                                         border: "2px solid #fff",
                                         background: "#2c80ff",
                                         content: '',
                                         top: "5px",
                                         right: "0px",
                                         display: "none"
                                     }}></div>
                            </div>
                        </div>
                        <div className="token-rate-wrap row">
                            <div className="token-rate col-md-6 col-lg-12">
                                <a className="asff4 font-mid text-dark" style={{cursor: "pointer"}}
                                >Мои
                                    рефералы</a>
                            </div>
                        </div>
                        <div className="token-rate-wrap row">
                            <div className="token-rate col-md-6 col-lg-12">
                                <div className="asff4 font-mid text-dark" style={{cursor: "pointer"}}
                                >
                                    Раздача
                                </div>
                            </div>
                        </div>
                        <div className="token-rate-wrap row">
                            <div className="token-rate col-md-6 col-lg-12">
                                <div className="font-mid text-dark" style={{cursor: "pointer"}}
                                     onClick={exit}>Выход
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div className="main-content col-lg-9" id="game">


                <div className="content-area card">

                    <div className="card-innr">
                        <div className="card-head has-aside">
                            <h4 className="card-title">Режим игры</h4>
                        </div>

                        <ul className="nav nav-tabs nav-tabs-line" role="tablist">
                            <li className="nav-item"><a className="nav-link active" data-toggle="tab"
                                                        href="#dice-game">Nvuti</a></li>
                            <li className="nav-item"><a className="nav-link" data-toggle="tab" href="#battle">Battle</a>
                            </li>
                            <li className="nav-item"><a className="nav-link" data-toggle="tab" href="#mines">Mines</a>
                            </li>
                            <li className="nav-item"><a className="nav-link" data-toggle="tab"
                                                        href="#newdice">Slider</a></li>
                            <li className="nav-item"><a className="nav-link" data-toggle="tab"
                                                        href="#coinflip">Coinflip</a>
                            </li>
                            <li className="nav-item"><a className="nav-link" data-toggle="tab" href="#wheel">Wheel</a>
                            </li>
                        </ul>

                        <div className="tab-content" id="profile-details">
                            <Wheel/>
                            <CoinFlip/>
                            <NewDice/>
                            <Mines/>
                            <Battle />
                            <DiceGame/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
