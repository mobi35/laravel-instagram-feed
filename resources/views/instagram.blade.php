@foreach ($instagrams as $insta)
<img src ='{{$insta['url']}}'/>
<p>{{$insta['caption']}}</p> <br>
<p>{{$insta['permalink']}}</p>
@endforeach
