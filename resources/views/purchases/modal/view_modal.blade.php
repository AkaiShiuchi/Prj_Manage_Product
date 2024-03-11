<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="container py-0">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light" style="padding-top: 10px;">
                                <img src="" id="image" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="view" id="name"></p>
                                        <p class="view text-muted" id="category"></p>
                                    </div>
                                    <div>
                                        <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="small text-muted">Rated 4.0/5</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                                    <p class="view" id="price">$ </p>
                                    <p class="view text-dark" id="total"></p>
                                </div>
                                <p class="view text-muted" id="describe"></p>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                    {{-- <button type="button" class="btn" data-dismiss="modal">Cancel</button> --}}
                                    <button type="button" class="btn btn-primary">Buy now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
