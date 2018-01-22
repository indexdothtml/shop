<template>
	<div class="cart-toggle col-12 col-md-6 ml-auto">
		<user-cart-item></user-cart-item>
		<a href="/cart">Посмотреть корзину</a>
	</div>
</template>

<script>
	import UserCartItem from './UserCartItem.vue'

	export default {
		name: 'user-content',
		components: {
			UserCartItem
		}
	}
</script>