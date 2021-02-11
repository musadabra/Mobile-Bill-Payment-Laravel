<template>
<div>
     <success-modal></success-modal>
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
                        <h4 class="card-title">Log Complain</h4>
                        <p class="card-description"> Write a complain to admin </p>
                        <form class="forms-sample">

                          <div class="form-group row">
                            <label for="exampleInputname2" class="col-sm-3 col-form-label">Vendor</label>
                            <div class="col-sm-9">
                              <select class="form-control" id="exampleInputname" name="vendor">
                                  <option selected="">Choose Company</option>
                                  <option value="">AIRTEL</option>
                                  <option value="">GLO</option>
                                  <option value="">ZAIN</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputTitle" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                              <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Title">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputDescription" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="description" id="exampleInputDescription" placeholder="Write your complain" rows="8"></textarea>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success mr-2">Submit</button>

                        </form>
                      </div>
                    </div>
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

    <error-modal></error-modal>
</div>
  
</template>
<script>
export default {
   data() {
    return {
      csrf: window.Laravel.csrfToken,

    };
  },
    created(){
        window.currentLink = "Vendor";
    },
      methods: {
        clearErrors(){
              document.getElementById("error-messages").innerHTML = " ";
        },
       successMessage(){
           document.getElementById("success-container").classList.add("success-display");
           setTimeout(function(){ 
             document.getElementById("success-container").classList.remove("success-display");
           }, 2000);
         },
       ShowErrorModal(){
           let btn = document.getElementById("showErrorModal");
           btn.click();
       },
       saveEmployer(){
          this.clearErrors();
          document.getElementById("submit-btn").classList.add("disabled");
          let formdata = new FormData(document.getElementById("formData"));
         axios
            .post("NNRA/addEmployer", formdata)
            .then(response => { 
                console.log(response.data);
                let data = response.data;
                document.getElementById("submit-btn").classList.remove("disabled");
            if (data.errors) {
                let errors = data.errors;
                Object.keys(errors).forEach(error => {
                    document.getElementById("error-messages").innerHTML += "<p>"+errors[error][0]+"</p>";
                });
              this.ShowErrorModal();

            } else {
               this.successMessage()
            }
            
            })
            .catch(error => {
            console.log(error);
                          document.getElementById("submit-btn").classList.remove("disabled");

          
            });
        }
    }
}
</script>