@extends('templates.main')

@section('content')
    <div class="px-4 py-5">
        <div class="py-5">
            <section id="about">
                <div class=" mt-5">
                    <header class="text-center mb-5">
                    </header>
                    <section class="mt-5">
                    <div class="row pt-5 mb-5 mt-5">
                        <div class="col-sm-8 col-md-6 justify-content-center align-self-center">
                            <h1>Oh nein!</h1>
                            <p>
                                Beim Abschluss deines Abonnements ist etwas fehlgeschlagen.
                                Bitte versuche es erneut: <a href="{{url('order')}}">Klicke hier</a>
                            </p>
                        </div>
                        <div class="text-center justify-content-center align-self-center col-8 col-sm-4 col-md-6 mx-auto mx-sm-0 mt-5 mt-sm-0">
                            <img src="{{asset('images/error.png')}}" alt="image" class="img-fluid index-image" id="what-is-image">
                        </div>
                    </div>
                    </section>

                </div>
            </section>
        </div>
    </div>


@endsection
