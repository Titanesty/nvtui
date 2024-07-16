export default function Navbar() {
    return (
        <div className="navbar">
            <div className="container">

                <div className="navbar-innr">

                    <ul className="navbar-menu des">
                        <li className="active"><a href="/">Главная</a></li>
                        <li><a href="/check.php">Честная игра</a></li>
                        <li><a href="/faq.php">FAQ</a></li>
                        <li><a href="/support.php">Контакты</a></li>
                        <li><a href="/withdraws.php">Выплаты</a></li>
                        {'? php if ($is_admin == 1) {?'}

                        <li><a href="/admin">Админка</a></li>
                        {"<?php} ?>"}
                    </ul>


                    <ul className="navbar-menu mmmob">
                        <li className="has-dropdown page-links-all"><a className="drop-toggle" href="#">Страницы</a>
                            <ul className="navbar-dropdown" style={{color: "#495463"}}>
                                <li><a href="/">Главная</a></li>
                                <li><a href="/check.php">Честная игра</a></li>
                                <li><a href="/faq.php">FAQ</a></li>
                                <li><a href="/support.php">Контакты</a></li>
                                <li><a href="/withdraws.php">Выплаты</a></li>

                            </ul>
                        </li>

                        <li><a className="asff4"

                            // onClick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#game').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"
                        >Играть</a>
                        </li>
                        <li><a className="asff4"

                            // onClick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#profile').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"
                        >Настройки</a>
                        </li>
                        <li><a className="asff4"
                            //onClick="location.href='<?= $site_support ?>'"
                        >Служба поддержки</a>
                        </li>

                        <li><a className="asff4"

                            //onClick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#ref').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"
                        >Мои
                            рефералы</a></li>
                        <li><a className="asff4"

                            //onClick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#bonus').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"
                        >Раздача</a>
                        </li>
                        {"<?php if ($is_admin == 1) {?>"}

                        <li><a className="asff4"
                            // onClick="location.href = '/admin';"
                        >Админка</a></li>

                        {"<?php} ?>"}
                        <li><a className="asff4"
                            // onClick="exit();location.href = '';"
                        >Выйти</a></li>


                    </ul>


                    <ul className="navbar-btns">
                        <li><a href="<?= $group ?>" target="_blank" className="btn btn-sm btn-outline btn-light"><em
                            style={{color: "#3b5998"}} className="fab fa-vk"></em><span>Вконтакте</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    )
}
