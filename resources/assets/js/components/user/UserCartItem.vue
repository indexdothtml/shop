<template>
	<div class="cart-item row">
		<div class="d-flex">
			<div class="cart-item-img">
				<img src="https://img0.etsystatic.com/135/0/13065784/il_570xN.1012984388_dhtx.jpg" alt="">
			</div>
			<div class="cart-item-name">{{ name }}</div>
			<div class="cart-item-category">{{ category }}</div>
			<div class="cart-item-article">{{ article }}</div>
			<div class="cart-item-quantity">{{ quantity }}</div>
			<div class="cart-item-price">{{ price }}</div>
			<div class="cart-item-discount">{{ discount }}</div>
		</div>
	</div>
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
		    good: {
		      type: Object,
		      required: true
		    }
	  	},
	  	computed: {
			name () {
				return this.$store.state.cart.name
			},

			category () {
				return this.$store.state.cart.category
			},

			subcategory () {
				return this.$store.state.cart.subcategory
			},

			article () {
				return this.$store.state.cart.article
			},

			price () {
				return this.$store.state.cart.price
			},

			discount () {
				return this.$store.state.cart.discount
			},

			quantity () {
				return this.$store.state.cart.quantity
			}
		}
	}
</script>