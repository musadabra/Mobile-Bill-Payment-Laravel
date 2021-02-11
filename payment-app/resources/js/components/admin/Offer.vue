<template>
<div>
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
           
            <!-- BEGINNING FORM -->
            <div class="row">
              <div class="col-md-6 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                  <div class="col-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Create Offer</h4>
                        <p class="card-description"> Add a Mobile connection company to vendor list </p>
                         <form class="forms-sample" @submit.prevent="saveOffer">

                          <div class="form-group row">
                            <label for="exampleInputname2" name="vendorname" class="col-sm-3 col-form-label">Vendor</label>
                            <div class="col-sm-9">
                              <select class="form-control" v-model="form.data.vendor_id">
                                  <option v-for="vendor in vendors" v-bind:key="vendor.id" :value="vendor.id">{{ vendor.name }}</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputTitle" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                              <input type="text" v-model="form.data.title" name="title" class="form-control" id="exampleInputTitle" placeholder="Offer Title">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputDescription" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" v-model="form.data.description" id="exampleInputDescription" placeholder="Offer Description"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputAmount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                              <input type="text" v-model="form.data.amount" class="form-control" id="exampleInputAmount" placeholder="Amount">
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success mr-2">Create</button>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Offers</h4>
                    <p class="card-description"> List of offers and vendors <code>Total:  {{total}}</code> </p>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Vendor</th>
                          <th>title</th>
                          <th>Amount</th>
                          <th>status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="background: #f3f3f3;" v-for="offer in offers" v-bind:key="offer.id">
                            <td>{{ offer.id }}</td>
                            <td>{{ offer.title }}</td>
                            <td>{{ vendor.amount }}</td>
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
</div>
</template>
<script>
export default {
    created(){
        window.currentLink = "Offer";
        this.getVendor();
        this.getOffer();
    },
    data(){
      return{
        form: {
            data: {
                vendor_id: '',
                title: '',
                description: '',
                amount: '',    
            },
        },
        csrf: window.Laravel.csrfToken,
        vendors: [],
        offers: [],
        total: ''
      }
    },
    methods: {
       getVendor(){
          
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
      getOffer(){
          
          axios.get('/admin/getAllOffer').then(response=>{
              
              this.offers = response.data;
              
              let count = 0;
              this.offers.forEach(offer => {
                 count++;
              });    
              this.total = count;

          }).catch(err=>{
              console.log(err);
          });
        },
       saveOffer(){
        this.clearErrors();
        // document.getElementById("submit-btn").classList.add("disabled");
        // let formdata = new FormData(document.getElementById("formData"));
        console.log(this.form.data);
        axios
          .post("/admin/createOffer", this.form.data)
          .then(response => { 

              console.log(response);

              let data = response;

            if (data.errors) {
              this.showErrorMessage();
            } else {
              this.successMessage();
            }

            this.getOffers();
          
          })
          .catch(error => {
            console.log(error);
          });
        },
      deleteVendor(data){
          axios.delete('/admin/deleteOffer', data).then(response=>{
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
          // document.getElementById("successContainer").innerHTML = "Vendor Added!";
      },
      showErrorMessage(){
          // let btn = document.getElementById("showErrorMessage").innerHTML = "Something went wrong";
      }
        
    }
}
</script>


