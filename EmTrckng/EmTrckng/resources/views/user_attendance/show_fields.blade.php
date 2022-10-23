<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-2 card-title">
                        User Attendance Details
                    </h4>
                </div>
            </div>     
            <div class="mt-4 row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody> 
                                <tr>
                                    <th> User Name:- </th>
                                    <td>{{ $attendance->user_id }}</td>

                                    <th> Location:- </th>
                                    <td>{{ $attendance->user_location }}</td>

                                </tr>
                                <tr>
                                    <th> Check In Date:- </th>
                                    <td>{{ $attendance->check_in_date }}</td>

                                    <th> Check In Time:- </th>
                                    <td>{{ $attendance->check_in_time }}</td>

                                </tr>
                                <tr>
                                    <th> Check Out Date:- </th>
                                    <td>{{ $attendance->check_out_date }}</td>
                                    
                                    <th> Check Out Time:- </th>
                                    <td>{{ $attendance->check_out_time }}</td>

                                </tr>
                                <tr>
                                    <th> Created At:- </th>
                                    <td>{{ $attendance->created_at }}</td>

                                    <th> Updated At:- </th>
                                    <td>{{ $attendance->updated_at }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
