<div>
    {{-- Be like water. --}}

{{-- second login view --}}
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Trade Tracker Flow..</h2>
            <div class="auto-form-wrapper">
                
        <form wire:submit.prevent="submit">
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" wire:model.lazy="email" placeholder="email">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" wire:model.lazy="password" placeholder="Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
        
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
    
              </form>
            </div>
          </div>
         
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    
    <!-- page-body-wrapper ends -->
  </div>


  </div>


