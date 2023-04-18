<div style="width:80%;position:relative;margin:auto">



    <div style='width:100%;margin-bottom:10px;border:1xp solid #eee;'>
        <h3>{{$post->title}}</h3>
        <hr />
        <p>{{substr($post->content,100)}} ...</p>
        <a class='btn btn-primary' href="{{config('app.appurl')}}/post/{{$post->id}}">Read Post</a>
    </div>

</div>