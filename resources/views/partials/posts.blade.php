<div class="posts">
    @foreach($posts as $post)
    <a href="{{ route('post', ['post' => $post->id]) }}" class="posts__card">
        <div class="posts__img">
            @if($post->images->count() > 1)
                @foreach($post->images as $key=>$image)
                    <div class="post-img">
                        <img src="{{$image->path}}" alt="...">
                    </div>
                @endforeach
            @elseif($post->images->count() == 1)
                <img src="{{$post->images->first()->path}}">
            @endif
        </div>


        <div class="posts__text-goup">
            <div class="posts__title">{{ $post->title }}</div>
            <div class="posts__text">{{ $post->user->name }}</div>
        </div>
    </a>
    @endforeach
</div>