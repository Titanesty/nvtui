export default function Bot() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">

                            <h4 className="card-title card-title-lg mob-t"
                                style={{float: "left", paddingTop: 8}}>Боты</h4>
                            <button className="btn-ccc btn btn-sm btn-outline btn-light input-bordered col-12"
                                    style={{float: "right", width: 120}} data-toggle="modal"
                                    data-target="#addbot">Добавить <i className="fas fa-plus icon-edit"></i>
                            </button>
                                <hr />
                        </div>
                        <div className="card-text">

                            <center>

                                <table id="bot-tbl"
                                       className="table-responsive-sm table table-striped- table-bordered table-hover table-checkable"
                                       style={{width:"100%"}}>

                                    <thead>
                                    <tr>
                                        <th className="tbl-name">ID</th>
                                        <th className="tbl-name">Логин бота</th>
                                        <th className="tbl-name">Мин. ставка</th>
                                        <th className="tbl-name">Макс. ставка</th>
                                        <th className="tbl-name">Статус</th>
                                        <th className="tbl-name">Действие</th>


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
