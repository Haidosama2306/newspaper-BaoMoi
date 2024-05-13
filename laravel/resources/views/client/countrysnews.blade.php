<div class="container">
    @if (isset($countrysnews) && is_object($countrysnews))
    @foreach ($countrysnews as $post )
    <div class="lastest-new">
        <div class="row">
            <div class="col-6">
                <img src="{{ $post->image }}" alt="img">
            </div>
            <div class="col-6">
            <a class="title" href="#">
            @if(strlen($post->name) > 50 )
            <h5>{{ substr($post->name,0,50) }}...</h5>
            @else
            <h5>{{ $post->name }}</h5>
            @endif
        </a>
                <p>{{ substr($post->description,0,150)  }}</p>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<div class="border-bottom"></div>
