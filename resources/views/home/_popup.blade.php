@php
$popup = App\Models\Popup::activo()->latest()->first();
@endphp
<div class="modal fade" id="popup" tabindex="-1" aria-labelledby="popupLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="c-overlay__modal">
                <div class="container">
                    <div class="col-lg-5 col-sm-12">
                        <div data-animation="slide" data-duration="500" data-infinite="1" class="c-slider w-slider">
                            <div class="w-slider-mask">
                                @foreach($popup->images as $image)
                                <div class="w-slide">
                                    <img src="{{ asset($image['image_url']) }}" alt="" class="m-0 p-0">
                                </div>
                                @endforeach
                            </div>
                            @if(count($popup->images) > 1)
                            <div class="c-slider__left-arrow w-slider-arrow-left">
                                <div class="w-icon-slider-left"></div>
                            </div>
                            <div class="c-slider__right-arrow w-slider-arrow-right">
                                <div class="w-icon-slider-right"></div>
                            </div>
                            <div class="c-slider__nav w-slider-nav w-slider-nav-invert w-round"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-12 ml-0 ml-lg-4 mt-4 mt-lg-0">
                        <div class="size-h3 margin-bottom-small">{{ $popup->subtitle }}</div>
                        <div class="size-h2 margin-bottom">{{ $popup->title }}</div>
                        <p>{{ $popup->description }}</p>
                        <div class="w-form">
                            <div class="d-flex justify-content-between align-items-center">
                                @if($popup->stock > 0)
                                <span><strong></strong>&nbsp;{{ $popup->stock == 1 ? '¡Último disponible!' : ($popup->stock > 10 ? $popup->stock . ' disponibles' : '¡Sólo ' . $popup->stock . ' disponibles!') }}</span>
                                @endif
                                <a href="#" class="btn btn-primary btn-lg" data-dismiss="modal">Obtener</a>
                            </div>
                        </div>
                    </div>
                    <a data-dismiss="modal" href="#" class="c-close-btn w-inline-block">
                        <div class="iconfont"><em class="iconfont__no-italize"></em></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>