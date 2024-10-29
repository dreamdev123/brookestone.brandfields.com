<div class="card">
    <div class="card-top">
        <div class="tooltip-photo">
            <?php if ($user->profile->gender  === 'M') { ?>
                <img src="{{asset('images/maleUser.jpg')}}">
            <?php } else { ?>
                <img src="{{asset('images/femaleUser.jpg')}}">
            <?php } ?>
        </div>
        <div class="tooltip-name">
            {{ $user->username }}
        </div>
    </div>
    <div class="col-sm-12 tooltip-table">
        <table id="table" class="table table-striped table-hover">
            <tr>
                <td>First Name</td>
                <td>{{ $user->profile->first_name:'N/A' }}</td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>{{ $user->profile->last_name:'N/A' }}</td>
            </tr>
            <tr>
                <td>Sponsor</td>
                <td>{{ $sponsor->username }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <td>Join Date</td>
                <td>{{ date('Y-m-d',strtotime($user->created_at)) }}</td>
            </tr>
            {!! defineFilter('toolTip', '', 'tree', ['userId' => $profile->id]) !!}
        </table>
    </div>
</div>

<style type="text/css">

    .card {
        min-width: 375px;
    }

    .card-top {
        background-color: #40b7e5;
    }

    .tooltip-name {
        color:  #fff;
    }
</style>