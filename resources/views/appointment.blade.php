@extends('layouts.main_layout')

   @section('appointment')

  <div class="page-banner overlay-dark bg-image" style="background-image: url('images/bg_image_1.jpg');">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{('index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">appointment</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Appointment</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

   <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
        <div class="row">
            <div class="alert alert-danger" style="display: none">
                <span class="text-danger"> </span>
                <button type="button" class="close"  onclick="closeError()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        <div class="row mt-5 ">

          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name="fullname" required>
              <span class="text-danger"> </span>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="ID Number.." name="idnumber" required>
              <span class="text-danger"> </span>

          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Phone Number.." name="phone" required>
              <span class="text-danger"> </span>

          </div>

            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
              <select class="select" name="doctor_id" id="doctor_id" required>
                  <option>Select Doctor --- Department</option>
                  @foreach ($doctors as $doctor)
                      <option value="{{ $doctor->id }}">{{ $doctor->user->name }} --- {{ $doctor->department->name ?? ''}}</option>
                  @endforeach
              </select>
              <span class="text-danger"> </span>

          </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">

            <div class="cal-icon">
                <input type="text" class="form-control datetimepicker" name="date"  id="datetime"  placeholder="Date" required>
                <span class="text-danger"> </span>

            </div>
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

       <div class="m-t-20 text-center">

       <button type="submit" class="btn btn-primary mt-3 wow zoomIn" onclick="getCode2()">Submit Request</button>
       </div>

    </div>

   </div>




  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>







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

          if (!( doctor && inputDate)) {
              var errorMessage = "Please fill in all fields.";
              displayError(errorMessage);
              return;
          }

          var  url = "{{ route('getAvailableAppointment') }}";

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
          var fullnames=document.getElementsByName('fullname')[0].value;
          var idnumbers=document.getElementsByName('idnumber')[0].value;
          var phones=document.getElementsByName('phone')[0].value;
          var doctor=document.getElementsByName('doctor_id')[0].value;
          var dates=document.getElementsByName('date')[0].value;
          var start_date_times=$("input[type='radio'][name='start_date_time']:checked").val();
          ;
          //console.log(start_date_times);
          if (!(fullnames && idnumbers &&phones && doctor && dates && start_date_times)) {
              var errorMessage = "Please fill in all fields .";
              displayError(errorMessage);
              return;
          }
          var  url = "{{ route('GetAppointmentAdd') }}";
          if (!(fullnames && idnumbers &&phones && doctor && dates && start_date_times)) {
              var errorMessage = "Please fill in all fields .";
              displayError(errorMessage);
              return;
          }
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
               'fullname' :fullnames, 'idnumber':idnumbers, 'doctor_id': doctor ,'phone':phones, 'date':dates ,'start_date_time' :start_date_times
              },
              success: function (response) {
                  alert("success to appointment")
                  }
              ,
              error: function (error) {
                  console.log(error);
              }
          });}





      function displayError(errorMessage) {
          var errorMessageDiv = document.querySelector('.alert.alert-danger');
          if (errorMessageDiv) {
              var errorText = errorMessageDiv.querySelector('.text-danger');
              if (errorText) {
                  errorText.textContent = errorMessage;
              }

              var closeButton = errorMessageDiv.querySelector('.close');
              if (closeButton) {
                  closeButton.addEventListener('click', function() {
                      errorMessageDiv.style.display = 'none';
                  });
              }

              errorMessageDiv.style.display = 'block';
          }
      }
      function closeError() {
          var errorMessageDiv = document.querySelector('.alert.alert-danger');
          if (errorMessageDiv) {
              errorMessageDiv.style.display = 'none';


          }
      }
  </script>

@stop

