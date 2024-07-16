"use client"

import Navbar from "@/app/navbar";

const go = () => {
    window.location.href='/'
}

export default function Topbar() {
    return (
        <div className="topbar-wrap" style={{paddingTop: "0px"}}>
            <div className="topbar is-sticky">
                <div className="container">
                    <div className="">
                        {/*<style>*/}
                        {/*    .mmmob {*/}
                        {/*    display: none;*/}
                        {/*}*/}

                        {/*    @media (max-width: 991px) {*/}
                        {/*    .des {*/}
                        {/*    display: none;*/}
                        {/*}*/}

                        {/*    .mmmob {*/}
                        {/*    display: block;*/}
                        {/*}*/}

                        {/*    .desktop-nav {*/}
                        {/*    margin-top: -55px;*/}
                        {/*}*/}

                        {/*}*/}

                        {/*</style>*/}
                        <ul className="topbar-nav d-lg-none">
                            <li className="topbar-nav-item relative" id="close-nav"><a className="toggle-nav">
                                <div className="toggle-icon"><span className="toggle-line"></span><span
                                    className="toggle-line"></span><span className="toggle-line"></span><span
                                    className="toggle-line"></span></div>
                            </a></li>
                        </ul>
                        <center onClick={go} className="desktop-nav"
                                style={{cursor:"pointer", fontWeight: 600, padding: "5px", color: "#fff", fontSize: "25px"}}>{"<?= $sitename ?>"}
                        </center>
                    </div>
                </div>
            </div>
            <Navbar />
        </div>
    )
}

