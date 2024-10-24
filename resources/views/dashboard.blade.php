@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1>Welcome to Your Dashboard!</h1>
                <div class="linkedin-profile">
                    <a href="https://www.linkedin.com/in/tejendra-gaha-magar-3439191a4/" target="_blank"
                        class="d-flex align-items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn"
                            style="width:40px; height:40px; margin-right:10px;">
                        <span style="font-size: 18px; font-weight: 600;">Visit My LinkedIn Profile</span>
                    </a>
                </div>
            </div>
            <p>Here you can manage your events, categories, and attendees.</p>
        </div>

        <div class="row mt-5">
            <!-- Dummy statistics cards -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Events</h5>
                        <p class="card-text">12</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">5</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Attendees</h5>
                        <p class="card-text">50</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Events</h5>
                        <p class="card-text">3</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <!-- Chart (dummy) -->
            <div class="col-md-12">
                <canvas id="eventChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dummy chart data
        var ctx = document.getElementById('eventChart').getContext('2d');
        var eventChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Events Created',
                    data: [3, 5, 2, 6, 4],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
