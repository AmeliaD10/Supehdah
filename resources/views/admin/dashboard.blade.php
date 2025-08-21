<x-app-layout>
    <div class="relative">
        @include('admin.components.sidebar')

        <div class="ml-64">
            <div class="py-6 px-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                    {{ __('Admin Dashboard') }}
                </h2>

                {{-- Stats Overview --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white shadow rounded-lg p-6 text-center">
                        <h3 class="text-gray-500 text-sm">Total Users</h3>
                        <p class="text-2xl font-bold text-blue-600">{{ \App\Models\User::where('role','user')->count() }}</p>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6 text-center">
                        <h3 class="text-gray-500 text-sm">Total Clinics</h3>
                        <p class="text-2xl font-bold text-red-600">{{ \App\Models\User::where('role','clinic')->count() }}</p>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6 text-center">
                        <h3 class="text-gray-500 text-sm">New Registrations (Today)</h3>
                        <p class="text-2xl font-bold text-green-600">
                            {{ \App\Models\User::whereDate('created_at', today())->count() }}
                        </p>
                    </div>
                </div>

                {{-- Charts --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- User & Clinic Registrations --}}
                    <div class="bg-white shadow rounded-lg p-6 lg:col-span-2">
                        <h3 class="text-lg font-semibold mb-4">Monthly Registrations 📊</h3>
                        <canvas id="userChart" height="120"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Users vs Clinics by Month
        let ctx = document.getElementById('userChart').getContext('2d');
        fetch(`/admin/user-stats/month`)
            .then(res => res.json())
            .then(data => {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: 'Users',
                                data: data.users,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                            },
                            {
                                label: 'Clinics',
                                data: data.clinics,
                                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            });
    </script>
</x-app-layout>
