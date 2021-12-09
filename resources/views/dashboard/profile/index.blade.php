@extends('layouts.main')
@section('title', 'Profile')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/profile">Profile</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0 text-capitalize">Your Profile</h6>
    </nav>
@endsection

@section('content')
<div class="container-fluid">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          @isset(Auth::user()->pict)
            <img src="{{ asset('/') . Auth::user()->pict }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="height: 250; width: 150; display: block">
          @else
            <img src="{{ asset('/')}}assets/img/blank-profile-picture.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="height: 250; width: 150; display: block">
          @endisset
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1 text-capitalize">
            {{ Auth::user()->name }}
          </h5>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
          <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(603.000000, 0.000000)">
                          <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                          </path>
                          <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                          <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="ms-1">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>courses</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(154.000000, 300.000000)">
                          <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                          <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="ms-1">Courses</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>materials</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(304.000000, 151.000000)">
                          <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                          </polygon>
                          <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                          <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="ms-1">Materials</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="col-md-4 text-end">
              <a data-bs-toggle="tooltip" title="Edit Profile">
                <i class="fas fa-user-edit text-secondary text-sm" data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#modalEditProfile"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
        <div class="row">
          <div class="col-xl-8 order-last">
      @foreach($users as $user)
        @foreach ($user->user_credentials as $credentials)
          <p class="text-sm mt-3">
            @empty($credentials->description)
               You haven't fill the description
            @else
              {{ $credentials->description }}
            @endempty
          </p>
          <hr class="horizontal gray-light my-4">
          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user->name }}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; 
            @empty($credentials->gender)
                  <span>User not tell Gender</span>
            @else
                @if ($credentials->gender == 'p')
                    <i class="fas fa-venus fa-lg"></i> 
                @elseif($credentials->gender == 'l')
                    <i class="fas fa-mars fa-lg"></i>
                @endif
            @endempty
            </li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3f5e535a5c4b5750524f4c50517f525e5653115c5052">
            {{ $user->email }}
            </a></li>

                  @empty($credentials->academy)
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Academy:</strong> &nbsp; 
                      <span>-</span>
                  </li>
                  @else
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Academy:</strong> &nbsp; 
                    <span>{{ $credentials->academy }}</span>
                  </li>
                  @endempty

                  @empty($credentials->mobile)
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; 
                      <span>-</span>
                  </li>
                  @else
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; 
                    <span>{{ $credentials->mobile }}</span>
                  </li>
                  @endempty

                  @empty($credentials->location)
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; 
                      <span>-</span>
                  </li>
                  @else
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; 
                    <span>{{ $credentials->location }}</span>
                  </li>
                  @endempty

                  
                  <li class="list-group-item border-0 ps-0 pb-0">
                    <strong class="text-dark text-sm">Social:</strong> &nbsp;

                  @isset($credentials->fb_acc)
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://facebook.com/{{ $credentials->fb_acc }}">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                  @endisset
                  @isset($credentials->twit_acc)
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://twitter.com/{{ $credentials->twit_acc }}">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                  @endisset
                  @isset($credentials->ig_acc)
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://instagram.com/{{ $credentials->ig_acc }}">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                  @endisset
                  @isset($credentials->git_acc)
                      <a class="btn btn-github btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://github.com/{{ $credentials->git_acc }}">
                        <i class="fab fa-github fa-lg"></i>
                      </a>
                  @endisset
                  </li>
            </ul>
            
          @endforeach

        @endforeach
          </div>

          <div class="col-xl-4">
            <div class="container" style="position: relative">
              @isset(Auth::user()->pict)
                <img src="{{ asset('/') . Auth::user()->pict }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="height: 250; width: 150; display: block">
              @else
                <img src="{{ asset('/')}}assets/img/blank-profile-picture.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="height: 250; width: 150; display: block">
              @endisset
              <i class="fas fa-user-edit fa-lg text-secondary text-md text-end shadow-sm" style="position: absolute; bottom: 10%; left:80%;" data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#modal-picture"></i>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

    <div class="col-12 mt-4">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Courses</h6>
        </div>

        <div class="card-body p-3">
          <div class="row">
            @foreach($users as $user)
              @foreach($user->done as $done)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="card-body px-1 pb-0 mb-4">
                  <h4>{{ $done->course->title }}</h4> 
                  <div class="progress mb-4" style="height: 15px">
                    <div class="progress-bar" role="progressbar" style="width:{{ $done->progress }}%; height: 17px;" aria-valuenow="{{ $done->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $done->progress }} %</div>
                  </div>                  
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="/materi"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Preview Course</button></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endforeach
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card h-100 card-plain border">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  <a href="/materi">
                    <i class="fa fa-plus text-secondary mb-3"></i>
                    <h5 class=" text-secondary"> New Course </h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 mt-4">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Materials</h6>
        </div>

        <div class="card-body p-3">
          <div class="row">
            @foreach($users as $user)
              @foreach($user->progress as $progress)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="card-body px-1 pb-0 mb-4">
                  <h4>{{ $progress->materi->title }}</h4>
                  <p class="text-gradient text-dark mb-2 text-sm">{{ $progress->course->title }}</p>
                  <p class="text-sm">{{ $progress->status }}</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="/detail/{{ $progress->course_id }}/materi/{{ $progress->material_id }}"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Preview Material</button></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endforeach
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card h-100 card-plain border">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  <a href="/materi">
                    <i class="fa fa-plus text-secondary mb-3"></i>
                    <h5 class=" text-secondary"> New Materials </h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Data User -->
  <div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditProfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Pribadi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/profile/update/{{ Auth::user()->id }}" id="dataform">
            @csrf
            @method('post')
          @foreach ($users as $user)
              @foreach ($user->user_credentials as $credentials)
            <div class="form-group">
              <label for="desc" class="col-form-label">Description:</label>
              <small class="float-end" id="count">0 / 100</small>
              <textarea class="form-control" id="desc" name="desc" value="{{ $credentials->description }}">{{ $credentials->description }}</textarea>
              <small class="text-danger" id="warn_desc"></small>
            </div>
            <div class="form-group">
              <label for="gender" class="col-form-label">Gender:</label>
              <div class="form-check mb-3">
                <input class="form-check-input" value="p" type="radio" name="gender" id="genderP">
                <label class="custom-control-label" for="genderP"><i class="fas fa-venus fa-lg"></i> Perempuan</label> 
              </div>
              <div class="form-check">
                <input class="form-check-input" value="l" type="radio" name="gender" id="genderL">
                <label class="custom-control-label" for="genderL"><i class="fas fa-mars fa-lg"></i> Laki-laki</label>
              </div>
            </div>
            <div class="form-group">
              <label for="mobile-phone" class="col-form-label">Phone Number:</label>
              <input type="text" class="form-control" id="mobile-phone" name="phone" value="{{ $credentials->mobile }}">
            </div>
            <div class="form-group">
              <label for="academy" class="col-form-label">Academy:</label>
              <select type="text" class="form-select" name="academy" id="academy">
                <option value="{{ $credentials->academy }}" selected>{{ $credentials->academy }}</option>
                <option value="Student">Student</option>
                <option value="Colleger">Colleger</option>
                <option value="-">Not In Academy</option>
              </select>
            </div>
            <div class="form-group">
              <label for="location" class="col-form-label">Location:</label>
              <input type="text" class="form-control" id="location" name="location" value="{{ $credentials->location }}">
            </div>
            <div class="form-group">
              <label for="fb" class="col-form-label"><i class="fab fa-facebook fa-lg"></i> Facebook Account:</label>
              <input type="text" class="form-control" id="fb" name="fb" value="{{ $credentials->fb_acc }}">
            </div>
            <div class="form-group">
              <label for="twit" class="col-form-label"><i class="fab fa-twitter fa-lg"></i> Twitter Account:</label>
              <input type="text" class="form-control" id="twit" name="twit" value="{{ $credentials->twit_acc }}">
            </div>
            <div class="form-group">
              <label for="ig" class="col-form-label"><i class="fab fa-instagram fa-lg"></i> Instagram Account:</label>
              <input type="text" class="form-control" id="ig" name="ig" value="{{ $credentials->ig_acc }}">
            </div>
            <div class="form-group">
              <label for="git" class="col-form-label"><i class="fab fa-github fa-lg"></i> Github Account:</label>
              <input type="text" class="form-control" id="git" name="git" value="{{ $credentials->git_acc }}">
            </div>
          </form>
            @endforeach
          @endforeach
        </div>
        <div class="modal-footer">
          <a href="/profile"><button type="submit" form="dataform" id="update" class="btn bg-gradient-primary">Update</button>
          </a>
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Picture User -->
  <div class="modal fade" id="modal-picture" tabindex="-1" role="dialog" aria-labelledby="modal-picture" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Pick Your Profile Picture</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="py-3 text-center">
            <div class="card-body d-flex flex-column justify-content-center text-center">
              <div style="border-style: dashed; border-radius: 10px; border-color: #8392ab">
                <div class="card h-100 card-plain">
                  <form id="pictform" action="profile/img/update/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <label for="pict">
                      <div class="card-body d-flex flex-column justify-content-center text-center">
                        <i class="fa fa-plus fa-lg text-secondary mb-3"></i>
                        <input style="display: none" type="file" name="pict" id="pict" class="custom-file-upload" accept="image/*">
                        <h5 class="text-secondary"> Picture From Internal Disk </h5>
                      </div>
                    </label>
                  </form>
                </div>
              </div>
              <div class="preview mt-4 visually-hidden" id="preview">
                <h5 class="text-center">Your Chosen Picture</h5>
                <img src="#" alt="" id="img-prev" style="width: 200px; height: 200px">
              </div>
            </div>
            @error('pict')
                <div class="text-danger text-center">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white ml-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="pictform" id="btn-pict" class="btn btn-primary">Store</button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

@section('c_js')
  <script>
    $(function () {
      $("#desc").keyup(function (e) { 
        let count = $("#desc").val()
        let value = count.length
        $("#count").text(`${value}/100`)
        if(value > 100){
          $("#update").addClass("disable")
          $("#desc").addClass("is-invalid")
          $("#warn_desc").text("Description must be less than 100 character")
        }
      });
    
    $("#pict").change(function(evt){
      $("#preview").removeClass("visually-hidden");
      $("#img-prev").attr("src", URL.createObjectURL(this.files[0]));
    });

    });
  </script>
@endsection