<div id="data_table">
    <table class="datatables-order table border-top dataTable no-footer dtr-column"
        aria-describedby="DataTables_Table_0_info" style="width: 1211px;">
        <thead>
            <tr>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 49px;" aria-label="order: activate to sort column ascending">STT</th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 123px;" aria-label="date: activate to sort column descending" aria-sort="ascending">
                    order
                </th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 251px;" aria-label="customers: activate to sort column ascending">customers</th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 99px;" aria-label="payment: activate to sort column ascending">quantity</th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 129px;" aria-label="status: activate to sort column ascending">status</th>
                <th class="" rowspan="1" colspan="1" style="width: 64px;" aria-label="Actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $pur)
                <?php $sum_quantity = 0; ?>
                @foreach ($pur->products as $prod)
                    <?php $sum_quantity += $prod->pivot->quantity; ?>
                @endforeach

                <tr class="odd">
                    <td><span class="fw-medium"></span></td>
                    <td class="sorting_1"><span class="text-nowrap">{{ $pur->id }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center order-name text-nowrap">
                            <div class="d-flex flex-column">
                                <h6 class="m-0">
                                    <a href="pages-profile-user.html" class="text-body">
                                        {{ $pur->user->name }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ $pur->user->email }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ $sum_quantity }}
                    </td>
                    <td>
                        <h6 class="mb-0 w-px-100 {{ $pur->status === 'pending' ? 'text-warning' : 'text-success' }}">
                            <i class="fas fa-circle"></i> {{ $pur->status }}
                        </h6>
                    </td>
                    <td>
                        <div class="d-flex justify-content-sm-center align-items-sm-center">
                            <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                <a href="{{ route('detail_purchase', ['id' => $pur->id]) }}"
                                    class="dropdown-item">View</a>
                                <button type="button" data-toggle="modal" data-target="#deletePurchase"
                                    data-delete-id="{{ $pur->id }}" class="dropdown-item delete-record">Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row mx-2">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Displaying
                {{ $results->total() }} results
            </div>
        </div>
    </div>
</div>
