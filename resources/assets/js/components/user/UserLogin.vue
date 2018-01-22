<template>
	<div class="account-row-content-login">
		<img src="/images/logo.svg" width="100" height="100" alt="logo">
		<form action="#">
			<label for="login">Ваш E-mail</label>
			<input type="text" class="form-control" id="login">
			<label for="password">Ваш Пароль</label>
			<input type="password" class="form-control" id="password">
			<button type="submit" class="btn btn-block">Войти</button>
		</form>
		<router-link class="btn" to="/forgot_password"><small>забыли пароль?</small></router-link>
	</div>
</template>

<script>
	export default {
		name: 'user-login'
	}
</script>