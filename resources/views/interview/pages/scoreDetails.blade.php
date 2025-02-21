<div class="container score-details">
    @if(isset($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @else
        <div class="score-summary">
            <h2>Score Distribution Summary</h2>
            <p>Total Students Attempted: {{ $totalStudents }}</p>
        </div>

        <div class="score-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Score Range</th>
                        <th>Number of Students</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($scoreDistribution as $range => $count)
                        <tr>
                            <td>{{ $range }}</td>
                            <td>{{ $count }}</td>
                            <td>
                                @if($count > 0)
                                @php     $url = route('tests.score-details')  @endphp
                                    <button class="view-btn"

                                            onclick="window.location.href='{{ $url }}?range={{ $range }}'">
                                        View Details
                                    </button>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
