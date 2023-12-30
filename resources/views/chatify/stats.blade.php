<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<style>
    body {
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
    }
</style>
@include('components-project.navbar')

<div class="table-responsive" style="margin:100px;">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Period</th>
                <th>Total messages sent</th>
                <th>Total messages received</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>This day</td>
                <td>{{ $totalMessagesSentThisDay }}</td>
                <td>{{ $totalMessagesReceiveThisDay }}</td>
            </tr>
            <tr>
                <td>Last week</td>
                <td>{{ $totalMessagesSentLastWeek }}</td>
                <td>{{ $totalMessagesReceiveLastWeek }}</td>
            </tr>
            <tr>
                <td>Last month</td>
                <td>{{ $totalMessagesSentLastMonth }}</td>
                <td>{{ $totalMessagesReceiveLastMonth }}</td>
            </tr>
            <tr>
                <td>This year</td>
                <td>{{ $totalMessagesSentThisYear }}</td>
                <td>{{ $totalMessagesReceiveThisYear }}</td>
            </tr>
        </tbody>
    </table>
</div>
