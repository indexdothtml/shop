<template>
	<div class="account-row-content-auth-reset">
		<ui-input v-model="email" type="email" :error="hasError('email')" :hint="getError('email')">
            <i class="fa fa-envelope"></i> Ваш E-mail
        </ui-input>

        <ui-button class="btn-block" @click="submit">Отправить</ui-button>
	</div>
</template>

<script>
	import Validator from 'validatorjs';

	import uiInput from '../ui-input.vue';
	import uiButton from '../ui-button.vue';
	
	export default {
		name: 'user-reset',
		components: {
		    uiInput,
            uiButton
		},
		data () {
		    return {
		        showErrors: false,
                credentials: {
                    email: ''
                },
                rules: {
                    email: 'required|email'
                }
			}
		},
		computed: {
            email: {
		        get () {
		            return this.credentials.email;
                },
                set (value) {
                    this.credentials.email = value;
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
            submit () {
		        if (this.validate.error) {
                    this.showErrors = true;
                } else {
                    this.showErrors = false;
                    axios.post('/api/auth/reset',this.credentials).then(response => {
                        console.log(response);
                    }).catch(error => {
                        console.log(error);
                    });
                }              
            }
        }
	}
</script>