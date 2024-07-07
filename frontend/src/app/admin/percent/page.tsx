type HeadLine = {
    readonly id: number,
    title: string
}

const headLine: HeadLine[] = [
    {id: 0, title: "ID"},
    {id: 1, title: "Процент"},
    {id: 2, title: "Шанс выпадения"},
    {id: 3, title: "Выпадает"},
    {id: 4, title: "Статус"},
    {id: 5, title: "Действие"},
]

export default function Percent() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">

                            <h4 className="card-title card-title-lg" style={{float:"left", paddingTop:"8px"}}>Шансы</h4>
                            <button id='saved' className="btn-ccc btn btn-sm btn-outline btn-light input-bordered" style={{float:"right", width: "130px"}}  data-toggle="modal" data-target="#addper" >Добавить</button>
                            <hr />
                        </div>
                        <div className="card-text">

                            <center>

                                <table id="per-tbl" className="table-responsive-sm table table-striped- table-bordered table-hover table-checkable" style={{width:"100%"}}>

                                    <thead>
                                    <tr>
                                        {headLine.map(value => (
                                            <th className="tbl-name" key={value.id}>{value.title}</th>
                                        ))}
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
