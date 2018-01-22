<template>
    <nav class="mb-5 d-flex">
        <router-link tag="a" to="/profile/addresses" class="account-row-navigation-link">
            <i class="fa fa-location-arrow"></i>
            Адреса asdads
        </router-link>
        <router-link tag="a" to="/profile/history" class="account-row-navigation-link">
            <i class="fa fa-shopping-cart"></i>
            Покупки
        </router-link>
    </nav>
</template>
<script>
	export default {
		name: 'user-nav'
	}
</script>