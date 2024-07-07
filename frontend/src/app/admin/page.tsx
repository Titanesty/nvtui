"use client"

type List = {
    readonly id: number,
    title: string,
    idName: string,
    value: string
}

const list: List[] = [
    { id: 1, title: 'Название сайта', idName: 'sitename', value: '<?=$sitename?>' },
    { id: 2, title: 'Домен сайта', idName: 'sitedomen', value: '<?=$sitedomen?>' },
    { id: 3, title: 'Ссылка на группу VK', idName: 'sitegroup', value: '<?=$group?>' },
    { id: 4, title: 'Ссылка на сообщения VK', idName: 'sitesupport', value: '<?=$site_support?>' },
    { id: 5, title: 'Секретный ключ сайта', idName: 'sitesecret', value: '<?=$sitekey?>' },
    { id: 6, title: 'Мин. бонус в раздаче', idName: 'minbonus', value: '<?=$min_bonus_s?>' },
    { id: 7, title: 'Макс. бонус в раздаче', idName: 'maxbonus', value: '<?=$max_bonus_s?>' },
    { id: 8, title: 'Мин. сумма вывода', idName: 'minwithdraw', value: '<?=$min_withdraw_sum?>' },
    { id: 9, title: 'Депозит для вывода', idName: 'depwithdraw', value: '<?=$dep_withdraw?>' },
    { id: 10, title: 'Мин. сумма ставки', idName: 'minbet', value: '<?=$min_bet?>' },
    { id: 11, title: 'Макс. сумма ставки', idName: 'maxbet', value: '<?=$max_bet?>' },
    { id: 12, title: 'Мин. шанс выигрыша', idName: 'minper', value: '<?=$min_per?>' },
    { id: 13, title: 'Макс. шанс выигрыша', idName: 'maxper', value: '<?=$max_per?>' },
    { id: 14, title: 'Бонус за регистрацию', idName: 'bonusreg', value: '<?=$bonus_reg?>' },
    { id: 15, title: 'Прибавить к онлайну', idName: 'fakeonline', value: '<?=$fake_online?>' },
    { id: 16, title: 'Частота ставок ботов (1к = 1сек)', idName: 'fakeinterval', value: '<?=$fake_interval?>' },
    { id: 17, title: 'ID группы VK', idName: 'idgroup', value: '<?=$idvk?>' },
    { id: 18, title: 'Токен группы VK', idName: 'token', value: '<?=$tokenvk?>' },
    { id: 19, title: 'Мин. сумма пополнения', idName: 'mindep', value: '<?=$min_sum_dep?>' },
    { id: 20, title: 'ID FK', idName: 'fkid', value: '<?=$fk_id?>' },
    { id: 21, title: 'Секрет 1 FK', idName: 'fksecret1', value: '<?=$fk_secret_1?>' },
    { id: 22, title: 'Секрет 2 FK', idName: 'fksecret2', value: '<?=$fk_secret_2?>' },
];

const saves = () => {
    console.log(saves)
}

export default function Admin() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">
                            <h4 className="card-title card-title-lg" style={{float: "left", paddingTop: "8px"}}>Настройки</h4>
                            <button id='saved' className="btn-ccc btn btn-sm btn-outline btn-light input-bordered"
                                    style={{float:"right", width:"130px"}} onClick={saves}>Сохранить
                            </button>
                            <hr/>
                        </div>

                        <center>
                            <div className="row" id="setting-tbl" style={{marginRight:"2%",marginLeft: "2%",width:"100%"}}>
                                {list.map(item => (
                                    <div className="form-group">
                                        <div className="col-lg-12" >
                                            <label>{item.title}</label>
                                            <input type="text" className="form-control" id={item.idName}
                                                   placeholder={item.title} value={item.value}/>
                                        </div>
                                    </div>
                                ))}

                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
)
}
