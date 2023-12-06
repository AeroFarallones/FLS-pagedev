@if ($is_visible)
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 60%; max-width: 70%">
    <div class="modal-content px-3 py-2">
      <div class="d-flex justify-content-between align-items-center ">
        <h4 class="font-montbold fs-2" style="color: #000a54">{{$title}}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="row row-cols-3">

        <div class="col-8">

          <div class="d-flex">
            <p>{{$description}}</p>
          </div>
          <div class="h-50">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/B788/B788.png')}}" width="100%" alt="{{$title}}">
          </div>
          <div class="row row-rows-2 gap-5">
            <div class="col font-fls">
              <span class="text-fls " style="color: #000a54"><b>Specifications</b></span>
              <ul>
                <li>MTOW: {{$mtow}}</li>
                <li>ZFW: {{$Zfw}}</li>
                <li>Ceiling: {{$Ceiling}}</li>
                <li>Max Payload: {{$MaxPayload}}</li>
                <li>Max Speed: {{$Speed}}</li>
              </ul>
            </div>
            <div class="col d-flex flex-column font-fls align-items-center">
              <span class="text-fls" style="color: #000a54"><b>Minimum
                  range</b></span>
              <img src="https://www.aerofarallones.com/image/new/ranks/{{$range}}.png" width="30%" alt="">
            </div>
          </div>
        </div>
        <div class="col d-flex flex-column">
          <img src="{{asset('fls-theme/frontend/img/Airplanes/B788/B788.png')}}" width="100%" alt="">
          <img src="{{asset('fls-theme/frontend/img/Airplanes/B788/B788.png')}}" width="100%" alt="">
          <img src="{{asset('fls-theme/frontend/img/Airplanes/B788/B788.png')}}" width="100%" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endif

{{-- <div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$title}}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
    {{$description}}
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div> --}}