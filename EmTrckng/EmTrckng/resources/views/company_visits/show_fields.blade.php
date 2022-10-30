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
                                    <th> </th>
                                    <td> </td>
                                    
                                    <th> Decision Maker:- </th>
                                    <td>{{ $companyVisit->decision_maker }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
