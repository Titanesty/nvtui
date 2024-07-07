export default function Withdraws() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">

                            <h4 className="card-title card-title-lg mob-t"
                                style={{float: "left", paddingTop: "8px"}}>Выплаты</h4>
                            <button className="btn-ccc btn btn-sm btn-outline btn-light input-bordered"
                                    style={{float: "right", width: "130px"}} data-toggle="modal"
                                    data-target="#addfake">Фейк выплата
                            </button>
                            <br/><br/>
                            <hr/>
                        </div>
                        <div className="card-text">

                            <center>

                                <table id="withdraws-tbl"
                                       className="table-responsive-sm table table-striped- table-bordered table-hover table-checkable">

                                    <thead>
                                    <tr>
                                        <th className="tbl-name">ID</th>
                                        <th className="tbl-name">Фейк</th>
                                        <th className="tbl-name">Дата</th>
                                        <th className="tbl-name">ID игрока</th>
                                        <th className="tbl-name">Логин</th>
                                        <th className="tbl-name">ПС</th>
                                        <th className="tbl-name">Кошелек</th>
                                        <th className="tbl-name">Сумма</th>
                                        <th className="tbl-name">Статус</th>

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

