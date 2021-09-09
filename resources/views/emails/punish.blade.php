@if ($infos['type'] === 'suspended')
    <h1>Vous avez été suspendu</h1>
    <p>Suite à un signalement d'un de nos membres, vous avez été suspendu du {{ $infos['from_date'] }} au {{ $infos['to_date'] }}. Vous n'aurez donc plus accès à votre compte d'ici là.</p>
    <p>Sachez qui si vous vous faite suspendre trop de fois vous risquerez de vous faire ban définitivement de notre site</p>
    <p>Si vous souhaitez tout de même vous défendre et essayer de récupérer votre compte avant le {{ $infos['to_date'] }}, veuillez nous contactez à l'addrese suivante : allobricolo@moderation.com.</p> 
@endif
@if ($infos['type'] === 'banned')
    <h1>Vous avez été banni</h1>
    <p>Suite à un signalement d'un de nos membres et suite à plusieurs  et plusieurs supsensions au préalable vous avez été banni jusqu'à nouvel ordre de notre site.</p>
    <p>Si vous souhaitez tout de même vous défendre et essayer de récupérer votre compte, veuillez nous contactez à l'addrese l'addrese suivante : allobricolo@moderation.com.</p> 
@endif

