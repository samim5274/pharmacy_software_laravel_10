<div class="body-wrapper-inner">
    <div class="container-fluid">
        @include('message.message')
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card w-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                            <div>
                                <h4 class="card-title mb-1 fw-semibold"><i class="fa-solid fa-chart-simple"></i> Sales Overview</h4>
                                <p class="card-subtitle text-muted small mb-0">Last 7 days Total & Due sale</p>
                            </div>
                            <ul class="list-inline mt-3 mt-md-0 mb-0">
                                <li class="list-inline-item text-success small">
                                    <span class="bg-success rounded-circle d-inline-block" style="width:10px; height:10px;"></span>
                                    <span class="ms-1">Total Sale</span>
                                </li>
                                <li class="list-inline-item text-danger small ms-3">
                                    <span class="bg-danger rounded-circle d-inline-block" style="width:10px; height:10px;"></span>
                                    <span class="ms-1">Due</span>
                                </li>
                            </ul>
                        </div>
                        <div id="sales-overview" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card overflow-hidden">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-start">
                        <div>
                            <h4 class="card-title">Weekly Stats</h4>
                            <p class="card-subtitle">Average sales</p>
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="text-muted" id="year1-dropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ti ti-dots fs-7"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="year1-dropdown">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pb-3 d-flex align-items-center">
                            <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-shopping-cart fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Top Sales</h5>
                                <span class="text-muted fs-3">Johnathan Doe</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-secondary-subtle text-muted">+68%</span>
                            </div>
                            </div>
                            <div class="py-3 d-flex align-items-center">
                            <span class="btn btn-warning rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-star fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Best Seller</h5>
                                <span class="text-muted fs-3">MaterialPro Admin</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-secondary-subtle text-muted">+68%</span>
                            </div>
                        </div>
                        <div class="py-3 d-flex align-items-center">
                            <span class="btn btn-success rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-message-dots fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Most Commented</h5>
                                <span class="text-muted fs-3">Ample Admin</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-secondary-subtle text-muted">+68%</span>
                            </div>
                        </div>
                        <div class="pt-3 mb-7 d-flex align-items-center">
                            <span class="btn btn-secondary rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-diamond fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Top Budgets</h5>
                                <span class="text-muted fs-3">Sunil Joshi</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-secondary-subtle text-muted">+15%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">User Performance</h4>
                            <p class="card-subtitle">User Wise Total Sale Report last 7 days</p>
                        </div>
                        <!-- <div class="ms-auto mt-3 mt-md-0">
                            <select class="form-select theme-select border-0" aria-label="Default select example">
                                <option value="1">March 2025</option>
                                <option value="2">March 2025</option>
                                <option value="3">March 2025</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Total Sale</th>
                                    <th>Due</th>
                                    <th>Discount</th>
                                    <th>VAT</th>
                                    <th>Payable</th>
                                    <th class="text-end">Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userSales as $sale)
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('img/employee/' . $sale->user->photo) }}" class="rounded-circle" width="40" alt="user" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-bolder">{{ $sale->user->name ?? 'Unknown' }}</h6>
                                                <span class="text-muted">{{ $sale->user->email ?? 'No Email' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-0 text-dark fw-medium">৳{{ number_format($sale->total, 2) }}</td>
                                    <td class="px-0 text-danger fw-medium">৳{{ number_format($sale->due, 2) }}</td>
                                    <td class="px-0 text-info fw-medium">৳{{ number_format($sale->discount, 2) }}</td>
                                    <td class="px-0 text-warning fw-medium">৳{{ number_format($sale->vat, 2) }}</td>
                                    <td class="px-0 text-success fw-medium">৳{{ number_format($sale->payable, 2) }}</td>
                                    <td class="px-0 text-primary fw-medium text-end">৳{{ number_format($sale->pay, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $userSales->links() }}
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>