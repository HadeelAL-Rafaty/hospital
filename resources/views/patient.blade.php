@extends('layouts.main_layout')

@section('contact')

    <div class="page-banner overlay-dark bg-image" style="background-image: url('images/bg_image_1.jpg');">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">patient information</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">patient information</h1>
            </div> <!-- .container -->
        </div>     </div>

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Check patient information</h1>
            <!-- نموذج لجلب معلومات المريض -->
            <div class="form-group">
                <label for="idNumber">Patient ID Number:</label>
                <input type="text" class="form-control" id="idnumber" placeholder="Enter Patient ID Number">
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="getPatientInfo()">Show Patient Information</button>
            </div>
            <div id="patientInfoTable" style="display: none;">

                <h4>Patient Information</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Appointment Start Date/Time</th>
                        <th>Appointment End Date/Time</th>
                        <th>Notes</th>
                    </tr>
                    </thead>
                    <tbody id="patientInfoTableBody">
                    <!-- السجلات ستظهر هنا -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function getPatientInfo() {
            var idNumber = document.getElementById('idnumber').value;

            // جلب معلومات المريض باستخدام fetch
            fetch('get-patient-info?idnumber=' + idNumber)
                .then(response => response.json())
                .then(data => {
                    var patientInfoTableBody = document.getElementById('patientInfoTableBody');
                    patientInfoTableBody.innerHTML = ''; // تفريغ الجدول قبل إضافة السجلات

                    if (data.error) {
                        var row = patientInfoTableBody.insertRow();
                        var cell = row.insertCell();
                        cell.colSpan = "5";
                        cell.textContent = data.error;
                    } else {
                        // عرض المعلومات المسترجعة في الجدول
                        var patientData = data.data;
                        var appointments = patientData.appointments;

                        if (Array.isArray(appointments) && appointments.length > 0) {
                            for (var i = 0; i < appointments.length; i++) {
                                var appointment = appointments[i];
                                var row = patientInfoTableBody.insertRow();
                                row.insertCell().textContent = patientData.name;
                                row.insertCell().textContent = patientData.phone;
                                row.insertCell().textContent = appointment.start_date_time;
                                row.insertCell().textContent = appointment.end_date_time;
                                row.insertCell().textContent = appointment.notes;
                                // ... يمكنك عرض المزيد من السجلات هنا إذا لزم الأمر
                            }
                        } else {
                            var row = patientInfoTableBody.insertRow();
                            var cell = row.insertCell();
                            cell.colSpan = "5";
                            cell.textContent = "No appointments found for this patient.";
                        }
                    }
                })
                .catch(error => {
                    console.log(error);
                });

            var patientInfoTable = document.getElementById('patientInfoTable');
            patientInfoTable.style.display = 'block';
        }
    </script>

@stop
