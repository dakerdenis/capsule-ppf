<style>
    .service__table-img {
        width: 50px;
        height: 50px;
    }

    .service__table-img img {

        width: 100%;
        object-fit: cover;
    }

    .add_service_a {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 200px;
        background-color: #4340DA;
        color: #fff;
    }
</style>
<div>
    <div class="services__name__add">
        <h2>Авто сервисы</h2>
        <a class="btn add_service_a" href="{{ route('admin.add_service') }}">Добавление сервиса</a>
    </div>

    <div class="services__wrapper">
        <table class="main__table table table-hover">
            <thead class="thead">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col"> </th>
                    <th scope="col">Сотрудничество</th>
                    <th scope="col">Город</th>
                    <th scope="col">Страна</th>
                    <th scope="col">Кол-во продуктов</th>
                    <th scope="col">Счётчик</th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr class="{{ $service->cooperation == 1 ? 'cooperation' : '' }}">
                        <th scope="row">{{ $service->id }}</th>
                        <td>
                            <a href="{{ route('admin.service', ['id' => $service->id]) }}">{{ $service->name }}</a>
                        </td>
                        <td>
                            <div class="service__table-img">
                                <img src="{{ $service->logo ? asset('public/' . $service->logo) : asset('images/default-logo.png') }}"
                                    alt="Service Logo">
                            </div>

                        </td>
                        <td>{{ $service->cooperation == 1 ? 'Да' : 'Нет' }}</td>
                        <td>{{ $service->city }}</td>
                        <td>{{ $service->country }}</td>
                        <td>{{ $service->warranties_count }}</td>

                        <td>
                            <div class="d-flex align-items-center">
                                <span class="mr-2">{{ $service->warranty_count }}</span>
                                <form method="POST" action="{{ route('admin.reset_service_counter', $service->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm {{ $service->warranty_count >= 10 ? 'btn-danger' : 'btn-secondary' }}"
                                        {{ $service->warranty_count >= 10 ? '' : 'disabled' }}
                                        title="{{ $service->warranty_count >= 10 ? 'Сбросить счётчик' : 'Доступно при 10' }}">
                                        <i class="fas fa-gift"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        

                        <td>
                            <a href="{{ route('admin.edit_service', ['id' => $service->id]) }}">
                                <img src="{{ asset('public/images/edit.svg') }}" alt="Edit" class="delete_image">
                            </a>

                        </td>
                        <td>
                            <button class="delete_image-button" data-service-id="{{ $service->id }}"
                                data-service-name="{{ $service->name }}">
                                <img src="{{ asset('public/images/trash.svg') }}" alt="" class="delete_image">
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Popup -->
    <div id="delete-popup" class="popup hidden">
        <div class="popup-content">
            <h3>Вы уверены, что хотите удалить сервис?</h3>
            <p id="service-name"></p>
            <div class="popup-actions">
                <form id="delete-service-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да</button>
                </form>
                <button id="cancel-delete" class="btn btn-secondary">Нет</button>
            </div>
            <button id="close-popup" class="popup-close">X</button>
        </div>
    </div>
</div>

<!-- Include CSS -->
<style>
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
        display: none;
        /* Start hidden by default */
    }

    .popup.active {
        display: flex;
        /* Show popup when the active class is applied */
    }

    .popup-content {
        background: white;
        padding: 50px;
        border-radius: 8px;
        text-align: center;
        position: relative;
    }

    .popup-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 18px;
        width: 24px;
        height: 28px;
        color: #fff;
        border-radius: 16px;
        background-color: red;
        cursor: pointer;
    }
</style>

<!-- Include JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('delete-popup');

        const deleteForm = document.getElementById('delete-service-form');
        const cancelDelete = document.getElementById('cancel-delete');
        const closePopup = document.getElementById('close-popup');

        document.querySelectorAll('.delete_image-button').forEach(button => {
            button.addEventListener('click', () => {
                const serviceId = button.getAttribute('data-service-id');
                const serviceNameText = button.getAttribute('data-service-name');

                // Set the service name in the popup


                // Set the action URL for the form dynamically
                deleteForm.action = `{{ route('admin.delete_service', ['id' => ':id']) }}`
                    .replace(':id', serviceId);

                // Show the popup
                popup.classList.add('active');
            });
        });

        // Cancel deletion
        cancelDelete.addEventListener('click', () => {
            popup.classList.remove('active');
        });

        // Close popup on clicking the "X"
        closePopup.addEventListener('click', () => {
            popup.classList.remove('active');
        });

        // Optional: Close popup when clicking outside the content area
        popup.addEventListener('click', (event) => {
            if (event.target === popup) {
                popup.classList.remove('active');
            }
        });
    });
</script>
