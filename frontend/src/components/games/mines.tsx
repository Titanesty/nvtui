export default function Mines() {
    const numbers = Array.from(Array(25), (_, index) => index + 1);

    const finishgame = () => {
        console.log(1)
    }

    const startgame = () => {
        console.log(1)
    }


    return (
        <div className="tab-pane fad" id="mines">
            <center>
                <div className='mine-game-tbl'>
                    <div className="minefield">
                        {numbers.map(number => (
                            <button key={number} className="mine" data-number="1">{number}</button>
                        ))}
                    </div>
                </div>
                <div className='mine-bets-tbl'>
                    <input style={{width: "100%"}} className="input-bordered text-center"
                           id="amountBetInputBomb" value="1" placeholder="Сумма ставки"/><br/>
                    <button id="startmines" className="btn btn-primary"
                            style={{width: "49%", boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)", color: "#fff", marginTop: "10px", marginBottom: "8px"}}
                            onClick={startgame}>Начать игру
                    </button>
                    <button id="finishmines" className="btn btn-primary"
                            style={{width:"49%", boxShadow: "0 5px 23px 0 rgba(0, 125, 255, 0.3)", color: "#fff", marginTop: "10px", marginBottom: "8px"}}
                            onClick={finishgame}>Забрать
                    </button>
                    <br/>

                    <div className='select-bomb'>

                        <p><span>Число мин:</span></p>

                        <span className="btn btn-xs btn-auto select-bomb-min circle"
                              data-select="3">3</span>
                        <span className="btn btn-xs btn-auto select-bomb-min circle"
                              data-select="5">5</span>
                        <span className="btn btn-xs btn-auto select-bomb-min circle"
                              data-select="10">10</span>
                        <span className="btn btn-xs btn-auto select-bomb-min circle"
                              data-select="24">24</span>


                    </div>
                    <br/>
                    <div style={{display: "inline-block", float: "left"}}>
                        <p><span style={{marginTop: "7px"}}>Следующий икс:</span></p>
                        <p><span className="" style={{fontSize: "44px"}} id="MineProfit">1.00</span> <span
                            style={{fontSize: "44px"}}> X</span></p>
                    </div>
                    <div style={{display: "inline-block", float:"right"}}>
                        <p><span style={{marginTop: "7px"}}>Выигрыш:</span></p>
                        <p><span className="" style={{fontSize: "44px"}} id="win">0.00</span> <span
                            style={{fontSize: "44px"}}> Р</span></p>
                    </div>
                </div>
                </center>
        </div>
)
}
