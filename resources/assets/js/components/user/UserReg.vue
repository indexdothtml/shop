<template>
	<div class="account-row-content-register">
		<img src="/images/logo.svg" width="100" height="100" alt="logo">
		<form action="#">
			<label for="email">Ваш E-mail</label>
			<input type="email" name="email" class="form-control" id="email">
			<label for="password">Ваш Пароль</label>
			<input type="password" name="pass" class="form-control" id="password">
			<label for="name">Ваше Имя</label>
			<input type="text" class="form-control" id="name">
			<label for="lastname">Ваша Фамилия</label>
			<input type="text" name="lastname" class="form-control" id="lastname">
			<label for="yourmum">Адрес вашей матери <span style="color: red">*</span></label>
    		<textarea class="form-control" id="yourmum" rows="3" placeholder="только сущестующий, будьте так добры"></textarea>
			<button type="submit" class="btn btn-block">Зарегистриоваться</button></a>
		</form>
	</div>
</template>

<script>
	export default {
		name: 'user-reg',		
	}
</script>