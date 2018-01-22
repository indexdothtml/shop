<template>
    <div>
        <header>
            <div class="container">
                <div class="col-12 col-md-12 text-right">
                    <router-link to="/profile">Личный кабинет</router-link>
                    <div class="d-inline">
                        <a href="/cart" v-on:click.prevent="isToggled = !isToggled" class="cart-toggler"><i class="fa fa-shopping-cart"></i>Корзина</a>
                        <transition name="slide-fade">
                            <user-cart-toggle v-show="isToggled"></user-cart-toggle>
                        </transition>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="account-row-content col-12 col-md-12">
                    <user-content></user-content>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import UserProfile from '../components/user/UserProfile.vue';
    import UserNav from '../components/user/UserNav.vue';
    import UserContent from '../components/user/UserContent.vue';
    import UserCartToggle from '../components/user/UserCartToggle.vue';

    export default {
    	name: 'Layout',
        components: {
            UserProfile,
            UserNav,
            UserContent,
            UserCartToggle
        },
        data () {
            return {
                isToggled: false
            }
        },
        methods: {
            cart () {
                this.$router.push('/cart')
            }
        }
    }
</script>
<style>
    .slide-fade-enter-active {
        transition: all .4s ease;
    }

    .slide-fade-leave-active {
        transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    
    .slide-fade-enter, .slide-fade-leave {
        transform: translateX(10px);
        opacity: 0;
    }
</style>