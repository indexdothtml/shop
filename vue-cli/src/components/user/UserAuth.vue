<template>
	<div class="account-row-content-auth col-12 col-md-7">
		<div class="account-row-content-auth-nav row no-gutters">
			<router-link to="/auth/login">Вход</router-link>
			<router-link to="/auth/reg">Регистрация</router-link>
		</div>
		<transition name="slide-fade">
			<router-view></router-view>
		</transition>
	</div>
</template>

<script>
	export default {
		name: 'user-login',
		
	}
</script>