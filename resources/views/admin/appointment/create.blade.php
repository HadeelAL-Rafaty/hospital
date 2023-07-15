@extends('layouts.admin.admin_layout')

@section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <h4 class="page-title">Add Appointment</h4>
                       <a href="{{URL('admin/appointment')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">

                           <div class="form-body">
                           <div class="row">
                                   @if ($errors->any())
                                       <div class="alert alert-danger">
                                           <ul>
                                               @foreach ($errors->all() as $error)
                                                   <li>{{ $error }}</li>
                                               @endforeach
                                           </ul>
                                       </div>
                                   @endif
                           </div>
                                       <div class="row">
                                       <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Patient Name</label>
                                       <select class="select" name="patient_id">
                                           <option>Select</option>
                                           @foreach ($patient as $patient)
                                               <option value="{{ $patient->id }}">{{ $patient->fullname }}</option>
                                           @endforeach
                                       </select>
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>



                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Doctor ---> Department</label>
                                       <select class="select" name="doctor_id" id="doctor_id">
                                       <option>Select Doctor</option>
                                       @foreach ($doctor as $doctor)
                                           <option value="{{ $doctor->id }}">{{ $doctor->user->name }} ---> {{ $doctor->department->name }}</option>
                                           @endforeach
                                       </select>
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>
                                       </div>
                               <div class="row">

                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Date</label>
                                           <div class="cal-icon">
                                               <input type="text" class="form-control datetimepicker" name="date"  id="datetime"  placeholder="Date">
                                           </div>
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>
                                   <div class="col-lg-8 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">

                                       <label>Available Appointments</label>
                                       <br>
                                       <div class="m-t-20 text-center">

                                           <button id="availability_day" class="btn btn-primary mt-3 wow zoomIn"  onclick="getCode()" style=" width: 150%;">
                                               Availability Day
                                           </button>
                                       </div>
                                   </div>
                                   <div  id="availability_results" class="mt-3" data-toggle="buttons" >


                                   </div>
                               </div>
                           </div>

                           <div class="m-t-20 text-center">
                               <button class="btn btn-primary submit-btn" onclick="getCode2()">Create Appointment</button>
                           </div>

                   </div>
               </div>
           </div>
       </div>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       <script >





           $(function () {
               $('#datetime').datetimepicker({
                   format: 'YYYY-MM-DD' // تنسيق التاريخ المطلوب
               });
           });
           function getCode(){

               var doctor=document.getElementById('doctor_id').value;
               var inputDate = $('#datetime').val();

               // الحصول على التاريخ بالتنسيق المطلوب
               var formattedDate = moment(inputDate, 'YYYY-MM-DD').format('YYYY-MM-DD');
               // alert(formattedDate);



               var  url = "{{ route('getAvailableAppointmentss') }}";

               $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   url: url,
                   type: "GET",
                   dataType: 'json',

                   data: {
                       'doctor_id':  doctor , 'date':  formattedDate
                   },
                   success: function (response) {
                       //  console.log(response.data[0]); // طباعة قيمة المتغير response في وحدة تحكم المستعرض

                       var availabilityResults = document.getElementById('availability_results');
                       availabilityResults.innerHTML = '';
                       if (response?.data?.length > 0) {
                           var timeButtons = document.createElement('div'); // إنشاء عنصر div للأزرار
                           timeButtons.className = 'button-group btn-group-toggle'; // تعيين الفئة المناسبة للعنصر

                           response.data.forEach(function (time) {
                               //console.log(time);
                               var timeButton = document.createElement('label'); // إنشاء عنصر label لزر الموعد
                               timeButton.className = 'btn btn-secondary'; // تعيين الفئة المناسبة للعنصر
                               timeButton.textContent = time; // تعيين قيمة الموعد

                               var timeInput = document.createElement('input'); // إنشاء عنصر input للاستخدام الداخلي
                               timeInput.type = 'radio';
                               timeInput.name = 'start_date_time';
                               timeInput.id = 'option';
                               timeInput.autocomplete = 'off';
                               timeInput.value = time;
                               timeButton.appendChild(timeInput); // إضافة عنصر input كابن لعنصر label
                               timeButtons.appendChild(timeButton); // إضافة عنصر label كابن لعنصر div

                           });

                           availabilityResults.appendChild(timeButtons); // إضافة عنصر div كابن لعنصر النتائج
                           // alert(availabilityResults)
                       } else {
                           var noAvailabilityMessage = document.createElement('p');
                           noAvailabilityMessage.textContent = 'No availability found.';
                           availabilityResults.appendChild(noAvailabilityMessage);

                       }
                   },
                   error: function (error) {
                       console.log(error);
                   }
               });}




           function getCode2(){
               var patient=document.getElementsByName('patient_id')[0].value;
               var doctor=document.getElementsByName('doctor_id')[0].value;
               var dates=document.getElementsByName('date')[0].value;
               var start_date_times=$("input[type='radio'][name='start_date_time']:checked").val();
               ;
               //console.log(start_date_times);

               var  url = "{{ route('GetAppointmentAddss') }}";
               let mail = {
                   _token: "{{ csrf_token() }}",
                   name: 'Mister. ABC',
                   email: 'abc@gmail.com',
                   message: 'OK',
               }
               $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   url: url,
                   type: "POST",
                   dataType: 'json',
                   data:mail,

                   data: {
                       'patient_id':patient, 'doctor_id': doctor ,'date':dates ,'start_date_time' :start_date_times
                   },
                   success: function (response) {
                       alert("success to appointment")
                   }
                   ,
                   error: function (error) {
                       console.log(error);
                   }
               });}




       </script>
@stop


