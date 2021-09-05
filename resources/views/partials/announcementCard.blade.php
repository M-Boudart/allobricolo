<div class="col-lg-4 col-md-6">
    <div class="listing__item">
        @if (sizeof($announcement->pictures) > 0)
            <div class="listing__item__pic set-bg"
            data-setbg="{{ asset('storage/img/announcements/'.$announcement->pictures[0]->picture_url) }}">
        @else
            <div class="listing__item__pic set-bg"
            data-setbg="{{ asset('img/announcements/no-picture.png') }}">
        @endif
        <a href="{{ route('user.show', $announcement->applicant->id) }}">
        <img src="{{ asset('storage/users-avatar/'.$announcement->applicant->avatar) }}"
        alt="Photo de profile de 
        {{$announcement->applicant->firstname}}">
        </a>
        </div>
        <div class="listing__item__text">
            <div class="listing__item__text__inside">
                <h5>{{ $announcement->title }}</h5>
                <div class="listing__item__text__rating">
                    <h6>{{ $announcement->price }} €</h6>
                </div>
                <ul>
                    <li>
                        <span class="icon_pin_alt"></span>
                        {{ $announcement->address }},
                        {{ $announcement->locality->postal_code }} 
                        {{ $announcement->locality->locality }}
                    </li>
                    <li>
                        <span class="icon_phone"></span>
                        {{ $announcement->phone }}
                    </li>
                    <li>
                        <span class="material-icons-outlined"></span>
                        {{ $announcement->created_at }}
                    </li>
                </ul>
            </div>
            <div class="listing__item__text__info">
                <div class="listing__item__text__info__left">
                    <span>
                        <a href="{{ route('announcement.show', $announcement->id) }}" class="btn btn-primary">Plus d'infos</a>
                    </span>
                </div>
                @if (Auth::id() != $announcement->applicant->id)
                <div class="listing__item__text__info__right">
                    <form action="{{ route('announcement.apply', $announcement->id) }}" method="POST">
                        @csrf
                        @if (Auth::check())
                            <input type="hidden" name="authId" value="{{ Auth::id() }}">
                        @endif
                            <button class="btn btn-success">Proposer mon aide</button>
                    </form>
                </div>
                @else
                <div class="listing__item__text__info__right">
                    <a href="{{ route('announcement.show', $announcement->id) }}" class="btn btn-info">Candidatures</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>