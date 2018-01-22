<template>
    <ui-label
        :hint="hint"
        :error="error"
        @hash="setHash"
    >
        <template slot="label">
            <slot></slot>
        </template>

        <input
            ref="input"
            :value="value"
            :class="['form-control', 'form-control-warning', {
                'form-control-disabled': disabled
            }]"
            :type="type"
            :id="hash"
            :disabled="disabled"
            @input="input"
            @change="change"
            @blur="blur"
            @focus="focus"
        />

        <template slot="hint">
            <slot name="hint"></slot>
        </template>
    </ui-label>
</template>

<script>
    import uiLabel from './ui-label.vue';

    export default {
        name: 'ui-input',
        components: {
            uiLabel
        },
        props: {
            value: {
                type: [String, Number],
                default: ''
            },
            placeholder: {
                type: [String, Boolean],
                default: false
            },
            type: {
                type: String,
                default: 'text'
            },
            hint: {
                type: [String, Boolean],
                default: false
            },
            error: {
                type: Boolean,
                default: false
            },
            autofocus: {
                type: Boolean,
                default: false
            },
            disabled: {
                type: Boolean,
                default: false
            }
        },
        data () {
            return {
                hash: ''
            };
        },
        methods: {
            setHash (value) {
                this.hash = value;
            },
            emitValue (name, event) {
                let value = event.target.value;

                this.$emit(name, value);
            },
            input (event) {
                this.emitValue('input', event);
            },
            change (event) {
                this.emitValue('change', event);
            },
            blur (event) {
                this.$emit('blur');
            },
            focus (event) {
                this.$emit('focus');
            }
        },
        mounted () {
            if (this.autofocus) {
                this.$refs.input.focus();
            }
        }
    }
</script>