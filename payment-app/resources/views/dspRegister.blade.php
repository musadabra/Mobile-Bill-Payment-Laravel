<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Radiation Monitoring</title>

        @include('partials.app.style')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('partials.app.navbar')

            @include('partials.app.RegistrationSidebar')

            <div class="content-wrapper" style="margin-bottom: 140px;">
                <div class="content-header no-padding">
                    <div class="container-fluid">
                        <div class="row mb-2 no-padding">
                            <div class="col-sm-12 no-padding">
                                <ol class="breadcrumb float-sm-left tab-items">
                                    <li data-link='welcome' class="breadcrumb-item padding-right-30px tab active-navigation">
                                        <a class="link-welcome" href="#/">
                                            Welcome
                                        </a>
                                    </li>

                                    {{-- <li class="breadcrumb-item">
                                        <a href="">
                                            Dosimetric ...
                                        </a>
                                        <img class="cancel-icon" src="{{ asset('template/img/icons/cancel.png') }}">
                                    </li>

                                    <li class="breadcrumb-item active-navigation">
                                        <a href="">
                                            Add New E ...
                                        </a>

                                        <img class="cancel-icon" src="{{ asset('template/img/icons/cancel.png') }}"/>
                                    </li>

                                    <li class="breadcrumb-item">
                                        <a href="">
                                            Add New I ...
                                        </a>
                                        <img class="cancel-icon" src="{{ asset('template/img/icons/cancel.png') }}"/>
                                    </li> --}}
                                </ol>   
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="main-content-begin">
               
                     </div>  
                     <!-- WARNING -->
                     <success-modal></success-modal>
                     <div class="col-lg-12">
                       <div class="warning">
                         <p><strong>Note</strong> : Fields marked with * are required</p>
                       </div>
                     </div>
               
                     <!-- BEGINNING OF A FORM -->
                     <div class="col-lg-12 pt-2 form-name-container">
                       
                     </div>

                    <!-- HANDLING VALIDATION ERRORS -->
                    <div class="col-lg-8 offset-lg-1">
                        <div class="col-lg-12">
                            
                        </div>
                  
                   <form method="GET" class="form-horizontal" action="{{Route('addDSPFromInvitation')}}">
                        @csrf
                        
                        @if (isset($dspinfo['errors']))
                            @if ($dspinfo['errors']->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($dspinfo['errors']->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif 
                        @endif

                        <div class="form-group">
                           <div class="col-lg-5 float-left">
                             <label class="" for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Country
                             </label>
                           </div>
                           <div class="col-lg-7 float-right">
                             <input name="country" type="text" class="form-control " value="Nigeria">
                           </div>
                         </div>
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Service Provider
                             </label>
                           </div>
                           <div class="col-lg-7 float-right">
                             <input name="service_provider" type="text" class="form-control " id="" placeholder="" value="{{ $dspinfo["name"] }}" readonly>
                           </div>
                         </div>
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Service Proiver Address
                             </label>
                           </div>
                           <div class="col-lg-7 float-right ">
                             <input name="dsp_address" type="text" class="form-control" id="exampleInputEmail1" placeholder="" >
                           </div>
                         </div>
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;"></span> 
                                Postal Code
                             </label>
                           </div>
                           <div class="col-lg-7 float-right ">
                             <input name="dsp_postal_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>
               
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Department for Individual Monitoring
                             </label>
                           </div>
                           <div class="col-lg-7 float-right">
                             <input name="dept_individual_monitoring" type="text" class="form-control " id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>
               
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1" style="margin-top: -10px;">
                               <span style="color: #dc0505;">*</span> 
                                Director of Department for Individual Monitoring
                             </label>
                           </div>
                           <div class="col-lg-7 float-right">
                             <input name="director_of_dept_for_individual_monitoring" type="text" class="form-control " id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>
               
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Tester/Contact Person
                             </label>
                           </div>
                           <div class="col-lg-7 float-right">
                             <input name="tester_contact_person" type="text" class="form-control " id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>
               
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;"></span>  
                                Fax
                             </label>
                           </div>
                           <div class="col-lg-7 float-right"> 
                             <input name="dsp_fax"  type="text" class="form-control " id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>
               
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Mobilephone Number
                             </label>
                           </div>
                           <div class="col-lg-7 float-right input-group">
                             <div class="input-group-addon"><p>+234</p></div>
                             <input name="dsp_telno" type="text" class="form-control" style="padding-left: 5px;padding-top: 8px;" id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>
               
                         <div class="form-group">
                           <div class="col-lg-5 float-left ">
                             <label for="exampleInputEmail1">
                               <span style="color: #dc0505;">*</span> 
                                Email
                             </label>
                           </div>
                           <div class="col-lg-7 float-right">
                             <input type="email" name="dsp_email" class="form-control " id="exampleInputEmail1" placeholder="" value="{{ $dspinfo["email"] }}" readonly>
                             <input type="hidden" name="email" class="form-control " id="exampleInputEmail1" placeholder="" value="{{ $dspinfo["email"] }}">
                             <input type="hidden" name="id" value="{{ $dspinfo["id"] }}" class="form-control " id="exampleInputEmail1" placeholder="">
                           </div>
                         </div>

                        <div class="form-group">
                            <div class="col-lg-5 float-left ">
                                <label for="exampleInputEmail1">
                                    <span style="color: #dc0505;">*</span> 
                                     Password
                                    </label>
                            </div>
                            <div class="col-lg-7 float-right">
                                <div class="col-lg-6">                              
                                    <input type="password" name="password" class="form-control" id="password" style="float: left;float: left;" placeholder="" onkeyup='check();validatePassword(this.value);'>
                                    <p id="password-strength-text" style="margin-bottom: 1px"></p>      
                                    <label for="showpa" style="float: left">Show Password</label><input id="showpa" type="checkbox" style="margin-left: 10px;" onclick="showNewMasterkey()">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-5 float-left ">
                                <label for="exampleInputEmail1">
                                    <span style="color: #dc0505;">*</span> 
                                     Confirm Password
                                    </label>
                            </div>
                            <div class="col-lg-7 float-right">
                                <div class="col-lg-6">                         
                                    <input  class="form-control " type="password" name="Confirmpassword" id="Confirmpassword" onkeyup='check();'>         
                                </div> <span id='message'></span>  
                            </div>
                            
                        </div>
                         <div class="col-lg-12 submit-container">
                            <input id="submit-btn" class="btn btn-primary" type="submit" value="save" style="height: 45px !important;padding:0px 20px;background-color: green; border-radius: 2px;" disabled="true">
                         </div>
                        </form>
                     </div>
               </div>
            </div>
            @include('partials.app.footer')
            <script>

                //SHOW PASSWORD TEXT
                function showNewMasterkey() {
                    var x = document.getElementById("password");
                    var y = document.getElementById("Confirmpassword");
                    if (x.type === "password") {
                        x.type = "text";
                        y.type = "text";
                    } else {
                        x.type = "password";
                        y.type = "password";
                    }
                }
                
                // CHECK THE CONFRIM PASSWORD
                var check = function() {
                    
                    if (document.getElementById('password').value ==
                        document.getElementById('Confirmpassword').value) {
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'Matching';
                        document.getElementById('submit-btn').disabled = false;
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'Password not matching';
                        document.getElementById('submit-btn').disabled = true;
                    }
                }

                //PASSWORD STRENGTH
                function validatePassword(password) {
                
                    // Do not show anything when the length of password is zero.
                    if (password.length === 0) {
                        document.getElementById("msg").innerHTML = "";
                        return;
                    }
                    // Create an array and push all possible values that you want in password
                    var matchedCase = new Array();
                    matchedCase.push("[$@$!%*#?&]"); // Special Charector
                    matchedCase.push("[A-Z]");      // Uppercase Alpabates
                    matchedCase.push("[0-9]");      // Numbers
                    matchedCase.push("[a-z]");     // Lowercase Alphabates

                    // Check the conditions
                    var ctr = 0;
                    for (var i = 0; i < matchedCase.length; i++) {
                        if (new RegExp(matchedCase[i]).test(password)) {
                            ctr++;
                        }
                    }
                    // Display it
                    var color = "";
                    var strength = "";
                    switch (ctr) {
                        case 0:
                        case 1:
                        case 2:
                            strength = "Password Strength: Very Weak";
                            color = "red";
                            document.getElementById('submit-btn').disabled = true;
                            break;
                        case 3:
                            strength = "Password Strength: Medium";
                            color = "orange";
                            break;
                        case 4:
                            strength = "Password Strength: Strong";
                            color = "green";
                            break;
                            }
                    document.getElementById("password-strength-text").innerHTML = strength;
                    document.getElementById("password-strength-text").style.color = color;
                }         
            </script>
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
        </div>
        
        @include('partials.app.script')
    </body>
</html>
