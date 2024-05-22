<div id="products_table">
    <table class="datatables-products table border-top dataTable no-footer dtr-column collapsed"
        aria-describedby="DataTables_Table_0_info" style="width: 1211px;">
        <thead>
            <tr>
                <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 3px;" aria-label="">stt
                </th>
                <th class="sorting" style="width: 30px; ">id</th>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                    colspan="1" style="width: 370px;" aria-label="product: activate to sort column descending"
                    aria-sort="ascending">product</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 130px;" aria-label="category: activate to sort column ascending">category</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 80px;" aria-label="stock">total
                </th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 80px;" aria-label="price: activate to sort column ascending">price</th>
                <th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 80px;"
                    aria-label="Actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($results) && $results->count() > 0)
                @foreach ($results as $item)
                    <tr class="odd parent">
                        <td class="control" tabindex="0" style=""></td>
                        <td>{{ $item->id }}</td>
                        <td class="sorting_1">
                            <div class="d-flex justify-content-start align-items-center product-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar me-2 rounded-2">
                                        <a data-lightbox="display-image"
                                            href="{{ asset('storage/uploads/' . $item->image) }}"
                                            data-fancybox="gallery">
                                            <img src="{{ asset('storage/uploads/' . $item->image) }}"
                                                alt="Product Image" class="avatar-md img-thumbnail rounded-circle" />
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="text-body text-nowrap mb-0">
                                        {{ $item->name }}</h6>
                                    <small
                                        class="text-muted text-truncate d-none d-sm-block">{{ $item->describe }}</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-truncate d-flex align-items-center"><span
                                    class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2"><i
                                        class="bx bx-laptop"></i></span>{{ $item->category->name }}</span>
                        </td>
                        <td><span>{{ $item->total }}</span></td>
                        <td><span>{{ $item->price }}₫</span></td>
                        <td class="dtr-hidden">
                            <div class="d-inline-block text-nowrap">
                                <a class="btn btn-sm btn-icon" href="{{ route('edit_product', ['id' => $item->id]) }}">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded me-2"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="{{ route('view_detail', ['id' => $item->id]) }}"
                                        class="dropdown-item">View</a>
                                    <button type="button" class="dropdown-item" title="delete"
                                        data-delete-url="{{ route('delete_product', ['id' => $item->id]) }}"
                                        data-toggle="modal" data-target="#deleteModal">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @elseif (isset($results) && $results->count() == 0)
                <p class="pp">Not product found.</p>
            @endif
        </tbody>
    </table>
    <div class="row mx-2" id="count_results">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_info" id="data_table" role="status" aria-live="polite">Displaying
                {{ $results->count() }} results</div>
        </div>
    </div>
</div>
