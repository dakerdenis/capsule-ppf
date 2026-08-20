<style>
    .single__service__wrapper {
        width: 100%;
    }

    .single__service-name {}

    .single__service-img {
        margin-top: 30px;
        margin-bottom: 30px;
        width: 200px;
        height: 200px;

    }

    .single__service-img img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .single__service-desc {}

    .single__service-cooperation {}

    .single__service-products {}

    .popup-actions {
        display: flex;
        margin: 0 auto;
        width: 100%;
        justify-content: center;
    }

    .popup-actions button {
        margin: 0px 10px;
    }
</style>


<div class="single__service__wrapper">
    <div class="single__service-name">
        <h1>{{ $service->name }}</h1>
    </div>
    <div class="single__service-img">
        <img src="{{ $service->logo ? asset('public/' . $service->logo) : asset('images/default-logo.png') }}"
            alt="Service Logo">
    </div>
    <div class="single__service-desc">
        <p>Имя менеджера: {{ $service->description ?? 'Описание отсутствует' }}</p>
    </div>
    <div class="single__service-email">
        <p>E-mail сервиса: {{ $service->email ?? 'E-mail отсутствует' }}</p>
    </div>
    <div class="single__service-cooperation">
        <p>Сотрудничество: {{ $service->cooperation == 1 ? 'Да' : 'Нет' }}</p>
    </div>
    <div class="single__service-desc">
        <p>номер телефона для SMS: {{ $service->phone ?? 'Описание отсутствует' }}</p>
    </div>
    <div class="single__service-desc">
        <p>номер телефона для гарантии: {{ $service->warranty_phone ?? 'Описание отсутствует' }}</p>
    </div>
</div>

<div class="single__service-warranties mt-4">
    <h3>Список всех гарантий:</h3>

    @if ($service->warranties->count())
        <ul class="list-group mt-2">
            @foreach ($service->warranties as $warranty)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.warranty', ['id' => $warranty->id]) }}">
                        #{{ $warranty->id }} — {{ $warranty->client_name }} — {{ $warranty->car_make }}
                        {{ $warranty->car_model }}
                    </a>
                    <span
                        class="badge  single_warranty_service ">{{ \Carbon\Carbon::parse($warranty->installation_date)->format('d.m.Y') }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Гарантии отсутствуют.</p>
    @endif
</div>


<style>

    .single__service-warranties{
        max-width: 600px;
    }
    .single_warranty_service{
        padding: 5px;
        font-size: 14px;
        background-color: #e3e3e3c0;
    }

    .single__service-warranties ul {
        max-height: 400px;
        overflow-y: auto;
        padding: 0;
    }

    .single__service-warranties a {
        text-decoration: none;
        font-weight: 500;
        color: #343a40;
    }

    .single__service-warranties a:hover {
        color: #007bff;
    }
</style>
