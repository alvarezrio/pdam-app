@extends('layouts.app')

@section('content')
<br>
<br>

    <!--Start Admin Dashboard area-->
        <section>
            <div class="container">
                <h1 class="text-center my-4">Admin Dashboard</h1>

                <!-- User Statistics -->
                <div class="mb-5">
                    <h2>User Statistics</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>New Users Today</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Active Users</td>
                                <td>459</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Users With Issues</td>
                                <td>13</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- System Logs -->
                <div class="mb-5">
                    <h2>System Logs</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Event</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-01-09</td>
                                <td>System Update</td>
                                <td>Completed</td>
                            </tr>
                            <tr>
                                <td>2023-01-08</td>
                                <td>Backup Taken</td>
                                <td>Successful</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Latest Users -->
                <div class="mb-5">
                    <h2>Latest Users</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Registration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>101</td>
                                <td>John Doe</td>
                                <td>2023-01-01</td>
                            </tr>
                            <tr>
                                <td>102</td>
                                <td>Jane Smith</td>
                                <td>2023-01-02</td>
                            </tr>
                            <tr>
                                <td>103</td>
                                <td>Alice Johnson</td>
                                <td>2023-01-03</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    <!--End Admin Dashboard area-->
<br>
<br>
@endsection

