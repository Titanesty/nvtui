export default function Battle() {

    const battlebet = () => {
        console.log("battlebet")
    }

    const select_team = (a: string, b: string) => {
        console.log(select_team, a, b)
    }

    return (
        <div className="tab-pane fad" id="battle">

            <div className="cg_graph_block game-tbl">
                <div className="cursor"><i className="fas fa-sort-up"></i></div>
                <div className="battle-roulette no-copy">
                    <div className="counter flex">
        <span id="timer" style={{fontSize: "40px", textAlign: "center"}}>
          <span style={{display: 'block', fontSize: "15px", color: "gray", fontWeight: 100}}>Возможный выигрыш</span>
          <span style={{fontSize: "28px"}} id="ProfitBattle">2.00</span>
          </span></div>
                    <svg id="cricle" version="1" xmlns="http://www.w3.org/2000/svg" width="250"
                         height="250" viewBox="0 0 400 400">
                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%"
                                      style={{stopColor: "#5dc0ff", stopOpacity: 1}}></stop>
                                <stop offset="100%"
                                      style={{stopColor: "#0b6cee", stopOpacity: 1}}></stop>
                            </linearGradient>
                        </defs>
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%"
                                      style={{stopColor: "#ff7365", stopOpacity: 1}}></stop>
                                <stop offset="100%"
                                      style={{stopColor: "#f92e7f", stopOpacity: 1}}></stop>
                            </linearGradient>
                        </defs>
                        <g className="chart" transform="translate(200, 200)">
                            <g className="timer" transform="translate(0,0)">
                                <g className="bets" id="circle"
                                   style={{
                                       transform: "rotate(0deg)",
                                       transition: "transform 4s cubic-bezier(0.15, 0.15, 0, 1)"
                                   }}>
                                    <path id="blue" fill="url(#grad2)"
                                          d="M1.1021821192326179e-14,-180A180,180,0,1,1,1.1021821192326179e-14,180L9.491012693391987e-15,155A155,155,0,1,0,9.491012693391987e-15,-155Z"
                                          transform="rotate(0)" style={{opacity: 1}}></path>
                                    <path id="red" fill="url(#grad1)"
                                          d="M1.1021821192326179e-14,180A180,180,0,1,1,-3.3065463576978534e-14,-180L-2.847303808017596e-14,-155A155,155,0,1,0,9.491012693391987e-15,155Z"
                                          transform="rotate(0)" style={{opacity: 1}}></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>


            <div className="col-md-6 bets-tbl">
                <div className="row">
                    <div className="col-6">
                        <div className="input-item input-with-label">
                            <label htmlFor="full-name"
                                   className="input-item-label text-center">Сумма</label>
                            <input autoComplete="off" id="BetSizeBattle"
                                   className="input-bordered text-center"
                                   value="1"/>
                        </div>


                    </div>
                    <div className="col-6">
                        <div className="input-item input-with-label"><label htmlFor="full-name"
                                                                            className="input-item-label text-center">Процент</label><input
                            autoComplete="off" className="input-bordered text-center"
                            type="text" name="full-name" value="50" id="BetPerBattle"
                        /></div>


                    </div>

                    <div className="col-6">
                                                <span className="card-sub-title card-tyy1 text-center">0 - <span
                                                    id="MinRangeBattle">499</span></span>
                        <div id="BattleMin" className="input-item input-with-label"><a
                            id="redselect" onClick={() => select_team('red', 'blue')}
                            className="btn btn-light btn-block btn-outline"><i
                            className="fa fa-angle-down red"></i> Красный</a></div>
                    </div>
                    <div className="col-6">
                                                <span className="card-sub-title card-tyy1 text-center"><span
                                                    id="MaxRangeBattle">500</span> - 999</span>
                        <div id="BattleMax" className="input-item input-with-label btn-block"><a
                            id="blueselect"
                            onClick={() => select_team('blue', 'red')}
                            className="btn btn-light btn-block btn-outline"><i
                            className="fa fa-angle-up blue"></i> Синий</a></div>
                    </div>

                </div>
                <button style={{color: "#fff"}} onClick={battlebet}
                        className="btn btn-light btn-block" id="createBetBattle">Сделать ставку <i
                    className="fas fa-coins"></i></button>
                <div id="error_battle"
                     style={{
                         display: "none",
                         pointerEvents: "none",
                         boxShadow: "rgba(255, 105, 114, 0.14) 0px 5px 23px 0px"
                     }}
                     className="btn  btn-block bg-danger"></div>

                <div id="success_battle"
                     style={{
                         display: "none",
                         pointerEvents: "none",
                         boxShadow: "rgba(255, 105, 114, 0.14) 0px 5px 23px 0px"
                     }}
                     className="btn  btn-block bg-success"></div>
            </div>
        </div>
    )
}
