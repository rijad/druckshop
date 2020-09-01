<h1 class="mt-4">Dashboard</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                            <div class="col-xl-2.5 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">No of Customers( {{ countCustomers() }} )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('customer.index') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2.5 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Orders( {{ countOrders() }} )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('order') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2.5 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Pending Orders( {{ countPending() }} )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('order') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2.5 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Completed Orders( {{ countCompleted() }} )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('order') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2.5 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Return Orders( {{ countReturn() }} )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('returnorder.index') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2.5 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Payment Completed( {{ countPayment() }} )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('payment') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>