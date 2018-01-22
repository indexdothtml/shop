<template>
	<tr>
		<td v-show="!isEditing">
			{{ address.street }}, {{ address.apt }}<br>
			{{ address.city }}, {{ address.country }}<br>
		</td>
		<td v-show="isEditing">
			<ui-input v-model="address.street">
            Укажите вашу улицу
        	</ui-input>
        	<ui-input v-model="address.apt">
            Укажите вашу улицу
        	</ui-input>
        	<ui-input v-model="address.city">
            Укажите вашу улицу
        	</ui-input>
        	<ui-input v-model="address.country">
            Укажите вашу улицу
        	</ui-input>
		</td>
		<td>
			<button v-on:click="edit" v-show="!isEditing">ред.</button>
			<button v-on:click="save" v-show="isEditing">сохр</button>
			<button v-on:click="$emit('remove', address.id)">удалить</button>
		</td>
	</tr>
</template>

<script>
	import uiInput from '../ui-input.vue';

	export default {
		name: 'user-addresses-item',
		components: {
			uiInput
		},
		data () {
			return {
				isEditing: false
			}
		},
		props: {
		    address: {
		      type: Object,
		      required: true
		    }
	  	},
	  	methods: {
	  		edit () {
	  			this.isEditing = !this.isEditing
	  		},
	  		save () {
	  			this.isEditing = !this.isEditing
	  		}
	  	}
	}
</script>