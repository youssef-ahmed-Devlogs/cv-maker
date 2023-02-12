@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-primary overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title text-white">Total Users</h3>
                    <h5 class="text-white mb-0">
                        <i class="fa fa-caret-up"></i>
                        {{ \App\Models\User::count() }}
                    </h5>
                </div>
                <div class="card-body text-center mt-3">
                    <div class="ico-sparkline">
                        <div id="sparkline12"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-success overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title text-white">New Users</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 357</h5>
                </div>
                <div class="card-body text-center mt-4 p-0">
                    <div class="ico-sparkline">
                        <div id="spark-bar-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-secondary overflow-hidden">
                <div class="card-header pb-3">
                    <h3 class="card-title text-white">Total Templates</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 547</h5>
                </div>
                <div class="card-body p-0 mt-2">
                    <div class="px-4"><span class="bar1"
                            data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-danger overflow-hidden">
                <div class="card-header pb-3">
                    <h3 class="card-title text-white">Fees Collection</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 3280$</h5>
                </div>
                <div class="card-body p-0 mt-1">
                    <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
            @include('admin.partials._notifications-card')
        </div>

        <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Assign Task</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Task</th>
                                    <th scope="col">Assigned Professors</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Working Design report</td>
                                    <td>Herman Beck</td>
                                    <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>Fees Collection report</td>
                                    <td>Emma Watson</td>
                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 70%;" role="progressbar">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td>Management report</td>
                                    <td>Mary Adams</td>
                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 70%;" role="progressbar">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td>Library book status</td>
                                    <td>Caleb Richards</td>
                                    <td><span class="badge badge-rounded badge-danger">Suspended</span>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" style="width: 70%;" role="progressbar">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td>Placement status</td>
                                    <td>June Lane</td>
                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 70%;" role="progressbar">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td>Working Design report</td>
                                    <td>Herman Beck</td>
                                    <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Student List </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3">Name</th>
                                    <th class="py-3">Assigned Professor</th>
                                    <th class="py-3">Branch</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3">Date Of Admit</th>
                                    <th class="py-3">Edit</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/5.png') }}" width="30"
                                                        alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Ricky Antony</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">Herman Beck</td>
                                    <td class="py-2">Mechanical</td>
                                    <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                    <td class="py-2">30/03/2018</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/1.png') }}" alt=""
                                                        width="30" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Emma Watson</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">Emma Watson</td>
                                    <td class="py-2">Computer</td>
                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                    <td class="py-2">11/07/2017</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/5.png') }}" width="30"
                                                        alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Rowen Atkinson</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">Mary Adams</td>
                                    <td class="py-2">Mechanical</td>
                                    <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                    <td class="py-2">05/04/2016</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/1.png') }}" alt=""
                                                        width="30" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Antony Hopkins</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">Caleb Richards </td>
                                    <td class="py-2">Computer </td>
                                    <td><span class="badge badge-rounded badge-danger">Suspended</span>
                                    </td>
                                    <td class="py-2">05/04/2018</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/1.png') }}" alt=""
                                                        width="30" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Jennifer Schramm</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">June Lane</td>
                                    <td class="py-2">Fees Collection</td>
                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                    <td class="py-2">17/03/2016</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/5.png') }}" width="30"
                                                        alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Raymond Mims</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">Herman Beck</td>
                                    <td class="py-2">Computer</td>
                                    <td><span class="badge badge-rounded badge-danger">Suspended</span>
                                    </td>
                                    <td class="py-2">12/07/2014</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="p-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl mr-2">
                                                    <img class="rounded-circle img-fluid"
                                                        src="{{ asset('backend/images/avatar/1.png') }}" alt=""
                                                        width="30" />
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">Michael Jenkins</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">Jennifer Schramm</td>
                                    <td class="py-2">Mechanical</td>
                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                    <td class="py-2">15/06/2014</td>
                                    <td>
                                        <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                class="la la-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
