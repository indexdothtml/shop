<template>
    <div>
        <header>
            <div class="container">
                <div class="col-12 col-md-12 text-right">
                    <router-link to="/auth/login">Личный кабинет</router-link>
                </div>
                <div class="account">
                    <div class="account-row">
                        <div class="account-row-navigation col-12 col-md-12">
                            <account-nav></account-nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="account-row-content col-12 col-md-12">
                    <user></user>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import accountNav from '../components/account-nav.vue';
    import User from '../components/user/User.vue';

    export default {
    	name: 'Layout',
        components: {
            accountNav,
            User
        }
    }
</script>
