<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="ml-4 card-title">
                        @lang('models/categories.header.detail')
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
                                        <th> Name:- </th>
                                        <td>{{ $category->name }}</td>

                                        <th> Description:- </th>
                                        <td>{{ $category->description }}</td>
                                        
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