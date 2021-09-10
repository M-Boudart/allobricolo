<h1>Vous avez été selctionné pour réaliser une annonce</h1>
<p>
    Voici les informations nécessaire à votre rendez-vous :
</p>
<ul>
    <li>Titre de l'annonce : {{ $announcement->title }}</li>
    <li>Lieu : {{ $announcement->address }} à {{ $announcement->locality->locality }}</li>
    <li>Date et heure : {{ date('d-m-Y', $announcement->realised_at) }} à {{ date('H:i', $announcement->realised_at) }}</li>
    <li>Nom du requérant : {{ strtoupper($announcement->applicant->lastname) }} {{ $announcement->applicant->firstname }}</li>
    <li>Numéro de téléphone : {{ $announcement->phone }}</li>
    <li>Description des travaux : {{ $announcement->description }}</li>
</ul>