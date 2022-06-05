@include('layouts.header')
@php
$image=$campaign->images;
$images=explode('|',$image)
@endphp
<p class="h2 d-flex justify-content-center">{{$campaign->name}} campaign images</p>
<br>
<div class="container">
<div id="gallery">
@foreach($images as $item)
<img src="{{URL::to('/images').'/'.$item}}" style="height: 200px;" alt="">
@endforeach
  
  </div>
</div>
 </body>
</html>