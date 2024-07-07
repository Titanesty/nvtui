type FooterLinks = {
    readonly id: number,
    title: string,
    link: string,
    target: string
}

const footerLinks: FooterLinks[] = [
    {id: 0, title: "Лицензионное соглашение", link: "#", target: "#modalRules"},
    {id: 1, title: "Правила", link: "#", target: "#modalNoAzart"},
]

export default function Footer() {
    return (
        <div className="footer-bar">
            <div className="container">
                <div className="row align-items-center justify-content-center">
                    <div className="col-md-8" style={{display: "inline"}}>
                    </div>
                    <div className="col-md-12 mt-12 mt-sm-12">
                        <div
                            className="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                            <ul className="footer-links">
                                {footerLinks.map(link => (
                                  <li key={link.id}><a href={link.link} data-target={link.target}>{link.title}</a></li>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
