<template>
     <div class="row">
        <div class="modal fade" role="dialog" id="newErrorModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Warning
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
					
                    <div class="modal-body">
						<div class="thank-you-pop">
                            <h4 v-if="Object.keys(errors).length > 0 && Object.keys(tableErrors).length > 0">Form Errors</h4>
							<p class="my-0" v-for="error in errors">
                                <span class="text-danger">*</span>
                                {{ error[0] }}
                            </p>

                            <h4 class="mt-2" v-if="Object.keys(tableErrors).length > 0">Table Errors</h4>
                            <span v-for="(tableError, index) in tableErrors">
                                <h5>Row {{ index + 1 }}</h5>
                                <p class="my-0" v-for="errors in tableError">
                                    <span class="text-danger">*</span>
                                    {{ errors[0] }}
                                </p>
                            </span>
 						</div>
                    </div>

					<div class="modal-footer">
                         <button data-dismiss="modal" class="btn btn-success">OK</button> 
                    </div>
                </div>
            </div>
        </div>
        
        <button ref="openButton" class="btn btn-success d-none" data-toggle="modal" data-target="#newErrorModal">open</button>
    </div>
</template>

<script type="text/javascript">
    export default {
        props: [
            'errors',
            'tableErrors'
        ],
        mounted() {
            this.$root.$on('open-error-modal', eventData => this.openModal())
        },
        methods: {
            openModal(eventData) {
                const openButton = this.$refs.openButton
                openButton.click()
            }
        },
        destroyed() {
            this.$root.$off('open-error-modal');
        }
    }
</script>