<template>
	<div class="account-row-content-addresses">
		<table class="table table-responsive-md table-responsive-sm">
		  	<thead>
			    <tr>
			      <th scope="col">Адреса</th>
			      <th scope="col">&nbsp;</th>
			    </tr>
		  	</thead>
		  	<tbody v-if="addresses.length">
		      	<user-addresses-item v-for="address in addresses" :key="address.id" :address="address" v-on:remove="addresses.splice(index, 1)">
		      	</user-addresses-item>
			</tbody>
			<tbody v-else>
				<tr>
					<td>Вы не добавили ни одного адреса</td>
				</tr>
			</tbody>
		</table>

		<transition name="slide-fade">
			<router-view></router-view>
			<router-link tag="a" id="add" to="/profile/addresses/add" class="active">Добавить адрес</router-link>
		</transition>
		
	</div>
</template>

<script>
	import UserAddressesItem from './UserAddressesItem.vue';

	import axios from 'axios';

	export default {
		name: 'user-address',
		components: {
			UserAddressesItem
		},
		mounted () {
			let addresses = this.addresses
			let errorsData = this.errorsData

			axios.get('/api/addresses').then( (response) => {
  				addresses = response.data
			}).catch( (error) => {
				errorsData.push(error)
				console.log(errorsData)
			});
		},
		computed: {
			addresses() {
				return this.$store.state.addresses
			},
			errorsData() {
				return this.$store.state.errorsData
			} 
		}
	}
</script>