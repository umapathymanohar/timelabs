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

            <tbody>
 
      
            @forelse ($timesheet as $time)
            <tr>
                <td>{{ $time->check_in_date}}</td>
                <td>{{ $time->check_in_time}}</td>
                <td>{{ $time->check_out_time}}</td>

                <?php 
                    $working_hours = strtotime($time->check_out_time) - strtotime($time->check_in_time);


                    
                    $working_hours =  date("H:i" , mktime(0,0,$working_hours));
                ?>
                <td><?php echo $working_hours ?> hours</td>
            @empty
            <div class="alert alert-info">
            <h4 class="alert-heading">Awww!</h4>
            <p>Seems like you don't have any entry. <a href="#">New to Timelabs?</a></p>
            </div>
            </tr>
          @endforelse
            </tbody>
        </thead>
    </table>

 
    </div>
    
    <div class="span3">

    <div class="well">

    <form id = "checkin"class="well" method="POST" action="timesheet/checkin">
        <button class="btn"  >Check in</button>
    </form>
    <form class="well" method="POST" action="timesheet/checkout">
        <button class="btn">Check out</button>
    </form>
    </div>
 </div>
    
</div>

 
@endsection