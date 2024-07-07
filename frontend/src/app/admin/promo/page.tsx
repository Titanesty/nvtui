export default function Promo() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">

                            <h4 className="card-title card-title-lg mob-t"
                                style={{float: "left", paddingTop: "8px"}}>Промокоды</h4>
                            <button className="btn-ccc btn btn-sm btn-outline btn-light input-bordered col-12"
                                    style={{float: "right", width: "120px"}} data-toggle="modal"
                                    data-target="#addpromo">Добавить <i className="fas fa-plus icon-edit"></i></button>
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
                                        <th className="tbl-name">Дата создания</th>
                                        <th className="tbl-name">Админский</th>
                                        <th className="tbl-name">Название</th>
                                        <th className="tbl-name">Сумма</th>
                                        <th className="tbl-name">актив.</th>


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
