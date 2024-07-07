interface INavbarMenu {
    readonly id: number,
    title: string,
    link: string
}

const navbarMenuList: INavbarMenu[] = [
    {id: 0, title: "Настройки сайта", link: "/admin"},
    {id: 1, title: "Пользователи", link: "/admin/users"},
    {id: 2, title: "Промокоды", link: "/admin/promo"},
    {id: 3, title: "Пополнения", link: "/admin/deps"},
    {id: 4, title: "Выплаты", link: "/admin/withdraws"},
    {id: 5, title: "Настройка ботов", link: "/admin/bot"},
    {id: 6, title: "Статистика сайта", link: "/admin/stat"},
    {id: 7, title: "Шансы", link: "/admin/percent"},
]


export default function TopBar() {
    return (
        <div className="topbar-wrap" style={{paddingTop: 0}}>
            <div className="topbar is-sticky">
                <div className="container">
                    <div className="container__a">
                        <ul className="topbar-nav d-lg-none">
                            <li className="topbar-nav-item relative" id="close-nav"><a className="toggle-nav" href="">
                                <div className="toggle-icon"><span className="toggle-line"></span><span
                                    className="toggle-line"></span><span className="toggle-line"></span><span
                                    className="toggle-line"></span></div>
                            </a></li>
                        </ul>
                        <center className="desktop-nav"
                                style={{fontWeight: 600, padding: 5, color: "#fff", fontSize: 25}}></center>
                    </div>
                </div>
            </div>
            <div className="navbar">
                <div className="container">
                    <div className="navbar-innr">

                        <ul className="navbar-menu des">
                            {navbarMenuList.map(item => (
                                <li key={item.id}><a href={item.link}>{item.title}</a></li>
                            ))}
                        </ul>

                        <ul className="navbar-menu mmmob">
                            {navbarMenuList.map(item => (
                                <li key={item.id}><a href={item.link}>{item.title}</a></li>
                            ))}
                        </ul>

                        <ul className="navbar-btns">
                            <li><a href="<?=$group?>" target="_blank" className="btn btn-sm btn-outline btn-light"><em
                                style={{color: "#3b5998"}} className="fab fa-vk"></em><span>Вконтакте</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    )
}
