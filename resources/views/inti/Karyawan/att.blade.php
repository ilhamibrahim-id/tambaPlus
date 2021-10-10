<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <hr />
                        <table class="table">
                            <thead class=" text-primary">
                                <thead>
                                    <tr>
                                        <th>Nama Job</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($status->listjob as $sts)
                                    <tr>
                                        <th>
                                            {{ $sts->nama }}
                                        </th>
                                        <th>
                                            {{ $sts->pivot->status }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
