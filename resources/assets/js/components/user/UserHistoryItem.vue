<template>
	<tr>
		<td>
			<img :src="order.img" width="100" height="100" alt="">
		</td>
		<td>
			{{ order.name }}
		</td>
		<td>
			{{ order.price }}
		</td>
		<td>
			{{ order.payment_type_id }}
		</td>
		<td>
			{{ order.shipping_date }}
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
		    order: {
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