export default function Page() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">

                            <h4 className="card-title card-title-lg mob-t"
                                style={{float: "left", paddingTop: '8px'}}>Пополнения</h4>
                            <hr/>
                        </div>
                        <div className="card-text">

                            <center>

                                <table id="promo-tbl"
                                       className="table-responsive-sm table table-striped- table-bordered table-hover table-checkable"
                                       style={{width: "100%"}}>

                                    <thead>
                                    <tr>
                                        <th className="tbl-name">ID</th>
                                        <th className="tbl-name">№ Транзакции</th>
                                        <th className="tbl-name">ID игрока</th>
                                        <th className="tbl-name">Логин</th>
                                        <th className="tbl-name">Дата</th>
                                        <th className="tbl-name">Сумма</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
