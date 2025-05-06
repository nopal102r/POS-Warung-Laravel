@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Welcome to the Dashboard</h1>
                <div class="row">
                    <!-- Info Cards or Stats -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Transactions</h5>
                                <p class="card-text">You have made 120 transactions today.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Revenue</h5>
                                <p class="card-text">Your total revenue today is $1500.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Active Orders</h5>
                                <p class="card-text">There are 15 active orders right now.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Graph or Charts can be added below -->
                <div class="mt-4">
                    <h4>Sales Statistics</h4>
                    <div id="sales-chart"></div>
                    <!-- You can add charting libraries here (e.g., Chart.js) -->
                </div>
            </div>
        </div>
    </div>
@endsection
