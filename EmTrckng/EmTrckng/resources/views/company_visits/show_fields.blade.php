<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-2 card-title">
                        Company Visit Details
                    </h4>
                </div>
            </div>     
            <div class="mt-4 row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody> 
                                <tr>
                                    <th> Name:- </th>
                                    <td>{{ $companyVisit->name }}</td>

                                    <th> City:- </th>
                                    <td>{{ $companyVisit->city }}</td>

                                </tr>
                                <tr>
                                    <th> State:- </th>
                                    <td>{{ $companyVisit->state }}</td>

                                    <th> Address:- </th>
                                    <td>{{ $companyVisit->address }}</td>

                                </tr>
                                <tr>
                                    <th> Contact Person:- </th>
                                    <td>{{ $companyVisit->contact_person }}</td>
                                    
                                    <th> Designation:- </th>
                                    <td>{{ $companyVisit->designation }}</td>

                                </tr>
                                <tr>
                                    <th> Department:- </th>
                                    <td>{{ $companyVisit->department }}</td>

                                    <th> Contact No:- </th>
                                    <td>{{ $companyVisit->contact_no }}</td>

                                </tr>
                                <tr>
                                    <th> Email:- </th>
                                    <td>{{ $companyVisit->email }}</td>

                                    <th> Customer Code:- </th>
                                    <td>{{ $companyVisit->customer_code }}</td>

                                </tr>
                                <tr>
                                    <th> Date Of Visit:- </th>
                                    <td>{{ $companyVisit->date_of_visit ?? 'NA' }}</td>

                                    <th> Next Follow Up Date:- </th>
                                    <td>{{ $companyVisit->next_follow_update ?? 'NA' }}</td>

                                </tr>
                                
                                <tr>
                                    <th> Latitude:- </th>
                                    <td>{{ $companyVisit->latitude ?? 'NA' }}</td>

                                    <th> Longitude:- </th>
                                    <td>{{ $companyVisit->longitude ?? 'NA' }}</td>

                                </tr>
                                <tr>
                                    <th> Decision Maker:- </th>
                                    <td>{{ $companyVisit->decision_maker }}</td>
                                    @php $userData = DB::table('users')->where('id','=',$companyVisit->created_by)->select('name')->first();
                                    $createdBy = $userData->name ?? 'NA'; @endphp
                                    <th> Created By:- </th>
                                    <td>{{ $createdBy }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company Visit Attachments</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead >
                                <th>Images</th>
                            </thead>
                            <tbody>
                                @foreach ($attchments as $attchment)
                                <tr>
                                    @if (!empty($attchment->image))
                                        @php  $explodeName = explode('.',$attchment->image);@endphp
                                        @if($explodeName[1] == "jpg" || $explodeName[1] == "jpeg" || $explodeName[1] == "gif")
                                            <td><img src="{{ url('companyAttachments/'.$attchment->image) }}" class="rounded-circle img-circle" width="100" height="100"><a href="{{ url('companyAttachments/'.$attchment->image) }}">{{ url('companyAttachments/'.$attchment->image) }}</a></td>
                                        @elseif($explodeName[1] == "pdf")
                                            <td><i class=" btn-danger fas fa-file-pdf fa-4x"></i><a href="{{ url('companyAttachments/'.$attchment->image) }}">{{ url('companyAttachments/'.$attchment->image) }}</a></td>
                                        @elseif($explodeName[1] == "xls" || $explodeName[1] == "xlsx" || $explodeName[1] == "xlsm" || $explodeName[1] == "xlsb" || $explodeName[1] == "xltx" ||  $explodeName[1] == "xml")
                                            <td><i class=" btn-success fas fa-file-excel fa-4x"></i><a href="{{ url('companyAttachments/'.$attchment->image) }}">{{ url('companyAttachments/'.$attchment->image) }}</a></td>
                                        @else
                                        <td> NA </td>
                                        @endif
                                    @else
                                        <td> NA </td>                       
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
