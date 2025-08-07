<div class="home__wrapper">
    <div class="home__container__block">
        <div class="home__container__block-element">
            <div class="home__container__block-name">
                <span>
                    {{ $totalProducts }}
                </span>
                <p>
                    Товары
                </p>
            </div>
            <div class="home__container__block-desc">
                <div class="home__container__block-desc1">
                    <span>{{ $productsWithWarranty }}</span>
                    <p>с гарантией</p>
                </div>
            </div>
        </div>
        <div class="home__container__block-element home__container__block-element1">
            <div class="home__container__block-name">
                <span>
                    {{ $totalServices }}
                </span>
                <p>
                    Сервисы
                </p>
            </div>
        </div>
        <div class="home__container__block-element">
            <div class="home__container__block-name">
                <span>
                    {{ $totalWarranties }}
                </span>
                <p>
                    Гарантии
                </p>
            </div>
        </div>
    </div>

    <!----information about website----->
    <br><br>
    <div class="admin__stats">
        <h2> Информация о сессии и авторизации</h2>
        <ul>
            <li><strong>Session ID:</strong> {{ $sessionId }}</li>
            <li><strong>Последняя активность:</strong> {{ $lastActivity }}</li>
            <li><strong>IP Адрес:</strong> {{ $ipAddress }}</li>
            <li><strong>Общее число сессий:</strong> {{ $sessionCount }}</li>

        </ul>

        <!-- Button to close all sessions -->
        <form action="{{ route('admin.logout_all_sessions') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger"> Close All Sessions</button>
        </form>
    </div>
</div>
