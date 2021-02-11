<template>
     <div class="row">
        <div class="modal fade" id="errorModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       Warning! <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
					
                    <div class="modal-body">
						<div class="thank-you-pop" id="error-messages">
							<h1>Unable To Save</h1>
 						</div>
                    </div>

					<div class="modal-footer">
                         <button data-dismiss = "modal" class="btn btn-success">OK</button> 
                    </div>
                </div>
            </div>
        </div>
        
        <button id="showErrorModal" class="btn btn-success d-none" data-toggle="modal" data-target="#errorModal">open</button>
    </div>
</template>