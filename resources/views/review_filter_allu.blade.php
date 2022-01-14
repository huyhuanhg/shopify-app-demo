<ul class="revico-comment-tagcloud-taglist">
    @foreach ($f_list as $f)
    <li class="revico-comment-tagcloud-tagitem" data-tag-word="{{$f['title']}}">
        {{$f['title']}}
    </li>
    @endforeach
</ul>
