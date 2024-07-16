export default function CoinFlip() {

    const coinflipbet = (n: number) => {
        console.log("coinflipbet", n)
    }

    return (
        <div className="tab-pane fad" id="coinflip">
            <div className="game-tbl">
                <center>
                    <div id="coin">
                        <div className="side-a"><img src="../../../public/images/orel.png" alt="orel"/></div>
                        <div className="side-b"><img src="../../../public/images/reshka.png" alt="reshka"/></div>
                    </div>
                </center>
            </div>
            <div className="bets-tbl" id="betsss">
                <div className="amount-bomb box">
                    <div className="title text-uppercase text-center"> Сделать ставку</div>
                    <div className="content">
                        <input style={{width:"100%"}} className="input-bordered text-center"
                               id="coinflipBet" value="1" placeholder="Сумма ставки"/>
                        <div className="dice-game-box-percent coinflipButtons">

                            <button type="button" style={{color: "#fff", width: "33%"}}
                                    className="text-center btn btn-success dice-game-box-percent-btn"
                                    onClick={()=> coinflipbet(1)}>Орёл<sup>x2</sup></button>
                            <button type="button" style={{color: "#fff", width: "33%"}}
                                    className="text-center btn btn-success dice-game-box-percent-btn btn-wheel-red"
                                    onClick={()=> coinflipbet(30)}>Ребро<sup>x10</sup>
                            </button>
                            <button type="button" style={{color: "#fff", width: "33%"}}
                                    className="text-center btn btn-success dice-game-box-percent-btn btn-wheel-yellow"
                                    onClick={()=> coinflipbet(2)}>
                                <center>Решка<sup>x2</sup></center>
                            </button>
                        </div>
                        <center>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    )
}
