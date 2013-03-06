@layout('layouts/main')

@section('navigation')
@parent
<li><a href="about">Timesheet</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span8">
    <table class="table table-bordered">
        <thead>
            <td>Date</td>
            <td>Check In</td>
            <td>Check Out</td>
            <td>Working Hours</td>
            <td>Overtime</td>
            <tbody>
 
      
            @forelse ($timesheet as $time)
                <td>{{ $time->check_in_date}}</td>
                <td>{{ $time->check_in_time}}</td>
                <td>{{ $time->check_out_time}}</td>
                <td></td>
                <td></td>
            @empty
            <div class="alert alert-info">
            <h4 class="alert-heading">Awww!</h4>
            <p>Seems like you don't have any entry. <a href="#">New to Timelabs?</a></p>
            </div>
          @endforelse
            </tbody>
        </thead>
    </table>

 
    </div>
    
    <div class="span3">

    <div class="well">
        <button class="btn">Check in</button>
        <button class="btn">Check out</button>
    </div>
 
    </div>
    
</div>

 
@endsection