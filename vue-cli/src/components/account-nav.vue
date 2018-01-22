<template>
    <nav>
        <router-link to="/user/foo/personal_info">
            <i class="fa fa-shopping-cart"></i>
            Личные данные
        </router-link>
        <router-link tag="a" to="/user/foo/purchases">
            <i class="fa fa-shopping-cart"></i>
            Покупки
        </router-link>
    </nav>
</template>
<script>
	export default {
		name: 'account-nav',
		data: ()=> {
    		return {
    			links: [
    				{ name: 'Личные данные'},
    				{ name: 'История покупок'},
    				{ name: 'Личные данные'},
    			]
    		}
    	}
	}
</script>