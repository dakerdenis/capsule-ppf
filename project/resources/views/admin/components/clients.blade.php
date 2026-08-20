<div>
    <div class="services__name__add">
        <h2>Список клиентов</h2>       
    </div>

    <div class="services__wrapper">
        <table class="main__table table table-hover">
            <thead class="thead">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->mobile_number }}</td>
                    <td>{{ $client->email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No clients found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
