type HeadLine = {
    readonly id: number,
    title: string
}

type Elements = {
    readonly id: number,
    title: string
}

const headLine: HeadLine[] = [
    {id: 0, title: "Всего игр"},
    {id: 1, title: "Пользователей"},
    {id: 2, title: "Пополнено"},
    {id: 3, title: "На выводе / выплачено"},
]

const elements: Elements[] = [
    {id: 0, title: "<?=$games?>"},
    {id: 1, title: "<?=$users?>"},
    {id: 2, title: "<?=$deps?>"},
    {id: 3, title: "<?=$withdraws?>"},
]

export default function Stat (){
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">

                            <h4 className="card-title card-title-lg mob-t" style={{float: "left", paddingTop: "8px"}}>Статистика сайта</h4>
                                <hr />
                        </div>
                        <div className="card-text">


                            <center>

                                <table id="withdraws-tbl" className="table-responsive-sm table table-striped- table-bordered table-hover table-checkable">

                                    <thead>
                                    <tr>
                                        {headLine.map(item => (
                                            <th className="tbl-name" key={item.id}>{item.title}</th>
                                        ))}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role='row' className='odd'>
                                        {elements.map(item=> (
                                            <td className='sorting_1' tabIndex={0}>{item.title}</td>
                                        ))}
                                    </tr>

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
