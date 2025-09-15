<style>
    .open-delete-modal {
        font-size: 15px;
    }
</style>
<div>

    <h2>Гарантии</h2>
    <br>
    <div class="services__wrapper">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="main__table table table-hover">
            <thead class="thead">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Car Model</th>
                    <th scope="col">Installation Date</th>
                    <th scope="col">Warranty End Date</th>
                    <th scope="col">Client Code</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Look</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($warranties as $warranty)
                    <tr>
                        <td>{{ $warranty->id }}</td>
                        <td>{{ $warranty->product_code }}</td>
                        <td>{{ $warranty->car_model }}</td>
                        <td>{{ $warranty->installation_date }}</td>
                        <td>{{ $warranty->warranty_end_date }}</td>
                        <td>{{ $warranty->client_code }}</td>
                        <td>
                            @if ($warranty->service)
                                <a href="{{ route('admin.service', ['id' => $warranty->service->id]) }}">
                                    {{ $warranty->service->name }}
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('service.warranty', ['id' => $warranty->id]) }}" style="color: #fff"
                                target="_blank" class="btn btn-primary">
                                View
                            </a>
                        </td>
                        <td>
                            <!-- Trigger Delete Modal -->
                            <button class="btn btn-danger open-delete-modal" data-toggle="modal"
                                data-target="#deleteModal{{ $warranty->id }}">
                                Delete
                            </button>
                        </td>

                    </tr>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $warranty->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel{{ $warranty->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST"
                                action="{{ route('admin.delete_warranty', ['id' => $warranty->id]) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $warranty->id }}">Delete
                                            Warranty?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this warranty (ID: {{ $warranty->id }})? This
                                        will also delete the
                                        associated product (Code: {{ $warranty->product_code }}).
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
