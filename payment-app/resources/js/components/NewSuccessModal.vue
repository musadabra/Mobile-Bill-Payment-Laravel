<template>
    <div class="success-container" :class="{'success-display' : open}">
       	<div class="success">{{ message }}</div>
    </div> 
</template>

<script type="text/javascript">
    export default {
        props: [
            'message',
            'open'
        ],
    }
</script>