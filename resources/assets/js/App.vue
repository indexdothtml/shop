<template>
    <div id="app">
        <!-- <i  v-show="loading" class="fa fa-spinner fa-spin"></i> -->
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: 'app',
        data () {
        	return {
        		loading: false
        	}
        },
        mounted () {
        	this.loading = true;

        	this.axios.get('/').then( response => {
        		this.loading = false;
        		console.log(response);
        	}).bind(this).catch( error => {
        		console.log(error);
        	})
        }
    }
</script>