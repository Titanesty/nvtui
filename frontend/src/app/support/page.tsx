export default function Support() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="row">
                    <div className="main-content col-12">
                        <div className="content-area card">
                            <div className="card-innr">
                                <div className="content">
                                    <h4 className="text-secondary">Контакты</h4>
                                    <p>Для связи с поддержкой пишите в <a target="_blank" href="<?=$group?>">сообщество
                                        Вконтакте</a> или на <a>{"? = $mail ?"}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
