<template>
	<div class="account-row-content-addresses-add">
		<!-- Street -->
		<ui-input v-model="newStreet" :error="hasError('newStreet')" :hint="getError('newStreet')">
            Укажите улицу
        </ui-input>

		<!-- House -->
		<ui-input v-model="newHouse" :error="hasError('newHouse')" :hint="getError('newHouse')">
            Укажите номер дома
        </ui-input>

        <!-- Housing -->
		<ui-input v-model="newHousing" :error="hasError('newHousing')" :hint="getError('newHousing')">
            Укажите корпус
        </ui-input>

		<!-- Building -->
        <ui-input v-model="newBuilding" :error="hasError('newBuilding')" :hint="getError('newBuilding')">
            Укажите строение
        </ui-input>

        <!-- Entrance -->
        <ui-input v-model="newEntrance" :error="hasError('newEntrance')" :hint="getError('newEntrance')">
            Укажите подъезд
        </ui-input>

        <!-- Level -->
        <ui-input v-model="newLevel" :error="hasError('newLevel')" :hint="getError('newLevel')">
            Укажите этаж
        </ui-input>

        <!-- Apartment -->
        <ui-input v-model="newApt" :error="hasError('newApt')" :hint="getError('newApt')">
            Укажите квартиру
        </ui-input>

        <!-- Country -->
        <label>Укажите страну</label>
        <user-select v-model="selected" :options="['foo','bar']"></user-select> 

		<!-- City -->

        <label>Укажите город</label>
        <user-select v-model="selected" :options="['foo','bar']"></user-select>	

        <br>
        <router-link tag="a" to="/profile/addresses">Вернуться</router-link>
		<router-link tag="a" v-on:click.native="pushData" to="/profile/addresses" class="active" event="">Добавить</router-link>
	</div>
</template>

<script>
    import Validator from 'validatorjs';

    import { mapState } from 'vuex'

    import UserAddressesList from './UserAddressesList.vue';
    import UserSelect from './UserSelect.vue';

	import uiInput from '../ui-input.vue'; 
	import uiButton from '../ui-button.vue';

    

	export default {
		name: 'UserAddressAdd',
		components: {
			uiInput,
			uiButton,
            UserAddressesList,
			UserSelect
		},
		data () {
			return {
				showErrors: false,
				credentials: {
					newStreet: '',
					newHouse: '',
					newHousing: '',
					newBuilding: '',
					newEntrance: '',
					newLevel: '',
					newApt: '',
					newCity: '',
					newCountry: ''
				},
				rules: {
                    newStreet: 'required|string',
                    newHouse: 'required|numeric',
                    newHousing: 'required|numeric',
                    newBuilding: 'required|numeric',
                    newEntrance: 'required|numeric',
                    newLevel: 'required|numeric',
                    newApt: 'required|numeric',
					newCity: 'required|string',
					newCountry: 'required|string'
                }
			}
		},
		computed: {
			newStreet: {
		        get () {
		            return this.credentials.newStreet;
                },
                set (value) {
                    this.credentials.newStreet = value;
                }
            },
            newHouse: {
		        get () {
		            return this.credentials.newHouse;
                },
                set (value) {
                    this.credentials.newHouse = value;
                }
            },
            newHousing: {
		        get () {
		            return this.credentials.newHousing;
                },
                set (value) {
                    this.credentials.newHousing = value;
                }
            },
            newBuilding: {
		        get () {
		            return this.credentials.newBuilding;
                },
                set (value) {
                    this.credentials.newBuilding = value;
                }
            },
            newEntrance: {
		        get () {
		            return this.credentials.newEntrance;
                },
                set (value) {
                    this.credentials.newEntrance = value;
                }
            },
            newLevel: {
		        get () {
		            return this.credentials.newLevel;
                },
                set (value) {
                    this.credentials.newLevel = value;
                }
            },
            newApt: {
		        get () {
		            return this.credentials.newApt;
                },
                set (value) {
                    this.credentials.newApt = value;
                }
            },
            newCity: {
		        get () {
		            return this.credentials.newCity;
                },
                set (value) {
                    this.credentials.newCity = value;
                }
            },
            newCountry: {
		        get () {
		            return this.credentials.newCountry;
                },
                set (value) {
                    this.credentials.newCountry = value;
                }
            },
            validate () {
                let validator = new Validator(this.credentials, this.rules);

                return {
                    success: validator.passes(),
                    error: validator.fails(),
                    errors: validator.errors
                };
			}
		},
		methods: {
			getError (name) {
		        let error = this.validate.errors.get(name);

		        return error.length > 0 ? error[0] : '';
            },
		    hasError (name) {
		        return !!this.getError(name) && this.showErrors === true;
            },
			pushData () {
				if (this.validate.error) {
                    this.showErrors = true;
                } else {
                    this.showErrors = false;

					let addressData = {
						id: this.$store.state.hash++,
						street: this.credentials.newStreet,
						house: this.credentials.newHouse,
						housing: this.credentials.newHousing,
						building: this.credentials.newBuilding,
						entrance: this.credentials.newEntrance,
						level: this.credentials.newLevel,
						apt: this.credentials.newApt,
						city: this.credentials.newCity,
						country: this.credentials.newCountry
					};

					axios.post('/api/addresses/add', addressData).then(response => {
						this.$parent.addresses.push(response.data)
					}).catch(error => {
				      	this.$parent.errorsData.push(error);
				      	console.log(this.$parent.errorsData)
					})

					this.$router.push( {path: '/profile/addresses'} )
                }
			}
		}
	}
</script>