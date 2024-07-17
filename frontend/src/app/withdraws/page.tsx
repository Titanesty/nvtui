export default function Withdraws() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-10 col-xl-9">
                        <div className="kyc-status card mx-lg-4">
                            <div className="card-innr">
                                <div className="content">
                                    <h4 className="text-secondary">Последние выплаты</h4>
                                    <table className="table tnx-table table-responsive text-center"
                                           style={{marginTop: "20px"}}>
                                        <thead>
                                        <tr>
                                            <th style={{width: "15%"}}>Логин игрока</th>
                                            <th>Сумма</th>
                                            <th>Система</th>
                                            <th>Кошелек</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
