'use client'
const save_user_edit = () => {
console.log("1")
    // $.ajax({
    //     type: 'POST',
    //     url: '/admin/admin_func.php',
    //     beforeSend: function() {
    //         $("#status").hide();
    //     },
    //     data: {
    //         type: "saveInfo",
    //         id: $("#userid").html(),
    //         username: $("#username").val(),                                          userpass: $("#userpass").val(),
    //         userbal: $("#userbal").val(),
    //         userlose: $("#loser").val(),
    //         userwin: $("#winner").val()
    //     },
    //     success: function(data) {
    //         var obj = jQuery.parseJSON(data);
    //         if (obj.success == "success") {
    //             $("#status").show();
    //             $("#status").html("Данные успешно изменены");
    //
    //             return
    //         }else{
    //             $("#status").show();
    //             $("#status").html(obj.error);
    //         }
    //     }
    // });
}

export default function Modal() {
    return (
        <div className="modal fade show infotbl" id="userinfo" tabIndex={-1} style={{display: "none"}}>
            <div className="modal-dialog modal-dialog-md modal-dialog-centered">
                <div className="modal-content"><a className="modal-close" data-dismiss="modal" aria-label="Close"><em className="ti ti-close"></em></a>
                    <div className="popup-body">
                        <center><p>Настройки данных пользователя #<span id='userid' style={{color:"gray"}}>1</span></p>
                            <hr/>
                                <p>Логин
                                    <input type='text' className='input-bordered col-12' id='username' placeholder='Владимир Кот' /></p>
                                <p>Пароль
                                    <input type='text' className='input-bordered col-12' id='userpass' placeholder='1212121212' /></p>
                                <p>Баланс
                                    <input type='text' className='input-bordered col-12' id='userbal' placeholder='500.00' /></p>
                                <p>Подкрутка
                                    <select className="input-bordered form-control" id="winner">
                                        <option value="0">Выключена</option>
                                        <option value="1">Включена</option>

                                    </select></p>
                                <p>Открутка
                                    <select className="input-bordered form-control" id="loser">
                                        <option value="0">Выключена</option>
                                        <option value="1">Включена</option>

                                    </select></p>
                                <span style={{color:"gray"}} id='status'></span>
                                <button className="btn btn-sm btn-outline btn-light input-bordered col-12" style={{width:200}} onClick={save_user_edit}>Сохранить</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    )
}
