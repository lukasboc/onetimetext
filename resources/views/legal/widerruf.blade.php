@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            @if(app()->getLocale() === 'en')
                <h1 class="display-5 fw-bold text-white">Right of revocation.</h1>
                <div class="text-lightgray">
                    <h3>Right of revocation</h3>
                    <p>
                        You have the right to revoke this contract within fourteen days without giving any reason.
                        The revocation period is fourteen days from the day the contract is concluded.
                    </p>
                    <p>To exercise your right of revocation, you must inform the operator:</p>

                    <p>Lukas Bock<br>
                        Gutenfelsstr. 2<br>
                        28217 Bremen, Germany<br><br>
                        E-Mail: widerruf@lubomedia.de
                    </p>

                    <p>
                        by an unequivocal statement (e.g. a letter sent by post or e-mail) of your decision to revoke this contract.
                        You may use the attached model revocation form, but it is not mandatory.
                        You can also fill in and submit the model revocation form or any other unequivocal statement electronically on our website {{ rtrim(parse_url(env('APP_URL', 'https://share-password.de'), PHP_URL_HOST) ?? 'share-password.de', '/') }}.
                        If you make use of this option, we will promptly (e.g. by e-mail) send you a confirmation that the revocation has been received.
                        To meet the revocation deadline, it is sufficient for you to send your communication concerning the exercise of the right of revocation before the revocation period has expired.
                    </p>

                    <h3>Consequences of revocation</h3>
                    <p>If you revoke this contract, we must repay all payments we have received from you, including delivery costs (with the exception of additional costs resulting from the fact that you have chosen a type of delivery other than the cheapest standard delivery offered by us), without undue delay and no later than fourteen days from the day on which we received notification of your revocation of this contract.
                        For this repayment we will use the same means of payment that you used for the original transaction, unless expressly agreed otherwise with you; in no case will you be charged any fees for this repayment.
                    </p>
                    <p>If you have requested that the services begin during the revocation period, you must pay us a reasonable amount corresponding to the proportion of the services already provided up to the point in time at which you inform us of the exercise of the right of revocation with regard to this contract compared with the total scope of the services provided for in the contract.</p>

                    <h3>Model revocation form</h3>
                    <p>(If you wish to revoke the contract, please fill out this form and return it.)</p>
                    <p>– To:<br></p>
                    <p>
                        Lukas Bock<br>
                        Gutenfelsstr. 2<br>
                        28217 Bremen, Germany<br><br>
                        E-Mail: widerruf@lubomedia.de
                    </p>
                    <p>– I/we (*) hereby revoke the contract concluded by me/us (*) for the purchase of the following goods (*) / the provision of the following service (*)</p>
                    <p>– Ordered on (*) / received on (*)</p>
                    <p>– Name of the consumer(s)</p>
                    <p>– Address of the consumer(s)</p>
                    <p>– Signature of the consumer(s) (only if notification is given on paper)</p>
                    <p>– Date</p>
                    <p>__________</p>
                    <p>(*) Delete as applicable.</p>
                </div>
            @else
                <h1 class="display-5 fw-bold text-white">Widerrufsbelehrung.</h1>
                <div class="text-lightgray">
                    <h3>Widerrufsrecht</h3>
                    <p>
                        Sie haben das Recht, binnen vierzehn Tagen ohne Angabe von Gründen diesen Vertrag zu widerrufen.
                        Die Widerrufsfrist beträgt vierzehn Tage ab dem Tag des Vertragsabschlusses.
                    </p>
                    <p>Um Ihr Widerrufsrecht auszuüben, müssen Sie dem Betreiber:</p>

                    <p>Lukas Bock<br>
                        Gutenfelsstr. 2<br>
                        28217 Bremen<br><br>
                        E-Mail: widerruf@lubomedia.de
                    </p>

                    <p>
                        mittels einer eindeutigen Erklärung (z.B. ein mit der Post versandter Brief oder eine E-Mail) über Ihren Entschluss, diesen Vertrag zu widerrufen, informieren.
                        Sie können dafür das beigefügte Muster-Widerrufsformular verwenden, das jedoch nicht vorgeschrieben ist.
                        Sie können das Muster-Widerrufsformular oder eine andere eindeutige Erklärung auch auf unserer Webseite {{ rtrim(parse_url(env('APP_URL', 'https://onetimetext.de'), PHP_URL_HOST) ?? 'onetimetext.de', '/') }} elektronisch ausfüllen und übermitteln.
                        Machen Sie von dieser Möglichkeit Gebrauch, so werden wir Ihnen unverzüglich (z.B. per E-Mail) eine Bestätigung über den Eingang eines solchen Widerrufs übermitteln.
                        Zur Wahrung der Widerrufsfrist reicht es aus, dass Sie die Mitteilung über die Ausübung des Widerrufsrechts vor Ablauf der Widerrufsfrist absenden.
                    </p>

                    <h3>Folgen des Widerrufs</h3>
                    <p>Wenn Sie diesen Vertrag widerrufen, haben wir Ihnen alle Zahlungen, die wir von Ihnen erhalten haben, einschließlich der Lieferkosten (mit Ausnahme der zusätzlichen Kosten, die sich daraus ergeben, dass Sie eine andere Art der Lieferung als die von uns angebotene, günstigste Standardlieferung gewählt haben), unverzüglich und spätestens binnen vierzehn Tagen ab dem Tag zurückzuzahlen, an dem die Mitteilung über Ihren Widerruf dieses Vertrags bei uns eingegangen ist.
                        Für diese Rückzahlung verwenden wir dasselbe Zahlungsmittel, das Sie bei der ursprünglichen Transaktion eingesetzt haben, es sei denn mit Ihnen wurde ausdrücklich etwas anderes vereinbart; in keinem Fall werden Ihnen wegen dieser Rückzahlung Entgelte berechnet.
                    </p>
                    <p>Haben Sie verlangt, dass die Dienstleistungen während der Widerrufsfrist beginnen sollen, so haben Sie uns einen angemessenen Betrag zu zahlen, der dem Anteil der bis zu dem Zeitpunkt, zu dem Sie uns von der Ausübung des Widerrufsrechts hinsichtlich dieses Vertrages unterrichten, bereits erbrachten Dienstleistungen im Vergleich zum Gesamtumfang der im Vertrag vorgesehenen Dienstleistungen entspricht.</p>

                    <h3>Muster-Widerrufsformular</h3>
                    <p>
                        (Wenn Sie den Vertrag widerrufen wollen, dann füllen Sie bitte dieses Formular aus und senden Sie es zurück.)
                    </p>
                    <p>–An:<br></p>
                    <p>
                        Lukas Bock<br>
                        Gutenfelsstr. 2<br>
                        28217 Bremen<br><br>
                        E-Mail: widerruf@lubomedia.de
                    </p>
                    <p>–Hiermit widerrufe(n) ich/wir (*) den von mir/uns (*) abgeschlossenen Vertrag über den Kauf der folgenden Waren (*)/die Erbringung der folgenden Dienstleistung (*) </p>
                    <p>–Bestellt am (*)/erhalten am (*)</p>
                    <p>–Name des/der Verbraucher(s)</p>
                    <p>–Anschrift des/der Verbraucher(s)</p>
                    <p>–Unterschrift des/der Verbraucher(s) (nur bei Mitteilung auf Papier) </p>
                    <p>–Datum</p>
                    <p>__________</p>
                    <p>(*) Unzutreffendes streichen.</p>
                </div>
            @endif
        </div>
    </div>

@endsection
