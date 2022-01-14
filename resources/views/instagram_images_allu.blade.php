<div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($images as $imageSrc)
                <li class="splide__slide">
                    <div class="ins-img-item">
                        <a
                            href="javascript:void(0);"
                        >
                            <img class="ecbn-selection-image"
                                 src="{{$imageSrc}}"
                            />
                        </a>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
