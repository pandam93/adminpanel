@extends('adminlte::page')

@section('plugins.toastr', true)
@section('content_top_nav_right')
  @auth
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge">{{ $notifications->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
      <span class="dropdown-item dropdown-header">{{ $notifications->count() }} Notifications</span>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i> 4 new messages
        <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-users mr-2"></i> 8 friend requests
        <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-file mr-2"></i> 3 new reports
        <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('markNotification') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>
  @endauth
@endsection
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
    <p>Welcome to this beautiful admin panel.</p>

    <h2>Sin cointainer</h2>
    <div class="mt-2 row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4" style="height: 50px; border: 1px green solid"></div>
          <div class="col-md-4" style="height: 50px; border: 1px red solid"></div>
          <div class="col-md-4" style="height: 50px; border: 1px blue solid"></div>
        </div>
      </div>
    </div>
    <hr>
    
    <h2>Container fluid</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4" style="height: 50px; border: 1px green solid"></div>
        <div class="col-md-4 h-auto" style="height: 50px; border: 1px red solid">
          <canvas id="myChart"></canvas>
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Ribbon
            </div>
          </div>
        </div>
        <div class="col-md-4" style="height: 50px; border: 1px blue solid"></div>
      </div>
    </div>
    <hr>

    <h2>Container</h2>
    <div class="mt-2 container">
      <div class="row">
        <div class="col-md-4" style="height: 50px; border: 1px green solid"></div>
        <div class="col-md-4" style="height: 50px; border: 1px red solid"></div>
        <div class="col-md-4" style="height: 50px; border: 1px blue solid"></div>
      </div>
    </div>
    <hr>

    <h2>Cards</h2>
    <div class="mt-2 container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <!-- Main node for this component -->
          <div class="timeline">
            <!-- Timeline time label -->
            <div class="time-label">
              <span class="bg-green">23 Aug. 2019</span>
            </div>
            <div>
            <!-- Before each timeline item corresponds to one icon on the left scale -->
              <i class="fas fa-envelope bg-blue"></i>
              <!-- Timeline item -->
              <div class="timeline-item">
              <!-- Time -->
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <!-- Header. Optional -->
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                <!-- Body -->
                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <!-- Placement of additional controls. Optional -->
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-sm">Read more</a>
                  <a class="btn btn-danger btn-sm">Delete</a>
                </div>
              </div>
            </div>
            <!-- The last icon means the story is complete -->
            <div>
              <i class="fas fa-clock bg-gray"></i>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Default Card Example</h3>
              <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">Label</span>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('toast') }}" method="POST">
              @csrf
              <input type="text" name="test" id="test" value="{{ old('test') }}">
              <button class="btn btn-primary" type="submit">Test</button>
              </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              The footer of the card
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
          
          <ul data-widget="todo-list" id="my-todo-list">
            <li>Esto</li>
            <li>Lo otro</li>
            <li>Lo de más allá</li>
           </ul>
          
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        @if(Session::has('status'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.success("{{ session('status') }}");
        @endif

        $('#my-todo-list').TodoList({
          onCheck: function(checkbox) {
            // Do something when the checkbox is checked
          },
          onUnCheck: function(checkbox) {
            // Do something after the checkbox has been unchecked
          }
        })

    </script>
@stop