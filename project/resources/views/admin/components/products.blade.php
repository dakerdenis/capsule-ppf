<div class="products__wrapper">
    <div class="products__name">
        Список всех товаров
    </div>
    <div class="products__sort__add-wrapper">
        <!---SORT BY-->
        <div class="products__sortby-block">

            <!--  SORT BY TYPE ----->
            <div class="products__sortby-form">
                <form method="GET" action="{{ route('admin.products') }}">
                    <select id="filter_by_type" name="type" onchange="this.form.submit()">
                        <option value="">По типу</option>
                        <option value="1" {{ request('type') == 1 ? 'selected' : '' }}>Urban</option>
                        <option value="2" {{ request('type') == 2 ? 'selected' : '' }}>Optima</option>
                        <option value="3" {{ request('type') == 3 ? 'selected' : '' }}>Element</option>
                        <option value="4" {{ request('type') == 4 ? 'selected' : '' }}>Huracan</option>
                        <option value="5" {{ request('type') == 5 ? 'selected' : '' }}>Matte</option>
                        <option value="6" {{ request('type') == 6 ? 'selected' : '' }}>Black</option>
                    </select>
                </form>
            </div>
            <!--  SORT BY COUNTRY ----->
            <div class="products__sortby-form">
                <form method="GET" action="{{ route('admin.products') }}">
                    <select id="filter_by_country" name="country" onchange="this.form.submit()">
                        <option value="">По стране</option>
                        <option value="AZ" {{ request('country') == 'AZ' ? 'selected' : '' }}>AZ</option>
                        <option value="EU" {{ request('country') == 'EU' ? 'selected' : '' }}>EU</option>
                        <option value="US" {{ request('country') == 'US' ? 'selected' : '' }}>US</option>
                    </select>
                </form>
            </div>
            <!--  SORT BY DATE ----->
            <div class="products__sortby-form">
                <form method="GET" action="{{ route('admin.products') }}">
                    <input type="hidden" name="type" value="{{ request('type') }}">
                    <select id="sort_by_date" name="sort_by_date" onchange="this.form.submit()">
                        <option value="">По дате</option>
                        <option value="asc" {{ request('sort_by_date') === 'asc' ? 'selected' : '' }}>По возрастанию
                        </option>
                        <option value="desc" {{ request('sort_by_date') === 'desc' ? 'selected' : '' }}>По убыванию
                        </option>
                    </select>
                </form>
            </div>
            <!--  SORT BY WARRANTY ----->
            <div class="products__sortby-form">
                <form method="GET" action="{{ route('admin.products') }}">
                    <input type="hidden" name="section" value="products">
                    <input type="hidden" name="type" value="{{ request('type') }}">
                    <select id="has_warranty" name="has_warranty" onchange="removeEmptyAndSubmit(this.form)">
                        <option value="">По гарантии</option>
                        <option value="1" {{ request('has_warranty') === '1' ? 'selected' : '' }}>С гарантией
                        </option>
                        <option value="0" {{ request('has_warranty') === '0' ? 'selected' : '' }}>Без гарантии
                        </option>
                    </select>
                </form>
            </div>

            <!--  DEFAULT SORT ----->
            <a class="filtr_default btn" href="{{ route('admin.products') }}">Сбросить фильтры</a>

        </div>

        <!-----CRUD--->
        <div class="products__sortby-edit">
            <a href="{{ route('admin.add_product') }}" class="btn filtr_default">
                <i class="fas fa-plus"></i> Добавить продукт
            </a>
        </div>
    </div>

    <div class="products__searchbar" style="margin-bottom: 20px;">
        <form method="GET" action="{{ route('admin.products') }}" class="form-inline">
            <input type="text" name="search" value="{{ request('search') }}"
                class="form-control mr-2 products__searchbar-input" placeholder="Поиск по коду продукта...">
                <button type="submit" class="btn btn-primary search_button">
                    <i class="fas fa-search"></i> Найти
                </button>
        </form>
    </div>

    <table class="main__table table table-hover">
        <thead class="thead">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">6 Digits Code</th>
                <th scope="col">DD.MM.YYYY</th>
                <th scope="col">Warranty Number</th>

                <th scope="col">Expired At</th>

                <th scope="col">Verification</th>
                <th scope="col">Type</th>
                <th scope="col">Country</th>
                <th scope="col">Service</th>
                <th scope="col">Status</th>
                <th scope="col">Sell</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $typeNames = [
                    1 => 'Urban',
                    2 => 'Optima',
                    3 => 'Element',
                    4 => 'Huracan',
                    5 => 'Matte',
                    6 => 'Black',
                ];
            @endphp
            @foreach ($products as $product)
                <tr class="{{ $product->warranty ? 'has-warranty' : 'status-' . $product->status }}">
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->verification_date ? $product->verification_date->format('d.m.Y') : 'N/A' }}</td>
                    <td>
                        @if ($product->warranty)
                            <a style="color: #fff;"
                                href="{{ route('service.warranty', ['id' => $product->warranty]) }}" target="_blank"
                                class="btn btn-success btn-sm">
                                See Warranty
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <!--- EXPIRES AT---->
                    <td>
                        @if ($product->activation_expires_at)
                            <span class="countdown-timer"
                                  data-expiration="{{ \Carbon\Carbon::parse($product->activation_expires_at)->timestamp }}">
                                  <i class="fas fa-clock"></i> <span class="time"></span>
                            </span>
                        @else
                            N/A
                        @endif
                    </td>
                    

                    <td>{{ $product->verification_counter ?? 'N/A' }}</td>
                    <td>{{ $typeNames[$product->type] ?? 'Unknown' }}</td>
                    <td>{{ $product->country ?? 'N/A' }}</td>
                    <!----SERVICE--->
                    <td>
                        @if ($product->service_id)
                            <a href="{{ route('admin.service', ['id' => $product->service_id]) }}" class="btn btn-light" target="_blank">
                                Service #{{ $product->service_id }}
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <!-- STATUS  ------>
                    <td>
                        @if ($product->warranty)
                            @switch($product->status)
                                @case(0)
                                    <span class="badge badge-info">New</span>
                                @break

                                @case(1)
                                    <span class="badge badge-success">Active</span>
                                @break

                                @case(2)
                                    <span class="badge badge-secondary">Expired</span>
                                @break

                                @default
                                    <span class="badge badge-dark">Unknown</span>
                            @endswitch
                        @else
                            <form method="POST"
                                action="{{ route('admin.update_product_status', ['id' => $product->id]) }}">
                                @csrf
                                <select name="status" onchange="this.form.submit()"
                                    class="form-control form-control-sm">
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>New</option>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Expired
                                    </option>
                                </select>
                            </form>
                        @endif
                    </td>
                    <!--//!!!-- SELL----->
                    <td>
                        @if ($product->warranty)
                            <button class="btn btn-secondary btn-sm" disabled
                                title="Cannot sell product with warranty">
                                Sell
                            </button>
                        @elseif ($product->status == 2)
                            <button class="btn btn-secondary " disabled title="Expired product cannot be sold">
                                Expired
                            </button>
                        @elseif ($product->status == 1)
                            <button class="btn btn-secondary " disabled title="Active product cannot be sold">
                                Active
                            </button>
                        @else
                        <a style="color: #fff"
                        href="{{ route('admin.sell_products', ['code' => $product->code]) }}"
                        class="btn btn-primary btn-sm">
                         <i class="fas fa-store"></i> Продать
                     </a>
                        @endif
                    </td>

                    <!--//!!!-- DELETE----->
                    <td>
                        @if ($product->warranty)
                            <button class="btn btn-secondary btn-sm" disabled title="Product has warranty">
                                Not Allowed
                            </button>
                        @else
                            <!-- Trigger Delete Modal -->
                            <button class="btn btn-danger btn-sm open-delete-modal" data-toggle="modal"
                            data-target="#deleteModal{{ $product->id }}">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="deleteModalLabel{{ $product->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="POST"
                                        action="{{ route('admin.delete_product', ['id' => $product->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">
                                                    Confirm Product Deletion
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete product
                                                <strong>#{{ $product->id }}</strong>
                                                (Code: <strong>{{ $product->code }}</strong>)
                                                ?
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
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination__wrapper">
        {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>
<script>
    function removeEmptyAndSubmit(form) {
        const formData = new FormData(form);
        for (let [key, value] of formData.entries()) {
            if (value === '') {
                form.querySelector(`[name="${key}"]`).remove();
            }
        }
        form.submit();
    }
</script>
<script>
    function updateCountdownTimers() {
        const timers = document.querySelectorAll('.countdown-timer');

        timers.forEach(timer => {
            const expiration = parseInt(timer.dataset.expiration) * 1000;
            const now = new Date().getTime();
            const diff = expiration - now;

            const timeSpan = timer.querySelector('.time');

            if (diff <= 0) {
                timeSpan.innerText = 'Expired';
                timeSpan.classList.add('text-danger');
            } else {
                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);
                timeSpan.innerText = `${hours}h ${minutes}m ${seconds}s`;
            }
        });
    }

    updateCountdownTimers();
    setInterval(updateCountdownTimers, 1000);
</script>

