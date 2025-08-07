<div class="add__service__wrapper">
    <h2>Редактирование сервиса</h2>

    <div class="add__service__form">
        <form action="{{ route('admin.edit_post_service', ['id' => $service->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Token for security -->

            <!-- Input block for Name -->
            <div class="add__input">
                <div class="add__input-name">Название</div>
                <div class="add__input-input">  
                    <input type="text" name="name" value="{{ $service->name }}" required>
                </div>
            </div>
            <div class="add__input">
                <div class="add__input-name">Номер телефона для SMS</div>
                <div class="add__input-input">
                    <input type="text" name="phone" value="{{ $service->phone }}" required>
                </div>
            </div>
            
            <!---Номер телефона для Гарантии--->
            <div class="add__input">
                <div class="add__input-name">Номер телефона для Гарантии</div>
                <div class="add__input-input">
                    <input type="text" name="warranty_phone" value="{{ $service->warranty_phone }}" required>
                </div>
            </div>



            <div class="add__input">
                <div class="add__input-name">Город</div>
                <div class="add__input-input">
                    <input type="text" name="city" value="{{ $service->city }}" required>
                </div>
            </div>
            <div class="add__input">
                <div class="add__input-name">Страна</div>
                <div class="add__input-input">
                    <input type="text" name="country" value="{{ $service->country }}" required>
                </div>
            </div>
            
            <!-- Input block for Description -->
            <div class="add__input">
                <div class="add__input-name">Имя менеджера</div>
                <div class="add__input-input">
                    <textarea name="description">{{ $service->description }}</textarea>
                </div>
            </div>

            <!-- Input block for Email -->
            <div class="add__input">
                <div class="add__input-name">E-mail</div>
                <div class="add__input-input">
                    <input type="email" name="email" value="{{ $service->email }}" required>
                </div>
            </div>

            <!-- Input block for Password -->
            <div class="add__input">
                <div class="add__input-name">Пароль (оставьте пустым, если не хотите менять)</div>
                <div class="add__input-input">
                    <input type="password" name="password">
                </div>
            </div>

            <!-- Input block for Logo -->
            <div class="add__input">
                <div class="add__input-name">Логотип</div>
                <div class="add__input-input">
                    <input type="file" name="logo" accept="image/*">
                </div>
                @if ($service->logo)
                    <img src="{{ asset('public/'.$service->logo) }}" alt="Current Logo" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>

<!-- Input block for Cooperation -->
<div class="add__input">
    <div class="add__input-name">Сотрудничество</div>
    <div class="add__input-input">
        <input type="checkbox" name="cooperation" id="cooperation" value="1" {{ $service->cooperation ? 'checked' : '' }}>
        <label for="cooperation">Включить сотрудничество</label>
    </div>
</div>


            <button class="btn btn-secondary" type="submit">Сохранить изменения</button>
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
