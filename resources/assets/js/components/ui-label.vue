<template>
    <div :class="{'has-warning': error}">
        <div v-if="hasLabel" class="account-row-content-auth-label--group row no-gutters">
            <label :for="hash">
                <slot name="label"></slot>
            </label>
        </div>

        <slot></slot>

        <p v-if="hasHint" class="hint">{{ hint }}</p>
        <slot v-else name="hint"></slot>
    </div>
</template>

<script>
    export default {
        name: 'ui-label',
        props: {
            hint: {
                type: [String, Boolean],
                default: false
            },
            error: {
                type: Boolean,
                default: false
            }
        },
        data () {
            return {
                hash: null
            }
        },
        computed: {
            hasLabel () {
                return this.$slots.label;
            },
            hasHint () {
                return this.hint != false && typeof this.hint !== 'undefined';
            }
        },
        mounted () {
            this.hash = String.hash('ui-input-');

            this.$emit('hash', this.hash);
        }
    }
</script>