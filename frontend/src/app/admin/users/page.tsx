import Modal from "@/app/admin/modal";

type Headline = {
    id: number,
    title: string
}

const headlines: Headline[] = [
    {id: 0, title: "ID"},
    {id: 1, title: "Логин"},
    {id: 2, title: "Баланс"},
    {id: 3, title: "Профиль VK"},
    {id: 4, title: "Привилегии"},
    {id: 5, title: "Бан"},
    {id: 6, title: "IP адрес"},
    {id: 7, title: "Действия"},
]

export default function Page() {
    return (
        <>
            <div className="page-content">
                <div className="container">
                    <div className="card content-area">
                        <div className="card-innr">
                            <div className="card-head">
                                <h4 className="mob-t card-title card-title-lg mob-t"
                                    style={{float: "left", paddingTop: 8}}>Пользователи (Всего: )</h4>
                                <hr/>
                            </div>
                            <div className="card-text">

                                <center>

                                    <table id="withdraws-tbl"
                                           className="table-responsive-sm table table-striped- table-bordered table-hover table-checkable">

                                        <thead>
                                        <tr>
                                            {headlines.map(headLine => (
                                                <th className="tbl-name" key={headLine.id}>{headLine.title}</th>
                                            ))}
                                        </tr>
                                        </thead>
                                        <tbody id="users-block">


                                        </tbody>
                                    </table>
                                </center>

                            </div>
                        </div>
                    </div>
                </div>

                <Modal/>
            </div>
        </>
    )
}
