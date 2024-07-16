export default function NewDice() {
   const betdice = () => {
       console.log(1)
   }

    const fun1 = () => {
        console.log(1)
    }

    return (
        <div className="tab-pane fad" id="newdice">
            <div className="game_chance">
                <p className="game_chance_txt">
                    Шанс на победу <br></br> <span className="game_chance_value" style={{color: "#000"}}>
						<span id="one" className="percent_box">50.00</span>%
					</span>
                </p>
                <p className="game_chance_txt">
                    Выплата <br></br> <span className="game_chance_value">
						<span id="winner">1.98</span>x
					</span>
                </p>
            </div>
            <div className="wrap_range">
                <div className="index__home__indicator__inner index__home__indicator__inner--line"
                     style={{display:"none"}}>
                    <div className="index__home__indicator__inner__number is-rolling is-hidden "
                         style={{transform: "translate(-45%, 20px)"}}>
                        <div className="index__home__indicator__inner__number__roll is-negative ">
                            <img alt="vk.com/id321223555" src="../../public/images/cub.svg" className="roll-img"></img>
                            <span
                                id="nums">0.00</span>
                        </div>
                    </div>
                </div>

                <div style={{marginTop: "30px"}}>
                    <div className="row no-gutters height-100">
                        <input type="range" onInput={fun1} id="r1" name="chance"
                               style={{width: "100%", background: "-webkit-linear-gradient(left, rgb(241, 2, 96) 0%, rgb(241, 2, 96) 50%, rgb(8, 229, 71) 50%, rgb(8, 229, 71) 100%)"}}
                               min="2" value="50" max="98" step="0.01" className="range rangeFindOne" />

                    </div>
                    <br/>
                        <br/>
                            <br/>
                                <input style={{float: "left"}} className="input-bordered text-center col-md-4 dice-input"
                                       id="betSizeDice" value="1" placeholder="Сумма ставки" />

                                    <button style={{color: "#fff", float: "right"}} onClick={betdice}
                                            className="btn btn-light btn-block col-md-4" id="betDice">Сделать ставку <i
                                        className="fas fa-coins"></i></button>
                                    <br/>
                </div>
            </div>
        </div>
    )
}
