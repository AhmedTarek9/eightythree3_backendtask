@include('layouts.header')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
  <div class="d-flex justify-content-center">
<div style="height:800px;" class="form">
<form action="{{route('campaigns.update',$campaign->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method("PUT")
      <div class="title"><p class="h2 d-flex justify-content-center">Edit campaign</p></div>
      <div class="subtitle">Let's Edit your campaign!</div>
      <div class="input-container ic1">
      <input value="{{$campaign->name}}" type="text" class="input" placeholder=" " / name="name">
        <div class="cut"></div>
        <label for="image Name" class="placeholder">campaign name</label>
      </div>
      <div class="input-container ic1">
      <input min="{{date('Y-m-d')}}" value="{{$campaign->from}}" type="date" class="input" placeholder=" " / name="from">
        <div class="cut"></div>
        <label for="image Name" class="placeholder">From date</label>
      </div>
      <div class="input-container ic1">
      <input min="{{$campaign->from}}" value="{{$campaign->to}}" type="date" class="input" placeholder=" " / name="to">
        <div class="cut"></div>
        <label for="image Name" class="placeholder">To date</label>
      </div>
      <div class="input-container ic1">
      <input value="{{$campaign->total}}" type="number" class="input" placeholder=" " / name="total">
        <div class="cut"></div>
        <label for="image Name" class="placeholder">total number</label>
      </div>
      <div class="input-container ic1">
      <input value="{{$campaign->daily_budget}}" type="number" class="input" placeholder=" " / name="daily_budget">
        <div class="cut"></div>
        <label for="image Name" class="placeholder">daily budget</label>
      </div>
      <button type="sumbit" class="submit">submit</button>
  </form>
    </div>
  </div>
</div>