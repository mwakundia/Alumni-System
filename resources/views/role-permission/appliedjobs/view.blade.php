<x-app-web-layout>
    @role('super-admin|admin')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-blue-700 mb-8 text-center">Application Details</h1>
       
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Job Information</h2>
                <p><strong>Job ID:</strong> {{ $application->job_id }}</p>
                <p><strong>Job Title:</strong> {{ $application->alumniJob->job_title ?? 'N/A' }}</p>
                <p><strong>Company:</strong> {{ $application->alumniJob->company_name ?? 'N/A' }}</p>
            </div>
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Applicant Information</h2>
                <p><strong>Applicant Name:</strong> {{ $application->user->name ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $application->user->email ?? 'N/A' }}</p>
                <p><strong>Applied Date:</strong> {{ $application->created_at->format('F j, Y') }}</p>
            </div>
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Application Status</h2>
                <p><strong>Current Status:</strong> {{ ucfirst($application->status) }}</p>
            </div>
            <div class="flex justify-center space-x-4">
                <button onclick="confirmAction('approve')" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Approve
                </button>
                <button onclick="confirmAction('deny')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Deny
                </button>
                <button onclick="confirmAction('pending')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Set as Pending
                </button>
            </div>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('applications.index') }}" class="text-blue-600 hover:text-blue-900">Back to All Applications</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmAction(action) {
            let title, text, icon, confirmButtonText, confirmButtonColor;

            switch(action) {
                case 'approve':
                    title = 'Approve Application?';
                    text = 'Are you sure you want to approve this application?';
                    icon = 'success';
                    confirmButtonText = 'Yes, approve it!';
                    confirmButtonColor = '#4CAF50';
                    break;
                case 'deny':
                    title = 'Deny Application?';
                    text = 'Are you sure you want to deny this application?';
                    icon = 'warning';
                    confirmButtonText = 'Yes, deny it!';
                    confirmButtonColor = '#F44336';
                    break;
                case 'pending':
                    title = 'Set Application as Pending?';
                    text = 'Are you sure you want to set this application as pending?';
                    icon = 'info';
                    confirmButtonText = 'Yes, set as pending!';
                    confirmButtonColor = '#FFC107';
                    break;
            }

            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonColor: '#6c757d',
                confirmButtonText: confirmButtonText
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(action + 'Form').submit();
                }
            });
        }

        @if(session('toast_message'))
            Swal.fire({
                icon: '{{ session('toast_type') }}',
                title: '{{ session('toast_message') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>

    <form id="approveForm" action="{{ route('applications.approve', $application->id) }}" method="POST" style="display: none;">
        @csrf
    </form>
    <form id="denyForm" action="{{ route('applications.deny', $application->id) }}" method="POST" style="display: none;">
        @csrf
    </form>
    <form id="pendingForm" action="{{ route('applications.pending', $application->id) }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endrole
</x-app-web-layout>