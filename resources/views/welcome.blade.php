@include('layouts.header')
<title>Laravel</title>
<div style="font-size:20px;" class="container">
<p class="h2 d-flex justify-content-center">Welcome to eightythree3 task</p><br>
  <h2><u>To view the user section you can go with the link below :-</u></h2>
  <a href="{{route('campaigns.index')}}">view user section</a><br><br>
  <p>*In user section you can create anew campaign , edit a exsist campaign , and also view the all images and data of each campaign </p><br><br>


  <h2><u>To access the API section you can go with the links and the information below :-</u></h2>
  <p>API craete campaign</p>
  <a href="api/craete_campaign">/api/create_campaign</a>
  <p>In this ApI you should send me the following attributes :- name:string,from:date,to:date,total:number,daily_budget,image[]
      ........Method will be post
  </p> <br>

  <p>API update campaign</p>
  <a href="api/update_campaign">/api/update_campaign</a>
  <p>In this ApI you should send me the following attributes :- name:string,from:date,to:date,total:number,daily_budget,campaign id
     ........ Method will be post
  </p> <br>

  <p>API view campaign</p>
  <a href="api/view_campaignn">/api/view_campaignn</a>
  <p>In this ApI you should send me the following attributes :-campaign id
      .....Method will be get
  </p> <br>


  <p>API delete campaign</p>
  <a href="api/delete_campaign">/api/delete_campaign</a>
  <p>In this ApI you should send me the following attributes :-campaign id
      .......Method will be post
  </p> <br>

</div>

       