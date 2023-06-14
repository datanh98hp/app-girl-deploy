<div class="modal fade" id="{{$idName}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$name ?? "Tiêu đề"}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if(!empty($brands))
                    @foreach($brands as $j => $brand)
                        <div class="col-lg-4 col-sm-6 col-6 mb-30">
                            <div class="client-logso text-center">
                                <div class="client-logo-img">
                                    <a href="{{route('product.brand',['id' => $brand->id])}}">
                                        <img style="height: 80px; object-fit: cover;" src="{{Storage::url($brand->image)}}">
                                    </a>
                                </div>
                                <p>{{$brand->name}}</p>
                            </div>
                        </div>
                    @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
