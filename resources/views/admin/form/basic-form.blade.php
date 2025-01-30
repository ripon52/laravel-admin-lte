
@extends("admin.layouts.admin")

@section("title","Dashboard")

@section("content")

    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <x-form.input name="name" label="Name" />
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

@endsection
