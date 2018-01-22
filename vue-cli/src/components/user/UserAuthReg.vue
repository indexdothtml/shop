<template>
	<div class="account-row-content-auth-register">
		<ui-input v-model="phone" :error="hasError('phone')" :hint="getError('phone')">
            <i class="fa fa-phone"></i> Ваш телефон
        </ui-input>

        <ui-input v-model="email" type="email" :error="hasError('email')" :hint="getError('email')">
            <i class="fa fa-envelope"></i> Ваш E-mail
        </ui-input>

        <ui-input v-model="password" type="password" :error="hasError('password')" :hint="getError('password')">
            <i class="fa fa-lock"></i> Ваш пароль
        </ui-input>

		<ui-button class="btn-block" @click="submit">Регистрация</ui-button>
	</div>
</template>

<script>
	import Validator from 'validatorjs';

	import uiInput from '../ui-input.vue';
	import uiButton from '../ui-button.vue';

	export default {
		name: 'user-reg',
		components: {
		    uiInput,
            uiButton
		},
		data () {
		    return {
		        showErrors: false,
                credentials: {
                    phone: '',
                    email: '',
                    password: ''
                },
                rules: {
                    phone: 'required|numeric|between:10,11',
                    email: 'required|string',
                    password: 'required|string|min:6'
                }
			}
		},
		computed: {
		    phone: {
		        get () {
		            return this.credentials.phone;
                },
                set (value) {
                    this.credentials.phone = value;
                }
            },
            email: {
		        get () {
		            return this.credentials.email;
                },
                set (value) {
                    this.credentials.email = value;
                }
            },
            password: {
                get () {
                    return this.credentials.password;
                },
                set (value) {
                    this.credentials.password = value;
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

                    // TODO: submit
                }
            }
        }
	}
</script>