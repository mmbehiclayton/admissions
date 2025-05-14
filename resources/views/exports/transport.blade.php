<table>
    <caption>
    Transport Learners List
  </caption>
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Vehicle No. Plate</th>
            <th>Owner</th>
            <th>Contact</th>
            <th>Driver</th>
            <th>Assistant</th>
            <th>Route</th>
            <th>Transport Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach($learners as $index => $learner)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $learner->name }}</td>
            <td>{{ $learner->bus->number_plate ?? 'N/A' }}</td>
            <td>{{ $learner->bus->owner ?? 'N/A' }}</td>
            <td>{{ $learner->bus->contact ?? 'N/A' }}</td>
            <td>{{ $learner->bus->driver ?? 'N/A' }}</td>
            <td>{{ $learner->bus->assistant ?? 'N/A' }}</td>
            <td>{{ $learner->bus->route ?? 'N/A' }}</td>
            <td>{{ $learner->bus->type ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
