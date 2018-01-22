<template>
	<div class="account-row-content-profile">
		<div class="account-row-content-profile-info row">
			<div class="col-md-3 col-12">
				<img src="https://agro24.ru/img/svg/avatar0.png" alt="">
			</div>
			<div class="col-md-9 col-12">
				<div v-show="!isEditing">
					<h2 class="profile-name mb-4" @click="random">{{ name }}</h2>
					<h5 class="profile-gender mb-4">{{ gender }}</h5>
				</div>

				<button class="profile-btn edit" v-on:click="isEditing = !isEditing" v-show="!isEditing"><i class="fa fa-pencil"></i>Редактировать</button>

				<div class="profile-edit" v-show="isEditing">
					<ui-input v-model="name">
			          Имя
			        </ui-input>
			        <ui-input v-model="gender">
			          Пол
			        </ui-input> 
				</div>

				<button class="profile-btn edit" v-on:click="isEditing = !isEditing" v-show="isEditing"><i class="fa fa-pencil"></i>Сохранить</button>

				<button class="profile-btn change-password" v-show="!isEditing"><i class="fa fa-lock" ></i>Сменить пароль</button>
			</div>
		</div>
        <user-nav></user-nav>
        <transition name="slide-fade">
			<router-view></router-view>
		</transition>
	</div>
</template>

<script>
	import UserNav from './UserNav.vue';
	import uiInput from '../ui-input.vue';

	const nm = (name) => 'profile/' + name;
	//TODO: post edited data
	export default {
		name: 'user-profile',
		components: {
			uiInput,
			UserNav
		},
		data () {
			return {
				isEditing: false,
				gender: 'Мужской'
			}
		},
		computed: {
			// gender () {
			// 	return this.$store.state.gender;
			// },
		    name: {
		        get () {
					return this.$store.getters[nm('name')];
				},
				set (value) {
		            this.$store.dispatch(nm('setName'), value);
				}
			}
		},
		methods: {
		    random () {
		        this.name = String.hash();
			}
		}
	}
</script>