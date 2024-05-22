@extends('purchases.detail_layout')

@section('title', 'View Detail Purchase')

@section('style')
    <script src="{{ asset('js/detail_layout/detail_layout.js') }}"></script>
    <script src="{{ asset('js/detail_layout/add_product_purchase.js') }}"></script>
    <script src="{{ asset('js/detail_layout/delete_product_purchase.js') }}"></script>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                @if ($purchase)
                    <h5 class="mb-1 mt-3">Order {{ $purchase->id }}
                        <span
                            class="badge {{ $purchase->status === 'pending' ? 'bg-label-warning' : 'bg-label-success' }} me-2 ms-2">{{ $purchase->status }}</span>
                        <span class="badge bg-label-info">Ready to Pickup</span>
                    </h5>
                @endif
            </div>
            <div class="d-flex align-content-center flex-wrap gap-2">
                <a href="{{ route('purchase_manage') }}" class="btn btn-danger">Back</a>
            </div>
        </div>

        <!-- Order Details Table -->

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Order details</h5>
                        <h6 class="m-0">
                            <button type="button" class="btn btn-link add-product-btn"
                                data-product="{{ json_encode($prod) }}" data-bs-toggle="modal"
                                data-bs-target="#addProductModal">Add
                            </button>
                        </h6>
                    </div>
                    <form action="{{ route('payment', ['id' => $purchase->id]) }}" method="POST">
                        @csrf
                        <div class="card-datatable table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <table class="datatables-order-details table dataTable no-footer dtr-column"
                                    id="DataTables_Table_0" style="width: 799px;">
                                    <thead>
                                        <tr>
                                            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                                style="width: 0px; display: none;" aria-label="">
                                            </th>
                                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all"
                                                rowspan="1" colspan="1" style="width: 18px;" data-col="1"
                                                aria-label="">
                                                <input type="checkbox" class="form-check-input" id="select-all-checkbox">
                                            </th>
                                            <th class="w-50 sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 295px;" aria-label="products">products</th>
                                            <th class="w-25 sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 123px;" aria-label="price">price</th>
                                            <th class="w-25 sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 114px;" aria-label="qty">qty</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 53px;"
                                                aria-label="total">total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="odd">
                                                <td class="control" tabindex="0" style="display: none;"></td>
                                                <td class="dt-checkboxes-cell">
                                                    <input type="checkbox" class="dt-checkboxes form-check-input"
                                                        name="selected_products[]" value="{{ $product->id }}">
                                                </td>
                                                <td class="sorting_1">
                                                    <div
                                                        class="d-flex justify-content-start align-items-center text-nowrap">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                                <img src="{{ asset('storage/uploads/' . $product->image) }}"
                                                                    alt="Product Image" class="rounded-2">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="text-body mb-0">{{ $product->name }}</h6>
                                                            <small
                                                                class="text-muted">{{ $product->category->name }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span>{{ $product->price }}₫</span></td>
                                                <td>
                                                    <span class="text-body">{{ $product->pivot->quantity }}</span>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">{{ $product->pivot->total_amount }}₫</h6>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="width: 1%;"></div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center m-3 mb-2 p-1">
                                <div class="order-first" style="height: 109px">
                                    <button type="button" class="btn btn-danger" id="delete_product_purchase"
                                        data-purchase="{{ $purchase->id }}">Delete
                                    </button>
                                </div>
                                <div class="order-calculations">
                                    @if ($sum_total)
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Subtotal:</span>
                                            <span class="text-heading">{{ $sum_total }}₫</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Discount:</span>
                                            <span class="text-heading mb-0">22₫</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Tax:</span>
                                            <span class="text-heading">30₫</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="w-px-100 mb-0">Total:</h6>
                                            <h6 class="mb-0">{{ $sum_total + 22 + 30 }}₫</h6>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Subtotal:</span>
                                            <span class="text-heading">0</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Discount:</span>
                                            <span class="text-heading mb-0">0</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Tax:</span>
                                            <span class="text-heading">0</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="w-px-100 mb-0">Total:</h6>
                                            <h6 class="mb-0">0</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center m-3 mb-2 p-1">
                                <div></div>
                                <div class="order-calculations">
                                    <button class="btn btn-info">Payment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Shipping activity</h5>
                    </div>
                    <div class="card-body">
                        <ul class="timeline pb-0 mb-0">
                            <li class="timeline-item timeline-item-transparent border-primary">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Order was placed (Order ID: #32543)</h6>
                                        <span class="text-muted">Tuesday 11:29 AM</span>
                                    </div>
                                    <p class="mt-2">Your order has been placed successfully</p>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent border-primary">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Pick-up</h6>
                                        <span class="text-muted">Wednesday 11:29 AM</span>
                                    </div>
                                    <p class="mt-2">Pick-up scheduled with courier</p>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent border-primary">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Dispatched</h6>
                                        <span class="text-muted">Thursday 11:29 AM</span>
                                    </div>
                                    <p class="mt-2">Item has been picked up by courier</p>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent border-primary">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Package arrived</h6>
                                        <span class="text-muted">Saturday 15:20 AM</span>
                                    </div>
                                    <p class="mt-2">Package arrived at an Amazon facility, NY</p>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent border-left-dashed">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Dispatched for delivery</h6>
                                        <span class="text-muted">Today 14:12 PM</span>
                                    </div>
                                    <p class="mt-2">Package has left an Amazon facility, NY</p>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-secondary"></span></span>
                                <div class="timeline-event pb-0">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Delivery</h6>
                                    </div>
                                    <p class="mt-2 mb-0">Package will be delivered by tomorrow</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <div class="col-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title m-0">Customer details</h6>
                    </div>
                    <div class="card-body">
                        @if ($purchase && $purchase->user)
                            <div class="d-flex justify-content-start align-items-center mb-4">
                                <div class="avatar me-2">
                                    <img src="" alt="Avatar" class="rounded-circle">
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="" class="text-body text-nowrap">
                                        <h6 class="mb-0">{{ $purchase->user->name }}</h6>
                                    </a>
                                    <small class="text-muted">Customer ID: {{ $purchase->user->id }}</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center mb-4">
                                <span
                                    class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                        class="bx bx-cart-alt bx-sm lh-sm"></i></span>
                                <h6 class="text-body text-nowrap mb-0"></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6>Contact info</h6>
                                {{-- <h6><a href=" javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#editUser">Edit</a>
                                </h6> --}}
                            </div>
                            <p class=" mb-1">Email: {{ $purchase->user->email }}</p>
                            <p class=" mb-0">Mobile: {{ $purchase->user->phone_number }}</p>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    @if ($purchase)
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="card-title m-0">Shipping address</h6>
                            {{-- <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#addNewAddress">Edit</a></h6> --}}
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $purchase->address }} <br>VIETNAM</p>
                        </div>
                    @endif
                </div>
                <div class="card mb-4">
                    @if ($purchase && $purchase->user)
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="card-title m-0">Billing address</h6>
                            {{-- <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#addNewAddress">Edit</a></h6> --}}
                        </div>
                        <div class="card-body">
                            <p class="mb-4">{{ $purchase->address }} <br>VIETNAM</p>
                            <h6 class="mb-0 pb-2">Mastercard</h6>
                            <p class="mb-0">Card Number: {{ $purchase->user->phone_number }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        {{-- <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Edit User Information</h3>
                            <p>Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                            onsubmit="return false" novalidate="novalidate">
                            <div class="col-12 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="modalEditUserFirstName">First Name</label>
                                <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                    class="form-control" placeholder="John">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="modalEditUserLastName">Last Name</label>
                                <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                    class="form-control" placeholder="Doe">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-12 fv-plugins-icon-container">
                                <label class="form-label" for="modalEditUserName">Username</label>
                                <input type="text" id="modalEditUserName" name="modalEditUserName"
                                    class="form-control" placeholder="john.doe.007">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">Email</label>
                                <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                    class="form-control" placeholder="example@domain.com">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select"
                                    aria-label="Default select example">
                                    <option selected="">Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                    <option value="3">Suspended</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditTaxID">Tax ID</label>
                                <input type="text" id="modalEditTaxID" name="modalEditTaxID"
                                    class="form-control modal-edit-tax-id" placeholder="123 456 7890">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">+1</span>
                                    <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                        class="form-control phone-number-mask" placeholder="202 555 0111">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserLanguage">Language</label>
                                <div class="position-relative">
                                    <div class="position-relative"><select id="modalEditUserLanguage"
                                            name="modalEditUserLanguage"
                                            class="select2 form-select select2-hidden-accessible" multiple=""
                                            tabindex="-1" aria-hidden="true" data-select2-id="modalEditUserLanguage">
                                            <option value="">Select</option>
                                            <option value="english" selected="" data-select2-id="17">English</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="french">French</option>
                                            <option value="german">German</option>
                                            <option value="dutch">Dutch</option>
                                            <option value="hebrew">Hebrew</option>
                                            <option value="sanskrit">Sanskrit</option>
                                            <option value="hindi">Hindi</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                            dir="ltr" data-select2-id="16" style="width: auto;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--multiple" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="-1"
                                                    aria-disabled="false">
                                                    <ul class="select2-selection__rendered">
                                                        <li class="select2-selection__choice" title="English"
                                                            data-select2-id="18"><span
                                                                class="select2-selection__choice__remove"
                                                                role="presentation">×</span>English</li>
                                                        <li class="select2-search select2-search--inline"><input
                                                                class="select2-search__field" type="search"
                                                                tabindex="0" autocomplete="off" autocorrect="off"
                                                                autocapitalize="none" spellcheck="false" role="searchbox"
                                                                aria-autocomplete="list" placeholder=""
                                                                style="width: 0.75em;"></li>
                                                    </ul>
                                                </span></span><span class="dropdown-wrapper"
                                                aria-hidden="true"></span></span></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserCountry">Country</label>
                                <div class="position-relative">
                                    <div class="position-relative"><select id="modalEditUserCountry"
                                            name="modalEditUserCountry"
                                            class="select2 form-select select2-hidden-accessible" data-allow-clear="true"
                                            tabindex="-1" aria-hidden="true" data-select2-id="modalEditUserCountry">
                                            <option value="" data-select2-id="45">Select</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Korea">Korea, Republic of</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Russia">Russian Federation</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                            dir="ltr" data-select2-id="44" style="width: auto;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-disabled="false"
                                                    aria-labelledby="select2-modalEditUserCountry-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-modalEditUserCountry-container" role="textbox"
                                                        aria-readonly="true"><span
                                                            class="select2-selection__placeholder">Select
                                                            value</span></span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Use as a billing address?</span>
                                </label>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                            <input type="hidden">
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--/ Edit User Modal -->

        <!-- Add New Address Modal -->
        {{-- <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="address-title">Add New Address</h3>
                            <p class="address-subtitle">Add new address for express delivery</p>
                        </div>
                        <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                            onsubmit="return false" novalidate="novalidate">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md mb-md-0 mb-3">
                                        <div class="form-check custom-option custom-option-icon checked">
                                            <label class="form-check-label custom-option-content" for="customRadioHome">
                                                <span class="custom-option-body">
                                                    <i class="bx bx-home"></i>
                                                    <span class="custom-option-title">Home</span>
                                                    <small> Delivery time (9am – 9pm) </small>
                                                </span>
                                                <input name="customRadioIcon" class="form-check-input" type="radio"
                                                    value="" id="customRadioHome" checked="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-md-0 mb-3">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customRadioOffice">
                                                <span class="custom-option-body">
                                                    <i class="bx bx-briefcase"></i>
                                                    <span class="custom-option-title"> Office </span>
                                                    <small> Delivery time (9am – 5pm) </small>
                                                </span>
                                                <input name="customRadioIcon" class="form-check-input" type="radio"
                                                    value="" id="customRadioOffice">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="modalAddressFirstName">First Name</label>
                                <input type="text" id="modalAddressFirstName" name="modalAddressFirstName"
                                    class="form-control" placeholder="John">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="modalAddressLastName">Last Name</label>
                                <input type="text" id="modalAddressLastName" name="modalAddressLastName"
                                    class="form-control" placeholder="Doe">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalAddressCountry">Country</label>
                                <div class="position-relative">
                                    <div class="position-relative"><select id="modalAddressCountry"
                                            name="modalAddressCountry"
                                            class="select2 form-select select2-hidden-accessible" data-allow-clear="true"
                                            tabindex="-1" aria-hidden="true" data-select2-id="modalAddressCountry">
                                            <option value="" data-select2-id="72">Select</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Korea">Korea, Republic of</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Russia">Russian Federation</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                            dir="ltr" data-select2-id="71" style="width: auto;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-disabled="false"
                                                    aria-labelledby="select2-modalAddressCountry-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-modalAddressCountry-container" role="textbox"
                                                        aria-readonly="true"><span
                                                            class="select2-selection__placeholder">Select
                                                            value</span></span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <label class="form-label" for="modalAddressAddress1">Address Line 1</label>
                                <input type="text" id="modalAddressAddress1" name="modalAddressAddress1"
                                    class="form-control" placeholder="12, Business Park">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalAddressAddress2">Address Line 2</label>
                                <input type="text" id="modalAddressAddress2" name="modalAddressAddress2"
                                    class="form-control" placeholder="Mall Road">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalAddressLandmark">Landmark</label>
                                <input type="text" id="modalAddressLandmark" name="modalAddressLandmark"
                                    class="form-control" placeholder="Nr. Hard Rock Cafe">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalAddressCity">City</label>
                                <input type="text" id="modalAddressCity" name="modalAddressCity" class="form-control"
                                    placeholder="Los Angeles">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalAddressLandmark">State</label>
                                <input type="text" id="modalAddressState" name="modalAddressState"
                                    class="form-control" placeholder="California">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalAddressZipCode">Zip Code</label>
                                <input type="text" id="modalAddressZipCode" name="modalAddressZipCode"
                                    class="form-control" placeholder="99950">
                            </div>
                            <div class="col-12">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Use as a billing address?</span>
                                </label>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                            <input type="hidden">
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--/ Add New Address Modal -->
    </div>

    @include('purchases.modal.add_product_purchase')
    {{-- @include('purchases.modal.delete_product_purchase') --}}
@endsection
