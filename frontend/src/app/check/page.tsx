export default function Check() {
    return (
        <div className="page-content">
            <div className="container">
                <div className="card content-area">
                    <div className="card-innr">
                        <div className="card-head">
                            <h4 className="card-title card-title-lg">Абсолютно честно</h4>
                        </div>
                        <div className="card-text">
                            <p>Перед каждой игрой генерирутеся строка <a href="https://ru.wikipedia.org/wiki/SHA-2"
                                                                         target="_blank">алгоритмом SHA-512 </a> в
                                которой содержится <a
                                    href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D0%BB%D1%8C_(%D0%BA%D1%80%D0%B8%D0%BF%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D1%8F)"
                                    target="_blank">соль</a> и победное число (от 0 до 999999). Можно сказать, что перед
                                Вами зашифрованный исход данной игры. Метод гарантирует <b>100% честность</b>, так как
                                результат игры Вы видите заранее, а при изменении победного числа приведет к изменению
                                Hash.</p>

                            Проверяйте самостоятельно:
                            <ul>
                                <li>Скоприруйте Hash до начала игры</li>
                                <li>После окончания нажмите <code className="highlighter-rouge">"Проверить игру"</code>
                                </li>
                                <li>Откроется окно с результатом</li>
                                <li>Скопируйте вручную поля Salt1, Number (Победное число), Salt2 или нажмите
                                    кнопку <code className="highlighter-rouge">"Скопировать"</code></li>
                                <li>Вставьте в любой независимый SHA-512 генератор (Например: <a
                                    href="https://emn178.github.io/online-tools/sha512.html" target="_blank">Ссылка
                                    1</a> <a href="https://www.md5calc.com/sha512" target="_blank">Ссылка 2</a> <a
                                    href="https://passwordsgenerator.net/sha512-hash-generator/" target="_blank">Ссылка
                                    3</a>)
                                </li>
                                <li>Hash должен совпадать c Hash до начала игры</li>
                            </ul>
                            <hr/>
                            Например:
                            <ul>
                                <li>Hash до начала игры:
                                    cdbe74ade59f5b8e3372c1e107ca8d343da9efa1a173ba6bc678daa28b586b25a7c2e39a71badf7f00e04b5c1dbc43532b92a1f2913b0540f490968d7ce883fe
                                </li>
                                <li>После окончания нажали на <code className="highlighter-rouge">"Проверить
                                    игру"</code>, открылось окно
                                </li>
                                <li>Копируем значения Salt1, Number (Победное число), Salt2</li>
                                <li>Получаем строку <code
                                    className="highlighter-rouge">{"8{93mW8huq|995544|a5cm28bjA0"}</code></li>
                                <li>Вставляем строку в <a href="https://emn178.github.io/online-tools/sha512.html"
                                                          target="_blank">генератор</a></li>
                                <li>Получили hash как и до начала игры</li>
                                <br/>Создателем скрипта является Владимир Кот - <a href="https://vk.com/id321223555"
                                                                                   target="_blank">*тык*</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
