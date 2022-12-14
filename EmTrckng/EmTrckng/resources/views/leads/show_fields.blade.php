<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-2 card-title">
                        Lead Details
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
                                    <td>{{ $leads->name }}</td>

                                    <th> City:- </th>
                                    <td>{{ $leads->city }}</td>

                                </tr>
                                <tr>
                                    <th> State:- </th>
                                    <td>{{ $leads->state }}</td>

                                    <th> Address:- </th>
                                    <td>{{ $leads->address }}</td>

                                </tr>
                                <tr>
                                    <th> Contact Person:- </th>
                                    <td>{{ $leads->contact_person }}</td>
                                    
                                    <th> Designation:- </th>
                                    <td>{{ $leads->designation }}</td>

                                </tr>
                                <tr>
                                    <th> Department:- </th>
                                    <td>{{ $leads->department }}</td>

                                    <th> Contact No:- </th>
                                    <td>{{ $leads->contact_no }}</td>

                                </tr>
                                <tr>
                                    <th> Email:- </th>
                                    <td>{{ $leads->email }}</td>

                                    <th>Customer Code:-</th>
                                    <td>{{ $leads->customer_code }}</td>

                                </tr>
                                <tr>
                                    <th> Date Of Visit:- </th>
                                    <td>{{ $leads->date_of_visit ?? 'NA' }}</td>

                                    <th> Next Follow Up Date:- </th>
                                    <td>{{ $leads->next_follow_update ?? 'NA' }}</td>

                                </tr>
                                <tr>
                                    <th> Decision Maker:- </th>
                                    <td>{{ $leads->decision_maker }}</td>
                                    @php $userData = DB::table('users')->where('id','=',$leads->created_by)->select('name')->first();
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
            <form action="{{  route('leadreplay.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lead Reply</h4>
                    </div>
                    <input type="hidden" value="{{ $leads->id }}" name="lead_id">

                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-12 col-form-label"> Add Comment:- 
                                <span aria-hidden="true" class="text-danger">*</span>
                            </label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <textarea name="comment" cols="152" id="input-comment" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-12 col-form-label"> Attachment:- </label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                <input type="file" class="form-control-file" id="attachment" name="attachment">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-auto mr-auto mb-2">
                        <input type="submit" class="btn btn-danger" value="Send Comment">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lead Reply Details</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead >
                                <th>Comment</th>
                                <th>File Name</th>
                            </thead>
                            <tbody>
                                @foreach ($attchments as $attchment)
                                <tr>
                                    <td>{{ $attchment->comment ?? 'NA' }}</td>
                                    @if (!empty($attchment->attachment))
                                        @php  $explodeName = explode('.',$attchment->attachment);@endphp
                                        @if($explodeName[1] == "jpg" || $explodeName[1] == "jpeg" || $explodeName[1] == "gif")
                                            <td><a href="{{ url('leadAttachments/'.$attchment->attachment) }}"><img src="{{ url('leadAttachments/'.$attchment->attachment) }}" width="100" height="100"></a></td>
                                        @elseif($explodeName[1] == "pdf")
                                            <td><a href="{{ url('leadAttachments/'.$attchment->attachment) }}"><i class=" btn-danger fas fa-file-pdf fa-4x"></i></a></td>
                                        @elseif($explodeName[1] == "xls" || $explodeName[1] == "xlsx" || $explodeName[1] == "xlsm" || $explodeName[1] == "xlsb" || $explodeName[1] == "xltx" ||  $explodeName[1] == "xml")
                                            <td><a href="{{ url('leadAttachments/'.$attchment->attachment) }}"><i class=" btn-success fas fa-file-excel fa-4x"></i></a></td>
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
