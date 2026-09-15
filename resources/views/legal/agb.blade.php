@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            @if(app()->getLocale() === 'en')
                <h1 class="display-5 fw-bold text-white">Terms and Conditions.</h1>
                <div class="text-lightgray">
                    <h3>Scope of the Terms and Conditions</h3>
                    <p>These Terms and Conditions apply to contracts between Lukas Bock (hereinafter referred to as the "Operator") and users of the IT tool "{{ env('APP_NAME', 'SharePassword') }}".<br>
                    </p>
                    <h3>Operator's services</h3>
                    <ul>
                        <li>
                            The Operator enables users to use the {{ env('APP_NAME', 'SharePassword') }} software over the Internet as "Software as a Service / SaaS" (hereinafter the "Tool" or the "Software"). For this purpose, the Operator provides the Tool for access on its own servers or on servers of a data centre in the Federal Republic of Germany. Via these servers, the software is kept available for use and the data that is generated, collected, used and stored when using the software is stored to the agreed extent and made available for retrieval via remote data access. Access to the Tool and the stored data is possible at any time outside the maintenance window, unless the Operator has to carry out urgent support measures or other urgent measures to maintain usability.
                        </li>
                        <li>
                            The Operator grants users a simple, non-transferable right to use the "{{ env('APP_NAME', 'SharePassword') }}" software for the duration of the contract.
                        </li>
                        <li>
                            The Operator is not obliged to provide the user with documentation of the Tool / operator manual. The Operator provides notes on the functionalities within the software itself and allows users access to relevant information that the Operator makes available online as required.
                        </li>
                    </ul>
                    <h3>Online availability of services</h3>
                    <ul>
                        <li>
                            The availability of the software per contract year is at least eighty-five percent (85%). Availability relates exclusively to the availability owed at the handover point. The router output at the data centre commissioned by the Operator is defined as the handover point of the service.
                        </li>
                        <li>
                            Planned downtimes within the maintenance window as well as unplanned downtimes due to force majeure and disasters are not taken into account for availability.
                        </li>
                    </ul>
                    <h3>Changes to the software, defect rectification and maintenance window</h3>
                    <ul>
                        <li>
                            The Operator is entitled to change the design of the software and to adapt functionalities.
                        </li>
                        <li>
                            For the rectification of errors or defects in the software or to bring about or maintain the contractually agreed condition of the software, the Operator reserves the right to choose the type of defect rectification.
                        </li>
                        <li>
                            The Operator is entitled, once a week, to deny access to the software and stored data for a maximum of 3 hours (maintenance window) in order to carry out changes to the software or other maintenance work.
                        </li>
                    </ul>

                    <h3>Contract duration / termination</h3>
                    <ul>
                        <li>
                            The contract runs for an indefinite period and may be terminated by either party with one month's notice to the end of the respective contract month. The minimum contract term is one month.
                        </li>
                        <li>
                            The right of both parties to terminate the contractual relationship by extraordinary termination for good cause remains unaffected in addition.
                        </li>
                        <li>
                            Termination must be made by email or via the website.
                        </li>
                    </ul>
                    <h3>Prices and payment methods</h3>
                    <ul>
                        <li>
                            In consideration for the full range of services of the software, a monthly fee of €4.99 is due. This fee is payable in advance and non-refundable.
                        </li>
                        <li>
                            In order to use the full range of services of the software, the user must select one of the available payment methods. The user authorises the Operator to charge the fee using the selected payment method. If a charge fails, e.g. because there is no sufficient balance, the customer remains responsible for paying the fee.
                        </li>
                        <li>
                            The following payment methods are offered: credit card, PayPal, Apple Pay, Google Pay, Link.
                        </li>
                        <li>
                            When using a payment system of an external service provider (e.g. Stripe and PayPal), their general terms and conditions must be observed.
                        </li>
                    </ul>
                    <h3>Shipping</h3>
                    <p>This is a digital product. There is no shipment by post. Access to the digital product is granted after the user has registered with the access data they have chosen.</p>

                    <h3>Customer's obligations</h3>
                    <p>The customer is obliged to use the software for its intended purpose and not to misuse it.</p>
                </div>
            @else
                <h1 class="display-5 fw-bold text-white">Allgemeine Geschäftsbedingungen (AGB).</h1>
                <div class="text-lightgray">
                    <h3>Geltungsbereich der Geschäftsbedinungen</h3>
                    <p>Diese Geschäftsbedingungen gelten für Verträge zwischen Lukas Bock (nachstehend “Betreiber” genannt)
                        und Nutzern des IT-Tools “{{ env('APP_NAME', 'OneTimeText') }}.de”.<br>
                    </p>
                    <h3>Leistungen des Betreibers</h3>
                    <ul>
                        <li>
                            Der Betreiber ermöglicht den Nutzern die Nutzung der Software {{ env('APP_NAME', 'OneTimeText') }} über das Internet als
                            „Software as a Service/ SaaS“ (nachstehend das „Tool oder die Software“ genannt).
                            Der Betreiber stellt hierfür das Tool auf seinen eigenen Servern oder auf Servern eines
                            Rechenzentrums in der Bundesrepublik Deutschland zum Zugriff zur Verfügung.
                            Über diese Server wird die Software zur Nutzung bereitgehalten sowie die Daten, die bei der
                            Nutzung der Software erzeugt, erhoben, genutzt und vorgehalten werden, im vereinbarten Umfang
                            gespeichert und über einen Datenfernzugriff zum bestimmungsgemäßen Abruf bereit gehalten.
                            Der Zugriff auf das Tool und die gespeicherten Daten ist jederzeit außerhalb des
                            Wartungsfensters möglich, es sei denn, der Betreiber muss dringende Supportmaßnahmen oder
                            sonstige dringende Maßnahmen zur Aufrechterhaltung der Nutzbarkeit durchführen.
                        </li>
                        <li>
                            Der Betreiber räumt den Nutzern ein einfaches, nicht übertragbares Nutzungsrecht der Software “{{ env('APP_NAME', 'OneTimeText') }}” für die Laufzeit des Vertrags ein.
                        </li>
                        <li>
                            Der Betreiber ist nicht verpflichtet, dem Nutzer eine Dokumentation des Tools / Bedienerhandbuch zur Verfügung zu stellen.
                            Der Betreiber stellt Hinweise zu den Funktionalitäten in der Software selbst zur Verfügung und ermöglicht den Nutzern den Zugang zu entsprechenden Informationen, die der Betreiber nach Bedarf online zugänglich macht.
                        </li>
                    </ul>
                    <h3>Onlineverfügbarkeit der Leistungen</h3>
                    <ul>
                        <li>
                            Die Verfügbarkeit der Software pro Vertragsjahr beträgt mindestens fünfundachzig Prozent (85%). Die Verfügbarkeit bezieht sich ausschließlich auf die am Übergabepunkt geschuldete Verfügbarkeit.
                            Als Übergabepunkt der Leistung ist der Router Ausgang am vom Betreiber beauftraten Rechenzentrum definiert.
                        </li>
                        <li>
                            Nicht berücksichtigt bei der Verfügbarkeit werden geplante Ausfallzeiten im Wartungsfenster sowie ungeplante Ausfallzeiten aufgrund höherer Gewalt und Katastrophen.
                        </li>
                    </ul>
                    <h3>Änderungen der Software, Fehlerbeseitigung und Wartungsfenster</h3>
                    <ul>
                        <li>
                            Der Betreiber ist berechtigt, das Design der Software zu ändern sowie Funktionalitäten anzupassen.
                        </li>
                        <li>
                            Zur Beseitigung von Fehlern bzw. Mängeln an der Software oder zur Herbeiführung bzw. Aufrechterhaltung der vertragsgemäßen Beschaffenheit der Software, behält sich der Betreiber die Wahl der Art der Mängelbeseitigung vor.
                        </li>
                        <li>
                            Der Betreiber ist berechtigt, ein Mal wöchentlich für die Dauer von maximal 3 Stunden den Zugriff auf die Software und die gespeicherten Daten zu verwehren (Wartungsfenster), um Änderungen an der Software oder sonstige Wartungsarbeiten durchführen zu können.
                        </li>
                    </ul>

                    <h3>Vertragsdauer / Kündigung</h3>
                    <ul>
                        <li>
                            Der Vertrag läuft auf unbestimmte Zeit und kann von beiden Parteien mit einer Frist von einem Monat zum Ende des jeweiligen Vertragsmonats gekündigt werden.
                            Die Mindestvertragslaufzeit beträgt einen Monat.
                        </li>
                        <li>
                            Das Recht beider Parteien, das Vertragsverhältnis durch außerordentliche Kündigung aus wichtigem Grund zu beenden, bleibt daneben und darüber hinaus unbenommen.
                        </li>
                        <li>
                            Die Kündigung hat per E-Mail oder über die Website zu erfolgen.
                        </li>
                    </ul>
                    <h3>Preise und Bezahlmethoden</h3>
                    <ul>
                        <li>
                            Als Gegenleistung für den vollen Leistungsumfang der Software ist eine monatliche Gebühr von 4,99€ zu zahlen. Diese Gebühr ist im Voraus fällig und nicht erstattbar.
                        </li>
                        <li>
                            Um den vollen Leistungsumfang der Software nutzen zu können, muss der Nutzer eine der vorgegebenen Zahlungsarten auswählen.
                            Der Nutzer autorisiert den Betreiber die Gebühr bei der ausgewählten Zahlungsart zu belasten.
                            Scheitert eine Belastung, z.B. weil kein ausreichendes Guthaben besteht, bleibt der Kunde für die Zahlung der Gebühr verantwortlich.
                        </li>
                        <li>
                            Angeboten werden die Bezahlarten Kreditkarte, PayPal, Apple Pay, Google Pay, Link.
                        </li>
                        <li>
                            Bei Verwendung eines Zahlungssystems eines externen Dienstleisters (z.B. Stripe und PayPal) sind dessen Allgemeinen Geschäftsbedingungen einzuhalten.
                        </li>
                    </ul>
                    <h3>Versand</h3>
                    <p>Es handelt sich um ein digitales Angebot. Ein Versand auf dem Postweg erfolgt nicht. Der Zugang zum digitalen Produkt erfolgt nach der Registrierung durch den Nutzer mit den von ihm gewählten Zugangsdaten.</p>

                    <h3>Pflichten des Kunden</h3>
                    <p>Der Kunde ist verpflichtet, die Software bestimmungsgemäß zu nutzen und darf diese nicht missbräuchlich verwenden.</p>
                </div>
            @endif
        </div>
    </div>

@endsection
