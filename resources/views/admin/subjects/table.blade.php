<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>User Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>
                        @php
                            $userRoles = App\Models\UserRole::whereIn('id', explode(',', $subject->user_role_id))->get();
                        @endphp
                        @foreach($userRoles as $userRole)
                            {{ $userRole->name }}
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-subject" data-subject-id="{{ $subject->id }}" data-subject-name="{{ $subject->name }}">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
