<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-4 card-title">
                        Permission Details
                    </h4>
                </div>
            </div>
            <div class="card-body">        
                <div class="mt-4 row">
                    <div class="col">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <tbody> 
                                    <tr>
                                        <th>Name:-</th>
                                        <td>{{ $permission->name }}</td>

                                        <th>Title:-</th>
                                        <td>{{ $permission->title }}</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>Guard Name:-</th>
                                        <td>{{ $permission->guard_name }}</td>

                                        <th>Description:-</th>
                                        <td>{{ $permission->description }}</td>

                                    </tr>
                                    <tr>
                                        <th>Module:-</th>
                                        <td>{{ $permission->module }}</td>

                                        <th></th>
                                        <td></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>