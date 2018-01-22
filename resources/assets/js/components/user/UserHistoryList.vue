<template>
	<div class="account-row-content-history">
		<table class="table table-responsive-md table-responsive-sm">
		  	<caption style="caption-side: top;">Ваши покупки</caption>
		  	<thead>
			    <tr>
			      <th scope="col">&nbsp;</th>
			      <th scope="col">Название</th>
			      <th scope="col">Цена</th>
			      <th scope="col">Метод оплаты</th>
			      <th scope="col">Дата доставки</th>
			    </tr>
		  	</thead>
		  	<tbody v-if="orders.length">
		      	<user-history-item v-for="order in orders" :key="order.id" :order="order" v-on:remove="orders.splice(index, 1)"></user-history-item>
			</tbody>
			<tbody v-else>
				<tr>
					<td>Вы не совершили ни одной покупки</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import UserHistoryItem from './UserHistoryItem.vue';

	export default {
		name: 'UserHistory',
		components: {
			UserHistoryItem
		},
		mounted () {
			let orders = this.orders
			let errorsData = this.errorsData

			axios.get('/api/orders').then( (response) => {
  				orders = response.data
			}).catch( (error) => {
				errorsData.push(error)
				console.log(errorsData)
			});
		},
		computed: {
			orders() {
				return this.$store.state.orders
			},
			errorsData() {
				return this.$store.state.errorsData
			}
		}
	}
</script>