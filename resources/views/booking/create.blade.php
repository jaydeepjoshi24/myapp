<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom button style */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .invalid-feedback {
            font-size: 0.875rem;
            color: #dc3545;
        }

        /* Input field focus and validation state */
        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Booking Form</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="customer_name" class="col-md-3 col-form-label">Customer Name</label>
                <div class="col-md-9">
                    <input type="text" id="customer_name" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" >
                    @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="customer_email" class="col-md-3 col-form-label">Customer Email</label>
                <div class="col-md-9">
                    <input type="email" id="customer_email" name="customer_email" class="form-control @error('customer_email') is-invalid @enderror" value="{{ old('customer_email') }}" >
                    @error('customer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="booking_date" class="col-md-3 col-form-label">Booking Date</label>
                <div class="col-md-9">
                    <input type="date" id="booking_date" name="booking_date" class="form-control @error('booking_date') is-invalid @enderror" value="{{ old('booking_date') }}">
                    @error('booking_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="booking_type" class="col-md-3 col-form-label">Booking Type</label>
                <div class="col-md-9">
                    <select id="booking_type" name="booking_type" class="form-select @error('booking_type') is-invalid @enderror">
                        <option value="">Please Select the booking Type</option
                        <option value="Full Day" {{ old('booking_type') == 'Full Day' ? 'selected' : '' }}>Full Day</option>
                        <option value="Half Day" {{ old('booking_type') == 'Half Day' ? 'selected' : '' }}>Half Day</option>
                        <option value="Custom" {{ old('booking_type') == 'Custom' ? 'selected' : '' }}>Custom</option>
                    </select>
                    @error('booking_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3" id="booking_slot_div" style="display: none;">
                <label for="booking_slot" class="col-md-3 col-form-label">Booking Slot</label>
                <div class="col-md-9">
                    <select id="booking_slot" name="booking_slot" class="form-select @error('booking_slot') is-invalid @enderror">
                        <option value="First Half" {{ old('booking_slot') == 'First Half' ? 'selected' : '' }}>First Half</option>
                        <option value="Second Half" {{ old('booking_slot') == 'Second Half' ? 'selected' : '' }}>Second Half</option>
                    </select>
                    @error('booking_slot')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3" id="booking_time_div" style="display: none;">
                <label for="booking_from" class="col-md-3 col-form-label">Booking From</label>
                <div class="col-md-3">
                    <input type="time" id="booking_from" name="booking_from" class="form-control @error('booking_from') is-invalid @enderror" value="{{ old('booking_from') }}">
                    @error('booking_from')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <label for="booking_to" class="col-md-3 col-form-label">Booking To</label>
                <div class="col-md-3">
                    <input type="time" id="booking_to" name="booking_to" class="form-control @error('booking_to') is-invalid @enderror" value="{{ old('booking_to') }}">
                    @error('booking_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Book Now</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let bookingType = document.getElementById('booking_type');
            let slotDiv = document.getElementById('booking_slot_div');
            let timeDiv = document.getElementById('booking_time_div');

            bookingType.addEventListener('change', function () {
                if (this.value === 'Half Day') {
                    slotDiv.style.display = 'block';
                    timeDiv.style.display = 'none';
                } else if (this.value === 'Custom') {
                    slotDiv.style.display = 'none';
                    timeDiv.style.display = 'block';
                } else {
                    slotDiv.style.display = 'none';
                    timeDiv.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
