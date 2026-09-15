@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            @if(app()->getLocale() === 'en')
                <h1 class="display-5 fw-bold text-white mb-6">Imprint.</h1>
                <div class="text-lightgray">
                    <h3 class="text-lg font-semibold mt-6 mb-1">Information according to § 5 TMG</h3>
                    <p class="mb-4">Lukas Bock <br> Gutenfelsstr. 2<br> 28217 Bremen, Germany <br>
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Represented by:</h3>
                    <p class="mb-4">Lukas Bock<br>
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Contact:</h3>
                    <p class="mb-4">E-Mail: <a href="mailto:{{ env('CONTACT_MAIL', 'onetimetext@lubomedia.de') }}?subject=Contact request">{{ env('CONTACT_MAIL', 'onetimetext@lubomedia.de') }}</a>
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Tax number:</h3>
                    <p class="mb-4">60/207/24593
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">VAT ID:</h3>
                    <p class="mb-4">DE369837499
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Supervisory authority:</h3>
                    <p class="mb-4">Finanzamt Bremen</p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Disclaimer</h3>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Copyright</h3>
                    <p class="mb-4">The content and works on these pages created by the site operator are subject to German copyright law. Duplication, processing, distribution, or any form of commercialization of such material beyond the scope of the copyright law shall require the prior written consent of its respective author or creator. Downloads and copies of this site are only permitted for private, non-commercial use. Insofar as the content on this site was not created by the operator, the copyrights of third parties are respected. In particular, third-party content is identified as such. Should you nevertheless become aware of a copyright infringement, please notify us accordingly. Upon becoming aware of any violations, we will remove such content immediately.</p>
                </div>
            @else
                <h1 class="display-5 fw-bold text-white mb-6">Impressum.</h1>
                <div class="text-lightgray">
                    <h3 class="text-lg font-semibold mt-6 mb-1">Angaben gemäß § 5 TMG</h3>
                    <p class="mb-4">Lukas Bock <br> Gutenfelsstr. 2<br> 28217 Bremen <br>
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Vertreten durch:</h3>
                    <p class="mb-4">Lukas Bock<br>
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Kontakt:</h3>
                    <p class="mb-4">E-Mail: <a href="mailto:{{ env('CONTACT_MAIL', 'onetimetext@lubomedia.de') }}?subject=Kontaktanfrage">{{ env('CONTACT_MAIL', 'onetimetext@lubomedia.de') }}</a>
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Steuernummer:</h3>
                    <p class="mb-4">60/207/24593
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Umsatzsteuer (USt-ID):</h3>
                    <p class="mb-4">DE369837499
                    </p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Aufsichtsbehörde:</h3>
                    <p class="mb-4">Finanzamt Bremen</p>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Haftungsausschluss</h3>
                    <h3 class="text-lg font-semibold mt-6 mb-1">Urheberrecht</h3>
                    <p class="mb-4">Die durch den Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitte ich um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werde ich derartige Inhalte umgehend entfernen.</p>
                </div>
            @endif
        </div>
    </div>


@endsection
