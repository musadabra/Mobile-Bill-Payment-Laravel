<template>
<div>
    <!-- SIDBAR -->
      <!-- partial -->
     
        <!-- partial -->
        <div class="main-panel" style="width:100%">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">HR</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#">Position</a></li>
                      <li><a href="#">Software Developer</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li><a href="#">Settings</a></li>
                      <li><a href="#">Analytics</a></li>
                      <li><a href="#">Watchlist</a></li>
                    </ul>
                  </div>
                </div>
              </div>
             
              
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">34</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Compains</h5>
                            <p class="mb-0 text-muted">54%</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">17</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Offers</h5>
                            <p class="mb-0 text-muted">54%</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">10</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Vendors</h5>
                            <p class="mb-0 text-muted">76%</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">2355</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Numbers</h5>
                            <p class="mb-0 text-muted">54%</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- BEGINNING FORM -->
            <div class="row">
              <div class="col-md-6 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                  <div class="col-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="errorsContainer">
                          <div id="successContainer" class="alert alert-success" role="alert">
                          </div>
                          <div id="showErrorMessage" class="alert alert-danger" role="alert">
                          </div>
                        </div>
                        <h4 class="card-title">Create Vendor</h4>
                        <p class="card-description"> Add a Mobile connection company to vendor list </p>
                        <form class="forms-sample" @submit.prevent="saveVendor">

                          <div class="form-group row">
                            <label for="exampleInputCompany"  class="col-sm-3 col-form-label">Company</label>
                            <div class="col-sm-9">
                              <input type="text" v-model="form.data.name" name="company" class="form-control" id="exampleInputCompany" placeholder="Company">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputEmail"  class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" v-model="form.data.email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                            </div>
                          </div>

                          <button type="submit" class="submit-btn btn btn-success mr-2">Create</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Vendors</h4>
                    <p class="card-description"> List of all available vendors <code>Total: {{total}}</code> </p>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Email</th>
                          <th>Company</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr v-for="vendor in vendors" v-bind:key="vendor.id">
                            <td>{{ vendor.name }}</td>
                            <td>{{ vendor.email }}</td>
                            <td>
                              <div type="submit" class="btn badge badge-danger">Delete</div>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
           
            </div>
              <!-- content-wrapper ends -->
              <!-- partial:../../partials/_footer.html -->
              <footer class="footer">
                <div class="container-fluid clearfix">
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Sw Global Interview Scheduler</span>
                </div>
              </footer>
              <!-- partial -->
            </div>

          <!-- partial -->
        </div>
        <!-- main-panel ends --> 
</div>
  
</template>
<script>
export default {
    created(){
        window.currentLink = "Vendor";
        this.getVendors();
    },
    data(){
      return{
        form: {
            data: {
                name: '',
                email: ''
            },
        },
        csrf: window.Laravel.csrfToken,
        vendors: [],
        total: ''
      }
    },
    methods: {
       getVendors(){
          
          axios.get('/admin/getAllVendor').then(response=>{

              this.vendors = response.data;
              let count = 0;
              this.vendors.forEach(vendor => {
                 count++;
              });    
              this.total = count;

          }).catch(err=>{
              console.log(err);
          });
        },
       saveVendor(){
           
        this.clearErrors();
        // document.getElementById("submit-btn").classList.add("disabled");
        // let formdata = new FormData(document.getElementById("formData"));
        
        axios
          .post("/admin/createVendor", this.form.data)
          .then(response => { 

              console.log(response);

              let data = response;

              // document.getElementById("submit-btn").classList.remove("disabled");

            if (data.errors) {
              this.showErrorMessage();
            } else {
                this.successMessage();
            }

            this.getVendors();
          
          })
          .catch(error => {
            console.log(error);
            document.getElementById("submit-btn").classList.remove("disabled");
          });
        },
      deleteVendor(data){
          axios.delete('/admin/deleteVendor', data).then(response=>{
              console.log(response);
          }).catch(err=>{
              console.log(err);
          });
      },
      clearErrors(){
            // document.getElementById("showErrorMessage").innerHTML = "";
            // document.getElementById("successContainer").innerHTML = "";
            // document.getElementById("errorsContainer").innerHTML = "";
      },
      successMessage(){
          document.getElementById("successContainer").innerHTML = "Vendor Added!";
        },
      showErrorMessage(){
          let btn = document.getElementById("showErrorMessage").innerHTML = "Something went wrong";
      }
        
     
    }
}
</script>

