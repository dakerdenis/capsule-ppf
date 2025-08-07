<div class="admin__wrapper__controlpanel">
            
            <div class="admin__logo">
                <img src="{{ asset('public/images/logo_main.png') }}" alt="">
            </div>
            <!-----тут добавить время на сервере - минуты и часы ----->
            <div id="server-time-display" class="admin__server-time"
                style="text-align: center; margin-top: 10px; font-weight: bold;">
                Server Time: {{ now()->format('H:i') }}
            </div>
            <div class="admin__hello">
                <p>Welcome to Admin Dashboard</p>
            </div>

            <div class="admin__navigation">
                <div class="admin__navigation-element">
                    <a class="btn {{ request()->routeIs('admin.dashboard') ? 'active_a' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i> Главная
                    </a>
                </div>
                <div class="admin__navigation-element">
                    <a class="btn {{ request()->routeIs('admin.products') ? 'active_a' : '' }}" href="{{ route('admin.products') }}">
                        <i class="fas fa-boxes"></i> Товары
                    </a>
                </div>
                <div class="admin__navigation-element">
                    <a class="btn {{ request()->routeIs('admin.sell_products') ? 'active_a' : '' }}" href="{{ route('admin.sell_products') }}">
                        <i class="fas fa-store"></i> Продажа товаров
                    </a>
                </div>



                <div class="admin__navigation-element">
                    <a class="btn {{ request()->routeIs('admin.services') ? 'active_a' : '' }}" href="{{ route('admin.services') }}">
                        <i class="fas fa-tools"></i> Сервисы
                    </a>
                </div>
                <div class="admin__navigation-element">
                    <a class="btn {{ request()->routeIs('admin.warranties') ? 'active_a' : '' }}" href="{{ route('admin.warranties') }}">
                        <i class="fas fa-certificate"></i> Гарантии
                    </a>
                </div>
                <div class="admin__navigation-element">
                    <a class="btn {{ request()->routeIs('admin.clients') ? 'active_a' : '' }}" href="{{ route('admin.clients') }}">
                        <i class="fas fa-users"></i> Клиенты
                    </a>
                </div>
            </div>



            <div class="admin__logout">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn_logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </button>
                    
                </form>
            </div>
        </div>