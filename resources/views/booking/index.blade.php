\<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking Listing Data') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- "Add Booking Now" Button -->
                    <div class="mb-4 text-left">
                        <a href="{{ route('booking.create') }}" class="inline-block bg-blue-500 text-black px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-200 transform hover:scale-105">
                            ADD BOOKING NOW
                        </a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success bg-green-500 text-black px-4 py-2 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Booking Table -->
                    @if ($bookings->isEmpty())
                        <p>No bookings found.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Customer Name</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Customer Email</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Booking Date</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Booking Type</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Booking Slot</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Booking From</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-gray-200">Booking To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr class="border-t border-gray-300">
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->customer_name ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->customer_email ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->booking_date ? \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') : '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->booking_type ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->booking_slot ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->booking_from ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $booking->booking_to ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
