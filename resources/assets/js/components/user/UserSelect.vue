<template>
	<v-select v-model="selected" :options="['foo','bar']"></v-select>
</template>

<script>
	import Vue from 'vue'
    import vSelect from 'vue-select'

	export default {
		name: 'user-login',
		components: {
			vSelect
		}
	}
</script>