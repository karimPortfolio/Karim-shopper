<!-- Include Bootstrap Icons and Google Fonts for better typography -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="dashboard-analytics">
    <div class="container-fluid py-4">
        <div class="row g-4">
            <!-- Total Products Card -->
            <div class="col-md-6 col-lg-4">
                <div class="analytics-card card-hover">
                    <div class="card-header">
                        <div class="icon-wrapper bg-primary-soft pulse">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="metric-trend">
                            <span class="badge bg-success"><i class="bi bi-arrow-up"></i> 12%</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h6 class="metric-title">Total Products</h6>
                        <h3 class="metric-value">{{ $totalProducts }}</h3>
                        <div class="metric-info">
                            <span class="trend-period">vs last month</span>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 72%"></div>
                            </div>
                        </div>
                    </div>
                    @php
                        $user_id = Auth::user()->id;
                    @endphp
                    <a href="{{ route('dashboard.products') }}" class="card-action">
                        <span>View Details</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Sales Card -->
            <div class="col-md-6 col-lg-4">
                <div class="analytics-card card-hover">
                    <div class="card-header">
                        <div class="icon-wrapper bg-success-soft pulse">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="metric-trend">
                            <span class="badge bg-success"><i class="bi bi-arrow-up"></i> 8%</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h6 class="metric-title">Total Sales</h6>
                        <h3 class="metric-value">{{ $purchaces }}</h3>
                        <div class="metric-info">
                            <span class="trend-period">vs last month</span>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                    <a href="/" class="card-action">
                        <span>View Details</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Earnings Card -->
            <div class="col-md-6 col-lg-4">
                <div class="analytics-card highlight card-hover">
                    <div class="card-header">
                        <div class="icon-wrapper bg-highlight-soft pulse">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        {{-- <div class="metric-trend">
                            <span class="badge bg-green"><i class="bi bi-arrow-up"></i> 15%</span>
                        </div> --}}
                    </div>
                    <div class="card-content">
                        <h6 class="metric-title">Total Earnings</h6>
                        <h3 class="metric-value">
                            @if (count($earnings) > 0)
                                ${{ $earnings[0]->earnings }}
                            @else
                                $0
                            @endif
                        </h3>
                        <div class="metric-info">
                            <span class="trend-period">vs last month</span>
                            <div class="progress">
                                <div class="progress-bar bg-light" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                    <a href="/" class="card-action">
                        <span>View Details</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Purchases Card -->
            <div class="col-md-6 col-lg-4">
                <div class="analytics-card card-hover">
                    <div class="card-header">
                        <div class="icon-wrapper bg-info-soft pulse">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <div class="metric-trend">
                            <span class="badge bg-success"><i class="bi bi-arrow-up"></i> 5%</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h6 class="metric-title">Total Purchases</h6>
                        <h3 class="metric-value">{{ $purchacesBuyer }}</h3>
                        <div class="metric-info">
                            <span class="trend-period">vs last month</span>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 58%"></div>
                            </div>
                        </div>
                    </div>
                    <a href="/" class="card-action">
                        <span>View Details</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Orders Card -->
            <div class="col-md-6 col-lg-4">
                <div class="analytics-card card-hover">
                    <div class="card-header">
                        <div class="icon-wrapper bg-danger-soft pulse">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <div class="metric-trend">
                            <span class="badge bg-warning"><i class="bi bi-arrow-down"></i> 2%</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h6 class="metric-title">Total Orders</h6>
                        <h3 class="metric-value">{{ $orders }}</h3>
                        <div class="metric-info">
                            <span class="trend-period">vs last month</span>
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width: 45%"></div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard/orders" class="card-action">
                        <span>View Details</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
