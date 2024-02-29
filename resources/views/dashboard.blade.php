{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <header class="hero"
        style="background-image: linear-gradient(180deg, #0000008c 0%, #0000008c 100%),
    url('./image/fondounl.jpg'); clip-path: polygon(0 0, 100% 0, 100% 80%, 50% 95%, 0 80%)">
        <nav class="nav container">

            <ul class="nav__link nav__link--menu">
                <img src="image/close.svg" class="nav__close">
            </ul>

            <div class="nav__menu">
                <img src="image/menu.svg" class="nav__img">
            </div>
        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">UNIVERSIDAD NACIONAL DE LOJA</h1>
            <h1 class="hero__title">PLAN DE EMERGENCIA INSTITUCIONAL</h1>
            <p class="hero__paragraph">Se incluye un Plan de Evacuación, que indica cómo hacer el abandono de la
                edificación en un tiempo
                prudencial y efectivo, donde todo el personal tiene que desplazarse a la parte externa del local
                ubicándose en las zonas seguras previamente establecidas.</p>
        </section>
    </header>

    <main>
        <section class="container about">
            <h2 class="subtitle">ÁREAS PARA LA DISTRIBUCIÓN DE LOS LÍDERES DE EVACUACIÓN</h2>

            <div class="about__main">
                <article class="about__icons">
                    <img src="image/shapes.svg" class="about__icon">
                    <h3 class="about__title">Área 1</h3>
                    <p class="about__paragrah">Administración Central, Investigaciones y Bienestar
                        Universitario</p>
                </article>

                <article class="about__icons">
                    <img src="image/paint.svg" class="about__icon">
                    <h3 class="about__title">Área 2</h3>
                    <p class="about__paragrah">Facultad Jurídica Social y Administrativa</p>
                </article>

                <article class="about__icons">
                    <img src="image/feducation.svg" class="about__icon">
                    <h3 class="about__title">Área 3</h3>
                    <p class="about__paragrah">Facultad de la Educación El Arte y la comunicación</p>
                </article>
                <article class="about__icons">
                    <img src="image/fagropecuaria.svg" class="about__icon">
                    <h3 class="about__title">Área 4</h3>
                    <p class="about__paragrah">Facultad Agropecuaria y los Recursos Renovables</p>
                </article>
                <article class="about__icons">
                    <img src="image/code.svg" class="about__icon">
                    <h3 class="about__title">Área 5</h3>
                    <p class="about__paragrah">Facultad de Energía, y los Recursos No Renovables</p>
                </article>
                <article class="about__icons">
                    <img src="image/fmedicina.svg" class="about__icon">
                    <h3 class="about__title">Área 6</h3>
                    <p class="about__paragrah">Facultad de la Salud Humana</p>
                </article>
                <article class="about__icons">

                </article>
                <article class="about__icons">
                    <img src="image/close.svg" class="about__icon">
                    <h3 class="about__title">Área 7</h3>
                    <p class="about__paragrah">La Modalidad de Estudios a Distancia</p>
                </article>
            </div>
        </section>
        <section class="testimony">
            <div class="testimony__container container">
                <img src="image/leftarrow.svg" class="testimony__arrow" id="before">

                <section class="testimony__body testimony__body--show" data-id="1">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Decano: Dr. Yovany Salazar Estrada</h2>
                        <h3><span class="testimony__course">Administración
                                Central,
                                Investigaciones
                                y Bienestar
                                Universitario.</span></h3>
                        <p class="testimony__review"><strong>Brigadista Responsable:</strong> Dr. Felix Ordóñez</p>
                        <p class="testimony__review"><strong>Brigadista Suplente:</strong> Ing. Alexandra
                            Jaramillo
                            Directora de
                            Talento Humano</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/bu.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="2">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Decana: Dra. Elvia Zhapa</h2>
                        <h3><span class="testimony__course">Facultad
                                Jurídica Social y
                                Administrativa</span></h3>
                        <p class="testimony__review"><strong>Brigadista Responsable:</strong> Dr. Miguel Lozano
                            (Especialista
                            Administrativo
                            Financiero) </p>
                        <p class="testimony__review"><strong>Brigadista Suplente:</strong> Dra. Ena Peláez
                            (Secretario de la
                            Facultad) </p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/fjs.png" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="3">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Decano: Dr. Yovany Salazar </h2>
                        <h3><span class="testimony__course">Facultad de la
                                Educación el
                                Arte y la
                                comunicación</span></h3>
                        <p class="testimony__review"><strong>Brigadista Responsable:</strong> Ing. Germanía
                            González
                            (Especialista
                            Administrativo
                            Financiero) </p>
                        <p class="testimony__review"><strong>Brigadista Suplente:</strong> Dr. Leonardo
                            Valdivieso
                            (Secretario de la
                            Facultad) </p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/FEAC.png" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="4">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Decano: Dr. Roosevelt Armijos</h2>
                        <h3><span class="testimony__course">Facultad
                                Agropecuaria y
                                los Recursos
                                Renovables</span></h3>
                        <p class="testimony__review"><strong>Brigadista Responsable:</strong> Dr. Augusto Ríos
                            (Especialista
                            Administrativo
                            Financiero) </p>
                        <p class="testimony__review"><strong>Brigadista Suplente:</strong> Dra. Patricia
                            Solorzano
                            (Secretario de la
                            Facultad) </p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/farnr.png" class="testimony__img">
                    </figure>
                </section>
                <section class="testimony__body" data-id="5">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Kevin Ramirez</h2>
                        <h3><span class="testimony__course">Facultad de
                                Energía, y los
                                Recursos No
                                Renovables</span></h3>
                        <p class="testimony__review">-------------</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/feirnnr.png" class="testimony__img">
                    </figure>
                </section>
                <section class="testimony__body" data-id="6">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Kevin Ramirez</h2>
                        <h3><span class="testimony__course">Unidad de
                                Estudios a
                                Distancia</span></h3>
                        <p class="testimony__review">-------------</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/ued.png" class="testimony__img">
                    </figure>
                </section>
                <section class="testimony__body" data-id="7">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Kevin Ramirez</h2>
                        <h3><span class="testimony__course">Facultad de la
                                Salud Humana</span></h3>
                        <p class="testimony__review">-------------</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="image/fsh.png" class="testimony__img">
                    </figure>
                </section>

                <img src="image/rightarrow.svg" class="testimony__arrow" id="next">
            </div>
        </section>
    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h5 class="footer__title">Para más información, descargue el plan de emergencia</h5>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="{{ route('descargar_plan') }}" class="nav__links">Descargar Plan de
                            Emergencia</a>
                    </li>
                </ul>
            </nav>
        </section>

        <section class="footer__copy container">
            <div class="footer__social">
                <a href="https://www.facebook.com/UNLoficial" class="footer__icons"><img src="image/facebook.svg"
                        class="footer__img"></a>
                <a href="https://twitter.com/UNLoficial" class="footer__icons"><img src="image/twitter.svg"
                        class="footer__img"></a>
                <a href="https://www.youtube.com/channel/UCXMwpCdZV7QHdKBuFk3QeUw" class="footer__icons"><img
                        src="image/youtube.svg" class="footer__img"></a>
                <a href="https://www.instagram.com/unloficial/" class="footer__icons"><img src="image/ig.svg"
                        class="footer__img"></a>
            </div>
        </section>
    </footer>
@stop

@section('css')
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/personal.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/slider.js') }}" defer></script>
    <script src="{{ asset('js/questions.js') }}" defer></script>
    <script src="{{ asset('js/menu.js') }}" defer></script>
@stop
