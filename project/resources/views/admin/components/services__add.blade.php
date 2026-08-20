<div class="add__service__wrapper">
    <h2>Добавление сервиса</h2>

    <div class="add__service__form" enctype="multipart/form-data">
        <form action="{{ route('admin.add_post_service') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Token for security -->
            <!-- Input block for Name -->
            <div class="add__input">
                <div class="add__input-name">Название</div>
                <div class="add__input-input">
                    <input type="text" name="name" required>
                </div>
            </div>

            <!-- Input block for Description -->
            <div class="add__input">
                <div class="add__input-name">Имя менеджера</div>
                <div class="add__input-input">
                    <textarea name="description"></textarea>
                </div>
            </div>

            <!---Phone number---->
            <div class="add__input">
                <div class="add__input-name">Номер телефона для смс</div>
                <div class="add__input-input">
                    <input type="text" name="phone" required>
                </div>
            </div>
            <!---Phone number---->
            <div class="add__input">
                <div class="add__input-name">Номер телефона для Гарантий</div>
                <div class="add__input-input">
                    <input type="text" name="warranty_phone" required>
                </div>
            </div>

            <div class="add__input">
                <div class="add__input-name">Город</div>
                <div class="add__input-input">
                    <input type="text" name="city" required>
                </div>
            </div>
            <div class="add__input">
                <div class="add__input-name">Страна</div>
                <div class="add__input-input">
                    <input type="text" name="country" required>
                </div>
            </div>



            <!-- Input block for Email -->
            <div class="add__input">
                <div class="add__input-name">E-mail</div>
                <div class="add__input-input">
                    <input type="email" name="email" required>
                </div>
            </div>

            <!-- Input block for Password -->
            <div class="add__input">
                <div class="add__input-name">Пароль</div>
                <div class="add__input-input">
                    <input type="password" name="password" required>
                </div>
            </div>

            <!-- Input block for Logo -->
            <div class="add__input">
                <div class="add__input-name">Логотип</div>
                <div class="add__input-input">
                    <input type="file" name="logo" accept="image/*">
                </div>
            </div>

            <button class="btn btn-secondary" type="submit">Добавить сервис</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>
