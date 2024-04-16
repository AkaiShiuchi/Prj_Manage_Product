<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="preivewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="preview modal-content">
            <div class="preivew modal-header text-white">
                <button type="button" class="preview close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="preview">&times;</span>
                </button>
                <ul class="article-listing">
                    @foreach ($products as $item)
                        <li>
                            <div class="image-column">
                                <a href="#">
                                    <img src="{{ asset('storage/uploads/' . $item->image) }}" alt="Product Image"
                                        class="avatar-md img-thumbnail" />
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
