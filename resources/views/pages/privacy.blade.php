@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'WG Website',
    'heroSubtitle' => 'Zusammen Leben',
    'heroImage' => '/images/img_sofa.jpg',
    'heroImageTitle' => 'WG-Website'
])

    <section class="container-lg mt-5 section">
        <h1>Datenschutzerklärung</h1>
        <p>WG-Website (nachfolgend als „wir“ oder „WG-Website“ bezeichnet) ist der respektvolle Umgang mit
            personenbezogenen Daten sehr wichtig. Wir achten auf eine dem Zweck angemessene Bearbeitung der Daten, die
            sich auf das für den Zweck der Verarbeitung notwendige Mass beschränkt. Wir versichern, sämtliche
            anwendbaren datenschutzrechtlichen Vorschriften einzuhalten. Dies gilt insbesondere für das Schweizer
            Datenschutzgesetz und die EU-Datenschutzgrundverordnung.

            Diese Datenschutzerklärung findet Anwendung auf die Nutzung aller Dienstleistungen und Produkte der
            WG-Website. Dies beinhaltet insbesondere die Datenerhebung innerhalb unseres gesamten Online-Tools und der
            damit verbundenen Webseiten, Funktionen und Inhalte sowie der anschliessenden Verwendung der
            personenbezogenen Daten unabhängig davon, ob Sie die entsprechenden Dienstleistungen und Produkte über eine
            Webseite von uns (www.wg-website.com), über mobile Anwendungen (sog. Apps),
            telefonisch oder auf andere Weise in Anspruch nehmen.</p>
    </section>

@endsection
