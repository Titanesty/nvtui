export default function Wheel() {
    const chanceGameCalculate = () => {
        console.log("chanceGameCalculate")
    }

    const wheel = (n: number) => {
        console.log("wheel", n)
    }

    return (
        <div className="tab-pane fad" id="wheel">
            <div className="KotDev.fun">
                <div className="game-tbl">
                    <center>
                        <div id="activeBorder" className="wheel-circle" style={{marginBottom: "140px"}}>
                            <img id="x50" src="" className="relll"
                                 style={{position: "relative"}}  alt="wheel"/>
                                <div className="arrow-chance" style={{marginTop:"-18%"}}><i
                                    className="fas fa-location-arrow" id="chanceArrow"></i></div>
                        </div>
                    </center>
                </div>
                <div className="right-side bets-tbl">
                    <center>
                        <div className="amount-bet box">
                            <div className="title text-uppercase">Сумма ставки</div>
                            <div className="content amount-bet-content">
                                <div className="amout-bet-content-inp" style={{width:"100%"}}>
                                    <input className="input-bordered text-center" type="number"
                                           value="1" id="amountBetInputWheelGame"
                                           onKeyUp={chanceGameCalculate}
                                           onKeyDown={chanceGameCalculate} style={{width: "auto"}}/>
                                </div>
                            </div>
                        </div>

                        <div className="dice-game-box-percent">
                            <button style={{color: "#fff"}}
                                    className="btn btn-wheel-black dice-game-box-percent-btn"
                                    onClick={()=> wheel(2)}>x2
                            </button>
                            <button style={{color: "#fff"}}
                                    className="btn btn-danger btn-wheel-red dice-game-box-percent-btn"
                                    onClick={()=> wheel(3)}>x3
                            </button>
                        </div>
                        <div className="dice-game-box-percent">
                            <button className="btn btn-wheel-blue dice-game-box-percent-btn"
                                    onClick={()=> wheel(5)} style={{background: "#345ed7", color: "#fff"}}>x5
                            </button>
                            <button className="btn btn-wheel-yellow dice-game-box-percent-btn"
                                    onClick={()=> wheel(50)}
                                    style={{background: "#eed152", color: "#fff", border:"0"}}>x50
                            </button>
                        </div>
                        <br/>

                    </center>
                </div>
            </div>
        </div>
    )
}
