<x-app-layout>
    <div class="grid-container">
        <table>
            <thead>
                <tr>
                    <th>العملية</th>
                    <th>وقت الإنشاء</th>
                    <th>التكرارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->created_at }}</td>
                        <td>{{ $job->attempts }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>العملية</th>
                    <th>الخطأ</th>
                    <th>التاريخ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($failed_jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->exception }}</td>
                        <td>{{ $job->failed_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
