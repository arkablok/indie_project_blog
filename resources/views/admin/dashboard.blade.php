@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<script>
    CKEDITOR.replace('editor');
</script>
<div class="max-w-[95%] m-auto bg-gray-100 rounded-lg py-6 px-4">
    @if (count($users))
    <table class="user-datatable w-full rounded-lg overflow-hidden mb-4">
        <tr class="bg-gray-800 text-white">
            <th class="text-start p-3">User</th>
            <th class="text-start">Email</th>
            <th class="text-end p-3">Date</th>
            <th class="text-end p-3">Is Admin</th>
        </tr>
        @foreach ($users as $user)
        <tr class="odd:bg-white text-sm">
            <td class="text-start p-2">{{ $user->name }}</td>
            <td class="text-start">{{ $user->email }}</td>
            <td class="text-end p-2">{{ $user->created_at->diffForHumans() }}
                {{ $user->created_at->format('D d/m/y H:i:s A') }}</td>
            <td class="text-end p-2">
            @if ($user->is_admin)
            <span>Admin</span>
            <form id="removeAdminForm{{ $user->id }}" action="{{ route('admin.remove-admin', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <button class="bg-red-600 rounded-lg text-white py-2 px-4" type="button" onclick="confirmRemoveAdmin({{ $user->id }})">Remove Admin</button>
            </form>
            @else
            <form id="makeAdminForm{{ $user->id }}" action="{{ route('admin.make-admin', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <button class="bg-indigo-600 rounded-lg text-white py-2 px-4" type="button" onclick="confirmMakeAdmin({{ $user->id }})">Make Admin</button>
            </form>
            @endif
            </td>
        </tr>
        @endforeach
    </table>
    @if($users->hasPages())
    <div class="mt-3 rounded-lg bg-white py-2 px-3">
        {{ $users->links() }}
    </div>
    @endif
    @else
    <p class="py-4 text-center">No Users Data found!</p>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function submitForm(formId) {
        document.getElementById(formId).submit();
    }

    function confirmRemoveAdmin(userId) {
        Swal.fire({
            title: 'Remove Admin',
            text: 'Are you sure you want to remove admin status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                submitForm('removeAdminForm' + userId);
            }
        });
    }

    function confirmMakeAdmin(userId) {
        Swal.fire({
            title: 'Make Admin',
            text: 'Are you sure you want to make this user an admin?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, make admin!'
        }).then((result) => {
            if (result.isConfirmed) {
                submitForm('makeAdminForm' + userId);
            }
        });
    }
</script>
@endsection
