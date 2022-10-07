@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borded">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contacts as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                        </tr>
                                    @empty
                                        <p>No data found</p>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $contacts->links() !!}
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @endsection

@endsection
